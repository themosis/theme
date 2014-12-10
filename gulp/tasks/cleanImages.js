// Clean images task requirements
var config = require('../config');
var gulp   = require('gulp');
var clean  = require('gulp-clean');

// Clean images task
gulp.task('cleanImages', function() {
    return gulp.src(config.paths.dist.images)
        .pipe(clean({
            read: false
        }));
});
