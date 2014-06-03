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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template.min.v2.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/jquery.qtip.min.css" />
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/font-awesome-ie7.css">
<![endif]-->

</head>
<body id="page_bg">
<a name="up" id="up"></a>
<header> 
	<div id="head" class="clearfix">
		<div id="head_content" class="clearfix">
			<div id="head_logo" class="clearfix fleft">
				<div class="clearfix" >
					<div class="fleft mright12" >
						<img height="63" width="65" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/images/head_logo_new.png" alt="<?php echo JText::_('Shigaru.com') ?>" />
						
					</div>	
					<div class="fleft" >
						<h1>SHIGARU</h1>
						<div class="clearfix btn-group">
							<div class="f16px">
							</div>
						</div>
						<div id="head_comm_text fontsig" class="fleft f60 fnone"><?php echo JText::_('HWDVIDS_SHIGARU_SHARINGMUSIKNOW') ?></div>
					</div>	
				</div>		
				
			</div>
			
			</div>	

	</div>	
</header> 

</div>
<div id="sectionwrap" class="clearfix" style="margin-top:70px">
	<section> 
		<div class="clear"></div>
		
			<div class="workarea">
				<div class="workarea_wrapper">
					<div class="mleft12 mright12 clearfix mbot30 mtop20" >									
						<h3 class="fontbold f130 mbot20 mtop20 pad6"><?php echo JText::_('HWDVIDS_SHIGARU_MAINTENANCETITLE') ?></h3>
						<div class="clearfix">
							<div class="fleft f300">
								<i class="icon-cogs f300"></i>
							</div>	
							<p class="fleft mleft12 h200px w80pc tcenter f150">
								<?php echo JText::_('HWDVIDS_SHIGARU_MAINTENANCE') ?>
							</p>	
						</div>
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
					
					
					<div class="clear w75">
						<p>"<?php echo JText::_('HWDVIDS_SHIGARU_WITHOUMUSIC'); ?>."</p>
						<span class="fright tItalic">Friedrich Nietzsche</span>
					</div>
				</div>
				<div class="clear">
					<div class="shigarulogo"></div>
					<div class="copyright">&reg; 2014 Shigaru.com. &copy; <?php echo JText::_('HWDVIDS_SHIGARU_ALLRIGHTS'); ?>. <?php echo JText::_('HWDVIDS_SHIGARU_CONTACT'); ?>: <a href="mailto:info@shigaru.com">info@shigaru.com</a></div>
				</div>
			</div>
		</div>
	</footer>
</div>		
<div id="communitytooltip" class="dispnon"></div>
<div id="main-nav-drop" class="closed dispnon loadingcontent">
		<i class="icon-spinner icon-spin"></i>
</div></body>
</html>
