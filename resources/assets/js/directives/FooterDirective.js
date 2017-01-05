'use strict';

function FooterDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'FooterController',
    controllerAs: 'footer',
    templateUrl: 'template/blocks/block-footer.html'
  }
}

exports.name = 'FooterDirective';

module.exports = angular.module('app.directives.FooterDirective', [])
  .directive('footerMain', FooterDirective);