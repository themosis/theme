// Clean task requirements
var config     = require('../config');
var gulp       = require('gulp');
var del        = require('del');
var vinylPaths = require('vinyl-paths');

// Clean task
gulp.task('clean', function() {
    return gulp.src(config.paths.dist.path)
        .pipe(vinylPaths(del));
});
