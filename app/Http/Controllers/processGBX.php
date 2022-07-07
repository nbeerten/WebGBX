<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Added
use App\Classes\MapInfo\MapInfo;


class processGBX extends Controller
{
    public function upload(Request $request)
    {
        try {
            $map = new MapInfo($request->file('map')->get());
        } catch (\Exception $e) {
            abort(400, "Map wasn't able to be parsed: " . $e->getMessage());
        }
        /* The collect function turns the array into a collection (string thing in laravel that is able to be stored in session) */
        $mapinfo = collect($map->format());
        $map->thumbnail();

        $request->session()->put('mapinfo.' . $mapinfo['uid'], $mapinfo);
        $request->session()->push('user.openmaps', ['uid' => $mapinfo['uid'], 'name' => $mapinfo['name']]);

        return redirect(route('maps.view').'#'.$mapinfo['uid']);
    }

    public function open(Request $request)
    {
        $validated = $request->validate([
            'map' => 'bail|file|max:51200|mimetypes:application/octet-stream',
        ]);

        try {
            $MapInfo = new MapInfo($request->file('map')->get());
        } catch (\Exception $e) {
            abort(400, "Map wasn't able to be parsed: " . $e->getMessage());
        }
        /* The collect function turns the array into a collection (string thing in laravel that is able to be stored in session) */
        $MapInfo = collect($MapInfo->get());

        $request->session()->put('mapinfo.' . $MapInfo['uid'], $MapInfo);
        $request->session()->push('user.openmaps', ['uid' => $MapInfo['uid'], 'name' => $MapInfo['name']['plain']]);

        return redirect(route('home')."#{$MapInfo['uid']}");
    }
}
