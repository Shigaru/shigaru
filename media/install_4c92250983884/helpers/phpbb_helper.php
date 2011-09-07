<?php
/**
* @version		$Id: helper.php 9764 2007-12-30 07:48:11Z ircmaxell $
* @package		PhpBB3 Last Topics module
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( dirname(__FILE__).DS.'Restricted access' );

class modPhpBB3LastTopicsHelper
{
	function &getList( $paramconf,$count )
	{

		$host			= $paramconf->host;
		$database		= $paramconf->database;
		$user			= $paramconf->user;
		$password		= $paramconf->password;
		$prefix			= $paramconf->prefix;
		$show_admin		= $paramconf->admin;
		$forums_include = $paramconf->forums_include;
		$forums_exclude = $paramconf->forums_exclude;

		$options = array ("host" => $host, "database" => $database, "user" => $user,	"password" => $password, "prefix" => $prefix);
		$forum_db = new JDatabaseMySQL($options);

		$where_exists = 0;
		$limit		= $count;
		$query = "SELECT #__posts.post_id, #__posts.topic_id, #__posts.poster_id, 
				#__posts.post_time, #__posts.forum_id, #__posts.post_username, 
				#__posts.post_text, #__topics.topic_title, #__users.username 
				FROM #__posts 
					INNER JOIN #__topics ON #__posts.topic_id = #__topics.topic_id 
					INNER JOIN #__users ON #__posts.poster_id = #__users.user_id 
					INNER JOIN #__acl_groups ON #__posts.forum_id = #__acl_groups.forum_id 
					INNER JOIN #__groups ON #__acl_groups.group_id = #__groups.group_id 
					INNER JOIN #__acl_roles ON #__acl_groups.auth_role_id = #__acl_roles.role_id 
				WHERE (1=1) ";
		if(!$show_admin)
			$query .= " AND ( #__acl_roles.role_name NOT LIKE '%ADMIN%' )
					AND 
					( #__groups.group_name NOT LIKE '%ADMIN%' ) 
					AND 
					( #__groups.group_name NOT LIKE '%MODERATORS%' ) ";
		if($forums_include)
			$query .= " AND ( #__posts.forum_id IN ( ".$forums_include." ) ) ";
		if($forums_exclude)
			$query .= " AND ( #__posts.forum_id NOT IN ( ".$forums_exclude." ) ) ";
		$query .= "GROUP BY #__posts.post_id, #__posts.topic_id, #__posts.poster_id, 
				#__posts.post_time, #__posts.forum_id, #__posts.post_username, 
				#__posts.post_text, #__topics.topic_title, #__users.username ";
		$query .= "ORDER BY #__posts.post_time DESC 
				LIMIT 0, ".$limit ;
		//echo $query;
		$forum_db->setQuery($query);
		
		$rows = $forum_db->loadObjectList();

		return $rows;
	}
}
