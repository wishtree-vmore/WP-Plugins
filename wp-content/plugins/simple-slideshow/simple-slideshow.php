<?php
/*
Plugin Name: Simple Slideshow Plugin
Description: A simple slideshow plugin which creates a custom post type for slideshow images using which admin can add or remove images in slideshow.
Version: 1.0
Author: Vishakha More
*/

// Shortcode for displaying the slideshow
function enqueue_slideshow_assets()
{
    wp_enqueue_style('slideshow-styles', plugin_dir_url(__FILE__) . 'slideshow-styles.css');
    wp_enqueue_script('slideshow-script', plugin_dir_url(__FILE__) . 'slideshow-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slideshow_assets');

function create_slideshow_item_cpt()
{
    $labels = array(
        'name' => 'Slideshow Items',
        'singular_name' => 'Slideshow Item',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Slideshow Item',
        'edit_item' => 'Edit Slideshow Item',
        'new_item' => 'New Slideshow Item',
        'view_item' => 'View Slideshow Item',
        'view_items' => 'View Slideshow Items',
        'search_items' => 'Search Slideshow Items',
        'not_found' => 'No Slideshow Items found',
        'not_found_in_trash' => 'No Slideshow Items found in trash',
        'parent_item_colon' => 'Parent Slideshow Item:',
        'menu_name' => 'Slideshow Items',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'slideshow-items'),
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title', 'thumbnail'),
    );

    register_post_type('slideshow_item', $args);
}

add_action('init', 'create_slideshow_item_cpt');
function display_slideshow($atts)
{
    $atts = shortcode_atts(
        array(
            'post_type' => 'slideshow_item',
            'posts_per_page' => -1,
        ),
        $atts
    );

    $query = new WP_Query($atts);

    if ($query->have_posts()) {
        $output = "";
        $output .= '<div class="slider-container">';
        $output .= '<ul class="slides">';
        while ($query->have_posts()) {
            $query->the_post();
            $title = get_the_title();
            $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $output .= '<li class="active"><img src="' . esc_url($image) . '" alt="' . esc_attr($title) . '"><div class="caption"><em>' . esc_html($title) . '</em></div></li>';
        }
        $output .= '</ul>';
        $output .= '<ul class="slider-nav">';
        $output .= '<li class="next"><a href="#"></a></li>';
        $output .= '<li class="prev"><a href="#"></a></li>';
        $output .= '</ul>';
        $output .= '<ol class="slider-dot-nav">';
        $output .= '</ol>';
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    } else {
        return 'No slideshow items found.';
    }
}

add_shortcode('simple_slideshow', 'display_slideshow');