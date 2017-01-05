'use strict';

var UserStateController = function UserStateController($state, $stateParams, $rootScope, ApiService, Popup, $scope) {
  var user = ApiService.user.get($stateParams);
  var albums = ApiService.user.getAlbums($stateParams);

  // Получение пользователя
  user.$promise.then(function () {
    $rootScope.pageName = user.user.name;

    $rootScope.user = user.user;
    $rootScope.background = user.user.background_url;
  }, function () {
    $state.go('main');
  });

  // Получение альбомов пользователя
  albums.$promise.then(function () {
    $rootScope.albums = albums.albums;
  });

  // Получение авторизованного пользователя
  if (!$rootScope.currentUser) {
    var currentUser = ApiService.user.get();

    currentUser.$promise.then(function () {
      $rootScope.currentUser = currentUser.user;
    });
  }

  /**
   * Открыть попап добавления альбомов
   */
  UserStateController.prototype.albumAdd = function () {
    Popup.album.add($scope);
  }
};

UserStateController.$inject = ['$state', '$stateParams', '$rootScope', 'ApiService', 'Popup', '$scope'];

exports.name = 'UserStateController';

module.exports = angular.module('app.controllers.UserStateController', [])
  .controller('UserStateController', UserStateController);