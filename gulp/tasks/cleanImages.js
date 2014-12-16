// Clean images task requirements
var config     = require('../config');
var gulp       = require('gulp');
var del        = require('del');
var vinylPaths = require('vinyl-paths');

// Clean images task
gulp.task('cleanImages', function() {
    return gulp.src(config.paths.dist.images)
        .pipe(vinylPaths(del));
});
