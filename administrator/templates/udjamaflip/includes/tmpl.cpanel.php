<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved. Udjamaflip.com
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo  $this->language; ?>" lang="<?php echo  $this->language; ?>" dir="<?php echo  $this->direction; ?>" id="minwidth" >
<head>
<jdoc:include type="head" />

<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/system.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/udjamaflip.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/toolbar.css" type="text/css" />

</head>
<body>
	<div id="content-box">
		<div class="border">
			<div class="padding">
				<div id="element-box">
					<jdoc:include type="message" />
					<div class="t">
						<div class="t">
							<div class="t"></div>
						</div>
					</div>
					<div class="m" >
						<table class="adminform">
						<tr>
							<td width="55%" valign="top">
								<jdoc:include type="modules" name="icon" />
							</td>
							<td width="45%" valign="top">
								<jdoc:include type="component" />
							</td>
						</tr>
						</table>
						<div class="clr"></div>
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
				<div class="clr"></div>
			</div>
		</div>
	</div>
</body>
</html>