<?php

Route::prefix('{lang?}')->middleware(['web'])->group(function () {

    Route::namespace('App\Http\Controllers')->group(function () {

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
        Route::get('privacy', 'ProfileController@privacy')->name('privacy');
        Route::put('privacy/{profile}', 'ProfileController@privacyUpdate')->name('privacy.update');

            Route::get('users', 'UserController@index')->name('users');
            Route::any('users/read', 'UserController@read')->name('users.read');
            Route::post('users/lock', 'UserController@lock')->name('users.lock');
        });

        Route::group(['middleware' => 'web'], function () {

            Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
            Route::post('login', 'Auth\LoginController@login')->name('dologin');
            Route::post('logout', 'Auth\LoginController@logout')->name('logout');
            Route::get('password/set', 'Auth\ResetPasswordController@showSetForm')->name('password.set');
            Route::post('password/set', 'Auth\ResetPasswordController@setPassword');

            // Password reset routes (make this only for email auth not for facebook/google)
            Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
            Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
            Route::post('password/reset', 'Auth\ResetPasswordController@reset');

            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'Auth\RegisterController@register')->middleware(['web'])->name('auth.register');
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
//            Route::get('blogs', 'BlogController@indexWeb')->middleware(['web'])->name('blog');
            Route::get('blogss', 'BlogController@indexWeb')->middleware(['web'])->name('blogs');

            Route::post('guideSendEmail', 'GuideController@sendEmail')->name('guide.sendEmail');
            Route::post('guideAddSubcriptor', 'GuideController@addSubcriptor')->name('guide.addSubcriptor');
            Route::post('testimonials', 'ContactsController@storeTestimonials')->name('contact.storeTestimonials');
        });

        Route::get('login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')
            ->name('auth.redirectToProvider')
            ->where('driver', implode('|', config('auth.socialite.drivers')));
        Route::get('login/callback/{provider}', 'Auth\LoginController@handleProviderCallback')->name('auth.handleProviderCallback');
    });


    //    BLOG URLS
    Route::namespace('WebDevEtc\BlogEtc\Controllers')->group(function () {

        /** The main public facing blog routes - show alHomeController l posts, view a category, rss feed, view a single post, also the add comment route */
        Route::group(['prefix' => config('blogetc.blog_prefix', 'blog')], function () {

            Route::get('/', 'BlogEtcReaderController@index')
                ->name('blog');

            Route::get('/mostpopular', 'BlogEtcReaderController@mostpopular')
                ->name('blogetc.mostpopular');

            Route::get('/search', 'BlogEtcReaderController@search')
                ->name('blogetc.search');

            Route::get('/feed', 'BlogEtcRssFeedController@feed')
                ->name('blogetc.feed'); //RSS feed

            Route::get('/category/{categorySlug?}',
                'BlogEtcReaderController@view_category')
                ->name('blogetc.view_category');

            Route::get('/{blogPostSlug?}',
                'BlogEtcReaderController@viewSinglePost')
                ->name('blogetc.single');


            // throttle to a max of 10 attempts in 3 minutes:
            Route::group(['middleware' => 'throttle:10,3'], function () {

                Route::post('save_comment/{blogPostSlug?}',
                    'BlogEtcCommentWriterController@addNewComment')
                    ->name('blogetc.comments.add_new_comment');


            });

        });


        /* Admin backend routes - CRUD for posts, categories, and approving/deleting submitted comments */
        Route::group(['prefix' => config('blogetc.admin_prefix', 'blog_admin')], function () {

            Route::get('/', 'BlogEtcAdminController@index')
                ->name('blogetc.admin.index');

            Route::get('/add_post',
                'BlogEtcAdminController@create_post')
                ->name('blogetc.admin.create_post');


            Route::post('/add_post',
                'BlogEtcAdminController@store_post')
                ->name('blogetc.admin.store_post');


            Route::get('/edit_post/{blogPostId}',
                'BlogEtcAdminController@edit_post')
                ->name('blogetc.admin.edit_post');

            Route::patch('/edit_post/{blogPostId}',
                'BlogEtcAdminController@update_post')
                ->name('blogetc.admin.update_post');


            Route::group(['prefix' => "image_uploads",], function () {

                Route::get("/", "BlogEtcImageUploadController@index")->name("blogetc.admin.images.all");

                Route::get("/upload", "BlogEtcImageUploadController@create")->name("blogetc.admin.images.upload");
                Route::post("/upload", "BlogEtcImageUploadController@store")->name("blogetc.admin.images.store");

            });


            Route::delete('/delete_post/{blogPostId}',
                'BlogEtcAdminController@destroy_post')
                ->name('blogetc.admin.destroy_post');

            Route::group(['prefix' => 'comments',], function () {

                Route::get('/',
                    'BlogEtcCommentsAdminController@index')
                    ->name('blogetc.admin.comments.index');

                Route::patch('/{commentId?}',
                    'BlogEtcCommentsAdminController@approve')
                    ->name('blogetc.admin.comments.approve');
                Route::delete('/{commentId?}',
                    'BlogEtcCommentsAdminController@destroy')
                    ->name('blogetc.admin.comments.delete');
            });

            Route::group(['prefix' => 'categories'], function () {

                Route::get('/',
                    'BlogEtcCategoryAdminController@index')
                    ->name('blogetc.admin.categories.index');

                Route::get('/add_category',
                    'BlogEtcCategoryAdminController@create_category')
                    ->name('blogetc.admin.categories.create_category');
                Route::post('/add_category',
                    'BlogEtcCategoryAdminController@store_category')
                    ->name('blogetc.admin.categories.store_category');

                Route::get('/edit_category/{categoryId}',
                    'BlogEtcCategoryAdminController@edit_category')
                    ->name('blogetc.admin.categories.edit_category');

                Route::patch('/edit_category/{categoryId}',
                    'BlogEtcCategoryAdminController@update_category')
                    ->name('blogetc.admin.categories.update_category');

                Route::delete('/delete_category/{categoryId}',
                    'BlogEtcCategoryAdminController@destroy_category')
                    ->name('blogetc.admin.categories.destroy_category');

            });

        });
    });
});

