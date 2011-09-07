<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
<link href="templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="templates/<?php echo $this->template; ?>/js/jquery.js"></script>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function ($) {
	if (window != window.top)
	{
        window.top.location.replace("<?php echo JURI::root(); ?>administrator/");
    }
});
</script>
<script language="javascript" type="text/javascript">
	function setFocus() {
		document.login.username.select();
		document.login.username.focus();
	}
</script>
</head>
<body id="loginBody" onload="javascript:setFocus()">

<noscript>
	<?php echo JText::_('WARNJAVASCRIPT') ?>
</noscript>

<div class="msg">
	<jdoc:include type="message" />
</div>

<div id="loginBox">

	<h1><img src="templates/<?php echo $this->template ?>/images/login-logo.png" alt="" /><span><?php echo $this->params->get('showSiteName') ? $mainframe->getCfg( 'sitename' ) : JText::_('Administration'); ?></span></h1>
	<div class="clear"></div>
	<div id="content-box">
		<div class="padding">
			<div id="element-box" class="login">
				<div class="t">
					<div class="t">
						<div class="t"></div>
					</div>
				</div>
				<div class="m">
					<jdoc:include type="component" />
					<p><?php echo JText::_('DESCUSEVALIDLOGIN') ?></p>
					<p>
						<a href="<?php echo JURI::root(); ?>"><?php echo JText::_('Return to site Home Page') ?></a>
					</p>
					<div id="lock"></div>
					<div class="clr"></div>
				</div>
				<div class="b">
					<div class="b">
						<div class="b"></div>
					</div>
				</div>
			</div>
			
			<div class="clr"></div>
		</div>
	</div>

	<div id="footer">
		<p class="copyright">
			<a href="http://www.joomla.org" target="_blank">Joomla!</a>
			<?php echo JText::_('ISFREESOFTWARE') ?>
		</p>
	</div>
</div>
</body>
</html>
