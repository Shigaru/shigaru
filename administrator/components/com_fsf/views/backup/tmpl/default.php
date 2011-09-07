<?php
/**
* @Copyright Freestyle Joomla (C) 2010
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*     
* This file is part of Freestyle Support Portal
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
?>
<?php defined('_JEXEC') or die('Restricted access'); ?>

<h1>Update Database</h1>
<a href='<?php echo JRoute::_("index.php?option=com_fsf&view=backup&task=updatedb"); ?>'>Update database now</a>

<h1>Backup Database</h1>
<a href='<?php echo JRoute::_("index.php?option=com_fsf&view=backup&task=backup"); ?>'>Download backup now</a>

<h1>Restore Database</h1>
<div style="color:red; font-size:150%">Please  Note: The will overwrite and existing data for Freestyle FAQs Lite</div>
<form action="<?php echo JRoute::_("index.php?option=com_fsf&view=backup&task=restore"); ?>"  method="post" name="adminForm" id="adminForm" enctype="multipart/form-data"></::>
<input type="file" id="filedata" name="filedata" /><input type="submit" name="Restore" value="Restore">
</form>