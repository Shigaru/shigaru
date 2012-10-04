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
		$hiname =  $this->getVar('comment-hiname');

		$link = '<a href="' . $object_link . '" target="_blank">' . $object_title . '</a>';
		$unsubscribeMessage = JText::sprintf('NOTIFICATION_COMMENT_UNSUBSCRIBE', $link);
		$unsubscribeLink = JoomlaTuneRoute::_('index.php?option=com_jcomments&task=unsubscribe&hash=' . $hash);
		$HINAME = JText::sprintf('HINAME',$hiname);
		$COMMENTEDONYOUR = JText::_('NOTIFICATION_COMMENTEDONYOURLINK');
		$THECOMM = JText::_('NOTIFICATION_THECOMMUNITY');
		$SEECOMMTIT = JText::_('NOTIFICATION_SEECOMMENTTHREADTITLE');
		$SEECOMM = JText::_('NOTIFICATION_SEECOMMENTTHREAD');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta content="text/html; charset=<?php echo $this->getVar('charset'); ?>" http-equiv="content-type" />
  <meta name="Generator" content="JComments" />
</head>
<body style="margin: 0;padding: 0;border: 0;outline: 0;">
	<div style="background: url('<?php echo JURI::base() ?>/templates/rhuk_milkyway/images/head_back.png') repeat-x scroll 0 0 transparent;color: #FFFFFF;height: 73px;">
		<div id="head_logo" style="clear: both;height: 140px;">
			<a style="float:left;" title="Shigaru.com Home page" href="/" class="fleft">
				<img width="145" style="margin-top: 3px;" height="140" alt="Shigaru.com" src="<?php echo JURI::base() ?>templates/rhuk_milkyway/images/head_logo.png">
			</a>
			<a style=" color: #FFFFFF;float: left;font-size: 70%;font-weight: bold;height: 30px;line-height: 30px;margin: 25px 0 0 5px;text-decoration: none;text-shadow: 1px 2px 2px #000000;" title="Shigaru.com Home page" 
			href="<?php echo JURI::base() ?>" id="head_title_text">
				<h1>SHIGARU</h1>
			</a>
			<span style="color: #E3CDE1;display: inline-block;float: left;font-size: 0.9em; margin: 47px 0 0 17px;" id="head_comm_text">
					<?php echo $THECOMM;?></span>
		</div>
	</div>	
	<div style="background: rgb(255,255,255); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2YxZjFmMSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUxJSIgc3RvcC1jb2xvcj0iI2UxZTFlMSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmNmY2ZjYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(241,241,241,1) 50%, rgba(225,225,225,1) 51%, rgba(246,246,246,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(50%,rgba(241,241,241,1)), color-stop(51%,rgba(225,225,225,1)), color-stop(100%,rgba(246,246,246,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 51%,rgba(246,246,246,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0 ); /* IE6-8 */ font-size:90%;">
	<p style="font: normal 1em Verdana, Arial, Sans-Serif; font-size: 120%;margin: 20px 0 0 159px;"><?php echo $HINAME ?></p>
	<div style="margin: 0 20px 10px 150px; padding: 0 0 0 10px; font: normal 1em Verdana, Arial, Sans-Serif;">
			<p><?php echo $comment->author; ?> <?php echo $COMMENTEDONYOUR; ?></p>
			<p><?php echo $comment->comment; ?></p>
			<p style="margin:40px 12px 12px 12px;">
				<a style="padding: 12px; color: #fff; background:red;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius: 5px; " 
				title="<?php echo $SEECOMMTIT; ?>" href="<?php echo $object_link; ?>#comment-<?php echo $comment->id; ?>" class="fleft">
				<?php echo $SEECOMM;?></a>
			</p>
			<p style="border-top: 1px solid #ccc; margin: 22px 20px 10px 150px; padding: 12px; color: #555;"><?php echo $unsubscribeMessage; ?>:
				<a href="<?php echo $unsubscribeLink; ?>" target="_blank"><?php echo JText::_('Unsubscribe');?></a>
			</p>
</body>
</html>
<?php
	}
}
?>
