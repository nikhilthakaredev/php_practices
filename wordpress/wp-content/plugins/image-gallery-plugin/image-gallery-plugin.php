<?php

if (!defined('ABSPATH')) {
    exit;
}

register_activation_hook(__FILE__, 'enhanced_image_gallery_plugin_activation');
function enhanced_image_gallery_plugin_activation() {
    enhanced_image_gallery_plugin_register_post_type();
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'enhanced_image_gallery_plugin_deactivation');
function enhanced_image_gallery_plugin_deactivation() {
    flush_rewrite_rules();
}

add_action('init', 'enhanced_image_gallery_plugin_register_post_type');
function enhanced_image_gallery_plugin_register_post_type() {
   
    register_post_type('image_gallery', [
        'labels' => [
            'name' => 'Image Galleries',
            'singular_name' => 'Image Gallery',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'thumbnail'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-gallery',
    ]);

    register_taxonomy('gallery_category', 'image_gallery', [
        'labels' => [
            'name' => 'Categories',
            'singular_name' => 'Category',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'gallery-category'],
    ]);
}

add_action('wp_enqueue_scripts', 'enhanced_image_gallery_plugin_enqueue_scripts');
function enhanced_image_gallery_plugin_enqueue_scripts() {
    wp_enqueue_style('enhanced-image-gallery-plugin-css', plugin_dir_url(__FILE__) . 'css/enhanced-image-gallery-plugin.css');
    wp_enqueue_script('enhanced-image-gallery-plugin-js', plugin_dir_url(__FILE__) . 'js/enhanced-image-gallery-plugin.js', ['jquery'], null, true);
}
add_shortcode('image_gallery', 'enhanced_image_gallery_plugin_shortcode');
function enhanced_image_gallery_plugin_shortcode($atts) {
    $atts = shortcode_atts([
        'category' => '',
    ], $atts, 'image_gallery');

    $args = [
        'post_type' => 'image_gallery',
        'posts_per_page' => -1,
    ];

    if (!empty($atts['category'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'gallery_category',
                'field'    => 'slug',
                'terms'    => $atts['category'],
            ],
        ];
    }

    $gallery_query = new WP_Query($args);
    ob_start();

    if ($gallery_query->have_posts()) {
        echo '<div class="image-gallery">';
        while ($gallery_query->have_posts()) {
            $gallery_query->the_post();
            $image_url = get_the_post_thumbnail_url();
            $title = get_the_title();
            $categories = get_the_terms(get_the_ID(), 'gallery_category');
            $category_names = wp_list_pluck($categories, 'name');
            $category_list = implode(', ', $category_names);

            echo '<div class="gallery-item">';
            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '" class="gallery-thumbnail" data-title="' . esc_attr($title) . '" data-category="' . esc_attr($category_list) . '">';
            echo '</div>';
        }
        echo '</div>';

        echo '<div class="image-modal" style="display: none;">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <img src="" class="modal-image">
                    <div class="image-info">
                        <span class="image-title"></span><br>
                        <span class="image-category"></span>
                    </div>
                    <div class="modal-controls">
                        <button class="prev-button">Previous</button>
                        <button class="next-button">Next</button>
                        <button class="zoom-in-button">Zoom In</button>
                        <button class="zoom-out-button">Zoom Out</button>
                    </div>
                </div>
              </div>';
    } else {
        echo 'No images found.';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
