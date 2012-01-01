<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class TableKarmaConfiguration extends JTable
{
	var $name = null;
	var $value = null;
	
	function __construct(&$db)
	{
		parent::__construct( '#__karma_conf', 'name', $db );
	
	}
}


?>