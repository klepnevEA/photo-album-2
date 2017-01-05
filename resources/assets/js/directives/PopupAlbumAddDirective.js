'use strict';

var PopupAlbumAddController = require('../controllers/PopupAlbumAddController');

function PopupAlbumAddDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PopupAlbumAddController',
    controllerAs: 'popupAlbumAdd',
    templateUrl: 'template/popups/popup-album-add.html'
  }
}

exports.name = 'PopupAlbumAddDirective';

module.exports = angular.module('app.directives.PopupAlbumAddDirective', [])
  .directive('popupAlbumAdd', PopupAlbumAddDirective);