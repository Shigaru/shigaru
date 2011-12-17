<?php /* Smarty version 2.6.26, created on 2011-12-10 19:05:02
         compiled from channel_view.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

Channel View
<?php echo $this->_tpl_vars['channel_data']->editchannel; ?>


    <div class="standard">
      <h2><?php echo @_HWDVIDS_RECENT; ?>
</h2>
      <?php if ($this->_tpl_vars['print_videolist']): ?>

          <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
          <div class="videoBox">
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_full.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  </div>
	  <?php if (($this->_foreach['outer']['iteration'] == $this->_foreach['outer']['total'])): ?>
	     <div style="clear:both;"></div>
	  <?php elseif (($this->_foreach['outer']['iteration']-1) % $this->_tpl_vars['vpr']- ( $this->_tpl_vars['vpr']-1 ) == 0): ?>
	     <div style="clear:both;"></div>
	  <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
      
      <?php else: ?>
        <div class="padding"><?php echo @_HWDVIDS_INFO_NRV; ?>
</div>
      <?php endif; ?>
      <?php echo $this->_tpl_vars['pageNavigation']; ?>

    </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


