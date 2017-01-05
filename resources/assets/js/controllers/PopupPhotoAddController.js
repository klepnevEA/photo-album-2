'use strict';

var PopupPhotoAddController = function PopupPhotoAddController($rootScope, $scope, ApiService, Popup) {
  /**
   * Добавить фото
   */
  PopupPhotoAddController.prototype.add = function () {
    $scope.photo.album_id = $rootScope.album.id;

    var photos = ApiService.photo.create($scope.photo);

    photos.then(function (response) {
      console.log(response.data.photos);
      
      $scope.photo = {};

      $rootScope.photosCount += response.data.photos.length;

      // Добавление фото на страницу
      for (var i = 0; i < response.data.photos.length; i++) {
        $rootScope.photos.push(response.data.photos[i]);
      }

      Popup.close();
    }, function () {
      Popup.close();

      $scope.notification = {
        message: 'Ошибка на сервере.'
      };

      Popup.notification($scope);
    });
  };

  /**
   * Закрыть попап
   */
  PopupPhotoAddController.prototype.cancel = function () {
    $scope.album = {};

    Popup.close();
  };
};

PopupPhotoAddController.$inject = ['$rootScope', '$scope', 'ApiService', 'Popup'];

exports.name = 'PopupPhotoAddController';

module.exports = angular.module('app.controllers.PopupPhotoAddController', [])
  .controller('PopupPhotoAddController', PopupPhotoAddController);