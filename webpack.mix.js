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

/* Mix Config */
mix.setPublicPath('public/');
mix.setResourceRoot('../../');

//mix.js('resources/assets/js/app.js', 'public/js');
// mix.sass('resources/assets/sass/app.scss', 'public/css/bootstrap.min.css');

// mix.copyDirectory('resources/fonts', 'public/fonts');


mix.js('resources/assets/js/views/about_me.js', 'public/js/views');
mix.js('resources/assets/js/views/blog.js', 'public/js/views');
mix.js('resources/assets/js/views/contacts.js', 'public/js/views');
mix.js('resources/assets/js/views/guides.js', 'public/js/views');
mix.js('resources/assets/js/views/home.js', 'public/js/views');
mix.js('resources/assets/js/views/houseInfo.js', 'public/js/views');
mix.js('resources/assets/js/views/neighborhood.js', 'public/js/views');
mix.js('resources/assets/js/views/share.js', 'public/js/views');



mix.copy('resources/assets/js/libraries', 'public/js');
mix.copy('resources/assets/js/kendo', 'public/js/kendo');
mix.copy('resources/assets/css/', 'public/css/');


// STYLES

/* CSS external libraries folder */
mix.copyDirectory('resources/assets/css/libraries', 'public/css');
mix.copyDirectory('resources/assets/css/kendo', 'public/css/kendo');


mix.styles('resources/assets/css/about_me.css', 'public/css/about_me.css');
mix.styles('resources/assets/css/alertify.core.css', 'public/css/alertify.core.css');
mix.styles('resources/assets/css/alertify.default.css', 'public/css/alertify.default.css');
mix.styles('resources/assets/css/backend.css', 'public/css/backend.css');
mix.styles('resources/assets/css/blog.css', 'public/css/blog.css');
mix.styles('resources/assets/css/contacts.css', 'public/css/contacts.css');
mix.styles('resources/assets/css/cropper.css', 'public/css/cropper.css');
mix.styles('resources/assets/css/guides.css', 'public/css/guides.css');
mix.styles('resources/assets/css/home.css', 'public/css/home.css');
mix.styles('resources/assets/css/jquery.stellar.css', 'public/css/jquery.stellar.css');
mix.styles('resources/assets/css/neighborhood.css', 'public/css/neighborhood.css');
mix.styles('resources/assets/css/site.css', 'public/css/site.css');


mix.copy('resources/assets/images', 'public/images');
mix.copy('resources/assets/fonts', 'public/fonts');