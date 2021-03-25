<?php
/**
 * Loop - Clients Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/clients/loop.php
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

list($animate_class, $animation_attr) = lae_get_animation_atts($settings['widget_animation']);

$args['animate_class'] = $animate_class;

$args['animation_attr'] = $animation_attr;

?>

<div class="lae-clients">

    <div class="lae-uber-grid-container <?php echo lae_get_grid_classes($settings); ?>">

        <?php foreach ($settings['clients'] as $client): ?>

            <?php $args['client'] = $client; ?>

            <?php lae_get_template_part("addons/clients/content", $args); ?>

        <?php endforeach; ?>

    </div>

</div><!-- .lae-clients -->