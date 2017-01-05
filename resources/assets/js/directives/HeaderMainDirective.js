'use strict';

// TODO: редактирование соц сетей
// TODO: Сообщения при сохраниении
function HeaderMainDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'HeaderMainController',
    controllerAs: 'header',
    templateUrl: 'template/partials/header.html',
    link: function($scope, element, attributes) {
      $scope.buttons = {};

      $scope.buttons.home = attributes.buttonHome;
      $scope.buttons.edit = attributes.buttonEdit;
      $scope.buttons.logout = attributes.buttonLogout;

      var socialsEl = element.find('.social');
      var socialPopupsEl = element.find('.social__popup-holder');

      socialsEl.on('click', function (e) {
        e.preventDefault();

        var $this = $(this);
        var socialItemEl = $this.parent();
        var popupEl = socialItemEl.find('.social__popup-holder');
        var inputEl = socialItemEl.find('input');
        var saveBtnEl =  socialItemEl.find('.save');
        var cancelBtnEl =  socialItemEl.find('.cancel');

        socialPopupsEl.fadeOut();

        popupEl.fadeIn();

        saveBtnEl.on('click', function () {
          popupEl.fadeOut();
        });

        cancelBtnEl.on('click', function () {
          inputEl.val('');
          popupEl.fadeOut();
        });
      });


    }
  }
}

exports.name = 'HeaderMainDirective';

module.exports = angular.module('app.directives.HeaderMainDirective', [])
  .directive('headerMain', HeaderMainDirective);