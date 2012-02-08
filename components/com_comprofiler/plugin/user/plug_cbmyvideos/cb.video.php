<?php

/*************************************************************
* Joomla Community Builder Customize Plugin
* @package Community Builder
* @author Stiggi <stiggi@voodootools.de>
* @link http://voodootools.de
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
*************************************************************/

defined('_JEXEC') or die( 'Direct Access to this location is not allowed.' );
define( 'MYVIDBASEPATH', dirname(__FILE__).'/');

if (file_exists(MYVIDBASEPATH.'language/english.php')) {
	include_once(MYVIDBASEPATH.'language/english.php');
} else {
	include_once(MYVIDBASEPATH.'language/english.php');
}

?>

<script type="text/javascript">


if (document.getElementById){
document.write('<style type="text/css">')
document.write('.multiparts, #formnavigation{display:none;}')
document.write('</style>')
}

var curpart=0


function getElementbyClass(classname){
partscollect=new Array()

var inc=0
var alltags=document.all? document.all : document.getElementsByTagName("*")
for (i=0; i<alltags.length; i++){
if (alltags[i].className==classname)
partscollect[inc++]=alltags[i]
}
}

function cycleforward(){
partscollect[curpart].style.display="none"
curpart=(curpart<partscollect.length-1)? curpart+1 : 0
partscollect[curpart].style.display="block"
updatenav()
}

function cycleback(){
partscollect[curpart].style.display="none"
curpart=(curpart>0)? curpart-1 : partscollect.length-1
partscollect[curpart].style.display="block"
updatenav()
}


function updatenav(){
document.getElementById("backbutton").style.visibility=(curpart==0)? "hidden" : "visible"
document.getElementById("forwardbutton").style.visibility=(curpart==partscollect.length-1)? "hidden" : "visible"
}

function onloadfunct(){
getElementbyClass("multiparts")
partscollect[0].style.display="block"
document.getElementById("formnavigation").style.display="block"
updatenav()
}

if (window.addEventListener)
window.addEventListener("load", onloadfunct, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunct)
else if (document.getElementById)
window.onload=onloadfunct


</script>

<?php
/**
* Joomla Community Builder User Plugin: plug_cbhelloworld
* @version $Id$
* @package plug_video
* @subpackage video.php
* @author Kinshuk Kulshreshtha
* @copyright (C) Kinshuk Kulshreshtha, www.kulshreshtha.net
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
*
*/

/** ensure this file is being included by a parent file */
$my = &JFactory::getUser();
$database = &JFactory::getDbo();
/**
 * Basic tab extender. Any plugin that needs to display a tab in the user profile
 * needs to have such a class. Also, currently, even plugins that do not display tabs (e.g., auto-welcome plugin)
 * need to have such a class if they are to access plugin parameters (see $this->params statement).
 */
class getvideoTab extends cbTabHandler {

	/**
	 * Construnctor
	 */
	function getvideoTab() {
		$this->cbTabHandler();
	}

