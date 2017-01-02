/**
 * @file
 * Custom Javascript that starts the fullPage.js library.
 */

 (function ($, Drupal) {

  Drupal.behaviors.fullPage_home = {
    attach: function (context, settings) {
      $('#fullPage').fullpage({
          responsiveWidth: 960,
          responsiveHeight: 700,
          resize: false,
          autoScrolling: false,
          fitToSection: false,
          bigSectionsDestination: 'top',
        }
      );

      $('#heroNext').bind(
        'click',
        function () {
          $.fn.fullpage.moveSectionDown();
        }
      );

    }
  };
})(jQuery, Drupal);
