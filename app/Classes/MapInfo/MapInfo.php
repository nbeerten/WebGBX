<?php

namespace App\Classes\MapInfo;

//  Added
use Manialib\Formatting\ManiaplanetString;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;

use App\Classes\GBXParser\Map;
use App\Classes\MedalTime\MedalTime;
use App\Classes\OnlineMapServices\OnlineMapServices;

class MapInfo
{
    protected $map;

    function __construct($file)
    {
        /* File = $request->file('map')->get() */
        try {
            $this->map  = $this->parse($file);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return;
    }

    public function parse($file) {
        return Map::loadString($file);
    }

    public function get()
    {
        $map = $this->map;

        $mapinfo['uid'] = $map->getUid() ?? '';
        
        $ManiaplanetString = new ManiaplanetString($map->getName()) ?? '';
        $mapinfo['name'] = [
            'raw' => $map->getName(),
            'html' => $ManiaplanetString->stripLinks()->stripEscapeCharacters()->toHtml() ?? '',
            'plain' => $ManiaplanetString->stripAll()->__toString() ?? ''
        ];
        
        $mapinfo['validated'] = boolval($map->isValidated()) ? true : false;
        $mapinfo['nbLaps'] = $map->getNbLaps() == 0 ? null : $map->getNbLaps();
        $mapinfo['mod'] = $map->getMod() ?? '';
        $mapinfo['displayCost'] = $map->getDisplayCost() ?? '';

        $mapinfo['medals'] = [
            'author' => Medaltime::format($map->getAuthorTime()) ?? 0,
            'gold' => Medaltime::format($map->getGoldMedal()) ?? 0,
            'silver' => Medaltime::format($map->getSilverMedal()) ?? 0,
            'bronze' => Medaltime::format($map->getBronzeMedal()) ?? 0
        ];

        $mapinfo['author'] = [
            'login' => $map->getc8_authorLogin() ?? '',
            'name' => $map->getc8_authorName() ?? '',
            'zone' => implode(", ", array_reverse( explode("|", $map->getc8_authorZone()) )) ?? ''
        ];

        $thumbnailfile = $this->map->getThumbnail()->__toString();
        Request::session()->put('mapthumbnail.'.$mapinfo['uid'], $thumbnailfile);

        $mapinfo['thumbnail'] = route('gbxthumbnail', ['id' => $mapinfo['uid']]);

        $OMP = OnlineMapServices::get_new($mapinfo['uid']);
        
        $mapinfo['OMP'] = [
            "tmio" => 
                ['url' => "https://trackmania.io/#/leaderboard/{$OMP['mapUid']}" ?? '',
                'timestamp' => date('l, d F Y H:i', strtotime($OMP['timestamp'])) ?? '',
                'fileUrl' => $OMP['fileUrl'] ?? '',
                'thumbnailUrl' => $OMP['thumbnailUrl'] ?? '',
                'authorplayer' => [
                    'name' => $OMP['authorplayer']['name'] ?? '',
                    'tag' => $OMP['authorplayer']['tag'] ?? '',
                    'zone' => $OMP['authorplayer']['zone'] ?? '',
                ],
                'submitterplayer' => [
                    'name' => $OMP['submitterplayer']['name'] ?? '',
                    'tag' => $OMP['submitterplayer']['tag'] ?? '',
                    'zone' => $OMP['submitterplayer']['zone'] ?? '',
                ]
                ],
            "tmx" => "https://trackmania.exchange/s/tr/{$OMP['exchangeid']}"
        ];

        return $mapinfo;
    }
}