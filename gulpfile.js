// General
var gulp = require('gulp');
var gutil = require('gulp-util');
var browserify = require('browserify');
var notify = require('gulp-notify');
var clean = require('gulp-clean');

// CSS
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');

// Images
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');

// Paths
var assetsPath = 'app/assets/',
    assetsSrcPath = assetsPath+'src/',
    assetsDistPath = assetsPath+'dist/';
var paths = {
    src: {
        scss: {
            all: assetsSrcPath+'scss/**/*.scss',
            main: assetsSrcPath+'scss/main.scss'
        },
        scripts: {
            all: assetsSrcPath+'scripts/**/*.js'
        },
        images: {
            all: assetsSrcPath+'images/**/*'
        },
        fonts: {
            all: assetsSrcPath+'fonts/**/*'
        }
    },
    dist: {
        css: assetsDistPath+'css/',
        js: assetsDistPath+'js/',
        images: assetsDistPath+'images/',
        fonts: assetsDistPath+'fonts/'
    }
};

// Clean task
gulp.task('clean', function() {
    return gulp.src(assetsDistPath)
        .pipe(clean({
            read: false
        }));
});

// Clean CSS task
gulp.task('cleanCSS', function() {
    return gulp.src(paths.dist.css)
        .pipe(clean({
            read: false
        }));
});

// Clean js task
gulp.task('cleanJS', function() {
    return gulp.src(paths.dist.js)
        .pipe(clean({
            read: false
        }));
});

// Clean images task
gulp.task('cleanImages', function() {
    return gulp.src(paths.dist.images)
        .pipe(clean({
            read: false
        }));
});

// Clean fonts task
gulp.task('cleanFonts', function() {
    return gulp.src(paths.dist.fonts)
        .pipe(clean({
            read: false
        }));
});

// CSS task
gulp.task('css', ['cleanCSS'], function() {
    return gulp.src(paths.src.scss.main)
        .pipe(sass()).on('error', gutil.log)
        .pipe(autoprefixer({
            browsers: [
                'Explorer >= 9',
                'last 2 Chrome versions',
                'last 2 Firefox versions',
                'last 2 Safari versions',
                'last 2 iOS versions',
                'Android 4'
            ],
            cascade: true,
            remove: false
        }))
        .pipe(minifyCSS())
        .pipe(gulp.dest(paths.dist.css))
        .pipe(notify('CSS task completed'));
});

// JS task
gulp.task('js', ['cleanJS'], function() {
    return gulp.src(paths.src.scripts.all)
        .pipe(gulp.dest(paths.dist.js))
        .pipe(notify('JS task completed'));
});

// Images task
gulp.task('images', ['cleanImages'], function() {
    return gulp.src(paths.src.images.all)
        .pipe(imagemin({
            progressive: true,
            interlaced: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(paths.dist.images))
        .pipe(notify('Images task completed'));
});

gulp.task('fonts', ['cleanFonts'], function() {
    return gulp.src(paths.src.fonts.all)
        .pipe(gulp.dest(paths.dist.fonts))
        .pipe(notify('Fonts task completed'));
});

// Watch task
gulp.task('watch', function() {
    gulp.watch(paths.src.scss.all, ['css']);
    gulp.watch(paths.src.scripts.all, ['js']);
    gulp.watch(paths.src.images.all, ['images']);
    gulp.watch(paths.src.fonts.all, ['fonts']);
});

// Default task
gulp.task('default', ['clean', 'css', 'js', 'images', 'fonts', 'watch']);
