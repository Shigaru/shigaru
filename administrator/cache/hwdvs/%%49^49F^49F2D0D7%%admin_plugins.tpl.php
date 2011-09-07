<?php /* Smarty version 2.6.26, created on 2010-07-05 23:57:16
         compiled from admin_plugins.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="adminform">
  <tr>
    <td align="left">
    <h2>hwdVideoShare Plugins</h2>
    <p>hwdVideoShare Plugins are controlled using the Joomla Plugin Manager.</p>
    <p><a href="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/index.php?option=com_plugins&filter_type=hwdvs-language">Click here to view the Language plugins</a></p>
    <p><a href="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/index.php?option=com_plugins&filter_type=hwdvs-template">Click here to view the Template plugins</a></p>
    <p><a href="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/index.php?option=com_plugins&filter_type=hwdvs-thirdparty">Click here to view the Third Party plugins</a></p>
    <p><a href="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/index.php?option=com_plugins&filter_type=hwdvs-videoplayer">Click here to view the Video Player plugins</a></p>
    </td>
  </tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>