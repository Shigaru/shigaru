    jQuery(document).ready(function(){
        jQuery('#send_message').click(function(e){
            e.preventDefault();

            var error = false;
            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var subject = jQuery('#subject').val();
            var message = tinyMCE.activeEditor.getContent({format : 'raw'});;

            if(name.length == 0){
                var error = true;
                jQuery('#name_error').fadeIn(500);
            }else{
                jQuery('#name_error').fadeOut(500);
            }
            if(email.length == 0 || email.indexOf('@') == '-1'){
                var error = true;
                jQuery('#email_error').fadeIn(500);
            }else{
                jQuery('#email_error').fadeOut(500);
            }
            if(subject.length == 0){
                var error = true;
                jQuery('#subject_error').fadeIn(500);
            }else{
                jQuery('#subject_error').fadeOut(500);
            }
            if(message.length == 0){
                var error = true;
                jQuery('#message_error').fadeIn(500);
            }else{
                jQuery('#message_error').fadeOut(500);
            }

            if(error == false){
                jQuery('#send_message').attr({'disabled' : 'true', 'value' : 'Sending...' });
                jQuery('#contact_form').submit();
            }
        });
    });
