<?php if (!defined('ABSPATH')) {
	exit; // Exit if directly accessed
}
/**
 * Fired during plugin activation
 */
if (!class_exists('WATracker')) {
	class WATracker {
		public function __construct() {
			/*Menu hook*/
			add_action('admin_menu', array($this, 'wa_tracker_menu'));
			/*Register Styling Scripts*/
			add_action('admin_enqueue_scripts', array($this, 'wa_tracker_script_styles'));
			add_action('wp_enqueue_scripts', array($this, 'wa_tracker_style_frontend'));
			add_action('wp_footer', array($this, 'wa_tracker_frontend_footer'));
			add_action('wp_head', array($this, 'wa_tracker_frontend_header'));
		}

		
		public function wa_tracker_frontend_header() {
			if (!empty(get_option('whats_track_global_tag'))) {
				$whats_track_global_tag = get_option('whats_track_global_tag');

				$whats_track_global_tag = str_replace("\\","",$whats_track_global_tag);

				echo $whats_track_global_tag;

			}

		}
		public function wa_tracker_style_frontend() {
			wp_enqueue_style('custom-css', WA_CONV_TRACK_URL . '/assets/css/custom-frontend.css');
			wp_enqueue_style('custom-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
		}
		public function wa_tracker_frontend_footer() {
			if (!empty(get_option('whats_track_wa_no'))) {
				$whats_track_wa_no = get_option('whats_track_wa_no');
				$whats_track_text_message = get_option('whats_track_text_message');
				$whats_track_event_snippet = get_option('whats_track_event_snippet');
				$whats_track_event_snippet = str_replace("\\","",$whats_track_event_snippet);
				
				// echo "<script>";
				echo $whats_track_event_snippet;
				// echo "</script>";
				?>
				<!-- href="https://api.whatsapp.com/send?phone=<?= $whats_track_wa_no; ?>&text=<?= $whats_track_text_message;?>" -->
				<a  
 					onclick='gtag_report_conversion("https://api.whatsapp.com/send?phone=<?= $whats_track_wa_no; ?>&text=<?= $whats_track_text_message;?>")' class="float" target="_blank">
					<i class="fa fa-whatsapp my-float"></i>
					</a>
				<?php
				// echo '<a onclick=gtag_report_conversion("https://api.whatsapp.com/send?phone='.$whats_track_wa_no.'&text='.$whats_track_text_message.'") class="float" target="_blank">
				// 	<i class="fa fa-whatsapp my-float"></i>
				// 	</a>';
								?>
			
			<?php
			}
		}

		public function wa_tracker_menu() {
			if (is_admin()) {
				add_menu_page('WA Tracker', 'WA Tracker', 'edit_pages', 'wa-tracker', array($this, 'wa_tracker_ultra_settings'), 'dashicons-location-alt', 30);
			}

		}
		public function wa_tracker_script_styles($hook) {
			if ($hook != 'toplevel_page_wa-tracker') {
				return;
			}

			wp_enqueue_style('custom-css', WA_CONV_TRACK_URL . '/assets/css/custom.css');
			wp_enqueue_script('jquery-validate', WA_CONV_TRACK_URL . '/assets/js/jquery-validate.js', '', '', true);
			wp_enqueue_script('main-script', WA_CONV_TRACK_URL . '/assets/js/main-script.js', array('jquery'), '5.5.3', true);
			wp_localize_script('main-script', 'object',
				array(
					'ajax_url' => admin_url('admin-ajax.php'),
				)
			);
		}

		public function wa_tracker_ultra_settings() {

			if (is_admin() && current_user_can('manage_options')) {
				require WA_CONV_TRACK_PATH . '/templates/settings.php';
			} else {
				_e('Denied ! Only admin can see this.', 'wa-tracker');
			}

		}
		public function wa_tracker_validator($field) {
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
	new WATracker();
}
