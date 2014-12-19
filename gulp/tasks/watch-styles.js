// Watch styles task requirements
var config      = require('../config');
var gulp        = require('gulp');

// Watch styles task
gulp.task('watch-styles', function() {
    gulp.watch(config.paths.src.styles.all, ['styles']);
});
