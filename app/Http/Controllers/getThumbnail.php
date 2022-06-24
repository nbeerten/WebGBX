<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Added
use Illuminate\Support\Facades\Cache;

class getThumbnail extends Controller
{
    public function get(Request $request, $id)
    {
        $thumbnail =  $request->session()->get('mapthumbnail.' . $id);
        

        if($thumbnail !== null) {
            return response($thumbnail)->header('Content-Type', 'image/jpg');
        } else {
            return abort(404);
        }
        
    }
}
