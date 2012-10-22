<?php

/**
 * @name		Geocode Factory plugin
 * @package		geocodefactory
 * @copyright	Copyright © 2009 - All rights reserved.
 * @license		GNU/GPL
 * @author		Cédric Pelloquin
 * @author mail	joomla@pelloquin.com
 * @website		www.pelloquin.com
 */

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

class getgeocodefactoryTab extends cbTabHandler {

	function getgeocodefactoryTab() {
		$this->cbTabHandler();
	}
	
	function getDb(){
		$db = null ;
		if (class_exists('JFactory')) {
			$db = & JFactory::getDBO();
		}
		else{
			global $database ;
			$db = & $database ;
		}

		return $db;
	}
	
	function getDisplayTab($tab,$user,$ui) {
		$f_lat = $user->cb_plug_lat;
		$f_lng = $user->cb_plug_lng;

		if (!$f_lat OR !$f_lng)
			return false;
	
		if (!strlen($this->params->get('apiKey')))
			return false;

		$return = "";
		$return.= $this->getMap($f_lat, $f_lng, false);
		
		return $return;
	}
	
	function getParam($p){
		$res = $this->params->get($p);
		
		switch($p){
			case 'mapsZoom':{
				if ($res<1)
					$res=10;
				break;
			}
			case 'height':
			case 'width':{
				
				if (!strlen($res))
					$res="200px";
				break;
			}
		}
		
		return $res;
	}
	
	function getEditTab($tab,$user,$ui) {
		$return = "";
		
		$f_lat = $user->cb_plug_lat;
		$f_lng = $user->cb_plug_lng;

		$return.= $this->getMap($f_lat, $f_lng, $this->params->get('pickPoint')?true:false) ;
		
		if ($this->params->get('geocodeBtn'))
			$return.= $this->getGeocodeButton() ;

		return $return ;
	}

	// recherche les coordonnées moyennes
	function getDefLatLong(&$lat, &$lng){
		$lat = 46.94;
		$lng = 7.42;

		$db = $this->getDb();
		$db->setQuery("SELECT AVG(`cb_plug_lat`) AS moyLat, AVG(`cb_plug_lng`) AS moyLng FROM `jos_comprofiler` WHERE (`cb_plug_lat` <> '' AND `cb_plug_lng` <> '') LIMIT 1");
		$voRes = $db->loadObjectList();

		if (!count($voRes))
			return ;
		
		$lat=$voRes[0]->moyLat ;
		$lng=$voRes[0]->moyLng ;
	}
	
	function getMap($f_lat, $f_lng, $draggable){
		if ($f_lat=="" OR $f_lng=="" OR !$f_lat OR !$f_lng)
			$this->getDefLatLong($f_lat, $f_lng);
		
		$return = "" ;
		$return.= '<script src="http://maps.google.com/maps?file=api&v=2&key='.$this->params->get('apiKey').'" type="text/javascript"></script>';
		$return.= '<div id="ggmap" style="width:'.$this->getParam('width').'px; height:'.$this->getParam('height').'px;float: right;" class="pecCbMaps"></div>'."\n";
		$return.= '<script type="text/javascript">';
		$return.= '//<![CDATA['."\n";
		$return.= 'var map ; '."\n";
		$return.= 'function loadUserMap(curZoom) {'."\n";
		$return.= '	if (GBrowserIsCompatible()) {'."\n";
		$return.= '		map = new GMap2(document.getElementById("ggmap"), {size:new GSize('.$this->getParam('width').','.$this->getParam('height').')});'."\n";
		
		if ($draggable){
			// dans ce cas on prends les coordonnées du form
			$return.= ' 	var u_lat = document.getElementById("cb_plug_lat").value ; ';
			$return.= ' 	var u_lng = document.getElementById("cb_plug_lng").value ; ';
		}else{
			// sinon celles de la base
			$return.= ' 	var u_lat = "'.$f_lat.'" ; ';
			$return.= ' 	var u_lng = "'.$f_lng.'" ; ';
		}

		$return.= '     var zoom = '.$this->getParam('mapsZoom').' ;  ';
		$return.= '     if (curZoom > 1) { zoom = curZoom ; }';

		$return.= '		var centerPoint = new GLatLng(u_lat,u_lng) ; '."\n";
		$return.= '		map.setCenter(centerPoint,zoom) ; '."\n";
		
		if($this->params->get('mapControl') == 1)		$return.= ' map.addControl(new GSmallMapControl());';
		if($this->params->get('mapControl') == 2)		$return.= ' map.addControl(new GLargeMapControl());';
		if($this->params->get('mapTypeControl')) 		$return.= ' map.addControl(new GMapTypeControl());';
		if($this->params->get('overviewMapControl'))	$return.= ' map.addControl(new GOverviewMapControl());';
		if($this->params->get('doubleClickZoom')) 		$return.= ' map.enableDoubleClickZoom();';
		else 											$return.= ' map.disableDoubleClickZoom();';
			
		switch ($this->params->get('mapTypeOnStart')) {
			case 'G_SATELLITE_MAP':						$return.= ' map.setMapType(G_SATELLITE_MAP);'; break;
			case 'G_HYBRID_MAP':						$return.= ' map.setMapType(G_HYBRID_MAP);'; break;
			case 'G_PHYSICAL_MAP':						$return.= ' map.setMapType(G_PHYSICAL_MAP);'; break;
			case 'G_NORMAL_MAP':	
			default:									$return.= ' map.setMapType(G_NORMAL_MAP);'; break;
		}

		if ($draggable){ 
			$return.= ' 		var marker = new GMarker(centerPoint, {draggable: true}); ' ;
			$return.= ' 		map.addOverlay(marker); '."\n";
	
			$return.= ' 		GEvent.addListener(marker, "dragend", function() { ';
			$return.= ' 			ll = marker.getLatLng() ; ';
			$return.= ' 			document.getElementById("cb_plug_lat").value = ll.y; ';
			$return.= ' 			document.getElementById("cb_plug_lng").value = ll.x; ';
			$return.= ' 		}); '."\n";
			$return.= ' 		GEvent.addListener(map, "click", function(overlay, point) { ';
			$return.= ' 			if (point) { ';
			$return.= ' 				document.getElementById("cb_plug_lat").value = point.y; ';
			$return.= ' 				document.getElementById("cb_plug_lng").value = point.x; ';
			$return.= ' 				loadUserMap(map.getZoom()); ';
			$return.= ' 			} ';
			$return.= ' 		}); '."\n";  
		} else {
			$return.= ' 			map.addOverlay(new GMarker(centerPoint));'."\n";
		}
		$return.= '		}'; 
		$return.= '	}';
		$return.= "\n if(window.attachEvent) { window.attachEvent('onload', loadUserMap); } "; 
		$return.= " else if(window.addEventListener) { window.addEventListener('load', loadUserMap, false); } ";
		$return.= '	//]]>';
		$return.= ' </script>';
		
		return $return;
	}
	
