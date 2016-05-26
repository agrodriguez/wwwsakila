var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
//.coffee('module.coffee')
elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css');

    mix.styles([
    	'libs/bootstrap.min.css',    	
    	'app.css',
        'libs/ie10-viewport-bug-workaround.css',
    	'libs/select2.min.css'
    ]);

    mix.scripts([
    	'libs/jquery.min.js',
    	'libs/bootstrap.min.js',
        'libs/ie10-viewport-bug-workaround.js',
    	'libs/select2.min.js'
    ]);

    mix.version('public/css/all.css');
});


