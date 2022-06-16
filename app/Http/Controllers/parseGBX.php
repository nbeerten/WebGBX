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
        $mapinfo = [
            "name" => $map->getName(),
            "name_clean" => $name_clean,
            "uid" => $map->getUid(),
            "authorZone" => $map->getAuthorZone(),
            "author" => $map->getAuthor(),
            "validated" => $map->isValidated(),
            "nblaps" => $map->getNbLaps(),
            "mod" => $map->getMod(),
            "displayCost" => $map->getDisplayCost(),
            "authorTime" => $map->getAuthorTime(),
            "goldMedal" => $map->getGoldMedal(),
            "silverMedal" => $map->getSilverMedal(),
            "bronzeMedal" => $map->getBronzeMedal(),
            "c8_authorLogin" => $map->getc8_authorLogin(),
            "c8_authorName" => $map->getc8_authorName(),
            "c8_authorZone" => $map->getc8_authorZone()
        ];

        return view('gbx.map')
                    ->with('map_name', $mapinfo['name_clean'])
                    ->with('map_author', $mapinfo['author'])
                    ->with('map_authorTime', $mapinfo['authorTime'])
                    ->with('map_authorlogin', $mapinfo['c8_authorLogin'])
                    ->with('map_authorname', $mapinfo['c8_authorName'])
                    ->with('map_authorzone', $mapinfo['c8_authorZone']);
    }
}
