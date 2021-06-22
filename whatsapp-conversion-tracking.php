<?php
/*
Plugin Name: Whatsapp Conversion Tracking
Plugin URI:
Description: Whatsapp Conversion Tracking with Google Ads
Version: 1.0
Author: Saqib Ali
License: GPLv2
Author URI: https://www.fiverr.com/saqibali862
Requires at least: 5.0
Tested up to: 5.7
Text Domain: word-replacer-ultra
 */

define('WHATSAPP_CONV_TRACK_PATH', dirname(__FILE__));
$plugin = plugin_basename(__FILE__);
define('WHATSAPP_CONV_TRACK_URL', plugin_dir_url($plugin));

require WHATSAPP_CONV_TRACK_PATH . '/inc/whatsapp-tracker-main.php';
require WHATSAPP_CONV_TRACK_PATH . '/inc/whatsapp-tracker-ajax.php';
