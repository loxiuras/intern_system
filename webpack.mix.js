const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.postCss('resources/css/argon-dashboard.css', 'public/css', [])
   .postCss('resources/css/nucleo-icons.css', 'public/css', [])
   .postCss('resources/css/nucleo-svg.css', 'public/css', []);

mix.js('resources/js/plugins/**.js', 'public/js/plugins');
