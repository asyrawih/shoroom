// const mix = require('laravel-mix');
// const browserSync = require('browser-sync');
// require('laravel-mix-purgecss');

// mix
//   .js('resources/js/app.js', 'public/js')
//   .postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('postcss-nested'),
//     require('autoprefixer'),
//   ])
//   .options({
//     processCssUrls: false,
//     postCss: [tailwindcss('./tailwind.config.js')],
//   }).purgeCss()
//   // .browserSync('showroom.test');


const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

require('laravel-mix-purgecss');
const browserSync = require('browser-sync');
mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css')
   .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .browserSync('showroom.test')
    .purgeCss();