	function getGeocodeButton(){
		$ret = "" ;
		
		$ret.= ' <script type="text/javascript" language="JavaScript"> //<![CDATA[ '."\n";
		$ret.= ' 
		function showAddress(address){
			if (geocoder){
				geocoder.getLatLng(address, function(point){
					if (!point) {
						alert(address + " not found");} 
					else{
						document.getElementById("cb_plug_lat").value = point.lat(); 
						document.getElementById("cb_plug_lng").value = point.lng(); 
						loadUserMap(map.getZoom()); 
					}
				});
			}
		}
		' ;
		$ret.= ' function fetchCoordinates() { '."\n";
		$ret.= ' 	if (GBrowserIsCompatible()) {'."\n";
		$ret.= ' 		geocoder = new GClientGeocoder(); '."\n";

		if (strlen($this->params->get('gfZip'))>3)		$ret.= ' 	var postalcode = document.getElementById("'.$this->params->get('gfZip').	'").value; '."\n";
		else 											$ret.= ' 	var postalcode = ""; '."\n";
		
		if (strlen($this->params->get('gfCity'))>3)		$ret.= ' 	var city 	= document.getElementById("'.$this->params->get('gfCity').	'").value; '."\n";
		else 											$ret.= ' 	var city 	= ""; '."\n";
		
		if (strlen($this->params->get('gfAddress'))>3)	$ret.= ' 	var street 	= document.getElementById("'.$this->params->get('gfAddress').	'").value; '."\n";
		else 											$ret.= ' 	var street 	= ""; '."\n";
		
		if (strlen($this->params->get('gfCountry'))>3)	$ret.= ' 	var country = document.getElementById("'.$this->params->get('gfCountry').	'").value; '."\n";
		else 											$ret.= ' 	var country = ""; '."\n";
			
		$ret.= '    adresse = street + " " + postalcode + " " + city + " " + country ; '."\n";
		$ret.= ' 	showAddress(adresse);'."\n";
		$ret.= '	} '."\n";
		$ret.= '} '."\n";

		$ret.= ' //]]> </script> '."\n";
		$ret.= ' <input id="fetchcoord" type="button" class="button mustardbutton" onclick="fetchCoordinates();" value="Fetch coordinates" /> '."\n";

		return $ret ;
	}
	
	function getProductInfos(){
		$res = "<h2>Version LT</h2>" ;
		$res.= '<p>This plugin is a free part of the <a href="http://www.pelloquin.com/index.php/Geocode-Factory-for-Community-Builder.html" target="_blank">Geocode Factory for Community Builder Component</a>  and exist in a <span style="color:green; font-weight:bold;">pro</span> version, containing a silent geocode process during registration, and during profile update: <a href="http://www.pelloquin.com" target="_blank">Update to the pro version</a>.</p>';
		$res.= '<p>The Geocode Factory CB plugin allows you to display a map in a user tab, and allows the user and admin to geocode the user position from the entered address (city, street, country, zipcode). Another feature from the PRO version is to geocode the user in silent mode, during registration process.</p>';
		
		

		echo $res ;
		echo '<p>Please help us by <a href="http://extensions.joomla.org/extensions/extension-specific/community-builder-extensions/community-builder-profiles/9756" target="_blank">rating for us in the JED and write a review</a>, that take 2 minutes and is fair.</p>';
		echo '<p><img src="../components/com_comprofiler/plugin/user/plug_cbgeocodefactory/pec_logo.png"></p>';

		
	}

	function checkGfVersion(){
		$s = new cbgfSnoopy();
		$s->read_timeout = 90;
		//$s->referer = JURI::base();
		@$s->fetch('http://www.pelloquin.com/checkversion.php?uv='.urlencode("13*999*0*".$s->referer));
		$r = $s->results;
		$vR = explode('*',$r);
		
		$c = count($vR)>0?$vR[0]:'';
		$v = count($vR)>1?$vR[1]:'';
		
		echo "<h3>Compatibility test:</h3>If you can see here a green version number:<p>{$v} (Geocode factory current version),</p> your server is compatible with the Geocode Factory, and the pro version of this plugin";
	}

