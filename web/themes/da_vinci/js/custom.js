/**
 * @file
 * Your custom code into javascript behaviour.
 */

(function ($) {
  Drupal.behaviors.customTheme = {
    attach: function (context) {
      // Your Code.

      $('.page-node-type-session #block-da-vinci-page-title').prependTo('.node__content');
      $('.page-node-type-session .node__content > div:not(.field--type-entity-reference)').wrapAll("<div class='session-info' />");
      $('.page-node-type-session .session-info').appendTo('.node__content');


      // Node type news
      $('.page-node-type-news #block-da-vinci-page-title').prependTo('.node__content');
      $('.page-node-type-news .node__content > div:not(.news__field-image)').wrapAll("<div class='news-info' />");
      $('.page-node-type-news .news-info').appendTo('.node__content');
      // End your Code.
    }
  };
})(jQuery);
