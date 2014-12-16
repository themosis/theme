// Clean fonts task requirements
var config     = require('../config');
var gulp       = require('gulp');
var del        = require('del');
var vinylPaths = require('vinyl-paths');

// Clean fonts task
gulp.task('cleanFonts', function() {
    return gulp.src(config.paths.dist.fonts)
        .pipe(vinylPaths(del));
});
