// Clean css task requirements
var handleSuccess = require('../util/handleSuccess');
var config        = require('../config');
var gulp          = require('gulp');
var del           = require('del');
var vinylPaths    = require('vinyl-paths');

// Clean css task
gulp.task('clean-css', function() {
    return gulp.src(config.paths.dist.css.path)
        .pipe(vinylPaths(del))
        .pipe(handleSuccess(config.notify.messages.cleanCSS));
});
