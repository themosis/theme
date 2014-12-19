// Deploy:environment task requirements
var config       = require('../config');
var gulp         = require('gulp');

// Deploy:environment task
config.deploy.environments.forEach(function(environment) {
    gulp.task('deploy:' + environment, function() {
        exec('gulp --type=' + environment);
    });
});
