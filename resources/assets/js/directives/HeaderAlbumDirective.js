'use strict';

function HeaderAlbumDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'HeaderAlbumController',
    controllerAs: 'header',
    templateUrl: 'template/blocks/block-header-album.html'
  }
}

exports.name = 'HeaderAlbumDirective';

module.exports = angular.module('app.directives.HeaderAlbumDirective', [])
  .directive('headerAlbum', HeaderAlbumDirective);