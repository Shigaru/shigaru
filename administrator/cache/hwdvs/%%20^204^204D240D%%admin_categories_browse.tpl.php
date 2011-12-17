<?php /* Smarty version 2.6.26, created on 2011-12-10 19:02:19
         compiled from admin_categories_browse.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="editcell">
	<table class="adminlist">
		<thead>
		<tr>
			<th width="5" class="title">ID</th>
			<th width="5" class="title"><input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo $this->_tpl_vars['totalcategories']; ?>
);" /></th>
			<th class="title"><?php echo @_HWDVIDS_TITLE; ?>
</th>
			<th class="title"><?php echo @_HWDVIDS_CVACCESS; ?>
</th>
			<th class="title"><?php echo @_HWDVIDS_CUACCESS; ?>
</th>
			<th class="title"><?php echo @_HWDVIDS_PUB; ?>
</th>
			<th class="title" width="75"><?php echo @_HWDVIDS_ORDER; ?>
 <?php echo $this->_tpl_vars['saveOrder']; ?>
</th>
		</tr>
		</thead>
		<tbody>
			<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
				<?php if ($this->_tpl_vars['data']->isparent): ?>
					<tr bgcolor = "#f1f3f0">
				<?php else: ?>
					<tr class = "row<?php echo $this->_tpl_vars['data']->k; ?>
">
				<?php endif; ?>
						<td><?php echo $this->_tpl_vars['data']->id; ?>
</td>
						<td><?php echo $this->_tpl_vars['data']->checked; ?>
</td>
						<td><?php echo $this->_tpl_vars['data']->title; ?>
</td>
						<td><?php echo $this->_tpl_vars['data']->view_access; ?>
</td>
						<td><?php echo $this->_tpl_vars['data']->upld_access; ?>
</td>
						<td><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $this->_tpl_vars['data']->i; ?>
','<?php echo $this->_tpl_vars['data']->published_task; ?>
')"><img src="<?php echo $this->_tpl_vars['data']->published_img; ?>
" width="12" height="12" border="0" alt="" /></a></td>
						<td class="order">
							<span><?php echo $this->_tpl_vars['data']->reorderup; ?>
</span>
							<span><?php echo $this->_tpl_vars['data']->reorderdown; ?>
</span>
							<?php echo $this->_tpl_vars['data']->ordering; ?>

						</td>
					</tr>
			<?php endforeach; endif; unset($_from); ?>
		</tbody>
		<tfoot>
		<tr><td colspan="9" align="center"><?php echo $this->_tpl_vars['writePagesLinks']; ?>
<br /><?php echo $this->_tpl_vars['writePagesCounter']; ?>
</td></tr>
		</tfoot>
	</table>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>