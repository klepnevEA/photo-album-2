'use strict';

function AlbumCardDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'AlbumCardController',
    controllerAs: 'albumCard',
    templateUrl: 'template/blocks/block-album-card.html'
  }
}

exports.name = 'AlbumCardDirective';

module.exports = angular.module('app.directives.AlbumCardDirective', [])
  .directive('albumCard', AlbumCardDirective);