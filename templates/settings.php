<?php if (!defined('ABSPATH')) {
exit;
}
// Exit if directly accessed
?>
<div class="container">
	<h1><?php _e('Whatsapp Conversion Tracking', 'whatsapp-tracker', 'whatsapp-tracker');?></h1>
   <form action="/action_page.php" id="whatsapp-tracker-form">
      <div class="row">
         <div class="col-25">
            <label for="fname"><?php _e('Whatsapp Phone Number:', 'whatsapp-tracker');?></label>
         </div>
         <div class="col-75">
            <input type="text" value="<?= get_option('whats_track_whatsapp_no'); ?>" id="fname" name="whats_track_whatsapp_no">
         </div>
      </div>
      <div class="row">
         <div class="col-25">
            <label for="lname"><?php _e('Text Message:', 'whatsapp-tracker');?></label>
         </div>
         <div class="col-75">
            <input type="text" id="lname" value="<?= get_option('whats_track_text_message'); ?>" name="whats_track_text_message">
            <input type="hidden" name="action" value="whatsapp_tracker_action">
         </div>
      </div>
      <div class="row">
         <div class="col-25">
            <label for="country"><?php _e('Global Site Tag:', 'whatsapp-tracker');?></label>
         </div>
         <div class="col-75">
            <textarea id="subject"  name="whats_track_global_tag" style="height:200px"><?= str_replace("\\","",get_option('whats_track_global_tag'));
             ?></textarea>
         </div>
      </div>
      <div class="row">
         <div class="col-25">
            <label for="country"><?php _e('Event Snippet (Click):', 'whatsapp-tracker');?></label>
         </div>
         <div class="col-75">
            <textarea id="subject" name="whats_track_event_snippet" style="height:200px"> <?= str_replace("\\","",get_option('whats_track_event_snippet'));
             ?></textarea>
         </div>
      </div>
      <div class="row">
         <button type="submit"> Submit </button>
      </div>
   </form>
</div>