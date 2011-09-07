var X_init = false;
if(FreiChat)
{
    X_init = true;
}

var FreiChat = {
    oldtitle:document.title,
    loop:0,
    last_chatroom_msg_id:null,
    last_chatroom_usr_id:null,
    last_chatroom_msg_type:[], //[BUBBLE !!]TRUE ->RIGHT FALSE ->LEFT
    ses_status:freidefines.GEN.ses_status,
    time:0,
    chatroom_mesg_time:0,
    freistatus:null,
    ostatus:null,
    box_count:0,
    box_crt:[],
    box_crt_id:[],
    room_array:[],
    windowFocus:false,
    debug:freidefines.JSdebug, //Set to true to debug with firebug , set to false(default) when over
    cnt:0,
    inact_time:0,      //initial Inactivity time
    busy_timeOut:freidefines.busy_timeOut,  // In seconds
    offline_timeOut:freidefines.offline_timeOut, //In seconds
    inactive:false,  //initially not inactive
    onloadActive:false,
    clrchtids:[],
    bulkmesg:[],
    isOlduser:null,
    Ttext:null,
    temporary_status:0,
    unique:0,
    timer:null,
    change_titletimer:null,
    first:false,
    RequestCompleted_get_members:true,
    RequestCompleted_send_messages:true,
    RequestCompleted_isset_mesg:true,
    SendMesgTimeOut:0,
    passBYpost:false,
    custom_mesg:'i am null',
    in_room:-1,
    chatroom_users : [],
    title: 'General Talk',
    bulkmesg_chatroom:[],
    height:20,
    chatroom_changed:false,
    first_message:true
 
};

/* OOP JS FUNCTION BEGINS ---------------------------------------------------------------------*/

