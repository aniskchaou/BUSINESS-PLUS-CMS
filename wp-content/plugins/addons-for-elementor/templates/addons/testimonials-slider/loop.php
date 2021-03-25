<?php
/**
 * Loop - Testimonials Slider Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/testimonials-slider/loop.php
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$dir = is_rtl() ? ' dir="rtl"' : '';

$style = is_rtl() ? ' style="direction:rtl"' : '';

$settings = apply_filters('lae_testimonials_slider_' . $settings['slider_id'] . '_settings', $settings);

$slider_options = [
    'slide_animation' => $settings['slide_animation'],
    'direction' => $settings['direction'],
    'slideshow_speed' => absint($settings['slideshow_speed']),
    'animation_speed' => absint($settings['animation_speed']),
    'control_nav' => ('yes' === $settings['control_nav']),
    'direction_nav' => ('yes' === $settings['direction_nav']),
    'pause_on_hover' => ('yes' === $settings['pause_on_hover']),
    'pause_on_action' => ('yes' === $settings['pause_on_action']),
    'smooth_height' => ('yes' === $settings['smooth_height'])
];

?>

<div<?php echo $dir . $style; ?> class="lae-testimonials-slider lae-flexslider lae-container"
                                 data-settings='<?php echo wp_json_encode($slider_options); ?>'>
    <ul class="lae-slides">

        <?php foreach ($settings['testimonials'] as $testimonial) : ?>

            <?php $args['testimonial'] = $testimonial; ?>

            <?php lae_get_template_part("addons/testimonials-slider/content", $args); ?>

        <?php endforeach; ?>

    </ul><!-- .lae-slides -->

</div><!-- .lae-testimonials-slider -->