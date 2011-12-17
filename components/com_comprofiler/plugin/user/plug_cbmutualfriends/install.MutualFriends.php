<?php
/**
* Joomla Community Builder User Plugin: plug_cbMutualFriends
* @version $Id$
* @package plug_cbMutualFriends
* @subpackage install.MutualFriends.php
* @coding by Clavib Tech Team
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/
function plug_cb_MutualFriends_install(){
	global $mosConfig_absolute_path;
	# Show installation result to user
  	?>
	<center>
		<table width="100%" border="0">
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><br />Copyright 2009 AXXIS Internet Solutions. </td>
			</tr>
			<tr>
				<td background="F0F0F0" colspan="2"><code>Installation Process:<br />        
				<font color="green"><b>Installation finished.</b></font></code>
				</td>
			</tr>
		</table>
	</center>
	<?php
	return "";
}
?>