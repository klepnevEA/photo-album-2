'use strict';

function HeaderSearchDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'HeaderSearchController',
    controllerAs: 'headerSearch',
    templateUrl: 'template/blocks/block-header-search.html'
  }
}

exports.name = 'HeaderSearchDirective';

module.exports = angular.module('app.directives.HeaderSearchDirective', [])
  .directive('headerSearch', HeaderSearchDirective);