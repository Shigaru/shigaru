<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<style type="text/css">
div.plugarea{
	padding:5px;
}
</style>
<div class="iframedoc" id="iframedoc"></div>
<div id="filters_original" style="display:none">
	<?php echo JHTML::_('select.genericlist',   $this->typevaluesFilters, "filter[type][__num__]", 'class="inputbox" size="1" onchange="updateFilter(__num__);"', 'value', 'text','filtertype__num__');?>
	<div style="margin-left:200px;"><?php echo $this->outputFilters; ?></div>
</div>
<div id="actions_original" style="display:none">
	<?php echo JHTML::_('select.genericlist',   $this->typevaluesActions, "action[type][__num__]", 'class="inputbox" size="1" onchange="updateAction(__num__);"', 'value', 'text','actiontype__num__');?>
	<div style="margin-left:200px;"><?php echo $this->outputActions; ?></div>
</div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;ctrl=filter" method="post" name="adminForm" autocomplete="off">
	<fieldset class="adminform" id="filterinfo" <?php if(empty($this->filter->filid)) echo 'style="display:none"';?> >
		<legend><?php echo JText::_('FILTER'); ?></legend>
		<table width="100%" class="paramlist admintable">
			<tr>
		    	<td class="paramlist_key">
		    		<label for="title"><?php echo JText::_( 'TITLE' ); ?></label>
		    	</td>
		    	<td class="paramlist_value">
		    		<input class="inputbox" id="title" type="text" name="data[filter][name]" size="80" value="<?php echo $this->escape(@$this->filter->name); ?>" />
		    	</td>
		    	<td class="paramlist_key">
					<label for="enabled"><?php echo JText::_( 'ENABLED' ); ?></label>
				</td>
				<td class="paramlist_value">
					<?php echo JHTML::_('select.booleanlist', "data[filter][published]" , '',@$this->filter->published); ?>
				</td>
		    </tr>
			<tr>
		    	<td class="paramlist_key" valign="top">
		    		<label for="description"><?php echo JText::_( 'DESCRIPTION' ); ?></label>
		    	</td>
		    	<td class="paramlist_value" valign="top">
		    		<textarea id="description" cols="50" rows="5" name="data[filter][description]"><?php echo @$this->filter->description; ?></textarea>
		    	</td>
		    	<td width="50%" colspan="2">
		    		<fieldset class="adminform">
						<legend><?php echo JText::_( 'AUTO_TRIGGER_FILTER' ); ?></legend>
						<?php foreach($this->triggers as $key => $triggerName){ ?>
								<input id="trigger_<?php echo $key; ?>" type="checkbox" name="trigger[<?php echo $key; ?>]" value="1" <?php if(isset($this->filter->trigger[$key])) echo 'checked="checked"'; ?> />
					    		<label for="trigger_<?php echo $key; ?>"><?php echo $triggerName; ?></label>
								<br/>
						  <?php } ?>
					</fieldset>
		    	</td>
		    </tr>
		</table>
	</fieldset>
	<fieldset class="adminform" <?php if(!empty($this->subid)) echo 'style="display:none"'?> >
		<legend><?php echo JText::_( 'ACY_FILTERS' ); ?></legend>
		<div id="allfilters"></div>
		<button onclick="addFilter();return false;"><?php echo JText::_('ADD_FILTER'); ?></button>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'ACTIONS' ); ?></legend>
		<div id="allactions"></div>
		<button onclick="addAction();return false;"><?php echo JText::_('ADD_ACTION'); ?></button>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="process" />
	<input type="hidden" name="ctrl" value="filter" />
	<input type="hidden" name="filid" value="<?php echo @$this->filter->filid; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
	<?php if(!empty($this->subid)){ ?>
		<input type="hidden" name="subid" value="<?php echo $this->subid; ?>" />
		<input type="hidden" name="tmpl" value="component" />
		<button type="submit" /><?php echo JText::_('PROCESS'); ?></button>
	<?php } ?>
</form>