	/**
	* Generates the HTML to display the user profile tab
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed
	* @param int 1 for front-end, 2 for back-end
	* @returns mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/
 function videoSave($tab) {
global $my, $database, $_SERVER;
$my = &JFactory::getUser();
$database = &JFactory::getDbo();
$id = $my->id;
$video = $_POST["video"];
$detail = $_POST["detail"];
$videotype = $_POST["videotype"];
if ($videotype == "youtube")
{
$video = substr($video, 31, 11);
}
else if ($videotype == "google")
{
$test = substr($video, 40,1 );
if($test =="-")
{
$video = substr($video, 40, 20);
}
else
{
$video = substr($video, 40, 19);
}

}
$params = $this->params;
$Videolimit = $params->get('Videolimit', '5');

$query = "SELECT COUNT(*) FROM #__comprofiler_plug_video WHERE userid='$id'";
$database->setQuery($query);
$count=$database->loadResult();
if($count >= $Videolimit)
{
print("<font color=\"red\">Max videos limit reached</font><br />");
return;

}

$query = "SELECT COUNT(*) FROM #__comprofiler_plug_video WHERE video='$video' AND userid='$id' AND videotype='$videotype'";
$database->setQuery($query);

$AnnounceVideo = $params->get('AnnounceVideo', '0');
$count=$database->loadResult();
if ($count == 0) { // avoid double-posts on clicking reload !
$query = "INSERT INTO #__comprofiler_plug_video SET video='$video', userid='$id', detail='$detail', videotype='$videotype'";
$database->setQuery($query);
if (!$database->query()) {
print("<font color=\"red\">pbSave SQL error: " . $database->stderr(true)."</font><br />");
return;
}

if($AnnounceVideo)
{


$shouttext = $my->username." has added ".$detail." video in his profile ".sefRelToAbs('index.php?option=com_comprofiler&task=userProfile&user='.$my->id);
$query = "INSERT INTO #__liveshoutbox (time,name,text,url) VALUES ('"
.time()."','Announcement','"
.$shouttext."',' ')";
$database->setQuery($query);
if (!$database->query()) {
print("<font color=\"red\">pbSave SQL error: " . $database->stderr(true)."</font><br />");
return;
}
}
}
}
        function videoDelete($id) {
$my = &JFactory::getUser();
$database = &JFactory::getDbo();
		$database->setQuery("DELETE FROM #__comprofiler_plug_video WHERE id=".$id);
		$database->query();
		if (!$database->query()) {
			print("<font color=\"red\">videoDelete SQL error: " . $database->stderr(true)."</font><br />");
			return;
		}
	}
	function getDisplayTab($tab,$user,$ui) {
		global $my,$database,$mosConfig_live_site;
$my = &JFactory::getUser();
$database = &JFactory::getDbo();
                $action = $this->_getReqParam("formaction", null);
		$id = $this->_getReqParam("id",0);
                if ($action == "new") {
			$this->videoSave($tab);
		}
                else if ($action == "delete") {
        			$this->videodelete($id);
		}
		$params = $this->params;
		$Videoperpage = $params->get('Videoperpage', '2');


		$return = null;
          

		$query="SELECT *"
			. "\n FROM #__comprofiler_plug_video"
			. "\n WHERE userid='".$user->id."' ORDER BY id DESC";

			$database->setQuery($query);
			$items = $database->loadObjectList();
			if ($my->id == $user->id)
					    {
					      $formName = "newvideo";
						  $linkTitle = "Share a new Video";
						  $txtSubmit = "Submit";
					      $return .= $this->_hiddenBBeditor(null, $formName, $linkTitle, $txtSubmit, null);


			   /*               $htmltext="";
						$htmltext .= "<div style=\"width:100%;\">";
						$htmltext .= "<B>".$linkTitle."</B><br>";

						//get the CB initiatied form action path this is used for all forms
						$base_url = $this->_getAbsURLwithParam(array());
						$htmltext .= "<form name=\"admin".$idTag."\" id=\"admin".$idTag."\" method=\"post\" onsubmit=\"javascript: return video_submitForm(this);\" action=\"".$base_url."\">\n";
			                  $htmltext .= "<input type=\"hidden\" name=\"".$this->_getPagingParamName("formaction")."\" value=\"new\" />\n";
			                  $htmltext .= "Video Title <input class=\"inputbox\" name=\"detail\" type=\"text\"><br>";
						$htmltext .= "Video URL <input class=\"inputbox\" name=\"video\" type=\"text\"/> Format should be http:\\www.youtube.com/watch?v=abcdefg. Make sure that u use www in the URL<br>";
						$htmltext .= "<input type=\"hidden\" name=\"videotype\" value=\"videotype\"/>";
						$htmltext .= "<input class=\"button\" name=\"submitentry\" type=\"submit\" value=\"".$txtSubmit."\" /><br>";
						$htmltext .= "</form></div>";
			                  $return .= $htmltext;
			                  */

		    }
	if ($my->id == $user->id || (count($items) >0)){      
				$return .="\n<script type=\"text/javascript\" src=\"". JURI::base() ."/components/com_comprofiler/plugin/user/plug_cbmyvideos/cb.video.js\"></script>\n";
			
			if($tab->description != null) {
				$return .= "\t\t<div class=\"tab_Description\">"
					. $tab->description	// html content is allowed in descriptions
					. "</div>\n";
			}
		}	    
	if(count($items) >0) {


				$k=0;
				$videocount=1;
				$vidheight=410*$Videoperpage;
				?>

				<style type="text/css">
				/*specify height of broken up content */
				.multiparts{
				height: <?php echo $vidheight; ?>px;
				}

				</style>
<?php
				foreach($items AS $item)
				{
					if($videocount==1)
					{

						if($k == 0)
						{
						$return .="<div class=\"multiparts\" style=\"display: block\">";
						}
						else
						{
						$return .="<div class=\"multiparts\">";
						}
					}
					$closetag=0;
                                        $k++;


                                        $return .= "<h1>".$item->detail."</h1>";
                                        $base_url = $this->_getAbsURLwithParam(array());
                                        if ($my->id == $user->id)
                                        {
                                            $return .= "<form name=\"deleteForm".$k."\" id=\"deleteForm".$k."\" method=\"post\" action=\"".$base_url."\">"
					    ."<input type=\"hidden\" name=\"".$this->_getPagingParamName("id")."\" value=\"".$item->id."\" />"
					    ."<input type=\"hidden\" id=\"formaction".$k."\" name=\"".$this->_getPagingParamName("formaction")."\" value=\"delete\" />"
					    ."</form>";
                                            $return .= "<a href=\"javascript:if (confirm('Do you really want to delete this video')) { document.deleteForm".$k.".formaction".$k.".value='delete';document.deleteForm".$k.".submit(); }\">delete</a>";
                                        }
                                        $return .= "<br>" ;
if ($item->videotype == "youtube")
{
					$return .= "<object width=\"425\" height=\"350\"><param name=\"movie\" value=\"http://www.youtube.com/v/".$item->video."\"></param><param name=\"wmode\" value=\"transparent\"></param><embed src=\"http://www.youtube.com/v/".$item->video."\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"425\" height=\"350\"></embed></object><br><br>";
}
else if ($item->videotype == "google")
{

$return .= "<embed style=\"width:425px; height:350px;\" id=\"VideoPlayback\" type=\"application/x-shockwave-flash\""
           ."src=\"http://video.google.com/googleplayer.swf?docId=".$item->video."\"></embed><br><br>";

}

if($videocount==$Videoperpage)
{
	$videocount=1;
	$closetag=1;
	$return .="</div>";
}
else
	$videocount++;
}
if(!$closetag)
{
	$return .="</div>";
}
	    $return .="<div id=\"formnavigation\" style=\"width:425px; display:none\">"
    ."<a id=\"backbutton\" href=\"javascript:cycleback()\" style=\"float:left\">Prev</a>"
    ."<a id=\"forwardbutton\" href=\"javascript:cycleforward()\" style=\"float:right\">Next</a>"
	."</div><br>";


		    }

		return $return;
	} // end or getDisplayTab function

	function _hiddenBBeditor($item, $formName, $linkTitle, $txtSubmit, $warnText) {
			$return = "";
			$return .= "<a href=\"javascript:void(0);\" onclick=\"video_Expand('".$formName."', '".str_replace("'","\\'",$warnText)."');\">".$linkTitle." <img style=\"cursor:pointer;border:0px;\" id=\"direction".$formName."\" src=\"components/com_comprofiler/plugin/user/plug_cbprofilebook/smilies/none-arrow.gif\" alt=\"\" /></a>";

			$return .= $this->_newvideo($item, $formName, $txtSubmit);
			return $return;
	}

	function _newvideo($item, $idTag, $txtSubmit) {
			global $my, $database, $ueConfig, $acl;

			if ($item == null) {
				$item = new stdClass();
				$item->video = null;
				$item->userid = -1;
				$item->pbid=null;
			}

			$htmltext="";
			$htmltext .= "<div id=\"div".$idTag."\" style=\"display:none;width:100%;\">";

			//get the CB initiatied form action path this is used for all forms
			$base_url = $this->_getAbsURLwithParam(array());
			$htmltext .= "<form name=\"admin".$idTag."\" id=\"admin".$idTag."\" method=\"post\" onsubmit=\"javascript: return video_submitForm(this);\" action=\"".$base_url."\">\n";
            $htmltext .= "<input type=\"hidden\" name=\"".$this->_getPagingParamName("formaction")."\" value=\"new\" />\n";
            $htmltext .= "Video Title <input class=\"inputbox\" name=\"detail\" type=\"text\"><br>";
			$htmltext .= "Video URL <input class=\"inputbox\" name=\"video\" type=\"text\"/>";
			$htmltext .= "<input type=\"hidden\" name=\"videotype\" value=\"videotype\"/>";
			$htmltext .= "<input class=\"button\" name=\"submitentry\" type=\"submit\" value=\"".$txtSubmit."\" /><br>";
			$htmltext .= "</form></Div>";

			return $htmltext;
	}
}
?>
