var config = require('../config');
var notify = require('gulp-notify');

module.exports = function(message) {
    // Send message to notification center with gulp-notify
    return notify({
        title: config.notify.titles.success,
        message: message
    });
};
