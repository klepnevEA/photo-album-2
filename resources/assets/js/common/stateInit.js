'use strict';

var stateInit = function stateInit($rootScope, Popup) {
  $rootScope.$on('$stateChangeStart', function () {
    angular.element('.js-loader-page').show();
    Popup.close();
  });

  $rootScope.$on('$stateChangeSuccess', function () {
    angular.element('.js-loader-page').fadeOut();

    angular.element('body, document').scrollTop(0);
  });
};

stateInit.$inject = ['$rootScope', 'Popup'];

exports.name = 'stateInit';

module.exports = angular.module('app.init', [])
  .run(stateInit);