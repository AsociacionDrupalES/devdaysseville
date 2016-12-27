(function ($, Drupal) {

  Drupal.behaviors.fullPage_home = {
    attach: function (context, settings) {
      $('#fullPage').fullpage(
        { responsiveWidth: 960,
          responsiveHeight: 700,
        }
      );

      $('.go-to-slide-2').bind(
        'click',
        function () {
          $.fn.fullpage.moveSectionDown();
        }
      );

    }
  };
})(jQuery, Drupal);
