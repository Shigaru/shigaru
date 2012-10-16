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
		$ocode ='';
		$return ='';
		/*$myspacepage ='tom';*/
		if($myspacepage  !=''){
		$ocode .= '<a href="http://home.myspace.com/'.$myspacepage.'" target="_blank"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/myspace.png">&nbsp;&nbsp;</a>';
		} 
		$twitterpage = $user->cb_twitterpageURL;
		if($twitterpage  !=''){
		$ocode .= '<a href="http://twitter.com/'.$twitterpage.'" target="_blank"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/twitter.png">&nbsp;&nbsp;</a>';	
		}
		$facebook = $user->cb_facebookURL;
		if($facebook  !=''){
		$ocode .= '<a target="_blank" href="http://www.facebook.com/'.$facebook.'"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/facebook.png">&nbsp;&nbsp;</a>';			
		}	
		$linkedin = $user->cb_linkedinURL;
		if($linkedin  !=''){
		$ocode .= '<a target="_blank" href="http://www.linkedin.com/in/'.$linkedin.'"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/linkedin.png" alt="linkedin">&nbsp;&nbsp;</a>';			
		}
		$hi5 = $user->cb_hi5URL;
		if($hi5  !=''){
		$ocode .= '<a target="_blank" href="http://'.$hi5.'.hi5.com/"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/hi5.png" alt="hi5">&nbsp;&nbsp;</a>';			
		}	
		$google = $user->cb_googleURL;
		if($google  !=''){
		$ocode .= '<a target="_blank" href="http://google.com/'.$google.'"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/google.png" alt="Google">&nbsp;&nbsp;</a>';			
		}	
		$youtube = $user->cb_youtubeURL;
		if($youtube  !=''){
		$ocode .= '<a target="_blank" href="http://youtube.com/'.$youtube.'"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/youtube.png" alt="YouTube">&nbsp;&nbsp;</a>';			
		}	
		$flickr = $user->cb_flickrURL;
		if($flickr  !=''){
		$ocode .= '<a target="_blank" href="http://flickr.com/'.$flickr.'"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/flickr.png" alt="flickr">&nbsp;&nbsp;</a>';			
		}	
		$blogger = $user->cb_bloggerURL;
		if($blogger  !=''){
		$ocode .= '<a target="_blank" href="http://blogger.com/profile/'.$blogger.'"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/blogger.png" alt="blogger">&nbsp;&nbsp;</a>';			
		}	
		$wordpress = $user->cb_wordpressURL;
		if($wordpress  !=''){
		$ocode .= '<a target="_blank" href="http://'.$wordpress.'.wordpress.com/"><img src="'.$livesite.'templates/rhuk_milkyway/images/socialmedia/icons_32x32/wordpress.png" alt="wordpress"></a>';			
		}	
		if($ocode !=''){
			$return .= '<div align="center">';
			$return .= $ocode;
			$return .= '</div></div><div class="clear"></div>';
		}else{
			$return .= '<div align="center">';
			$return .= $ocode;
			$return .= '</div></div><div class="clear"></div>';
			}
		return $return;
		
			}
}

?>
