( function ( $ ) {

    var WidgetLAETestimonialsSliderHandler = function ($scope, $) {

        var slider_elem = $scope.find('.lae-testimonials-slider').eq(0);

        var rtl = slider_elem.attr('dir') === 'rtl';

        var settings = slider_elem.data('settings');

        slider_elem.flexslider({
            selector: ".lae-slides > .lae-slide",
            animation: settings['slide_animation'],
            direction: settings['direction'],
            slideshowSpeed: settings['slideshow_speed'],
            animationSpeed: settings['animation_speed'],
            namespace: "lae-flex-",
            pauseOnAction: settings['pause_on_action'],
            pauseOnHover: settings['pause_on_hover'],
            controlNav: settings['control_nav'],
            directionNav: settings['direction_nav'],
            prevText: "Previous<span></span>",
            nextText: "Next<span></span>",
            smoothHeight: settings['smooth_height'],
            animationLoop: true,
            slideshow: true,
            rtl: rtl,
            easing: "swing",
            controlsContainer: "lae-testimonials-slider"
        });


    };

    // Make sure you run this code under Elementor..
    $( window ).on( 'elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction( 'frontend/element_ready/lae-testimonials-slider.default', WidgetLAETestimonialsSliderHandler );


    } );

} )( jQuery );