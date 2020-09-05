let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix
  .js('src/js/app.js', 'dist/js')
  .sass('src/sass/app.sass', 'dist/css')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  })
  .browserSync({
    proxy: 'http://localhost/vallunizate/',
    open: false,
    files: ['dist/css/app.css', 'dist/js/app.js', './**/*.+(html|php)'],
  })
  .sourceMaps(true, 'source-map');
