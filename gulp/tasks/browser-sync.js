// Browser sync task requirements
var config      = require('../config');
var gulp        = require('gulp');
var browserSync = require('browser-sync');
var shelljs     = require('shelljs/global');
var extend      = require('node.extend');

// Browser sync task
gulp.task('browser-sync', function() {
    exec('php -r \'$config = include("../../../../.env.local.php"); echo $config["WP_HOME"];\'', {silent:true}, function(code, output) {

        browserSync(extend({
            proxy: output
        }, config.browserSync));
    });
});
