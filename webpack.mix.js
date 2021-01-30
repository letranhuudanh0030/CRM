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
.js('resources/js/script.js', 'public/js')
    // .js('./node_modules/admin-lte/build/js/AdminLTE.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/jszip/jszip.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/pdfmake/pdfmake.min.js', 'public/js')
    // .js('./node_modules/admin-lte/plugins/pdfmake/vfs_fonts.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    // .sass('./node_modules/admin-lte/build/scss/AdminLTE.scss', 'public/css')
    // .copy('./node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css/fontawesome-free')
    // .copy('./node_modules/admin-lte/plugins/fontawesome-free/webfonts', 'public/css/webfonts')
    // .copy('./node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js')
    // .copy('./node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.js', 'public/js')
    // .copy('./node_modules/admin-lte/dist/img', 'public/dist/img')
    // .copy('./node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css', 'public/css')
    // .copy('./node_modules/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css', 'public/css')
    // .copy('./node_modules/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css', 'public/css')
    ;
