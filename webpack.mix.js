let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/assets/js/app.js', 'public/js');
mix.copy('resources/assets/js/bootstrap.min.js', 'public/js');
mix.copy('resources/assets/js/jquery.min.js', 'public/js');
//mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/site.css'
], 'public/css/site.css');

mix.copy('resources/assets/images', 'public/images');
mix.copy('resources/assets/fonts', 'public/fonts');