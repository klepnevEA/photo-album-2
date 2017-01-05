'use strict';

var PopupDeleteController = function PopupDeleteController(Popup) {
  /**
   * Закрыть попап
   */
  PopupDeleteController.prototype.cancel = function () {
    Popup.close();
  };
};

PopupDeleteController.$inject = ['Popup'];

exports.name = 'PopupDeleteController';

module.exports = angular.module('app.controllers.PopupDeleteController', [])
  .controller('PopupDeleteController', PopupDeleteController);