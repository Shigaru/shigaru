<?php
/**
 * JComments - Joomla Comment System
 *
 * Enable auto-subscribe feature for authors of commented objects
 *
 * @version 2.1
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2012 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 **/

class plgJCommentsAutoSubscribe extends JPlugin
{
	function plgJCommentsAutoSubscribe(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}

	function onJCommentsCommentAfterAdd(&$comment) 
	{
		$components = $this->params->get('components', 'com_content');
		if (!is_array($components)) {
			$components = explode(',', $components);
		}
	        // check is comment's group enabled in plugin settings
        	if (in_array($comment->object_group, $components)) {

        		// get total comments count for an object
	        	$count = JComments::getCommentsCount($comment->object_id, $comment->object_group);

		        // check that this is first comment to the object
        		if ($count <= 1) {

                		// get object's owner id
			        $owner = JCommentsObjectHelper::getOwner($comment->object_id, $comment->object_group);
        
        		        // if owner id found - subscribe owner to new comments
        			if ($owner > 0 && $owner != $comment->userid) {
					require_once (JCOMMENTS_BASE.'/jcomments.subscription.php');
					$manager = JCommentsSubscriptionManager::getInstance();
					$manager->subscribe($comment->object_id, $comment->object_group, $owner);
				}
			}
		}
	} 
}
?>