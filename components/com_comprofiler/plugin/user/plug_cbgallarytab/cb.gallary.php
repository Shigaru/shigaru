<?php
/**
* Author Tab Class for handling the CB tab api
* @version $Id: cb.authortab.php 1352 2011-01-24 23:01:41Z beat $
* @package Community Builder
* @subpackage cb.authortab.php
* @author JoomlaJoe
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

// ensure this file is being included by a parent file
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }


class getgallaryTab extends cbTabHandler {
	
	function  getgallaryTab() {$this->cbTabHandler();
	
 	}
	function getDisplayTab($tab,$user,$ui) {
	//print_r($user); 
		global $_CB_framework, $_CB_database, $mainframe;
	 ob_start();
	 ?>
	 <script src="<?php echo JURI::root().'components/com_comprofiler/js/';?>thickbox.js" type="text/javascript" language="javascript"></script>
	 <link rel="stylesheet" href="<?php echo JURI::root().'components/com_comprofiler/js/';?>ThickBox.css" type="text/css" />
	 
	 <?php
	
	 ?>
	 
	<TABLE width="100%" cellpadding="0" cellspacing="10" border="0">
	<TR>
	<TD><?PHP 
	?>
	</TD>
	</TR>
	<TR >
	<TD colspan="2">
	
	<?php 	
	
	  $userd = JFactory::getUser();
$loginUserId = (int) $userd->get('id');
 	if(isset($_FILES['filename']) &&  $loginUserId==$user->user_id ){ jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
 
//this is the name of the field in the html form, filedata is the default name for swfupload
//so we will leave it as that

$fieldName = 'filename';
 
//any errors the server registered on uploading
$fileError = $_FILES[$fieldName]['error'];
if ($fileError > 0) 
{
        switch ($fileError) 
        {
        case 1:
        echo JText::_( 'FILE TO LARGE THAN PHP INI ALLOWS' );
        break;
 
        case 2:
        echo JText::_( 'FILE TO LARGE THAN HTML FORM ALLOWS' );
        break;
 
        case 3:
        echo JText::_( 'ERROR PARTIAL UPLOAD' );
        break;
 
        case 4:
        //echo JText::_( 'ERROR NO FILE' );
        break;
        }
}
 else {
 
//check for filesize
$fileSize = $_FILES[$fieldName]['size'];
if($fileSize > 2000000)
{
    echo JText::_( 'FILE BIGGER THAN 2MB' );
}
 
//check the file extension is ok
$fileName = $_FILES[$fieldName]['name'];

$uploadedFileNameParts = explode('.',$fileName);
$uploadedFileExtension = array_pop($uploadedFileNameParts);
 
$validFileExts = explode(',', 'jpeg,jpg,png,gif');
 
//assume the extension is false until we know its ok
$extOk = false;
 
//go through every ok extension, if the ok extension matches the file extension (case insensitive)
//then the file extension is ok
foreach($validFileExts as $key => $value)
{
        if( preg_match("/$value/i", $uploadedFileExtension ) )
        {
                $extOk = true;
        }
}
 
if ($extOk == false) 
{
        echo JText::_( 'INVALID EXTENSION' );
        //return;
}
 
//the name of the file in PHP's temp directory that we are going to move to our folder
$fileTemp = $_FILES[$fieldName]['tmp_name'];
 
//for security purposes, we will also do a getimagesize on the temp file (before we have moved it 
//to the folder) to check the MIME type of the file, and whether it has a width and height
$imageinfo = getimagesize($fileTemp);
 
//we are going to define what file extensions/MIMEs are ok, and only let these ones in (whitelisting), rather than try to scan for bad
//types, where we might miss one (whitelisting is always better than blacklisting) 
$okMIMETypes = 'image/jpeg,image/pjpeg,image/png,image/x-png,image/gif';
$validFileTypes = explode(",", $okMIMETypes);           
 
//if the temp file does not have a width or a height, or it has a non ok MIME, return
if( !is_int($imageinfo[0]) || !is_int($imageinfo[1]) ||  !in_array($imageinfo['mime'], $validFileTypes) )
{
        //echo JText::_( 'INVALID FILETYPE' );
       // return;
}

//lose any special characters in the filename
$fileName = time().ereg_replace("[^A-Za-z0-9.]", "-", $fileName);
 
//always use constants when making file paths, to avoid the possibilty of remote file inclusion
//$uploadPath = JPATH_SITE.DS.'images'.DS.'stories'.DS.$fileName;
 
  $uploadPath = JPATH_SITE.DS.'components'.DS.'com_comprofiler'.DS.'images'.DS.$fileName;

	//echo $uploadPath;
 

if(!JFile::upload($fileTemp, $uploadPath)) 
{
        echo JText::_( 'ERROR MOVING FILE' );
         
}
else
{
   // success, exit with code 0 for Mac users, otherwise they receive an IO Error
   //echo JText::_( 'Succefully Uploaded ' );
 }
    
  
 }


}  
//print_r($_REQUEST);
//print_r($_FILES);
   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['title'])){

   $tittle=$_POST['title'];
   if(isset($_FILES['filename']['name']))
 	{	  $filename=$_FILES['filename']['name']; 
		  // $filename=$_FILES['filename']; 
	}
   $description=$_POST['description'];
 
  // $location=$_POST['location'];
   
   }
   
$db =& JFactory::getDBO();
//print_r($_POST);

if(isset($_POST['delete']))
	{
	$db =& JFactory::getDBO();
	
	$selectq="SELECT * FROM #__cb_gallary WHERE `id` = '".$_POST['Id']."' ";	
	$_CB_database->setQuery( $selectq );
		$listitems = $_CB_database->loadObjectList();
		$dirPath = JPATH_SITE.DS.'components'.DS.'com_comprofiler'.DS.'images'.DS;	
		if($listitems[0]->fileName!='')			
		{	unlink($dirPath.$listitems[0]->fileName);	}
	
	$delete ="DELETE FROM #__cb_gallary WHERE `Id` = ".$_POST['Id']."";
	//echo $delete;
	$db->setQuery( $delete );
	$result = $db->query();
	
	}

	/*echo $_FILES['filename']['name'];
	$filename23=$_FILES['filename']['name'];
	echo $filename23;*/

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['newid']) && $_POST['newid']== '' && $_REQUEST['phototype']=='gallary')
{ if(!isset($fileName)){	$fileName='';	}
	
	//echo 'insert';
   $insert="insert into #__cb_gallary
 (`title`,`description`,`fileName`,`uploadBy`,`date`)
 values('$tittle','$description','$fileName','$loginUserId',now()) ";
 
// echo $insert;
 $db->setQuery($insert);
 
  //echo "ubsert";
$result = $db->query();
}
else if(isset($_POST['newid']) &&  $_POST['newid']>0 && $_REQUEST['phototype']=='gallary')
{
	$status=0;
  //print_r($_SERVER);
  //print_r($_FILES);  
	//print_r($_POST['filename']);
  if(!isset($fileName)  ||  empty($fileName)){
//echo 'not change picture';
//echo "<br/>";
 $fileName=$_REQUEST['dfile'];
 $status=1;

}

 //echo 'update';
 //echo $fileName;
	$selectq="SELECT * FROM #__cb_gallary WHERE `id` = '".$_POST['newid']."' ";	
	$_CB_database->setQuery( $selectq );
		$listitems = $_CB_database->loadObjectList();
		$dirPath = JPATH_SITE.DS.'components'.DS.'com_comprofiler'.DS.'images'.DS;
		if($listitems[0]->fileName!='' && $status==0 )
		{	unlink($dirPath.$listitems[0]->fileName);	}
	
	$update="UPDATE #__cb_gallary SET `title`='$tittle', `description`='$description', `fileName`='$fileName',`date` =now() WHERE `id` = '".$_POST['newid']."'";
	
	 //echo $update;
 	
	$db->setQuery($update);
 
	$result = $db->query();
}

   $select="select  * from  #__cb_gallary where `uploadBy`='".$user->user_id."'";
  $_CB_database->setQuery( $select );
		$items = $_CB_database->loadObjectList();

 if($loginUserId==$user->user_id){
 
 $id='';
 $name='';
 $filename='';
 $desc='';
 //$location='';
 //$address='';
  if(isset($_POST['editid']))
  {
  	//echo 'edit';
		
	$select="select  * from  #__cb_gallary
	where `id`='".$_POST['editid']."'";
	//echo $select;
	$_CB_database->setQuery( $select );
	$item1 = $_CB_database->loadObjectList();
	 //print_r($items);
	$item=$item1[0];
	
	
	$id=$item->id;
	$name=$item->title;
	$filename=$item->fileName;
	$desc=$item->description;
	$date=$item->date;
	//$location=$item->location;
	//$address=$item->address;
 
 $select1="select  * from  #__cb_gallary where `uploadBy`='".$user->user_id."'";
 $_CB_database->setQuery( $select1 );
		$items= $_CB_database->loadObjectList();
 
  }


 	?>
		<form name="upload" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<input type="hidden" name="tab" value="<?php echo $tab->tabid;?>" />
	<table width="99%" cellpadding="5" cellspacing="10" border="0">

	<tr>
	<td>Tittle :</td>
	<td><input type="text"  name="title" value="<?php echo $name; ?>" />	
	</td>
	</tr>
	
	<tr>
	<td>Picture :</td>
	<td><input type="file"  name="filename" value="" />
	<?php echo $filename; ?>
		<input type="hidden" name="dfile" value="<?php echo $filename; ?>" />	
	</td>
	</tr>	
 	<tr>
	<td>Description :</td>
	<td>	
	<textarea name="description"><?php echo $desc;?></textarea>
	</td>
	</tr>
	<!--<tr>
	<td>Location :</td>
	<td><input type="text"  name="location" value="<?php  echo $location; ?>" />	
	</td>
	</tr>-->
	
	<tr>
	<td colspan="2">
 <input type="hidden" name="newid" value="<?php if(isset($_POST['editid'])){echo $_POST['editid']; }?>"/>
  <input type="hidden" name="phototype" value="gallary" />

	<input type="submit" value="Save" name="submit" />
	</td>
	</tr>
	</table>
	</form>
	 
	<?php 
	}
	//print_r($_POST);
	
	
	?>
	</TD>
	</TR>
	<?php foreach($items as $key=>$value){
	//print_r($value);
	?>
<TR style="border:1px solid #eee; padding:7px;">
<TD >

<div style="font:left;width:100%">
<img src="<?php echo  JURI::root(); ?>components/com_comprofiler/images/<?php echo $value->fileName; ?>" width="100" />
<!--<a href="<?php echo  JURI::root(); ?>components/com_comprofiler/images/<?php // echo $value->fileName; ?>" class="thickbox"> view </a>-->
</div>
</td>
<td>
<div style="font:left;width:100%" >
<b>Title: <?php echo $value->title; ?></b>
</div>
<div style="font:left;width:100%">
On <?php echo $value->date; ?>
</div>
<div style="font:left;width:100%">
<?php echo $value->description; ?>
</div>
<!--<div style="font:left;width:100%">
Location: <?php //echo $value->location; ?>
</div>-->

	</td>
 <?php if($loginUserId==$user->user_id){ ?>	
	<td>
		<form name="delete" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>"><input type="hidden" name="tab" value="<?php echo $tab->tabid;?>" /><input type="submit" value="Delete" name="delete" /><input type="hidden" name="Id" value="<?php echo $value->id; ?>"/>	
	 </form>
	 <form name="edit" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>"><input type="hidden" name="tab" value="<?php echo $tab->tabid;?>" /><input type="submit" value="Edit" name="submit" /><input type="hidden" name="editid" value="<?php echo $value->id; ?>"/></form>
	</TD>
<?php } ?>
	</TR>
	 
	<?php 
	}
	?>
	
	</TABLE>
	 <?php 
	 $d=ob_get_contents();
	 ob_end_clean();
	 
	 return $d;
	}
	 
}	// end class getAuthorTab.
?>