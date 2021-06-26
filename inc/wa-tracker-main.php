<?php if (!defined('ABSPATH')) {
	exit; // Exit if directly accessed
}
/**
 * Fired during plugin activation
 */
if (!class_exists('WhatsappTracker')) {
	class WhatsappTracker {
		public function __construct() {
			/*Menu hook*/
			add_action('admin_menu', array($this, 'whatsapp_tracker_menu'));
			/*Register Styling Scripts*/
			add_action('admin_enqueue_scripts', array($this, 'whatsapp_tracker_script_styles'));
			add_action('wp_enqueue_scripts', array($this, 'whatsapp_tracker_style_frontend'));
			add_action('wp_footer', array($this, 'whatsapp_tracker_frontend_footer'));
			add_action('wp_head', array($this, 'whatsapp_tracker_frontend_header'));
		}

		
		public function whatsapp_tracker_frontend_header() {
			if (!empty(get_option('whats_track_global_tag'))) {
				$whats_track_global_tag = get_option('whats_track_global_tag');

				$whats_track_global_tag = str_replace("\\","",$whats_track_global_tag);

				echo $whats_track_global_tag;

			}

		}
		public function whatsapp_tracker_style_frontend() {
			wp_enqueue_style('custom-css', WHATSAPP_CONV_TRACK_URL . '/assets/css/custom-frontend.css');
			wp_enqueue_style('custom-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
		}
		public function whatsapp_tracker_frontend_footer() {
			if (!empty(get_option('whats_track_whatsapp_no'))) {
				$whats_track_whatsapp_no = get_option('whats_track_whatsapp_no');
				$whats_track_text_message = get_option('whats_track_text_message');
				$whats_track_event_snippet = get_option('whats_track_event_snippet');
				$whats_track_event_snippet = str_replace("\\","",$whats_track_event_snippet);
				
				// echo "<script>";
				echo $whats_track_event_snippet;
				// echo "</script>";
				?>
				<!-- href="https://api.whatsapp.com/send?phone=<?= $whats_track_whatsapp_no; ?>&text=<?= $whats_track_text_message;?>" -->
				<a  
 					onclick='gtag_report_conversion("https://api.whatsapp.com/send?phone=<?= $whats_track_whatsapp_no; ?>&text=<?= $whats_track_text_message;?>")' class="float" target="_blank">
					<i class="fa fa-whatsapp my-float"></i>
					</a>
				<?php
				// echo '<a onclick=gtag_report_conversion("https://api.whatsapp.com/send?phone='.$whats_track_whatsapp_no.'&text='.$whats_track_text_message.'") class="float" target="_blank">
				// 	<i class="fa fa-whatsapp my-float"></i>
				// 	</a>';
								?>
			
			<?php
			}
		}

		public function whatsapp_tracker_menu() {
			if (is_admin()) {
				add_menu_page('Whatsapp Tracker', 'Whatsapp Tracker', 'edit_pages', 'whatsapp-tracker', array($this, 'whatsapp_tracker_ultra_settings'), 'dashicons-location-alt', 30);
			}

		}
		public function whatsapp_tracker_script_styles($hook) {
			if ($hook != 'toplevel_page_whatsapp-tracker') {
				return;
			}

			wp_enqueue_style('custom-css', WHATSAPP_CONV_TRACK_URL . '/assets/css/custom.css');
			wp_enqueue_script('jquery-validate', WHATSAPP_CONV_TRACK_URL . '/assets/js/jquery-validate.js', '', '', true);
			wp_enqueue_script('main-script', WHATSAPP_CONV_TRACK_URL . '/assets/js/main-script.js', array('jquery'), '5.5.3', true);
			wp_localize_script('main-script', 'object',
				array(
					'ajax_url' => admin_url('admin-ajax.php'),
				)
			);
		}

		public function whatsapp_tracker_ultra_settings() {

			if (is_admin() && current_user_can('manage_options')) {
				require WHATSAPP_CONV_TRACK_PATH . '/templates/settings.php';
			} else {
				_e('Denied ! Only admin can see this.', 'whatsapp-tracker');
			}

		}
		public function whatsapp_tracker_validator($field) {
			if (empty($field)) {
				return;
			}
			$field = sanitize_text_field($field);
			$field = trim($field);
			$field = stripslashes($field);
			$field = htmlspecialchars($field);
			return $field;
		}
	}
	new WhatsappTracker();
}
