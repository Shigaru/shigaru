<?php
/*
// "bretteleben.de Google Ad Manager Plugin" - Version 1.1.0
// Author: Andreas Berger - http://www.bretteleben.de
// Copyright (c) 2009 Andreas Berger - andreas_berger@bretteleben.de
// License: http://www.gnu.org/copyleft/gpl.html
// Project page and Demo at http://www.bretteleben.de
// ***Last update: 2009-04-03***
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport('joomla.event.plugin');

class plgSystemBegam extends JPlugin
{
	//Constructor
	function plgSystemBegam( &$subject )
	{
		parent::__construct( $subject );
		// load plugin parameters
		$this->_plugin = JPluginHelper::getPlugin( 'system', 'begam' );
		$this->_params = new JParameter( $this->_plugin->params );
	}

	function onAfterRender() {
				// just startup
		global $mainframe;

		// return if current page is an administrator page
		if( $mainframe->isAdmin() ) return;

		$plugin =& JPluginHelper::getPlugin('system', 'begam');
		$pluginParams = new JParameter( $plugin->params );

		// Parameters
		$gam_pubid 			= trim($pluginParams->get('begam_pubid', 'ca-pubid'));
		//1.1
		$pubidarray=array($gam_pubid);
		//1.1
		$text = JResponse::getBody();

		// checking
		if ( !preg_match("#{begam}(.*?){/begam}#s", $text) ) return;
		$headinjection="";
			$gamslots = array();
			$gamattr = array();
			$gampageattr = array();
			$gamslotattr = array();
		if (preg_match_all("#{begam}(.*?){/begam}#s", $text, $matches, PREG_PATTERN_ORDER) > 0) {
			foreach ($matches[0] as $match) {
				//pubid and slot
				$_gamstring = preg_replace("/{.+?}/", "", $match);
				$_gamstringparts = explode("/", $_gamstring);
				$gamslots[]="GA_googleAddSlot(\"".trim($_gamstringparts[0])."\", \"".trim($_gamstringparts[1])."\");\n";
				$fillslot="\n<script type=\"text/javascript\">GA_googleFillSlot(\"".trim($_gamstringparts[1])."\");</script>\n";
				//1.1
				if(!in_array(trim($_gamstringparts[0]),$pubidarray)){$pubidarray[]=trim($_gamstringparts[0]);}
				//1.1
				$text = preg_replace( '#'.$match.'#s', $fillslot , $text );
				//ad-attributes

				if(count($_gamstringparts)>=3&&$_gamstringparts[2]!=""){
					$_attrparts = explode(";", $_gamstringparts[2]);
					for($i=0;$i<=count($_attrparts)-1;$i++){
						$_attrsmallparts = explode(",", $_attrparts[$i]);
						$gamattr[]="GA_googleAddAttr(\"".trim($_attrsmallparts[0])."\", \"".trim($_attrsmallparts[1])."\");";
					}
				}
				//page+slot-attributes
				if(count($_gamstringparts)>=4){
					$_psparts = explode(";", $_gamstringparts[3]);
					for($i=0;$i<=count($_psparts)-1;$i++){
						$_pssmallparts = explode(",", $_psparts[$i]);
						if(count($_pssmallparts)==2){
							$gampageattr[]="GA_googleAddAdSensePageAttr(\"".trim($_pssmallparts[0])."\", \"".trim($_pssmallparts[1])."\");";
						}
						elseif(count($_pssmallparts)==3){
							$gamslotattr[]="GA_googleAddAdSenseSlotAttr(\"".trim($_pssmallparts[0])."\", \"".trim($_pssmallparts[1])."\", \"".trim($_pssmallparts[2])."\");";
						}
					}
				}
			}
		}
	if(count($gamslots)>=1){
		//remove duplicates
		$gamattr = array_unique($gamattr);
		$gampageattr = array_unique($gampageattr);
		$gamslotattr = array_unique($gamslotattr);

		$headinjection.="<script type=\"text/javascript\" src=\"http://partner.googleadservices.com/gampad/google_service.js\">\n";
		$headinjection.="</script>\n";
		$headinjection.="<script type=\"text/javascript\">\n";
		//1.1
		foreach($pubidarray as $foundpublisher){
			$headinjection.="  GS_googleAddAdSenseService(\"".$foundpublisher."\");\n";
		}
		//1.1
		$headinjection.="  GS_googleEnableAllServices();\n";
		$headinjection.="</script>\n";
		//attributes
		if(count($gamattr)>=1){
		$headinjection.="<script type=\"text/javascript\">\n";
			for($i=0;$i<=count($gamattr)-1;$i++){
				$headinjection.="  ".trim($gamattr[$i])."\n";
			}
		$headinjection.="</script>\n";
		}
		//slots
		$headinjection.="<script type=\"text/javascript\">\n";
		for($i=0;$i<=count($gamslots)-1;$i++){
			$headinjection.="  ".trim($gamslots[$i])."\n";
		}
		//pageattributes
		if(count($gampageattr)>=1){
			for($i=0;$i<=count($gampageattr)-1;$i++){
				$headinjection.="  ".trim($gampageattr[$i])."\n";
			}
		}
		//slotattributes
		if(count($gamslotattr)>=1){
			for($i=0;$i<=count($gamslotattr)-1;$i++){
				$headinjection.="  ".trim($gamslotattr[$i])."\n";
			}
		}
		$headinjection.="</script>\n";
		$headinjection.="<script type=\"text/javascript\">\n";
		$headinjection.="  GA_googleFetchAds();\n";
		$headinjection.="</script>\n";
	}
	$headinjection.="</head>";
	if ( !preg_match("#</head>#s", $text) ) return;
	$text = preg_replace( "#</head>#s", $headinjection , $text , 1 );
	JResponse::setBody($text);
	return true;
	}
}
?>