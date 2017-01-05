'use strict';

var pageLogin = require('./common/page-login');

svg4everybody();

jQuery(function () {
  pageLogin();
});

var app = angular.module('app', [
  'ngResource',
  'ngFileUpload',
  'ui.router',
  require('./services').name,
  require('./controllers').name,
  require('./directives').name,
  require('./routes/main').name,
  require('./common/stateInit').name
]);

// Логин
var appLogin = angular.module('appLogin', [
  'ngResource',
  'ngFileUpload',
  'ui.router',
  require('./services').name,
  require('./controllers/UserController').name,
  require('./controllers/PopupNotificationController').name,
  require('./directives/LoginDirective').name,
  require('./directives/RegistrationDirective').name,
  require('./directives/PopupNotificationDirective').name,
  require('./routes/login').name
]);