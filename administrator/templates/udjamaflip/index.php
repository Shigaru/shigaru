<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo  $this->language; ?>" lang="<?php echo  $this->language; ?>" dir="<?php echo  $this->direction; ?>" id="minwidth" >
<head>
<jdoc:include type="head" />

<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/system.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/udjamaflip.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/toolbar.css" type="text/css" />
<script language="javascript" type="text/javascript" src="templates/<?php echo $this->template; ?>/js/jquery.js"></script>
<script type="text/javascript" language="javascript">
jQuery.noConflict();
jQuery(document).ready(function ($) {
	if (window == window.top)
	{
        window.location.replace("<?php echo JURI::root(); ?>administrator/?udjaurl="+window.location);
    }
});
</script>

</head>
<body>
		<div id="header">		
            <h1><jdoc:include type="modules" name="title" /></h1>
            <jdoc:include type="modules" name="toolbar" />
            <div class="clear"></div>
  		</div>
   		<div class="clr"></div>
		<?php if (!JRequest::getInt('hidemainmenu')): ?>
			<jdoc:include type="modules" name="submenu" style="rounded" id="submenu-box" />
		<?php endif; ?>
		<jdoc:include type="message" />
		<div id="element-box">
			<div class="t">
		 		<div class="t">
					<div class="t"></div>
		 		</div>
			</div>
			<div class="m">
				<jdoc:include type="component" />
				<div class="clear"></div>
			</div>
			<div class="b">
				<div class="b">
					<div class="b"></div>
				</div>
			</div>
   		</div>
		<noscript>
			<?php echo  JText::_('WARNJAVASCRIPT') ?>
		</noscript>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

</body>
</html>
