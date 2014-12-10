// Clean task requirements
var config = require('../config');
var gulp   = require('gulp');
var clean  = require('gulp-clean');

// Clean task
gulp.task('clean', function() {
    return gulp.src(config.paths.dist.all)
        .pipe(clean({
            read: false
        }));
});
