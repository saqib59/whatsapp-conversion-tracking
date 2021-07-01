<?php
/**
* Template Name: Redirect Tracker
*/
?>
<html>
    <head>
        <title>
            Redirecting WhatsApp chat
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="refresh" content="0;URL=https://api.whatsapp.com/send?phone=<?= get_option('whats_track_wa_no'); ?>&text=<?= get_option('whats_track_text_message'); ?>" />

        <?= 
        str_replace("\\","",get_option('whats_track_global_tag'));
         ?>
        <?= 
        str_replace("\\","",get_option('whats_track_event_snippet'));
        ?>
    </head>
    <body>  
            Redirecting to WhatsApp
    </body>
</html>
