<?php
/**
 * Loop - Services Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/services/loop.php
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<div class="lae-services lae-<?php echo $settings['style']; ?> lae-uber-grid-container <?php echo lae_get_grid_classes($settings); ?>">

    <?php foreach ($settings['services'] as $index => $service): ?>

        <?php $args['index'] = $index; ?>

        <?php $args['service'] = $service; ?>

        <?php lae_get_template_part("addons/services/content", $args); ?>

    <?php endforeach; ?>

</div><!-- .lae-services -->

<div class="lae-clear"></div>