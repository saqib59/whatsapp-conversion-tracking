(function($){

  $("#wa-tracker-form").submit(function(event) {
        event.preventDefault();
    $(this).validate({
        rules: {
            'whats_track_wa_no': {required: true,digits: true},
            'whats_track_text_message': {required: true},
            'whats_track_global_tag': {required: true},
            'whats_track_event_snippet': {required: true},
        }
    });
    var valid = $(this).valid();
    if (valid) {
      $(this).find('button[type=submit]').append('<i class="fa fa-circle-o-notch fa-spin" style="font-size:15px"></i>');
      $(this).find('button[type=submit]').attr('disabled',true);
          var serialize_form = $(this).serialize();
            $.ajax({
              type:"POST",
              url: object.ajax_url,
              data: serialize_form,
              dataType: 'json',
              success: function (response) {
                  $(this).find('button[type=submit]').children().remove();
                  $(this).find('button[type=submit]').attr('disabled',false);
                        var status = response.status;
                        console.log(response);
                        if (status) { 
                           alert(response.message);
                           location.reload();
                        } else {
                           alert(response.message);
                    }
                },
                    error: function (errorThrown) {
                       alert('error');
                        console.log(errorThrown);
                    },
            });
    }
  });
})(jQuery)