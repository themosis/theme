// Clean images task requirements
var handleSuccess = require('../util/handleSuccess');
var config        = require('../config');
var gulp          = require('gulp');
var del           = require('del');
var vinylPaths    = require('vinyl-paths');

// Clean images task
gulp.task('clean-images', function() {
    return gulp.src(config.paths.dist.images.path)
        .pipe(vinylPaths(del))
        .pipe(handleSuccess(config.notify.messages.cleanImages));
});
