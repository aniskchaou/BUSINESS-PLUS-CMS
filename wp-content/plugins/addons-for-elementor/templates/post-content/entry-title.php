<?php


$title = the_title('<' . $title_tag . ' class="lae-post-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark"' . $target .'>', '</a></h3>', false);

/* If there's no post title, return a default title */
if (empty($title))
    $title = '<' . $title_tag . ' class="lae-post-title lae-no-entry-title"><a href="' . get_permalink() . '" rel="bookmark"' . $target .'>' . esc_html__('(Untitled)',
            'livemesh-el-addons') . '</a></h3>';

echo wp_kses_post($title);