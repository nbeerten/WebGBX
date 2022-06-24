<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Added
use Illuminate\Support\Facades\Cache;

class deleteMapByID extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        Cache::forget('mapinfo/'.$id);
        Cache::forget('thumbnail/'.$id);
        $request->session()->forget(['mapinfo.' . $id, 'mapthumbnail.' . $id]);
        $openmaps = $request->session()->get('user.openmaps'); // Second argument is a default value
        foreach ($openmaps as $key => $val) {
            if ($val['uid'] === $id) {
                unset($openmaps[$key]);
            }
        }
        $request->session()->put('user.openmaps', $openmaps);

        return redirect()->route('home');
    }
}
