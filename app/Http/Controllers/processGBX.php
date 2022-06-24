<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Added
use App\Classes\MapInfo\MapInfo;


class processGBX extends Controller
{
    public function upload(Request $request)
    {
        $map = new MapInfo($request->file('map')->get());

        /* The collect function turns the array into a collection (string thing in laravel that is able to be stored in session) */
        $mapinfo = collect($map->format());
        $map->thumbnail();

        $request->session()->put('mapinfo.' . $mapinfo['uid'], $mapinfo);
        $request->session()->push('user.openmaps', ['uid' => $mapinfo['uid'], 'name' => $mapinfo['name']]);

        return redirect()->route('gbxid', ['id' => $mapinfo['uid']]);
    }
}
