<?php /* Smarty version 2.6.26, created on 2010-07-06 00:03:43
         compiled from admin_reported_groups.tpl */ ?>

<div id="editcell">
  <table class="adminlist">
    <thead>
      <tr>
        <th width="5" class="title">ID</th>
        <th width="5"><input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo $this->_tpl_vars['totalvideos']; ?>
);" /></th>
        <th class="title"><?php echo @_HWDVIDS_TITLE; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_REP_DELETEVID; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_REP_INGOREG; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_REP_USER; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_REP_STATUS; ?>
</th>
        <th class="title"><?php echo @_HWDVIDS_REP_DATE; ?>
</th>
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['list_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
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
        <td><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $this->_tpl_vars['data']->i; ?>
','deleteReportedGroup')"><img src="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/components/com_hwdvideoshare/assets/images/icons/delete.png" border="0" alt="Delete Video" /></a></td>
        <td><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $this->_tpl_vars['data']->i; ?>
','readReportedGroup')"><img src="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/components/com_hwdvideoshare/assets/images/icons/add.png" border="0" alt="Keep Video" /></a></td>
        <td><?php echo $this->_tpl_vars['data']->user; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->status; ?>
</td>
        <td><?php echo $this->_tpl_vars['data']->date; ?>
</td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
    <tfoot>
      <tr><td colspan="11" align="center"><?php echo $this->_tpl_vars['writePagesLinks']; ?>
<br /><?php echo $this->_tpl_vars['writePagesCounter']; ?>
</td></tr>
    </tfoot>
  </table>
</div>			