<?php
//filters and html markup.

$bedroom_title = __('Number of Bedrooms:', 'monetize-more');
$bedroom_title = apply_filters('monetize_more_change_bedrooms_title', $bedroom_title);

$bathroom_title = __('Number of Bathrooms:', 'monetize-more');
$bathroom_title = apply_filters('monetize_more_change_bathrooms_title', $bathroom_title);

$area_title = __('Area', 'monetize-more');
$area_title = apply_filters('monetize_more_change_area_title', $area_title);


?>
<?php do_action('monetize_more_before_form_start_hook');  ?>
<label for="<?php echo esc_attr('bedroom'); ?>"><?php esc_html_e($bedroom_title) ?></label>
<input type="number" id="<?php echo esc_attr('bedroom'); ?>" name="<?php echo esc_attr('bedroom'); ?>" value="<?php echo esc_attr($bedroom); ?>">

<label for="<?php echo esc_attr('bathroom'); ?>"><?php esc_html_e($bathroom_title) ?></label>
<input type="number" id="<?php echo esc_attr('bathroom'); ?>" name="<?php echo esc_attr('bathroom'); ?>" value="<?php echo esc_attr($bathroom); ?>">

<label for="<?php echo esc_attr('area'); ?>"><?php esc_html_e($area_title)  ?></label>
<input type="text" id="<?php echo esc_attr('area'); ?>" name="<?php echo esc_attr('area'); ?>" value="<?php echo esc_attr($area); ?>">
<?php do_action('monetize_more_after_form_hook');  ?>