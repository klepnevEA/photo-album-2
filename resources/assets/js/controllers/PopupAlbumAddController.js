'use strict';

var PopupAlbumAddController = function PopupAlbumAddController($rootScope, $scope, ApiService, Popup) {
  /**
   * Создать альбом
   */
  PopupAlbumAddController.prototype.create = function () {
    var album = ApiService.album.create($scope.album);

    album.then(function (response) {
      $scope.album = {};

      $rootScope.albums.push(response.data.album);

      if ($rootScope.photos) {
        $rootScope.photos.unshift(response.data.album.cover);
      }

      Popup.close();
    });
  };

  /**
   * Закрыть попап
   */
  PopupAlbumAddController.prototype.cancel = function () {
    $scope.album = {};

    Popup.close();
  };
};

PopupAlbumAddController.$inject = ['$rootScope', '$scope', 'ApiService', 'Popup'];

exports.name = 'PopupAlbumAddController';

module.exports = angular.module('app.controllers.PopupAlbumAddController', [])
  .controller('PopupAlbumAddController', PopupAlbumAddController);