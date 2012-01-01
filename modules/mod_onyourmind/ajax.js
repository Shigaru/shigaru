/***********************************************************************
* Javascript file and functions for What's On Your Mind
* Created By Chris Michaelides aka grVulture
* http://www.axxis.gr - info@axxis.gr
* @copyright ajax.js Copyright (C) 2009  Axxis.gr / All rights reserved.
************************************************************************/
var xmlhttp;

function mind_share()
{
      var dirname = document.getElementById('dirname').value;
      var url = dirname+'/modules/mod_onyourmind/';

var mind_text = document.getElementById('mind_text').value;
var start_text = document.getElementById('start_text').value;
var myid = document.getElementById('mind_id').value;

if (mind_text==start_text) return;
if (mind_text=="") return;

var mind_text = encodeURIComponent(document.getElementById('mind_text').value);
loadXMLmind(url+'share.php?myid='+myid+'&mind='+mind_text);
}

function loadXMLmind(url)
{
xmlhttp=null;
if (window.XMLHttpRequest)
  {// code for IE7, Firefox, Opera, etc.
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
if (xmlhttp!=null)
  {
  xmlhttp.onreadystatechange=
        function ()
            {
            if (xmlhttp.readyState==4)
              {// 4 = "loaded"
              if (xmlhttp.status==200)
                {// 200 = "OK"
//==============================================================================
document.getElementById('mind_process').style.display = 'block';
//document.getElementById('mind_button').value = 'Shared!';
document.getElementById('mind_button').disabled = 'disabled';
document.getElementById('mind_text').disabled = 'disabled';
  var brs = navigator.appName;
  if (brs=='Microsoft Internet Explorer') {
    location.reload( true );  
    return;
  }
var mind_self = document.getElementById('mind_self').value;
//alert(mind_self);
window.frames['gr_iframe'].location = mind_self;
setTimeout(function(){
var start_text = document.getElementById('start_text').value;
if (!window.frames['gr_iframe'].document.getElementById('activity_wrapper')) {
  document.getElementById('mind_process').style.display = 'none';
  //document.getElementById('mind_button').value = 'Share';
  document.getElementById('mind_text').value = start_text;
  document.getElementById('mind_button').disabled = false;
  document.getElementById('mind_text').disabled = false;
  location.reload( true );
} else {
  document.getElementById('activity_wrapper').innerHTML = window.frames['gr_iframe'].document.getElementById('activity_wrapper').innerHTML;
  document.getElementById('mind_process').style.display = 'none';
  //document.getElementById('mind_button').value = 'Share';
  document.getElementById('mind_text').value = start_text;
  document.getElementById('mind_button').disabled = false;
  document.getElementById('mind_text').disabled = false;
}
}, 5000);
//==============================================================================
                }
              else
                {
                alert("Problem retrieving XML data:" + xmlhttp.statusText);
                }
              }
            };
  xmlhttp.open("GET",url,true);
  xmlhttp.send(null);
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}

function focus_blur() 
{
var mind_text = document.getElementById('mind_text').value;
var start_text = document.getElementById('start_text').value;
if (mind_text==start_text) document.getElementById('mind_text').value='';
else if (mind_text=="") document.getElementById('mind_text').value=start_text;
}