	function getFieldId($name){
		$db = $this->getDb();
		$db->setQuery("SELECT `fieldid` FROM `#__comprofiler_fields` WHERE `table`='#__comprofiler' AND `name`='{$name}' LIMIT 1");
		return $db->loadResult();
	}

	function checkFieldsExisting(){
		$gfOldLat = $this->params->get('gfOldLat');
		$gfOldLng = $this->params->get('gfOldLng');

		$db = $this->getDb();
		$db->setQuery("SELECT `name` FROM `#__comprofiler_fields` WHERE ((`table`='#__comprofiler' OR `table`='#__users') AND (`type`='text' OR `type`='predefined')) ORDER BY name");
		$voNames =  $db->loadObjectList();
		
		if (!count($voNames))
			return false;

		$iCheck = 0 ;
		foreach($voNames as $name){
			
			if ($iCheck>=2)
				return true ;

			if (($name->name == $gfOldLat) OR ($name->name == $gfOldLng))
				$iCheck++;
		}

		if ($iCheck>=2)
			return true ;

		return false;
	}

	function migrationTool(){
		$msg_pre = '<div class="cbWarning">';
		$msg_post = 'Dont forget to set the migration param to NO. </div>' ;

		return $msg_pre."This feature is only avaible in PRO version. ".$msg_post ;
	}

}

