// Images task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var runSequence   = require('run-sequence');
var changed       = require('gulp-changed');
var imagemin      = require('gulp-imagemin');

// Images task
gulp.task('images', function() {
    runSequence(
        'clean-images',
        function() {
            return gulp.src(config.paths.src.images.all)
                .pipe(changed(config.paths.dist.images.path))
                .pipe(imagemin(config.imagemin))
                .pipe(gulp.dest(config.paths.dist.images.path))
                .pipe(handleSuccess(config.notify.messages.images));
        }
    );
});
