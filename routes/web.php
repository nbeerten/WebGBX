<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\processGBX;
use App\Http\Controllers\viewGBX;

use App\Http\Controllers\getThumbnail;
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

Route::get('/', [viewGBX::class, 'view'])
    ->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::post('/open', [processGBX::class, 'open'])
    ->name('open')->middleware('throttle:open');

/**
 * Routes for actions on a map
 * /maps/{mapid}/{action}
 */
Route::prefix('map/{id}')->name('map.')->group(function () {
    Route::get('/delete', deleteMapByID::class)                 ->name('delete');
    Route::get('/Thumbnail.jpg', [getThumbnail::class, 'get'])  ->name('thumbnail');
    Route::get('/thumbnail', [getThumbnail::class, 'get']);
});

Route::get('/gbx/{id}/delete', deleteMapByID::class)
    ->name('gbxiddelete')->name('gbx.delete');

Route::get('/gbx/thumbnail/{id}', [getThumbnail::class, 'get'])
    ->name('gbxthumbnail');

Route::get('/gbx/{id}/thumbnail', [getThumbnail::class, 'get'])
    ->name('gbx.thumbnail');

Route::any('/flush', function () {
    Request::session()->flush();
});
