<?php

defined('_JEXEC') or die();

class HTML_Karma
{
	
	function listMessages($option, &$rows)
	{
		HTML_Karma::setAllMessagesToolbar();
		
		?>
		<form action="index.php" method="post" name="adminForm">
			
			<table class="adminlist">
				<thead>
					<tr>
						<th width="20"><input type="checkbox" name="toggle" value=""  onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
						<th width="25"nowrap="nowrap" class="title">ID</th>
						<th nowrap="nowrap" class="title"><div align="left">Username</div></th>
						<th nowrap="nowrap" class="title"><div align="left">Name</div></th>
						<th nowrap="nowrap" class="title"><div align="left">Email</div></th>
						<th width="20" nowrap="nowrap"><div align="center">Monthly Karma</div></th>
						<th width="30" nowrap="nowrap">Total Karma</th>
					</tr>
				</thead>
				<tbody>
					<?php

					
					$k = 0;
					for ($i=0, $n=count( $rows ); $i < $n; $i++) {
						$row = &$rows[$i];
						
 						$checked = JHTML::_('grid.id', $i, $row->user_id );
						
						$link = 'index.php?option=' . $option . '&task=edit&cid[]='. $row->user_id;
						
						?>
						<tr class="<?php echo "row$k"; ?>">
							<td align="center">
								<?php echo $checked; ?>							</td>
							<td>
									<div align="center"><?php echo $row->user_id; ?>							</div></td>
                            <td>
									<?php $karmauser =& JFactory::getUser($row->user_id);  echo $karmauser->username; ?>							</td>
                                          <td>
									<?php $karmauser =& JFactory::getUser($row->user_id);  echo $karmauser->name; ?>							</td>
                            <td>
									<?php $karmauser =& JFactory::getUser($row->user_id);  echo '<a href="mailto:' . $karmauser->email . '">' . $karmauser->email . '</a>'; ?>								</td>
							<td width="20">
							  <div align="center"><a href="<?php echo $link; ?>" title="Edit Karma"><?php echo $row->var_karma; ?></a> </div></td>
							<td width="30" align="center">
                       		  <div align="center"><a href="<?php echo $link; ?>" title="Edit Karma"><?php echo $row->total_karma; ?></a> </div></td>
						<?php
						
						$k = 1 - $k;
					}
					
					?>
				</tbody>
			</table>
			
<input type="hidden" name="option" value="<?php echo $option; ?>" />
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
		</form>   <div align="center"><br />
		  <strong>Karma 1.5.0 </strong>by MediaGuru at <a href="http://www.tkserver.com" target="_blank">www.tkserver.com</a>. If you like this system please <a href="http://www.tkserver.com/donate" target="_blank">donate</a> to support it, and to development of other useful systems!</div>
		<?php
	}
	
	function edit($option, &$row)
	{
		HTML_Karma::setMessageToolbar($row->user_id);
		
		// Get Monthly Karma
		$db	=& JFactory::getDBO();
		$db->setQuery("SELECT var_karma AS var_karma FROM #__karma_tb WHERE user_id ='$row->user_id'");
		$var_karma = $db->loadResult();
		
		// Get Monthly Karma
		$db	=& JFactory::getDBO();
		$db->setQuery("SELECT total_karma AS total_karma FROM #__karma_tb WHERE user_id ='$row->user_id'");
		$total_karma = $db->loadResult();
		
		?>
		
        <form action="index.php" method="post" name="adminForm">
		
		<div class="col100">
			<fieldset class="adminform">
<table class="admintable">
				<tbody>
					<tr>
						<td width="20%" class="key">User:</td>
						<td>
								<?php $karmauser =& JFactory::getUser($row->user_id);  echo $karmauser->username; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="var_karma">Monthly Karma: </label>
						</td>
						<td>
							<input class="inputbox" type="text" name="var_karma" id="var_karma" size="5" value="<?php echo $var_karma; ?>" />
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="Total Karma">Total Karma: </label>
						</td>
						<td>
							<input class="inputbox" type="text" name="total_karma" id="total_karma" size="5" value="<?php echo $total_karma; ?>" />
						</td>
					</tr>
				</tbody>
			</table>
			</fieldset>
		</div>
		
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="user_id" value="<?php echo $row->user_id ?>" />
		</form>
        
        
		<?php
	}
	
	function parameters($option, &$row)
	{
	
	
		$db	=& JFactory::getDBO();
		$db->setQuery("SELECT value AS value FROM #__karma_conf WHERE name ='daylock'");
		$value = $db->loadResult();
		
	
		HTML_Karma::setConfigToolbar();
				$url = JUri::base(true)
		?>
<form action="index.php" method="post" name="adminForm">
		
		<div class="col100">
			<fieldset class="adminform">
			<table width="100%" class="admintable">
				<tbody>
					<tr>
						<td width="50%">
							<label for="Total Karma">
							<div align="right"><strong>Day Lock: </strong></div>
							</label>						</td>
						<td width="50%">
							<input class="inputbox" type="text" name="value" id="value" size="5" value="<?php echo $value; ?>" />							</td>
					</tr>
					<tr>
					  <td colspan="2" class="key"><div align="center">The Daylock is the amount of time required between Karma votes, preventing &quot;Karma Fraud&quot; or &quot;Karma Bombing.&quot;</div></td>
				  </tr>
					<tr>
					  <td colspan="2">&nbsp;</td>
				  </tr>
					<tr>
					  <td colspan="2"><div align="center"><strong>Karma 1.5.0 </strong>by MediaGuru at <a href="http://www.tkserver.com" target="_blank">www.tkserver.com</a>. If you like this system please <a href="http://www.tkserver.com/donate" target="_blank">donate</a> to support it, and to development of other useful systems!</div>					    
					  <div align="center"></div></td>
				  </tr>
				</tbody>
			</table>
			</fieldset>
		</div>
		
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />

  <input type="hidden" name="name" value="daylock" />
</form>
        
        
		<?php
	
	}
	
	function setConfigToolbar()
	{
		
		JToolBarHelper::title('Set Karma Daylock', 'generic.png');
		JToolBarHelper::save('saveconfig', 'Save');
		JToolBarHelper::cancel();
	}
	
	
	function setMessageToolbar($id)
	{
		
		JToolBarHelper::title('Edit Karma', 'generic.png');
		JToolBarHelper::save();
		JToolBarHelper::cancel();
	}
	
	function setAllMessagesToolbar()
	{
		JToolBarHelper::editList();
		JToolBarHelper::title('Karma Manager', 'generic.png');
		JToolBarHelper::spacer();
		JToolBarHelper::custom('ResetMonthly', 'unpublish.png', 'unpublish.png', 'Reset Monthly', true);
		JToolBarHelper::custom('ResetTotal', 'unpublish.png', 'unpublish.png', 'Reset Total', true);
		JToolBarHelper::spacer();
		JToolBarHelper::custom('delete', 'delete.png', 'delete.png', 'Delete', true);
		JToolBarHelper::spacer();
		JToolBarHelper::custom('ResetAllMonthly', 'cancel.png', 'cancel.png', 'Reset ALL Total', false);
		JToolBarHelper::custom('ResetAllTotal', 'cancel.png', 'cancel.png', 'Reset ALL Total', false);
		JToolBarHelper::spacer();
		JToolBarHelper::custom('parameters', 'config.png', 'config.png', 'Parameters', false);
	}
}


?>