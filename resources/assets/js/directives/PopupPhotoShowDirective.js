'use strict';

var PopupPhotoShowController = require('../controllers/PopupPhotoShowController');

function PopupPhotoShowDirective() {
  return {
    restrict: 'E',
    scope: true,
    controller: 'PopupPhotoShowController',
    controllerAs: 'popupPhotoShow',
    templateUrl: 'template/popups/popup-photo-show.html',
    link: function ($scope, element) {
      var image = element.find('.photo-slider__slide');
      var imageWrapper = element.find('.popup-big__photo-slider');
      var descriptionTextElement = element.find('.discription__text__story-about-photo');

      $scope.$watch('photo.description', function () {
        if ($scope.photo.description) {
          descriptionTextElement.html($scope.photo.description.replace(/#[a-zА-я\d]+/ig, function (match) {
            return '<a class="popup-big__hashtag" href="#/search/#' + match.substr(1) + '">' + match + '</a>';
          }));
        }
      });

      image.on('load', function () {
        imageWrapper.animate({height: image.height()}, 300);
      })
    }
  }
}

exports.name = 'PopupPhotoShowDirective';

module.exports = angular.module('app.directives.PopupPhotoShowDirective', [])
  .directive('popupPhotoShow', PopupPhotoShowDirective);