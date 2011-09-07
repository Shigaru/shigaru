<?php
/**
* CB Social Networks, 1.1
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Author Prof. Edfel Jose Rivera
* Site www.juntehispano.com
* Send bug reports to webmaster@juntehispano.com
*/

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) )
	die( 'Direct Access to this location is not allowed.' );

$livesite = JURI::base();
	
class getsocialpagesURL extends cbTabHandler {
	function getsocialpagesURLTab() {
        $this->cbTabHandler();
    }
    function getDisplayTab($tab,$user,$ui) {
		$myspacepage = $user->cb_myspacepageURL;
		$return ='';
		/*$myspacepage ='tom';*/
		if($myspacepage  !=''){
		$return .= '<div align="center">';
		$return .= '<a href="http://home.myspace.com/'.$myspacepage.'" target="_blank"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/myspace.jpg">&nbsp;&nbsp;</a>';
		} else 	
		$return .= '<div align="center">';
		$return .= '<img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/none.png">&nbsp;&nbsp;</a>';		
		$twitterpage = $user->cb_twitterpageURL;
		if($twitterpage  !=''){
		$return .= '<a href="http://twitter.com/'.$twitterpage.'" target="_blank"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/twitter.jpg">&nbsp;&nbsp;</a>';	
		}
		$facebook = $user->cb_facebookURL;
		if($facebook  !=''){
		$return .= '<a target="_blank" href="http://www.facebook.com/'.$facebook.'"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/facebook.jpg">&nbsp;&nbsp;</a>';			
		}	
		$linkedin = $user->cb_linkedinURL;
		if($linkedin  !=''){
		$return .= '<a target="_blank" href="http://www.linkedin.com/in/'.$linkedin.'"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/linkedin.jpg" alt="linkedin">&nbsp;&nbsp;</a>';			
		}
		$hi5 = $user->cb_hi5URL;
		if($hi5  !=''){
		$return .= '<a target="_blank" href="http://'.$hi5.'.hi5.com/"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/hi5.jpg" alt="hi5">&nbsp;&nbsp;</a>';			
		}	
		$google = $user->cb_googleURL;
		if($google  !=''){
		$return .= '<a target="_blank" href="http://google.com/'.$google.'"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/google.jpg" alt="Google">&nbsp;&nbsp;</a>';			
		}	
		$youtube = $user->cb_youtubeURL;
		if($youtube  !=''){
		$return .= '<a target="_blank" href="http://youtube.com/'.$youtube.'"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/youtube.jpg" alt="YouTube">&nbsp;&nbsp;</a>';			
		}	
		$flickr = $user->cb_flickrURL;
		if($flickr  !=''){
		$return .= '<a target="_blank" href="http://flickr.com/'.$flickr.'"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/flickr.jpg" alt="flickr">&nbsp;&nbsp;</a>';			
		}	
		$blogger = $user->cb_bloggerURL;
		if($blogger  !=''){
		$return .= '<a target="_blank" href="http://blogger.com/profile/'.$blogger.'"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/blogger.jpg" alt="blogger">&nbsp;&nbsp;</a>';			
		}	
		$wordpress = $user->cb_wordpressURL;
		if($wordpress  !=''){
		$return .= '<a target="_blank" href="http://'.$wordpress.'.wordpress.com/"><img src="'.$livesite.'components/com_comprofiler/plugin/user/plug_cbsocialnetworks/images/wordpress.jpg" alt="wordpress"></a>';			
		}	
		$return .= '<a target=_blank href="http://www.juntehispano.com/">&nbsp;&copy;</a>';
		$return .= '</div>';
		return $return;
		
			}
}

?>