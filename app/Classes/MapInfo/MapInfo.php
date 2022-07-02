<?php

namespace App\Classes\MapInfo;

//  Added
use App\Classes\GBXParser\Map;
use App\Classes\MedalTime\MedalTime;

use Illuminate\Support\Facades\Request;
use Manialib\Formatting\ManiaplanetString;
use App\Classes\OnlineMapServices\OnlineMapServices;

/**
 * MapInfo
 */
class MapInfo
{
    protected $map;
    
    /**
     * Construct a new MapInfo object
     *
     * @param  mixed $file String of map file
     * @return void
     */
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
    
    /**
     * Parse the map file and return a Map object
     *
     * @param  mixed $file
     * @return void
     */
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
        $mapinfo['exeBuild'] = $map->getExeBuild() ?? '';
        $mapinfo['exeVersion'] = $map->getExeVersion() ?? '';
        $mapinfo['lightmap'] = $map->getLightmap() ?? null;
        $mapinfo['mood'] = $map->getMood() ?? '';
        $mapinfo['hasGhostBlocks'] = $map->hasGhostBlocks() ?? null;
        
        $mapinfo['comments'] = $map->getComments() ?? '';

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

        $mapinfo['thumbnail'] = route('map.thumbnail', ['id' => $mapinfo['uid']]);

        $OMS = OnlineMapServices::get_new($mapinfo['uid']);

        if($OMS !== null && !is_bool($OMS)) {
            $authorplayer_tag = new ManiaplanetString($OMS['authorplayer']['tag']);
            $authorplayer_tag = $authorplayer_tag->stripLinks()->stripEscapeCharacters()->toHtml();
            $submitterplayer_tag = new ManiaplanetString($OMS['submitterplayer']['tag']);
            $submitterplayer_tag = $submitterplayer_tag->stripLinks()->stripEscapeCharacters()->toHtml();

            $mapinfo['OMS'] = [
                "tmio" => 
                    ['url' => "https://trackmania.io/#/leaderboard/{$OMS['mapUid']}" ?? '',
                    'timestamp' => date('D, d M Y H:i', strtotime($OMS['timestamp'])) ?? '',
                    'fileName' => $OMS['filename'] ?? '',
                    'collectionName' => $OMS['collectionName'] ?? '',
                    'mapType' => $OMS['mapType'] ?? '',
                    'fileUrl' => $OMS['fileUrl'] ?? '',
                    'thumbnailUrl' => $OMS['thumbnailUrl'] ?? '',
                    'authorplayer' => [
                        'name' => $OMS['authorplayer']['name'] ?? '',
                        'tag' => $authorplayer_tag ?? '',
                        'zone' => $OMS['authorplayer']['zone'] ?? '',
                    ],
                    'submitterplayer' => [
                        'name' => $OMS['submitterplayer']['name'] ?? '',
                        'tag' => $submitterplayer_tag ?? '',
                        'zone' => $OMS['submitterplayer']['zone'] ?? '',
                    ]
                    ],
                "tmx" => "https://trackmania.exchange/s/tr/{$OMS['exchangeid']}"
            ];
        }

        return $mapinfo;
    }
}