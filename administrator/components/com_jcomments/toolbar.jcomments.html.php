<?php
/**
 * JComments - Joomla Comment System
 *
 * Backend toolbar viewer
 *
 * @version 2.0
 * @package JComments
 * @subpackage	Admin
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project, 
 * please make a reference to JComments someplace in your code 
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') or defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class menucomments
{
	function IMPORT_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('A_IMPORT'), 'jcomments-import');
			JToolBarHelper::cancel();
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::cancel();
			mosMenuBar::spacer();
			mosMenuBar::endTable();
		}
	}

	function CONFIG_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('A_SETTINGS'), 'jcomments-settings');
			JToolBarHelper::custom('savesettings', 'save.png', 'save_f2.png', JText::_('A_SAVE'), false);
		} else {
			mosMenuBar::startTable();
			mosMenuBar::save('savesettings', JText::_('A_SAVE'));
			mosMenuBar::spacer();
			mosMenuBar::cancel();
			mosMenuBar::spacer();
			mosMenuBar::endTable();
		}
	}

	function SMILES_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('A_SMILES'), 'jcomments-smiles');
			JToolBarHelper::custom('savesmiles', 'save.png', 'save_f2.png', JText::_('A_SAVE'), false);
			JToolBarHelper::cancel();
		} else {
			mosMenuBar::startTable();
			mosMenuBar::save('savesmiles', JText::_('A_SAVE'));
			mosMenuBar::spacer();
			mosMenuBar::cancel();
			mosMenuBar::spacer();
			mosMenuBar::endTable();
		}
	}

	function POSTINSTALL_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.0') {
			mosMenuBar::startTable();
			mosMenuBar::custom('settings', 'next.png', 'next_f2.png', JText::_('AI_NEXT'), false);
			mosMenuBar::endTable();
		}
	}

	function SYSINFO_MENU()
	{
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function ABOUT_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('AI_MENU_ABOUT'), 'jcomments-logo');
			JToolBarHelper::cancel();
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::cancel();
			mosMenuBar::spacer();
			mosMenuBar::endTable();
		}
	}

	function VIEW_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('AI_MENU_COMMENTS'), 'jcomments-logo');
			JToolBarHelper::publishList();
			JToolBarHelper::unpublishList();
			JToolBarHelper::editList();
			JToolBarHelper::deleteList();
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::publishList();
			mosMenuBar::spacer();
			mosMenuBar::unpublishList();
			mosMenuBar::spacer();
			mosMenuBar::editList();
			mosMenuBar::spacer();
			mosMenuBar::deleteList();
			mosMenuBar::endTable();
		}
	}

	function EDIT_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('EDIT'), 'jcomments-logo');
			JToolBarHelper::save();
			JToolBarHelper::apply();
			JToolBarHelper::cancel();
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::save();
			mosMenuBar::spacer();
			mosMenuBar::apply();
			mosMenuBar::spacer();
			mosMenuBar::cancel();
			mosMenuBar::endTable();
		}
	}

	function SUBSCRIPTIONS_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('A_SUBSCRIPTIONS'), 'jcomments-subscriptions');
			JToolBarHelper::publishList('subscription.publish', JText::_('A_ENABLE'));
			JToolBarHelper::unpublishList('subscription.unpublish', JText::_('A_DISABLE'));
			JToolBarHelper::editList('subscription.edit');
			JToolBarHelper::deleteList('', 'subscription.delete');
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::publishList('subscription.publish', JText::_('A_ENABLE'));
			mosMenuBar::spacer();
			mosMenuBar::unpublishList('subscription.unpublish', JText::_('A_DISABLE'));
			mosMenuBar::spacer();
			mosMenuBar::editList('subscription.edit');
			mosMenuBar::spacer();
			mosMenuBar::deleteList('', 'subscription.delete');
			mosMenuBar::endTable();
		}
	}

	function SUBSCRIPTIONS_EDIT_MENU() {

		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('EDIT'), 'jcomments-subscriptions');
			JToolBarHelper::custom('subscription.save', 'save.png', 'save_f2.png', JText::_('A_SAVE'), false);
			JToolBarHelper::cancel('subscription.cancel');
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::save('subscription.save', JText::_('A_SAVE'));
			mosMenuBar::spacer();
			mosMenuBar::cancel('subscription.cancel');
			mosMenuBar::endTable();
		}
	}

	function CUSTOMBBCODE_MENU()
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('Custom BBCode'), 'jcomments-custombbcode');
			JToolBarHelper::publishList('custombbcode.publish');
			JToolBarHelper::unpublishList('custombbcode.unpublish');
			JToolBarHelper::addNewX('custombbcode.new');
			JToolBarHelper::editList('custombbcode.edit');
			JToolBarHelper::deleteList('', 'custombbcode.delete');
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::publishList('custombbcode.publish');
			mosMenuBar::spacer();
			mosMenuBar::unpublishList('custombbcode.unpublish');
			mosMenuBar::spacer();
			mosMenuBar::addNewX();
			mosMenuBar::spacer();
			mosMenuBar::editList('custombbcode.edit');
			mosMenuBar::spacer();
			mosMenuBar::deleteList('', 'custombbcode.delete');
			mosMenuBar::endTable();
		}
	}

	function CUSTOMBBCODE_EDIT_MENU() {

		if (JCOMMENTS_JVERSION == '1.5') {
			JToolBarHelper::title(JText::_('EDIT'), 'jcomments-custombbcode');
			JToolBarHelper::custom('custombbcode.save', 'save.png', 'save_f2.png', JText::_('A_SAVE'), false);
			JToolBarHelper::apply('custombbcode.apply');
			JToolBarHelper::cancel('custombbcode.cancel');
		} else {
			mosMenuBar::startTable();
			mosMenuBar::spacer();
			mosMenuBar::save('custombbcode.save', JText::_('A_SAVE'));
			mosMenuBar::spacer();
			mosMenuBar::apply('custombbcode.apply');
			mosMenuBar::spacer();
			mosMenuBar::cancel('custombbcode.cancel');
			mosMenuBar::endTable();
		}
	}
}
?>