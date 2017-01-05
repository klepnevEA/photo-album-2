'use strict';

function PopupAlbumDeleteDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PopupDeleteController',
    controllerAs: 'popupDelete',
    templateUrl: 'template/popups/popup-delete.html'
  }
}

exports.name = 'PopupAlbumDeleteDirective';

module.exports = angular.module('app.directives.PopupAlbumDeleteDirective', [])
  .directive('popupDelete', PopupAlbumDeleteDirective);