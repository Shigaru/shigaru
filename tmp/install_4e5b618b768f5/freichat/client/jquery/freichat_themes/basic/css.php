<?php
// Note: argument.php and css.php are connected
include('argument.php');
include 'chatroom_css.php';
include 'speech_css.php';
?>
/*-------------------------------------------------------------------------------------------------------------------------------------*/
/*Start of Main css style for the complete chatbox */
.freichat{
position: relative;
padding: 0px ;
background-color: none;
color: #000000 ;
text-align:justify;
font-size: 14px;
width: 200px;
background-image:none;
border:none;

line-height:1.4em;
}

#freichat{
position: fixed;
right:0px;
bottom: 0px;
}

*html #freichat{
position: absolute;
bottom: 0px;
}

.freichat img{
padding-left:0px;
padding-right:0px;
margin-left:0px;
margin-right:0px;

display:inline !important;
border-top:0px !important;
border-bottom:0px !important;
}

.freichat a:hover {
text-decoration: none;
background-color: white ;
color:blue;
}


.freichathead {

padding-top:3px;
padding-bottom:3px;
-webkit-border-top-left-radius: 8px;
-webkit-border-top-right-radius: 8px;
-moz-border-radius-topleft: 8px;
-moz-border-radius-topright: 8px;
border-top-left-radius: 8px;
border-top-right-radius: 8px;
background-image:url('<?php echo $freichat_theme; ?>/room_selected.png');
}

.frei_status_options img {
cursor:pointer;
}
.frei_status_options {
cursor:pointer;
}

.status_available img{
padding-top:5px;

}

.status_available {
padding-right:5px;
}

.status_invisible img{
padding-top:5px;
}

.status_invisible {
padding-right:5px;
}


.status_busy {
margin-left:4px;
}

.status_busy img{

}

.status_offline {
padding-left:5px;
}

.status_offline img{

}




.frei_status_options a {
text-decoration:  none !important;
background-color: none !important;
color:           black !important;  
}

.status_available img {

padding:0px !important;

}


.frei_tools_options {
padding-left:4px;
padding-top:4px;
border: 1px solid black;
border-bottom:none;
border-right:none;
background-image:url('<?php echo $freichat_theme; ?>/<?php echo $chatroomimg; ?>') ;
}

.frei_tools_options img {
cursor:pointer;
padding-bottom:15px;
}

.self_status_img img {
padding-top:2px;
}



.min_freichathead img {
padding-left:3px;
}

.freichathead img {
cursor:pointer;
padding-right:2px;
padding-left:2px;
}

.frei_options {
border: 1px solid black;
border-bottom:none;
border-right:none;
background-image:url('<?php echo $freichat_theme; ?>/<?php echo $chatroomimg; ?>') ;
font-weight:normal;
padding-bottom:15px;
padding-left:4px;
}

.frei_options a {
color:white ;
text-decoration: none;
font-weight:normal;
font-size:12px;
}

/* End of Main css style for the complete chatbox  */
/*-------------------------------------------------------------------------------------------------------------------------------------*/


/*-------------------------------------------------------------------------------------------------------------------------------------*/
.onfreioffline{
position:fixed;
right:0px;
bottom:0px;
z-index:10001;

}
/*-------------------------------------------------------------------------------------------------------------------------------------*/
/* Css to change the style of,online users list, shown in the chatbox */

.custom_mesg {

padding-top:16px;
}

#custom_message_id{
font-family: Tahoma, sans-serif;
width:120px;
border: 1px solid gray;
padding: 5px;
font-size:11px;
font-weight:bold;
}


.frei a:link {
text-decoration: none;
color:wroomcontainerhite;
font-weight:normal;
}

.frei a:hover {
color:blue;
}
.frei img{
border:none;
padding-left:0px;
padding-right:0px;
margin-left:0px;
margin-right:0px;
}
/* Upper space above name is due to .freichathead */
.frei{

font-size:13px;
height:112px;
overflow:auto;

width:200px !important;
}

.frei_user_brand{
border: 1px solid black;
background-image:url('<?php echo $freichat_theme; ?>/chatbox_bg.png');

}

.frei_user_count{


color:inherit;
}

/*-------------------------------------------------------------------------------------------------------------------------------------*/
/* CSS style for Complete ChatWindows */
.frei_box{
position:relative;
bottom:0px;
width:225px;
z-index:9999999;
}

.freicontain{
bottom:0px;
position:fixed;
width:225px;
display:block;overflow:visible;

}

.freicontain0{
right:202px;
}

.freicontain1{
right:426px;
}

.freicontain2{
right:652px;
}

.freicontain3{
right:878px;
}


.freicontent{
/*Default blank wont have any effect*/
}

