<?php if (!defined('ABSPATH')) {
exit;
}
// Exit if directly accessed
?>
<div class="container">
	<h1><?php _e('WA Conversion Tracking', 'wa-tracker', 'wa-tracker');?></h1>
   <form action="/action_page.php" id="wa-tracker-form">
      <div class="row">
         <div class="col-25">
            <label for="whats_track_enable_plugin"><?php _e('Enable Plugin', 'wa-tracker');?></label>
         </div>
         <div class="col-75">
            <input type="checkbox" value="1" <?= (get_option('whats_track_enable_plugin') == '1'? 'checked': ''); ?> id="whats_track_enable_plugin" name="whats_track_enable_plugin">
         </div>
      </div>
         <div class="row">
            <div class="col-25">
              <label for="whats_track_redirect_page">Page to redirect</label>
            </div>
         <div class="col-75">
           <select id="whats_track_redirect_page" name="whats_track_redirect_page">
             <option value="">Select Redirect Page</option>
        <?php
        $pages = get_pages();
           foreach ($pages as $page) {
            ?>
            <option value="<?= $page->post_name;?>" <?= ((get_option('whats_track_redirect_page') == $page->post_name)? 'selected': ''); ?>> <?= $page->post_title; ?></option>
            <?php
           }
           ?>
           </select>
         </div>
    </div>
       <div class="row">
         <div class="col-25">
            <label for="fname"><?php _e('WA Phone Number:', 'wa-tracker');?></label>
         </div>
         <div class="col-75">
            <input type="text" value="<?= get_option('whats_track_wa_no'); ?>" id="fname" name="whats_track_wa_no">
         </div>
      </div>
      <div class="row">
         <div class="col-25">
            <label for="lname"><?php _e('Text Message:', 'wa-tracker');?></label>
         </div>
         <div class="col-75">
            <input type="text" id="lname" value="<?= get_option('whats_track_text_message'); ?>" name="whats_track_text_message">
            <input type="hidden" name="action" value="wa_tracker_action">
         </div>
      </div>
      <div class="row">
         <div class="col-25">
            <label for="country"><?php _e('Global Site Tag:', 'wa-tracker');?></label>
         </div>
         <div class="col-75">
            <textarea id="subject"  name="whats_track_global_tag" style="height:200px"><?= str_replace("\\","",get_option('whats_track_global_tag'));
             ?></textarea>
         </div>
      </div>
      <div class="row">
         <div class="col-25">
            <label for="country"><?php _e('Event Snippet (Click):', 'wa-tracker');?></label>
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