FreiChat.init_HTML_freichatX = function()
{
    var main_str,str_contain,str_extras,str_options,str_head,str_frei,str_off,str_opt1,str_opt2;

    // Contains DIV for chatwindows
    str_contain="<div id='FREICHATXDATASTORAGE'></div><div class='freicontain freicontain0' id='freicontain0'></div><div class='freicontain freicontain1' id='freicontain1'></div><div class='freicontain freicontain2' id='freicontain2'></div><div class='freicontain freicontain3' id='freicontain3'></div>";

    // Contains div for invisible data
    str_extras="<div id='sound' class='sound'></div><div id='hidfreichat' class='hidfreichat' style='visibility:hidden'></div>";

    // Contains DIV for FreiChatX options
    str_opt1="<div id='frei_options' class='frei_options'><br/>";
    str_opt1+="    <span class='frei_status_options'> <span class='status_available'> <img  src="+FreiChat.make_url(freidefines.onlineimg)+" title='"+freidefines.STATUS.IMG.online+"' alt='on'/><a onmousedown='FreiChat.freichatopt(\"goOnline\")' href='javascript:void(0)'> "+freidefines.STATUS.TEXT.online+"</a></span>        <span class='status_busy'> <img src="+FreiChat.make_url(freidefines.busyimg)+" title='"+freidefines.STATUS.IMG.busy+"' alt='by'/><a  onmousedown='FreiChat.freichatopt(\"goBusy\")'>"+freidefines.STATUS.TEXT.busy+"</a> </span>   <br/>  <span class='status_invisible'> <img  src="+FreiChat.make_url(freidefines.invisibleimg)+" title='"+freidefines.STATUS.IMG.invisible+"' alt='in'/> <a onmousedown='FreiChat.freichatopt(\"goInvisible\")'>"+freidefines.STATUS.TEXT.invisible+"</a>   </span><span class='status_offline'>            <img  src="+FreiChat.make_url(freidefines.offlineimg)+" title='"+freidefines.STATUS.IMG.offline+"' alt='of'/><a onmousedown='FreiChat.freichatopt(\"goOffline\")'>"+freidefines.STATUS.TEXT.offline+"</a></span><div class='custom_mesg' id='custom_mesg'><input type=text  id='custom_message_id'  />  <br/></div></span></span></div>";

    str_opt2="<div id='frei_tools' class='frei_tools_options'><img onmousedown='FreiChat.restore_drag_pos()' src="+FreiChat.make_url(freidefines.restoreimg)+" title='"+freidefines.restore_drag_pos+"' alt='in'/>\n\
           </div>";
    str_options=str_opt1+str_opt2;

    // Contains FreiChatX head DIV
    str_head="<div class='freichathead' id='freichathead'> <b>"+freidefines.cb_head+"</b> [<span id='frei_user_count' class='frei_user_count'></span>] <span class='min_freichathead' onmousedown='FreiChat.min_max_freichat()'>  <img id='frei_img' src="+FreiChat.make_url(freidefines.minimg)+" alt='max' height=12 width=12/> </span><span onmousedown='FreiChat.freichatopt(\"nooptions\")'> <img id='frei_img' src="+FreiChat.make_url(freidefines.optimg)+" title='"+freidefines.status_txt+"' alt='option'/>    </span>    <span onmousedown='FreiChat.freichatTool(\"nooptions\")'>  <img id='frei_img' src="+FreiChat.make_url(freidefines.toolimg)+" title='"+freidefines.opt_txt+"' alt='option'/> </span> <span class='self_status_img'>        <img id='frei_status' src="+FreiChat.make_url(freidefines.onlineimg)+" alt='status' align='left'/>    </span></div>";

    var randstr=Math.floor(Math.random()*1001);
    var randstr2=Math.floor(Math.random()*1002);
    // Contains DIV that shows online friends
    str_frei="<div class='frei_user_brand'><div id='frei' class='frei'>&nbsp;</div><div id='evnix"+randstr+"power' class='evnix"+randstr2+"power'><font size='1'>"+freidefines.pwdby+" <a href='http://www.evnix.com' target='_blank'>EvNix</a></font></div></div></div>";

    // Contains the DIV that appears when offline
    str_off="<div class='onfreioffline' id='onfreioffline'><a href='javascript:void(0)'  onmousedown='FreiChat.freichatopt(\"goOnline\")'><img onmouseover=FreiChat.toggle_image(\"frei_img\") title='"+freidefines.onOfflinemesg+"' id='offlineimg' src="+FreiChat.make_url(freidefines.offline)+" alt='offline'/></a></div>";

    //eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('J="<2 6=\'h j\' 5=\'j\'></2><2 6=\'h q\' 5=\'q\'></2><2 6=\'h x\' 5=\'x\'></2><2 6=\'h F\' 5=\'F\'></2>";R="<2 5=\'H\' 6=\'H\'></2><2 5=\'I\' 6=\'I\' N=\'Y:13\'></2>";n="<2 5=\'B\' 6=\'B\'><7>"+3.t+"</7>    <G/><G/>    <7 6=\'U\'>        <8 e=\'4.g(\\"l\\")\' 9="+4.d(3.r)+" f=\'"+3.L+"\' c=\'T\'/>                <8 e=\'4.g(\\"10\\")\' 9="+4.d(3.17)+" f=\'"+3.1b+"\' c=\'1f\'/>        <8 e=\'4.g(\\"P\\")\' 9="+4.d(3.1d)+" f=\'"+3.1j+"\' c=\'o\'/>                <8 e=\'4.g(\\"15\\")\' 9="+4.d(3.z)+" f=\'"+3.W+"\' c=\'1h\'/></7></2>";v="<2 5=\'19\' 6=\'1n\'><8 e=\'4.D()\' 9="+4.d(3.1l)+" f=\'"+3.D+"\' c=\'o\'/></2>";K=n+v;1g="<2 6=\'k\' 5=\'k\'> <b>"+3.Z+"</b> [<7 5=\'y\' 6=\'y\'></7>] <7 6=\'S\' e=\'4.18()\'>  <8 5=\'i\' 9="+4.d(3.1o)+" c=\'1s\' 1w=12 O=12/> </7><7 e=\'4.g(\\"C\\")\'> <8 5=\'i\' 9="+4.d(3.V)+" f=\'"+3.t+"\' c=\'u\'/>    </7>    <7 e=\'4.14(\\"C\\")\'>  <8 5=\'i\' 9="+4.d(3.1c)+" f=\'"+3.1k+"\' c=\'u\'/> </7> <7 6=\'1q\'>        <8 5=\'1u\' 9="+4.d(3.r)+" c=\'1y\' 1A=\'1C\'/>    </7></2>";M="<2 5=\'m\' 6=\'m\'>&1i;</2><2 5=\'A\' 6=\'A\'><E 11=\'1\'>"+3.1p+" <a s=\'1a://1t.1x.Q\' 1m=\'1B\'>16</a></E></2></2>";1v="<2 6=\'p\' 5=\'p\'><a s=\'X:1r(0)\'  e=\'4.g(\\"l\\")\'><8 1e=4.1D(\\"i\\") f=\'"+3.1z+"\' 5=\'z\' 9="+4.d(3.w)+" c=\'w\'/></a></2>";',62,102,'||div|freidefines|FreiChat|id|class|span|img|src|||alt|make_url|onmousedown|title|freichatopt|freicontain|frei_img|freicontain0|freichathead|goOnline|frei|str_opt1|in|onfreioffline|freicontain1|onlineimg|href|status_txt|option|str_opt2|offline|freicontain2|frei_user_count|offlineimg|evnixpower|frei_options|nooptions|restore_drag_pos|font|freicontain3|br|sound|hidfreichat|str_contain|str_options|go_online|str_frei|style|width|goInvisible|com|str_extras|min_freichathead|on|frei_status_options|optimg|go_offline|javascript|visibility|cb_head|goBusy|size||hidden|freichatTool|goOffline|EvNix|busyimg|min_max_freichat|frei_tools|http|go_busy|toolimg|invisibleimg|onmouseover|by|str_head|of|nbsp|go_invisible|opt_txt|restoreimg|target|frei_tools_options|minimg|pwdby|self_status_img|void|max|www|frei_status|str_off|height|evnix|status|onOfflinemesg|align|_blank|left|toggle_image'.split('|'),0,{}))
    // Contains the main DIV that combines the others!



    main_str=str_contain+str_extras+"<div id='freichat' class='freichat' style='z-index: 99999;'>"+str_options+str_head+str_frei+str_off+"</div>";

    if(freidefines.PLUGINS.showchatroom=='enabled'){


        main_str+="<div class='frei_chatroom' id='frei_chatroom'>\n\
	<div id='frei_roomtitle' class='frei_roomtitle'>\n\
	\n\
	</div>\n\
\n\
<div id='frei_chatroompanel' class='frei_chatroompanel'>\n\
    <div id='frei_chatroomleftpanel' class='frei_chatroomleftpanel'>\n\
\n\
        <div id='frei_chatroommsgcnt' class='frei_chatroommsgcnt'>\n\
       Messages </div>\n\
        <div id='frei_chatroomtextarea' class='frei_chatroomtextarea'>\n\
       <textarea id='chatroommessagearea' class='chatroommessagearea' onkeydown=\"$jn(this).scrollTop($jn(this)[0].scrollHeight); if (event.keyCode == 13 && event.shiftKey == 0) {javascript:return FreiChat.send_chatroom_message(this);}\"></textarea> </div>\n\
    </div>\n\
\n\
<div id='frei_chatroomrightpanel' class='frei_chatroomrightpanel'>\n\
    <div id='frei_userpanel' class='frei_userpanel'>\n\
    </div>\n\
\n\
    <div id='frei_roompanel' class='frei_roompanel'>\n\
    Rooms</div>\n\
</div>\n\
\n\
</div>\n\
</div>";

    }

    var freichathtml = document.createElement("div");
    freichathtml.id = "friechtahtml";
    freichathtml.innerHTML = main_str;
    document.body.appendChild(freichathtml);

    //$jn('body').append(main_str);



    $jn("head").append("<link>");
    css = $jn("head").children(":last");
    css.attr({
        rel:  "stylesheet",
        type: "text/css",
        href: freidefines.GEN.url+"client/jquery/js/css/"+freidefines.jquery_theme+"/jquery-ui.custom.css"
    });


    //Cache most used JQuery variables
    FreiChat.divfrei=$jn('#frei');         //Users div
    FreiChat.freiopt=$jn("#frei_options"); //First option
    FreiChat.freitool=$jn("#frei_tools"); //Second option
    FreiChat.mainchat=$jn("#freichat");  //Main chatbox
    FreiChat.ursimg=$jn("#frei_status"); //Your status image
    FreiChat.frei_minmax_img=$jn("#frei_img"); //Onload image min or max
    FreiChat.freiOnOffline=$jn("#onfreioffline"); //Div to show when status is offline
    FreiChat.datadiv = $jn("#FREICHATXDATASTORAGE");
    FreiChat.custom_mesg_div = $jn("#custom_status_change");

    if(freidefines.PLUGINS.showchatroom=='enabled'){
        FreiChat.chatroom = $jn('#frei_chatroom');
        FreiChat.roomcontainer = $jn('#frei_roomcontainer');
    }

    // FreiChat.roomcontainer.hide();
    FreiChat.custom_mesg_div.hide();
    $jn('#custom_message_id').val(freidefines.GEN.custom_mesg);

    if(freidefines.SET.fonload=="hide")
    {
        FreiChat.divfrei.hide();
    }

    FreiChat.freiopt.hide();
    FreiChat.freiOnOffline.hide();
    FreiChat.freitool.hide();

    if(FreiChat.divfrei.is(":visible") == true)
    {
        FreiChat.frei_minmax_img.attr('src',FreiChat.make_url(freidefines.minimg));
    }
    else
    {
        FreiChat.frei_minmax_img.attr('src',FreiChat.make_url(freidefines.maximg));
    }

};
//-----------------------------------------------------------------------------------------------
FreiChat.init_process_freichatX=function ()
{
    FreiChat.buglog("info","FreiChatX script initiated (17)");

    //End Of FreiChatX HTML
    //Jquery Effects
    if(freidefines.SET.fxval==="false")
    {
        $jn.fx.off = true;
    }
    else if(freidefines.SET.fxval==="true")
    {
        $jn.fx.off = false;
    }
    else
    {
        FreiChat.buglog("info","Wrong parameter used! (57)");
    }

    //Variable Declarations
    freichatusers=[];


    soundManager.onload = function() {

    };

    $jn([window, document]).blur(function(){
        FreiChat.windowFocus = false;
    }).focus(function(){
        FreiChat.windowFocus = true;
    });


    FreiChat.box_crt=[false,false,false,false];
    
    var i = 0;
    for(i=0;i<=50;i++) {
        FreiChat.last_chatroom_msg_type[i] = true;
    }

    FreiChat.init_HTML_freichatX();
    if(freidefines.PLUGINS.showchatroom=='enabled'){
        FreiChat.init_chatrooms();
        FreiChat.last_chatroom_msg_type[FreiChat.in_room] = true;
    }

    FreiChat.yourfunction();
    FreiChat.analyse();

};
//------------------------------------------------------------------------------
FreiChat.min_max_freichat=function()
{
    if(FreiChat.divfrei.is(":visible") == false)
    {
        FreiChat.frei_minmax_img.attr('src',FreiChat.make_url(freidefines.minimg));
    }
    else
    {
        FreiChat.frei_minmax_img.attr('src',FreiChat.make_url(freidefines.maximg));
        FreiChat.freiopt.slideUp("slow");
        FreiChat.freitool.slideUp("slow");
    }
    FreiChat.divfrei.slideToggle("fast");
};
//------------------------------------------------------------------------------
FreiChat.analyse=function()
{
    if(FreiChat.ses_status==4)
    {
        FreiChat.freichatopt("goOnline");
    }
    if(FreiChat.ses_status==0)
    {
        return; //Why to create chatboxes when user is offline.
    }

    //alert(freidefines.GEN.DB_obj.toSource());





    $jn.getJSON(freidefines.GEN.url+"server/freichat.php?freimode=getdata",{
        xhash:freidefines.xhash,
        id:freidefines.GEN.getid
    },function(data){


        if(data.exist!=true)
        {
            return; //Why to create chatboxes when there is no data
        }



        var message_length=data.messages.length;
        var i=0;
        for(i=0;i<message_length;i++)
        {

            var user=null;
            var id=null;
            var reidfrom = freidefines.GEN.reidfrom;

            if(data.messages[i].to==reidfrom)
            {
                user=data.messages[i].from_name;
                id=data.messages[i].from;
            }
            else
            {
                user=data.messages[i].to_name;
                id=data.messages[i].to;
            }

            var message=data.messages[i].message;


            var CookieStatus=FreiChat.getCookie(id);

            if(CookieStatus.chatwindow_1=="opened")
            {
                FreiChat.createChatBox(user,id);
                message = FreiChat.SmileyGenerate(message);

                var language = CookieStatus.language;
                var from_name = data.messages[i].from_name;
                var idfrom = data.messages[i].from;
                var divToappend = $jn("#frei_"+id+" .chatboxcontent");
                var uniqueid = FreiChat.unique++;

                divToappend.append('<div id=msg_'+uniqueid+' class="chatboxmessage"><span class="chatboxmessagefrom notranslate">'+from_name+':&nbsp;</span><span onmouseout="FreiChat.hide_original_text_onout('+uniqueid+')" onmouseover="FreiChat.show_original_text_onhover(this)" class="originalmessagecontent notranslate"  style="display:none"  id="frei_orig_'+uniqueid+'">Original message:<br/>'+message+'</span><span onmouseout="FreiChat.hide_original_text('+uniqueid+')" onmouseover="FreiChat.show_original_text(this,'+uniqueid+')" class="chatboxmessagecontent">'+message+'</span></div>');

                if(FreiChat.showtranslate == 'disabled' || language == 'disable'  || language == 'null') {
                    $jn("#msg_"+uniqueid).addClass('notranslate');
                    $jn("#translateimage"+id).attr('src',FreiChat.make_url(freidefines.notransimg));
                }
                else if(reidfrom == idfrom)
                {

                    $jn("#msg_"+uniqueid).addClass('notranslate');
                    $jn("#frei_orig"+uniqueid).addClass('notranslate');
                }
                else
                {
                    $jn("#frei_orig_"+uniqueid).addClass('iamtobehovered');
                }

                FreiChat.setCookie( "frei_stat_"+id, CookieStatus.language+"&opened&"+CookieStatus.chatwindow_2+"&nclear&"+CookieStatus.pos_top+"&"+CookieStatus.pos_left);


            }
        }

        FreiChat.time = data.messages[message_length-1].time;
        console.log(FreiChat.time);
        if(CookieStatus.chatwindow_1=="opened")
        {
            var users_length=freichatusers.length;
            for(i=0;i<=users_length;i++)
            {
                if(freichatusers[i]==undefined || freichatusers[i]==0)
                {
                    break;
                }
                else
                {
                    $jn("#frei_"+id).dragx({
                        id:id,
                        repos:true
                    });
                    FreiChat.toggleChatBoxOnLoad(freichatusers[i]);
                    $jn("#frei_"+freichatusers[i]+" .chatboxcontent").scrollTop($jn("#frei_"+freichatusers[i]+" .chatboxcontent")[0].scrollHeight);
                }
            }
        }
    },'json');
/*.error(function(){
        freidefines.GEN.url = freidefines.GEN.url.replace(/www./g,"");
    })*/
};
//------------------------------------------------------------------------------
FreiChat.createChatBoxmesg = function(user,id)
{
    var i=0,users_length=freichatusers.length;
    for(i=0;i<=users_length;i++)
    {
        if(freichatusers[i]==id)
        {
            //alert('already exists!');
            return;
        }
    }

    var CookieStatus = FreiChat.getCookie(id);

    FreiChat.chatWindowHTML(user,id);
    freichatusers.push(id);
    FreiChat.setCookie( "frei_stat_"+id, CookieStatus.language+"&opened&max&nclear&0&0");
    if(FreiChat.RequestCompleted_isset_mesg == true)
    {
        FreiChat.RequestCompleted_isset_mesg = false;
        $jn.getJSON(freidefines.GEN.url+"server/freichat.php?freimode=isset_mesg",{
            xhash:freidefines.xhash,
            id:freidefines.GEN.getid,
            Cid:id
        },function(data){

            if(data.exist==false)
            {
                return;
            }




            var message_length=data.messages.length;
            var j=0;

            for(j=0;j<message_length;j++)
            {
                var idto=data.messages[j].to;
                var idfrom=data.messages[j].from;
                var reidfrom=freidefines.GEN.reidfrom;
                var message=data.messages[j].message;
                var from_name=data.messages[j].from_name;
                var divToappend = $jn("#frei_"+id+" .chatboxcontent");


                if(idfrom==reidfrom && idto==id || idfrom==id && reidfrom==idto)
                {
                    message = FreiChat.SmileyGenerate(message);

                    var uniqueid = FreiChat.unique++;
                    var language = CookieStatus.language;

                    divToappend.append('<div id=msg_'+uniqueid+' class="chatboxmessage"><span class="chatboxmessagefrom notranslate">'+from_name+':&nbsp;</span><span onmouseout="FreiChat.hide_original_text_onout('+uniqueid+')" onmouseover="FreiChat.show_original_text_onhover(this)" class="originalmessagecontent notranslate"  style="display:none"  id="frei_orig_'+uniqueid+'">'+freidefines.plugin_trans_orig+'<br/>'+message+'</span><span onmouseout="FreiChat.hide_original_text('+uniqueid+')" onmouseover="FreiChat.show_original_text(this,'+uniqueid+')" class="chatboxmessagecontent">'+message+'</span></div>');

                    if(FreiChat.showtranslate == 'disabled' || language == 'disable'  || language == 'null') {
                        $jn("#msg_"+uniqueid).addClass('notranslate');
                        $jn("#translateimage"+id).attr('src',FreiChat.make_url(freidefines.notransimg));
                    }
                    else if(reidfrom == idfrom)
                    {

                        $jn("#msg_"+uniqueid).addClass('notranslate');
                        $jn("#frei_orig"+uniqueid).addClass('notranslate');
                    }
                    else
                    {
                        $jn("#frei_orig_"+uniqueid).addClass('iamtobehovered');
                    }

                }
            }

            $jn("#frei_"+id+" .chatboxcontent").scrollTop($jn("#frei_"+id+" .chatboxcontent")[0].scrollHeight);

        },'json')
        .complete(function(){
            FreiChat.RequestCompleted_isset_mesg = true;
        });
    }
};
//------------------------------------------------------------------------------
FreiChat.setInactivetime = function()
{
    if(FreiChat.windowFocus == false)
    {
        FreiChat.inact_time=FreiChat.inact_time+5;
    }
    else
    {
        FreiChat.inact_time = 0;

    }
    setTimeout("FreiChat.setInactivetime()",5000);
};
//------------------------------------------------------------------------------
FreiChat.yourfunction = function()
{
    if(FreiChat.inact_time>FreiChat.offline_timeOut)
    {
        FreiChat.inactive=true;
        FreiChat.freichatopt("goOffline");
    }
    if(FreiChat.inact_time>FreiChat.busy_timeOut && FreiChat.freistatus != 3 && FreiChat.freistatus!=0)
    {
        FreiChat.inactive=true;
        FreiChat.freichatopt("goTempBusy");
    }


    var loopme = function()
    {
        if(FreiChat.SendMesgTimeOut >= (freidefines.SET.chatspeed))
        {
            FreiChat.SendMesgTimeOut = 0;
            FreiChat.yourfunction();
        }
        else
        {
            FreiChat.SendMesgTimeOut = FreiChat.SendMesgTimeOut + 1000;
        }
        if(FreiChat.c == null)
        {
            FreiChat.c=setInterval(loopme,1000);
        }
    };

    loopme();
    FreiChat.get_messages();

    if(FreiChat.atimeout != null)
    {
        //alert("cleared the time our pass by post");
        clearTimeout(FreiChat.atimeout);
        FreiChat.passBYpost=false;
    }
};
//------------------------------------------------------------------------------
FreiChat.message_append = function(messages)
{
    var i=0;//=messages.length;
    var j=0;
    var exist=false;
    var message_length=messages.length;
    var reidfrom = freidefines.GEN.reidfrom;

    for(i=0;i<message_length;i++)
    {
        //alert(messages.messages);
        exist=false;
        var userlen = freichatusers.length;
        for(j=0;j<userlen;j++)
        {
            if(freichatusers[j]==messages[i].from)
            {
                exist=true;
            }
        }
        var user=messages[i].from_name;
        var id=messages[i].from;
        var message=messages[i].message;

        if(exist==false)
        {
            freichatusers.push(id);
            FreiChat.chatWindowHTML(messages[i].from_name,id);
        }

        message = FreiChat.SmileyGenerate(message);

        var CookieStatus = FreiChat.getCookie(id);
        var fromname=user;
        var newtitle=freidefines.newmesg+" "+fromname;

        var canPass = false;

        if(message!='')
        {
            // FreiChat.set_drag(id);
            var timeOut = 0;

            if(FreiChat.windowFocus==true && CookieStatus.chatwindow_2 == 'min')
            {
                canPass = true;
            }
            else if(FreiChat.windowFocus==false)
            {
                canPass = true;
            }
            else
            {
                canPass = false;
            }

            if(canPass == true)
            {
                var change_title = function()
                {//FreiChat.test(timeOut);
                    timeOut++;
                    if(timeOut > 1)
                    {
                        timeOut=0;
                        document.title = FreiChat.oldtitle;
                    }
                    else
                    {
                        document.title = newtitle;
                    }
                    $jn(FreiChat.datadiv).data('interval','true');

                    if(FreiChat.change_titletimer == null)
                    {

                        FreiChat.change_titletimer = setInterval(change_title, 2000 );
                    }
                };
                change_title();


                $jn('#chatboxhead'+id).css('background-image','url('+FreiChat.make_url(freidefines.newtopimg)+')');
                soundManager.onready(function()
                {
                    if (soundManager.supported())
                    {
                        try{
                            soundManager.play('mySound',freidefines.GEN.url+"client/jquery/img/newmsg.mp3");
                        }catch(e){
                            FreiChat.buglog("info","SoundManager Error: "+e  );
                        }
                    }
                    else
                    {
                        FreiChat.buglog("info","SoundManager does not support your system");
                    }
                });
            }
        }

        var from_name = fromname;

        var language = CookieStatus.language;
        var divToappend = $jn("#frei_"+id+" .chatboxcontent");
        var uniqueid = FreiChat.unique++;

        divToappend.append('<div id=msg_'+uniqueid+' class="chatboxmessage"><span class="chatboxmessagefrom notranslate">'+from_name+':&nbsp;</span><span onmouseout="FreiChat.hide_original_text_onout('+uniqueid+')" onmouseover="FreiChat.show_original_text_onhover(this)" class="originalmessagecontent notranslate"  style="display:none"  id="frei_orig_'+uniqueid+'">Original message:<br/>'+message+'</span><span onmouseout="FreiChat.hide_original_text('+uniqueid+')" onmouseover="FreiChat.show_original_text(this,'+uniqueid+')" class="chatboxmessagecontent">'+message+'</span></div>');

        if(FreiChat.showtranslate == 'disabled' || language == 'disable'  || language == 'null') {
            $jn("#msg_"+uniqueid).addClass('notranslate');
            $jn("#translateimage"+id).attr('src',FreiChat.make_url(freidefines.notransimg));
        }
        else if(reidfrom == id)
        {

            $jn("#msg_"+uniqueid).addClass('notranslate');
            $jn("#frei_orig"+uniqueid).addClass('notranslate');
        }
        else
        {
            $jn("#frei_orig_"+uniqueid).addClass('iamtobehovered');
        }


        FreiChat.appendtranslate(language,id,['callbyget',uniqueid]);
        FreiChat.setCookie( "frei_stat_"+id, CookieStatus.language+"&opened&max&nclear&0&0");
        $jn("#frei_"+id+" .chatboxcontent").scrollTop($jn("#frei_"+id+" .chatboxcontent")[0].scrollHeight);

    }
};
//------------------------------------------------------------------------------
FreiChat.get_messages = function()
{

    if(FreiChat.freistatus == 'loggedout')
    {
        return;
    }

    if(FreiChat.freistatus == 4 || FreiChat.freistatus == 3)
    {
        FreiChat.temporary_status++;
    }
    //FreiChat.test("me too!");
    if((FreiChat.inactive == false && FreiChat.freistatus != 3)
        || FreiChat.temporary_status>10)
        {
        FreiChat.temporary_status = 0;
        if(FreiChat.RequestCompleted_get_members == true)
        {
            FreiChat.RequestCompleted_get_members = false;

            FreiChat.set_custom_mesg();

            var in_room = FreiChat.in_room;

            if(!$jn('#dc-slick-9').hasClass('active')){
                in_room = -1;
            }

            $jn.getJSON(freidefines.GEN.url+"server/freichat.php?freimode=getmembers",{
                xhash:freidefines.xhash,
                id:freidefines.GEN.getid,

                first:FreiChat.first,

                time:FreiChat.time,
                chatroom_mesg_time:FreiChat.chatroom_mesg_time,
                'clrchtids[]': [FreiChat.clrchtids],
                custom_mesg:FreiChat.custom_mesg,
                in_room:in_room
            //DB_obj:'<?php echo json_encode($construct->db) ?>'

            },function(data){


                if(FreiChat.height != data.count*25 || FreiChat.height == 20){
                    if(data.count<=6)
                    {
                        if(data.count == 0) {
                            FreiChat.divfrei.css("height",20);
                        }else {
                            FreiChat.height = data.count*25;
                            FreiChat.divfrei.css("height",FreiChat.height);
                        }
                    }
                }


                if(freidefines.PLUGINS.showchatroom=='enabled'){
                    if(FreiChat.first === false) {

                        var selected_chatroom = Get_Cookie('selected_chatroom');

                        if(selected_chatroom == null){
                            FreiChat.setCookie('selected_chatroom', FreiChat.in_room);
                        }else
                        {
                            if(selected_chatroom !=-1 && selected_chatroom !=0)
                                FreiChat.loadchatroom(data.room_array[selected_chatroom].room_name,selected_chatroom);
                        }

                    }

                    /*alert("D");
for(i=0;i<data.chatroom_messages.length;i++) {

    
alert(data.chatroom_messages[i].message);
}*/


                    FreiChat.append_chatroom_message_div(data.chatroom_messages,'append');

                    FreiChat.room_array = data.room_array;

                    FreiChat.chatroom_users[data.in_room] = data.chatroom_users_div;

                    if(data.in_room != -1 || FreiChat.first == false)
                    {
                        FreiChat.usercreator(data.in_room);
                        FreiChat.roomcreator(1);
                    }

                    if(data.chatroom_mesg_time!=null)
                    {
                        FreiChat.chatroom_mesg_time=data.chatroom_mesg_time;
                    }


                }

                FreiChat.clrchtids = [];
                if(data==null)
                {
                    FreiChat.buglog("info","Data is NULL");
                    return;
                }

                FreiChat.first=true;

                $jn("#frei_user_count").html(data.count);

                freidefines.GEN.fromname = data.username;  //Update
                freidefines.GEN.reidfrom = data.userid;    // Details on login

                if(data.time!=null)
                {
                    FreiChat.time=data.time;
                }


                if(data.islog=="guesthasnopermissions")
                {
                    FreiChat.divfrei
                    .css("height",freidefines.fnopermsht)
                    .html(freidefines.nopermsmesg);
                    FreiChat.freistatus = 'loggedout';
                    FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.invisibleimg));
                    FreiChat.closeAllChatBoxes();
                    return;
                }

                $jn('#hidfreichat').html(data.userdata);
                $jn('#onlusers').html(data.count);
                FreiChat.ostatus=FreiChat.freistatus=data.status;

                if(FreiChat.freistatus == 0)
                {
                    FreiChat.mainchat.hide();
                    FreiChat.freiOnOffline.show();
                    FreiChat.inactive = true;
                }
                else if(FreiChat.freistatus==1)
                {
                    FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.onlineimg));
                }
                else if(FreiChat.freistatus==2)
                {
                    FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.invisibleimg));
                }
                else if(FreiChat.freistatus==3)
                {
                    FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.busyimg));
                }
                else
                {
                    FreiChat.buglog("info","freistatus undefined or wrong in freichat/freichat.js on line 261");
                }

                if(data.userdata==null)
                {
                    data.userdata=freidefines.nolinemesg;
                    FreiChat.divfrei
                    //.css("height",freidefines.fnoonlineht)
                    .html(data.userdata);
                }
                else
                {
                    FreiChat.divfrei.html(data.userdata);
                //FreiChat.divfrei.css("height",freidefines.fonlineht);
                }
                if(FreiChat.divfrei.text().length>16)
                {
                //FreiChat.divfrei.css("height",freidefines.fmaxht);
                }

                FreiChat.message_append(data.messages);
            },'json')
            .complete(function(){
                FreiChat.RequestCompleted_get_members = true;
            });
        }
    }
    else if(FreiChat.freistatus == 0)
    {
        FreiChat.inactive = true;
        FreiChat.mainchat.hide();
        FreiChat.freiOnOffline.show();
    }
    else
    {
        FreiChat.buglog('log', 'Not possible to eneter this block');
    }

};
//------------------------------------------------------------------------------
FreiChat.createChatBox = function(user,id)
{
    CookieStatus = FreiChat.getCookie(id);

    FreiChat.setCookie( "frei_stat_"+id, CookieStatus.language+"&opened&&clear&0&0");


    var i=0,users_length=freichatusers.length;
    for(i=0;i<=users_length;i++)
    {
        if(freichatusers[i]==id)
        {
            //alert('already exists!');
            return;
        }
    }



    freichatusers.push(id);
    FreiChat.chatWindowHTML(user,id);
    if(FreiChat.showtranslate == 'disabled' || CookieStatus.language == 'disable'  || CookieStatus.language == 'null') {
        $jn("#translateimage"+id).attr('src',FreiChat.make_url(freidefines.notransimg));
    }

};
//------------------------------------------------------------------------------
FreiChat.checkChatBoxInputKey = function(event,chatboxtextarea,id,user,option)
{

    var freiarea=$jn(chatboxtextarea);
    var message = freiarea.val();
    var local_in_room = FreiChat.in_room;
    freiarea.scrollTop(freiarea[0].scrollHeight);

    message = message.replace(/^\s+|\s+$/g,"");


    freiarea
    .val('')
    .css('height','44px');

    if (message != '')
    {

        message = FreiChat.formatMessage(message);
        message = message.replace(/\r/g,"<br/>");
        message = message.replace(/,/g,"&#44;");
        message = message.replace(/\r?\n/g, "<br/>");
        if(option  == 'normal')

        {
            if(FreiChat.isOlduser!=id && FreiChat.bulkmesg.length>0)
            {
                FreiChat.sendMessage(id,FreiChat.bulkmesg,user,'normal');
            }
            FreiChat.isOlduser=id;



            $jn("#frei_"+id+" .chatboxcontent")
            .append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+freidefines.GEN.fromname+':&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>')
            .scrollTop($jn("#frei_"+id+" .chatboxcontent")[0].scrollHeight);

        }
        else
        {
            if(FreiChat.chatroom_changed == true && FreiChat.bulkmesg.length>0)
            {
                FreiChat.sendMessage(id,FreiChat.bulkmesg,user,'chatroom');
            }
            // FreiChat.isOldchatroom=FreiChat.in_room;
            
            var message_div = '';
            alert(FreiChat.last_chatroom_msg_type[FreiChat.in_room])
            if(FreiChat.last_chatroom_msg_type[FreiChat.in_room] === true){
                message_div='<div id = "'+local_in_room+'_chatroom_message" class="frei_chatroom_message"><span style="display:none" id="'+local_in_room+'_message_type">LEFT</span><p class="triangle-right frei_room_left_arrow"><span id="room_msg_'+FreiChat.unique+'" class="frei_chatroom_msgcontent">' +message+ '</span></p><span class="chatroom_messagefrom_left">' +freidefines.GEN.fromname+ '</span></div>';
            }else {
                message_div='<div id = "'+local_in_room+'_chatroom_message" class="frei_chatroom_message"><span style="display:none" id="'+local_in_room+'_message_type">RIGHT</span><p class="triangle-right frei_room_right_arrow"><span id="room_msg_'+FreiChat.unique+'" class="frei_chatroom_msgcontent">' +message+ '</span></p><span class="chatroom_messagefrom_right">' +freidefines.GEN.fromname+ '</span></div>';
            }
            if(freidefines.GEN.reidfrom == FreiChat.last_chatroom_usr_id && $jn('#'+local_in_room+'_chatroom_message').length>0){//} && FreiChat.first_chatroom_message == false){// && FreiChat.last_in_chatroom == FreiChat.in_room) {
                $jn('#'+FreiChat.last_chatroom_msg_id).append("<br/>"+message);
                $jn("#frei_chatroommsgcnt").scrollTop($jn("#frei_chatroommsgcnt")[0].scrollHeight);
            }else
            {

                $jn("#frei_chatroommsgcnt")
                .append(message_div)
                .scrollTop($jn("#frei_chatroommsgcnt")[0].scrollHeight);


                //      FreiChat.first_chatroom_message_sent = true;
                FreiChat.last_chatroom_msg_id = 'room_msg_'+FreiChat.unique;
                FreiChat.unique++;
                FreiChat.last_chatroom_usr_id =  freidefines.GEN.reidfrom;
                FreiChat.last_chatroom_msg_type[FreiChat.in_room] = !FreiChat.last_chatroom_msg_type[FreiChat.in_room];
            }
        //alert(FreiChat.chatroom_message_exist);

        //  FreiChat.chatroom_message_exist[local_in_room] = true;
        //  FreiChat.chatroom_mymessage = true;
        }
        FreiChat.bulkmesg.push(message);
        // FreiChat.bulkmesg += message; use if want to send cont. mesg as string



        setTimeout(function(){
            if(option == 'normal')
            {
                FreiChat.sendMessage(id,FreiChat.bulkmesg,user,'normal');
            }else
            {
                FreiChat.sendMessage(local_in_room,FreiChat.bulkmesg,user,'chatroom');
            }

        }, freidefines.SET.mesgSendSpeed);
    }
};
//------------------------------------------------------------------------------
FreiChat.append_chatroom_message_div = function(messages,type) {

    if(typeof type == 'undefined') {
        type = 'nclear'
    }



    var message_length = messages.length;
    var i = 0 ;
    var message = '';
    var scroll_to_top = false;
    var div = $jn("#frei_chatroommsgcnt");
    var first_message = FreiChat.last_chatroom_msg_type[FreiChat.in_room];
    
    if(FreiChat.first_message == false){
        first_message = false;
    }else
    {
        first_message = true;
    }
    //var //FreiChat.last_chatroom_msg_type[FreiChat.in_room];
    var local_in_room = FreiChat.in_room;
    
    
    var message_type = FreiChat.last_chatroom_msg_type[FreiChat.in_room];



    if(type == 'clear') {
        div.html('');
    }else {
    // alert("nodelee");
    }


    for(i=0;i<message_length;i++) {
        //    alert(FreiChat.last_in_chatroom+" == "+FreiChat.in_room);
        
        if(first_message == true) {
            message_type = true;
        }
        // alert("f");
        if(messages[i].from == FreiChat.last_chatroom_usr_id  && first_message == false) {// && FreiChat.last_in_chatroom == FreiChat.in_room) {//alert('message');
            $jn('#'+FreiChat.last_chatroom_msg_id).append("<br/>"+messages[i].message);
            scroll_to_top = true;
        }else
        {
            if(message_type===true){
                message='<div id = "'+messages[i].room_id+'_chatroom_message"  class="frei_chatroom_message"><span style="display:none" id="'+local_in_room+'_message_type">LEFT</span><p class="triangle-right frei_room_left_arrow"><span id="room_msg_'+FreiChat.unique+'" class="frei_chatroom_msgcontent">' +messages[i].message+ '</span></p><span class="chatroom_messagefrom_left">' +messages[i].from_name+ '</span></div>';
            }else{
                message='<div id = "'+messages[i].room_id+'_chatroom_message" class="frei_chatroom_message"><span style="display:none" id="'+local_in_room+'_message_type">RIGHT</span><p class="triangle-right frei_room_right_arrow"><span id="room_msg_'+FreiChat.unique+'" class="frei_chatroom_msgcontent">' +messages[i].message+ '</span></p><span class="chatroom_messagefrom_right">' +messages[i].from_name+ '</span></div>';
            }


            div.append(message);
            //FreiChat.last_in_chatroom=FreiChat.in_room;
            scroll_to_top = true;
            FreiChat.last_chatroom_msg_id = 'room_msg_'+FreiChat.unique;
            FreiChat.unique++;
            first_message = false;
            FreiChat.last_chatroom_usr_id =  messages[i].from;
            message_type = !message_type;
            
        }

    }
    
    //alert(message_type)
    
    FreiChat.last_chatroom_msg_type[FreiChat.in_room] = message_type;
    //alert(FreiChat.last_chatroom_msg_type[FreiChat.in_room]);
    if(scroll_to_top == true) {
        $jn("#frei_chatroommsgcnt").scrollTop($jn("#frei_chatroommsgcnt")[0].scrollHeight);
    }
    FreiChat.first_message = false;
}
//------------------------------------------------------------------------------
FreiChat.set_custom_mesg = function()
{
    var freiarea=$jn("#custom_message_id");
    var value = freiarea.val();

    value = value.replace(/\n/,"&#10;&#13;");
    $jn(FreiChat.datadiv).data('custom_mesg',value);

    FreiChat.custom_mesg = value;

}
//------------------------------------------------------------------------------
FreiChat.chatWindowHTML = function(user,id)
{
    FreiChat.frei_box_contain(id);
    var chatboxtitle=user;
    var str='<div onmousedown="FreiChat.set_drag(\''+id+'\')" id="frei_'+id+'" class="frei_box">        <div id="chatboxhead_'+id+'">            <div id="frei_trans'+id+'" class="chatboxhead">                <div id="trans_lang">'+FreiChat.langlist(id)+'                </div>                           </div>            <div class="chatboxhead" id="chatboxhead'+id+'">                <div class="chatboxtitle">'+chatboxtitle+'&nbsp;&nbsp;&nbsp;</div>                <div class="chatboxoptions">                                                     <a href="javascript:void(0)" onmousedown="FreiChat.toggleChatBox(\'freicontent_'+id+'\')">        <span class=X_tools><a href="javascript:void(0)" onmousedown=FreiChat.showXtools(\''+id+'\')><img id="clrcht'+id+'" src="'+FreiChat.make_url(freidefines.arrowimg)+'" alt="-" />   </a></span><a href="javascript:void(0)" onmousedown="FreiChat.toggleChatBox(\'freicontent_'+id+'\')"><img id="minimgid'+id+'" src="'+FreiChat.make_url(freidefines.minimg)+'" alt="-"/></a> <a href="javascript:void(0)" onmousedown="FreiChat.closeChatBox(\'frei_'+id+'\','+FreiChat.box_count+')">                        <img src="'+FreiChat.make_url(freidefines.closeimg)+'" alt="X" />                    </a>                </div>                <br clear="all"/>            </div>        </div>        <div class="freicontent_'+id+'" id="freicontent_'+id+'">            <div class="chatboxcontent" id="chatboxcontent_'+id+'"></div>            <div class="chatboxinput">  <span id="addedoptions_'+id+'" class="added_options"> '+FreiChat.show_plugins(user,id)+'</span><textarea id="chatboxtextarea'+id+'" class="chatboxtextarea" onkeydown="$jn(this).scrollTop($jn(this)[0].scrollHeight); if (event.keyCode == 13 && event.shiftKey == 0) {javascript:return FreiChat.checkChatBoxInputKey(event,this,\''+id+'\',\''+user+'\',\'normal\');}"></textarea>                </div>       </div>    </div>';
    $jn('#freicontain'+FreiChat.box_count).html(str+$jn('#freicontain'+FreiChat.box_count).html());
    FreiChat.set_drag(id);

    $jn('#frei_'+id).bind({
        click:function()
        {
            FreiChat.change_to_old_title(id);
        }
    });
    $jn('#addedoptions_'+id).hide();
    $jn("#frei_trans"+id).hide();

    var smileys = $jn('#frei_smileys_'+id);
    var smile   = $jn('#smile_'+id);
    var isin = false;

    smile.mouseenter(function(){
        isin=true;
    }).mouseleave(function(){
        isin=false;
    });

    
    
    $jn(document).click(function(){
        if(smileys.hasClass('inline') && isin == false)
        {
            smileys.css('display','none')
            .removeClass('inline')
            .addClass('none');
        }
    });
};
//------------------------------------------------------------------------------
FreiChat.change_to_old_title = function(id)
{
    if($jn(FreiChat.datadiv).data('interval') == 'true')
    {
        $jn(FreiChat.datadiv).data('interval','false');
        clearInterval(FreiChat.change_titletimer);
        FreiChat.change_titletimer=null;
        document.title = FreiChat.oldtitle;
        $jn('#chatboxhead'+id).css('background-image','url('+FreiChat.make_url(freidefines.btopimg)+')');
    }

}
//------------------------------------------------------------------------------
FreiChat.sendMessage = function(id,message,user,type)
{
    if(FreiChat.bulkmesg.length>=1)
    {

        if(type == 'normal')
        {
            var CookieStatus=FreiChat.getCookie(id);
            FreiChat.setCookie( "frei_stat_"+id, CookieStatus.language+"&opened&max&nclear&"+CookieStatus.pos_top+"&"+CookieStatus.pos_left);
        }
        FreiChat.bulkmesg=[];

        FreiChat.SendMesgTimeOut = 0;

        if(FreiChat.RequestCompleted_send_messages == true)
        {
            FreiChat.RequestCompleted_send_messages = false;

            $jn.post(freidefines.GEN.url+"server/freichat.php?freimode=post", {
                passBYpost:FreiChat.passBYpost,
                time:FreiChat.time,
                xhash:freidefines.xhash,
                id:freidefines.GEN.getid,
                to: id,
                chatroom_mesg_time:FreiChat.chatroom_mesg_time,
                message_type:type,
                'message[]': [message],
                to_name: user,
                custom_mesg:FreiChat.custom_mesg,
                in_room:id

            } , function(data){
                freidefines.GEN.fromname = data.username;

                if(FreiChat.atimeout == null){
                    FreiChat.atimeout = setTimeout("FreiChat.atimeout=null;FreiChat.passBYpost=true;",5000);
                }


                if(data.messages!=null)
                {
                    if(data.time!=null)
                    {
                        FreiChat.time=data.time;
                    }
                    if(data.chatroom_mesg_time!=null)
                    {
                        FreiChat.chatroom_mesg_time=data.chatroom_mesg_time;
                    }

                    if(freidefines.PLUGINS.showchatroom=='enabled'){
                        FreiChat.append_chatroom_message_div(data.chatroom_messages,'append');
                    }

                    FreiChat.message_append(data.messages);
                }

            },'json')
            .complete(function(){
                FreiChat.RequestCompleted_send_messages = true;
            });
        }
    }
};
//------------------------------------------------------------------------------
FreiChat.formatMessage = function(message)
{
    message = message.replace(/\r/g,"<br/>");
    message = message.replace(/(<([^>]+)>)/ig,"");
    message = message.replace(/&lt/g,"");
    message = message.replace(/&gt/g,"");
    message = message.replace(/\\/g,"");
    message = message.replace(/((ht|f)t(p|ps):\/\/\S+)/g, '<a href="$1" target="_blank">$1</a>');
    message = message.replace(/(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)/g, '<a href="mailto:$2@$3">$2@$3</a>');
    message = message.replace(/'/g,"\'");
    message = FreiChat.SmileyGenerate(message);

    return message;
};
//------------------------------------------------------------------------------
FreiChat.toggleChatBoxOnLoad = function(id)
{
    var idx=id.replace(id,"freicontent_"+id);
    var status=FreiChat.getCookie(id);
    if(status.chatwindow_2=="min")
    {
        $jn("#"+idx).hide();
        $jn("#minimgid"+id).attr('src',FreiChat.make_url(freidefines.maximg));
        $jn("#addedoptions_"+id).hide();
    }
};
//------------------------------------------------------------------------------
FreiChat.toggleChatBox = function(id)
{
    var idx=id.replace("freicontent_","");
    var options = {};

    var CookieStatus = FreiChat.getCookie(idx);

    if($jn("#"+id).is(":visible") == true)
    {
        FreiChat.setCookie( "frei_stat_"+idx, CookieStatus.language+"&opened&min&&"+CookieStatus.pos_top+"&"+CookieStatus.pos_left);
        $jn("#drag_"+id).draggable('disable');
        $jn("#"+id).hide('clip',options,300);
        $jn("#minimgid"+idx).attr('src',FreiChat.make_url(freidefines.maximg));
        $jn("#addedoptions_"+idx).hide();
    }
    else
    {
        FreiChat.setCookie( "frei_stat_"+idx, CookieStatus.language+"&opened&max&&"+CookieStatus.pos_top+"&"+CookieStatus.pos_left);
        $jn("#"+id).show('clip',options,300,function(){
            $jn("#drag_"+id).dragx({
                id:idx,
                handle:"#chatboxhead_"+idx
            });
            $jn("#minimgid"+idx).attr('src',FreiChat.make_url(freidefines.minimg));
            $jn("#frei_"+idx+" .chatboxcontent").scrollTop($jn("#frei_"+idx+" .chatboxcontent")[0].scrollHeight);

            if($jn(FreiChat.datadiv).data("isvisible") == "true")
            {
                $jn("#addedoptions_"+idx).show();
            }
        });
    }
};
//------------------------------------------------------------------------------
FreiChat.closeChatBox = function(id,box_pos)
{
    FreiChat.box_crt[box_pos]=false;
    var idx = id.replace('frei_', '');

    var CookieStatus = FreiChat.getCookie(idx);

    FreiChat.setCookie( "frei_stat_"+idx, CookieStatus.language+"&closed&max&0&0");

    var options = {};

    $jn("#"+id)
    .hide('explode',options,1000)
    .remove();
    //alert("df");
    var i=0,users_length=freichatusers.length;
    idx=idx;
    for(i=0;i<=users_length;i++)
    {
        if(freichatusers[i]==idx)
        {
            //alert('already exists!2');
            freichatusers[i]=0;
        }
    }

//alert(idx);
};
//------------------------------------------------------------------------------
FreiChat.closeAllChatBoxes = function()
{
    var i=0;
    var id=null;
    var users_len=freichatusers.length;

    for(i=0;i<=3;i++)
    {
        FreiChat.box_crt[i]=false;
        $jn('#freicontain'+i).html(null);
    }

    for(i=0;i<=users_len;i++)
    {
        if(freichatusers[i]==undefined || freichatusers[i]==0)
        {
            break;
        }
        else
        {
            id = freichatusers[i];
            var CookieStatus = FreiChat.getCookie(id);

            FreiChat.setCookie( "frei_stat_"+id, CookieStatus.language+"&closed&max&0&0");

            $jn("#frei_"+id).hide();
            freichatusers[i]=0;
            id=null;
        }
    }
};
//------------------------------------------------------------------------------
FreiChat.SmileyGenerate = function(messages)
{
    var replaced_mesg=messages;

    replaced_mesg = replaced_mesg.replace(/:\)/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/smile.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:\'\)/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/cry.jpeg" alt="samile" />');
    replaced_mesg = replaced_mesg.replace(/B\)/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/cool.png" alt="samile" />');
    replaced_mesg = replaced_mesg.replace(/:B/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/cool.png" alt="samile" />');
    replaced_mesg = replaced_mesg.replace(/:\(/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/sad.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:laugh:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/laughing.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:cheer:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/cheerful.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/;\)/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/wink.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:P/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/tongue.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:angry:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/angry.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:unsure:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/unsure.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:ohmy:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/shocked.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:huh:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/wassat.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:o/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/shocked.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:0/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/shocked.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:dry:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/ermm.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:lol:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/grin.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:D/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/grin.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:silly:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/silly.png" alt="smile" />');
    replaced_mesg = replaced_mesg.replace(/:woohoo:/g,'<img src="'+freidefines.GEN.url+'client/jquery/img/w00t.png" alt="smile" />');

    return replaced_mesg;
};
//------------------------------------------------------------------------------
FreiChat.smiley = function(id)
{

    var smileys = $jn('#frei_smileys_'+id);

    if(smileys.hasClass('none'))
    {
        smileys.css('display','inline')
        .removeClass('none')
        .addClass('inline');
    }
    else
    {
        smileys.css('display','none')
        .removeClass('inline')
        .addClass('none');
    }
};
//------------------------------------------------------------------------------
FreiChat.smileylist = function(id)
{
    var str= '<span class="langlist">'+FreiChat.mksmileyurl([':)',':(',':B',':\')',':laugh:',':cheer:',';)',':P',':angry:',':unsure:',':ohmy:',':huh:',':o',':0',':dry:',':lol:',':D',':silly:',':woohoo:'], id)+'</span>';
    return str;

};
//------------------------------------------------------------------------------
FreiChat.mksmileyurl = function(name,id)
{
    var namelen = name.length;
    var i=0;
    var str = '<tr>';
    var j=0;

    for(i=0; i<=namelen; i++)
    {
        if(name[i] == null || name[i] == undefined)
        {
            break;
        }

        if(j>=5)
        {
            str+='</tr><tr>';
            j=0;
        }

        str += '<a href="javascript:void(0)" onmousedown=FreiChat.appendsmiley("'+name[i]+'","'+id+'")>'+FreiChat.SmileyGenerate(name[i])+'</a>&nbsp;';
        j++
    }
    //alert('<table><td>'+str+'</td></table>');
    return '<table><td>'+str+'</td></table>';
};
//------------------------------------------------------------------------------
FreiChat.appendsmiley = function(name,id)
{
    var area = $jn('#chatboxtextarea'+id);

    $jn('#frei_smileys_'+id).css('display','none')
    .removeClass('inline')
    .addClass('none');

    area.val(area.val()+name+" ");
};
//------------------------------------------------------------------------------
FreiChat.set_drag = function(id)
{//alert(id);
    var status = FreiChat.getCookie(id);
    if(status['chatwindow_2']=="min" || freidefines.SET.draggable == 'disable')
    {
        $jn("#frei_"+id).draggable('disable');
    }
    else
    {
        $jn("#frei_"+id).dragx({
            id:id,
            handle:"#chatboxhead_"+id
        });
    }
};
//------------------------------------------------------------------------------
FreiChat.clrcht = function(id)
{
    var CookieStatus=FreiChat.getCookie(id);
    if(CookieStatus.message!="clear")
    {
        FreiChat.clrchtids.push(id);

        FreiChat.setCookie( "frei_stat_"+id, CookieStatus.language+"&opened&max&clear&"+CookieStatus.pos_top+"&"+CookieStatus.pos_left);
        $jn("#frei_"+id+" .chatboxcontent").html("<font size='1' color='#A4A4A4'>"+freidefines.chatHistoryDeleted+"</font>");
    }
    else
    {
        $jn("#frei_"+id+" .chatboxcontent").html("<font size='1' color='#A4A4A4'>"+freidefines.chatHistoryNotFound+"</font>");
    }
};
//------------------------------------------------------------------------------
FreiChat.frei_box_contain = function(id)
{
    if(FreiChat.box_crt[0]==true && FreiChat.box_crt[1]==true && FreiChat.box_crt[2]==true && FreiChat.box_crt[3]==true)
    {
        if(FreiChat.cnt>=4)
        {
            FreiChat.cnt=0;
        }
        FreiChat.closeChatBox("frei_"+FreiChat.box_crt_id[FreiChat.cnt],FreiChat.cnt);
        FreiChat.box_count=FreiChat.cnt;
        FreiChat.box_crt_id[FreiChat.cnt]=id;
        FreiChat.box_crt[FreiChat.cnt]=true;
        FreiChat.cnt=FreiChat.cnt+1;
    }
    else
    {
        var boxCrt_length=FreiChat.box_crt.length;
        for(i=0;i<=boxCrt_length;i++)
        {
            if(FreiChat.box_crt[i]==false)
            {
                FreiChat.box_crt[i]=true;
                FreiChat.box_crt_id[i]=id;
                FreiChat.box_count=i;
                break;
            }
        }
    }

    return FreiChat.box_count;
};
//------------------------------------------------------------------------------
FreiChat.freichatopt = function(opt)
{
    var users_length=freichatusers.length;

    if(FreiChat.ses_status==null)
    {
        FreiChat.freistatus=1;
    }

    if(opt=="nooptions")
    {
        if(FreiChat.freitool.is(":visible") == true)
        {
            FreiChat.freitool.hide();
        }
        FreiChat.freiopt.slideToggle();
        return;
    }
    else if(opt=="goOffline")
    {
        FreiChat.freistatus=0;
        FreiChat.mainchat.hide();
        FreiChat.freiOnOffline.show();
        for(i=0;i<=users_length;i++)
        {
            $jn("#frei_"+freichatusers[i]).hide();
        }
    }
    else if(opt=="goOnline")
    {
        FreiChat.freistatus=1;
        FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.onlineimg));
        if(FreiChat.mainchat.is(":visible") == false)
        {
            var i = 0;
            FreiChat.mainchat.show();
            FreiChat.divfrei.html(freidefines.onfoffline);
            FreiChat.freiOnOffline.hide();
            for(i=0;i<=users_length;i++)
            {
                $jn("#frei_"+freichatusers[i]).show();
            }
        }
    }
    else if(opt=="goInvisible")
    {
        FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.invisibleimg));
        FreiChat.freistatus=2;
    }
    else if(opt=="goBusy")
    {
        FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.busyimg));
        FreiChat.freistatus=3;
    }
    else if(opt=="goTempBusy")
    {
        FreiChat.ursimg.attr('src',FreiChat.make_url(freidefines.busyimg));
        FreiChat.freistatus=4;
    }
    else
    {
        FreiChat.buglog("info","opt not defined on line 785 in freichat/client/freichat.js");
    }

    if(FreiChat.freistatus!=FreiChat.ostatus)
    {
        $jn.post(freidefines.GEN.url+"server/freichat.php?freimode=update_status", {
            xhash:freidefines.xhash,
            id:freidefines.GEN.getid,
            freistatus:FreiChat.freistatus
        } , function(data){
            FreiChat.ostatus=FreiChat.freistatus=data.status;
        },'json');
    }

};
//------------------------------------------------------------------------------
FreiChat.sendmail = function(user,id)
{
    FreiChat.toid=id;
    FreiChat.touser=user;

    var left   = (screen.width  - 450)/2;
    var top    = (screen.height - 250)/2;

    window.open(freidefines.GEN.url+"client/plugins/mail/html.php",'mailWindow','width=450,height=250,top='+top+',left='+left);
};
//------------------------------------------------------------------------------
FreiChat.freichatTool = function(opt)
{
    if(opt=="nooptions")
    {
        if(FreiChat.freiopt.is(":visible") == true)
        {
            FreiChat.freiopt.slideUp();
        }
        FreiChat.freitool.slideToggle();
    }
};
//------------------------------------------------------------------------------
FreiChat.restore_drag_pos = function()
{
    $jn("#frei_box").dragx({
        restore:true,
        id:freichatusers
    });
};
//------------------------------------------------------------------------------
FreiChat.make_url = function(name)
{
    var backslash="/";

    if(name.charAt(0) == '/'){
        backslash="";
    }

    if(name.search('updated') != -1)
    {
        name = name.replace('updated','').replace(freidefines.SET.theme,'');
        name = 'blue_flower/'+name;
        return freidefines.GEN.url+"client/jquery/freichat_themes/"+name;
    }
    return freidefines.GEN.url+"client/jquery/freichat_themes/"+freidefines.SET.theme+backslash+name;
};
//------------------------------------------------------------------------------
FreiChat.buglog = function(func,mesg)
{
    if(FreiChat.debug==true)
    {
        if(func == "log")
        {
            console.log(mesg);
        }
        else if(func == "info")
        {
            console.info(mesg);
        }
        else if(func == "error")
        {
            console.error(mesg);
        }
        else
        {
            console.error("Worng parameter (684)");
        }
    }
};
//------------------------------------------------------------------------------
FreiChat.getCookie = function(id)
{
    var boxstatus=null;
    var stat_str=null;
    var values=[];

    stat_str=Get_Cookie("frei_stat_"+id);

    if(stat_str==null)
    {
        stat_str = null+"&closed&min&clear";
        boxstatus = stat_str.split("&");
    }
    else
    {
        boxstatus = stat_str.split("&");
    }

    values.language = boxstatus[0];
    values.chatwindow_1 = boxstatus[1];
    values.chatwindow_2 = boxstatus[2];
    values.message = boxstatus[3];
    values.pos_top = boxstatus[4];
    values.pos_left = boxstatus[5];

    return values;
};
//------------------------------------------------------------------------------
FreiChat.setCookie = function(name,value)
{
    Set_Cookie(name, value, 0, '/', '', '' );
};
//------------------------------------------------------------------------------
FreiChat.upload = function(user,id)
{
    FreiChat.toid=id;
    FreiChat.touser=user;
    var left   = (screen.width  - 400)/2;
    var top    = (screen.height - 200)/2;

    window.open(freidefines.GEN.url+"client/plugins/upload/html.php",'uploadWindow','width=400,height=200,top='+top+',left='+left);
};
//------------------------------------------------------------------------------
FreiChat.toggle_image = function(imgid , imgsrc)
{
    imgid++;
    imgsrc++;
//var img = document.getElementById(imgid);
//img.title = freidefines.GEN.url+"client/jquery/freichat_themes/"+freidefines.SET.theme+"online.png";
};
//------------------------------------------------------------------------------
FreiChat.show_plugins = function(user,id)
{

    var pluginhtml='';

    if(freidefines.PLUGINS.show_file_send == 'true' )
    {
        if((freidefines.GEN.is_guest == 1 && freidefines.ACL.FILE.guest == "allow") || (freidefines.GEN.is_guest == 0 && freidefines.ACL.FILE.user == "allow"))
        {
            pluginhtml = '<span id="freifilesend'+id+'"><a href="javascript:void(0)" onClick="FreiChat.upload(\''+user+'\',\''+id+'\')"><img id="upload'+id+'" src="'+FreiChat.make_url(freidefines.uploadimg)+'" title='+freidefines.titles_upload+' alt="upload" /> </a></span>';
        }

    }

    if(freidefines.PLUGINS.showtranslate == 'enabled')
    {
        if((freidefines.GEN.is_guest == 1 && freidefines.ACL.TRANSLATE.guest == "allow") || (freidefines.GEN.is_guest == 0 && freidefines.ACL.TRANSLATE.user == "allow"))
        {
            pluginhtml += '<span id="trans'+id+'"><a href="javascript:void(0)" onmousedown="FreiChat.translate(\''+id+'\')"><img class="translateimage" title="'+freidefines.titles_translate+'" id="translateimage'+id+'" src="'+FreiChat.make_url(freidefines.translateimg)+'" alt="Tranlate" /> </a></span>';
        }
    }

    pluginhtml+= '<a title="'+freidefines.titles_clrcht+'" href="javascript:void(0)" onmousedown="FreiChat.clrcht(\''+id+'\')">                <img id="clrcht'+id+'" src="'+FreiChat.make_url(freidefines.deleteimg)+'" alt="-" />                </a>   ';

    if(freidefines.PLUGINS.showsmiley == 'enabled')
    {
        if((freidefines.GEN.is_guest == 1 && freidefines.ACL.SMILEY.guest == "allow") || (freidefines.GEN.is_guest == 0 && freidefines.ACL.SMILEY.user == "allow"))
        {
            pluginhtml += '<span id="freismilebox"><span id="frei_smileys_'+id+'" class="frei_smileys none">'+FreiChat.smileylist(id)+'</span>   </span>';
            pluginhtml += '<a href="javascript:void(0)" title="'+freidefines.titles_smiley+'" onmousedown="FreiChat.smiley(\''+id+'\')">                <img id="smile_'+id+'" src="'+FreiChat.make_url(freidefines.smileyimg)+'" alt="-" />                </a>   ';
        }
    }

    if(freidefines.PLUGINS.showsave == 'enabled')
    {
        if((freidefines.GEN.is_guest == 1 && freidefines.ACL.SAVE.guest == "allow") || (freidefines.GEN.is_guest == 0 && freidefines.ACL.SAVE.user == "allow"))
        {
            pluginhtml += '<span id="save'+id+'"><a href="'+freidefines.GEN.url+'client/plugins/save/save.php?toid='+id+'&toname='+user+'" target="_blank"><img id="save'+id+'" src="'+FreiChat.make_url(freidefines.saveimg)+'" title="'+freidefines.titles_save+'" alt="save" /> </a></span>';
        }
    }

    if(freidefines.PLUGINS.showmail == 'enabled')
    {
        if((freidefines.GEN.is_guest == 1 && freidefines.ACL.MAIL.guest == "allow") || (freidefines.GEN.is_guest == 0 && freidefines.ACL.MAIL.user == "allow"))
        {
            pluginhtml += '<span id="mailsend'+id+'"><a href="javascript:void(0)" onClick="FreiChat.sendmail(\''+user+'\',\''+id+'\')"><img id="mail_'+id+'" src="'+FreiChat.make_url(freidefines.mailimg)+'" title='+freidefines.titles_mail+' alt="upload" /> </a></span>';
        }

    }

    if(freidefines.PLUGINS.showvideochat == 'enabled')
    {
        if((freidefines.GEN.is_guest == 1 && freidefines.ACL.VIDEOCHAT.guest == "allow") || (freidefines.GEN.is_guest == 0 && freidefines.ACL.VIDEOCHAT.user == "allow"))
        {
            pluginhtml += '<span id="videosend'+id+'"><a href="javascript:void(0)" onClick="FreiChat.sendvideo(\''+user+'\',\''+id+'\',1)"><img id="mail_'+id+'" src="'+FreiChat.make_url(freidefines.mailimg)+'" title='+freidefines.titles_mail+' alt="upload" /> </a></span>';
        }

    }


    return pluginhtml;
};

