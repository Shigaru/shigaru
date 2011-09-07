<?php
/**
 * JComments - Joomla Comment System
 *
 * Backend content viewer
 *
 * @version 2.0
 * @package JComments
 * @subpackage Admin
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project,
 * please make a reference to JComments someplace in your code
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class JCommentsAdminSubscriptionManager
{
	function show()
	{
		global $mainframe;

		$option = JCommentsInput::getParam($_REQUEST, 'option');

		$object_group = trim($mainframe->getUserStateFromRequest("fog{$option}", 'fog', ''));
		$object_id = intval($mainframe->getUserStateFromRequest("foid{$option}", 'foid', 0));
		$flang = trim($mainframe->getUserStateFromRequest("flang{$option}", 'flang', ''));
		$fauthor = trim($mainframe->getUserStateFromRequest("fauthor{$option}", 'fauthor', ''));
		$limit = intval($mainframe->getUserStateFromRequest("view{$option}limit", 'limit', $mainframe->getCfg('list_limit')));
		$limitstart = intval($mainframe->getUserStateFromRequest("view{$option}limitstart", 'limitstart', 0));

		$db = & JCommentsFactory::getDBO();

		$where = array();

		if ($object_group != '') {
			$where[] = 'js.object_group = "' . $object_group . '"';
		}

		if ($object_id != 0) {
			$where[] = 'js.object_id = ' . $object_id;
		}

		if ($flang != '') {
			$where[] = 'js.lang = "' . $flang . '"';
		}

		if (trim($fauthor) != '') {
			$where[] = 'js.name = "' . $fauthor . '"';
		}

		$query = "SELECT COUNT(*)"
			. "\nFROM #__jcomments_subscriptions AS js"
			. (count($where) ? ("\nWHERE " . implode(' AND ', $where)) : "" )
			;
		$db->setQuery($query);
		$total = $db->loadResult();

		if ( JCOMMENTS_JVERSION == '1.0' ) {
			require_once ($mainframe->getCfg('absolute_path') . DS . 'administrator' . DS . 'includes' . DS . 'pageNavigation.php');
			$lists['pageNav'] = new mosPageNav($total, $limitstart, $limit);
		} else {
			jimport('joomla.html.pagination');
			$lists['pageNav'] = new JPagination( $total, $limitstart, $limit );
		}

		$query = "SELECT js.*, u.name AS editor"
			. "\nFROM #__jcomments_subscriptions AS js"
			. "\n LEFT JOIN #__users AS u ON u.id = js.userid"
			. (count($where) ? ("\nWHERE " . implode(' AND ', $where)) : "" )
			. "\nORDER BY js.name DESC"
			;
		$db->setQuery( $query, $lists['pageNav']->limitstart, $lists['pageNav']->limit );
		$lists['rows'] = $db->loadObjectList();

		// Filter by object_group (component)
		$query = "SELECT DISTINCT(object_group) AS name, object_group AS value "
			. "\nFROM #__jcomments_subscriptions"
			. "\nORDER BY name"
			;
		$db->setQuery($query);
		$rows = $db->loadObjectList();

		$cnt = count($rows);

		if ($cnt > 1 || ($cnt == 1 && $total = 0)) {
			array_unshift($rows, JCommentsHTML::makeOption('', JText::_('A_FILTER_ALL_COMPONENTS'), 'name', 'value'));
			$lists['fog'] = JCommentsHTML::selectList($rows, 'fog', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'name', 'value', $object_group);
		} else if ($cnt == 1) {
			if ($object_group == '') {
				$object_group = $rows[0]->name;
			}
		}
		unset($rows);

		if ($object_group != '') {
			$query = "SELECT DISTINCT(object_id) AS value "
				. "\nFROM #__jcomments_subscriptions "
				. "\nWHERE object_group = '" . $object_group . "'"
				. (($flang != '') ? "AND lang = '" . $flang . "'" : "")
				;
			$db->setQuery($query);
			$rows = $db->loadObjectList();

			for ($i = 0, $n = count($rows); $i < $n; $i++) {
				$rows[$i]->name = JCommentsObjectHelper::getTitle($rows[$i]->value, $object_group);
				if ($rows[$i]->name == '') {
					$rows[$i]->name = 'Untitled' . $rows[$i]->value;
				}
			}

			if (count($rows) > 0) {
				usort($rows, create_function('$a, $b', 'return strcasecmp( $a->name, $b->name);'));
				array_unshift($rows, JCommentsHTML::makeOption('', '', 'name', 'value'));
				$lists['foid'] = JCommentsHTML::selectList($rows, 'foid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'name', $object_id);
				unset($rows);
			}
		}

		// Filter by language
		$query = "SELECT DISTINCT(lang) AS text, lang AS value "
			. "\nFROM #__jcomments_subscriptions"
			. "\nORDER BY lang"
			;
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		if (count($rows) > 1) {
			array_unshift($rows, JCommentsHTML::makeOption('', '', 'text', 'value'));
			$lists['flang'] = JCommentsHTML::selectList($rows, 'flang', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'text', 'value', $flang);
		}
		unset($rows);

		// Filter by author
		$query = "SELECT DISTINCT(name) AS author, name AS value "
			. "\nFROM #__jcomments_subscriptions"
			. "\nORDER BY name"
			;
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		if (count($rows) > 1) {
			array_unshift($rows, JCommentsHTML::makeOption('', JText::_('A_FILTER_ALL_AUTHORS'), 'author', 'value'));
			$lists['fauthor'] = JCommentsHTML::selectList($rows, 'fauthor', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'author', 'value', $fauthor);
		}
		unset($rows);

		HTML_JCommentsAdminSubscriptionManager::show($lists);
	}

	function edit()
	{
		global $my, $mainframe;

		$id = JCommentsInput::getParam($_REQUEST, 'cid', 0);
		if (is_array($id)) {
			$id = $id[0];
		}

		$db = & JCommentsFactory::getDBO();

		require_once (JCOMMENTS_BASE . DS . 'jcomments.subscription.php');

		$row = new JCommentsSubscriptionsDB($db);
		if ($row->load($id)) {
			$row->object_title = JCommentsObjectHelper::getTitle($row->object_id, $row->object_group);
			$row->link = $mainframe->getCfg('live_site') . '/' . JCOMMENTS_INDEX . '?option=com_jcomments&task=go2object&object_id=' . $row->object_id . '&object_group=' . $row->object_group . '&no_html=1';

			HTML_JCommentsAdminSubscriptionManager::edit($row);
		} else {
			JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=subscriptions');
		}
	}

	function save()
	{
		$task = JCommentsInput::getParam($_REQUEST, 'task');

		$bbcode = & JCommentsFactory::getBBCode();
		$db = & JCommentsFactory::getDBO();

		require_once (JCOMMENTS_BASE . DS . 'jcomments.subscription.php');

		$row = new JCommentsSubscriptionsDB($db);
		$row->bind($_POST);
		$row->store();

		JCommentsCache::cleanCache('com_jcomments');

		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=subscriptions');
	}

	function publish( $publish )
	{
		$id = JCommentsInput::getParam($_REQUEST, 'cid', array());

		if (is_array($id) && (count($id) > 0)) {
			$ids = implode(',', $id);

			$db = & JCommentsFactory::getDBO();
			$db->setQuery("UPDATE #__jcomments_subscriptions SET published='$publish' WHERE id IN ($ids)");
			$db->query();
		}
		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=subscriptions');
	}

	function cancel()
	{
		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=subscriptions');
	}

	function remove()
	{
		$id = JCommentsInput::getParam($_REQUEST, 'cid', array());

		if (is_array($id) && (count($id) > 0)) {
			$ids = implode(',', $id);

			$db = & JCommentsFactory::getDBO();
			$db->setQuery("DELETE FROM #__jcomments_subscriptions WHERE id IN ($ids)");
			$db->query();
			JCommentsCache::cleanCache('com_jcomments');
		}
		JCommentsRedirect(JCOMMENTS_INDEX . '?option=com_jcomments&task=subscriptions');
	}
}

class HTML_JCommentsAdminSubscriptionManager
{
	function show( $lists )
	{
		global $mainframe, $my;

		if (JCOMMENTS_JVERSION == '1.0') {
			mosCommonHTML::loadOverlib();
		} else if (JCOMMENTS_JVERSION == '1.5') {
			if ( !$mainframe->get( 'loadOverlib' ) ) {
?>
<script type="text/javascript"
	src="<?php echo $mainframe->getCfg( 'live_site' );?>/includes/js/overlib_mini.js"></script>
<script type="text/javascript"
	src="<?php echo $mainframe->getCfg( 'live_site' );?>/includes/js/overlib_hideform_mini.js"></script>
<?php
				$mainframe->set( 'loadOverlib', true );
			}
		}
?>
<form action="<?php echo JCOMMENTS_INDEX; ?>" method="post" name="adminForm">
<table class="adminheading">
	<tr>
<?php
		if ( JCOMMENTS_JVERSION == '1.0' ) {
?>
	<th style="background-image: none; padding: 0;"><img src="./components/com_jcomments/images/subscriptions48x48.png" width="48" height="48" align="middle" />&nbsp;<?php echo JText::_('A_SUBSCRIPTIONS'); ?></th>
<?php
		}
?>
	<td nowrap="nowrap" align="right">

<?php
		$filter = '';

		if (isset($lists['fog'])) {
			$filter .= ' ' . $lists['fog'];
		}
		if (isset($lists['flang'])) {
			$filter .= ' ' . $lists['flang'];
		}
		if (isset($lists['foid'])) {
			$filter .= ' ' . $lists['foid'];
		}
		if (isset($lists['fauthor'])) {
			$filter .= ' ' . $lists['fauthor'];
		}
		if (trim($filter) != '') {
			echo JText::_('A_FILTER') . ':' . $filter;
		}
		?>
	</td>
	</tr>
</table>
<table class="adminlist" cellspacing="1">
	<thead>
		<tr>
			<th width="2%" class="title">#</th>
			<th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $lists['rows'] );?>);" /></th>
			<th width="25%" align="left" nowrap="nowrap"><?php echo JText::_('Name'); ?></th>
			<th width="35%" class="title"><?php echo JText::_('E-mail'); ?></th>
			<th width="35%" align="left"><?php echo JText::_('A_COMMENT_TITLE'); ?></th>
			<th width="5%" align="left"><?php echo JText::_('A_COMPONENT'); ?></th>
			<th width="5%"><?php echo JText::_('State'); ?></th>
		</tr>
	</thead>
	<tbody>
<?php
		for ($i = 0, $k = 0, $n = count($lists['rows']); $i < $n; $i++) {
			$row =& $lists['rows'][$i];
			$task = $row->published ? 'subscription.unpublish' : 'subscription.publish';
			$img = $row->published ? 'tick.png' : 'publish_x.png';

			$row->title = JCommentsObjectHelper::getTitle( $row->object_id, $row->object_group );
			$row->link = $mainframe->getCfg('live_site') . '/' . JCOMMENTS_INDEX . '?option=com_jcomments&task=go2object&object_id=' . $row->object_id . '&object_group=' . $row->object_group . '&no_html=1';

			$link 	= JCOMMENTS_INDEX . '?option=com_jcomments&task=subscription.edit&hidemainmenu=1&cid='. $row->id;
			$link_title = (JCOMMENTS_JVERSION == '1.5') ? JText::_('Edit') : _E_EDIT;
?>
<tr class="<?php echo "row$k"; ?>">
	<td><?php echo $i+1+$lists['pageNav']->limitstart;?></td>
	<td width="20"><input type="checkbox" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);" /></td>
	<td align="left"><a href="<?php echo $link; ?>" title="<?php echo $link_title; ?>"><?php echo $row->name; ?></a></td>
	<td align="left"><?php echo $row->email; ?></td>
	<td align="left"><a href="<?php echo $row->link; ?>" title="<?php echo htmlspecialchars($row->title); ?>" target="_blank"><?php echo $row->title; ?></a></td>
	<td align="left">[<?php echo $row->object_group; ?>]</td>
	<td align="center"><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')"><img src="images/<?php echo $img;?>" border="0" alt="<?php echo ($row->published ? JText::_('A_DISABLE') : JText::_('A_ENABLE')); ?>" /></a></td>
</tr>
<?php
			$k = 1 - $k;
		}
?>
</tbody>
	<tfoot>
		<tr>
			<td colspan="15"><?php echo $lists['pageNav']->getListFooter(); ?></td>
		</tr>
	</tfoot>
</table>
<input type="hidden" name="option" value="com_jcomments" />
<input type="hidden" name="task" value="subscriptions" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="hidemainmenu" value="0" /></form>
<?php
	}

	function edit( $row )
	{
?>
<style>
.editbox {border: 1px solid #ccc;padding: 2px;}
.short {width: 40px;}
.long {width: 450px;}
</style>
<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton) {
	var form = document.adminForm;
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
	if ( form.email.value == "" ) {
		alert( "<?php echo JText::_('ERROR_EMPTY_EMAIL'); ?>" );
	} else {
		submitform( pressbutton );
	}
}
//-->
</script>
<form action="<?php echo JCOMMENTS_INDEX; ?>" method="post" name="adminForm">
<?php
		if ( JCOMMENTS_JVERSION == '1.0' ) {
?>
<table class="adminheading">
	<tr>
		<th style="background-image: none; padding: 0;"><img src="./components/com_jcomments/images/subscriptions48x48" width="48" height="48" align="middle">&nbsp;<?php echo JText::_('EDIT');?></th>
	</tr>
</table>
<?php
		}
?>
<table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
<?php
		if ($row->email != '') {
?>
	<tr valign="top" align="left">
		<td><?php echo JText::_('E-mail'); ?></td>
		<td><input type="text" class="editbox long" size="35" name="email"
			value="<?php echo $row->email; ?>"></td>
	</tr>
<?php
		}
?>
	<tr valign="top" align="left">
		<td><?php echo JText::_('State'); ?></td>
		<td><?php echo JCommentsHTML::yesnoRadioList( 'published', 'class="inputbox"', $row->published, JText::_('A_YES'), JText::_('A_NO') ); ?></td>
	</tr>
</table>
<input type="hidden" name="option" value="com_jcomments" /> <input
	type="hidden" name="id" value="<?php echo $row->id; ?>" /> <input
	type="hidden" name="task" value="" /></form>
<?php
	}

}
?>