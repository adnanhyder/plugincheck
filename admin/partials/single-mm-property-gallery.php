<?php
/*
 * Template Name: Property Gallery Template
 * Template Post Type: mm_property
 */

// Get the current property ID
$property_id = get_the_ID();

// Get the gallery images for the property
$featured_image_url = get_the_post_thumbnail_url($property_id, 'full');

$not_found = __('No feature Image', 'monetize-more');
$not_found = apply_filters('monetize_more_not_found_gallery', $not_found);

// Display the featured image
if (!empty($featured_image_url)) {
    echo '<img src="' . $featured_image_url . '" alt="Featured Image">';
}else{
    esc_html_e($not_found);
}

?>
