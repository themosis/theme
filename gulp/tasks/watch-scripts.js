// Watch scripts task requirements
var config      = require('../config');
var gulp        = require('gulp');
var browserSync = require('browser-sync');

// Watch scripts task
gulp.task('watch-scripts', ['browser-sync'], function() {
    gulp.watch(config.paths.src.scripts.all, ['scripts', browserSync.reload]);
});
