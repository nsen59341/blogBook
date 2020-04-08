const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/font-awesome.min.css'
    'resources/assets/css/now-ui-dashboard.css',
    'resources/assets/css/now-ui-dashboard.min.css'
], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/core/jquery.min.js',
    'resources/assets/js/core/bootstrap.min.js',
    'resources/assets/js/core/popper.min.js',
    'resources/assets/js/plugins/bootstrap-notify.js',
    'resources/assets/js/plugins/chartjs.min.js',
    'resources/assets/js/plugins/perfect-scrollbar.jquery.min.js',
    'resources/assets/js/now-ui-dashboard.js',
    'resources/assets/js/now-ui-dashboard.min.js'
], 'public/js/libs.js');