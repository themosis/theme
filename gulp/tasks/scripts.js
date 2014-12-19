// Scripts task requirements
var package       = require('../../package.json');
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var concat        = require('gulp-concat');
var uglify        = require('gulp-uglify');
var header        = require('gulp-header');

// Scripts task
gulp.task('scripts', ['clean-js', 'modernizr'], function() {
    return gulp.src([config.paths.dist.js.modernizr, config.paths.dist.js.main])
        .pipe(concat(config.concat.js))
        .pipe(uglify(config.uglify))
        .pipe(header(config.header, { package: package }))
        .pipe(gulp.dest(config.paths.dist.js.path))
        .pipe(handleSuccess(config.notify.messages.scripts));
});
