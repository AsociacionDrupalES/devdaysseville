/**
 * @file
 * Your custom code into javascript behaviour.
 */

(function ($) {
  Drupal.behaviors.customTheme = {
    attach: function (context) {
      // Your Code.
      function querystring(key) {
        var re=new RegExp('(?:\\?|&)'+key+'=(.*?)(?=&|$)','gi');
        var r=[], m;
        while ((m=re.exec(document.location.search)) != null) r.push(m[1]);
        return r;
      }
      function basename(str) {
        var base = new String(str).substring(str.lastIndexOf('/') + 1);
        if(base.lastIndexOf(".") != -1) {
          base = base.substring(0, base.lastIndexOf("."));
        }
        return base;
      }
      function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?|&])" + key + "=.*?(&|$)", "i");
        separator = uri.indexOf('?') !== -1 ? "&" : "?";
        var url = window.location.href;
        if (uri.match(re)) {
          url = uri.replace(re, '$1' + key + "=" + value + '$2');
        }
        else {
          url = uri + separator + key + "=" + value;
        }
        return url;
      }

      $('body').on('click', function (e) {
        $('body').fadeTo('fast', 1);
        $('iframe').remove();
      });

      $('.page-node-type-session #block-da-vinci-page-title').prependTo('.node__content');

      $('.page-node-type-session .node__content > div:not(.field--type-entity-reference)').wrapAll("<div class='session-info' />");
      $('.page-node-type-session .session-info').appendTo('.node__content');
      // End your Code.
    }
  };
})(jQuery);
