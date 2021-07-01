<?php
/*
Plugin Name: WA Conversion Tracking
Plugin URI:
Description: WA Conversion Tracking with Google Ads
Version: 1.0
Author: Saqib Ali
License: GPLv2
Author URI: https://www.fiverr.com/saqibali862
Requires at least: 5.0
Tested up to: 5.7
Text Domain: wa-tracker
 */

define('WA_CONV_TRACK_PATH', dirname(__FILE__));
$plugin = plugin_basename(__FILE__);
define('WA_CONV_TRACK_URL', plugin_dir_url($plugin));


//Load template from specific page
add_filter( 'page_template', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template ){

    if ( get_page_template_slug() == 'redirect.php' ) {
        $page_template = WA_CONV_TRACK_PATH . '/templates/redirect.php';
    }
    return $page_template;
}

add_filter( 'theme_page_templates', 'wpse_288589_add_template_to_select', 10, 4 );
function wpse_288589_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {

    // Add custom template named template-custom.php to select dropdown 
    $post_templates['redirect.php'] = __('Redirect Tracker');

    return $post_templates;
}

require WA_CONV_TRACK_PATH . '/inc/wa-tracker-main.php';
require WA_CONV_TRACK_PATH . '/inc/wa-tracker-ajax.php';


