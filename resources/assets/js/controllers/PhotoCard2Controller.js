'use strict';

var PhotoCard2Controller = function PhotoCard2Controller($scope, Popup) {
  /**
   * Открыть попап показа фото
   */
  this.showPhoto = function () {
    Popup.photo.show($scope);
  };

  /**
   * Открыть оппап редактирования фото
   */
  this.editPopup = function () {
    Popup.photo.edit($scope);
  };
};

PhotoCard2Controller.$inject = ['$scope', 'Popup'];

exports.name = 'PhotoCard2Controller';

module.exports = angular.module('app.controllers.PhotoCard2Controller', [])
  .controller('PhotoCard2Controller', PhotoCard2Controller);