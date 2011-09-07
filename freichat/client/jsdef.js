/*-----------------------Definitions--------------------------------------------*/
freidefines = {
     
    // GEN => GENERAL   CONFIGURATION
    GEN : {
        is_guest : '<?php echo $_SESSION[$uid."is_guest"]; ?>',
        url:'<?php echo $url; ?>',
        ses_status:'<?php echo $_SESSION[$uid."freistatus"]; ?>',
        reidfrom:'<?php echo $id; ?>',
        getid:'<?php echo $_GET["id"]; ?>',
        fromname:'<?php echo $pfromname; ?>',
        custom_mesg:'<?php echo $custom_mesg; ?>'            
    },
    
    // SET => GENERAL   SETTINGS 
    SET : {
        theme:'<?php echo $color; ?>',
        fonload:'<?php echo $load; ?>',
        chatspeed:'<?php echo $chatspeed; ?>',
        draggable:'<?php echo $draggable; ?>',
        fxval:'<?php echo $fxval; ?>', //Jquery Effects
        mesgSendSpeed:'<?php echo $msgSendSpeed; ?>'
    },
    
    
    
    
    STATUS : {
        
        IMG : {
            online:'<?php echo $frei_trans["go_online"]; ?>',
            offline:'<?php echo $frei_trans["go_offline"]; ?>',
            busy:'<?php echo $frei_trans["go_busy"]; ?>',
            invisible:'<?php echo $frei_trans["go_invisible"]; ?>' 
        },
        
        TEXT : {
            online:'<?php echo $frei_trans["status_txt_online"]; ?>',
            busy:'<?php echo $frei_trans["status_txt_busy"]; ?>',
            invisible:'<?php echo $frei_trans["status_txt_invisible"]; ?>',
            offline:'<?php echo $frei_trans["status_txt_offline"]; ?>'         
        }        
    },
    
 
    
    
    
    
    gchatimg:'<?php echo $gchatimg; ?>',
    mailimg: '<?php echo $mailimg; ?>',
    saveimg: '<?php echo $saveimg; ?>',
    smileyimg: '<?php echo $smileyimg; ?>',
    arrowimg: '<?php echo $arrowimg; ?>',
    newtopimg: '<?php echo $newtopimg; ?>',
    btopimg:'<?php echo $btopimg; ?>',
    notransimg: '<?php echo $translatedisabledimg; ?>',
    translateimg:'<?php echo $translateimg; ?>',
    uploadimg:'<?php echo $uploadimg; ?>',
    deleteimg:'<?php echo $deleteimg; ?>',
    minimg:'<?php echo $minimg; ?>',
    maximg:'<?php echo $maximg; ?>',
    closeimg:'<?php echo $closeimg; ?>',
    logoutimg:'<?php echo $logoutimg; ?>',
    onlineimg:'<?php echo $onlineimg; ?>',
    busyimg:'<?php echo $busyimg; ?>',
    invisibleimg:'<?php echo $invisibleimg; ?>',
    restoreimg:'<?php echo $restoreimg; ?>',
    offlineimg:'<?php echo $offlineimg; ?>',
    offline:'<?php echo $offline; ?>',
    optimg:'<?php echo $optimg; ?>',
    toolimg:'<?php echo $toolimg; ?>',
    chatroomimg:'<?php echo $chatroomimg; ?>',
    jquery_theme:'<?php echo $jquery_theme; ?>',
    fnopermsht:36,     //Height When user has no permissions
    fnoonlineht:18,   //Height When No one is online
    fonlineht:65,    //Height When one user online
    fmaxht:90,      //Height when more than one user

    chatHistoryDeleted:'<?php echo $frei_trans["chatHistoryDeleted"]; ?>',
    chatHistoryNotFound:'<?php echo $frei_trans["chatHistoryNotFound"]; ?>',
    cb_head:'<?php echo $frei_trans["cb_head"]; ?>',
    pwdby:'<?php echo $frei_trans["pwdby"]; ?>',
    nopermsmesg:'<?php echo $frei_trans["noperms"]; ?>',
    nolinemesg:'<?php echo $frei_trans["noline"]; ?>',
    newmesg:'<?php echo $frei_trans["newmesg"]; ?>',
    onfoffline:'<?php echo $frei_trans["on_offline"]; ?>',
    restore_drag_pos:'<?php echo $frei_trans["restore_drag_pos"]; ?>',
    status_txt:'<?php echo $frei_trans["status_txt"]; ?>',
    opt_txt:'<?php echo $frei_trans["opt_txt"]; ?>',
    onOfflinemesg:'<?php echo $frei_trans["onOfflinemesg"]; ?>',

    plugin_trans_disable:'<?php echo $frei_trans["plugin_transdisable"]; ?>',
    plugin_trans_orig:'<?php echo $frei_trans["plugin_trans_orig"]; ?>',

    titles_translate:'<?php echo $frei_trans["titles_translate"]; ?>',
    titles_upload:'<?php echo $frei_trans["titles_upload"]; ?>',
    titles_mail: '<?php echo $frei_trans["titles_mail"]; ?>',
    titles_smiley: '<?php echo $frei_trans["titles_smiley"]; ?>',
    titles_clrcht: '<?php echo $frei_trans["titles_clrcht"]; ?>',
    titles_save: '<?php echo $frei_trans["titles_save"]; ?>',

    status_online:'<?php echo $frei_trans["status_online"]; ?>',
    status_busy:'<?php echo $frei_trans["status_busy"]; ?>',
    status_invisible:'<?php echo $frei_trans["status_invisible"]; ?>',
    status_offline:'<?php echo $frei_trans["status_offline"]; ?>',
    default_status:'<?php echo $frei_trans["default_status"]; ?>',

    set_custom_mesg:'<?php echo $frei_trans["set_custom_mesg"]; ?>',
    chat_room_title: '<?php echo $frei_trans["chat_room_title"]; ?>',

  PLUGINS : {
      
    show_file_send:'<?php echo $show_file_sending_plugin; ?>',
    showtranslate:'<?php echo $show_translate_plugin; ?>',
    showsmiley:'<?php echo $show_smiley_plugin; ?>',
    showsave:'<?php echo $show_save_plugin; ?>',
    showmail:'<?php echo $show_mail_plugin; ?>',
    showchatroom:'<?php echo $show_chatroom_plugin; ?>',
    showvideochat:'<?php echo $show_videochat_plugin; ?>'
  },  



    JSdebug:'<?php echo $JSdebug; ?>',
    playsound:'<?php echo $playsound ?>',
    busy_timeOut:'<?php echo $busy_timeOut; ?>',
    offline_timeOut:'<?php echo $offline_timeOut; ?>',


    /* ACL => ACESS CONTROL LIST  PERMISSIONS*/

    ACL : {
        FILE : {
            user : '<?php echo $ACL["FILE"]["user"]; ?>',
            guest: '<?php echo $ACL["FILE"]["guest"]; ?>'
        },
        TRANSLATE : {
            user : '<?php echo $ACL["TRANSLATE"]["user"]; ?>',
            guest: '<?php echo $ACL["TRANSLATE"]["guest"]; ?>'
        },
        SAVE : {
            user : '<?php echo $ACL["SAVE"]["user"]; ?>',
            guest: '<?php echo $ACL["SAVE"]["guest"]; ?>'
        },
        SMILEY : {
            user : '<?php echo $ACL["SMILEY"]["user"]; ?>',
            guest: '<?php echo $ACL["SMILEY"]["guest"]; ?>'
        },
        MAIL : {
            user : '<?php echo $ACL["MAIL"]["user"]; ?>',
            guest: '<?php echo $ACL["MAIL"]["guest"]; ?>'
        }
    },

    /* ACL */

    xhash: '<?php echo preg_replace("/\?./","",$_GET["xhash"]); ?>',
    jconflicts:'<?php echo $conflict; ?>'
};
/*----------------------THE-PHP-JS-Bridge---------------------------------------*/

