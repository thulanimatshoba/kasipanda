jQuery(document).ready(function($) {

  var $sidebar   = $("#sidebar"),
      $window    = $(window),
      offset     = $sidebar.offset(),
      topPadding = 70;

  $window.scroll(function() {
      if ($window.scrollTop() > offset.top) {
          $sidebar.stop().animate({
              marginTop: $window.scrollTop() - offset.top + topPadding
          });
      } else {
          $sidebar.stop().animate({
              marginTop: 0
          });
      }
  });

//Smooth Sliding From menu item to another
    $(function () {
        $('.main-navigation a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    var width = Math.max($(window).width(), window.innerWidth);
                    if (width <= 640) {
                        $('html,body').stop().animate({
                            scrollTop: target.offset().top - 178
                        }, 1000);
                    } else {
                        $('html,body').stop().animate({
                            scrollTop: target.offset().top - 112
                        }, 1000);
                    }
                    return false;
                }
            }
        });
    });

});

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 50){
        jQuery('#masthead').addClass("sticky uk-animation-slide-in-left uk-position-fixed uk-width-1-1");
    }
    else{
        jQuery('#masthead').removeClass("sticky uk-animation-scale-up uk-position-fixed uk-width-1-1");
    }
});