/*************************************************
Snoopy - the PHP net client
Author: Monte Ohrt <monte@ispi.net>
Copyright (c): 1999-2000 ispi, all rights reserved
Version: 1.2.3 + 2 fixes marked "//BB" (bugs 1482144 and 1192125 on sourceforge)
*************************************************/
if (!class_exists("cbgfSnoopy")){
class cbgfSnoopy
{

var $host= "www.php.net"; // host name we are connecting to
var $port= 80; // port we are connecting to
var $proxy_host = ""; // proxy host to use
var $proxy_port = ""; // proxy port to use
var $proxy_user = ""; // proxy user to use
var $proxy_pass = ""; // proxy password to use

var $agent= "Snoopy v1.2.3"; // agent we masquerade as
var $referer = ""; // referer info to pass
var $cookies = array();// array of cookies to pass
// $cookies["username"]="joe";
var $rawheaders = array();// array of raw headers to send
// $rawheaders["Content-type"]="text/html";

var $maxredirs = 5; // http redirection depth maximum. 0 = disallow
var $lastredirectaddr = "";// contains address of last redirected address
var $offsiteok = true;// allows redirection off-site
var $maxframes = 0; // frame content depth maximum. 0 = disallow
var $expandlinks = true;// expand links to fully qualified URLs.
// this only applies to fetchlinks()
// submitlinks(), and submittext()
var $passcookies = true;// pass set cookies back through redirects
// NOTE: this currently does not respect
// dates, domains or paths.

var $user= ""; // user for http authentication
var $pass= ""; // password for http authentication

// http accept types
var $accept= "image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";

var $results = ""; // where the content is put

var $error= ""; // error messages sent here
var $response_code = ""; // response code returned from server
var $headers = array();// headers returned from server sent here
var $maxlength = 500000;// max return data length (body)
var $read_timeout = 0; // timeout on read operations, in seconds
// supported only since PHP 4 Beta 4
// set to 0 to disallow timeouts
var $timed_out = false;// if a read operation timed out
var $status= 0; // http request status

var $temp_dir = "/tmp";// temporary directory that the webserver
// has permission to write to.
// under Windows, this should be C:\temp

var $curl_path = "/usr/local/bin/curl";

var $_maxlinelen = 4096;// max line length (headers)

var $_httpmethod = "GET";// default http request method
var $_httpversion = "HTTP/1.0";// default http request version
var $_submit_method = "POST";// default submit method
var $_submit_type = "application/x-www-form-urlencoded"; // default submit type
var $_mime_boundary =""; // MIME boundary for multipart/form-data submit type
var $_redirectaddr = false;// will be set if page fetched is a redirect
var $_redirectdepth = 0; // increments on an http redirect
var $_frameurls = array();// frame src urls
var $_framedepth = 0; // increments on frame depth

var $_isproxy = false;// set if using a proxy server
var $_fp_timeout = 30; // timeout for socket connection

function fetch($URI)
{
//preg_match("|^([^:]+)://([^:/]+)(:[\d]+)*(.*)|",$URI,$URI_PARTS);
$URI_PARTS = parse_url($URI);
if (!empty($URI_PARTS["user"]))
$this->user = $URI_PARTS["user"];
if (!empty($URI_PARTS["pass"]))
$this->pass = $URI_PARTS["pass"];
if (empty($URI_PARTS["query"]))
$URI_PARTS["query"] = '';
if (empty($URI_PARTS["path"]))
$URI_PARTS["path"] = '';

switch(strtolower($URI_PARTS["scheme"]))
{
case "http":
$this->host = $URI_PARTS["host"];
if(!empty($URI_PARTS["port"]))
$this->port = $URI_PARTS["port"];
$fp = null;
if($this->_connect($fp))
{
if($this->_isproxy)
{
// using proxy, send entire URI
$this->_httprequest($URI,$fp,$URI,$this->_httpmethod);
}
else
{
$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
// no proxy, send only the path
$this->_httprequest($path, $fp, $URI, $this->_httpmethod);
}

$this->_disconnect($fp);

if($this->_redirectaddr)
{
/* url was redirected, check if we've hit the max depth */
if($this->maxredirs > $this->_redirectdepth)
{
// only follow redirect if it's on this site, or offsiteok is true
if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
{
/* follow the redirect */
++$this->_redirectdepth;
$this->lastredirectaddr=$this->_redirectaddr;
$this->fetch($this->_redirectaddr);
}
}
}

if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
{
$frameurls = $this->_frameurls;
$this->_frameurls = array();

while(list(,$frameurl) = each($frameurls))
{
if($this->_framedepth < $this->maxframes)
{
$this->fetch($frameurl);
++$this->_framedepth;
}
else
break;
}
} 
}
else
{
return false;
}
return true; 
break;
case "https":
if(!$this->curl_path) {
return false;
}
if(function_exists("is_executable")) {
if (!is_executable($this->curl_path)) {
return false;
}
}
$this->host = $URI_PARTS["host"];
if(!empty($URI_PARTS["port"]))
$this->port = $URI_PARTS["port"];
if($this->_isproxy)
{
// using proxy, send entire URI
$this->_httpsrequest($URI,$URI,$this->_httpmethod);
}
else
{
$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
// no proxy, send only the path
$this->_httpsrequest($path, $URI, $this->_httpmethod);
}

if($this->_redirectaddr)
{
/* url was redirected, check if we've hit the max depth */
if($this->maxredirs > $this->_redirectdepth)
{
// only follow redirect if it's on this site, or offsiteok is true
if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
{
/* follow the redirect */
++$this->_redirectdepth;
$this->lastredirectaddr=$this->_redirectaddr;
$this->fetch($this->_redirectaddr);
}
}
}

if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
{
$frameurls = $this->_frameurls;
$this->_frameurls = array();

while(list(,$frameurl) = each($frameurls))
{
if($this->_framedepth < $this->maxframes)
{
$this->fetch($frameurl);
++$this->_framedepth;
}
else
break;
}
} 
return true; 
break;
default:
// not a valid protocol
$this->error = 'Invalid protocol "'.$URI_PARTS["scheme"].'"\n';
return false;
break;
} 
}

function submit($URI, $formvars="", $formfiles="")
{
$postdata = $this->_prepare_post_body($formvars, $formfiles);

$URI_PARTS = parse_url($URI);
if (!empty($URI_PARTS["user"]))
$this->user = $URI_PARTS["user"];
if (!empty($URI_PARTS["pass"]))
$this->pass = $URI_PARTS["pass"];
if (empty($URI_PARTS["query"]))
$URI_PARTS["query"] = '';
if (empty($URI_PARTS["path"]))
$URI_PARTS["path"] = '';

switch(strtolower($URI_PARTS["scheme"]))
{
case "http":
$this->host = $URI_PARTS["host"];
if(!empty($URI_PARTS["port"]))
$this->port = $URI_PARTS["port"];
$fp = null;
if($this->_connect($fp))
{
if($this->_isproxy)
{
// using proxy, send entire URI
$this->_httprequest($URI,$fp,$URI,$this->_submit_method,$this->_submit_type,$postdata);
}
else
{
$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
// no proxy, send only the path
$this->_httprequest($path, $fp, $URI, $this->_submit_method, $this->_submit_type, $postdata);
}

$this->_disconnect($fp);

if($this->_redirectaddr)
{
/* url was redirected, check if we've hit the max depth */
if($this->maxredirs > $this->_redirectdepth)
{ 
if(!preg_match("|^".$URI_PARTS["scheme"]."://|", $this->_redirectaddr))
$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr,$URI_PARTS["scheme"]."://".$URI_PARTS["host"]); 

// only follow redirect if it's on this site, or offsiteok is true
if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
{
/* follow the redirect */
++$this->_redirectdepth;
$this->lastredirectaddr=$this->_redirectaddr;
if( strpos( $this->_redirectaddr, "?" ) > 0 )
$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
else
$this->submit($this->_redirectaddr,$formvars, $formfiles);
}
}
}

if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
{
$frameurls = $this->_frameurls;
$this->_frameurls = array();

while(list(,$frameurl) = each($frameurls))
{ 
if($this->_framedepth < $this->maxframes)
{
$this->fetch($frameurl);
++$this->_framedepth;
}
else
break;
}
} 

}
else
{
return false;
}
return true; 
break;
case "https":
if(!$this->curl_path)
return false;
if(function_exists("is_executable")) {
if (!is_executable($this->curl_path)) {
return false;
}
}
$this->host = $URI_PARTS["host"];
if(!empty($URI_PARTS["port"]))
$this->port = $URI_PARTS["port"];
if($this->_isproxy)
{
// using proxy, send entire URI
$this->_httpsrequest($URI, $URI, $this->_submit_method, $this->_submit_type, $postdata);
}
else
{
$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
// no proxy, send only the path
$this->_httpsrequest($path, $URI, $this->_submit_method, $this->_submit_type, $postdata);
}

if($this->_redirectaddr)
{
/* url was redirected, check if we've hit the max depth */
if($this->maxredirs > $this->_redirectdepth)
{ 
if(!preg_match("|^".$URI_PARTS["scheme"]."://|", $this->_redirectaddr))
$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr,$URI_PARTS["scheme"]."://".$URI_PARTS["host"]); 

// only follow redirect if it's on this site, or offsiteok is true
if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
{
/* follow the redirect */
++$this->_redirectdepth;
$this->lastredirectaddr=$this->_redirectaddr;
if( strpos( $this->_redirectaddr, "?" ) > 0 )
$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
else
$this->submit($this->_redirectaddr,$formvars, $formfiles);
}
}
}

if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
{
$frameurls = $this->_frameurls;
$this->_frameurls = array();

while(list(,$frameurl) = each($frameurls))
{ 
if($this->_framedepth < $this->maxframes)
{
$this->fetch($frameurl);
++$this->_framedepth;
}
else
break;
}
} 
return true; 
break;

default:
// not a valid protocol
$this->error = 'Invalid protocol "'.$URI_PARTS["scheme"].'"\n';
return false;
break;
} 
}

