
let mix = require('laravel-mix');
let { ThemeJsonPlugin } = require( 'theme-json-generator' );

mix .js('src/js/main.js', 'build').setPublicPath('build')
    .sass('src/css/main.scss', 'build')
    .sass('src/css/editor.scss', 'build')
    .options({
       postCss: [require('tailwindcss'), require('autoprefixer')],
    })
    .webpackConfig({
      plugins: [
        new ThemeJsonPlugin( {
          from: './theme.config.js',
          to: './theme.json',
         } ),
      ],
    })
    .extract();
