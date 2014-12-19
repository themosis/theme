// Watch fonts task requirements
var config = require('../config');
var gulp   = require('gulp');

// Watch fonts task
gulp.task('watch-fonts', function() {
    gulp.watch(config.paths.src.fonts.all, ['fonts']);
});
