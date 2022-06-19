<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Added
use Illuminate\Support\Facades\Cache;

class getThumbnail extends Controller
{
    public function get($id)
    {
        $thumbnail = Cache::pull('thumbnail/'.$id);

        if($thumbnail !== null) {
            return response($thumbnail)->header('Content-Type', 'image/jpg');
        } else {
            return abort(404);
        }
        
    }
}
