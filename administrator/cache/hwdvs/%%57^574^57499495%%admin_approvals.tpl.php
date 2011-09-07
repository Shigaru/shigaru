<?php /* Smarty version 2.6.26, created on 2010-07-05 23:57:10
         compiled from admin_approvals.tpl */ ?>

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
        <th width="5"><input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo $this->_tpl_vars['totalvideos']; ?>
);" /></th>
        <th class="title"><?php echo @_HWDVIDS_TITLE; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_LENGTH; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_RATING; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_VIEWS; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_ACCESS; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_DATEUPLD; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_APPROVED; ?>
</th>
        <th class="title" width="140"><?php echo @_HWDVIDS_VAPPROVEPUB; ?>
</th>
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['list_all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
      <tr class="row<?php echo $this->_tpl_vars['data']->k; ?>
">
        <td><?php echo $this->_tpl_vars['data']->id; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->checked; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->title; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->length; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->rating; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->views; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->access; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->date; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->status; ?>
</td>
        <td><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $this->_tpl_vars['data']->i; ?>
','<?php echo $this->_tpl_vars['data']->approve_task; ?>
')"><img src="images/<?php echo $this->_tpl_vars['data']->approve_img; ?>
" width="12" height="12" border="0" alt="" /></a></td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
    <tfoot>
      <tr><td colspan="10" align="center"><?php echo $this->_tpl_vars['writePagesLinks']; ?>
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


