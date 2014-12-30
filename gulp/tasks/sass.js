// Sass task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var handleErrors  = require('../util/handleErrors');
var gulp          = require('gulp');
var gulpif        = require('gulp-if');
var sourcemaps    = require('gulp-sourcemaps');
var sass          = require('gulp-sass');

// Sass task
gulp.task('sass', function() {
    return gulp.src(config.paths.src.styles.main)
        .pipe(gulpif(config.environment === 'local', sourcemaps.init(config.sourcemaps.styles.init)))
        .pipe(sass(config.sass))
        .on('error', handleErrors)
        .pipe(gulpif(config.environment === 'local', sourcemaps.write(config.sourcemaps.styles.write)))
        .pipe(gulp.dest(config.paths.dist.css.path))
        .pipe(handleSuccess(config.notify.messages.sass));
});
