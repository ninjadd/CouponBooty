const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.webpackConfig({
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        }
    }
});

mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/build/fonts/bootstrap');

mix.js('node_modules/datatables.net/js/jquery.dataTables.js', 'public/js');

mix.sass('node_modules/datatables.net-dt/css/jquery.dataTables.css', 'public/css');

mix.js('node_modules/datatables.net-bs/js/dataTables.bootstrap.js', 'public/js')
    .sass('node_modules/datatables.net-bs/css/dataTables.bootstrap.css', 'public/css');

