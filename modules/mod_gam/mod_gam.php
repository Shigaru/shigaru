<?php
/**
* @version		$Id: mod_gam.php for Google Ad Manager module 2009-04-03 andreas berger $
* @package		Joomla 1.5, Google Ad Manager Module 1.1.0
* @copyright	Copyright (C) 2005 - 2009 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

$code = modGamHelper::getCode($params);
require(JModuleHelper::getLayoutPath('mod_gam'));