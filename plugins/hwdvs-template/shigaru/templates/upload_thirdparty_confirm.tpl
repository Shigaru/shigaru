{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}

{include file='header.tpl'}
<script src='http://connect.facebook.net/en_US/all.js'></script>
<div class="cbconfirming">
	<div class="cbconfirmationinfo">
		<div class="content_box">
			<h3>{$smarty.const._HWDVIDS_TITLE_UPLOADSUCCESS}</h3>
		</div>
		<div class="componentheading mbot20">
			<p class="mbot20">{$smarty.const._HWDVIDS_SHIGARU_THANKYOU} <span class="fontred">{$username}</span>{$smarty.const._HWDVIDS_INFO_UPLDGREET}</p>
			<p class="mbot20"><div class="fleft">{$thumbnail}</div><a class="mtop25 pad12 fleft" href="{$videolink}"><b><i>{$uploadname}</i></b></a>
				<div class="clear"></div>
			</p>
			<p class="mbot20">{$failures}</p>
		</div>
		<div class="content_box">
			<h3>{$smarty.const._HWDVIDS_INFO_UPLDTELLYOURFRIENDS}</h3>
		</div>
		<div class="componentheading mbot20">
			<p class="mbot20">{$smarty.const._HWDVIDS_INFO_UPLDTELLYOURFRIENDSTEXT}</p>
			<div id='fb-root'></div>
			{literal}
			<a id="sharefacebook" onclick='postToFeed(); return false;'>{/literal}<span>Facebook</span></a>
			<a href="https://twitter.com/share" class="twitter-share-button" 
				data-url="{$videolink}" 
				data-text="{$uploadname}" 
				data-via="shigaru" 
				data-size="large" 
				data-count="none" 
				data-dnt="true">Tweet</a>
			<div class="g-plus" data-action="share" data-height="24" data-href="{$videolink}"></div>
			{literal}
			<script type="text/javascript">
			  window.___gcfg = {lang: 'en-GB'};

			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>		
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			{/literal}
			<p id='msg'></p>
			
		</div>
		<div class="content_box">
			<h3>{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_WHYNOT} <a href="{$url_upld_another}">{$smarty.const._HWDVIDS_INFO_UPLDANOTHER}</a></h3>
		</div>
	</div>
</div>

{literal}
<script> 
      FB.init({appId: "445855178799005", status: true, cookie: true});

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          {/literal}
          link: '{$videolink}',
          picture: '{$thumbpath}',
          name: '{$uploadname}',
          caption: '{$username} Shigaru.com',
          description: 'Check this out!'
           {literal}
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }
    
    </script>
{/literal}




