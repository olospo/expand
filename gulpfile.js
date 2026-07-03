const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');

const paths = {
  scss: './css/**/*.scss',
  cssDest: './css/',
  js: './js/vendor/*.js',
  jsDest: './js/'
};

function css() {
  return src(paths.scss)
    .pipe(
      sass({
        silenceDeprecations: ['legacy-js-api', 'import']
      }).on('error', sass.logError)
    )
    .pipe(concat('main.css'))
    .pipe(cleanCSS())
    .pipe(dest(paths.cssDest));
}

function javascript() {
  return src(paths.js)
    .pipe(concat('application.min.js'))
    .pipe(
      uglify().on('error', function (err) {
        console.error(err.toString());
        this.emit('end');
      })
    )
    .pipe(dest(paths.jsDest));
}

function watchFiles() {
  watch(paths.scss, css);
  watch(paths.js, javascript);
}

const build = parallel(css, javascript);

exports.css = css;
exports.javascript = javascript;
exports.build = build;
exports.watch = watchFiles;
exports.default = series(build, watchFiles);