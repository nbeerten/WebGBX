<?php

namespace App\Classes\OnlineMapServices;

// Added

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class OnlineMapServices
{
    /* How to use:
    * $OnlineMapServices = new OnlineMapServices($mapuid);
    * $OnlineMapServices->store() to store OnlineMapServices in cache for later use
    * $OnlineMapServices->get() to get OnlineMapServices formatted as array
    * $OnlineMapServices->delete() to delete OnlineMapServices from cache
    */

    /**
     * Get formatted array of OnlineMapServices
     * @var mixed $tmio TMIO response from cache or API
     * @return array|null OnlineMapServices formatted as array or null if not found
     * @throws \Exception If rate limit exceeded
     */
    public static function get($id)
    {
        $executed = RateLimiter::attempt(
            'tmio',
            $perMinute = 30,
            function() use ($id) {
                return OnlineMapServices::tmio($id);
            }
        );

        // Returns null if rate limit is hit. Otherwise, returns the formatted result result of tmio().
        if (! $executed) abort(429, 'Rate limit exceeded. Try again later.');
        else {
            // If trackmania.io data is not null, format it and return it
            if($executed !== null && isset($executed['mapUid'])) {
                $tmio = $executed;

                $tmio_url = "https://trackmania.io/#/leaderboard/".$tmio['mapUid'];
                $tmx_url = "https://trackmania.exchange/s/tr/{$tmio['exchangeid']}";
                $response = [
                    "tmio" => 
                        ['url' => $tmio_url ?? '',
                        'timestamp' => date('l, d F Y H:i', strtotime($tmio['timestamp'])) ?? '',
                        'fileName' => $tmio['filename'] ?? '',
                        'collectionName' => $tmio['collectionName'] ?? '',
                        'mapType' => $tmio['mapType'] ?? '',
                        'fileUrl' => $tmio['fileUrl'] ?? '',
                        'thumbnailUrl' => $tmio['thumbnailUrl'] ?? '',
                        'authorplayer' => [
                            'name' => $tmio['authorplayer']['name'] ?? '',
                            'tag' => $tmio['authorplayer']['tag'] ?? '',
                            'zone' => $tmio['authorplayer']['zone'] ?? '',
                        ],
                        'submitterplayer' => [
                            'name' => $tmio['submitterplayer']['name'] ?? '',
                            'tag' => $tmio['submitterplayer']['tag'] ?? '',
                            'zone' => $tmio['submitterplayer']['zone'] ?? '',
                        ]
                        ],
                    "tmx" => $tmx_url ?? ''
                ];
                return (array) $response;
            }

            // If trackmania.io data is null, return null
            else return null;
        }
    }

    public static function get_new($id)
    {
        $executed = RateLimiter::attempt(
            'tmio',
            $perMinute = 35,
            function() use ($id) {
                return OnlineMapServices::tmio($id);
            }
        );

        // Returns null if rate limit is hit. Otherwise, returns the formatted result result of tmio().
        if (! $executed) abort(429, 'Rate limit exceeded. Try again later.');
        // If trackmania.io data is not null, return it
        else if($executed !== null) return $executed;
        // If trackmania.io data is null, return null
        else return null;
    }

    /**
     * Delete the given map's data from cache.
     * @return void
     */
    public static function delete($id)
    {
        //* Delete OnlineMapServices data from cache for specific map uid
        Cache::forget("tmio/{$id}"); 
        return;
    }

    /** 
     * Get data from trackmania.io for specific map uid
     * @var    string $uid Map uid
     * @return array|null Trackmania.io data for specific map uid or null on error
     */
    protected static function tmio($id)
    {
        // Get OnlineMapServices from cache
        $tmio = Cache::get("tmio/{$id}", 
                function() use ($id) {

                    // Call trackmania.io API on /api/map/{uid} endpoint
                    $api = Http::tmio()->get("/map/{$id}");

                    // If API call successful and map UID is equal to map UID from parsing, store in cache and API JSON as return value
                    if($api->successful() && $api['mapUid'] === $id) {
                        Cache::put("tmio/{$id}", $api->body(), $seconds = 60*10);
                        $response = $api->body();
                    } 
                    else $response = null;
                    
                    return $response;
                });

        // Store trackmania.io API JSON in property if found
        // If map isn't on API, return null
        if($tmio !== null) return (array) json_decode($tmio, true);
        else return null;
    }
}