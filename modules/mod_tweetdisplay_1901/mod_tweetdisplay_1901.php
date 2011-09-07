<?php
 /**
 *Tweet Display 1901
 @package Tweet Display 1901 for Joomla! 1.5
 * @link       http://www.a.1901webdesign.com/
* @copyright (C) 2011- Nikolaos Koliopoulos
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

defined('_JEXEC') or die('Restricted access');

$document =& JFactory::getDocument();

$moduleclass_sfx = $params->get('moduleclass_sfx');
$username="twitter";
          $username = $params->get('username');
		  
		  	if($params->get('style', '1')) {
		$style=1;
	}
$width=$params->get('width');
$height=$params->get('height');
$count=$params->get('count');
$flash_style=$params->get('flash_style');

	if($flash_style==0) {
		$flash_style='smooth';
	}
	
			if($flash_style==1) {
		$flash_style='velvetica';
	}
	
	if($flash_style==2) {
		$flash_style='revo';
	}
?>

<div class="joomla_sharethis<?php echo $moduleclass_sfx?>">

<?php
$html='
<div id="twitter_div">
<ul id="twitter_update_list"></ul>
<a href="http://twitter.com/'.$username.'" id="twitter-link" style="display:block;text-align:right;">follow me on Twitter</a>
</div>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$username.'.json?callback=twitterCallback2&amp;count='.$count.'"></script>
';

$flash='

<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: \'profile\',
  rpp: '.$count.',
  interval: 6000,
  width: '.$width.',
  height: '.$height.',
  theme: {
    shell: {
      background: \'#333333\',
      color: \'#ffffff\'
    },
    tweets: {
      background: \'#000000\',
      color: \'#ffffff\',
      links: \'#4aed05\'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: \'all\'
  }
}).render().setUser(\''.$username.'\').start();
</script>

';
if($style==1)
{
echo $flash;
}
else
{
echo $html;
}
?>


</div>
