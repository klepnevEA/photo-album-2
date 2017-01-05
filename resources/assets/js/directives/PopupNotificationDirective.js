'use strict';

function PopupNotificationDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PopupNotificationController',
    controllerAs: 'popupNotification',
    templateUrl: 'template/popups/popup-notification.html'
  }
}

exports.name = 'PopupNotificationDirective';

module.exports = angular.module('app.directives.PopupNotificationDirective', [])
  .directive('popupNotification', PopupNotificationDirective);