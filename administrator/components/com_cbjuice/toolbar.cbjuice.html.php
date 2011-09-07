<?php

/**

* @version $Id: toolbar.cbjuice.php, v1.7Beta7 2010-03-27 

* @package CBUICE

* @subpackage CBJUICE

* @copyright (C) 2000 - 2005 Pronique Software and 2007-2009 Jacobson Consulting Inc.

* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL

*   based on M3Port/Juice released as Free Software by Pronique software
* - Modded by billt/billt_3
* - added functionality to add users and with email notification option for Joomla
* - Modded by jciconsult, generalized to CB fields. edit functionality added and export function
* - NOTE - THIS VERSION REQUIRES USE OF FIRST AND LAST NAME AT LEAST AS SEPARATE COMPROFILER FIELDS

*/


/** ensure this file is being included by a parent file */

if ( ! ( defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }



/**

* @package JUICE

*/

class TOOLBAR_usersimport {

	/**

	* Draws the menu to edit a user

	*/

	function _DEFAULT() {
		if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
		JToolBarHelper::addNew('process','Process the Users');	
		}else {
		mosMenuBar::startTable();

		mosMenuBar::spacer();

		mosMenuBar::addNew('process','Process Users');

		mosMenuBar::spacer();

	

		mosMenuBar::endTable();
		}

	}

}

?>

