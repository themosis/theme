// Javascript task requirements
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var browserify    = require('browserify');
var coffeeify     = require('coffeeify');
var transform     = require('vinyl-transform');
var reactify      = require('reactify');
var debowerify    = require('debowerify');
var gulpif        = require('gulp-if');

// Javascript task
gulp.task('javascript', function() {
    var browserified = transform(function(filename) {
        var b = browserify(filename, gulpif(config.environment === 'local', {debug: true}))
            .transform(coffeeify)
            .transform(debowerify)
            .transform(reactify);
        return b.bundle();
    });

    return gulp.src(config.paths.src.scripts.main)
        .pipe(browserified)
        .pipe(gulp.dest(config.paths.dist.js.path))
        .pipe(handleSuccess(config.notify.messages.js));
});
