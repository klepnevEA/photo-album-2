'use strict';

/**
 * Показать попап
 * @param popup
 * @returns {*}
 */
function openPopup(popup) {
  return jQuery.magnificPopup.open({
    items: {
      src: popup
    },
    midClick: true,
    closeBtnInside: true,
    showCloseBtn: false,
    closeOnBgClick: false,
    overflowY: 'scroll'
  }, 0);
}

var PopupService = function ($compile) {
  var popupServiceInstance = {};

  /**
   * Закрыть попап
   */
  popupServiceInstance.close = function () {
    jQuery.magnificPopup.close();
  };

  /**
   * Попап нотификации
   * @returns {*}
   */
  popupServiceInstance.notification = function ($scope) {
    var popup = $compile('<popup-notification></popup-notification>')($scope);

    openPopup(popup);

    return popup;
  };

  /**
   *  Попап удаления
   * @param $scope
   * @returns {*}
   */
  popupServiceInstance.delete = function ($scope) {
    var popup = $compile('<popup-delete></popup-delete>')($scope);

    openPopup(popup);

    return popup;
  };

  popupServiceInstance.photo = {};

  /**
   * Попап добавления фото
   * @param $scope
   * @returns {*}
   */
  popupServiceInstance.photo.add = function ($scope) {
    var popup = $compile('<popup-photo-add></popup-photo-add>')($scope);

    openPopup(popup);

    return popup;
  };

  /**
   * Попап редактирования фото
   * @param $scope
   * @returns {*}
   */
  popupServiceInstance.photo.edit = function ($scope) {
    var popup = $compile('<popup-photo-edit></popup-photo-edit>')($scope);

    openPopup(popup);

    return popup;
  };

  /**
   * Попап показа фото (слайдер)
   * @param $scope
   * @returns {*}
   */
  popupServiceInstance.photo.show = function ($scope) {
    var popup = $compile('<popup-photo-show></popup-photo-show>')($scope);

    openPopup(popup);

    return popup;
  };

  popupServiceInstance.album = {};

  /**
   * Попап добавления альбома
   * @param $scope
   * @returns {*}
   */
  popupServiceInstance.album.add = function ($scope) {
    var popup = $compile('<popup-album-add></popup-album-add>')($scope);

    openPopup(popup);

    return popup;
  };

  /**
   * Попап редактирования альбома
   * @param $scope
   * @returns {*}
   */
  popupServiceInstance.album.edit = function ($scope) {
    var popup = $compile('<popup-album-edit></popup-album-edit>')($scope);

    openPopup(popup);

    return popup;
  };

  return popupServiceInstance;
};

PopupService.$inject = ['$compile'];

exports.name = 'PopupService';

module.exports = angular.module('app.services.PopupService', [])
  .factory('Popup', PopupService);