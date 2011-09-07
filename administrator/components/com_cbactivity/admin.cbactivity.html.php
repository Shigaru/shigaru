<?php
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

class HTML_cbactivity{

function listConfiguration($option, &$rows) {

		HTML_cbactivity::setConfigToolbar();

$p = getcwd();
$p = str_replace('/administrator','',$p);
$p = str_replace('\administrator','',$p);
//echo "Current folder is <b>$p</b>";

//<form action="<?php echo JPATH_COMPONENT.DS.'config.php'; " method="get" name="adminForm" target="_blank">
	?>

<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
	<?php
	$row = $rows[0];
	?>
  <tr><th colspan="3">SUPER ACTIVITY LOG SETTINGS</th></tr>
	<tr><td>Enable Activity Logging?</td><td colspan ="2">
  <input type="radio" name="log_enabled" value="1" <?php if ($row->log_enabled==1) { ?> checked="checked" <?php } ?> /> Yes
  <input type="radio" name="log_enabled" value="0" <?php if ($row->log_enabled==0) { ?> checked="checked" <?php } ?> /> No</td></tr>
  <tr><th colspan="3">SUPER ACTIVITY MODULE SETTINGS</th></tr>
	<tr><td>Use Real Name?</td><td>
  <input type="radio" name="viewname" value="1" <?php if ($row->viewname==1) { ?> checked="checked" <?php } ?> /> Yes
  <input type="radio" name="viewname" value="0" <?php if ($row->viewname==0) { ?> checked="checked" <?php } ?> /> No</td>
  <td>Use real names for your users? If not, usernames will be used.</td></tr>
	<tr><td>Use gender?</td><td>
  <input type="radio" name="showgender" value="1" <?php if ($row->showgender==1) { ?> checked="checked" <?php } ?> /> Yes
  <input type="radio" name="showgender" value="0" <?php if ($row->showgender==0) { ?> checked="checked" <?php } ?> /> No</td>
  <td>Select whether you use gender(male/female) in your site or not.</td></tr>
	<tr><td>Gender field name:</td><td><input type="text" name="cb_gender_field" value="<?php echo $row->cb_gender_field; ?>" /></td><td>Enter the field name that is right for your gender CB field. It will be taken into account, only if you use gender in your site. If you don't know what this is, better leave it alone (default:cb_gender)</td></tr>	
	<tr><td>Entry for male users:</td><td><input type="text" name="male" value="<?php echo $row->male; ?>" /></td><td>Enter the entry that is right for your cb_gender CB field. It will be taken into account, only if you use gender in your site. If you don't know what this is, better leave it alone (default:_UE_MALE)</td></tr>
	<tr><td>Entry for female users:</td><td><input type="text" name="female" value="<?php echo $row->female; ?>" /></td><td>Enter the entry that is right for your cb_gender CB field. It will be taken into account, only if you use gender in your site. If you don't know what this is, better leave it alone (default:_UE_FEMALE)</td></tr>
  <tr><th colspan="3">PHPBB3 SETTINGS</th></tr>
	<tr><td>Host:</td><td><input type="text" name="host" value="<?php echo $row->host; ?>" /></td><td>Enter host information. Default 'localhost'</td></tr>
	<tr><td>Databse:</td><td><input type="text" name="database" value="<?php echo $row->database; ?>" /></td><td>Enter name of database where phpBB3 is installed</td></tr>
	<tr><td>User:</td><td><input type="text" name="user" value="<?php echo $row->user; ?>" /></td><td>Enter username that has access to database</td></tr>
	<tr><td>Password:</td><td><input type="text" name="password" value="<?php echo $row->password; ?>" /></td><td>Enter user password that has access to database</td></tr>
	<tr><td>Prefix:</td><td><input type="text" name="prefix" value="<?php echo $row->prefix; ?>" /></td><td>Prefix of the phpBB3 database table</td></tr>
	<tr><td>BaseURL:</td><td><input type="text" name="baseurl" value="<?php echo $row->baseurl; ?>" /></td><td>Url of the forum</td></tr>
	<tr><td>Page:</td><td><input type="text" name="pagename" value="<?php echo $row->pagename; ?>" /></td><td>Page link. Default 'viewtopic.php'</td></tr>
	<tr><td>Forum ID tag:</td><td><input type="text" name="forumidtag" value="<?php echo $row->forumidtag; ?>" /></td><td>Forum id in querystring. Default 'f'</td></tr>
	<tr><td>Topic ID tag:</td><td><input type="text" name="topicidtag" value="<?php echo $row->topicidtag; ?>" /></td><td>Topic id in querystring. Default 't' (or 'p')</td></tr>
	<tr><td>Include admin's forums?</td><td>
  <input type="radio" name="admin" value="1" <?php if ($row->admin==1) { ?> checked="checked" <?php } ?> /> Yes
  <input type="radio" name="admin" value="0" <?php if ($row->admin==0) { ?> checked="checked" <?php } ?> /> No</td>
  <td>Show admin forums?</td></tr>
	<tr><td>Which forums to include?</td><td><input type="text" name="forums_include" value="<?php echo $row->forums_include; ?>" /></td><td>This filter will include only the forums in this list (seperated with comma)</td></tr>
	<tr><td>Which forums to exclude?</td><td><input type="text" name="forums_exclude" value="<?php echo $row->forums_exclude; ?>" /></td><td>This filter will exclude only the forums in this list (seperated with comma)</td></tr>

<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="configid" value=<?php echo $row->configid ?> />
<input type="hidden" name="boxchecked" value="0" />
</form> 

	</table>
	<?php
}


function listMessages( $option, &$rows, &$pageNav ) {
		HTML_cbactivity::setAllMessagesToolbar();
include "housekeeping.php";
?>
<form action="index.php" method="post" name="adminForm">
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
<tr>
<th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" /></th>
<th width="20">ID</th>
<th>Date</th>
<th width="20">userID</th>
<th>username</th>
<th>Name</th>
<th class="title" width="25%">Activity</th>
<th>Front-End Output</th>
</tr>

<?php
	$k = 0;
	for($i=0; $i < count( $rows ); $i++) {
	$row = $rows[$i];
   ?>
	<tr class="<?php echo "row$k"; ?>">
	<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);" /></td>
	<td><?php echo $row->id; ?></td>
	<td><?php echo $row->actidate; ?></td>
	<td><?php echo $row->userid; ?></td>
	<td><?php echo $row->username; ?></td>
	<td><?php echo $row->uname; ?></td>
	<td><?php echo $row->what; ?></td>
	<td><?php echo $row->output; ?></td>
	<?php $k = 1 - $k; ?>
	</tr>
<?php } ?>
<tfoot>
  <td colspan="8"><?php echo $pageNav->getListFooter(); ?></td>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form> 


<?php } 

	function setConfigToolbar()
	{
		JToolBarHelper::title('CB Super Activity Configuration', 'generic.png');
		JToolBarHelper::save('save');
		JToolBarHelper::cancel();
	}
	
	function setAllMessagesToolbar()
	{
		JToolBarHelper::title('CB Super Activity Log', 'generic.png');
		JToolBarHelper::deleteList();
	}

}

?>