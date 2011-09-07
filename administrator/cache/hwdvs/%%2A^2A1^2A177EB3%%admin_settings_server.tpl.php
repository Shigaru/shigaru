<?php /* Smarty version 2.6.26, created on 2010-06-26 07:59:34
         compiled from admin_settings_server.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div style="border: solid 1px #333;margin:5px 0 5px 0;padding:5px;text-align:left;font-weight:bold;"><?php echo @_HWDVIDS_INFO_CONFIGF1; ?>
 <?php echo $this->_tpl_vars['config_file_status']; ?>
</div>
<div>
  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="adminform">
    <tr>
      <td colspan="3" align="left"><h2><?php echo @_HWDVIDS_TITLE_SS; ?>
</h2></td>
    </tr>
    <tr>
      <td align="left" valign="top" width="20%"><b><?php echo @_HWDVIDS_PATHFFMPEG; ?>
</b></td>
      <td align="left" valign="top" width="20%"><input type="text" name="ffmpegpath" value="<?php echo $this->_tpl_vars['s']->ffmpegpath; ?>
" size="40" maxlength="100"></td>
      <td align="left" valign="top" width="60%"><?php echo @_HWDVIDS_SETT_PATHFFMPEG_DESC; ?>
</td>
    </tr>
    <tr>
      <td align="left" valign="top" width="20%"><b><?php echo @_HWDVIDS_PATHFLVTOOL2; ?>
</b></td>
      <td align="left" valign="top" width="20%"><input type="text" name="flvtool2path" value="<?php echo $this->_tpl_vars['s']->flvtool2path; ?>
" size="40" maxlength="100"></td>
      <td align="left" valign="top" width="60%"><?php echo @_HWDVIDS_SETT_PATHFLVTOOL2_DESC; ?>
</td>
    </tr>
    <tr>
      <td align="left" valign="top" width="20%"><b><?php echo @_HWDVIDS_PATHMENCODER; ?>
</b></td>
      <td align="left" valign="top" width="20%"><input type="text" name="mencoderpath" value="<?php echo $this->_tpl_vars['s']->mencoderpath; ?>
" size="40" maxlength="100"></td>
      <td align="left" valign="top" width="60%"><?php echo @_HWDVIDS_SETT_PATHMENCODER_DESC; ?>
</td>
    </tr>
    <tr>
      <td align="left" valign="top" width="20%"><b><?php echo @_HWDVIDS_PATHPHP; ?>
</b></td>
      <td align="left" valign="top" width="20%"><input type="text" name="phppath" value="<?php echo $this->_tpl_vars['s']->phppath; ?>
" size="40" maxlength="100"></td>
      <td align="left" valign="top" width="60%"><?php echo @_HWDVIDS_SETT_PATHPHP_DESC; ?>
</td>
    </tr>
    <tr>
      <td align="left" valign="top" width="20%"><b><?php echo @_HWDVIDS_PATHWGET; ?>
</b></td>
      <td align="left" valign="top" width="20%"><input type="text" name="wgetpath" value="<?php echo $this->_tpl_vars['s']->wgetpath; ?>
" size="40" maxlength="100"></td>
      <td align="left" valign="top" width="60%"><?php echo @_HWDVIDS_SETT_PATHWGET_DESC; ?>
</td>
    </tr>
  </table>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>