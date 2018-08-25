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

mix.sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .styles([
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/mobirise.css',
        'resources/assets/css/mobirise-slider.css',
        'resources/assets/css/site.css',
    ],
    'public/css/app.css').sourceMaps();

mix.js([
    'resources/assets/js/app.js',
    'resources/assets/js/smoothScroll.js',
    'resources/assets/js/carousel-swipe.js',
    'resources/assets/js/jarallax.js',
    'resources/assets/js/mobirise.js',
], 'public/js/app.js').sourceMaps();

mix.js('resources/assets/js/views/home.js', 'public/js/home.js').sourceMaps();
mix.js('resources/assets/js/views/neighborhood.js', 'public/js/neighborhood.js').sourceMaps();
mix.js('resources/assets/js/views/houseInfo.js', 'public/js/houseInfo.js').sourceMaps();
mix.js('resources/assets/js/views/aboutMe.js', 'public/js/aboutMe.js').sourceMaps();
mix.js('resources/assets/js/views/contacts.js', 'public/js/contacts.js').sourceMaps();

