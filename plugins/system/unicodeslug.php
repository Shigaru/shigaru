<?php
/**
 * @copyright	(C) 2009 infograf768.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author		infograf768 - Thanks Ercan for the tip!
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgSystemUnicodeslug extends JPlugin
{
	function plgSystemUnicodeslug(& $subject, $config) {
		parent::__construct($subject, $config);
	}

	function onAfterInitialise()
	{
		require_once(JPATH_SITE.DS.'plugins'.DS.'system'.DS.'unicodeslug'.DS.'filteroutput.php');
	}
}