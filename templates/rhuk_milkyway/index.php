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

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$this->addScript($this->baseurl."/media/system/js/mootools.js");
$this->addScript($this->baseurl."/modules/mod_rokajaxsearch/js/rokajaxsearch.js");
$this->addScript($this->baseurl."/templates/rhuk_milkyway/js/jquery-1.7.2.min.js");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.qtip.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/shigaru.js"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/jquery.qtip.css" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu:light' rel='stylesheet' type='text/css'/>
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
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<a name="up" id="up"></a>
<div id="head">
	<div id="head_content">
		<div id="head_logo">
			<a class="fleft" href="/" title="<?php echo JText::_('Shigaru.com Home page') ?>">
				<img height="140" width="145" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/images/head_logo.png" alt="<?php echo JText::_('Shigaru.com') ?>" />
			</a>
			<a id="head_title_text" href="/" title="<?php echo JText::_('Shigaru.com Home page') ?>">
				<h1>SHIGARU</h1>
			</a>
			<span id="head_comm_text"><?php echo JText::_('The community for sharing musical knowledge') ?></span>
			<div id="topnavmenu">
				<?php
					global $_CB_framework, $ueConfig, $mainframe;
					
					if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
						if ( ! file_exists( JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php' ) ) {
							echo 'CB not installed!';
							return;
						}
						include_once( JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php' );
					} else {
						if ( ! file_exists( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' ) ) {
							echo 'CB not installed!';
							return;
						}
						include_once( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' );
					}
					cbimport( 'cb.tabs' );
					
					$user =& JFactory::getUser();
					$cbUser = CBuser::getInstance( $user->id );
					
					if ($user && !$user->guest)
					echo '<div class="greetinguser"></div>';
					?>
					<jdoc:include type="modules" name="top" />
					<?php
					$uploadUrl =  JRoute::_("index.php?option=com_hwdvideoshare&task=upload");
					echo '<div class="topbuttons mustardbutton" id="upload"><a href="'.$uploadUrl.'" title="'.JText::_('Click on this link to upload a video!').'">SUBMIT A VIDEO</a></div>';
					?>
					<?php					
					if ($user && !$user->guest){
							echo '<div id="grettings">';
							echo $cbUser->getField( 'avatar' , null, 'html', 'div', 'profile' );
							echo '<div class="mtop12 mleft6">';
							echo JText::sprintf( 'LOGIN_GREETING', $user->username );
							echo '</div>';
							echo '</div>';
						}
						 
					
				?>
			</div>
		</div>	
	</div>	
</div>	

<div id="nav_browse">
	<?php					
					if ($user && !$user->guest){
						echo '<div class="userzone f80">';
								echo '<div class="userzoneitem">';
									echo '<a href="index.php?option=com_comprofiler&task=logout"><span class="icon-off"></span>Logout</a>';
								echo '</div>';
								echo '<div class="userzoneitem">';
									echo '<a href="index.php?option=com_uddeim"><span class="icon-envelope"></span>Inbox</a>';
								echo '</div>';
								echo '<div class="userzoneitem">';
									echo '<a href="index.php?option=com_hwdvideoshare&task=yourfavourites"><span class="icon-heart"></span>Videos I liked</a>';
								echo '</div>';
								echo '<div class="userzoneitem">';
									echo '<a href="index.php?option=com_hwdvideoshare&task=yourvideos"><span class="icon-headphones"></span>My Videos</a>';
								echo '</div>';
								echo '<div class="userzoneitem">';
									echo '<a href="index.php?option=com_comprofiler&Itemid=53&task=userDetails"><span class="icon-edit"></span>Edit Profile</a>';
								echo '</div>';
								echo '<div class="userzoneitem">';
									echo '<a href="index.php?option=com_comprofiler&Itemid=53"><span class="icon-user-md"></span>View Profile</a>';
								echo '</div>';
								echo '<div class="clear"></div>';
								
								
								
							echo '</div>';
						}
				?>
	<div id="nav_browse_content">
		<div id="nav_browse_search">
			<jdoc:include type="modules" name="search" />		
		</div>	
	</div>
</div>
</div>
<div id="nav_tabs">	
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
			<h3>What we're tweeting...</h3>
			<div class="mbot20">
				<ul id="shgtweets">
					
				</ul>
				<div class="fright">
					<input value="Follow us" class="submit fleft" type="submit" />
				</div>
			</div>
			<div class="clear">
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
				<h3 >Follow Shigaru on Facebook</h3>
				<div>
					<div class="fb-like-box boxwhite" data-href="http://www.facebook.com/ShigaruCommunity" data-width="410" data-show-faces="true" data-stream="false" data-header="false"></div>
				</div>	
			</div>
			
			<div>
				<h3>Sign up for our Newsletters</h3>
				<input type="text" value="" class="fleft search" placeholder="Enter email address to subscribe" />			
				<input value="Subscribe" class="submit fleft" type="submit" />
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
			
			<?php echo JRequest::getVar('view'); ?>			
			
			<div class="copyright">&reg; 2012 Shigaru.com. &copy; All rights reserved. Contact: <a href="mailto:info@shigaru.com">info@shigaru.com</a></div>
		</div>
	</div>
</div>
</body>
</html>
