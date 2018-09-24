<?php

Route::prefix('{lang?}')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::any('promotion/read', 'PromotionController@read')->name('promotion.read');
        Route::any('promotion/readMain', 'PromotionController@readMain')->name('promotion.readMain');
        Route::resources([
            "promotion" => "PromotionController"
        ]);
        Route::any('slider/read', 'SliderController@read')->name('slider.read');
        Route::resources([
            "slider" => "SliderController"
        ]);
        Route::get('config/logo', 'ConfigController@showConfigLogo')->name('config.logo');
        Route::post('config/logo', 'ConfigController@configLogo');

        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::put('profile/{profile}', 'ProfileController@update')->name('profile.update');
    });
    //Route::auth();

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('password/set', 'Auth\ResetPasswordController@showSetForm')->name('password.set');
    Route::post('password/set', 'Auth\ResetPasswordController@setPassword');

    Route::get('', 'HomeController@index')->name('home');
    Route::get('admin', 'AdminController@Index')->name('admin');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('neighborhoods', 'NeighborhoodController@index')->name('neighborhoods');
    Route::get('houses', 'NeighborhoodController@houses')->name('houses');
    Route::get('infoHouse', 'NeighborhoodController@infoHouse')->name('infoHouses');
    Route::get('guides', 'GuidesController@index')->name('guides');
    Route::get('about', 'AboutMeController@index')->name('about');
    Route::get('contacts', 'ContactsController@index')->name('contacts');
});
