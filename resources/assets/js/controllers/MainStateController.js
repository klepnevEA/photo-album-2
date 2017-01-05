'use strict';

var MainStateController = function MainStateController($rootScope, $scope, ApiService, Popup) {
  $rootScope.pageName = 'Главная страница';
  // TODO: показать еще
  var user = ApiService.user.get();
  var photos = ApiService.photo.get();
  var albums = ApiService.user.getAlbums();

  // Получение пользователя
  user.$promise.then(function () {
    $rootScope.currentUser = user.user;
    $rootScope.user = user.user;
    $rootScope.background = user.user.background_url;
  });

  // Получение фотографий
  photos.$promise.then(function () {
    $rootScope.photos = photos.photos;
  });

  // Получение альбомов
  albums.$promise.then(function () {
    $rootScope.albums = albums.albums;
  });

  /**
   * Открыть попап добавления альбомов
   */
  MainStateController.prototype.albumAdd = function () {
    Popup.album.add($scope);
  };

  /**
   * Функционал кнопки показать еще
   */
  MainStateController.prototype.getMorePhoto = function () {
    var photos = ApiService.photo.get({
      skip: $rootScope.photos.length
    });

    // Получение фотографий
    photos.$promise.then(function () {
      for (var i = 0; i < photos.photos.length; i++) {
        $rootScope.photos.push(photos.photos[i]);
      }
    });
  };
};

MainStateController.$inject = ['$rootScope', '$scope', 'ApiService', 'Popup'];

exports.name = 'MainStateController';

module.exports = angular.module('app.controllers.MainStateController', [])
  .controller('MainStateController', MainStateController);