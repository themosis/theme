// Sass task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var handleErrors  = require('../util/handleErrors');
var gulp          = require('gulp');
var gulpif        = require('gulp-if');
var changed       = require('gulp-changed');
var sourcemaps    = require('gulp-sourcemaps');
var sass          = require('gulp-sass');
var autoprefixer  = require('gulp-autoprefixer');
var minifyCSS     = require('gulp-minify-css');
var cssshrink     = require('gulp-cssshrink');

// Sass task
gulp.task('sass', function() {
    return gulp.src(config.paths.src.styles.sass)
        .pipe(changed(config.paths.dist.css))
        .pipe(gulpif(config.environment === 'local', sourcemaps.init()))
        .pipe(sass(config.sass))
        .on('error', handleErrors)
        .pipe(autoprefixer(config.autoprefixer))
        .pipe(minifyCSS(config.minifyCSS))
        .pipe(cssshrink())
        .pipe(gulpif(config.environment === 'local', sourcemaps.write()))
        .pipe(gulp.dest(config.paths.dist.css))
        .pipe(handleSuccess(config.notify.messages.sass));
});
