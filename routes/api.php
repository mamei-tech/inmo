<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->namespace('App\Http\Controllers\Api')->group(function () {

    Route::resource('/advance_search', 'AdvanceSearchController')
        ->only(['index'])
        ->name('index', 'v1.config.index');
    Route::post('/advance_search/allpostbyyear', 'AdvanceSearchController@postbyyear')->name('v1.advancesearch.allbyyear');
});
