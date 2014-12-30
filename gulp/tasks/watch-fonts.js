// Watch fonts task requirements
var config      = require('../config');
var gulp        = require('gulp');
var browserSync = require('browser-sync');

// Watch fonts task
gulp.task('watch-fonts', ['browser-sync'], function() {
    gulp.watch(config.paths.src.fonts.all, ['fonts', browserSync.reload]);
});