function fetchlinks($URI)
{
if ($this->fetch($URI))
{
if($this->lastredirectaddr)
$URI = $this->lastredirectaddr;
if(is_array($this->results))
{
for($x=0;$x<count($this->results);$x++)
$this->results[$x] = $this->_striplinks($this->results[$x]);
}
else
$this->results = $this->_striplinks($this->results);

if($this->expandlinks)
$this->results = $this->_expandlinks($this->results, $URI);
return true;
}
else
return false;
}

function fetchform($URI)
{

if ($this->fetch($URI))
{

if(is_array($this->results))
{
for($x=0;$x<count($this->results);$x++)
$this->results[$x] = $this->_stripform($this->results[$x]);
}
else
$this->results = $this->_stripform($this->results);

return true;
}
else
return false;
}

function fetchtext($URI)
{
if($this->fetch($URI))
{
if(is_array($this->results))
{
for($x=0;$x<count($this->results);$x++)
$this->results[$x] = $this->_striptext($this->results[$x]);
}
else
$this->results = $this->_striptext($this->results);
return true;
}
else
return false;
}
function submitlinks($URI, $formvars="", $formfiles="")
{
if($this->submit($URI,$formvars, $formfiles))
{
if($this->lastredirectaddr)
$URI = $this->lastredirectaddr;
if(is_array($this->results))
{
for($x=0;$x<count($this->results);$x++)
{
$this->results[$x] = $this->_striplinks($this->results[$x]);
if($this->expandlinks)
$this->results[$x] = $this->_expandlinks($this->results[$x],$URI);
}
}
else
{
$this->results = $this->_striplinks($this->results);
if($this->expandlinks)
$this->results = $this->_expandlinks($this->results,$URI);
}
return true;
}
else
return false;
}
function submittext($URI, $formvars = "", $formfiles = "")
{
if($this->submit($URI,$formvars, $formfiles))
{
if($this->lastredirectaddr)
$URI = $this->lastredirectaddr;
if(is_array($this->results))
{
for($x=0;$x<count($this->results);$x++)
{
$this->results[$x] = $this->_striptext($this->results[$x]);
if($this->expandlinks)
$this->results[$x] = $this->_expandlinks($this->results[$x],$URI);
}
}
else
{
$this->results = $this->_striptext($this->results);
if($this->expandlinks)
$this->results = $this->_expandlinks($this->results,$URI);
}
return true;
}
else
return false;
}
function set_submit_multipart()
{
$this->_submit_type = "multipart/form-data";
}

function set_submit_normal()
{
$this->_submit_type = "application/x-www-form-urlencoded";
}

function set_submit_xml()//BB: function added.
{
$this->_submit_type = "text/xml";
}


