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

        $dependencies = $map->getDependencies();
        foreach($dependencies as $dependency) {
            $mapinfo['dependencies'][] = [
                "file" => $dependency->getFile(),
                "url" => $dependency->getUrl()
            ];
        }

        // https://stackoverflow.com/a/7453922/15759912
        function formatXmlString($xml)
        {
            $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
            $token      = strtok($xml, "\n");
            $result     = '';
            $pad        = 0;
            $matches    = array();
            while ($token !== false) :
                if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) :
                    $indent = 0;
                elseif (preg_match('/^<\/\w/', $token, $matches)) :
                    $pad--;
                    $pad--;
                    $pad--;
                    $pad--;
                    $indent = 0;
                elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
                    $indent = 4;
                else :
                    $indent = 0;
                endif;
                $line    = str_pad($token, strlen($token) + $pad, ' ', STR_PAD_LEFT);
                $result .= $line . "\n";
                $token   = strtok("\n");
                $pad    += $indent;
            endwhile;
            return $result;
        }

        $mapinfo['raw']['03043005'] = formatXmlString($map->getRaw()['03043005']) ?? '';

        $OMS = OnlineMapServices::get_new($mapinfo['uid']);

        if($OMS !== null && !is_bool($OMS)) {
            if(isset($OMS['authorplayer']['tag'])) {
                $authorplayer_tag = new ManiaplanetString($OMS['authorplayer']['tag']) ?? '';
                $authorplayer_tag = $authorplayer_tag->stripLinks()->stripEscapeCharacters()->toHtml();
            }
            if(isset($OMS['submitterplayer']['tag'])) {
                $submitterplayer_tag = new ManiaplanetString($OMS['submitterplayer']['tag']);
                $submitterplayer_tag = $submitterplayer_tag->stripLinks()->stripEscapeCharacters()->toHtml();
            }

            $mapinfo['OMS'] = [
                "tmio" => 
                    ['url' => "https://trackmania.io/#/leaderboard/{$OMS['mapUid']}" ?? null,
                    'timestamp' => date('D, d M Y H:i', strtotime($OMS['timestamp'])) ?? null,
                    'fileName' => $OMS['filename'] ?? null,
                    'collectionName' => $OMS['collectionName'] ?? null,
                    'mapType' => $OMS['mapType'] ?? null,
                    'fileUrl' => $OMS['fileUrl'] ?? null,
                    'thumbnailUrl' => $OMS['thumbnailUrl'] ?? null,
                    'authorplayer' => [
                        'name' => $OMS['authorplayer']['name'] ?? null,
                        'tag' => $authorplayer_tag ?? null,
                        'zone' => $OMS['authorplayer']['zone'] ?? null,
                    ],
                    'submitterplayer' => [
                        'name' => $OMS['submitterplayer']['name'] ?? null,
                        'tag' => $submitterplayer_tag ?? null,
                        'zone' => $OMS['submitterplayer']['zone'] ?? null,
                    ]
                    ],
                "tmx" => "https://trackmania.exchange/s/tr/{$OMS['exchangeid']}" ?? null
            ];
        }

        return $mapinfo;
    }
}