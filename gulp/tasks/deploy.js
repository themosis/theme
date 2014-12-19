// Deploy:environment task requirements
var config  = require('../config');
var gulp    = require('gulp');
var shelljs = require('shelljs/global');

// Deploy:environment task
config.deploy.environments.forEach(function(environment) {
    gulp.task('deploy:' + environment, function() {
        exec('gulp --type=' + environment);
    });
});
