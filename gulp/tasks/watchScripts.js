// Watch scripts task requirements
var config = require('../config');
var gulp   = require('gulp');

// Watch scripts task
gulp.task('watchScripts', function() {
    gulp.watch(config.paths.src.scripts.all, ['scripts']);
});
