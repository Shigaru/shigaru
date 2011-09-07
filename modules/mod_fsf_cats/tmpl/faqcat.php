<?php
/**
* @Copyright Freestyle Joomla (C) 2010
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*     
* This file is part of Freestyle Support Portal
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
?>
<?php // no direct access

defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php foreach ($rows as $cat): ?>

<?php $link = JRoute::_( 'index.php?option=com_fsf&view=faq&catid=' . $cat['id'] . '&Itemid=' . $itemid ); ?>
<div class='faq_mod_category' style='cursor: pointer;'>
	<?php if ($params->get('show_images') && $cat['image']) : ?>
	<div class='faq_mod_category_image'>
	    <a href='<?php echo $link ?>'><img src='<?php echo JURI::root( true ); ?>/images/fsf/faqcats/<?php echo $cat['image']; ?>' width='32' height='32'></a>
	</div>
	<?php endif; ?>
	<div class='faq_mod_category_head'>
		<a href='<?php echo $link ?>'><?php echo $cat['title'] ?></a>
	</div>
</div>

<?php endforeach; ?>