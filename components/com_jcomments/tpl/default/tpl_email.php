<?php
// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');
/*
*
* E-mail template for notifications
*
* Шаблоны писем-уведомлений о новых комментариях (для подписчиков)
*
*/
class jtt_tpl_email extends JoomlaTuneTemplate
{
	function render() 
	{
		$comment = $this->getVar('comment');
		
		$object_title = $this->getVar('comment-object_title');
		$object_link =  $this->getVar('comment-object_link');
		$hash =  $this->getVar('hash');

		$link = '<a href="' . $object_link . '" target="_blank">' . $object_title . '</a>';
		$unsubscribeMessage = JText::sprintf('NOTIFICATION_COMMENT_UNSUBSCRIBE', $link);
		$unsubscribeLink = JoomlaTuneRoute::_('index.php?option=com_jcomments&task=unsubscribe&hash=' . $hash);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta content="text/html; charset=<?php echo $this->getVar('charset'); ?>" http-equiv="content-type" />
  <meta name="Generator" content="JComments" />
</head>
<body>
<p style="font: normal 1em Verdana, Arial, Sans-Serif;"><?php echo $comment->author; ?> <a href="<?php echo $object_link; ?>#comment-<?php echo $comment->id; ?>"><?php echo JText::_('WROTE'); ?></a></p>
<div style="margin: 0 20px 10px 20px; padding: 0 0 0 10px; font: normal 1em Verdana, Arial, Sans-Serif;"><?php echo $comment->comment; ?></div>
<p style="border-top: 1px solid #ccc; margin: 10px 0 0 0; color: #555;"><?php echo $unsubscribeMessage; ?>:<br /><a href="<?php echo $unsubscribeLink; ?>" target="_blank"><?php echo JText::_('Unsubscribe');?></a></p>
</body>
</html>
<?php
	}
}
?>