<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
$lang = JFactory::getLanguage();
$currentLang = substr($lang->getTag(),0,2);
?>
<script type="text/javascript">
var currentLang = "<?php echo $currentLang ?>";
</script>
<div class="workarea clearfix">
	<div class="workarea_wrapper">
		
		<div class="fleft w70">
			<div class="content_box">
					
					<h3><?php echo JText::_('SHIGARU_THEMOST'); ?></h3>
					
					
					<h4><?php echo JText::_('SHIGARU_LIKED'); ?></h4>
							
					<div id="owl-demo" class="owl-carousel">
						<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					</div>
							
					<h4><?php echo JText::_('SHIGARU_PLAYLIST'); ?></h4>
							
					<div id="owl-demo2" class="owl-carousel">
						<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					</div>
					
					<h4><?php echo JText::_('SHIGARU_NEW'); ?></h4>
							
					<div id="owl-demo3" class="owl-carousel">
						<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					</div>		
					
					<h4><?php echo JText::_('SHIGARU_NEW'); ?></h4>
							
					<div id="owl-demo4" class="owl-carousel">
						<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					</div>		
			</div>	
		</div>
		<div class="fright w30">
			<div id="random_video" class="content_box">
				
			</div>
		</div>
	</div>			
</div>
<link rel="stylesheet" href="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.theme.css">
<script src="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.carousel.js"></script>
<script src="components/com_shigaruhome/views/shigaruhome/tmpl/js/shigaruhome.js"></script>
