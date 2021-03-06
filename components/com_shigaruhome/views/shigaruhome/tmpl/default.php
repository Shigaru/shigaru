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
					<div class="loadingcontent f90" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-thumbs-up"></i> <?php echo JText::_('LIKED'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
								<div class="fleft mright6 btn-group">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu sortby">
									<li><a href="#"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">Date</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Rating</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Views</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Comments</span></a></li>
								  </ul>
								</div>
								<div class="fleft btn-group">
									  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filter</span> <span class="icon-caret-down fontblack"></span></a>
									  <ul class="dropdown-menu filter">
										<li><a href="#" class="nodrop"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">No filter</span></a></li>
										<li>
											<a><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a>
											 <ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Song Tutorials</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Theory</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Watch Me Play</span></a></li>
											  </ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Absolute Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Upper Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Expert</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Date</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Anytime</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Week</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Month</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Year</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Duration</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>All</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Short videos (1-3min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Medium videos (3-10min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Long videos (+10min)</span></a></li>
											</ul>
										</li>
									  </ul>
								</div>
							</div>
							<div class="fleft">
								  <a class="btn btn-small mtop2 mright6 mleft6" href="#"><i class="fontblack icon-caret-down"></i> <span class="fontblack"></span></a>
							</div>
					</div>
					
						
					<div id="shigaruowlliked" class="owl-carousel mbot12">
					</div>
							
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-eye-open"></i> <?php echo JText::_('BWN'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
								<div class="fleft mright6 btn-group">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu sortby">
									<li><a href="#"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">Date</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Rating</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Views</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Comments</span></a></li>
								  </ul>
								</div>
								<div class="fleft btn-group">
									  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filter</span> <span class="icon-caret-down fontblack"></span></a>
									  <ul class="dropdown-menu filter">
										<li><a href="#" class="nodrop"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">No filter</span></a></li>
										<li>
											<a><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a>
											 <ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Song Tutorials</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Theory</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Watch Me Play</span></a></li>
											  </ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Absolute Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Upper Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Expert</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Date</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Anytime</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Week</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Month</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Year</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Duration</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>All</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Short videos (1-3min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Medium videos (3-10min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Long videos (+10min)</span></a></li>
											</ul>
										</li>
									  </ul>
								</div>
							</div>
							<div class="fleft">
								  <a class="btn btn-small mtop2 mright6 mleft6" href="#"><i class="fontblack icon-caret-down"></i> <span class="fontblack"></span></a>
							</div>
					</div>		
					<div id="shigaruowlbwnow" class="owl-carousel mbot12">
					</div>
					
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-star"></i> <?php echo JText::_('MOST_RATED'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
								<div class="fleft mright6 btn-group">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu sortby">
									<li><a href="#"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">Date</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Rating</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Views</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Comments</span></a></li>
								  </ul>
								</div>
								<div class="fleft btn-group">
									  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filter</span> <span class="icon-caret-down fontblack"></span></a>
									  <ul class="dropdown-menu filter">
										<li><a href="#" class="nodrop"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">No filter</span></a></li>
										<li>
											<a><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a>
											 <ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Song Tutorials</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Theory</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Watch Me Play</span></a></li>
											  </ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Absolute Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Upper Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Expert</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Date</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Anytime</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Week</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Month</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Year</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Duration</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>All</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Short videos (1-3min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Medium videos (3-10min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Long videos (+10min)</span></a></li>
											</ul>
										</li>
									  </ul>
								</div>
							</div>
							<div class="fleft">
								  <a class="btn btn-small mtop2 mright6 mleft6" href="#"><i class="fontblack icon-caret-down"></i> <span class="fontblack"></span></a>
							</div>
					</div>			
					<div id="shigaruowlrated" class="owl-carousel">
					</div>		
					
					<div class="clearfix borbotgrey mbot6 backgreysoft">
						<h4 class="fleft fontblack pad6"><i class="icon-star"></i> <?php echo JText::_('MOST_RECENT'); ?></h4>
						<div class="clearfix fright mbot6 mtop6 mright6">
								<div class="fleft mright6 btn-group">
								  <a class="btn btn-small" href="#"><i class="fontblack icon-list-ol"></i> <span class="fontblack">Sorty by:</span> <span class="fontblack fontbold">Date</span> <span class="icon-caret-down fontblack"></span></a>
								  <ul class="dropdown-menu sortby">
									<li><a href="#"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">Date</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Rating</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Views</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a></li>
									<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Comments</span></a></li>
								  </ul>
								</div>
								<div class="fleft btn-group">
									  <a class="btn btn-small" href="#"><i class="icon-filter fontblack"></i> <span class="fontblack">Filter:</span> <span class="fontbold fontblack">No filter</span> <span class="icon-caret-down fontblack"></span></a>
									  <ul class="dropdown-menu filter">
										<li><a href="#" class="nodrop"><i class="icon-fixed-width icon-chevron-right"></i> <span class="fontbold">No filter</span></a></li>
										<li>
											<a><i class="icon-fixed-width icon-angle-right"></i> <span>Category</span></a>
											 <ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Song Tutorials</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Theory</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Watch Me Play</span></a></li>
											  </ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Level</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Absolute Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Beginner</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Upper Intermediate</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Expert</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Date</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Anytime</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Week</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Month</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Last Year</span></a></li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Duration</span></a>
											<ul class="nested-dropdown-menu">
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>All</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Short videos (1-3min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Medium videos (3-10min)</span></a></li>
												<li><a href="#"><i class="icon-fixed-width icon-angle-right"></i> <span>Long videos (+10min)</span></a></li>
											</ul>
										</li>
									  </ul>
								</div>
							</div>
							<div class="fleft">
								  <a class="btn btn-small mtop2 mright6 mleft6" href="#"><i class="fontblack icon-caret-down"></i> <span class="fontblack"></span></a>
							</div>
					</div>			
					<div id="shigaruowlrecent" class="owl-carousel">
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
						
						<div class="mtop20">
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- newhomeside -->
									<ins class="adsbygoogle"
										 style="display:inline-block;width:300px;height:600px"
										 data-ad-client="ca-pub-1916456389191969"
										 data-ad-slot="9056190662"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
							</div>
					</div>
		</div>
	</div>			
</div>

<div class="mbot20 w70 tcenter">
	<a class="btn btn-large" href="#">
	  <i class="icon-plus-sign fontblack"></i> <span class="fontblack f90">Load More Suggestions</span>
	</a>
</div>

<input type="hidden" id="currentlang" name="currentlang" value="<?php echo $currentLang ?>"/>
<link rel="stylesheet" href="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.theme.css">
<script src="components/com_shigaruhome/views/shigaruhome/tmpl/owl-carousel/owl.carousel.js"></script>
<script src="components/com_shigaruhome/views/shigaruhome/tmpl/js/shigaruhome.js"></script>
