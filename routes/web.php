<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parseGBX;

use App\Http\Controllers\processGBX;
use App\Http\Controllers\viewGBX;

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

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::post('/gbx', [processGBX::class, 'upload'])
    ->name('gbx');

Route::post('/open', [processGBX::class, 'open'])
    ->name('open');

Route::get('/', [viewGBX::class, 'view'])
    ->name('home');

Route::get('/maps', [viewGBX::class, 'view'])
    ->name('maps.view');

Route::get('/gbx/{id}/delete', deleteMapByID::class)
    ->name('gbxiddelete')->name('gbx.delete');

Route::get('/gbx/thumbnail/{id}', [getThumbnail::class, 'get'])
    ->name('gbxthumbnail');

Route::get('/gbx/{id}/thumbnail', [getThumbnail::class, 'get'])
    ->name('gbx.thumbnail');

Route::any('/flush', function () {
    Request::session()->flush();
});
