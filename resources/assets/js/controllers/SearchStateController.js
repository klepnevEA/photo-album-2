'use strict';

var SearchStateController = function SearchStateController($state, $stateParams, $rootScope, $scope, ApiService, Popup, $location) {
  // Если не введена строка поиска редиректим на главную
  if (!$stateParams.query && !$location.hash()) {
    $state.go('main');
  }

  // Парсинг запроса
  var query = $stateParams.query || $location.hash();
  query = $location.hash() ? '#' + query : query;
  $scope.query = query;
  // title страницы
  $rootScope.pageName = query  + ' - поиск';

  var user = ApiService.user.get();
  var photos = ApiService.search.search({query: query});

  // Получение пользователя
  user.$promise.then(function () {
    $rootScope.currentUser = user.user;
    $rootScope.user = user.user;
    $rootScope.background = user.user.background_url;
  });

  // Поиск
  photos.$promise.then(function () {
    $rootScope.photos = photos.photos;
    $scope.resultsLength = photos.photos.length;
    console.log(photos.photos);
  });
};

SearchStateController.$inject = ['$state', '$stateParams', '$rootScope', '$scope', 'ApiService', 'Popup', '$location'];

exports.name = 'SearchStateController';

module.exports = angular.module('app.controllers.SearchStateController', [])
  .controller('SearchStateController', SearchStateController);