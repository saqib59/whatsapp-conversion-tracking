<?php if (!defined('ABSPATH')) {
	exit;
	// Exit if directly accessed
}
/**
 * ajax
 */
if (!class_exists('WATrackerAjax')) {
	class WATrackerAjax extends WATracker {
		public function __construct() {

			add_action("wp_ajax_wa_tracker_action", array($this, 'wa_tracker'), 10);
			add_action("wp_ajax_nopriv_wa_tracker_action", array($this, 'wa_tracker'), 10);

		}
		public function wa_tracker() {
			global $wpdb;
			if (!isset($_POST['whats_track_wa_no']) || !isset($_POST['whats_track_text_message']) || !isset($_POST['whats_track_global_tag']) || !isset($_POST['whats_track_event_snippet']) ) {
				$response['message'] = "All fields are required";
				$response['status'] = false;
			} else {
				$total_changes = 0;
				$whats_track_wa_no = $this->wa_tracker_validator($_POST['whats_track_wa_no'], 'textfield');
				$whats_track_text_message = $this->wa_tracker_validator($_POST['whats_track_text_message'], 'textfield');
				// $whats_track_global_tag = $this->wa_tracker_validator($_POST['whats_track_global_tag'], 'textfield');
				// $whats_track_event_snippet = $this->wa_tracker_validator($_POST['whats_track_event_snippet'], 'textfield');
				$whats_track_global_tag = $_POST['whats_track_global_tag'];
				$whats_track_event_snippet = $_POST['whats_track_event_snippet'];
			   update_option('whats_track_wa_no', $whats_track_wa_no);
			   update_option('whats_track_text_message', $whats_track_text_message);
			   update_option('whats_track_global_tag', $whats_track_global_tag);
			   update_option('whats_track_event_snippet', $whats_track_event_snippet);

				$response['message'] = "Records are updated";
				$response['status'] = true;
			}
			$this->responseJsonResults($response);
		}
		private function responseJsonResults($data) {
			header('Content-Type: application/json');
			echo json_encode($data);
			wp_die();
		}
	}
	new WATrackerAjax();
}
