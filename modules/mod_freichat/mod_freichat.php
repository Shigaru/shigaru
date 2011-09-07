<?php
defined('_JEXEC') or die ('Direct Access is not allowed');

/**
 * Freichat - Joomla CB chat system
 *
 * Frontend
 *
 * @version 3.0
 * @package Freichat
 * @author Avinash D'silva
 * @copyright (C) 2010-2011 by Avinash D'silva
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project,
 * please make a reference to Freichat someplace in your code
 * 
 **/
 
$show_name='username'; //you can have 'username' or 'name'
$show_module='hidden'; //you can have 'visible' or 'hidden'
$chatspeed='1000'; //Do not change this value
$color='blue';
$draggable='disable';
$css='red';
$load='hide';

jimport('joomla.environment.uri' );
jimport( 'joomla.methods' );

$host = JURI::root();



$user =& JFactory::getUser();
$usr_name = str_replace("'","",$user->get($show_name));


$document = &JFactory::getDocument();

$document->addScript($host.'modules/mod_freichat/jquery/js/jquery.min.js' );
$document->addScript($host.'modules/mod_freichat/jquery/js/jquery-ui.min.js' );
$document->addScript($host.'modules/mod_freichat/jquery/js/soundmanager2-jsmin.js' );
$document->addScript($host.'modules/mod_freichat/jquery/js/jquery.ui.draggable.min.js' );
$document->addScript($host.'modules/mod_freichat/jquery/js/jquery.ui.core.min.js' );
$document->addScript($host.'modules/mod_freichat/jquery/js/cookie.js' );
$document->addStyleSheet($host.'modules/mod_freichat/jquery/css/'.$css.'/freichat.css' );

$datenow = date("Y-m-d H:i:s");
$time_string = strtotime($datenow);	// Modified query below to only show members/users active in the last 10 minutes
$extra_time = 60; //example: 10 min x 60 sec
$online_time = ($time_string-$extra_time);
?>
<div id="sound" class="sound">

</div>
<div style="visibility:<?php echo $show_module; ?>">
<p><b>Online Friends</b></p>
<div id="freimod" class="freimod">
<!--this is where online friends are shown -->
</div>
</div>

<div id='hidfreichat' class='hidfreichat' style="visibility:hidden">

</div>
<div id='freichat' class='freichat' style='z-index: 99;'>
<table>
<tr valign='bottom'>
<td>
			<table>
			<tr  id='freicontain' class='freicontain' valign='bottom'>

			</tr>
			</table>

</td>

<td>
<div class="freichatcontaiment" style='z-index: 9999;'>

<p><b>Users Online</b>
(<span id="onlusers"></span>)
<span onmousedown="maximize_freichat()"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/max.jpeg"); ?>" alt="max"/></a></span>
<span onmousedown="minimize_freichat()"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/min.jpeg"); ?>" alt="min"/></a></span> 
</p>

<div id='frei' class='frei'>
<!--this is where online friends are shown -->
</div>
<!--
<font size='1'>Powered by <a href='http://evnix.co.cc/jm/'>EvNix</a></font>-->
</div>
</td>
</tr>
</table>
</div>

<script>
$jn("#frei").<?php echo $load; ?>(); 
soundManager.url = "<?php echo JRoute::_("modules/mod_freichat/jquery/img/"); ?>";
soundManager.onload = function() {

}
var oldtitle=document.title;
	 var windowFocus=false;

jQuery(document).ready(function(){
         
		jQuery([window, document]).blur(function(){
		windowFocus = false;

	}).focus(function(){
		windowFocus = true;
		document.title=oldtitle
		
	});

});

var freichatusers=new Array();

function maximize_freichat()
{
$jn("#frei").html($jn("#hidfreichat").html());
$jn("#frei").show("bounce");
}
function minimize_freichat()
{
$jn("#frei").html($jn("#hidfreichat").html());
$jn("#frei").hide("bounce");
}


