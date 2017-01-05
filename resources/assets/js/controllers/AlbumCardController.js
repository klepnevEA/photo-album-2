'use strict';

var AlbumCardController = function AlbumCardController($scope, Popup) {
  /**
   * Показать попап редактирования альбома
   */
  this.edit = function () {
    Popup.album.edit($scope);
  };
};

AlbumCardController.$inject = ['$scope', 'Popup'];

exports.name = 'AlbumCardController';

module.exports = angular.module('app.controllers.AlbumCardController', [])
  .controller('AlbumCardController', AlbumCardController);