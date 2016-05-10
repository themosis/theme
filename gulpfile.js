var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    babel = require('gulp-babel'),
    bs = require('browser-sync'),
    cleancss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    stylus = require('gulp-stylus'),
    uglify = require('gulp-uglify');

/* Directories */
var dirs = {
    src: './assets',
    dest: './dist'
};

/* Tasks */
// Stylus
gulp.task('stylus', function()
{
    return gulp.src(dirs.src + '/stylus/*.styl')
        .pipe(sourcemaps.init())
        .pipe(stylus())
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie >= 10']
        }))
        .pipe(cleancss())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(dirs.dest + '/css'))
        .pipe(bs.stream());
});

// Browser sync
gulp.task('bs:init', function()
{
    bs.init();
});

gulp.task('bs:reload', function()
{
    bs.reload();
});

/*-------------*/
/* Watch Tasks */
/*-------------*/
gulp.task('watch:stylus', function()
{
   gulp.watch(dirs.src + '/stylus/**/*.styl', gulp.series('stylus'));
});

// Main watch task.
gulp.task('watch', gulp.series('watch:stylus'));