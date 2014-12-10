// Fonts task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var changed       = require('gulp-changed');

// Fonts task
gulp.task('fonts', function() {
    return gulp.src(config.paths.src.fonts.all)
        .pipe(changed(config.paths.dist.fonts))
        .pipe(gulp.dest(config.paths.dist.fonts))
        .pipe(handleSuccess(config.notify.messages.fonts));
});
