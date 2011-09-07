<?php
/*
	JoomlaXTC Plugoo module

	version 1.1
	
	Copyright (C) 2009,2010  Monev Software LLC.	All Rights Reserved.
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	
	THIS LICENSE MIGHT NOT APPLY TO OTHER FILES CONTAINED IN THE SAME PACKAGE.
	
	See COPYRIGHT.php for more information.
	See LICENSE.php for more information.
	
	Monev Software LLC
	www.joomlaxtc.com
*/

if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

$display_mode = $params->get('display_mode','m');
$plugoo = $params->get('plugoo','');
$width = $params->get('width',540);
$height = $params->get('height',300);
$button = $params->get('button','');

if ($button == -1) $button = '';

if (empty($plugoo)) {
	echo 'Plugoo code not defined.';
	return;
}

$jxtc=uniqid('jxtc');
$url = 'http://www.plugoo.com/plug.swf?go='.$plugoo;
switch ($display_mode) {
	case 'p': // popup
	?>
		<a href="#" onclick="javascript: window.open('<?php echo $url; ?>','','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=<?php echo $width; ?> ,height=<?php echo $height; ?>'); return false" >
		<img src="images/<?php echo $button; ?>" />
		</a>
	<?php
	break;
	case 'l': // lightbox
	JHTML::_('behavior.modal',  'a.'.$jxtc, array('onClose'=>'\function(){this.content.empty();}'));
	?>
		<a class="<?php echo $jxtc; ?>" href="<?php echo $url; ?>" rel="{handler: 'iframe', size: {x: <?php echo $width; ?>, y: <?php echo $height; ?>}}">
		<img src="images/<?php echo $button; ?>" />
		</a>
	<?php	
	break;
	default: // Module
	?>
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
		codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
		width="<?php echo $width; ?>"
		height="<?php echo $height; ?>"
		id="<?php echo $jxtc; ?>">
		<param name=movie value="<?php echo $url; ?>">
		<param name="wmode" value="transparent" />
		<embed src="<?php echo $url; ?>" quality=high bgcolor=#000000 width="<?php echo $width; ?>" height="<?php echo $height; ?>"
		name="<?php echo $jxtc; ?>" align="" type="application/x-shockwave-flash"
		wmode="transparent"
		</embed>
		</object>
	<?php
	break;
}
?>
<div style="display:none"><a href="http://www.joomlaxtc.com">JoomlaXTC Plugoo - Copyright 2009,2010 Monev Software LLC</a></div>