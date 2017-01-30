/**
 * @file
 * Custom Javascript for the RWD menu behavior.
 */

 (function (Drupal, $) {

  'use strict';

  Drupal.behaviors.rwdMenu = {
    attach: function (context, settings) {
      $(window).on('resize.rwdMenu orientationchange', function () {
        if (window.matchMedia('(max-width: 43.99em)').matches) {
          // First add ID to the main menu.
          $('#block-headerleftmenu>ul.menu').attr('id','block-headerleftmenuList');
          $('#block-headerrightmenu>ul.menu').attr('id','block-headerrightmenuList');
          $('#block-leftsidemenu>ul.menu').attr('id','block-leftsidemenuList');
          $('#block-useraccountmenu>ul.menu').attr('id','block-useraccountmenuList');
          // Move the main menu together with its children.
          $('#block-headerleftmenuList').appendTo('.sliding_menu');
          $('#block-headerrightmenuList').appendTo('.sliding_menu');
          $('#block-leftsidemenuList').appendTo('.sliding_menu');
          $('#block-useraccountmenuList').appendTo('.sliding_menu');
        }
        else {
          // Move back the lists into the desktop positions.
          $('#block-headerleftmenuList').appendTo('#block-headerleftmenu');
          $('#block-headerrightmenuList').appendTo('#block-headerrightmenu');
          $('#block-leftsidemenuList').appendTo('#block-leftsidemenu');
          $('#block-useraccountmenuList').appendTo('#block-useraccountmenu');
        }
      });

      // Trigger button to open/hide the Sliding menu.
      $('#menuButtonTrigger').on('click', function (e) {
        $(this).toggleClass('open');
        $('.sliding_menu').toggleClass('is-visible');
      });

      // Trigger the check for the windows width.
      $(window).trigger('resize.rwdMenu');
    }
  };
})(Drupal, jQuery);
