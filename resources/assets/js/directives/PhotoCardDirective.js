'use strict';

function PhotoCardDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PhotoCardController',
    controllerAs: 'photoCard',
    templateUrl: 'template/blocks/block-photo-card.html'
  }
}

module.exports = PhotoCardDirective;

exports.name = 'PhotoCardDirective';

module.exports = angular.module('app.directives.PhotoCardDirective', [])
  .directive('photoCard', PhotoCardDirective);