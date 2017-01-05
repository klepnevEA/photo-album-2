'use strict';

function PopupPhotoAddDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PopupPhotoAddController',
    controllerAs: 'popupPhotoAdd',
    templateUrl: 'template/popups/popup-photo-add.html'
  }
}

exports.name = 'PopupPhotoAddDirective';

module.exports = angular.module('app.directives.PopupPhotoAddDirective', [])
  .directive('popupPhotoAdd', PopupPhotoAddDirective);