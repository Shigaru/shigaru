<?php
/**
 * $Id: mod_incomplete_info.php 353 2012-03-03 01:53:03Z meloman $
 * @package     mod_incomplete_info
 * @copyright   Copyright © 2010-2012 - All rights reserved.
 * @license     GNU/GPL
 * @author      Alain Rivest
 * @author mail info@aldra.ca
 * @website     Aldra.ca
 *
 */

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

require_once( dirname(__FILE__).DS.'helper.php' );

$helper = new modIncompleteInfoHelper($params);

if ($helper->checkInfo())
{
    $app =& JFactory::getApplication();
    $document =& JFactory::getDocument();

    $css_file = 'modules/mod_incomplete_info/tmpl/style.css';

    require( JModuleHelper::getLayoutPath( 'mod_incomplete_info' ) );
}

?>
