// Clean js task requirements
var handleSuccess = require('../util/handleSuccess');
var config        = require('../config');
var gulp          = require('gulp');
var del           = require('del');
var vinylPaths    = require('vinyl-paths');

// Clean js task
gulp.task('clean-js', function() {
    return gulp.src(config.paths.dist.js.path)
        .pipe(vinylPaths(del))
        .pipe(handleSuccess(config.notify.messages.cleanJS));
});
