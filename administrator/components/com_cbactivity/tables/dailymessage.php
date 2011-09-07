<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class TableDailyMessage extends JTable
{
	var $log_enabled = null;
	var $showdate = null;
	var $showgender = null;
	var $cb_gender_field = null;
	var $male = null;
	var $female = null;
	var $viewname = null;
	var $host = null;
	var $database = null;
	var $user = null;
	var $password = null;
	var $prefix = null;
	var $baseurl = null;
	var $pagename = null;
	var $forumidtag = null;
	var $topicidtag = null;
	var $admin = null;
	var $forums_include = null;
	var $forums_exclude = null;
	var $configid = null;
	
	function __construct(&$db)
	{
		parent::__construct( '#__supera_conf', 'configid', $db );
		
	}
}


?>