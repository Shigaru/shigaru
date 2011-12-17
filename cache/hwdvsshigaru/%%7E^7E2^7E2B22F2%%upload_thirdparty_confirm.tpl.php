<?php /* Smarty version 2.6.26, created on 2011-12-10 19:47:20
         compiled from upload_thirdparty_confirm.tpl */ ?>

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
    <p><?php echo $this->_tpl_vars['waitmessage']; ?>
</p>
    <p><a href="<?php echo $this->_tpl_vars['url_upld_another']; ?>
"><?php echo @_HWDVIDS_INFO_UPLDANOTHER; ?>
</a></p>
    <p><b><?php echo $this->_tpl_vars['failures']; ?>
</b></p>
  </div>
</div>

<?php if ($this->_tpl_vars['showEditForm']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'video_edit_form.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


