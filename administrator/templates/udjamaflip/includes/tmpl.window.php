<?php if (!empty($_GET['udjaurl']))	{ ?> 
	<script type="text/javascript">
	jQuery.noConflict();
	jQuery(document).ready(function ($) {
			addWindow(1, 2, '<?php echo $_GET['udjaurl']; ?>', jQuery.udjaParams.width+'-'+jQuery.udjaParams.height+'-'+jQuery.udjaParams.xPosition+'-'+jQuery.udjaParams.yPosition, '');
		});
	</script>
<?php } ?>