FreiChat.sendvideo = function(user , id, accept)
{
    var message="";
    if(accept==1){
        message ='This is a video chat request <a href="#" target="_blank" onClick=\'FreiChat.sendvideo("'+freidefines.GEN.fromname+'","'+freidefines.GEN.reidfrom+'")\' >Click here to accept</a>';
        $jn("#frei_"+id+" .chatboxcontent")
        .append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+freidefines.GEN.fromname+':&nbsp;</span><span class="chatboxmessagecontent">A video chat request has been sent</span></div>')
        .scrollTop($jn("#frei_"+id+" .chatboxcontent")[0].scrollHeight);

    }
    else{
        message ='Video chat request has been accepted <a href="#"  target="_blank" >Click here to chat</a>';
    }

    //alert(message);




    $jn.post(freidefines.GEN.url+"server/freichat.php?freimode=post", {
        passBYpost:FreiChat.passBYpost,
        time:FreiChat.time,
        xhash:freidefines.xhash,
        id:freidefines.GEN.getid,
        to: id,
        message_type:1,
        'message[]': [message],
        to_name: user,
        custom_mesg:FreiChat.custom_mesg
    } , function(data){
        freidefines.GEN.fromname = data.username;

    },'json');


}
//------------------------------------------------------------------------------
FreiChat.changelang = function (lang,id)
{
    var CookieStatus = FreiChat.getCookie(id);

    if(lang == 'disable')
    {
        FreiChat.setCookie( "frei_stat_"+id, "disable&opened&"+CookieStatus.chatwindow_2+"&"+CookieStatus.message+"&"+CookieStatus.pos_top+"&"+CookieStatus.pos_left);
        $jn("#translateimage"+id).attr('src',FreiChat.make_url(freidefines.notransimg));
        $jn("#frei_trans"+id).slideToggle('slow');
    }
    else
    {
        $jn("#translateimage"+id).attr('src',FreiChat.make_url(freidefines.translateimg));
        FreiChat.setCookie( "frei_stat_"+id, lang+"&opened&"+CookieStatus.chatwindow_2+"&"+CookieStatus.message+"&"+CookieStatus.pos_top+"&"+CookieStatus.pos_left);
        $jn("#frei_trans"+id).slideToggle('slow');
    }
};
//------------------------------------------------------------------------------
FreiChat.translate = function(id)
{
    $jn("#frei_trans"+id).slideToggle();
};
//------------------------------------------------------------------------------
FreiChat.langlist = function(id)
{
    var str= '<span class="langlist">'+FreiChat.makelangurl(['en','de','zh','cy','tr','uk','ru','it','ja','el','iw','fr','gl','ar'], id)+'<br/><a href="javascript:void(0)" onmousedown=FreiChat.changelang("disable",\''+id+'\')>'+freidefines.plugin_trans_disable+'</a>&nbsp;</span>';
    return str;
};
//------------------------------------------------------------------------------
FreiChat.makelangurl = function(name,id)
{
    var namelen = name.length;
    var i=0;
    var str = '';
    for(i=0; i<=namelen; i++)
    {
        if(name[i] == null || name[i] == undefined)
        {
            break;
        }
        str += '<a href="javascript:void(0)" onmousedown=FreiChat.changelang("'+name[i]+'",\''+id+'\')>'+name[i]+'</a>&nbsp;';
    }
    return str;
};
//------------------------------------------------------------------------------
FreiChat.test = function(wHatTopRint,isLoop,isRepeat)
{
    wHatTopRint = wHatTopRint+" ";
    var testDiv = document.getElementById('fTesting');

    if(testDiv == null)
    {
        alert('Sorry div not found!');
        return;
    }

    var i = 0;


    if(isLoop != undefined) //&& isLoop.constructor.toString().indexOf("Array") != -1)
    {
        if(isLoop != false && isLoop !=null)
        {
            var loopStart = isLoop[0];
            var loopEnd = isLoop[1];

            for(i=loopStart;i<=loopEnd;i++)
            {
                testDiv.innerHTML += wHatTopRint;
            }

        }
    }
    else
    {
        testDiv.innerHTML +=wHatTopRint;
    }

    if(isRepeat != undefined)
    {
        if(isRepeat[0] == true)
        {
            var byTime = isRepeat[1];
            var repeat = function()
            {
                FreiChat.test(wHatTopRint,isLoop,isRepeat);
            }
            setTimeout(repeat,byTime);
        }
    }
};
//------------------------------------------------------------------------------
/*START *-*-* TRANSLATE PLUGIN RELATED */
FreiChat.appendtranslate = function(language,id,arr)
{
    var div = null;

    if(arr[0] == 'callbyget')
    {
        div = $jn('#msg_'+arr[1]);
        div.translate(language,{
            not:'.notranslate'
        });
    }
    else
    {
        div = $jn("#frei_"+id+" .chatboxcontent");
        if(arr == null || arr == '')
        {
            div.translate(language,{
                not:'.notranslate'
            });
        }
        else
        {
            div.translate(language,{
                not:'.notranslate'
            });

        }

    }

};
//------------------------------------------------------------------------------
FreiChat.show_original_text = function(me,id)
{
    var show_by_delaying = function(){

        var pos = $jn(me).position();

        if($jn("#frei_orig_"+id).hasClass('iamtobehovered'))
        {
            $jn("#frei_orig_"+id).css( {
                "left": (pos.left-30) + "px",
                "top":(pos.top-50)+"px" ,
                "display" : "block"
            } );
        }
    };

    FreiChat.timer = setTimeout(show_by_delaying,500);
};
//------------------------------------------------------------------------------
FreiChat.show_original_text_onhover = function(me)
{
    if($jn(me).hasClass('iamtobehovered'))
    {
        $jn(me).addClass('iambeinghovered');
    }
};
//------------------------------------------------------------------------------
FreiChat.hide_original_text = function(id)
{
    var a = function(){
        if(!$jn("#frei_orig_"+id).hasClass('iambeinghovered'))

        {
            $jn("#frei_orig_"+id).css("display","none");
        }
    };
    setTimeout(a,500);
    clearTimeout(FreiChat.timer);
};
//------------------------------------------------------------------------------
FreiChat.hide_original_text_onout = function(id)
{

    var hide_by_delaying= function(){

        $jn("#frei_orig_"+id).removeClass('iambeinghovered');
        $jn("#frei_orig_"+id).css("display","none");
    };

    setTimeout(hide_by_delaying,500);

};
/*END *-*-* TRANSLATE PLUGIN RELATED */
//------------------------------------------------------------------------------
FreiChat.statusUpdate = function()
{

    $jn(document).mousemove(function()
    {
        FreiChat.inact_time=0;
        if(FreiChat.inactive==true && FreiChat.freistatus!=0)
        {
            FreiChat.freichatopt("goOnline");
            FreiChat.inactive=false;
        //FreiChat.yourfunction();
        }

    });

};
//------------------------------------------------------------------------------
FreiChat.showXtools = function(id)
{
    if($jn(FreiChat.datadiv).data("isvisible") == "true")
    {
        $jn('#addedoptions_'+id).hide();
        $jn(FreiChat.datadiv).data("isvisible","false");
    }
    else
    {
        $jn('#addedoptions_'+id).show();
        $jn(FreiChat.datadiv).data("isvisible","true");
    }
    FreiChat.change_to_old_title(id);
};
//------------------------------------------------------------------------------
FreiChat.selfInvoke = function()
{
    if(X_init == false)
    {
        $jn=jQuery.noConflict(freidefines['jconflicts']);
        soundManager.url = freidefines.GEN.url+"client/jquery/img/";

        $jn(window).load(function(){
            $jn(document).ready(function(){
                //$jn('#freichatx').html("  Beacon.connect('51535acb', ['mychannel']);    Beacon.listen(function (data) { alert(data.message); });");
                //soundManager.url = freidefines.GEN.url+"client/jquery/img/";
                FreiChat.oldtitle=document.title;
                FreiChat.statusUpdate();
                FreiChat.setInactivetime();
                FreiChat.init_process_freichatX();
            });
        });
        X_init = true;
    }
}();
//------------------------------------------------------------------------------
/*Updated August 10 FreiChatX 6.0*/