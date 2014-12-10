// Clean fonts task requirements
var config = require('../config');
var gulp   = require('gulp');
var clean  = require('gulp-clean');

// Clean fonts task
gulp.task('cleanFonts', function() {
    return gulp.src(config.paths.dist.fonts)
        .pipe(clean({
            read: false
        }));
});
