const mix = require('laravel-mix');
const globImporter = require('node-sass-glob-importer');




mix.sass('resources/assets/sass/app.scss', 'public/css', {importer: globImporter()})
    .sass('resources/sass/vysotsky-productions-w-scss/app.scss', 'public/css', {importer: globImporter()})
    .version()
    .sourceMaps();

