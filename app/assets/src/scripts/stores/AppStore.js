var AppDispatcher = require('../dispatcher/AppDispatcher');
var AppConstants  = require('../constants/AppConstants');
var Backbone      = require('backbone');

AppModel = Backbone.Model.extend({});

AppCollection = Backbone.collection.extend([], {
    model: AppModel,
    initialize: function() {
        AppDispatcher.register(function(payload) {
            var action = payload.action;

            switch(action.actionType) {
              default:
                return true;
            }
        });
    }
});

AppStore = new AppCollection();
module.exports = AppStore;
