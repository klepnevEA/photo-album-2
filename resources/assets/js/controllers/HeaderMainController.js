'use strict';

// TODO: редактирование соц сетей
// TODO: Сообщения при сохраниении

/**
 * Показать сообщения об ошибках
 * @param errors
 */
function errorsToArray(errors) {
  var result = [];
  for (var error in errors) {
    console.log(error);
    errors[error].forEach(function (error) {
      result.push(error);
    });
  }

  return result;
}

var HeaderMainController = function HeaderMainController($rootScope, $scope, ApiService, Popup, $timeout) {
  /**
   * Открыть режим редактирования
   */
  HeaderMainController.prototype.openEditMode = function () {
    $scope.editMode = 'edit-mode';
  };

  /**
   * Закрыть режим редактирования
   */
  HeaderMainController.prototype.closeEditMode = function () {
    $rootScope.user.avatar = null;
    $rootScope.user.background = null;

    $scope.editMode = '';
  };

  /**
   * Редактировать пользователя
   */
  HeaderMainController.prototype.editUser = function () {
    var user = ApiService.user.edit($scope.user);

    user.then(function (response) {
      $rootScope.user = response.data.user;

      $rootScope.background = response.data.user.background_url;

      $scope.editMode = '';
    }, function (response) {
      // Выходим из режима редактирования
      $scope.editMode = '';

      if (response.data) {
        // Если есть сообщение об ошибках, то выводим
        $scope.notification = {
          message: errorsToArray(response.data).join('<br>')
        };

        $scope.showNotification = true;

        $timeout(function () {
          $scope.showNotification = false;
        }, 10000);

        return;
      }

      // Если нет
      Popup.close();

      $scope.notification = {
        message: 'Ошибка на сервере'
      };

      Popup.notification($scope);
    });
  };

  /**
   * Выход пользователя
   */
  HeaderMainController.prototype.logoutUser = function () {
    ApiService.user.logout().$promise.then(function () {
      window.location = '/login';
    }, function () {
      alert('Ошибка выхода!');
    });
  };
};

HeaderMainController.$inject = ['$rootScope', '$scope', 'ApiService', 'Popup', '$timeout'];

exports.name = 'HeaderMainController';

module.exports = angular.module('app.controllers.HeaderMainController', [])
  .controller('HeaderMainController', HeaderMainController);