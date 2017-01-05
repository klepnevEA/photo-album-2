'use strict';

var HeaderAlbumController = function HeaderAlbumController($scope, $rootScope, ApiService, Popup) {
  /**
   * Открыть режим редактирования
   */
  HeaderAlbumController.prototype.openEditMode = function () {
    $scope.editMode = 'edit-mode';
  };

  /**
   * Закрыть режим редактирования
   */
  HeaderAlbumController.prototype.closeEditMode = function () {
    $scope.album.image = '';
    $scope.editMode = '';
  };

  /**
   * Редактировать альбом
   */
  HeaderAlbumController.prototype.editAlbum = function () {
    var album = ApiService.album.edit($scope.album);

    album.then(function (response) {
      if ($scope.album.image) {
        $rootScope.photos.unshift(response.data.album.cover);
        $scope.album.cover.thumbnail_url = response.data.album.cover.thumbnail_url;

        $rootScope.background = response.data.album.cover.image_url;
      }

      $scope.editMode = '';
    }, function () {
      $scope.album = backup;
    });
  };
};

HeaderAlbumController.$inject = ['$scope', '$rootScope', 'ApiService', 'Popup'];

exports.name = 'HeaderAlbumController';

module.exports = angular.module('app.controllers.HeaderAlbumController', [])
  .controller('HeaderAlbumController', HeaderAlbumController);