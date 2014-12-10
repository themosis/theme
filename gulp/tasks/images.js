// Images task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var changed       = require('gulp-changed');
var imagemin      = require('gulp-imagemin');

// Images task
gulp.task('images', function() {
    return gulp.src(config.paths.src.images.all)
        .pipe(changed(config.paths.dist.images))
        .pipe(imagemin(config.imagemin))
        .pipe(gulp.dest(config.paths.dist.images))
        .pipe(handleSuccess(config.notify.messages.images));
});
