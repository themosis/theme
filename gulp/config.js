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
                main: ASSETS_SRC_PATH+'styles/sass/main.{sass,scss}',
            },
            scripts: {
                all: ASSETS_SRC_PATH+'scripts/**/*',
                main: ASSETS_SRC_PATH+'scripts/js/main.js'
            },
            images: {
                all: ASSETS_SRC_PATH+'images/**/*'
            },
            fonts: {
                all: ASSETS_SRC_PATH+'fonts/**/*'
            }
        },
        dist: {
            path: ASSSETS_DIST_PATH,
            css: {
                path: ASSSETS_DIST_PATH+'css/',
                main: ASSSETS_DIST_PATH+'css/main.css'
            },
            js: {
                path: ASSSETS_DIST_PATH+'js/',
                main: ASSSETS_DIST_PATH+'js/main.js',
                modernizr: ASSSETS_DIST_PATH+'js/modernizr.js'
            },
            images: {
                path: ASSSETS_DIST_PATH+'images/'
            },
            fonts: {
                path: ASSSETS_DIST_PATH+'fonts/'
            }
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
            // styles
            cleanCSS: 'Clean css task completed',
            sass: 'Sass task completed',
            styles: 'Styles task completed',
            // javascript
            cleanJS: 'Clean js task completed',
            modernizr: 'Modernizr task completed',
            js: 'JS task completed',
            scripts: 'Scripts task completed',
            // images
            cleanImages: 'Clean images task completed',
            images: 'Images task completed',
            // fonts
            cleanFonts: 'Clean fonts task completed',
            fonts: 'Fonts task completed'
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
    // https://github.com/doctyper/gulp-modernizr
    modernizr: {
    },
    // https://www.npmjs.com/package/gulp-uglify
    uglify: {
    },
    // https://www.npmjs.com/package/gulp-concat
    concat: {
        css: 'app.min.css',
        js: 'app.min.js'
    },
    // https://www.npmjs.com/package/gulp-imagemin
    imagemin: {
        progressive: true,
        interlaced: true,
        svgoPlugins: [{
            removeViewBox: false
        }],
        use: [pngquant()]
    },
    // https://www.npmjs.com/package/gulp-header
    header: '/*\n' +
        ' * <%= package.name %>\n' +
        ' * <%= package.description %>\n' +
        ' * <%= package.url %>\n' +
        ' * @author <%= package.author %>\n' +
        ' * @version <%= package.version %>\n' +
        ' * Copyright ' + new Date().getFullYear() + '\n' +
        ' */\n'
};
