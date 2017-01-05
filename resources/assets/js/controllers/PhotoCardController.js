'use strict';

var PhotoCardController = function PhotoCardController($scope, Popup) {
  /**
   * Показать попап фото
   */
  this.showPhotoPopup = function () {
    Popup.photo.show($scope);
  };
};

PhotoCardController.$inject = ['$scope', 'Popup'];

exports.name = 'PhotoCardController';

module.exports = angular.module('app.controllers.PhotoCardController', [])
  .controller('PhotoCardController', PhotoCardController);