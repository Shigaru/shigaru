<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
JToolBarHelper::title( JText::_( 'FreiChat' ), 'generic.png' );
///////////////////////////////////////--Functions--//////////////////////
function change_param($name,$files,$value)
{
if(isset($_POST[$name])==true)
{
foreach($files as $file)
{
$file_path=JRoute::_("../".$file);

 $fp=fopen($file_path,"r+");
 $fps=fread($fp,8192);
 $values=null;
  foreach($value as $val)
  {
	if(strpos($fps,"\$".$name."='".$val."';")==true)
	 {
	  $values=$val;
	 }
  	
   else {}
  }
	 $contents=file_get_contents($file_path,true);
	 $new_contents = str_replace("\$".$name."='".$values."';", "\$".$name."='".$_POST[$name]."';", $contents);
	 file_put_contents($file_path, $new_contents);  
}
$fp=fclose($fp);
}
}
////////////////////////////////////////////////////////////////////////////
function default_param($name,$files,$value)
{ 
$selected=false;
foreach($files as $file)
{
$handle=JRoute::_("../".$file);
$fp=fopen($handle,"r+");
$fps=fread($fp,8192);
if(strpos($fps,"\$".$name."='".$value."';")==true)
 {
  $selected=true;
 }
else {}
var_dump($fp);
}
if($selected==true)
{
echo "selected";
}
$fp=fclose($fp);
}
///////////////////////////////////////File Paths/////////////////////////////////
$file1="modules/mod_freichat/mod_freichat.php";
$file2="components/com_freichat/freichat.php";
///////////////////////////////Functions Called///////////////////////////////////
change_param("show_name",array($file1,$file2),array("username","name"));
change_param("draggable",array($file1),array("enable","disable"));
change_param("show_module",array($file1),array("visible","hidden"));
change_param("load",array($file1),array("show","hide"));
change_param("color",array($file1),array("red","blue","green","yellow"));
change_param("time",array($file2),array("600","3600","36000","86400"));
change_param("chatspeed",array($file1),array("7000","5000","3000","1000"));
change_param("css",array($file1),array("red","green","blue","yellow"));
////////////////////////////////////////////////////////////////////////
?>
<b>FreiChat Parameters</b>

<form name="params" action="<?php JRoute::_("administrator/components/com_freichat/admin.freichat.php") ?>" method="POST">

<p>1. Show Username or Nickname</p></br> 
<select name="show_name">
<option value="username"<?php default_param("show_name",array($file2,$file1),"username"); ?>>username</option>
<option value="name"<?php default_param("show_name",array($file2,$file1),"name"); ?>>nickname</option>
</select>
<br/><br/>
<p>2. Show Online Friends Module</p>
<select name="show_module">
<option value="visible"<?php default_param("show_module",array($file1),"visible"); ?>>Yes</option>
<option value="hidden"<?php default_param("show_module",array($file1),"hidden"); ?>>No</option>
</select>
<br/><br/>
<p>3. Save Message History For</p></br> 
<select name="time">
<option value="600"<?php default_param("time",array($file2),"600"); ?>>10 Minutes</option>
<option value="3600"<?php default_param("time",array($file2),"3600"); ?>>1 Hour</option>
<option value="36000"<?php default_param("time",array($file2),"36000"); ?>>10 Hours</option>
<option value="86400"<?php default_param("time",array($file2),"86400"); ?>>1 Day</option>
</select>
<br/><br/>
<p>4. Change Chat Speed to</p></br> 
<select name="chatspeed">
<option value="7000"<?php default_param("chatspeed",array($file1),"7000"); ?>>Slow</option>
<option value="5000"<?php default_param("chatspeed",array($file1),"5000"); ?>>Normal</option>
<option value="3000"<?php default_param("chatspeed",array($file1),"3000"); ?>>Fast</option>
<option value="1000"<?php default_param("chatspeed",array($file1),"1000"); ?>>SuperFast</option>
</select><br/><br/>
Note:<br/>
1. Normal speed recommended for users using free webhosting service.<br/>
2. Fast speed can be used by users using any paid webhosting service.<br/>
3. SuperFast speed should be used by users at their own risk and needs.<br/>
<br/><br/>
<p>5. Choose any colour for your chat buttons</p></br> 
<select name="color">
<option value="red"<?php default_param("color",array($file1),"red"); ?>>Red</option>
<option value="blue"<?php default_param("color",array($file1),"blue"); ?>>Blue</option>
<option value="green"<?php default_param("color",array($file1),"green"); ?>>Green</option>
<option value="yellow"<?php default_param("color",array($file1),"yellow"); ?>>Yellow</option>
</select>
<br/><br/>
<br/><br/>
<p>6. Choose any background colour for your chat</p></br> 
<select name="css">
<option value="red"<?php default_param("css",array($file1),"red"); ?>>Red</option>
<option value="blue"<?php default_param("css",array($file1),"blue"); ?>>Blue</option>
<option value="green"<?php default_param("css",array($file1),"green"); ?>>Green</option>
<option value="yellow"<?php default_param("css",array($file1),"yellow"); ?>>Yellow</option>
</select>
<br/><br/>
<p>7. Draggable Functionality</p>
<select name="draggable">
<option value="enable"<?php default_param("draggable",array($file1),"enable"); ?>>Enabled</option>
<option value="disable"<?php default_param("draggable",array($file1),"disable"); ?>>Disabled</option>
</select>
<br/><br/>
<p>8. ChatBox on load should be</p>
<select name="load">
<option value="show"<?php default_param("load",array($file1),"show"); ?>>Maximized</option>
<option value="hide"<?php default_param("load",array($file1),"hide"); ?>>Minimized</option>
</select>
<br/><br/><br/>
<input type="submit" value="Submit">
</form>