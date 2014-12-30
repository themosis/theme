// Watch styles task requirements
var config      = require('../config');
var gulp        = require('gulp');
var browserSync = require('browser-sync');

// Watch styles task
gulp.task('watch-styles', ['browser-sync'], function() {
    gulp.watch(config.paths.src.styles.all, ['styles', browserSync.reload]);
});
