<?php /* Smarty version 2.6.26, created on 2010-07-06 00:04:59
         compiled from admin_maintenance.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
	<script type="text/javascript">
	function confirm_thumb()
	{
	var r=confirm("You are about to re-generate your thumbnail images.\\nYou must run the converter tool after clikcing OK.\\nAre you sure you wish to continue?");
	if (r==true)
	  {
	  window.location = "'; ?>
<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
<?php echo '/administrator/index.php?option=com_hwdvideoshare&task=regeneratethumbnails"
	  return false;
	  }
	else
	  {
	  return false;
	  }
	}
	function confirm_duration()
	{
	var r=confirm("You are about to re-calculate your video durations.\\nYou must run the converter tool after clikcing OK.\\nAre you sure you wish to continue?");
	if (r==true)
	  {
	  window.location = "'; ?>
<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
<?php echo '/administrator/index.php?option=com_hwdvideoshare&task=recalculatedurations"
	  return false;
	  }
	else
	  {
	  return false;
	  }
	}
	</script>
	<script language="javascript" type="text/javascript">
	<!--
	function ajaxArchiveLogs ( )
	{
		document.getElementById(\'ajax_log_response\').innerHTML = "<img src=\\"'; ?>
<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
<?php echo '/components/com_hwdvideoshare/assets/images/processing.gif\\" border=\\"0\\" alt=\\"\\" title=\\"\\"> Working...";
		document.getElementById(\'archiveLogBox\').innerHTML = "";
		setInterval( "ajaxArchiveLogsRun()", 60000 );
	}

	//Browser Support Code
	function ajaxArchiveLogsRun(){

		document.getElementById(\'ajax_log_response\').innerHTML = "<img src=\\"'; ?>
<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
<?php echo '/components/com_hwdvideoshare/assets/images/processing.gif\\" border=\\"0\\" alt=\\"\\" title=\\"\\"> Working...";

		var ajaxRequest;  // The variable that makes Ajax possible!

		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
		// Create a function that will receive data sent from the server
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){
				document.getElementById(\'ajax_log_response\').style.padding = "2px 0 2px 0";
				document.getElementById(\'ajax_log_response\').innerHTML = ajaxRequest.responseText;
			}
		}
		ajaxRequest.open("GET", "'; ?>
<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
<?php echo '/administrator/index.php?option=com_hwdvideoshare&task=ajax_ArchiveLogs", true);
		ajaxRequest.send(null);
	}

	//-->
	</script>
'; ?>


<table cellpadding="0" cellspacing="0" border="0" width="100%">
  <tr>
    <td align="left" valign="top" width="50%">
      
      <div style="border: 1px solid #ccc; padding: 5px; margin: 0 5px 5px 0;">
      
          <h2><?php echo @_HWDVIDS_TITLE_DELETEOLDVIDS; ?>
</h2>
          <p><?php echo @_HWDVIDS_INFO_PERMDEL1; ?>
</p>
          <p><?php echo @_HWDVIDS_INFO_PERMDEL2; ?>
 <b><?php echo $this->_tpl_vars['total']; ?>
</b> <?php echo @_HWDVIDS_INFO_PERMDEL3; ?>
</p>
          <select name="run_permdel">
            <option value="1" selected="selected"><?php echo @_HWDVIDS_MAIN_RN; ?>
</option>
            <option value="0"><?php echo @_HWDVIDS_MAIN_DRN; ?>
</option>
          </select>
          &nbsp;<img src="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/components/com_hwdvideoshare/assets/images/icons/run.png" border="0" alt="<?php echo @_HWDVIDS_MAIN_RN; ?>
" style="cursor:pointer;" onclick="submitform('runmaintenance');" />

      </div>
      
    </td>
    <td align="left" valign="top">
      
      <div style="border: 1px solid #ccc; padding: 5px; margin: 0 0 5px 0;">
      
          <h2><?php echo @_HWDVIDS_MAIN_FDE; ?>
</h2>
          <p><b><?php echo @_HWDVIDS_MAIN_LR; ?>
 <?php echo $this->_tpl_vars['fixerror_cache']; ?>
</b></p>
          <select name="run_fixerrors">
            <option value="2"><?php echo @_HWDVIDS_MAIN_RIR; ?>
</option>
            <option value="1" selected="selected"><?php echo @_HWDVIDS_MAIN_RN; ?>
</option>
            <option value="0"><?php echo @_HWDVIDS_MAIN_DRN; ?>
</option>
          </select>
          &nbsp;<img src="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/components/com_hwdvideoshare/assets/images/icons/run.png" border="0" alt="<?php echo @_HWDVIDS_MAIN_RN; ?>
" style="cursor:pointer;" onclick="submitform('runmaintenance');" />

      </div>
      
    </td>
    <td align="left" valign="top">
  </tr>
  <tr>
    <td align="left" valign="top" width="50%">

      <div style="border: 1px solid #ccc; padding: 5px; margin: 0 5px 5px 0;">
      
          <h2><?php echo @_HWDVIDS_MAIN_RDS; ?>
</h2>
          <p><b><?php echo @_HWDVIDS_MAIN_LR; ?>
 <?php echo $this->_tpl_vars['recount_cache']; ?>
</b></p>
          <select name="run_recount">
            <option value="2"><?php echo @_HWDVIDS_MAIN_RIR; ?>
</option>
            <option value="1" selected="selected"><?php echo @_HWDVIDS_MAIN_RN; ?>
</option>
            <option value="0"><?php echo @_HWDVIDS_MAIN_DRN; ?>
</option>
          </select>  
          &nbsp;<img src="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/components/com_hwdvideoshare/assets/images/icons/run.png" border="0" alt="<?php echo @_HWDVIDS_MAIN_RN; ?>
" style="cursor:pointer;" onclick="submitform('runmaintenance');" />
          
      </div>

    </td>
    <td align="left" valign="top">
      
      <div style="border: 1px solid #ccc; padding: 5px; margin: 0 0 5px 0;">
      
          <span id="archiveLogBox" style="cursor:pointer;float:right;" onclick="ajaxArchiveLogs()"><img src="components/com_hwdvideoshare/assets/images/menu/maintenance.png" border="0" alt="" title="" style="padding:1px 5px;vertical-align:bottom;" /><b><?php echo @_HWDVIDS_MAIN_AAL; ?>
</b></span>
          <h2><?php echo @_HWDVIDS_MAIN_AAL; ?>
</h2>
          <p><b><?php echo @_HWDVIDS_MAIN_LR; ?>
 <?php echo $this->_tpl_vars['archive_cache']; ?>
</b></p>
          <div id="ajax_log_response"></div>
          
      </div>
      
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" width="50%">

      <div style="border: 1px solid #ccc; padding: 5px; margin: 0 5px 5px 0;">
      
          <h2><?php echo @_HWDVIDS_REGENTHUMB; ?>
</h2>
          <div style="padding:5px;">
            <a href="#">
              <img src="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/components/com_hwdvideoshare/assets/images/go.png" border="0" alt="<?php echo @_HWDVIDS_MAIN_RN; ?>
" onclick="confirm_thumb();"  />
            </a>
          </div>   
          
      </div>

    </td>
    <td align="left" valign="top">

      <div style="border: 1px solid #ccc; padding: 5px; margin: 0 5px 5px 0;">
      
          <h2><?php echo @_HWDVIDS_RECALDUR; ?>
</h2>
          <div style="padding:5px;">
            <a href="#">
              <img src="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/administrator/components/com_hwdvideoshare/assets/images/go.png" border="0" alt="<?php echo @_HWDVIDS_MAIN_RN; ?>
" onclick="confirm_duration();" />
            </a>
          </div>    
          
      </div>
      
    </td>
  </tr>  
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>