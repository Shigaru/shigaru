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
		
		<div class="fleft w67 borrightdottedgrey">
			<div class="content_box pad6 f120">
					<div id="the_most" class="mbot12">
						<div id="the_most_title">
							<h6><span class="fontbold"><?php echo JText::_('SHIGARU_THEMOST'); ?></span></h6>							
						</div>
					</div>
					
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-thumbs-up"></i> <?php echo JText::_('LIKED'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
							<div class="fleft mright6">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
							<div class="fleft">
								  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filters applied</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
						</div>
					</div>
					
						
					<div id="shigaruowlliked" class="owl-carousel mbot12">
						<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					</div>
							
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-eye-open"></i> <?php echo JText::_('BWN'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
							<div class="fleft mright6">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
							<div class="fleft">
								  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filters applied</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
						</div>
					</div>		
					<div id="shigaruowlbwn" class="owl-carousel mbot12">
						<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					</div>
					
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-star"></i> <?php echo JText::_('MOST_RATED'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
							<div class="fleft mright6">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
							<div class="fleft">
								  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filters applied</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
							<div class="fleft">
								  <a class="btn btn-small mtop2 mright6 mleft6" href="#"><i class="fontblack icon-caret-down"></i> <span class="fontblack"></span></a>
							</div>
						</div>
					</div>			
					<div id="shigaruowlrated" class="owl-carousel">
						<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					</div>		
					
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-star"></i> <?php echo JText::_('MOST_RECENT'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
							<div class="fleft mright6">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
							<div class="fleft">
								  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filters applied</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="#"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
									<li><a href="#"><i class="icon-fixed-width icon-ban-circle"></i> Ban</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="i"></i> Make admin</a></li>
								  </ul>
								</div>
						</div>
					</div>			
					<div id="shigaruowlrecent" class="owl-carousel">
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
						<h6 class="fleft pad12"><?php echo JText::_('SHIGARU_LOGINPROMOTIONHOME'); ?></h6>
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
