'use strict';

var PopupAlbumEditController = function PopupAlbumEditController($rootScope, $scope, ApiService, Popup) {
  var backup = $scope.album;

  /**
   * Редактировать альбом
   */
  PopupAlbumEditController.prototype.edit = function () {
    var album = ApiService.album.edit($scope.album);

    album.then(function (response) {
      if ($scope.album.image) {
        $rootScope.photos.unshift(response.data.album.cover);
        $scope.album.cover.thumbnail_url = response.data.album.cover.thumbnail_url;
      }

      Popup.close();
    }, function () {
      $scope.album = backup;
    });
  };

  /**
   * Открыть попап удаления альбома
   */
  PopupAlbumEditController.prototype.deletePopup = function () {
    Popup.close();
    $scope.popup = {
      title: 'Удаление альбома',
      text: 'Вы действительно хотите удалить этот альбом?'
    };
    Popup.delete($scope);
  };

  /**
   * Удалить альбом
   */
  $scope.delete = function () {
    var album = ApiService.album.delete({id: $scope.album.id});

    album.$promise.then(function () {
      $rootScope.albums.splice($rootScope.albums.indexOf($scope.album), 1);

      Popup.close();
    }, function () {
      Popup.close();

      $scope.notification = {
        message: 'Ошибка на сервере'
      };

      Popup.notification($scope);
    });
  };

  /**
   * Закрыть попап
   */
  PopupAlbumEditController.prototype.cancel = function () {
    Popup.close();
  };
};

PopupAlbumEditController.$inject = ['$rootScope', '$scope', 'ApiService', 'Popup'];

exports.name = 'PopupAlbumEditController';

module.exports = angular.module('app.controllers.PopupAlbumEditController', [])
  .controller('PopupAlbumEditController', PopupAlbumEditController);