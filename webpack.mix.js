
let mix = require('laravel-mix');

mix .js('src/js/main.js', 'build').setPublicPath('build')
    .sass('src/css/main.scss', 'build')
    .options({
       postCss: [require('tailwindcss'), require('autoprefixer')],
    })
    .extract();
