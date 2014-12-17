// Javascript task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var changed       = require('gulp-changed');
var uglify        = require('gulp-uglify');

// Javascript task
gulp.task('javascript', function() {
    return gulp.src(config.paths.src.scripts.js)
        .pipe(changed(config.paths.dist.js))
        .pipe(uglify())
        .pipe(gulp.dest(config.paths.dist.js))
        .pipe(handleSuccess(config.notify.messages.js));
});
