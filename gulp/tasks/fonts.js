// Fonts task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var runSequence   = require('run-sequence');
var changed       = require('gulp-changed');

// Fonts task
gulp.task('fonts', function() {
    runSequence(
        'clean-fonts',
        function() {
            return gulp.src(config.paths.src.fonts.all)
                .pipe(changed(config.paths.dist.fonts.path))
                .pipe(gulp.dest(config.paths.dist.fonts.path))
                .pipe(handleSuccess(config.notify.messages.fonts));
        }
    );
});
