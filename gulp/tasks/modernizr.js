// Modernizr task requirements
var handleSuccess = require('../util/handleSuccess');
var config        = require('../config');
var gulp          = require('gulp');
var modernizr     = require('gulp-modernizr');

// Modernizr task
gulp.task('modernizr', ['javascript'], function() {
    return gulp.src([config.paths.dist.js.main, config.paths.src.styles.all])
        .pipe(modernizr(config.modernizr))
        .pipe(gulp.dest(config.paths.dist.js.path))
        .pipe(handleSuccess(config.notify.messages.modernizr));
});
