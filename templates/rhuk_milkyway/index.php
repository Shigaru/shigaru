<?php
/**
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
$headerstuff = $this->getHeadData();
$headerstuff['scripts'] = array();
$this->setHeadData($headerstuff);
$this->addScript($this->baseurl."/templates/rhuk_milkyway/js/jquery-1.7.2.min.js");
$this->addScript($this->baseurl."/templates/rhuk_milkyway/js/jquery.autocomplete.min.v1.0.2.js");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" /> 
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template.min.v3.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/jquery.qtip.min.css" />
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/font-awesome-ie7.css">
<![endif]-->
<?php
$session = JSession::getInstance("none",array());
$host = JURI::root();
$lang = JFactory::getLanguage();
$currentLang = substr($lang->getTag(),0,2);
?>
<script type="text/javascript">
var currentLang = "<?php echo $currentLang ?>";
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-768264-1']);
  _gaq.push(['_setDomainName', 'shigaru.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body id="page_bg">
<a name="up" id="up"></a>
<header> 
	<div id="head" class="clearfix">
		<div id="head_content" class="clearfix">
			<div id="head_logo" class="clearfix fleft">
				<div class="clearfix" >
					<div class="fleft mright12" >
						<a href="index.php?option=com_hwdvideoshare&task=frontpage&lang=<?php echo $currentLang ?>" title="<?php echo JText::_('Shigaru.com Home page') ?>">
							<img height="63" width="65" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/images/head_logo_new.png" alt="<?php echo JText::_('Shigaru.com') ?>" />
						</a>
					</div>	
					<div class="fleft" >
						<a class="f150 fontsig fontbold tdecnone" id="head_title_text" href="index.php?option=com_hwdvideoshare&task=frontpage&lang=<?php echo $currentLang ?>" title="<?php echo JText::_('Shigaru.com Home page') ?>">
							<h1>SHIGARU</h1>
						</a>
						<div class="clearfix btn-group">
							<div class="f16px">
								<jdoc:include type="modules" name="in-content" />
							</div>
						</div>
						<div id="head_comm_text fontsig" class="fleft f60 fnone"><?php echo JText::_('HWDVIDS_SHIGARU_SHARINGMUSIKNOW') ?></div>
					</div>	
				</div>		
				
			</div>
			
			
				
			<div id="nav_browse" class="clearfix fleft mtop12 mleft20 mright20 w30">
									
									<form method="get" action="index.php?option=com_hwdvideoshare&task=displayresults" class="form-wrapper cf" id="rokajaxsearch" name="rokajaxsearch">
										<input type="text" placeholder="<?php echo JText::_('HWDVIDS_SHIGARU_SEARCHBSG') ?>" name="pattern" id="roksearch_search_str">
										<button type="submit"><?php echo JText::_('HWDVIDS_SHIGARU_SEARCH') ?></button>
										<input type="hidden" value="20" name="limit">
										<input type="hidden" value="<?php echo $currentLang ?>" id="lang" name="lang">
										<input type="hidden" value="displayresults" name="task">
										<input type="hidden" value="28" name="Itemid">
										<input type="hidden" value="com_hwdvideoshare" name="option">
									</form>
					</div>	
				
					
				<div id="topnavmenu" class="fright clearfix w33">
					<div class="fright w100">
					<?php
						global $_CB_framework, $ueConfig, $mainframe;
						include_once( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' );
						include_once( $mainframe->getCfg( 'absolute_path' ) . '/components/com_comprofiler/plugin/user/plug_cbmenu/cb.menu.php' );
			
						cbimport( 'cb.html' );
						$user =& JFactory::getUser();
						$cbUser =& CBuser::getInstance( $user->id );
						
						if ($user && !$user->guest)
						echo '<div class="greetinguser"></div>';
						?>
						<jdoc:include type="modules" name="top" />
														
						<?php					
						if ($user && !$user->guest){
								echo '<div id="grettings" class="fontsig btn-group mright12">';
								echo '<a href="#" class="btn primary mtop12 f16px curpointer"> <img src="'.$cbUser->getField( 'avatar' , null, 'csv', 'div', 'profile' ).'" height="20" /> <span class="f12em"> ';
								echo $user->username;
								echo '</span> <span class="icon-caret-down"></span></a>';
								echo '<ul class="dropdown-menu">
											<li><a href="index.php?option=com_comprofiler&Itemid=53&lang='.$currentLang.'"><span class="icon-user-md"></span> '. JText::_('HWDVIDS_SHIGARU_VIEWPROFILE').'</a></li>
											<li><a href="index.php?option=com_comprofiler&Itemid=53&task=userDetails&lang='.$currentLang.'"><span class="icon-edit"></span> '. JText::_('HWDVIDS_SHIGARU_EDITPROFILE').'</a></li>
											<li><a href="index.php?option=com_uddeim&Itemid=&task=inbox&lang='.$currentLang.'"><span class="icon-envelope"></span> '. JText::_('HWDVIDS_SHIGARU_MESSAGES').'</a></li>
											<li class="divider"></li>
											<li><a href="index.php?option=com_comprofiler&task=logout&lang='.$currentLang.'&guid='.$user->id.'"><span class="icon-off"></span> '. JText::_('HWDVIDS_SHIGARU_LOGOUT').'</a></li>
										  </ul>';
								echo '</div>';
								
							}?>
							 <?php
								echo '<a class="btn mright12 mtop12 tdecnone f16px btn-danger" href="'.JRoute::_("index.php?option=com_hwdvideoshare&task=upload&lang=".$currentLang).'"> <i class="icon-share"></i> <span class="">'. JText::_('HWDVIDS_SHIGARU_SHAREVIDEO').'</span> </a>';
							?>
					</div>
				</div>
			<nav> 
				<div id="nav_tabs" class="clearfix">	
					<jdoc:include type="modules" name="user3" />
				</div>
			</nav> 
			</div>	

	</div>	
</header> 

</div>
<div id="sectionwrap" class="clearfix">
	<section> 
		<div class="clear"></div>
		
			<div class="workarea">
				<div class="workarea_wrapper">
					<div class="mleft12 mright12 clearfix">
			<jdoc:include type="message" />
			<jdoc:include type="modules" name="left" style="rounded" />
			<jdoc:include type="component" />
			<jdoc:include type="modules" name="footer" style="xhtml"/>
			<jdoc:include type="modules" name="right" style="xhtml"/>
			<jdoc:include type="modules" name="debug" />
			<jdoc:include type="modules" name="chat" />
			</div>
			</div>
		</div>
	</section> 

	<footer>
		<div id="footer_topborder"></div>
		<div id="footer">
			<div id="footer_content">
				<div id="leftcolumn">
					<div class="mleft12">
						<h3><?php echo JText::_('HWDVIDS_SHIGARU_STAYTOUCH'); ?></h3>
						<div>
							<ul>
								<li>
									<a href="http://www.facebook.com/ShigaruCommunity" target="_blank" title="Follow us on Facebook"><div class="facebook"><span class="dispnon">Facebook</span></div></a>
								</li>
								<li>
									<a href="http://twitter.com/shigaru" target="_blank" title="Follow us on Twitter"><div class="twitter"><span class="dispnon">Twitter</span></div></a>
								</li>
								<li>
									<a href="http://twitter.com/shigaru" target="_blank" title="Follow us on Google"><div class="google"><span class="dispnon">Google</span></div></a>
								</li>
								<li>
									<a href="http://www.stumbleupon.com/stumbler/Shigaru" target="_blank" title="Follow us on Stumbleupon"><div class="stumbleupon"><span class="dispnon">Stumbleupon</span></div></a>
								</li>
							</ul>
						</div>
					</div>
					
				</div>
				<div id="rightcolmn">
					<div>
						<h3><?php echo JText::_('HWDVIDS_SHIGARU_SUBSNEWSLETT'); ?></h3>
						<jdoc:include type="modules" name="subscribelink" /> 
						</div>
					
					<div class="clear w75">
						<p>"<?php echo JText::_('HWDVIDS_SHIGARU_WITHOUMUSIC'); ?>."</p>
						<span class="fright tItalic">Friedrich Nietzsche</span>
					</div>
				</div>
				<div class="clear">
					<div class="shigarulogo"></div>
					 <nav> 
						<div class="footer_links">
							<ul class="menu">
								<li class="active item64"><a href="index.php?option=com_hwdvideoshare&task=frontpage&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_HOMEPAGE'); ?></span></a></li>
								<li class="item54"><a href="index.php?option=com_content&Itemid=18&id=47&view=article&format=html&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_THEIDEA'); ?></span></a></li>
								<li class="item57"><a href="index.php?option=com_content&Itemid=57&id=51&view=article&format=html&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_ABOUTUS'); ?></span></a></li>
								<li class="item58"><a href="index.php?option=com_content&Itemid=58&id=48&view=article&format=html&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_PRIVPOLICY'); ?></span></a></li>
								<li class="item59"><a href="index.php?option=com_content&Itemid=59&id=49&view=article&format=html&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_TERMSUSE'); ?></span></a></li>
								<li class="item60"><a href="index.php?option=com_content&Itemid=60&id=52&view=article&format=html&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_TELLFRIEND'); ?></span></a></li>
								<li class="item61"><a href="index.php?option=com_shigarucontact&view=shigarucontact&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_CONTACTUS'); ?></span></a></li>
								<li class="item65"><a href="index.php?option=com_content&Itemid=65&id=55&view=article&format=html&lang=<?php echo $currentLang ?>"><span><?php echo JText::_('HWDVIDS_SHIGARU_DONATIONS'); ?></span></a></li>
							</ul>
						</div>
					</nav>	
					<div class="copyright">&reg; 2014 Shigaru.com. &copy; <?php echo JText::_('HWDVIDS_SHIGARU_ALLRIGHTS'); ?>. <?php echo JText::_('HWDVIDS_SHIGARU_CONTACT'); ?>: <a href="mailto:info@shigaru.com">info@shigaru.com</a></div>
				</div>
			</div>
		</div>
	</footer>
</div>		
<div id="communitytooltip" class="dispnon"></div>
<div id="main-nav-drop" class="closed dispnon loadingcontent">
		<i class="icon-spinner icon-spin"></i>
</div>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/shigaru.min.v2.0.2.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.blockUI.min.js"></script>
</body>
</html>