function analyse()
{
 $jn.getJSON("<?php echo str_replace("&amp;","&",JRoute::_('index.php?option=com_freichat&format=raw&freimode=getdata')); ?>",function(data){
var j=0;

if(data.exist==false)
{} else
{
var recd=null;

for(i=0;i<data.messages.length;i++)
 { 

	var user=null;
	var id=null;		
    if(data.messages[i].to=='<?php echo $user->get("id"); ?>')
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
    var from_name=data.messages[i].from_name;
    var to_name=data.messages[i].to_name;

var ids=id.replace(id,"frei_"+id);
var boxstatus= Get_Cookie( ids );


if(boxstatus=="opened")
{   
    createChatBox(user,id); 
    SmileyGenerate(message);
	message=mesg;
	$jn("#frei_"+id+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+from_name+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
}
else
{
//alert("The box "+ids+" has been closed");
}
toggleChatBoxOnLoad(id);
}

} 
 },'json');

}
analyse();

///////////////
function createChatBoxmesg(user,id)
{
var ids=id.replace(id,"frei_"+id);
var idx=id.replace(id,"freicontent_"+id);
Set_Cookie( ids, "opened", 30, '/', '', '' );
Set_Cookie( idx, "opened", 30, '/', '', '' );
var idt = id;
var i=0;
for(i=0;i<=freichatusers.length;i++)
{
	if(freichatusers[i]==id)
	{
	//alert('already exists!');
	return;
     
	}
	 
}
$jn.post("<?php echo str_replace("&amp;","&",JRoute::_('index.php?option=com_freichat&format=raw&freimode=getdata')); ?>", function(data){
if(data.exist==false)
{
createChatBox(user,id);
return;
}

var chatboxtitle=user;
freichatusers.push(id);
var str='<td class="frei_box" id="frei_'+id+'"><div onmousedown="set_drag('+id+')" id="drag_freicontent_'+id+'"><div class="chatboxhead"><div class="chatboxtitle">'+chatboxtitle+'&nbsp;&nbsp;&nbsp;</div><div class="chatboxoptions"><a href="javascript:void(0)" onmousedown="toggleChatBox(\'freicontent_'+id+'\')"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/min.jpeg"); ?>" alt="-" /></a> <a href="javascript:void(0)" onmousedown="closeChatBox(\'frei_'+id+'\')"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/close.jpeg"); ?>" alt="X" /></a></div><br clear="all"/></div><div class="freicontent_'+id+'" id="freicontent_'+id+'"><div class="chatboxcontent"></div><div class="chatboxinput"><textarea id="chatboxtextarea'+id+'" class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,\''+id+'\',\''+user+'\');"></textarea></div></div></div></td>';
$jn('#freicontain').html(str+$jn('#freicontain').html());
set_drag(id); 

for(j=0;j<data.messages.length;j++)
{
idto=data.messages[j].to;

idfrom=data.messages[j].from;
reidfrom='<?php echo $user->get('id'); ?>';

var message=data.messages[j].message;
var from_name=data.messages[j].from_name;

if(idfrom==reidfrom && idto==idt || idfrom==idt && reidfrom==idto)
{
SmileyGenerate(message);
$jn("#frei_"+idt+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+from_name+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+mesg+'</span></div>');
}
else {}
}
},'json');


}
////////////////
function yourfunction()
{
get_messages();      
setTimeout("yourfunction()",<?php echo $chatspeed; ?>);
}
yourfunction();
/////////////////

function get_messages()
{ 
	$jn.getJSON("<?php echo str_replace("&amp;","&",JRoute::_('index.php?option=com_freichat&format=raw&freimode=getmembers')); ?>",function(data){

	if(data.result=="empty")
	{ 
	data.userdata="<p><font color='red'><b>You either do not have friends/connections or you do not have Community Builder installed.Try installing FreiChatPure[Extension Independent]</b></font></p>"
	}
	
			$jn('#hidfreichat').html(data.userdata);
			$jn('#frei').html(data.userdata);


			$jn('#hidfreichat').html(data.userdata);
			var str="<p><font size='1'>Powered by <a href='http://evnix.co.cc/jm/'>EvNix</a></font></p>";	

	        var count=data.count;
 	        $jn('#onlusers').html(count);
			
			if(data.userdata==null)
			{
				$jn('#frei').css("height",15);		
				data.userdata="No Online Freinds";
			}
			
			$jn('#frei').html(data.userdata+str);
			$jn('#freimod').html(data.userdata);
			if($jn("#frei > div").size()==1)
			{
			$jn('#frei').css("height",65);
			}

			var i;//=data.messages.length;
			var j=0;
			var exist=false;
			var $g=0;

			for(i=0;i<data.messages.length;i++)
			{					
				//alert(data.messages[i].message);
				exist=false;
				for(j=0;j<freichatusers.length;j++)
				{
					if(freichatusers[j]==data.messages[i].from)
					{
					 exist=true;

					}

			}	

                    var user=data.messages[i].from_name;
					var id=data.messages[i].from;

				var message=data.messages[i].message;							

 					if(exist==false)
					{
					   var chatboxtitle=data.messages[i].from_name;
					   freichatusers.push(id);
                        var str='<td class="frei_box" id="frei_'+id+'"><div onmousedown="set_drag('+id+')" id="drag_freicontent_'+id+'"><div class="chatboxhead"><div class="chatboxtitle">'+chatboxtitle+'&nbsp;&nbsp;&nbsp;</div><div class="chatboxoptions"><a href="javascript:void(0)" onmousedown="toggleChatBox(\'freicontent_'+id+'\')"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/min.jpeg"); ?>" alt="-" /></a> <a href="javascript:void(0)" onmousedown="closeChatBox(\'frei_'+id+'\')"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/close.jpeg"); ?>" alt="X" /></a></div><br clear="all"/></div><div class="freicontent_'+id+'" id="freicontent_'+id+'"><div class="chatboxcontent"></div><div class="chatboxinput"><textarea id="chatboxtextarea'+id+'" class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,\''+id+'\',\''+user+'\');"></textarea></div></div></div></td>';
  					   $jn('#freicontain').html(str+$jn('#freicontain').html());
  					   set_drag(id);
					}

			    SmileyGenerate(message);
			    message=mesg;
				var fromname=data.messages[i].from_name;
				var newtitle="New Message! From "+fromname;
				if(message!='')
				{ 
				  var ids=id.replace(id,"frei_"+id);
				  var idx=id.replace(id,"freicontent_"+id);
                  Set_Cookie( ids, "opened", 30, '/', '', '' );
                  Set_Cookie( idx, "max", 30, '/', '', '' );
				 if(windowFocus==false)
				 {
				 document.title=newtitle;
                 soundManager.onready(function() {
                 if (soundManager.supported()) {
				 soundManager.play('mySound',"modules/mod_freichat/jquery/img/newmsg.mp3");
                   } else {  }
                    });
    			 }
				}
				else{}


				$jn("#frei_"+id+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+data.messages[i].from_name+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
				$jn("#frei_"+id+" .chatboxcontent").scrollTop($jn("#frei_"+id+" .chatboxcontent")[0].scrollHeight);

             

			}	
			
      },'json');
}
//-----------------------------------------------------
function createChatBox(user,id)
{
var chatboxtitle=user;
var i=0;
for(i=0;i<=freichatusers.length;i++)
{
	if(freichatusers[i]==id)
	{
	//alert('already exists!');
	return;

	}
}

freichatusers.push(id);
var str='<td class="frei_box" id="frei_'+id+'"><div onmousedown="set_drag('+id+')" id="drag_freicontent_'+id+'"><div class="chatboxhead"><div class="chatboxtitle">'+chatboxtitle+'&nbsp;&nbsp;&nbsp;</div><div class="chatboxoptions"><a href="javascript:void(0)" onmousedown="toggleChatBox(\'freicontent_'+id+'\')"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/min.jpeg"); ?>" alt="-" /></a> <a href="javascript:void(0)" onmousedown="closeChatBox(\'frei_'+id+'\')"><img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/".$color."/close.jpeg"); ?>" alt="X" /></a></div><br clear="all"/></div><div class="freicontent_'+id+'" id="freicontent_'+id+'"><div class="chatboxcontent"></div><div class="chatboxinput"><textarea id="chatboxtextarea'+id+'" class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,\''+id+'\',\''+user+'\');"></textarea></div></div></div></td>';
$jn('#freicontain').html(str+$jn('#freicontain').html());
set_drag(id);
}
//--------------------------------------------------------
function checkChatBoxInputKey(event,chatboxtextarea,id,user) {


  $jn(chatboxtextarea).scrollTop($jn(chatboxtextarea)[0].scrollHeight);	 
	if(event.keyCode == 13 && event.shiftKey == 0)  {
	
		var message = $jn(chatboxtextarea).val();
		message = message.replace(/^\s+|\s+$/g,"");

		$jn(chatboxtextarea).val('');
		//$jn(chatboxtextarea).focus();
		$jn(chatboxtextarea).css('height','44px');

	if (message != '') 
	{

			$jn.post("<?php echo str_replace("&amp;","&",JRoute::_('index.php?option=com_freichat&format=raw&freimode=post')); ?>", {to: id, message: message,to_name: user} , function(data){
              message=data.message;
              SmileyGenerate(message);
			  message=mesg;
              $jn("#frei_"+id+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom"><?php echo $usr_name; ?>:&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
			  $jn("#frei_"+id+" .chatboxcontent").scrollTop($jn("#frei_"+id+" .chatboxcontent")[0].scrollHeight);
	},'json');

		}
	
	}
	
}	
//--------------------------------------------------------------
function toggleChatBoxOnLoad(id)
{
var idx=id.replace(id,"freicontent_"+id);
var status=Get_Cookie(idx);
 if(status=="min") 
 {
  $jn("#"+idx).hide();
 }
 else
 {
  $jn("#"+idx).show();
 }
}
//---------------------------------------------------------------
function toggleChatBox(id)
{
var options = {};

	if($jn("#"+id).is(":visible") == true)
	{
	$jn("#"+id).hide('clip',options,500);
		// do something
	Set_Cookie( id, "min", 30, '/', '', '' );	
	}
 	
	else
	{
	$jn("#"+id).show('clip',options,500);
		// do something else
    Set_Cookie( id, "max", 30, '/', '', '' );	
    $jn("#drag_"+id).draggable('<?php echo $draggable; ?>');	
	}
}

//-------------------------------------------------------
function closeChatBox(id)
{
Set_Cookie( id, "closed", 30, '/', '', '' );
var options = {};
//alert("#"+id);
	$jn("#"+id).hide('explode',options,1000);
	$jn("#"+id).remove();
	var i=0;
var idx=id.replace("frei_","");
idx=Number(idx);
for(i=0;i<=freichatusers.length;i++)
{
	if(freichatusers[i]==idx)
	{
	//alert('already exists!2');
   freichatusers[i]=0;
	

	}
}
//alert(idx);


}
//------------------------------------------------------------
function SmileyGenerate(message)
{
message=message.replace(/:\)/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/smile.png"); ?>" alt="smile" />');
message=message.replace(/:\'\)/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/cry.jpeg"); ?>" alt="samile" />');        
message=message.replace(/B\)/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/cool.png"); ?>" alt="samile" />');        
message=message.replace(/:B/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/cool.png"); ?>" alt="samile" />');        
message=message.replace(/:\(/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/sad.png"); ?>" alt="smile" />');
message=message.replace(/:laugh:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/laughing.png"); ?>" alt="smile" />');        
message=message.replace(/:cheer:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/cheerful.png"); ?>" alt="smile" />');
message=message.replace(/;\)/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/wink.png"); ?>" alt="smile" />');        
message=message.replace(/:P/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/tongue.png"); ?>" alt="smile" />');
message=message.replace(/:angry:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/angry.png"); ?>" alt="smile" />');        
message=message.replace(/:unsure:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/unsure.png"); ?>" alt="smile" />');
message=message.replace(/:ohmy:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/shocked.png"); ?>" alt="smile" />');        
message=message.replace(/:huh:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/wassat.png"); ?>" alt="smile" />');
message=message.replace(/:o/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/shocked.png"); ?>" alt="smile" />');        
message=message.replace(/:0/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/shocked.png"); ?>" alt="smile" />');        		   
message=message.replace(/:dry:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/ermm.png"); ?>" alt="smile" />');        
message=message.replace(/:lol:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/grin.png"); ?>" alt="smile" />');
message=message.replace(/:D/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/grin.png"); ?>" alt="smile" />');
message=message.replace(/:silly:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/silly.png"); ?>" alt="smile" />');        
message=message.replace(/:woohoo:/g,'<img src="<?php echo JRoute::_("modules/mod_freichat/jquery/img/w00t.png"); ?>" alt="smile" />');
mesg=message
return mesg;
}
//------------------------------------------------------------
function set_drag(id)
{
$jn("#drag_freicontent_"+id).draggable({

    stop: function(event, ui) {
       $jn("#drag_freicontent_"+id).draggable({ zIndex: 300});
    	// Show dropped position.
    	var Stoppos = $jn(this).position();
		if(Stoppos.top>8) 
		{
	     $jn("#drag_freicontent_"+id).animate({
			top: '0px',
		  }, 500, function() {
		  });
		}

		if(Stoppos.top<-260) 
		{
	     $jn("#drag_freicontent_"+id).animate({
			top: '-270px',
		  }, 500, function() {
		  });
		}
    }
}); 

$jn("#drag_freicontent_"+id).draggable({ containment:'body'});
$jn("#drag_freicontent_"+id).draggable({ scroll: false});
$jn("#drag_freicontent_"+id).draggable('<?php echo $draggable; ?>');
} 
//Updated September 1 2010 FreiChat 3.1.beta

</script>

