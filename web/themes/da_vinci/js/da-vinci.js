/**
 * @file
 * Da Vinci Custom Code of the javascript behaviour.
 */

(function ($) {
  Drupal.behaviors.da_vinciTheme = {
    attach: function (context) {

$('.node--type-schedule-page .field--name-field-session > .field__item').each(function() {
  if ($(this).length==2) {
    $(this).parent().addClass('multiple');
  }
});
      
    }
  };
})(jQuery);
