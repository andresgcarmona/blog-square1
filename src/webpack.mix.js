const mix = require('laravel-mix')

require('laravel-mix-purgecss')

mix.js('resources/js/app.js', 'public/js')
	.extract()

mix.sass('resources/sass/app.scss', 'public/css')

mix.copy('node_modules/izitoast/dist/css/iziToast.min.css', 'public/assets/vendor/izitoast')in
mix.webpackConfig(require('./webpack.config'))

if(mix.inProduction()) {
	mix.purgeCss().sourceMaps()
}

mix.version()