.chatboxhead {
background-color: none;
padding:6px;
color: #FFFFFF;
width:213px ;
border-bottom:1px solid  #000000 ;
background-image:url('<?php echo $freichat_theme; ?>/<?php echo $btopimg; ?>') ;
font-size:14px;

border-top-right-radius:5px;
-moz-border-radius-topright:5px;
-webkit-border-top-right-radius:5px;

border-top-left-radius:5px;
-moz-border-radius-topleft:5px;
-webkit-border-top-left-radius:5px;

/* background-repeat:repeat-x;*/
}

.chatboxhead img {
text-decoration: none;
padding-left:0px;
padding-right:0px;
margin-left:0px;
margin-right:0px;
}

/*.chatbar {
padding:14px ;
width: 1200px ;
}
.chatboxblink {
background-color: #176689;
border-right:1px solid #176689;
border-left:1px solid #176689;
}*/

.chatboxcontent {

background-image:url('<?php echo $freichat_theme; ?>/<?php echo $bmidimg; ?>') ;
font-family: Arial,sans-serif;
font-size: 13px ;
height:200px ;
width:209px ;
overflow-y:auto;
overflow-x:auto;
padding:7px;
border:1px solid #ccc;
border-bottom:2px solid #bbb;
border-top:1px solid #ddd;
background-color: #ffffff ;
line-height: 1.32em ;
text-align:left;
word-wrap: break-word;
}
.frei_smileys  {

position : absolute;
color: white;
background-image:url('<?php echo $freichat_theme; ?>/<?php echo $bmidimg; ?>') ;

overflow:auto;
border:1px solid white;

display:none;
width: 150px;
height: 115px;
bottom:80px;
left:10px;
}

.chatboxinput img {

margin-left:4px;
}
.chatboxinput {
padding: 3px;
background-color: #ffffff ;
border-left:1px solid #cccccc ;
border-right:1px solid #cccccc ;
background-image:none ;
border-top:1px solid  #000000 ;
border-bottom:1px solid #cccccc ;


border-bottom-right-radius:5px;
-moz-border-radius-bottomright:5px;
-webkit-border-bottom-right-radius:5px;

border-bottom-left-radius:5px;
-moz-border-radius-bottomleft:5px;
-webkit-border-bottom-left-radius:5px;
}
.chatboxinput :focus{
/*border: 3px solid #cccccc;*/
}
.chatboxtextarea {
width: 209px;
height:44px;
padding:3px 0px 3px 3px;
border: 1px solid #eeeeee ;
margin: 1px ;
overflow:hidden;
color:#000000;
background-image:none;
border: 2px solid #efefef ;
max-width :209px;
min-width :209px;
max-height:100px;
}

.chatboxtextarea:focus {
border: 2px solid #0060a8 ;
margin:0 ;
}

.chatboxmessage {
margin-left:1em ;
color: #ffffff ; font-size: 0.9em ;
width:16em ;
}

.chatboxinfo {
margin-left:-1em ;
color:#666666;
}

.chatboxmessagefrom {
margin-left:-1em ;
margin-right:0.4em;
font-weight: bold;
color: #000000;
}

.chatboxmessagecontent {
color: #000000;
}
.chatboxmessagecontent a {
color: blue ;
text-decoration: none ;
}
.chatboxmessagecontent a:hover {
text-decoration: underline ;
}

.chatboxoptions {
float: right ;
}

.chatboxoptions a img{
border: none !important;
}


.chatboxtitle {
float: left;
color: #FFFFFF ;
}

/*-------------------------------------------------------------------------------------------------------------------------------------*/
/*Plugin CSS */

.added_options img {
float:left;
padding-top    :0px;
padding-right  :3px;
padding-bottom :2px;
background-color:none;
}

.frei_smileys img {
float:none;
padding-top    :0px;
padding-right  :0px;
padding-bottom :0px;
background-color:none;
}
.langlist a {
color:white !important;
text-decoration: none;
font-weight:normal;
font-size:13px;
}

.langlist a:hover {

color:blue !important;
}

.originalmessagecontent{

position : absolute;
color: white;
background-color: black;

overflow:auto;
border:1px solid white;


width: 150px;
height: 44px;

}


.originalmessagecontent a {
color: white;
}


/*-------------------------*/
.freichat_userlist_hover {
background-color: #B2C9F1 !important;
color: #000000;
text-align: left;
}



.freichat_userlist {
cursor: pointer;
height: 20px;
line-height: 100%;
text-align: left;
padding-top: 0px;
padding-bottom: 1px;
width:99%;
}

.freichat_userscontentname {
float: left;
padding-bottom: 3px;
padding-left: 5px;
padding-top: 4px;
text-align: left;
}

.freichat_userscontentavatar {
display: block;
float: left;
padding-bottom: 1px;
padding-left: 5px;
padding-top: 1px;
text-align: left;
}

.freichat_userscontentavatarimage {
height: 18px;
width: 18px;
}