'use strict';

var mainRoutes = function mainRoutes($stateProvider, $urlRouterProvider) {
  $urlRouterProvider.otherwise('/');

  $stateProvider
    /**
     * Главная страница
     */
    .state('main', {
      url: '/',
      views: {
        header: {
          template: '<header-main button-edit="true"  button-logout="true"></header-main>'
        },
        main: {
          templateUrl: 'template/partials/main.html',
          controller: 'MainStateController',
          controllerAs: 'mainState'
        },
        footer: {
          template: '<footer-main></footer-main>'
        }
      }
    })
    /**
     * Страница альбома
     */
    .state('album', {
      url: '/album/:id',
      views: {
        header: {
          template: '<header-album></header-album>'
        },
        main: {
          templateUrl: 'template/partials/album.html',
          controller: 'AlbumStateController',
          controllerAs: 'albumState'
        },
        footer: {
          template: '<footer-main></footer-main>'
        }
      }
    })
    /**
     * Страница пользователя
     */
    .state('user', {
      url: '/user/:id',
      views: {
        header: {
          template: '<header-main button-home="true"></header-main>'
        },
        main: {
          templateUrl: 'template/partials/user.html',
          controller: 'UserStateController',
          controllerAs: 'userState'
        },
        footer: {
          template: '<footer-main></footer-main>'
        }
      }
    })
    /**
     * Страница поиска
     */
    .state('search', {
      url: '/search/:query',
      views: {
        header: {
          template: '<header-search></header-search>'
        },
        main: {
          templateUrl: 'template/partials/search.html',
          controller: 'SearchStateController',
          controllerAs: 'searchState'
        },
        footer: {
          template: '<footer-main></footer-main>'
        }
      }
    })
};

mainRoutes.$inject = ['$stateProvider', '$urlRouterProvider'];

exports.name = 'mainRoutes';

module.exports = angular.module('app.routes.mainRoutes', [])
  .config(mainRoutes);