/**
 * @file
 * Custom Javascript that starts the fullPage.js library.
 */

(function ($, Drupal) {

  Drupal.behaviors.sponsors_carousel = {
    attach: function (context, settings) {
      // apply slick sliders
      $('.silver--carousel').slick({
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                  slidesToScroll: 2
              }
            },
            {
              breakpoint: 400,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
      });

      $('.bronze--carousel').slick({
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 5,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
      });

    }
  };
})(jQuery, Drupal);
