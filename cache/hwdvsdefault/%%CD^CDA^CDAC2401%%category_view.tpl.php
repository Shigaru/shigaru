<?php /* Smarty version 2.6.26, created on 2011-09-10 19:29:09
         compiled from category_view.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php if ($this->_tpl_vars['print_orderselect']): ?>
  <div style="float:right;text-align:right;padding:5px;">
    <?php echo '
    <script language="javaScript">
      function goto_sort(form) { 
        var index=form.select_order.selectedIndex
        if (form.select_order.options[index].value != "0") {
          location=form.select_order.options[index].value;
        }
      }
    </script>
    '; ?>

    <form name="redirect">
      <select name="select_order" onchange="goto_sort(this.form)" size="1">
        <option value="" selected="selected"><?php echo @_HWDVIDS_TITLE_ORDERING; ?>
</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=orderASC"><?php echo @_HWDVIDS_SELECT_ORDERING; ?>
 ASC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=orderDESC"><?php echo @_HWDVIDS_SELECT_ORDERING; ?>
 DESC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=dateASC"><?php echo @_HWDVIDS_SELECT_UPLDDATE; ?>
 ASC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=dateDESC"><?php echo @_HWDVIDS_SELECT_UPLDDATE; ?>
 DESC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=nameASC"><?php echo @_HWDVIDS_SELECT_NAME; ?>
 ASC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=nameDESC"><?php echo @_HWDVIDS_SELECT_NAME; ?>
 DESC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=hitsASC"><?php echo @_HWDVIDS_SELECT_HITS; ?>
 ASC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=hitsDESC"><?php echo @_HWDVIDS_SELECT_HITS; ?>
 DESC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=voteASC"><?php echo @_HWDVIDS_SELECT_RATING; ?>
 ASC</option>
        <option value="<?php echo $this->_tpl_vars['mosConfig_live_site']; ?>
/index.php?option=com_hwdvideoshare&Itemid=<?php echo $this->_tpl_vars['Itemid']; ?>
&task=viewcategory&cat_id=<?php echo $this->_tpl_vars['category_id']; ?>
&order=voteDESC"><?php echo @_HWDVIDS_SELECT_RATING; ?>
 DESC</option>
      </select>
    </form>
  </div>
  <?php endif; ?>
  <div style="clear:both;"></div>
   
<div class="standard">
  <h2><?php echo @_HWDVIDS_TITLE_CATEGORYVIDS; ?>
 (<?php echo $this->_tpl_vars['category_name']; ?>
)</h2>
    
  <?php if ($this->_tpl_vars['print_subcats']): ?>
  <?php echo '
  <script type="text/javascript">
 
  document.write(\'<style type="text/css">.tabber{display:none;}<\\/style>\');

  var tabberOptions = {

    \'manualStartup\':true,
 
    \'onLoad\': function(argsObj) {
      if (argsObj.tabber.id == \'tab2\') {
        alert(\'Finished loading tab2!\');
      }
    },

    \'onClick\': function(argsObj) {

      var t = argsObj.tabber; 
      var id = t.id; 
      var i = argsObj.index; 
      var e = argsObj.event;

      if (id == \'tab2\') {
        return confirm(\'Swtich\');
      }
    },

    \'addLinkId\': true

  };
  </script>
  '; ?>

  <script type="text/javascript" src="<?php echo $this->_tpl_vars['link_home']; ?>
/plugins/hwdvs-template/default/js/tabber.js"></script>
  
  <div class="tabber" id="tab1">
    <div class="tabbertab">
      <h2><a name="tab1"><?php echo @_HWDVIDS_VIDEOS; ?>
</a></h2>
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

        <div class="padding"><?php echo @_HWDVIDS_INFO_NCV; ?>
</div>

      <?php endif; ?>
      <?php echo $this->_tpl_vars['pageNavigation']; ?>

    </div>
    <div class="tabbertab <?php if ($this->_tpl_vars['defaultTab'] == 'subcategories'): ?>tabbertabdefault<?php endif; ?>">
      <h2><?php echo @_HWDVIDS_SUBCATS; ?>
</h2>
	<div class="standard">

	  <?php $_from = $this->_tpl_vars['subcatlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>

	    <?php if (($this->_foreach['outer']['iteration'] <= 1)): ?>
	      <div class="categoryBox"><div class="padding">
	    <?php elseif ($this->_tpl_vars['data']->level == 0): ?>
	      </div></div><div class="categoryBox"><div class="padding">      
	    <?php else: ?>
	    <?php endif; ?>

		  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "category_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		  <?php if (($this->_foreach['outer']['iteration'] == $this->_foreach['outer']['total'])): ?>
		   <div style="clear:both;"></div></div></div>
		  <?php elseif (($this->_foreach['outer']['iteration']-1) % $this->_tpl_vars['cpr']- ( $this->_tpl_vars['cpr']-1 ) == 0): ?>
		   <!--<div style="clear:both;"></div>-->
		  <?php endif; ?>

	    <?php if ($this->_tpl_vars['data']->level == 0): ?>
	    <?php else: ?>
	    <?php endif; ?>

	  <?php endforeach; endif; unset($_from); ?>
	  <div style="clear:both;"></div>

	</div>

      </div>
    </div>
  
  <?php else: ?>
  
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

      <div class="padding"><?php echo @_HWDVIDS_INFO_NCV; ?>
</div>
  
    <?php endif; ?>
    <?php echo $this->_tpl_vars['pageNavigation']; ?>

    
  <?php endif; ?>
  
</div>

<script type="text/javascript">
tabberAutomatic(tabberOptions);
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>