'use strict';

function FooterController() {
  /**
   * Скролл наверх
   */
  FooterController.prototype.scrollToTop = function () {
    angular.element('body, html').animate({
      scrollTop: 0
    }, 500);
  };
}

exports.name = 'FooterController';

module.exports = angular.module('app.controllers.FooterController', [])
  .controller('FooterController', FooterController);