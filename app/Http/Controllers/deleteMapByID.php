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

        return redirect()->route('home');;
    }
}
