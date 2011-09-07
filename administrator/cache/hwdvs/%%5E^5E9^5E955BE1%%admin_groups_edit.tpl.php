<?php /* Smarty version 2.6.26, created on 2010-07-25 03:29:43
         compiled from admin_groups_edit.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table cellpadding="4" cellspacing="1" border="0" class="adminform">
  <tr>
    <th colspan="2"><h2><?php echo @_HWDVIDS_GROUPDET; ?>
</h2></th>
  </tr>
  <tr>
    <td valign="top" align="left" width="60%">
      <table>
        <tr>
          <td><?php echo @_HWDVIDS_TITLE; ?>
</td>
          <td><input name="group_name" value="<?php echo $this->_tpl_vars['group_name']; ?>
" size="55" maxlength="500"></td>
        </tr>
        <tr>
          <td valign="top"><?php echo @_HWDVIDS_DESC; ?>
</td>
          <td valign="top"><textarea rows="5" cols="80" name ="group_description"><?php echo $this->_tpl_vars['group_description']; ?>
</textarea></td>
        </tr>
      </table>
    </td>
    <td valign="top" align="right" width="40%">
      <table>
        <tr>
          <td valign="top" width="40%">
            <?php echo $this->_tpl_vars['startpane']; ?>

            <?php echo $this->_tpl_vars['starttab1']; ?>

            <table>
              <tr>
                <td><?php echo @_HWDVIDS_PUB; ?>
</td>
                <td><?php echo $this->_tpl_vars['group_published']; ?>
</td>
              </tr>
              <tr>
                <td><?php echo @_HWDVIDS_FEATURED; ?>
</td>
                <td><?php echo $this->_tpl_vars['group_featured']; ?>
</td>
              </tr>
              <tr>
                <td><?php echo @_HWDVIDS_ADMIN; ?>
</td>
                <td><?php echo $this->_tpl_vars['group_admin']; ?>
</td>
              </tr>
              <tr>
                <td><?php echo @_HWDVIDS_ACCESS; ?>
</td>
                <td><?php echo $this->_tpl_vars['group_access']; ?>
</td>
              </tr>
              <tr>
                <td><?php echo @_HWDVIDS_ACOMMENTS; ?>
</td>
                <td><?php echo $this->_tpl_vars['group_comments']; ?>
</td>
              </tr>
            </table>
            <?php echo $this->_tpl_vars['endtab']; ?>

            <?php echo $this->_tpl_vars['starttab2']; ?>

            <table>
              <tr>
                <td valign="top">UNDER DEVELOPMENT</td>
	        <td valign="top"></td>
              </tr>
            </table>
            <?php echo $this->_tpl_vars['endtab']; ?>

            <?php echo $this->_tpl_vars['starttab3']; ?>

            <table>
              <tr>
                <td valign="top">UNDER DEVELOPMENT</td>
                <td valign="top"></td>
              </tr>
            </table>
            <?php echo $this->_tpl_vars['endtab']; ?>

            <?php echo $this->_tpl_vars['endpane']; ?>

          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>