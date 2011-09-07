<?php
/**
 * JComments - Joomla Comment System
 *
 * Backend latest comment module
 *
 * @version 1.4
 * @package JComments
 * @filename mod_jcomments_latest_adm.php
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2008 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project, 
 * please make a reference to JComments someplace in your code 
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

// define directory separator short constant
if (!defined( 'DS' )) {
	define( 'DS', DIRECTORY_SEPARATOR );
}

if (file_exists( JPATH_ROOT.DS.'components'.DS.'com_jcomments'.DS.'jcomments.php' )) {
	require_once( JPATH_ROOT.DS.'components'.DS.'com_jcomments'.DS.'jcomments.php' );
} else {
	return;
}

$db =& JFactory::getDBO();
$db->setQuery( "SELECT * FROM #__jcomments ORDER BY date DESC", 0, 10 );
$rows = $db->loadObjectList();
?>
<table class="adminlist">
<?php
if (count($rows))
{
?>
<tr>
	<td class="title">
		<strong><?php echo JText::_( 'Latest comment' ); ?></strong>
	</td>
	<td class="title">
		<strong><?php echo JText::_( 'Created' ); ?></strong>
	</td>
	<td class="title">
		<strong><?php echo JText::_( 'Author' ); ?></strong>
	</td>
</tr>
<?php
	foreach ($rows as $row)
	{
		$row->comment = JCommentsText::cleanText($row->comment);
		$row->comment = JCommentsText::substr($row->comment, 200);
		$link = 'index2.php?option=com_jcomments&task=edit&hidemainmenu=1&cid='. $row->id;
?>
<tr>
	<td>
		<a href="<?php echo $link; ?>"><?php echo $row->comment; ?></a>
	</td>
	<td>
		<?php echo $row->date; ?>
	</td>
	<td>
		<?php echo $row->name; ?>
	</td>
</tr>
<?php
	}
}
else
{
?>
<tr>
	<td colspan="3">
		<?php echo JText::_( 'No matching results' );?>
	</td>
</tr>
<?php
}
?>
</table>