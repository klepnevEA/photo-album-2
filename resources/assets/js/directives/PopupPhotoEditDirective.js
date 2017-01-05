'use strict';

function PopupPhotoEditDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PopupPhotoEditController',
    controllerAs: 'popupPhotoEdit',
    templateUrl: 'template/popups/popup-photo-edit.html'
  }
}

exports.name = 'PopupPhotoEditDirective';

module.exports = angular.module('app.directives.PopupPhotoEditDirective', [])
  .directive('popupPhotoEdit', PopupPhotoEditDirective);