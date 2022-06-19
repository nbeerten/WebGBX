<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//  Added
use App\Classes\GBXParser\Map;
use Manialib\Formatting\ManiaplanetString;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Classes\MedalTime\MedalTime;
use App\Classes\OnlineMapServices\OnlineMapServices;


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
        $map = Map::loadFile($_SERVER['DOCUMENT_ROOT']."/Ubiquitous.Map.Gbx");
        $nameString = new ManiaplanetString($map->getName());
        $nameStyled = $nameString->stripLinks()->stripEscapeCharacters()->toHtml();
        $nameClean = $nameString->stripAll()->__toString();

        $zone = explode("|", $map->getc8_authorZone());
        $zone = implode(", ", array_reverse($zone));

        function msToFormattedString($ms) {
            $medaltime = new Medaltime($ms);
            return $medaltime->__toString();
        }

        $mapinfo = [
            "name" => $nameClean,
            "nameStyled" => $nameStyled,
            "uid" => $map->getUid(),
            "validated" => $map->isValidated(),
            "nblaps" => $map->getNbLaps(),
            "mod" => $map->getMod(),
            "displayCost" => $map->getDisplayCost(),
            "authorTime" => msToFormattedString($map->getAuthorTime()),
            "goldMedal" => msToFormattedString($map->getGoldMedal()),
            "silverMedal" => msToFormattedString($map->getSilverMedal()),
            "bronzeMedal" => msToFormattedString($map->getBronzeMedal()),
            "authorLogin" => $map->getc8_authorLogin(),
            "authorName" => $map->getc8_authorName(),
            "authorZone" => $zone
        ];

        $OnlineMapServices = new OnlineMapServices($mapinfo['uid']);
        $OnlineMapServices = $OnlineMapServices->get();
        
        $thumbnail = $map->getThumbnail()->__toString();
        Cache::put('thumbnail/'.$mapinfo['uid'], $thumbnail, $seconds = 60);
        
        $thumbnail = 'gbx/thumbnail/' . $mapinfo['uid'];

        return view('gbx.map')
                    ->with('map', $mapinfo)
                    ->with('thumbnail', $thumbnail)
                    ->with('OnlineMapServices', $OnlineMapServices);
    }
}
