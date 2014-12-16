// Clean css task requirements
var config     = require('../config');
var gulp       = require('gulp');
var del        = require('del');
var vinylPaths = require('vinyl-paths');

// Clean css task
gulp.task('cleanCSS', function() {
    return gulp.src(config.paths.dist.css)
        .pipe(vinylPaths(del));
});
