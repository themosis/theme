// Clean JS task requirements
var config = require('../config');
var gulp   = require('gulp');
var clean  = require('gulp-clean');

// Clean JS task
gulp.task('cleanJS', function() {
    return gulp.src(config.paths.dist.js)
        .pipe(clean({
            read: false
        }));
});
