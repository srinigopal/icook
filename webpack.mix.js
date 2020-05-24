const mix = require('laravel-mix');
require('laravel-mix-alias');
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

//setup aliases
mix.alias({
    '@': '/resources/js',
    '^': '/resources/css',
    '&': '/resources/assets',
    '*': '/resources/plugins',
    '~': '/node_modules'
});
mix
    .js([
        'resources/js/bootstrap.js',
        'resources/js/vue.js',        
    ], 'public/js/app.js')
    .js('resources/js/web.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').version()
    .sass('resources/sass/web.scss', 'public/css').version();


//main - contains top level components
    //    mix.js([
     //       'resources/js/_private/scripts/nav/top-menu.js'
     //   ], 'public/js/main.js');

 //public

        //signup
        mix.js([ 'resources/js/_public/scripts/signup/index.js' ], 'public/js/signup/index.js');

        //login
       mix.js([ 'resources/js/_public/scripts/login/index.js' ], 'public/js/login/index.js');
		
		 //organisation
       // mix.js([ 'resources/js/_public/scripts/organisation/index.js' ], 'public/js/organisation/index.js');
