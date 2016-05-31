var gulp = require('gulp'),
    gutil = require('gulp-util'),
    autoprefixer = require('gulp-autoprefixer'),
    babel = require('gulp-babel'),
    bs = require('browser-sync'),
    cleancss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
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

/**
 * Error reporting helper function.
 * Code from https://github.com/brendanfalkowski
 *
 * @param err
 */
var errorReport = function(err)
{
    var lineNumber = (err.lineNumber) ? 'LINE ' + err.lineNumber + ' -- ' : '';

    notify({
        title: 'Task failed [' + err.plugin + ']',
        message: lineNumber + 'See console.',
        sound: 'Basso'
    }).write(err);

    gutil.beep();

    // Report the error on the console
    var report = '';
    var chalk = gutil.colors.bgMagenta.white;

    report += chalk('TASK:') + ' [' + err.plugin + ']\n';
    report += chalk('ISSUE:') + ' ' + err.message + '\n';
    if (err.lineNumber) { report += chalk('LINE:') + ' ' + err.lineNumber + '\n'; }
    if (err.fileName)   { report += chalk('FILE:') + ' ' + err.fileName + '\n'; }
    console.log(report);

    // Prevent the 'watch' task from stopping
    this.emit('end');
};

/*-------*/
/* Tasks */
/*-------*/
// Stylus
gulp.task('stylus:dev', function()
{
    return gulp.src(dirs.src + '/stylus/*.styl')
        .pipe(plumber({
            errorHandler: errorReport
        }))
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

gulp.task('stylus', function()
{
    return gulp.src(dirs.src + '/stylus/*.styl')
        .pipe(stylus({
            compress: true
        }))
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie >= 10']
        }))
        .pipe(cleancss())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(dirs.dest + '/css'));
});

// JavaScript
gulp.task('javascript:dev', function()
{
    return gulp.src(dirs.src + '/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(dirs.dest + '/js'))
        .pipe(bs.stream());
});

gulp.task('javascript', function()
{
    return gulp.src(dirs.src + '/js/**/*.js')
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dirs.dest + '/js'))
        .pipe(bs.stream());
});

/*------------*/
/* Watch Task */
/*------------*/
gulp.task('watch', function()
{
    bs.init();

    gulp.watch(dirs.src + '/stylus/**/*.styl', gulp.series('stylus:dev'));
    gulp.watch(dirs.src + '/js/**/*.js', gulp.series('javascript:dev'));
});

/*------------*/
/* Build task */
/*------------*/
gulp.task('build', gulp.series('stylus', 'javascript'));