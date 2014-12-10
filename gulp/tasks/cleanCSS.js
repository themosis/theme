// Clean css task requirements
var config = require('../config');
var gulp   = require('gulp');
var clean  = require('gulp-clean');

// Clean css task
gulp.task('cleanCSS', function() {
    return gulp.src(config.paths.dist.css)
        .pipe(clean({
            read: false
        }));
});
