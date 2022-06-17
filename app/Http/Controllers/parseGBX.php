<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//  Added
use App\Classes\GBXParser\Map;
use Manialib\Formatting\ManiaplanetString;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class parseGBX extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Load map file and put data into arrray
        $map = Map::loadFile($_SERVER['DOCUMENT_ROOT'].'/Ubiquitous.Map.Gbx');
        $name_clean = new ManiaplanetString($map->getName());
        $name_clean = $name_clean->stripAll()->__toString();

        $zone = explode("|", $map->getc8_authorZone());
        $zone = $zone[2];
        $mapinfo = [
            "name" => $name_clean,
            "uid" => $map->getUid(),
            "validated" => $map->isValidated(),
            "nblaps" => $map->getNbLaps(),
            "mod" => $map->getMod(),
            "displayCost" => $map->getDisplayCost(),
            "authorTime" => $map->getAuthorTime(),
            "goldMedal" => $map->getGoldMedal(),
            "silverMedal" => $map->getSilverMedal(),
            "bronzeMedal" => $map->getBronzeMedal(),
            "authorLogin" => $map->getc8_authorLogin(),
            "authorName" => $map->getc8_authorName(),
            "authorZone" => $zone
        ];

        $map->getThumbnail()->saveJpg('thumbnails/' . $mapinfo['uid'] . '.jpg');
        $thumbnail = 'thumbnails/' . $mapinfo['uid'] . '.jpg';

        return view('gbx.map2')
                    ->with('map', $mapinfo)
                    ->with('thumbnail', $thumbnail);
    }
}