function _striplinks($document)
{
$links = null;
preg_match_all("'<\\s*a\\s.*?href\\s*=\\s*# find <a href=
([\"\\'])? # find single or double quote
(?(1) (.*?)\\1 | ([^\\s\\>]+)) # if quote found, match up to next matching
# quote, otherwise match up to next space
'isx",$document,$links);


// catenate the non-empty matches from the conditional subpattern

while(list($key,$val) = each($links[2]))
{
if(!empty($val))
$match[] = $val;
}

while(list($key,$val) = each($links[3]))
{
if(!empty($val))
$match[] = $val;
} 

// return the links
return $match;
}

function _stripform($document)
{
$elements = null;
preg_match_all("'<\\/?(FORM|INPUT|SELECT|TEXTAREA|(OPTION))[^<>]*>(?(2)(.*(?=<\\/?(option|select)[^<>]*>[\r\n]*)|(?=[\r\n]*))|(?=[\r\n]*))'Usi",$document,$elements);

// catenate the matches
$match = implode("\r\n",$elements[0]);

// return the links
return $match;
}
function _striptext($document)
{
$search = array("'<script[^>]*?>.*?</script>'si", // strip out javascript
"'<[\\/\\!]*?[^<>]*?>'si",// strip out html tags
"'([\r\n])[\\s]+'", // strip out white space
"'&(quot|#34|#034|#x22);'i", // replace html entities
"'&(amp|#38|#038|#x26);'i",// added hexadecimal values
"'&(lt|#60|#060|#x3c);'i",
"'&(gt|#62|#062|#x3e);'i",
"'&(nbsp|#160|#xa0);'i",
"'&(iexcl|#161);'i",
"'&(cent|#162);'i",
"'&(pound|#163);'i",
"'&(copy|#169);'i",
"'&(reg|#174);'i",
"'&(deg|#176);'i",
"'&(#39|#039|#x27);'",
"'&(euro|#8364);'i",// europe
"'&a(uml|UML);'", // german
"'&o(uml|UML);'",
"'&u(uml|UML);'",
"'&A(uml|UML);'",
"'&O(uml|UML);'",
"'&U(uml|UML);'",
"'&szlig;'i",
);
$replace = array( "",
"",
"\\1",
"\"",
"&",
"<",
">",
" ",
chr(161),
chr(162),
chr(163),
chr(169),
chr(174),
chr(176),
chr(39),
chr(128),
"ä",
"ö",
"ü",
"Ä",
"Ö",
"Ü",
"ß",
);

$text = preg_replace($search,$replace,$document);

return $text;
}

/*======================================================================*\
Function: _expandlinks
Purpose: expand each link into a fully qualified URL
Input: $linksthe links to qualify
$URIthe full URI to get the base from
Output: $expandedLinks the expanded links
\*======================================================================*/

function _expandlinks($links,$URI)
{
$match = null;
preg_match("/^[^\\?]+/",$URI,$match);

$match = preg_replace("|/[^\\/\\.]+\\.[^\\/\\.]+$|","",$match[0]);
$match = preg_replace("|/$|","",$match);
$match_part = parse_url($match);
$match_root =
$match_part["scheme"]."://".$match_part["host"];

$search = array( "|^http://".preg_quote($this->host)."|i",
"|^(\\/)|i",
"|^(?!http://)(?!mailto:)|i",
"|/\\./|",
"|/[^\\/]+/\\.\\./|"
);

$replace = array( "",
$match_root."/",
$match."/",
"/",
"/"
);

$expandedLinks = preg_replace($search,$replace,$links);

return $expandedLinks;
}

function _httprequest($url,$fp,$URI,$http_method,$content_type="",$body="")
{
$cookie_headers = '';
if($this->passcookies && $this->_redirectaddr)
$this->setcookies();

$URI_PARTS = parse_url($URI);
if(empty($url))
$url = "/";
$headers = $http_method." ".$url." ".$this->_httpversion."\r\n"; 
if(!empty($this->agent))
$headers .= "User-Agent: ".$this->agent."\r\n";
if(!empty($this->host) && !isset($this->rawheaders['Host'])) {
$headers .= "Host: ".$this->host;
if(!empty($this->port))
$headers .= ":".$this->port;
$headers .= "\r\n";
}
if(!empty($this->accept))
$headers .= "Accept: ".$this->accept."\r\n";
if(!empty($this->referer))
$headers .= "Referer: ".$this->referer."\r\n";
if(!empty($this->cookies))
{
if(!is_array($this->cookies))
$this->cookies = (array)$this->cookies;

reset($this->cookies);
if ( count($this->cookies) > 0 ) {
$cookie_headers .= 'Cookie: ';
foreach ( $this->cookies as $cookieKey => $cookieVal ) {
$cookie_headers .= $cookieKey."=".urlencode($cookieVal)."; ";
}
$headers .= substr($cookie_headers,0,-2) . "\r\n";
} 
}
if(!empty($this->rawheaders))
{
if(!is_array($this->rawheaders))
$this->rawheaders = (array)$this->rawheaders;
while(list($headerKey,$headerVal) = each($this->rawheaders))
$headers .= $headerKey.": ".$headerVal."\r\n";
}
if(!empty($content_type)) {
$headers .= "Content-type: $content_type";
if ($content_type == "multipart/form-data")
$headers .= "; boundary=".$this->_mime_boundary;
$headers .= "\r\n";
}
if(!empty($body)) 
$headers .= "Content-length: ".strlen($body)."\r\n";
if(!empty($this->user) || !empty($this->pass)) 
$headers .= "Authorization: Basic ".base64_encode($this->user.":".$this->pass)."\r\n";

//add proxy auth headers
if(!empty($this->proxy_user)) 
$headers .= 'Proxy-Authorization: ' . 'Basic ' . base64_encode($this->proxy_user . ':' . $this->proxy_pass)."\r\n";


$headers .= "\r\n";

// set the read timeout if needed
if ($this->read_timeout > 0)
socket_set_timeout($fp, $this->read_timeout);
$this->timed_out = false;

fwrite($fp,$headers.$body,strlen($headers.$body));

$this->_redirectaddr = false;
unset($this->headers);

while( false != ( $currentHeader = fgets($fp,$this->_maxlinelen)) )
{
if ($this->read_timeout > 0 && $this->_check_timeout($fp))
{
$this->status=-100;
return false;
}

//BB fix according to sourceforge artf 1192125:
if($currentHeader == "\r\n" || $currentHeader == "\r" || $currentHeader == "\n")
break;

// if a header begins with Location: or URI:, set the redirect
if(preg_match("/^(Location:|URI:)/i",$currentHeader))
{
// get URL portion of the redirect
$matches = null;
preg_match("/^(Location:|URI:)[ ]+(.*)/i",chop($currentHeader),$matches);
// look for :// in the Location header to see if hostname is included
if(!preg_match("|\\:\\/\\/|",$matches[2]))
{
// no host in the path, so prepend
$this->_redirectaddr = $URI_PARTS["scheme"]."://".$this->host.":".$this->port;
// eliminate double slash
if(!preg_match("|^/|",$matches[2]))
$this->_redirectaddr .= "/".$matches[2];
else
$this->_redirectaddr .= $matches[2];
}
else
$this->_redirectaddr = $matches[2];
}

if(preg_match("|^HTTP/|",$currentHeader))
{
$status = null;
if(preg_match("|^HTTP/[^\\s]*\\s(.*?)\\s|",$currentHeader, $status))
{
$this->status= $status[1];
}
$this->response_code = $currentHeader;
}

$this->headers[] = $currentHeader;
}

//BB 4 lines to fix problem that on timeout of header, and not timeout of read-data, data returned includes header: Reported bug 1482144 on sourceforge:
if ($currentHeader === false) {
$this->status=-100;
return false;
}

$results = '';
do {
$_data = fread($fp, $this->maxlength);
if (strlen($_data) == 0) {
break;
}
$results .= $_data;
} while(true);

if ($this->read_timeout > 0 && $this->_check_timeout($fp))
{
$this->status=-100;
return false;
}

// check if there is a a redirect meta tag
$match = 0;
if(preg_match("'<meta[\\s]*http-equiv[^>]*?content[\\s]*=[\\s]*[\"\\']?\\d+;[\\s]*URL[\\s]*=[\\s]*([^\"\\']*?)[\"\\']?>'i",$results,$match))

{
$this->_redirectaddr = $this->_expandlinks($match[1],$URI); 
}

// have we hit our frame depth and is there frame src to fetch?
if(($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\\s+.*src[\\s]*=[\\'\"]?([^\\'\"\\>]+)'i",$results,$match))
{
$this->results[] = $results;
for($x=0; $x<count($match[1]); $x++)
$this->_frameurls[] = $this->_expandlinks($match[1][$x],$URI_PARTS["scheme"]."://".$this->host);
}
// have we already fetched framed content?
elseif(is_array($this->results))
$this->results[] = $results;
// no framed content
else
$this->results = $results;

return true;
}

function _httpsrequest($url,$URI,$http_method,$content_type="",$body="")
{
if($this->passcookies && $this->_redirectaddr)
$this->setcookies();

$headers = array(); 

$URI_PARTS = parse_url($URI);
if(empty($url))
$url = "/";
// GET ... header not needed for curl
//$headers[] = $http_method." ".$url." ".$this->_httpversion; 
if(!empty($this->agent))
$headers[] = "User-Agent: ".$this->agent;
if(!empty($this->host)) {
if(!empty($this->port)) {
$headers[] = "Host: ".$this->host.":".$this->port;
} else {
$headers[] = "Host: ".$this->host;
}
}
if(!empty($this->accept))
$headers[] = "Accept: ".$this->accept;
if(!empty($this->referer))
$headers[] = "Referer: ".$this->referer;
if(!empty($this->cookies))
{
if(!is_array($this->cookies))
$this->cookies = (array)$this->cookies;

reset($this->cookies);
if ( count($this->cookies) > 0 ) {
$cookie_str = 'Cookie: ';
foreach ( $this->cookies as $cookieKey => $cookieVal ) {
$cookie_str .= $cookieKey."=".urlencode($cookieVal)."; ";
}
$headers[] = substr($cookie_str,0,-2);
}
}
if(!empty($this->rawheaders))
{
if(!is_array($this->rawheaders))
$this->rawheaders = (array)$this->rawheaders;
while(list($headerKey,$headerVal) = each($this->rawheaders))
$headers[] = $headerKey.": ".$headerVal;
}
if(!empty($content_type)) {
if ($content_type == "multipart/form-data")
$headers[] = "Content-type: $content_type; boundary=".$this->_mime_boundary;
else
$headers[] = "Content-type: $content_type";
}
if(!empty($body)) 
$headers[] = "Content-length: ".strlen($body);
if(!empty($this->user) || !empty($this->pass)) 
$headers[] = "Authorization: BASIC ".base64_encode($this->user.":".$this->pass);
$cmdline_params = ''; //BB added to fix
for($curr_header = 0; $curr_header < count($headers); $curr_header++) {
$safer_header = strtr( $headers[$curr_header], "\"", " " );
$cmdline_params .= " -H \"".$safer_header."\"";
}

if(!empty($body))
$cmdline_params .= ' -d "' . str_replace( '"', "\\\"", $body ) . '"';

if($this->read_timeout > 0)
$cmdline_params .= " -m ".$this->read_timeout;

$headerfile = tempnam($this->temp_dir, "sno"); //BB bug corrected: was $temp_dir

$safer_URI = strtr( $URI, "\"", " " ); // strip quotes from the URI to avoid shell access
$results = null;
$return = null;
exec($this->curl_path." -D \"$headerfile\"".$cmdline_params." \"".$safer_URI."\"",$results,$return); // add -k for non-certified

if($return)
{
$this->error = "Error: cURL could not retrieve the document, error $return.";
return false;
}


$results = implode("\r\n",$results);

$result_headers = file("$headerfile");

$this->_redirectaddr = false;
unset($this->headers);

for($currentHeader = 0; $currentHeader < count($result_headers); $currentHeader++)
{

// if a header begins with Location: or URI:, set the redirect
if(preg_match("/^(Location: |URI: )/i",$result_headers[$currentHeader]))
{
// get URL portion of the redirect
$matches = null;
preg_match("/^(Location: |URI:)\\s+(.*)/",chop($result_headers[$currentHeader]),$matches);
// look for :// in the Location header to see if hostname is included
if(!preg_match("|\\:\\/\\/|",$matches[2]))
{
// no host in the path, so prepend
$this->_redirectaddr = $URI_PARTS["scheme"]."://".$this->host.":".$this->port;
// eliminate double slash
if(!preg_match("|^/|",$matches[2]))
$this->_redirectaddr .= "/".$matches[2];
else
$this->_redirectaddr .= $matches[2];
}
else
$this->_redirectaddr = $matches[2];
}

if ( preg_match("|^HTTP/|",$result_headers[$currentHeader]) ) {
$status = null; //BB: added and fixed status return for https with this and next 2 code lines from http
if(preg_match("|^HTTP/[^\\s]*\\s(.*?)\\s|",$result_headers[$currentHeader], $status))
{
$this->status= $status[1];
}
$this->response_code = $result_headers[$currentHeader];
}
$this->headers[] = $result_headers[$currentHeader];
}

// check if there is a a redirect meta tag
$match = null;
if(preg_match("'<meta[\\s]*http-equiv[^>]*?content[\\s]*=[\\s]*[\"\\']?\\d+;[\\s]*URL[\\s]*=[\\s]*([^\"\\']*?)[\"\\']?>'i",$results,$match))
{
$this->_redirectaddr = $this->_expandlinks($match[1],$URI); 
}

// have we hit our frame depth and is there frame src to fetch?
if(($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\\s+.*src[\\s]*=[\\'\"]?([^\\'\"\\>]+)'i",$results,$match))
{
$this->results[] = $results;
for($x=0; $x<count($match[1]); $x++)
$this->_frameurls[] = $this->_expandlinks($match[1][$x],$URI_PARTS["scheme"]."://".$this->host);
}
// have we already fetched framed content?
elseif(is_array($this->results))
$this->results[] = $results;
// no framed content
else
$this->results = $results;

unlink("$headerfile");

return true;
}

function setcookies()
{
for($x=0; $x<count($this->headers); $x++)
{
$match = null;
if(preg_match('/^set-cookie:[\s]+([^=]+)=([^;]+)/i', $this->headers[$x],$match))
$this->cookies[$match[1]] = urldecode($match[2]);
}
}

function _check_timeout($fp)
{
if ($this->read_timeout > 0) {
$fp_status = socket_get_status($fp);
if ($fp_status["timed_out"]) {
$this->timed_out = true;
return true;
}
}
return false;
}

function _connect(&$fp)
{
if(!empty($this->proxy_host) && !empty($this->proxy_port))
{
$this->_isproxy = true;

$host = $this->proxy_host;
$port = $this->proxy_port;
}
else
{
$host = $this->host;
$port = $this->port;
}

$this->status = 0;
$errno = null;
$errstr = null;
if( false != ( $fp = fsockopen(
$host,
$port,
$errno,
$errstr,
$this->_fp_timeout
)) )
{
// socket connection succeeded

return true;
}
else
{
// socket connection failed
$this->status = $errno;
switch($errno)
{
case -3:
$this->error="socket creation failed (-3)";
case -4:
$this->error="dns lookup failure (-4)";
case -5:
$this->error="connection refused or timed out (-5)";
default:
$this->error="connection failed (".$errno.")";
}
return false;
}
}

function _disconnect($fp)
{
return(fclose($fp));
}

function _prepare_post_body($formvars, $formfiles)
{
settype($formvars, "array");
settype($formfiles, "array");
$postdata = '';

if (count($formvars) == 0 && count($formfiles) == 0)
return null;

switch ($this->_submit_type) {
case "application/x-www-form-urlencoded":
reset($formvars);
while(list($key,$val) = each($formvars)) {
if (is_array($val) || is_object($val)) {
while (list($cur_key, $cur_val) = each($val)) {
$postdata .= urlencode($key)."[]=".urlencode($cur_val)."&";
}
} else
$postdata .= urlencode($key)."=".urlencode($val)."&";
}
break;

case "multipart/form-data":
$this->_mime_boundary = "Snoopy".md5(uniqid(microtime()));

reset($formvars);
while(list($key,$val) = each($formvars)) {
if (is_array($val) || is_object($val)) {
while (list($cur_key, $cur_val) = each($val)) {
$postdata .= "--".$this->_mime_boundary."\r\n";
$postdata .= "Content-Disposition: form-data; name=\"$key\[\]\"\r\n\r\n";
$postdata .= "$cur_val\r\n";
}
} else {
$postdata .= "--".$this->_mime_boundary."\r\n";
$postdata .= "Content-Disposition: form-data; name=\"$key\"\r\n\r\n";
$postdata .= "$val\r\n";
}
}

reset($formfiles);
while (list($field_name, $file_names) = each($formfiles)) {
settype($file_names, "array");
while (list(, $file_name) = each($file_names)) {
if (!is_readable($file_name)) continue;

$fp = fopen($file_name, "r");
$file_content = fread($fp, filesize($file_name));
fclose($fp);
$base_name = basename($file_name);

$postdata .= "--".$this->_mime_boundary."\r\n";
$postdata .= "Content-Disposition: form-data; name=\"$field_name\"; filename=\"$base_name\"\r\n\r\n";
$postdata .= "$file_content\r\n";
}
}
$postdata .= "--".$this->_mime_boundary."--\r\n";
break;
case "text/xml"://BB case added
$postdata = $formvars['xml'];
break;
}

return $postdata;
}
}
}
?>
