<?php
/**
 * $Id: default.php 353 2012-03-03 01:53:03Z meloman $
 * @package     mod_incomplete_info
 * @copyright   Copyright © 2012 - All rights reserved.
 * @license     GNU/GPL
 * @author      Alain Rivest
 * @author mail info@aldra.ca
 * @website     Aldra.ca
 */

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

// Add CSS
$document->addStyleSheet($css_file);
?>
<div class="incomplete_info">
<p>
<?php echo JText::_('MOD_INCOMPLETE_INFO_COMPLETE_YOUR_INFO_1'); ?><br />
<a href="<?php echo JRoute::_("index.php?option=com_comprofiler&task=userdetails"); ?>"><?php echo JText::_('MOD_INCOMPLETE_INFO_COMPLETE_YOUR_INFO_2'); ?></a><br />
<?php echo JText::_('MOD_INCOMPLETE_INFO_COMPLETE_YOUR_INFO_3'); ?>
</p>
</div>
