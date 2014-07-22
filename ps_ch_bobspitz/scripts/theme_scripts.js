function pull_notes_function()
{
     jQuery.ajax({
     url: endnotes_ajax.ajaxurl,
     data: ({action : 'ajax_options'}),
     success: function() {
      //Do stuff here
     }
     });
}