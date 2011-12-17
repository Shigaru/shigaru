<?php /* Smarty version 2.6.26, created on 2011-12-10 19:32:16
         compiled from upload_local_confirm.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="standard">
  <h2><?php echo @_HWDVIDS_TITLE_UPLOADSUCCESS; ?>
</h2>
  <div class="padding">
    <p><?php echo @_HWDVIDS_INFO_SUCUPLD; ?>
 <a href="<?php echo $this->_tpl_vars['videolink']; ?>
"><b><i><?php echo $this->_tpl_vars['uploadname']; ?>
</i></b></a></p>
    <p><?php echo $this->_tpl_vars['video_wait_message']; ?>
</p>
    <p><a href="<?php echo $this->_tpl_vars['url_upld_another']; ?>
"><?php echo @_HWDVIDS_INFO_UPLDANOTHER; ?>
</a></p>
  </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


