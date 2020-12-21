const mix = require('laravel-mix'),
webpack = require('webpack');
//purgecss = require('@fullhuman/postcss-purgecss');

//require('laravel-mix-purgecss');

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
    .sass('src/scss/editor.scss', 'public/css/blocks')
    .copy('assets/fonts/', 'public/fonts/')
    .copy('assets/scss/images/', 'public/images/')

    .combine
    ([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/foundation-sites/dist/js/foundation.min.js',
    ], 'public/js/vendor.js')


    // .purgeCss({
    //     extend: {
    //         content: [
    //             path.join(__dirname,  "*.php"),
    //             path.join(__dirname,  "parts/*.php"),
    //             path.join(__dirname,  "assets/js/vue/*.vue"),
    //     ],
    //         whitelistPatterns: [/hljs/],
    //     },
    // })
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
 