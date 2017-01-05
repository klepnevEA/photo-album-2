'use strict';

var loginRoutes = function loginRoutes($stateProvider, $urlRouterProvider) {
  $urlRouterProvider.otherwise('/');

  $stateProvider
    .state('login', {
      url: '/',
      templateUrl: 'template/partials/login.html',
      controller: ['$rootScope', function ($rootScope) {
        $rootScope.pageName = 'Вход - ФотоАльбом';
      }]
    })
    .state('registration', {
      url: '/registration',
      templateUrl: 'template/partials/registration.html',
      controller: ['$rootScope', function ($rootScope) {
        $rootScope.pageName = 'Регистрация - ФотоАльбом';
      }]
    })
};

loginRoutes.$inject = ['$stateProvider', '$urlRouterProvider'];

exports.name = 'loginRoutes';

module.exports = angular.module('app.routes.loginRoutes', [])
  .config(loginRoutes);