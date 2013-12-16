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
$this->addScript($this->baseurl."/templates/rhuk_milkyway/js/jquery.autocomplete.js");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/shigaru.js"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/jquery.qtip.min.css" />
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/font-awesome-ie7.css">
<![endif]-->
<?php
$session = JSession::getInstance("none",array());
$host = JURI::root();
?>
<script type="text/javascript">

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
<link rel="stylesheet" href="<?php echo $host; ?>freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
</head>
<body id="page_bg">
<a name="up" id="up"></a>
<header> 
	<div id="head" class="clearfix">
		<div id="head_content" class="clearfix">
			<div id="head_logo" class="fleft">
				<div class="fleft mright12" >
					<a href="/" title="<?php echo JText::_('Shigaru.com Home page') ?>">
						<img height="63" width="65" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/images/head_logo_new.png" alt="<?php echo JText::_('Shigaru.com') ?>" />
					</a>
				</div>	
				<div class="fleft" >
					<a class="f150 fontsig fontbold tdecnone" id="head_title_text" href="/" title="<?php echo JText::_('Shigaru.com Home page') ?>">
						<h1>SHIGARU</h1>
					</a>
					<span id="head_comm_text fontsig" class="f80"><?php echo JText::_('Sharing musical knowledge') ?></span>
				</div>		
				
			</div>
			
				
			<div id="nav_browse" class="fleft mtop12 mleft20 mright20 w40">
								<form method="get" action="index.php?option=com_hwdvideoshare&amp;task=search" class="form-wrapper cf" id="rokajaxsearch" name="rokajaxsearch">
										<input type="text" placeholder="Search bands, songs, genres,..." name="pattern" id="roksearch_search_str">
										<button type="submit">Search</button>
										<input type="hidden" value="20" name="limit">
										<input type="hidden" value="search" name="task">
										<input type="hidden" value="28" name="Itemid">
										<input type="hidden" value="com_hwdvideoshare" name="option">
									</form>
					</div>	
				
					
				<div id="topnavmenu" class="fright">
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
						echo '<div class="fleft mtop12 mright24"><a class="fontsig fontbold tdecnone" href="#"><i class="icon-share icon-large"></i> <span class="f120">'. JText::_('Share video').' </span></a></div>';
						echo '<div class="fleft mtop12 mright24" id="navdrop"><a class="fontsig f150 tdecnone" href="#" title="Click on this icon to display more options"><i class="icon-plus-sign"></i></a></div>';
						?>
								
						<?php					
						if ($user && !$user->guest){
								echo '<div id="grettings" class="fontsig btn-group mtopl6 mright12">';
								echo '<div class="mtop20 mleft6 f16px curpointer"><i class="f12em icon-user"></i> <span class="f12em"> ';
								echo $user->username;
								echo '</span></div>';
								echo '<ul class="dropdown-menu">
											<li><a href="index.php?option=com_comprofiler&Itemid=53"><span class="icon-user-md"></span>View Profile</a></li>
											<li><a href="index.php?option=com_comprofiler&Itemid=53&task=userDetails"><span class="icon-edit"></span>Edit Profile</a></li>
											<li><a href="index.php?option=com_uddeim&Itemid=&task=inbox"><span class="icon-envelope"></span>Inbox</a></li>
											<li class="divider"></li>
											<li><a href="index.php?option=com_hwdvideoshare&task=yourvideos"><span class="icon-headphones"></span>My Videos</a></li>
											<li><a href="index.php?option=com_hwdvideoshare&task=yourfavourites"><span class="icon-heart"></span>Videos I liked</a></li>
											<li class="divider"></li>
											<li><a href="index.php?option=com_comprofiler&task=logout"><span class="icon-off"></span>Logout</a></li>
										  </ul>';
								echo '</div>';
							}
							 
						
					?>
					
					
					
				</div>
				
			</div>	
		
	</div>	
</header> 

</div>
<div id="sectionwrap" class="clearfix">
	<nav> 
		<div id="nav_tabs" class="clearfix">	
			<jdoc:include type="modules" name="user3" />
		</div>
	</nav> 
	<section> 
		<div class="clear"></div>
		<div class="workarea">
			<div class="workarea_wrapper">
		<?php		
			  if ($user->get('guest') != 1 && $user->lastvisitDate == "0000-00-00 00:00:00")
			  {
				 //echo 'amos pichica';       
			  }		
		?>      
		<jdoc:include type="message" />
		<jdoc:include type="modules" name="left" style="rounded" />
		<jdoc:include type="component" />
		<jdoc:include type="modules" name="footer" style="xhtml"/>
		<jdoc:include type="modules" name="right" style="xhtml"/>
		<jdoc:include type="modules" name="debug" />
		<jdoc:include type="modules" name="chat" />
		</div>
		</div>
	</section> 

	<footer>
		<div id="footer_topborder"></div>
		<div id="footer">
			<div id="footer_content">
				<div id="leftcolumn">
					<div>
						<h3>Stay in touch</h3>
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
						<h3>Sign up for our Newsletters</h3>
						<jdoc:include type="modules" name="subscribelink" /> 
						</div>
					
					<div class="clear w75">
						<p>"Without music, life would be a mistake."</p>
						<span class="fright tItalic">Friedrich Nietzsche</span>
					</div>
				</div>
				<div class="clear">
					<div class="shigarulogo"></div>
					 <nav> 
						<div class="footer_links">
							
						</div>
					</nav>	
					<div class="copyright">&reg; 2012 Shigaru.com. &copy; All rights reserved. Contact: <a href="mailto:info@shigaru.com">info@shigaru.com</a></div>
				</div>
			</div>
		</div>
	</footer>
</div>		
<div id="communitytooltip" class="dispnon"></div>
<div id="main-nav-drop" class="dispnon loadingcontent">
		<i class="icon-spinner icon-spin"></i>
		<a class="frgith fontsig f150 tdecnone" href="#" title="Click on this icon to display more options"><i class="icon-minus-sign"></i></a>
</div>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.blockUI.min.js"></script>
</body>
</html>
