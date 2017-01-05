'use strict';

function LoginDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'UserController',
    controllerAs: 'userController',
    templateUrl: 'template/blocks/block-login.html'
  }
}

exports.name = 'LoginDirective';

module.exports = angular.module('app.directives.LoginDirective', [])
  .directive('login', LoginDirective);