<?php

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

/*Route::get('/', 'HomeController@index') -> name('home');
Route::get('/neighborhood', 'NeighborhoodController@index') -> name('neighborhood');
Route::get('/house', 'HouseInfoController@index') -> name('houseInfo');
Route::get('/about', 'AboutMeController@index') -> name('aboutMe');
Route::get('/contacts', 'ContactsController@index') -> name('contacts');
Route::post('/contacts/send', 'ContactsController@send') -> name('sendContact');
*/
// Main GET routes with locale



Route::prefix('{lang?}')->middleware('locale')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::any('/promotion/read', 'PromotionController@read')->name('promotion.read');
        Route::resources([
            "promotion" => "PromotionController"
        ]);
    });
    Route::auth();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/admin', 'AdminController@Index')->name('admin');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/neighborhoods', 'NeighborhoodController@index')->name('neighborhoods');
    Route::get('/guides', 'GuidesController@index')->name('guides');
    Route::get('/about', 'AboutMeController@index')->name('about');
    Route::get('/contacts', 'ContactsController@index')->name('contacts');
});