function Get_Cookie(check_name){
    var a_all_cookies=document.cookie.split(';');
    var a_temp_cookie='';
    var cookie_name='';
    var cookie_value='';
    var b_cookie_found=false;
    var i='';
    for(i=0;i<a_all_cookies.length;i++)

    {
        a_temp_cookie=a_all_cookies[i].split('=');
        cookie_name=a_temp_cookie[0].replace(/^\s+|\s+$/g,'');
        if(cookie_name==check_name)

        {
            b_cookie_found=true;
            if(a_temp_cookie.length>1)

            {
                cookie_value=unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g,''));
            }
            return cookie_value;
            break;
        }
        a_temp_cookie=null;
        cookie_name='';
    }
    if(!b_cookie_found)
    {
        return null;
    }
}
function Set_Cookie(name,value,expires,path,domain,secure){
    var today=new Date();
    today.setTime(today.getTime());
    if(expires)

    {
        expires=expires*1000*60*60*24;
    }
    var expires_date=new Date(today.getTime()+(expires));
    document.cookie=name+"="+escape(value)+
    ((expires)?";expires="+expires_date.toGMTString():"")+
    ((path)?";path="+path:"")+
    ((domain)?";domain="+domain:"")+
    ((secure)?";secure":"");
}
function Delete_Cookie(name,path,domain){
    if(Get_Cookie(name))document.cookie=name+"="+
        ((path)?";path="+path:"")+
        ((domain)?";domain="+domain:"")+";expires=Thu, 01-Jan-1970 00:00:01 GMT";
}
