const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/userPage.scss', 'public/css');

mix.disableNotifications();
