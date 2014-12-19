// Watch scripts task requirements
var config = require('../config');
var gulp   = require('gulp');

// Watch scripts task
gulp.task('watch-scripts', function() {
    gulp.watch(config.paths.src.scripts.all, ['scripts']);
});
