// Scripts task requirements
var Q             = require('q');
var package       = require('../../package.json');
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var runSequence   = require('run-sequence');
var gulpif        = require('gulp-if');
var sourcemaps    = require('gulp-sourcemaps');
var concat        = require('gulp-concat');
var uglify        = require('gulp-uglify');
var header        = require('gulp-header');

// Scripts task
gulp.task('scripts', function() {
    var deferred = Q.defer();

    runSequence(
        'clean-js',
        'modernizr',
        function() {
            gulp.src([config.paths.dist.js.modernizr, config.paths.dist.js.main, config.paths.dist.js.coffee])
                .pipe(gulpif(config.environment === 'local', sourcemaps.init()))
                .pipe(concat(config.concat.js))
                .pipe(uglify(config.uglify))
                .pipe(header(config.header, { package: package }))
                .pipe(gulpif(config.environment === 'local', sourcemaps.write()))
                .pipe(gulp.dest(config.paths.dist.js.path))
                .pipe(handleSuccess(config.notify.messages.scripts));
            deferred.resolve();
        }
    );

    return deferred.promise;
});
