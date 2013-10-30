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
$this->addScript($this->baseurl."/modules/mod_rokajaxsearch/js/rokajaxsearch.js");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.blockUI.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/shigaru.js"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/jquery.qtip.min.css" />
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/font-awesome-ie7.css">
<![endif]-->
<?php
$session = JSession::getInstance("none",array());
$host = JURI::root();
$ses=$session->getId();
if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){	
	if ( defined( 'JPATH_SITE' ) ) {
       if(is_file(JPATH_SITE.'/freichat/arg.php')){
               require JPATH_SITE.'/freichat/arg.php';
               $temp_id =  $ses . $uid;
               return md5($temp_id);
       }else{
               echo "<script>alert('module freichatx says: arg.php file not found!');</script>";
       }
     }else{
              echo "<script>alert('module freichatx says: arg.php file not found!');</script>";
       }
    return 0;
   }
}
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
<div id="head" class="clearfix">
	<div id="head_content" class="clearfix">
		<div id="head_logo" class="fleft">
			<div class="fleft mright12" >
				<a href="/" title="<?php echo JText::_('Shigaru.com Home page') ?>">
					<img height="35" width="35" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/images/head_logo.png" alt="<?php echo JText::_('Shigaru.com') ?>" />
				</a>
			</div>	
			<div class="fleft" >
				<a class="f150 fontwhite fontbold mbot12 mtop12 tdecnone" id="head_title_text" href="/" title="<?php echo JText::_('Shigaru.com Home page') ?>">
					<h1>SHIGARU</h1>
				</a>
				<span id="head_comm_text" class="f80"><?php echo JText::_('The community for sharing musical knowledge') ?></span>
			</div>		
			
		</div>	
		<div id="nav_browse" class="fleft mtop12 mleft20 mright20">
					<div id="nav_browse_content">
						<div id="nav_browse_search">
							<div class="rokajaxsearch fleft">
								<form method="get" action="index.php?option=com_hwdvideoshare&amp;task=search" class="light" id="rokajaxsearch" name="rokajaxsearch">
									<div class="roksearch-wrapper">
										<input type="text" class="inputbox" placeholder="Search bands, songs, genres, instruments..." name="pattern" id="roksearch_search_str" autocomplete="off">
										<a href="#" class="f150 fontwhite fontbold mbot12 mtop12 tdecnone" title="Click on this icon to expand search options"><i class="icon-cog"></i></a>
									</div>
									<input type="hidden" value="20" name="limit">
									<input type="hidden" value="search" name="task">
									<input type="hidden" value="28" name="Itemid">
									<input type="hidden" value="com_hwdvideoshare" name="option">
								</form>
							</div>
						</div>	
					</div>
				</div>	
			<div class="fright">
				<a href="/" title="Click on this icon to expand the available options" class="f300 fontwhite fontbold mbot12 mtop12 tdecnone"><i class="icon-double-angle-down icon-3"></i></a>
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
					if ($user && !$user->guest){
							echo '<div id="grettings" class="btn-group mtopl6 mright12">';
							echo '<div class="mtop12 mleft6 f16px"><i class="f150 icon-female"></i> ';
							echo $user->username;
							echo '</div>';
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


</div>
<div id="nav_tabs" class="clearfix">	
	<jdoc:include type="modules" name="user3" />
</div>
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
			<div class="footer_links">
				<jdoc:include type="modules" name="pagefooter" /> 
			</div>
			<div class="copyright">&reg; 2012 Shigaru.com. &copy; All rights reserved. Contact: <a href="mailto:info@shigaru.com">info@shigaru.com</a></div>
		</div>
	</div>
</div>
<div id="communitytooltip" class="dispnon"></div>
</body>
</html>
