<?php
/**
 * Loop - Team Members Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/team-members/loop.php
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ($settings['style'] == 'style1')

    $container_style = 'lae-uber-grid-container ' . lae_get_grid_classes($settings);
else
    $container_style = 'lae-container';

?>

<div class="lae-team-members lae-team-members-<?php echo $settings['style']; ?> <?php echo $container_style; ?>">

    <?php foreach ($settings['team_members'] as $index => $team_member): ?>

        <?php $args['index'] = $index; ?>

        <?php $args['team_member'] = $team_member; ?>

        <?php lae_get_template_part("addons/team-members/{$settings['style']}", $args); ?>

    <?php endforeach; ?>

</div><!-- .lae-team-members -->

<div class="lae-clear"></div>