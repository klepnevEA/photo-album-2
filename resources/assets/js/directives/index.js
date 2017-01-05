'use strict';

exports.name = 'directives';

module.exports = angular.module('app.directives', [
  // Headers and footer
  require('./HeaderMainDirective').name,
  require('./HeaderAlbumDirective').name,
  require('./HeaderSearchDirective').name,
  require('./FooterDirective').name,
  // Cards directive
  require('./PhotoCardDirective').name,
  require('./PhotoCard2Directive').name,
  require('./AlbumCardDirective').name,
  // Popups
  require('./PopupDeleteDirective').name,
  require('./PopupPhotoShowDirective').name,
  require('./PopupPhotoAddDirective').name,
  require('./PopupPhotoEditDirective').name,
  require('./PopupAlbumAddDirective').name,
  require('./PopupAlbumEditDirective').name,
  require('./PopupNotificationDirective').name
]);