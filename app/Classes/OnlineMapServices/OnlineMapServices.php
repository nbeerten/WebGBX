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


    protected $uid;
    protected $tmio;

    function __construct($uid) 
    {
        $this->uid = (string) $uid;
    }
     
    /**
     * Get formatted array of OnlineMapServices
     * @var mixed $tmio TMIO response from cache or API
     * @return array|null OnlineMapServices formatted as array or null if not found
     * @throws \Exception If rate limit exceeded
     */
    public function get()
    {
        $executed = RateLimiter::attempt(
            'tmio',
            $perMinute = 30,
            function() {
                $this->tmio();
            }
        );

        // Returns null if rate limit is hit. Otherwise, returns the formatted result result of tmio().
        if (! $executed) abort(429, 'Rate limit exceeded. Try again later.');
        else {
            // If trackmania.io data is not null, format it and return it
            if($this->tmio !== null) {
                $tmio = $this->tmio;

                $tmio_url = "https://trackmania.io/#/leaderboard/".$tmio['mapUid'];
                $tmx_url = "https://trackmania.exchange/s/tr/".$tmio['exchangeid'];
                $response = [
                    "tmio" => 
                        ['url' => $tmio_url,
                        'timestamp' => date('l, d F Y H:i', strtotime($tmio['timestamp'])),
                        'fileUrl' => $tmio['fileUrl'],
                        'thumbnailUrl' => $tmio['thumbnailUrl'],
                        'authorplayer' => [
                            'name' => $tmio['authorplayer']['name'],
                            'tag' => $tmio['authorplayer']['tag'],
                            'zone' => $tmio['authorplayer']['zone'],
                        ],
                        'submitterplayer' => [
                            'name' => $tmio['submitterplayer']['name'],
                            'tag' => $tmio['submitterplayer']['tag'],
                            'zone' => $tmio['submitterplayer']['zone'],
                        ]
                        ],
                    "tmx" => $tmx_url
                ];
                return (array) $response;
            }

            // If trackmania.io data is null, return null
            else return null;
        }
    }

    /**
     * Delete the given map's data from cache.
     * @return void
     */
    public function delete()
    {
        //* Delete OnlineMapServices data from cache for specific map uid
        Cache::forget('tmio/'.$this->uid); 
        return;
    }

    /** 
     * Get data from trackmania.io for specific map uid
     * @var    string $uid Map uid
     * @return array|null Trackmania.io data for specific map uid or null on error
     */
    protected function tmio() 
    {
        // Get OnlineMapServices from cache
        $tmio = Cache::get('tmio/'.$this->uid, 
                function () {
                    $uid = $this->uid;

                    // Call trackmania.io API on /api/map/{uid} endpoint
                    $api = Http::tmio()->get('/map/'.$uid);

                    // If API call successful and map UID is equal to map UID from parsing, store in cache and API JSON as return value
                    if($api->successful() && $api['mapUid'] === $uid) {
                        Cache::put('tmio/'.$uid, $api->body(), $seconds = 2592000);
                        $response = $api->body();
                    } 
                    else $response = null;
                    
                    return $response;
                });

        // Store trackmania.io API JSON in property if found
        // If map isn't on API, return null
        if($tmio !== null) $this->tmio = (array) json_decode($tmio, true);
        else $this->tmio = null;
    }
}