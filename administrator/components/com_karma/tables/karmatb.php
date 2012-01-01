<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class TableKarmatb extends JTable
{
	var $user_id = null;
	var $var_karma = null;
	var $total_karma = null;
	
	function __construct(&$db)
	{
		parent::__construct( '#__karma_tb', 'user_id', $db );
		
	}
}

?>