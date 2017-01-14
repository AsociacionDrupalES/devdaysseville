/**
 * @file
 * Custom Javascript that starts the fullPage.js library.
 */

(function ($, Drupal) {

  Drupal.behaviors.sponsors_carousel = {
    attach: function (context, settings) {
      $('.silver--carousel').slick({
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 3500,
      });
      $('.bronze--carousel').slick({
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 5,
        autoplay: true,
        autoplaySpeed: 3500,
      });
    }
  };
})(jQuery, Drupal);
