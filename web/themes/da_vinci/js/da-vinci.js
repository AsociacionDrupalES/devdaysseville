/**
 * @file
 * Da Vinci Custom Code of the javascript behaviour.
 */

(function ($) {
  Drupal.behaviors.da_vinciTheme = {
    attach: function (context) {

$('.node--type-schedule-page .field--name-field-session').each(function() {
  if ($(this).children('.field__item').length==2) {
    $(this).addClass('multiple');
  }
});
      
    }
  };
})(jQuery);
