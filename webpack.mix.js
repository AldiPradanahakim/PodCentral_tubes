const mix = require('laravel-mix');

mix.css('resources/css/home.css', 'public/css')
   .js('resources/js/home.js', 'public/js');
