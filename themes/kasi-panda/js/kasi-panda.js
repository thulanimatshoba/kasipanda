jQuery(document).ready(function($) {

    $('.ninjah').click(function () {
        $('#modal-example').slideToggle();
        $(this).toggleClass('uk-open');
        $('#modal-example').addClass('uk-open');
    });


//Smooth Sliding From menu item to another
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
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