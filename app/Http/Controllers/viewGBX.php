<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewGBX extends Controller
{
    public function view(Request $request, $id)
    {
        $mapinfo = $request->session()->get('mapinfo.' . $id);
        $thumbnail = $request->session()->get('mapthumbnail.' . $id);
        

        return view('gbx.map')
                    ->with('map', $mapinfo)
                    ->with('thumbnail', $thumbnail);
        
    }
}