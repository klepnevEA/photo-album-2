'use strict';

function pageLogin() {
  /**
   * Параллакс
   */
  jQuery(window).on('mousemove',function(e){
    if(window.innerWidth>768) {
      var mouseX = e.pageX,
        mouseY = e.pageY,
        w = (window.innerWidth / 2) - mouseX,
        h = (window.innerHeight / 2) - mouseY,
        layer = jQuery ('.js_wrapper-wparallax__layer');

      layer.map(function (key, value) {
        var widthPosition = w * (key / 100),
          heightPosition = h * (key / 100);

        jQuery (value).css({
          'transform': 'translate3d(' + widthPosition + 'px, ' + heightPosition + 'px, 0)'
        })
      });
    }
  });
}

module.exports = pageLogin;