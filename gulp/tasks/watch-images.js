// Watch images task requirements
var config      = require('../config');
var gulp        = require('gulp');
var browserSync = require('browser-sync');

// Watch images task
gulp.task('watch-images', ['browser-sync'], function() {
    gulp.watch(config.paths.src.images.all, ['images', browserSync.reload]);
});
