// Watch fonts task requirements
var config = require('../config');
var gulp   = require('gulp');

// Watch fonts task
gulp.task('watchFonts', function() {
    gulp.watch(config.paths.src.fonts.all, ['fonts']);
});
