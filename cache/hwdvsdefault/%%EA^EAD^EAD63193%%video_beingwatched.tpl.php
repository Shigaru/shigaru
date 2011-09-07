<?php /* Smarty version 2.6.26, created on 2011-09-07 00:44:24
         compiled from video_beingwatched.tpl */ ?>

<?php if ($this->_tpl_vars['print_nowlist'] == 2): ?>

<div class="standard">
  <h2><?php echo @_HWDVIDS_BWN; ?>
</h2>
  <center>
    <?php echo $this->_tpl_vars['bwn_modContent']; ?>

  </center>
</div>

<?php else: ?>

<div class="standard">
  <h2><?php echo @_HWDVIDS_BWN; ?>
</h2>
  <center>
    <div id="<?php echo $this->_tpl_vars['iCID']; ?>
">
      <ul id="<?php echo $this->_tpl_vars['iCID']; ?>
_content" class="jcarousel-skin-tango">  
        <?php $_from = $this->_tpl_vars['nowlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
        <li>
                <?php echo $this->_tpl_vars['data']->thumbnail; ?>

                <div class="desc <?php echo $this->_tpl_vars['iCID']; ?>
_item">
                    
                </div>
        </li>
        <?php endforeach; endif; unset($_from); ?>
      </ul>  
    </div> 
  </center>
</div>

<?php endif; ?>








 