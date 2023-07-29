const mix = require('laravel-mix'),
    webpack = require('webpack');

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

mix
    .js('assets/js/site.js', 'public/js')
    .sass('assets/scss/site.scss', 'public/css')
    .sass('src/scss/editor.scss', 'public/css')
    .copy('assets/fonts/', 'public/fonts/')
    .copy('assets/scss/images/', 'public/images/')

    .combine
    ([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/foundation-sites/dist/js/foundation.min.js',
    ], 'public/js/vendor.js')

    .options({
        processCssUrls: false,
    })

.webpackConfig({
    resolve: {
        modules: [
            'node_modules'
        ],
    },
     plugins: [
         new webpack.LoaderOptionsPlugin({
             test: /\.s[ac]ss$/,
             options: {
                 includePaths: ['resources/assets/sass', 'node_modules/foundation-site/scss']
             }
        })
    ]
});
 