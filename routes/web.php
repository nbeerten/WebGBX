<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parseGBX_old;
use App\Http\Controllers\parseGBX;
use App\Http\Controllers\getThumbnail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('input');
});

Route::get('/gbx_old', [parseGBX_old::class, 'index']);
Route::get('/tmio', [parseGBX_old::class, 'tmiotest']);

Route::get('/gbx', parseGBX::class);
Route::get('/gbx/thumbnail/{id}', [getThumbnail::class, 'get']);