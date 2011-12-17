<?php /* Smarty version 2.6.26, created on 2011-12-11 13:13:46
         compiled from search.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="standard">
  <h2><?php echo @_HWDVIDS_TITLE_VIDMATCHING; ?>
 "<?php echo $this->_tpl_vars['searchterm']; ?>
"</h2>
  <?php if ($this->_tpl_vars['print_matchvids']): ?>
    <?php $_from = $this->_tpl_vars['matchingvids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
          <div style="width: 24%; float:left;">
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_full.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  </div>
	  <?php if (($this->_foreach['outer']['iteration'] == $this->_foreach['outer']['total'])): ?>
	     <div style="clear:both;"></div>
	  <?php elseif (($this->_foreach['outer']['iteration']-1) % 4 -3 == 0): ?>
	     <div style="clear:both;"></div>
	  <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <div class="padding"><?php echo $this->_tpl_vars['mvempty']; ?>
</div>
  <?php endif; ?>
  <?php echo $this->_tpl_vars['vpageNavigation']; ?>

</div>

<?php if ($this->_tpl_vars['print_glink']): ?>
<div class="standard">
  <h2><?php echo @_HWDVIDS_TITLE_GROUPMATCHING; ?>
 "<?php echo $this->_tpl_vars['searchterm']; ?>
"</h2>
  <?php if ($this->_tpl_vars['print_matchgrps']): ?>
    <?php $_from = $this->_tpl_vars['matchinggroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
          <div style="width: 49%; float:left;">
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "group_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  </div>
	  <?php if (($this->_foreach['outer']['iteration'] == $this->_foreach['outer']['total'])): ?>
	     <div style="clear:both;"></div>
	  <?php elseif (($this->_foreach['outer']['iteration']-1) % 2 -1 == 0): ?>
	     <div style="clear:both;"></div>
	  <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <div class="padding"><?php echo $this->_tpl_vars['mgempty']; ?>
</div>
  <?php endif; ?>
  <?php echo $this->_tpl_vars['gpageNavigation']; ?>

</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>