// Clean fonts task requirements
var handleSuccess = require('../util/handleSuccess');
var config        = require('../config');
var gulp          = require('gulp');
var del           = require('del');
var vinylPaths    = require('vinyl-paths');

// Clean fonts task
gulp.task('clean-fonts', function() {
    return gulp.src(config.paths.dist.fonts.path)
        .pipe(vinylPaths(del))
        .pipe(handleSuccess(config.notify.messages.cleanFonts));
});
