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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<script src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.min.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery-ui.min.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jjmenu.js"></script>	
<jdoc:include type="head" />

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template.css" type="text/css" />

<script src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/shigaru.js"></script>
<link href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/skin.css" rel="stylesheet" type="text/css"/>


<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php if($this->direction == 'rtl') : ?>
	<link href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template_rtl.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
</head>
<body id="page_bg"  class="color_<?php echo $this->params->get('colorVariation'); ?> bg_<?php echo $this->params->get('backgroundVariation'); ?> width_<?php echo $this->params->get('widthStyle'); ?>">
<a name="up" id="up"></a>	
<div id="totatwrapper">

<div class="center" align="center" id="center">
	<div id="wrapper">
		<div id="wrapper_r">
			<div id="headerwrapper">
<div id="header">
				<div id="header_l">
				<div id="logo"><a title="<?php echo JText::_('Shigaru.com Home page') ?>" href="<?php echo $this->baseurl ?>"><span><?php echo JText::_('The community for sharing musical knowledge') ?></span></a></div>
				<p><?php echo JText::_('The community for sharing musical knowledge') ?></p>
				</div>
				
			</div>

<div id="topNavBar">
		<?php
			/**
			$user =& JFactory::getUser();
			
			if (!$user->guest){
					echo '<div id="grettings">';
					echo JText::sprintf( 'LOGIN_GREETING', $user->name );
					echo '</div>';
				}
				 
			**/ 
		?>
		<jdoc:include type="modules" name="top" />
		<jdoc:include type="modules" name="user4" />
</div>			
<div id="searchmod">
		<jdoc:include type="modules" name="search" />		
</div>
</div>			
<div class="clr"></div>
			<div id="tabarea">
				<div id="tabarea_l">
					<div id="tabarea_r">
						<div id="tabmenu">
						<div id="navigation">
									<jdoc:include type="modules" name="user3" />
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="clr"></div>

			<div id="redbox">
				<div id="redbox_t">
					<div id="redbox_tl">
						<div id="redbox_tr"></div>
					</div>
				</div>

				<div id="redbox_m">
					<div id="area">
									<jdoc:include type="message" />

						<div id="leftcolumn">
						<?php if($this->countModules('left')) : ?>
							<jdoc:include type="modules" name="left" style="rounded" />
						<?php endif; ?>
						</div>

						<?php if($this->countModules('left')) : ?>
						<div id="maincolumn">
						<?php else: ?>
						<div id="maincolumn_full">
						<?php endif; ?>
												
								
							

							<table class="nopad">
								<tr valign="top">
									<td>
										
										<jdoc:include type="component" />
										
										<jdoc:include type="modules" name="footer" style="xhtml"/>
									</td>
									<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
										<td class="greyline">&nbsp;</td>
										<td width="170">
											
											<jdoc:include type="modules" name="right" style="xhtml"/>
										</td>
									<?php endif; ?>
								</tr>
							</table>
							<div class="tcenter">
								<?php echo JText::_('Think you can play better?') ?> 
								<a href="<?php echo $this->baseurl ?>/index.php?option=com_hwdvideoshare&task=upload&Itemid=66&lang=en" title="<?php echo JText::_('Submit') ?>"><b><?php echo JText::_('Submit') ?></b> </a>
								<?php echo JText::_(' your videos now then! Or submit video tutorials you have found on other websites. What are you waiting for? Share your musical knowledge!') ?>
							</div>
						</div>
						<div class="clr"></div>
					</div>
					<div class="clr"></div>
				</div>

				<div id="redbox_b">
					<div id="redbox_bl">
						<div id="redbox_br"></div>
					</div>
				</div>
			</div>

			<div id="footerspacer"></div>
		</div>

		
	</div>
</div>
</div>







<div id="footer">
            <div class="footer_links">
				<div class="mtop6">
					<strong>&reg; 2008 www.shigaru.com &copy; All Rights Reserved.</span>
				&nbsp;Contact:&nbsp;<a id="direc" href="mailto:info@shigaru.com">info@shigaru.com</a></strong>
				</div>
            </div>
            <div class="emboss" id="toggle_reasons">
                <div class="lip"></div>
                <div class="shadow"></div>
                <div class="words">
					<div class="footer_links">
				<jdoc:include type="modules" name="pagefooter" />  
				 </div> 		
                    <p><a href="<?php echo $this->baseurl ?>/index.php?option=com_hwdvideoshare&task=upload&Itemid=66&lang=en" title="<?php echo JText::_('Submit a video now!') ?>"><?php echo JText::_('Submit a video now!') ?> </a></p>
                </div>
            </div>
        </div>
<jdoc:include type="modules" name="debug" />
<jdoc:include type="modules" name="chat" />
</body>
</html>
