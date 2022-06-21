<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parseGBX_old;
use App\Http\Controllers\parseGBX;
use App\Http\Controllers\getThumbnail;
use App\Http\Controllers\getMapByID;
use App\Http\Controllers\deleteMapByID;

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
    return view('home');
})  ->name('home');

Route::post('/gbx', parseGBX::class)
    ->name('gbx');

Route::get('/gbx/{id}', [getMapByID::class, 'get'])
    ->name('gbxid');

Route::get('/gbx/{id}/delete', deleteMapByID::class)
    ->name('gbxiddelete');

Route::get('/gbx/thumbnail/{id}', [getThumbnail::class, 'get']);