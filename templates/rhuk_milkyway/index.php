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
<jdoc:include type="head" />

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/<?php echo $this->params->get('colorVariation'); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/<?php echo $this->params->get('backgroundVariation'); ?>_bg.css" type="text/css" />
<script src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.min.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery.jcarousel.min.js"></script>
  <script src="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/js/jquery-ui.min.js"></script>
  <link href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/skin.css" rel="stylesheet" type="text/css"/>

<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php if($this->direction == 'rtl') : ?>
	<link href="<?php echo $this->baseurl ?>/templates/rhuk_milkyway/css/template_rtl.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<script>
		(function(d){
		  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		  js = d.createElement('script'); js.id = id; js.async = true;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  d.getElementsByTagName('head')[0].appendChild(js);
		}(document));
</script>
<script>
	jQuery.noConflict();
  jQuery(document).ready(function() {
    jQuery("#tabs,#tabs-tags,#comments-tabs").tabs({ fx: { opacity: 'toggle'} });
    jQuery('.jcarousel-skin-tango').jcarousel({
        auto: 4,scroll:3, animation: 3000, easing:'swing' 
    });
    
    	

    
  });
  function langMenu(){
        		if (jQuery('#langDropMenu').css('display') == 'none'){
        			document.getElementById('langDropMenu').style.display = 'block';
        			jQuery("#langTab").addClass('openLangMenu');

        			var centerBoxHeight = jQuery("#langBoxCenter").height()
					document.getElementById('langBoxLeft').style.height = (centerBoxHeight + 5) +"px";
					document.getElementById('langBoxRight').style.height = (centerBoxHeight + 5) +"px";

        		}else{
        			document.getElementById('langDropMenu').style.display = 'none';
        			jQuery("#langTab").removeClass('openLangMenu');
        			document.getElementById('langBoxLeft').style.height = "30px";
					document.getElementById('langBoxRight').style.height = "30px";
        		}
        	}

        	function hoverFuncAdd(el){
        		jQuery(el).addClass('hover');
        	}

        	function hoverFuncRemove(el){
        		jQuery(el).removeClass('hover');
        	}
        	
        	function showLogin(){
        		var loginMenu = document.getElementById('loginFormMenu').style.display;
        		if(loginMenu == 'none'){
	        		document.getElementById('loginBoxLeft').style.display = 'none';
	        		document.getElementById('loginBoxRight').style.display = 'none';
	        		document.getElementById('loginFormMenu').style.display = 'block';
	        		jQuery("#loginBoxCenter").addClass("hover");
        		}else{
        			document.getElementById('loginBoxLeft').style.display = 'block';
	        		document.getElementById('loginBoxRight').style.display = 'block';
	        		document.getElementById('loginFormMenu').style.display = 'none';
	        		jQuery("#loginBoxCenter").removeClass("hover");
        		}
        	}


  </script>

</head>
<body id="page_bg" class="color_<?php echo $this->params->get('colorVariation'); ?> bg_<?php echo $this->params->get('backgroundVariation'); ?> width_<?php echo $this->params->get('widthStyle'); ?>">
<a name="up" id="up"></a>	

<div id="header">
				<div id="header_l">
				<div id="logo"></div>
				<p><?php echo JText::_('The community for sharing musical knowledge') ?></p>
				</div>
				<div id="withoutMusic">
					<blockquote cite="Brian Littrell">
						<p>
							<?php echo JText::_('Without music, <br /> life would be a mistake.') ?>
						</p>
					</blockquote>
					<p id="explainLink">Friedrich Nietzsche </p>
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

<div id="search">
				<jdoc:include type="modules" name="user4" />
</div>

</div>			
			
<div class="clr"></div>
<div class="center" align="center" id="center">
	<div id="wrapper">
		<div id="wrapper_r">
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

			

			<div id="pathway">
				<jdoc:include type="modules" name="breadcrumb" />
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

		<div id="footer">
			<div id="redbox">
				<div id="redbox_t">
					<div id="redbox_tl">
						<div id="redbox_tr"></div>
					</div>
				</div>
				<div id="redbox_m">
					<jdoc:include type="modules" name="pagefooter" />
					<div class="clr"></div>
				</div>

				<div id="redbox_b">
					<div id="redbox_bl">
						<div id="redbox_br"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<jdoc:include type="modules" name="debug" />
<jdoc:include type="modules" name="chat" />
</body>
</html>
