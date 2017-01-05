'use strict';

var PopupNotificationController = function PopupNotificationController(Popup) {
  /**
   * Закрыть попап
   */
  PopupNotificationController.prototype.cancel = function () {
    Popup.close();
  };
};

PopupNotificationController.$inject = ['Popup'];

exports.name = 'PopupNotificationController';

module.exports = angular.module('app.controllers.PopupNotificationController', [])
  .controller('PopupNotificationController', PopupNotificationController);