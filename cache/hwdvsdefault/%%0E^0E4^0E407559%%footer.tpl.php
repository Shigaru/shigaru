<?php /* Smarty version 2.6.26, created on 2011-09-04 00:22:30
         compiled from footer.tpl */ ?>

<?php if ($this->_tpl_vars['print_ads']): ?><?php if ($this->_tpl_vars['advert5']): ?><div id="hwdadverts-padding"><?php echo $this->_tpl_vars['advert5']; ?>
</div><?php endif; ?><?php endif; ?>

<div class="footer">
<a href="<?php echo $this->_tpl_vars['rss_recent']; ?>
" style="float:right;">
<img src="<?php echo $this->_tpl_vars['URL_HWDVS_IMAGES']; ?>
rss.png" border="0" alt="RSS" title="RSS" />
</a>

<div style="clear:both;"></div></div>

</div>

<?php if ($this->_tpl_vars['print_mb_initialize']): ?>
<?php echo '
<script type="text/javascript">
	var box = {};
	window.addEvent(\'domready\', function(){
		box = new MultiBox(\'mb\');
	});
</script>
'; ?>

<?php endif; ?>