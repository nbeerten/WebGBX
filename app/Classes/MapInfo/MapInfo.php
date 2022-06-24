<?php

namespace App\Classes\MapInfo;

//  Added
use App\Classes\GBXParser\Map;
use Manialib\Formatting\ManiaplanetString;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;
use App\Classes\MedalTime\MedalTime;
use App\Classes\OnlineMapServices\OnlineMapServices;

class MapInfo
{
    protected $file;
    protected $map;

    function __construct($file)
    {
        /* File = $request->file('map')->get() */
        $this->file = $file;
        $this->map  = $this->parse();
        return;
    }

    public function format()
    {
        $map = $this->map;

        $mapinfo = [
            "name" => '',
            "namehtml" => '',
            "uid" => $map->getUid(),
            "validated" => '',
            "nblaps" => null,
            "mod" => $map->getMod(),
            "displayCost" => $map->getDisplayCost(),
            "authorTime" => '',
            "goldMedal" => '',
            "silverMedal" => '',
            "bronzeMedal" => '',
            "authorLogin" => $map->getc8_authorLogin(),
            "authorName" => $map->getc8_authorName(),
            "authorZone" => ''
        ];

        $ManiaplanetString = new ManiaplanetString($map->getName());
        $mapinfo['namehtml'] = $ManiaplanetString->stripLinks()->stripEscapeCharacters()->toHtml();
        $mapinfo['name'] = $ManiaplanetString->stripAll()->__toString();

        $mapinfo['validated'] = boolval($map->isValidated()) ? "True" : "False";
        $mapinfo['nbLaps'] = $map->getNbLaps() == 0 ? null : $map->getNbLaps();

        $mapinfo['authorTime'] = Medaltime::format($map->getAuthorTime());
        $mapinfo['goldMedal'] = Medaltime::format($map->getGoldMedal());
        $mapinfo['silverMedal'] = Medaltime::format($map->getSilverMedal());
        $mapinfo['bronzeMedal'] = Medaltime::format($map->getBronzeMedal());
        
        $mapinfo['zone'] = implode(", ", array_reverse( explode("|", $map->getc8_authorZone()) ));

        return $mapinfo;
    }

    public function thumbnail() 
    {
        $thumbnailfile = $this->map->getThumbnail()->__toString();
        Request::session()->put('mapthumbnail.' . $this->map->getUid(), $thumbnailfile);
        return;
    }

    public function parse() {
        return Map::loadString($this->file);
    }
}