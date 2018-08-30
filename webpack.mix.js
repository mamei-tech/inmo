let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Configuration SetUp
 |--------------------------------------------------------------------------
 |
 | Configuration for setting up all the conf we need
 |
 */

mix.setPublicPath('public/');
mix.setResourceRoot('../../');


/*
 |--------------------------------------------------------------------------
 | Mix Core
 |--------------------------------------------------------------------------
 |
 | Core Mixes
 |
 */

/* Assets Images */
mix.copy('resources/assets/images', 'public/images');

/* Assets Fonts */
mix.copy('resources/assets/fonts', 'public/fonts');

// mix.sass('resources/assets/sass/app.scss', 'public/css/app.css').sourceMaps();
mix.styles([
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/animate.css',
        'resources/assets/css/socicon.css',
        'resources/assets/css/mobirise.css',
        'resources/assets/css/mobirise-slider.css',
        'resources/assets/css/site.css',
    ],
    'public/css/site.css').sourceMaps();

mix.copy('resources/assets/js/jquery.min.js', 'public/js/jquery.min.js').sourceMaps();
mix.copy('resources/assets/js/bootstrap.js', 'public/js/bootstrap.js').sourceMaps();
mix.copy('resources/assets/js/smoothScroll.js', 'public/js/smoothScroll.js').sourceMaps();
mix.copy('resources/assets/js/carousel-swipe.js', 'public/js/carousel-swipe.js').sourceMaps();
mix.copy('resources/assets/js/jarallax.js', 'public/js/jarallax.js').sourceMaps();
mix.copy('resources/assets/js/mobirise.js', 'public/js/mobirise.js').sourceMaps();

//TODO esto me daba error
// mix.js([
//     'resources/assets/js/jquery.js',
//     'resources/assets/js/bootstrap.js',
//     'resources/assets/js/smoothScroll.js',
//     'resources/assets/js/carousel-swipe.js',
//     'resources/assets/js/jarallax.js',
//     'resources/assets/js/mobirise.js',
// ], 'public/js/app.js').sourceMaps();

mix.js('resources/assets/js/views/home.js', 'public/js/home.js').sourceMaps();
mix.js('resources/assets/js/views/neighborhood.js', 'public/js/neighborhood.js').sourceMaps();
mix.js('resources/assets/js/views/houseInfo.js', 'public/js/houseInfo.js').sourceMaps();
mix.js('resources/assets/js/views/aboutMe.js', 'public/js/aboutMe.js').sourceMaps();
mix.js('resources/assets/js/views/contacts.js', 'public/js/contacts.js').sourceMaps();

