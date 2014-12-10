// Watch styles task requirements
var config = require('../config');
var gulp   = require('gulp');

// Watch styles task
gulp.task('watchStyles', function() {
    gulp.watch(config.paths.src.styles.all, ['styles']);
});
