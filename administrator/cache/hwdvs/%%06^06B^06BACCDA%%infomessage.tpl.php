<?php /* Smarty version 2.6.26, created on 2010-08-21 00:26:37
         compiled from infomessage.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="adminform">
  <tr>
    <td align="left"><h2><?php echo $this->_tpl_vars['title']; ?>
</h2></td>
  </tr>
  <tr>
    <td align="left">
      <img src="<?php echo $this->_tpl_vars['icon']; ?>
" border="0" style="vertical-align:middle;" />&nbsp;&nbsp;<?php echo $this->_tpl_vars['message']; ?>
<br /><br />
      <?php echo $this->_tpl_vars['backlink']; ?>

    </td>
  </tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
