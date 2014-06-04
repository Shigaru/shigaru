<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
$lang = JFactory::getLanguage();
$currentLang = substr($lang->getTag(),0,2);
?>
<script type="text/javascript">
var currentLang = "<?php echo $currentLang ?>";
</script>
<div class="workarea clearfix">
	<div class="clearfix">
		
		<div class="fleft w67">
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
			<div class="content_box">
				<div class="boxwhite clearfix pad12">
					<div class="clearfix">
						<img class="fleft" src="templates/rhuk_milkyway/images/logoicon.png" alt="<?php echo JText::_('SHIGARU_SHIGARULOGO'); ?>" />
						<div class="fleft">
							<div class="clearfix">
								<h6 class="fleft f150 fontbold mleft12"><?php echo JText::_('SHIGARU_JUSTTUTOS'); ?></h6>
								<div class="fleft mleft6">
									<i class="icon-ok fontgreen f150"></i>
								</div>
							</div>
							<div class="clearfix fnone mleft12 mtop12">
								<ul>
									<li><?php echo JText::_('SHIGARU_NOCOVER'); ?> <i class="icon-remove fontred"></i></li>
									<li><?php echo JText::_('SHIGARU_NOIMPROVISATIONS'); ?> <i class="icon-remove fontred"></i></li>
									<li><?php echo JText::_('SHIGARU_NOPLAYALNGS'); ?> <i class="icon-remove fontred"></i></li>
								</ul>
							</div>
					</div>
					<div class="clearfix">
						<h6 class="fleft pad12 w100 tcenter"><?php echo JText::_('SHIGARU_LOGINPROMOTIONHOME'); ?></h6>
					</div>
					
				</div>
			</div>
			<div class="clearfix boxwhite mtop20 pad12 fontdarkgrey">
						<div id="statistics">Site Statistics</div>
							<div class="f90 bradius5 clearfix">
								<div class="fleft f120 w40">
									<div class="fontbold f110 mtop6">Total Videos:</div>
									<div class="fontorange fontbold f120 w80pc tright"><?php echo $this->oTotalVideosCount; ?></div>
								</div>	
								<div class="fright padright12 clearfix w45">	
									<div class="clearfix">
										<div class="w60 tleft fleft">Song Tutorials:</div>
										<div class="fontorange fontbold w30 tright fleft"><?php echo $this->oTotalTutosVideosCount; ?></div>
									</div>
									<div class="clearfix">
										<div class="w60 tleft fleft">Theory:</div>
										<div class="fontorange fontbold w30 tright fleft"><?php echo $this->oTotalTheoryVideosCount; ?></div>
									</div>
									<div class="clearfix">
										<div class="w60 tleft fleft">Instruments:</div>
										<div class="fontorange fontbold w30 tright fleft"><?php echo $this->oTotalWatchmeVideosCount; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
	</div>			
</div>
<input type="hidden" id="currentlang" name="currentlang" value="<?php echo $currentLang ?>"/>
<link rel="stylesheet" href="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.theme.css">
<script src="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.carousel.js"></script>
<script src="components/com_shigaruhome/views/shigaruhome/tmpl/js/shigaruhome.js"></script>
