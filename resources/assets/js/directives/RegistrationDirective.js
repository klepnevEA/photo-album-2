'use strict';

function RegistrationDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'UserController',
    controllerAs: 'userController',
    templateUrl: 'template/blocks/block-registration.html'
  }
}

exports.name = 'RegistrationDirective';

module.exports = angular.module('app.directives.RegistrationDirective', [])
  .directive('registration', RegistrationDirective);