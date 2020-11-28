/*
 * Projekt  Larahorse
 * ----------------------------------------------------
 *
 * Copyright (c) 2020-2020,  Roland Kruggel
 * All Rights Reserved.
 * License: MIT
 *
 * @author		Roland Kruggel, rkruggel@bbf7.de
 * @file		webpack.mix.js
 * @path		/home/roland/Develop/Larahorse/webpack.mix.js
 * @lastChange	20.11.20, 10:22 by roland
 */

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

/*
 | Info
 |   https://laravel.com/docs/7.x/frontend
 |   https://laravel.com/docs/7.x/mix
 */

mix.js('resources/js/app.js', 'public/js');
/*
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
*/


mix.sass('resources/sass/app.sass', 'public/css');

/*
mix.styles([
    'public/css/tmpcompile/app.css',
    'public/css/tmpcompile/triva.css'
], 'public/css/main.css');
*/

