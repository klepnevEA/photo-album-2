'use strict';

exports.name = 'controllers';

module.exports = angular.module('app.controllers', [
  // Headers and footer
  require('./HeaderMainController').name,
  require('./HeaderAlbumController').name,
  require('./HeaderSearchController').name,
  require('./FooterController').name,
  // Cards
  require('./PhotoCardController').name,
  require('./PhotoCard2Controller').name,
  require('./AlbumCardController').name,
  // Popups
  require('./PopupDeleteController').name,
  require('./PopupPhotoShowController').name,
  require('./PopupPhotoAddController').name,
  require('./PopupPhotoEditController').name,
  require('./PopupAlbumAddController').name,
  require('./PopupAlbumEditController').name,
  require('./PopupNotificationController').name,
  // States
  require('./MainStateController').name,
  require('./AlbumStateController').name,
  require('./UserStateController').name,
  require('./SearchStateController').name
]);