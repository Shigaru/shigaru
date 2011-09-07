<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.plugin.plugin');

class plgUserJComments extends JPlugin
{
	function plgUserJComments(& $subject, $config) {
		parent::__construct($subject, $config);
	}

	function onAfterStoreUser($user, $isnew, $success, $msg)
	{
		if ($success && !$isnew)
		{
			$db =& JFactory::getDBO();

			// update name, username & email in comments
			$query = "UPDATE #__jcomments"
				. "\nSET name = " . $db->Quote($user['name']) 
				. "\n, username = " . $db->Quote($user['username']) 
				. "\n, email = " . $db->Quote($user['email']) 
				. "\nWHERE userid = " . $db->Quote($user['id'])
				;

			$db->setQuery($query);
			$db->Query();

			// update email in comments subscriptions
			$query = "UPDATE #__jcomments_subscriptions"
				. "\nSET email = " . $db->Quote($user['email'])
				. "\nWHERE userid = " . $db->Quote($user['id'])
				;

			$db->setQuery($query);
			$db->Query();
		}
	}

	function onAfterDeleteUser($user, $succes, $msg)
	{
		if(!$succes) {
			return false;
		}

		$db =& JFactory::getDBO();
		$db->setQuery('DELETE FROM #__jcomments_subscriptions WHERE userid = '.$db->Quote($user['id']));
		$db->Query();

		return true;
	}
}