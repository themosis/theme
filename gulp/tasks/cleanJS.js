// Clean JS task requirements
var config     = require('../config');
var gulp       = require('gulp');
var del        = require('del');
var vinylPaths = require('vinyl-paths');

// Clean JS task
gulp.task('cleanJS', function() {
    return gulp.src(config.paths.dist.js)
        .pipe(vinylPaths(del));
});
