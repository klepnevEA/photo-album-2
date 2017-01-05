'use strict';

function PopupAlbumEditDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PopupAlbumEditController',
    controllerAs: 'popupAlbumEdit',
    templateUrl: 'template/popups/popup-album-edit.html'
  }
}

exports.name = 'PopupAlbumEditDirective';

module.exports = angular.module('app.directives.PopupAlbumEditDirective', [])
  .directive('popupAlbumEdit', PopupAlbumEditDirective);