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

mix.js('resources/js/app.js', 'public/js').vue({ version: 2 })
  .js('resources/js/partials/layouts/backend.js', 'public/js/partials/layouts').vue({ version: 2 })
  .js('resources/js/partials/restaurants/create.js', 'public/js/partials/restaurants').vue({ version: 2 })
  .sass('resources/sass/style.scss', 'public/css')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/partials/guests/style.scss', 'public/css');
  

   
