'use strict';

var PopupPhotoEditController = function PopupPhotoEditController($rootScope, $scope, ApiService, Popup) {
  var backup = $scope.photo;

  /**
   * Редактировать фото
   */
  PopupPhotoEditController.prototype.edit = function () {
    var photo = ApiService.photo.edit($scope.photo);

    photo.$promise.then(function () {
      Popup.close();
    }, function () {
      $scope.photo = backup;
    });
  };

  /**
   * Открыть попап удаления фото
   */
  PopupPhotoEditController.prototype.deletePopup = function () {
    Popup.close();

    $scope.popup = {
      title: 'Удаление фото',
      text: 'Вы действительно хотите удалить это фото?'
    };

    Popup.delete($scope);
  };

  /**
   * Удалить фото
   */
  $scope.delete = function () {
    var photo = ApiService.photo.delete({ id: $scope.photo.id });

    photo.$promise.then(function () {
      $rootScope.likesCount -= $scope.photo.likesCount;
      $rootScope.commentsCount -= $scope.photo.commentsCount;
      $rootScope.photosCount -= 1;

      // Удаление фото с страницы
      $rootScope.photos.splice($rootScope.photos.indexOf($scope.photo), 1);

      Popup.close();
    }, function (response) {
      if (response.data && response.data.message) {
        Popup.close();

        $scope.notification = {
          message: response.data.message
        };

        Popup.notification($scope);

        return;
      }

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
  PopupPhotoEditController.prototype.cancel = function () {
    Popup.close();
  };
};

PopupPhotoEditController.$inject = ['$rootScope', '$scope', 'ApiService', 'Popup'];

exports.name = 'PopupPhotoEditController';

module.exports = angular.module('app.controllers.PopupPhotoEditController', [])
  .controller('PopupPhotoEditController', PopupPhotoEditController);