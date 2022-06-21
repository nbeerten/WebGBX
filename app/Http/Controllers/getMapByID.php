<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Added
use Illuminate\Support\Facades\Cache;
use App\Classes\OnlineMapServices\OnlineMapServices;

class getMapByID extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, $id)
    {
        $mapinfo = Cache::get('mapinfo/'.$id);

        if($mapinfo !== null) {
            $mapinfo = json_decode($mapinfo, JSON_OBJECT_AS_ARRAY);
            $thumbnail = '/gbx/thumbnail/' . $mapinfo['uid'];
            $OnlineMapServices = new OnlineMapServices($mapinfo['uid']);
            $OnlineMapServices = $OnlineMapServices->get();

            return view('gbx.map')
                    ->with('map', $mapinfo)
                    ->with('thumbnail', $thumbnail)
                    ->with('OnlineMapServices', $OnlineMapServices);
        } else {
            return abort(404, "Map deleted or expired.");
        }
    }
}
