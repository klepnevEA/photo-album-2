'use strict';

var PopupPhotoShowController = function PopupPhotoShowController($rootScope, $scope, ApiService, Popup) {
  /**
   * Проверка индекса фото
   * @param index
   * @returns {*}
   */
  function validatePhotoIndex(index) {
    if (index > $rootScope.photos.length - 1) {
      return 0;
    }

    if (index < 0) {
      return $rootScope.photos.length - 1;
    }

    return index;
  }

  /**
   * Получение комментариев
   */
  function getComments() {
    var comments = ApiService.photo.getComments({id: $scope.photo.id});

    comments.$promise.then(function () {
      $scope.comments = comments.comments;
    }, function () {
      Popup.close();

      $scope.notification = {
        message: 'Ошибка на сервере.'
      };

      Popup.notification($scope);
    });
  }

  getComments();

  var curPhotoIndex = $rootScope.photos.indexOf($scope.photo);

  PopupPhotoShowController.prototype.nextPhoto = function () {
    curPhotoIndex = validatePhotoIndex(++curPhotoIndex);
    $scope.photo = $rootScope.photos[curPhotoIndex];
    getComments();
  };

  PopupPhotoShowController.prototype.prevPhoto = function () {
    curPhotoIndex = validatePhotoIndex(--curPhotoIndex);
    $scope.photo = $rootScope.photos[curPhotoIndex];
    getComments();
  };

  /**
   * Поставить лайк
   */
  PopupPhotoShowController.prototype.like = function () {
    if ($scope.photo.isLiked) {
      var unlike = ApiService.like.unlike({id: $scope.photo.id});

      unlike.$promise.then(function () {
        $scope.photo.isLiked = false;
        $scope.photo.likesCount -= 1;
        $rootScope.likesCount -= 1;
      }, function (response) {
        Popup.close();

        $scope.notification = {
          message: response.data && response.data.unliked ? response.data.unliked : 'Ошибка на сервере.'
        };

        Popup.notification($scope);
      });

      return;
    }

    var like = ApiService.like.like({id: $scope.photo.id});

    like.$promise.then(function () {
      $scope.photo.isLiked = true;
      $scope.photo.likesCount += 1;
      $rootScope.likesCount += 1;
    }, function (response) {
      Popup.close();

      $scope.notification = {
        message: response.data && response.data.liked ? response.data.liked : 'Ошибка на сервере.'
      };

      Popup.notification($scope);
    });
  };

  /**
   * Оставить комментарий
   */
  PopupPhotoShowController.prototype.addComment = function () {
    var comment = ApiService.comment.create({
      text: $scope.text,
      photo_id: $scope.photo.id
    });

    comment.$promise.then(function () {
      getComments();

      $scope.photo.commentsCount += 1;

      $rootScope.commentsCount += 1;

      $scope.text = '';
    }, function (response) {
      Popup.close();

      $scope.notification = {
        message: response.data && response.data.liked ? response.data.liked : 'Ошибка на сервере.'
      };

      Popup.notification($scope);
    });
  };

  /**
   * Открыватозакрыватель блока комментариев
   */
  PopupPhotoShowController.prototype.toggleShowComments = function () {
    $scope.showCommentsClass = $scope.showCommentsClass && $scope.showCommentsClass === 'active' ? '' : 'active';
  };

  /**
   * Выход из попапа
   */
  PopupPhotoShowController.prototype.cancel = function () {
    Popup.close();
  };
};

PopupPhotoShowController.$inject = ['$rootScope', '$scope', 'ApiService', 'Popup'];

exports.name = 'PopupPhotoShowController';

module.exports = angular.module('app.controllers.PopupPhotoShowController', [])
  .controller('PopupPhotoShowController', PopupPhotoShowController);