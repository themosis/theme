// Watch images task requirements
var config = require('../config');
var gulp   = require('gulp');

// Watch images task
gulp.task('watch-images', function() {
    gulp.watch(config.paths.src.images.all, ['images']);
});
