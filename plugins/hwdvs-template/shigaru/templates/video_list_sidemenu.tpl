
		<ul class="nav nav-list mtop12">
		  <li id="aboutme"><a href="{$aboutme}">{$smarty.const._HWDVIDS_SHIGARU_ABOUTME}</a></li>
		  	
		  <!--<li id="whattowatch"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_WHATTOWATCH}</a></li>-->

		  {if $showown eq 'yes'}<li id="watchhistory"><a href="{$watchhistory}">{$smarty.const._HWDVIDS_SHIGARU_WATCHHISTORY}</a></li>{/if}	

		  <!--<li id="searchhistory"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_SEARCHHISTORY}</a></li>	-->

		  <!--<li id="whatishot"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_WHATISHOT}</a></li>	-->

		  <!--<li id="mysubcriptions"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_MYSUBSCRIPTIONS}</a></li>	-->

		  <!--<li id="myalerts"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_MYALERTS} </a><span class="mleft6"><i class="icon-bell"></i> <span class="fontred">(0) New</span></span></li>	-->

			<li id="myvideoscreated"><a href="{$yourvideoscreated}">{$smarty.const._HWDVIDS_SHIGARU_MYVIDEOSICREATED}</a></li>
			<li id="myvideosshared"><a href="{$yourvideosshared}">{$smarty.const._HWDVIDS_SHIGARU_MYVIDEOSISHARED}</a></li>
			<!--<li id="myplaylists"><a href="index.php?option=com_hwdvideoshare&task=yourfavourites&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_MYPLAYLISTS}</a></li>-->
			{if $showown eq 'yes'}<li id="mylearnlater"><a href="{$yourlearnlater}">{$smarty.const._HWDVIDS_SHIGARU_MYLEARNLATER}</a></li>{/if}
			{if $showown eq 'yes'}<li id="myfavourites"><a href="{$yourfavourites}">{$smarty.const._HWDVIDS_SHIGARU_MYFAVOURITES}</a></li>{/if}
			{if $showown eq 'yes'}<li id="videosiliked"><a href="{$videosilike}">{$smarty.const._HWDVIDS_SHIGARU_VIDEOSILIKED}</a></li>{/if}
		

		  <!--<li id="profilecomments"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_PROFILECOMMENTS}</a></li>-->

		  <!--<li id="statusupdates"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_STATUSUPDATES}</a></li>-->

		  <!--<li id="myshigarufriends"><a href="index.php?option=com_hwdvideoshare&task=yourvideoscreated&lang={$lang}&guid={$user_id}">{$smarty.const._HWDVIDS_SHIGARU_MYSHIGARUFRIENDS}</a></li>-->
		</ul>
					

