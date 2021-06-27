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

require WA_CONV_TRACK_PATH . '/inc/wa-tracker-main.php';
require WA_CONV_TRACK_PATH . '/inc/wa-tracker-ajax.php';
