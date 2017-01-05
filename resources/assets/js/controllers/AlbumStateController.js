'use strict';

var AlbumStateController = function AlbumStateController($state, $stateParams, $rootScope, $scope, ApiService, Popup) {
  var album = ApiService.album.get($stateParams);

  // Получение данных альбома
  album.$promise.then(function () {
    $rootScope.pageName = album.album.name + ' - альбом';

    $rootScope.album = album.album;
    $rootScope.user = album.album.user;
    $rootScope.photos = album.album.photos;

    $rootScope.likesCount = album.album.likesCount;
    $rootScope.commentsCount = album.album.commentsCount;
    $rootScope.photosCount = album.album.photosCount;

    $rootScope.background = album.album.cover.image_url;
  }, function () {
    $state.go('main');
  });

  // Получение авторизованного пользователя
  if (!$rootScope.currentUser) {
    var currentUser = ApiService.user.get();

    currentUser.$promise.then(function () {
      $rootScope.currentUser = currentUser.user;
    });
  }

  this.photoAddPopup = function () {
    Popup.photo.add($scope);
  }
};

AlbumStateController.$inject = ['$state', '$stateParams', '$rootScope', '$scope', 'ApiService', 'Popup'];

exports.name = 'AlbumStateController';

module.exports = angular.module('app.controllers.AlbumStateController', [])
  .controller('AlbumStateController', AlbumStateController);