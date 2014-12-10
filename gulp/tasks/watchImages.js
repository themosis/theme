// Watch images task requirements
var config = require('../config');
var gulp   = require('gulp');

// Watch images task
gulp.task('watchImages', function() {
    gulp.watch(config.paths.src.images.all, ['images']);
});
