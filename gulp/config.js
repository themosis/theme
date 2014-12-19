// Config Requirements
var util     = require('gulp-util');
var pngquant = require('imagemin-pngquant');

// Constants
var ASSETS_PATH       = './app/assets/',
    ASSETS_SRC_PATH   = ASSETS_PATH+'src/',
    ASSSETS_DIST_PATH = ASSETS_PATH+'dist/',
    ENVIRONMENTS      = ['local', 'staging', 'production'];

// Configuration
module.exports = {
    environment: (util.env.type != null && ENVIRONMENTS.indexOf(util.env.type) != -1)
        ? util.env.type
        : ENVIRONMENTS[0],
    paths: {
        src: {
            styles: {
                all: ASSETS_SRC_PATH+'styles/**/*',
                sass: ASSETS_SRC_PATH+'styles/sass/**/main.{sass,scss}'
            },
            scripts: {
                all: ASSETS_SRC_PATH+'scripts/**/*',
                js: ASSETS_SRC_PATH+'scripts/js/**/main.js'
            },
            images: {
                all: ASSETS_SRC_PATH+'images/**/*'
            },
            fonts: {
                all: ASSETS_SRC_PATH+'fonts/**/*'
            }
        },
        dist: {
            all: ASSSETS_DIST_PATH,
            css: ASSSETS_DIST_PATH+'css/',
            js: ASSSETS_DIST_PATH+'js/',
            images: ASSSETS_DIST_PATH+'images/',
            fonts: ASSSETS_DIST_PATH+'fonts/'
        }
    },
    deploy: {
        environments: ENVIRONMENTS
    },
    // https://www.npmjs.org/package/gulp-notify
    notify: {
        titles: {
            success: 'Success',
            error: 'Compile Error'
        },
        messages: {
            sass: 'Sass task completed',
            js: 'JS task completed',
            images: 'Images task completed',
            fonts: 'Fonts task completed',
            watch: 'Started watching files'
        }
    },
    // https://www.npmjs.org/package/gulp-sass
    sass: {
        errLogToConsole: true
    },
    // https://www.npmjs.org/package/gulp-autoprefixer
    autoprefixer: {
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
    },
    // https://www.npmjs.com/package/gulp-minify-css
    minifyCSS: {
    },
    // https://www.npmjs.com/package/gulp-uglify
    uglify: {
    },
    // https://www.npmjs.com/package/gulp-imagemin
    imagemin: {
        progressive: true,
        interlaced: true,
        svgoPlugins: [{
            removeViewBox: false
        }],
        use: [pngquant()]
    }
};
