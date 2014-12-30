// Styles task requirements
var package       = require('../../package.json');
var config        = require('../config');
var handleSuccess = require('../util/handleSuccess');
var gulp          = require('gulp');
var runSequence   = require('run-sequence');
var gulpif        = require('gulp-if');
var sourcemaps    = require('gulp-sourcemaps');
var concat        = require('gulp-concat');
var autoprefixer  = require('gulp-autoprefixer');
var minifyCSS     = require('gulp-minify-css');
var cssshrink     = require('gulp-cssshrink');
var header        = require('gulp-header');

// Styles task
gulp.task('styles', function() {
    runSequence(
        'clean-css',
        'sass',
        function() {
            return gulp.src([config.paths.dist.css.main])
                .pipe(gulpif(config.environment === 'local', sourcemaps.init(config.sourcemaps.styles.init)))
                .pipe(concat(config.concat.css))
                .pipe(autoprefixer(config.autoprefixer))
                .pipe(gulpif(config.environment !== 'local', minifyCSS(config.minifyCSS)))
                .pipe(gulpif(config.environment !== 'local', cssshrink()))
                .pipe(gulpif(config.environment !== 'local', header(config.header, { package: package })))
                .pipe(gulpif(config.environment === 'local', sourcemaps.write(config.sourcemaps.styles.write)))
                .pipe(gulp.dest(config.paths.dist.css.path))
                .pipe(handleSuccess(config.notify.messages.styles));
        }
    );
});
