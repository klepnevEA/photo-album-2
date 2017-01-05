'use strict';

function PhotoCard2Directive() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PhotoCard2Controller',
    controllerAs: 'photoCard2',
    templateUrl: 'template/blocks/block-photo-card-2.html'
  }
}

exports.name = 'PhotoCard2Directive';

module.exports = angular.module('app.directives.PhotoCard2Directive', [])
  .directive('photoCard2', PhotoCard2Directive);