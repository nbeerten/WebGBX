<?php

namespace App\Classes\OnlineMapServices;

// Added

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class OnlineMapServices
{
    protected $uid;

    function __construct($uid) 
    {
        $this->uid = (string) $uid;
    }
     
    public function get()
    {
        $tmio = $this->tmio();
        $tmio_url = "https://trackmania.io/#/leaderboard/".$tmio['mapUid'];
        $tmx_url = "https://trackmania.exchange/s/tr/".$tmio['exchangeid'];
        $response = [
            "tmio" => $tmio_url,
            "tmx" => $tmx_url
        ];
        return (array) $response;
    }

    protected function tmio() 
    {
        $tmio = Cache::get('tmio/'.$this->uid, 
        function () {
            $uid = $this->uid;
            $api = Http::tmio()->get('/map/'.$uid);
            if($api->successful()) {
                if($api['mapUid'] === $uid) {
                    Cache::put('tmio/'.$uid, $api->body(), $seconds = 2592000);
                    $response = $api->body();
                } else {
                    $response = null;
                }
            } else {
                $response = null;
            }
            return $response;
        });
        return (array) json_decode($tmio);
    }
}