<?php /* Smarty version 2.6.26, created on 2011-09-11 04:16:14
         compiled from infomessage.tpl */ ?>

<?php if ($this->_tpl_vars['full']): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>

<div class="standard">
  <h2><?php echo $this->_tpl_vars['title']; ?>
</h2>
  <div class="padding">
    <img src="<?php echo $this->_tpl_vars['icon']; ?>
" border="0" style="vertical-align:middle;" />&nbsp;&nbsp;<?php echo $this->_tpl_vars['message']; ?>
<br /><br />
    <?php echo $this->_tpl_vars['backlink']; ?>

  </div>
</div>

<?php if ($this->_tpl_vars['showconnectionbox']): ?>
<div class="standard">
  <h2><?php echo @_HWDVIDS_LB_GC; ?>
</h2>
  <div class="padding">

  <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
      <td valign="top">
        <div class="introduction">
          <ul id="featurelist">
            <li><?php echo @_HWDVIDS_LB_1; ?>
</li>
            <li><?php echo @_HWDVIDS_LB_2; ?>
</li>
            <li><?php echo @_HWDVIDS_LB_3; ?>
</li>
            <li><?php echo @_HWDVIDS_LB_4; ?>
</li>
          </ul>
          <div class="joinbutton">
            <a id="joinButton" href="<?php echo $this->_tpl_vars['url_register']; ?>
" title="<?php echo @_HWDVIDS_LB_JOIN; ?>
"><?php echo @_HWDVIDS_LB_JOIN; ?>
</a>
          </div>
        </div>
      </td>
      <td width="200">
        <div class="loginform">
<?php if ($this->_tpl_vars['j16']): ?>
<form action="<?php echo $this->_tpl_vars['JURL']; ?>
/index.php" method="post" id="login-form" >
	<fieldset class="userdata">
	<p id="form-login-username">
		<label for="modlgn-username"><?php echo @_HWDVIDS_LB_U; ?>
</label>
		<input id="modlgn-username" type="text" name="username" class="inputbox"  size="18" />
	</p>
	<p id="form-login-password">
		<label for="modlgn-passwd"><?php echo @_HWDVIDS_LB_P; ?>
</label>
		<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18"  />
	</p>
	<p id="form-login-remember">
		<label for="modlgn-remember"><?php echo @_HWDVIDS_LB_RM; ?>
</label>
		<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
	</p>
	<input type="submit" name="Submit" class="button" value="<?php echo @_HWDVIDS_LB_L; ?>
" />
	<input type="hidden" name="option" value="com_users" />
	<input type="hidden" name="task" value="user.login" />
	<input type="hidden" name="return" value="<?php echo $this->_tpl_vars['session_return']; ?>
" />
	<?php echo $this->_tpl_vars['session_token']; ?>

	</fieldset>
	<ul>
		<li>
			<a href="<?php echo $this->_tpl_vars['url_reset']; ?>
">
			<?php echo @_HWDVIDS_LB_FP; ?>
</a>
		</li>
		<li>
			<a href="<?php echo $this->_tpl_vars['url_remind']; ?>
">
			<?php echo @_HWDVIDS_LB_FU; ?>
</a>
		</li>
	</ul>
</form>
<?php else: ?>
          <form action="<?php echo $this->_tpl_vars['loginUrl']; ?>
" method="post" name="login" id="form-login" >
      
            <label>
              <?php echo @_HWDVIDS_LB_U; ?>
<br />
              <input type="text" class="inputbox" name="username" id="username" />
            </label>
      
            <label>
              <?php echo @_HWDVIDS_LB_P; ?>
<br />
              <input type="password" class="inputbox" name="passwd" id="password" />
            </label>
            
            <br />
      
            <label for="remember">
              <input type="checkbox" alt="<?php echo @_HWDVIDS_LB_RM; ?>
" value="yes" id="remember" name="remember"/>
              <?php echo @_HWDVIDS_LB_RM; ?>

            </label>
      
            <div style="text-align: left; padding: 10px 0 5px;">
              <input type="submit" value="<?php echo @_HWDVIDS_LB_L; ?>
" name="submit" id="submit" class="button" />
            </div>
    
            <a href="<?php echo $this->_tpl_vars['url_reset']; ?>
" class="login-forgot-password">
              <span><?php echo @_HWDVIDS_LB_FP; ?>
</span>
            </a>
            <br />
            <a href="<?php echo $this->_tpl_vars['url_remind']; ?>
" class="login-forgot-username">
              <span><?php echo @_HWDVIDS_LB_FU; ?>
</span>
            </a>

	    <input type="hidden" name="return" value="<?php echo $this->_tpl_vars['session_return']; ?>
" />
	    <?php echo $this->_tpl_vars['session_token']; ?>


          </form>
<?php endif; ?>
        </div>
      </td>
    </tr>
  </table>

  </div>
</div>

<?php endif; ?>

<?php if ($this->_tpl_vars['full']): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>