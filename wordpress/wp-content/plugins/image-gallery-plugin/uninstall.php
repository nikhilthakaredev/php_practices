<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

$posts = get_posts(['post_type' => 'image_gallery', 'numberposts' => -1]);
foreach ($posts as $post) {
    wp_delete_post($post->ID, true);
}
