jQuery(window).load(function() {

    var allFXs = ['scroll', 'crossfade', 'cover', 'uncover'];
    function setRandomFX(jQueryelem) {
        var newFX = Math.floor(Math.random() * allFXs.length);
        jQueryelem.trigger('configuration', {
            auto: {
                fx: allFXs[ newFX ]
            }
        });
    }


//Primary Nav in both scene

    var windowWidth = jQuery(window).width();
    var nav = ".main-nav";
    //    for sub menu arrow

    //    for sub menu arrow
    jQuery('.main-nav >li:has("ul")>a').each(function() {
        jQuery(this).addClass('below');
    });
    jQuery('ul:not(.main-nav)>li:has("ul")>a').each(function() {
        jQuery(this).addClass('side');
    });
    if (windowWidth > 991) {

        jQuery('#showbutton').off('click');
        jQuery('.im-hiding').css('display', 'block');
        jQuery(nav).off('mouseenter', 'li');
        jQuery(nav).off('mouseleave', 'li');
        jQuery(nav).off('click', 'li');
        jQuery(nav).off('click', 'a');
        jQuery(nav).on('mouseenter', 'li', function() {
            jQuery(this).children('ul').stop().hide();
            jQuery(this).children('ul').slideDown(400);
        });
        jQuery(nav).on('mouseleave', 'li', function() {
            jQuery(this).children('ul').stop().slideUp(350);
        });
    } else {

        jQuery('#showbutton').off('click');
        jQuery('.im-hiding').css('display', 'none');
        jQuery(nav).off('mouseenter', 'li');
        jQuery(nav).off('mouseleave', 'li');
        jQuery(nav).off('click', 'li');
        jQuery(nav).off('click', 'a');
        jQuery(nav).on('click', 'a', function(e) {
            jQuery(this).next('ul').attr('style=""');
            jQuery(this).next('ul').slideToggle();
            if (jQuery(this).next('ul').length !== 0) {
                e.preventDefault();
            }
        });
        // for hide menu
        jQuery('#showbutton').on('click', function() {

            jQuery('.im-hiding').slideToggle();
        });
    }
    jQuery(window).resize(function() {
        windowWidth = jQuery(window).width();
        jQuery(nav + ' ul').each(function() {
            jQuery(this).attr('style', '" "');
        });
        if (windowWidth > 991) {
            jQuery('#showbutton').off('click');
            jQuery('.im-hiding').css('display', 'block');
            jQuery(nav).off('mouseenter', 'li');
            jQuery(nav).off('mouseleave', 'li');
            jQuery(nav).off('click', 'li');
            jQuery(nav).off('click', 'a');
            jQuery(nav).on('mouseenter', 'li', function() {
                jQuery(this).children('ul').stop().hide();
                jQuery(this).children('ul').slideDown(400);
            });
            jQuery(nav).on('mouseleave', 'li', function() {
                jQuery(this).children('ul').stop().slideUp(350);
            });
        } else {
            jQuery('#showbutton').off('click');
            jQuery('.im-hiding').css('display', 'none');
            jQuery(nav).off('mouseenter', 'li');
            jQuery(nav).off('mouseleave', 'li');
            jQuery(nav).off('click', 'li');
            jQuery(nav).off('click', 'a');
            jQuery(nav).on('click', 'a', function(e) {
                jQuery(this).next('ul').attr('style=""');
                jQuery(this).next('ul').slideToggle();
                if (jQuery(this).next('ul').length !== 0) {
                    e.preventDefault();
                }
            });
            // for hide menu
            jQuery('#showbutton').on('click', function() {

                jQuery('.im-hiding').slideToggle();
            });
        }
    });




    jQuery("#owl-demo3").owlCarousel({
        autoPlay: true,
        slideSpeed: 300,
        items : 3,


        pagination: true,

    });

    jQuery(".slider-section").slick({
        centerMode: true,
        centerPadding:'130px',
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        slidesToShow:1,
        autoplay: true,
        autoplaySpeed:1000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding:'40px',
                    slidesToShow:1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '20px',
                    slidesToShow: 1
                }
            }
        ]
    });
    /* Hide owl carousl up to full load */
    jQuery(document).ready(function() {
        jQuery('#owl-demo1').show();
    });
    jQuery(document).ready(function() {
        jQuery('#owl-demo').show();
    });

    // inatate wow jQuery
    new WOW().init();

    // scroll jQuery
    jQuery( "#parallex-team" ).click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery("#blog-light-theme-ourteam").offset().top
        }, 2000);
    });

    // scroll jQuery
    jQuery( "#parallex-counter" ).click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery("#blog-light-theme-counter").offset().top
        }, 2000);
    });
    // counter js
    jQuery(document).ready(function( jQuery ) {
        jQuery('.counter').counterUp({
            delay: 100,
            time: 6000
        });
        jQuery(".single_work_counter").last().css( "border-right", "none" );
    });


    /* nav bar fixed */
    jQuery(window).scroll(function () {



        if (jQuery(window).scrollTop() > 30) {
            jQuery('.main-header').addClass('navbar-fixed-top');
        }

        if (jQuery(window).scrollTop() < 31) {
            jQuery('.main-header').removeClass('navbar-fixed-top');
        }
    });

    /* scroll to top */
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 400) {
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });

    jQuery('.scrollup').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 1500);
        return false;
    });



});


/*-- Inisate isotop mixup ---*/
(function (jQuery) {


    jQuery(window).load(function(){




        //sticky sidebar
        var at_body = jQuery("body");
        var at_window = jQuery(window);

        if(at_body.hasClass('at-sticky-sidebar')){
            if(at_body.hasClass('right-sidebar')){
                jQuery('#secondary, #primary').theiaStickySidebar();
            }
            else{
                jQuery('#secondary, #primary').theiaStickySidebar();
            }
        }

        jQuery(document).ready(function() {

            jQuery("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3]

            });

        });
        /* fixed nav bar */
        jQuery('#wpadminbar').css('position', 'fixed');

        /*AFTER LAST MENU CLOSED */
        jQuery('.last-menu').focusout(function (e) {
            jQuery('.im-hiding').slideToggle();
            e.preventDefault();
        })

    });
}(jQuery));

