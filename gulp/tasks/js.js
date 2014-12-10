// JS task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var changed       = require('gulp-changed');

// JS task
gulp.task('js', function() {
    return gulp.src(config.paths.src.scripts.js)
        .pipe(changed(config.paths.dist.js))
        .pipe(gulp.dest(config.paths.dist.js))
        .pipe(handleSuccess(config.notify.messages.js));
});
