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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ])
    .postCss('node_modules/select2/dist/css/select2.min.css', 'public/css')

mix.js('resources/js/chart.js', 'public/js').sourceMaps();

// mix.js('resources/js/tomSelect.js', 'public/js').sourceMaps();

// mix.js('resources/js/bootstrap.js', 'public/js').sourceMaps();

mix.browserSync('127.0.0.1:8000');

// mix.copy('node_modules/chart.js/dist/chart.js', 'public/js/chart.js');