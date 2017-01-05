'use strict';

/**
 * Показать сообщения об ошибках
 * @param $scope
 * @param data
 */
function showError($scope, data) {
  $scope.errors = [];
  for (var field in data) {
    data[field].forEach(function (error) {
      $scope.errors.push(error);
    });
  }
}

var UserController = function UserController($scope, ApiService, Popup) {
  /**
   * Авторизация
   */
  UserController.prototype.auth = function () {
    var result = ApiService.user.auth($scope.formData);

    result.$promise.then(function () {
      window.location = '/'
    }, function (response) {
      // console.log(response);
      if (response.data) {
        showError($scope, response.data);
      } else {
        $scope.notification = {
          message: 'Ошибка на сервере.'
        };

        Popup.notification($scope);
      }
    });

    $scope.data = result;
  };

  /**
   * Регистрация
   */
  UserController.prototype.registration = function () {
    var result = ApiService.user.create($scope.formData);

    result.$promise.then(function () {
      $scope.notification = {
        message: 'На Ваш почтовый ящик отправлено письмо с подтверждением регистрации'
      };

      Popup.notification($scope);
    }, function (response) {
      // console.log(response);
      if (response.data) {
        showError($scope, response.data);
      } else {
        $scope.notification = {
          message: 'Ошибка на сервере.'
        };

        Popup.notification($scope);
      }
    });

    $scope.data = result;
  };
};

UserController.$inject = ['$scope', 'ApiService', 'Popup'];

exports.name = 'UserController';

module.exports = angular.module('app.controllers.UserController', [])
  .controller('UserController', UserController);