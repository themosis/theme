// Fonts task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var changed       = require('gulp-changed');

// Fonts task
gulp.task('fonts', ['clean-fonts'], function() {
    return gulp.src(config.paths.src.fonts.all)
        .pipe(gulp.dest(config.paths.dist.fonts.path))
        .pipe(handleSuccess(config.notify.messages.fonts));
});
