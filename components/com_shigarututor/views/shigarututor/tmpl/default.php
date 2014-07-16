<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="clearfix mtop12 mbot30">
	<div class="clearfix">
			<div class="fleft">
				<h3 class="fontbold"><i class="icon-youtube-sign icon-3x fontredsig"></i> <span class="f150"><?php echo $this->greeting; ?></span></h3>
			</div>	
			<div class="fright">
				<script src="https://apis.google.com/js/platform.js"></script>
				<div class="g-ytsubscribe" data-channel="shigarututor" data-layout="full" data-count="default"></div>
			</div>	
	</div>
	<div class="clearfix mtop20">	
		<div class="fleft clearfix w59 f90">
			<h3 class="fontbold mbot12">New Videos</h3>
			<div id="recentactivityvideos" class="clearfix">
				<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
			</div>
		</div>
		<div  class="fright clearfix w40 f90">
			<h3 class="fontbold mbot12">Recent Activity</h3>
			<div id="recentactivityother" class="clearfix">
				<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
			</div>
		</div>
		<!--<div  class="fright clearfix w40 f90 mtop25">
			<h3 class="fontbold mbot12">Playlists</h3>
			<div id="channelplaylists" class="clearfix">
				<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>
			</div>
		</div>-->
	</div>
	
</div>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigaruvideolist.min.v1.0.1.js"></script>
<script type="text/javascript" src="plugins/hwdvs-template/shigaru/js/shigarututor.min.v1.0.1.js"></script>

