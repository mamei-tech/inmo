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

        Route::get('guide/indexAdmin', 'GuideController@indexAdmin')->name('guide.index_admin');
        Route::any('guide/read', 'GuideController@read')->name('guide.read');
        Route::get('guide/create', 'GuideController@create')->name('guide.create');
        Route::post('guide', 'GuideController@store')->name('guide.store');
        Route::delete('guide/{guide}', 'GuideController@destroy')->name('guide.destroy');
        Route::get('guide/{guide}/edit', 'GuideController@edit')->name('guide.edit');
        Route::put('guide/{guide}', 'GuideController@update')->name('guide.update');

        Route::any('testimonials/read', 'TestimonialsController@read')->name('testimonials.read');
        Route::resources([
            "testimonials" => "TestimonialsController"
        ]);

        Route::any('contacts/read', 'ContactsController@read')->name('contacts.read');
        Route::post('contacts/changeNotificationsToReaded', 'ContactsController@changeNotificationsToReaded')->name('contacts.changeNotifications');
        Route::post('contacts/checkNotifications', 'ContactsController@checkNotifications')->name('contacts.checkNotifications');
        Route::resources([
            "contacts" => "ContactsController"
        ]);

        Route::get('emails', 'EmailController@index')->name('emails');
        Route::any('emails/readGuide', 'EmailController@readGuide')->name('emails.readGuide');
        Route::any('emails/readContact', 'EmailController@readContact')->name('emails.readContact');
        Route::delete('emails/{email}', 'EmailController@destroy')->name('emails.destroy');

        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::put('profile/{profile}', 'ProfileController@update')->name('profile.update');

        Route::get('users', 'UserController@index')->name('users');
        Route::any('users/read', 'UserController@read')->name('users.read');
        Route::post('users/lock', 'UserController@lock')->name('users.lock');
    });
    //Route::auth();

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('password/set', 'Auth\ResetPasswordController@showSetForm')->name('password.set');
    Route::post('password/set', 'Auth\ResetPasswordController@setPassword');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->name('auth.register');
    Route::get('verify', 'Auth\RegisterController@verify')->name('auth.verify');
    Route::get('resend_token', 'Auth\RegisterController@resend')->name('auth.resend');
    Route::get('register_email_verification', 'Auth\RegisterController@registerEmailVerification')->name('auth.register_email_verification');

    Route::get('', 'HomeController@index')->name('home');
    Route::get('admin', 'AdminController@Index')->name('admin');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('neighborhoods', 'NeighborhoodController@index')->name('neighborhoods');
    Route::get('houses', 'NeighborhoodController@houses')->name('houses');
    Route::get('infoHouse', 'NeighborhoodController@infoHouse')->name('infoHouses');
    Route::get('guides', 'GuideController@index')->name('guides');
    Route::get('about', 'AboutMeController@index')->name('about');
    Route::get('contacts', 'ContactsController@indexWeb')->name('contacts');
    Route::get('Blogs', 'BlogController@indexWeb')->name('blog');

    Route::post('guideSendEmail', 'GuideController@sendEmail')->name('guide.sendEmail');
    Route::post('testimonials', 'ContactsController@storeTestimonials')->name('contact.storeTestimonials');

    Route::get('login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('auth.redirectToProvider');
    Route::get('login/callback/{provider}', 'Auth\LoginController@@handleProviderCallback')->name('auth.handleProviderCallback');
});
