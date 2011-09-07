<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Freichat - Joomla CB chat system
 *
 * Backend Request handler
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
$document = &JFactory::getDocument();
$host = JURI::root();
$document->addStyleSheet($host.'modules/mod_freichat/jquery/css/freichat.css' ); 
$show_name='username'; //you can have 'username' or 'name'
$time='3600';
 //Do not change the value 
class jon
{
public $userdata;
public $messages=array();

}
$jon=new jon();

function makeClickableLinks($text)
{
$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
$ret = ' ' . $text;
$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
$ret = substr($ret, 1);
return $ret;
}

function mywordwrap($string)
{
$wrap=null;
$skip=NULL;
$returnvar=NULL;
$length = strlen($string);

for ($i=0; $i<=$length; $i=$i+1)
    {
    
    $char = substr($string, $i, 1);
 
    if ($char == "<")
        $skip=1;
    elseif ($char == ">")
        $skip=0;
    elseif ($char == " ")
        $wrap=0;

    if ($skip==0)
        $wrap=$wrap+1;
 
    $returnvar = $returnvar . $char;

    if ($wrap>9) // alter this number to set the maximum word length
        {
        $returnvar = $returnvar . "&#8203;";
        $wrap=0;
        }
    }

return $returnvar;

}

if (!function_exists('json_encode'))
{
  function json_encode($a=false)
  {
    if (is_null($a)) return 'null';
    if ($a === false) return 'false';
    if ($a === true) return 'true';
    if (is_scalar($a))
    {
      if (is_float($a))
      {
        // Always use "." for floats.
        return floatval(str_replace(",", ".", strval($a)));
      }

      if (is_string($a))
      {
        static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
        return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
      }
      else
        return $a;
    }
    $isList = true;
    for ($i = 0, reset($a); $i < count($a); $i++, next($a))
    {
      if (key($a) !== $i)
      {
        $isList = false;
        break;
      }
    }
    $result = array();
    if ($isList)
    {
      foreach ($a as $v) $result[] = json_encode($v);
      return '[' . join(',', $result) . ']';
    }
    else
    {
      foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
      return '{' . join(',', $result) . '}';
    }
  }
}

if($_REQUEST['freimode']=="getmembers")
{
	
$db =& JFactory::getDBO();


$user =& JFactory::getUser();
$usr_id = $user->get('id');

$query="SELECT  u.$show_name, u.id,c.avatar
FROM #__comprofiler_members AS m
LEFT JOIN #__comprofiler AS c ON m.memberid = c.id
LEFT JOIN #__users AS u ON m.memberid = u.id
WHERE m.referenceid =$usr_id
AND c.approved =1
LIMIT 0 , 30";

$db->setQuery($query);
$result = $db->loadAssocList();


$exec="notempty";
if ( ! count( $result ) > 0 ) 
{
$exec="empty";
}

$onlineusers=array();
$text=null;
//var_dump($result);
$onlcnt=0;
 $datenow = date("Y-m-d H:i:s");
$time_string = strtotime($datenow);	// Modified query below to only show members/users active in the last 10 minutes
$extra_time = 60; //example: 10 min x 60 sec
$online_time = ($time_string-$extra_time);

 foreach($result as $res)
{

$db->setQuery("SELECT COUNT(*) FROM #__session WHERE userid = " . $res['id'] . " AND guest = 0 AND time>'$online_time' AND client_id = 0");
 $isonline = $db->loadResult();
 
if($isonline>0)
{
 		//onlineIMG
		$onlineusers[$onlcnt]=$res;
		$onlcnt++;

 
		if(strpos($res['avatar'],"gallery/")===False)
		{
			if($res['avatar']=="")
			{
			$res['avatar']=	JURI::base().'/modules/mod_freichat/jquery/user.jpeg';
			}
			else
			{
			$res['avatar']=JURI::base()."/images/comprofiler/tn".$res['avatar'];
			}
		}
		else
		{
			$res['avatar']=JURI::base()."/images/comprofiler/".$res['avatar'];
		}
 
	  	$res[$show_name]=str_replace("'"," ",$res[$show_name]);
	  	$text.="<div onmousedown=\"createChatBoxmesg('".$res[$show_name]."','".$res['id']."')\"><a class=\"texts\" href='javascript:void(0)'><img src='".$res['avatar']."' height='25' width='25' />".$res[$show_name]."</a></div><hr/>";
  }      
}

$query="SELECT * FROM frei_chat WHERE frei_chat.to=$usr_id AND recd=0 ORDER BY sent";
$db->setQuery($query);
$jon->messages=$db->loadAssocList();
$jon->userdata=$text;
$jon->result=$exec;
$jon->count=$onlcnt;

$query = "DELETE FROM frei_chat  where recd =1 AND sent < NOW()-'$time'";
$db->setQuery($query);
$result = $db->query();

$query = "update frei_chat set recd = 1 where frei_chat.to = $usr_id and recd = 0";
$db->setQuery($query);
$result = $db->query();
echo json_encode($jon);
}

else if($_REQUEST['freimode']=="post")
{
$db =& JFactory::getDBO();
$user =& JFactory::getUser();
$usr_id = $user->get('id');
$usr_name= str_replace("'","",$user->get($show_name));
$to=(int)$_POST['to'];

$message=strip_tags($_POST['message']);
$message=str_replace("\\","",$message);
$message=str_replace("&lt;","",$message);
$message=str_replace("&gt;","",$message);
$message=makeClickableLinks($message);
$message=mywordwrap($message);
$to_name=htmlentities($_POST['to_name'],ENT_QUOTES);
$jon->message=$message;
echo json_encode($jon);
$message=str_replace("'","\'",$message);
$query="INSERT INTO frei_chat (frei_chat.from,frei_chat.from_name,frei_chat.to,frei_chat.to_name,frei_chat.message,sent) VALUES($usr_id,'$usr_name',$to,'$to_name','$message',NOW())";
$db->setQuery($query);
$result = $db->query();
}

else if($_REQUEST['freimode']=="getdata")
{
 $db =& JFactory::getDBO();
 $user =& JFactory::getUser();
 $usr_id=$user->get('id');
 $query="SELECT * FROM frei_chat WHERE frei_chat.to=$usr_id OR frei_chat.from=$usr_id" ;
 $db->setQuery($query);
 $jon->messages=$db->loadAssocList();
 $analyze=$jon->messages;
 $exist=false;
 foreach($analyze as $analyse){if($analyse==NULL){$exist=false;} else{$exist=true;}}
 $jon->exist=$exist;
 echo json_encode($jon);
}

else
{
 echo "Request Not Working!";
}

?>
