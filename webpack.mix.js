let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const purgecss = require('@fullhuman/postcss-purgecss')({
  content: [
    './views/**/*.+(html|twig|php)',
  ],

  defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath('dist');

mix.js('assets/js/theme.js', 'dist/js/theme.min.js')
    .sass('assets/sass/style.scss', 'dist/css/theme.css')
    .sass('assets/sass/woocommerce.scss', 'dist/css')
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('./tailwind.config.js'),
            ...process.env.NODE_ENV === 'production' ? [purgecss] : []
        ],
    })
    .browserSync({
        proxy: "http://themosis-test.me/",
        files: [
            "./assets/js/**/*.js",
            "./assets/sass/**/*.scss",
            "./views/**/*.+(html|twig|php)"
        ]
    });
