<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003 - 2012, Think Network GmbH, Munich
 *
 * All rights reserved.  The Joom!Fish project is a set of extentions for
 * the content management system Joomla!. It enables Joomla!
 * to manage multi lingual sites especially in all dynamic information
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * -----------------------------------------------------------------------------
 * $Id: default_message.php 1592 2012-01-20 12:51:08Z akede $
 * @package joomfish
 * @subpackage Views
 *
*/
$state			= $this->get('State');
$message1		= $state->get('message');
$message2		= $state->get('extension.message');
?>
<table class="adminform">
	<tbody>
		<?php if($message1) : ?>
		<tr>
			<th><?php echo JText::_($message1) ?></th>
		</tr>
		<?php endif; ?>
		<?php if($message2) : ?>
		<tr>
			<td><?php echo $message2; ?></td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
