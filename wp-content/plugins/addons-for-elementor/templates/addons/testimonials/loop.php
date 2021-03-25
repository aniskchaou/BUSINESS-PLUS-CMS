<?php
/**
 * Loop - Testimonials Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/testimonials/loop.php
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<div class="lae-testimonials lae-uber-grid-container <?php echo lae_get_grid_classes($settings); ?>">

    <?php foreach ($settings['testimonials'] as $testimonial) : ?>

        <?php $args['testimonial'] = $testimonial; ?>

        <?php lae_get_template_part("addons/testimonials/content", $args); ?>

    <?php endforeach; ?>

</div><!-- .lae-testimonials -->

<div class="lae-clearphp"></div>