<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo  $this->language; ?>" lang="<?php echo  $this->language; ?>" dir="<?php echo  $this->direction; ?>" id="minwidth" >
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
	<title>Joomla Administration Area</title>
    <link rel="stylesheet" href="templates/<?php echo  $this->template ?>/css/template.css" type="text/css" />
    <link rel="stylesheet" href="templates/<?php echo  $this->template ?>/css/windows.css" type="text/css" />
    <link rel="stylesheet" href="templates/<?php echo  $this->template ?>/css/dock.css" type="text/css" />
    <link rel="stylesheet" href="templates/<?php echo  $this->template ?>/css/menu.css" type="text/css" />
    <script src="templates/<?php echo  $this->template ?>/js/jquery.js" type="text/javascript"></script>
    <script src="templates/<?php echo  $this->template ?>/js/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript">
		jQuery.noConflict();
		jQuery(document).ready(function ($) {
			if (window != window.top)
			{
				parent.jQuery(".window").remove()
			}
		});
		
		jQuery.udjaParams = {}
		<?php
		//sets default height dynamically based from params
		if (is_int($this->params->get('defaultWidth'))) {
			echo 'jQuery.udjaParams.width = '.$this->params->get('defaultWidth').';';
		}
		else { echo 'jQuery.udjaParams.width = 950;'; }
		echo "\r\n";
		//sets default width dynamically based from params
		if (is_int($this->params->get('defaultHeight'))) {
			echo 'jQuery.udjaParams.height = '.$this->params->get('defaultHeight').';';
		}
		else { echo 'jQuery.udjaParams.height = 650;'; }
		echo "\r\n";
		//sets default X position dynamically based from params
		if (is_int($this->params->get('defaultX'))) {
			echo 'jQuery.udjaParams.xPosition = '.$this->params->get('defaultX').';';
		}
		else { echo 'jQuery.udjaParams.xPosition = 15;'; }
		echo "\r\n";
		//sets default Y position dynamically based from params
		if (is_int($this->params->get('defaultY'))) {
			echo 'jQuery.udjaParams.yPosition = '.$this->params->get('defaultY').';';
		}
		else { echo 'jQuery.udjaParams.yPosition = 15;'; }
		echo "\r\n";
		?>
	</script>
    <script type="text/javascript" src="templates/<?php echo  $this->template ?>/js/jquery-inc.js"></script>
    <script type="text/javascript" src="templates/<?php echo  $this->template ?>/js/jclock.js"></script>
    <script type="text/javascript" src="templates/<?php echo  $this->template ?>/js/interface.js"></script>
    <script type="text/javascript" src="templates/<?php echo  $this->template ?>/js/functions.js"></script>
    <script type="text/javascript" src="templates/<?php echo  $this->template ?>/js/init.js"></script>
</head>

<body>
	
	<noscript>
		<h1 style="margin-top:15px; padding:10px; background-color:#FC0000; color:#FF0000;">YOU DON'T HAVE JAVASCRIPT ENABLED, THIS WILL GIVE UNEXPECTED RESULTS</h1>
	</noscript>

	<div class="taskBar">
		
        <ul id="favourites">
            <li id="start">
				
                <a href="#" onclick="return false;"><img src="templates/<?php echo  $this->template ?>/images/startButton.png" alt="Start" /></a>
                <ul class="subnav">
                    <li><a href="http://www.udjamaflip.com/forum.html" title="Support details" target="_blank">Template Support</a></li>
                    <li><a href="http://extensions.joomla.org/" title="Joomla! Extensions" target="_blank">Joomla! Extensions</a></li>
                    <li><a href="http://forum.joomla.org/" title="Joomla! Forum" target="_blank">Joomla! Forum</a></li>
                    <li><a href="http://www.google.com/analytics/" title="Google Analytics" target="_blank">Google Analytics</a></li>
                </ul>
            </li>
		</ul>
		<jdoc:include type="modules" name="menu" />
        
        <div class="time"></div><div class="status"><jdoc:include type="modules" name="status" /></div>
    </div>

	<div id="window-container">