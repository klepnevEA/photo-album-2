'use strict';

exports.name = 'services';

module.exports = angular.module('app.services', [
  require('./ApiService').name,
  require('./PopupService').name
]);