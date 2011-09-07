<?php 
	/**
		JV Facebook Fanbox module
		@link  		http://www.ZooTemplate.com
		@license 	http://www.ZooTemplate.com
	**/
	class modJvFacebookHelper
	{
		// Retrieves the html
		function getFbOpt($params)
		{
			return $jv_opt = trim($params->get('fb_options'));			
		}
		function getActivityFeed($params)
		{ 
			//get params from admin config
			$jv_domain = trim($params->get('af_domain'));
			$jv_boxwidth = trim($params->get('af_box_width'));
			$jv_boxheight = trim($params->get('af_box_height'));
			$jv_header = trim($params->get('af_header'));
			$jv_colorscheme = trim($params->get('af_color_scheme'));
			$jv_font = trim($params->get('af_font'));
			$jv_border = trim($params->get('af_border_color'));
			$jv_recomm = trim($params->get('af_recomm'));
			
			//get data from facebook
			$jv_afcontent = "";
			if ( !$jv_domain )
			{
				$jv_afcontent .= 'Please enter valid domain.';
			}
			else
			{
				$jv_afcontent .='<iframe src="http://www.facebook.com/plugins/activity.php?site='.$jv_domain;
				if ( $jv_boxwidth )
				{
					$jv_afcontent .= '&amp;width='.$jv_boxwidth;				
				}
				if ( $jv_boxheight )
				{
					$jv_afcontent .= '&amp;height='.$jv_boxheight;
				}
				if ( $jv_header )
				{
					$jv_afcontent .= '&amp;header=true';
				}
				if ( $jv_colorscheme )
				{
					$jv_afcontent .= '&amp;colorscheme='.$jv_colorscheme;
				}
				if ( $jv_font )
				{
					$jv_afcontent .= '&amp;font='.$jv_font;
				}
				if ( $jv_border )
				{
					$jv_afcontent .= '&amp;border_color='.$jv_border;
				}
				if ( $jv_recomm )
				{
					$jv_afcontent .= '&amp;recommendations=true';
				}
				$jv_afcontent .= '" scrolling="no" frameborder="0" style="border:none; overflow:hidden;';
				if ( $jv_boxwidth )
				{
					$jv_afcontent .= 'width:'.$jv_boxwidth.'px;';
				}
				if ( $jv_boxheight )
				{
					$jv_afcontent .= 'height:'.$jv_boxheight.'px;';
				}
				$jv_afcontent .= '" allowTransparency="true"></iframe>';
			}			
			$jv_afcontent .='<div style="display: none;"><a title="Joomla Templates" href="http://www.zootemplate.com">Joomla Templates</a> and Joomla Extensions by ZooTemplate.Com</div>';
			return $jv_afcontent;
		}
		function getFanbox($params)
		{	
			//get params from admin config
			$jv_pageid = trim($params->get('fb_page_id'));
			$jv_boxwidth = trim($params->get('fb_box_width'));
			$jv_boxheight = trim($params->get('fb_box_height'));
			$jv_number_fan = trim($params->get('fb_number_fan'));
			$jv_stream = trim($params->get('fb_stream'));
			$jv_header = trim($params->get('fb_header'));
			
			$fb_style = trim($params->get('fb_style', 'default')); 
			
			// get data from facebook
			$jv_fbcontent = "";
			if ( !$jv_pageid )
			{
				$jv_fbcontent.='Please enter your valid Page ID.';
			}
			else
			{
				// check input is fb page id or fb url
				$sub = strstr($jv_pageid,'http');
				$pos = strlen($sub);
				if ( $pos > 0 ) // url
				{
					$baseurl = JURI::base();
					$rd = rand(1,99999);
					
					$jv_fbcontent .= '<iframe src="http://www.facebook.com/connect/connect.php?href='.$jv_pageid;
					if ( $jv_boxwidth )
					{
						$jv_fbcontent .= '&amp;width='.$jv_boxwidth.'&amp;locale=&amp;css='.$baseurl.'modules/mod_jv_facebook/assets/jv_'.$fb_style.'.css?ts='.$rd.'';
					}
					if ( $jv_number_fan )
					{
						$jv_fbcontent .= '&amp;connections='.$jv_number_fan;
					}
					if ( $jv_stream )
					{
						$jv_fbcontent .= '&amp;stream=true';
					}
					if ( $jv_header )
					{
						$jv_fbcontent .= '&amp;header=true';
					}
					if ( $jv_boxheight )
					{
						$jv_fbcontent .= '&amp;height='.$jv_boxheight.'"';
					}
					$jv_fbcontent .= ' scrolling="no" frameborder="0" style="border:none; overflow:hidden; ';
					if ( $jv_boxwidth )
					{
						$jv_fbcontent .= 'width:'.$jv_boxwidth.'px;';
					}
					if ( $jv_boxheight )
					{
						$jv_fbcontent .= 'height:'.$jv_boxheight.'px;';
					}
					
					$jv_fbcontent .= '" allowTransparency="true"></iframe>';
				}//end input url
				else // page id
				{ 
					$baseurl = JURI::base();
					$rd = rand(1,99999);
					$lang = JFactory::getLanguage();
					$langstr = str_replace("-", "_", $lang->_lang);
					$jv_fbcontent = '<iframe scrolling="no" frameborder="0" class="FB_SERVER_IFRAME" src="http://www.facebook.com/connect/connect.php?api_key=null&channel_url='.$baseurl.'/?fbc_channel=1&id='.$jv_pageid.'&name=&width='.$jv_boxwidth.'&locale='.$langstr.'&connections='.$jv_number_fan.'&stream='.$jv_stream.'&logobar='.$jv_header.'&css='.$baseurl.'modules/mod_jv_facebook/assets/jv_'.$fb_style.'.css?ts='.$rd.'" allowtransparency="true" name="fbfanIFrame_0" style="width: '.$jv_boxwidth.'px; height: '.$jv_boxheight.'px; border: medium none;"></iframe>';
				}// end input page id
			}
			$jv_fbcontent .='<div style="display: none;"><a title="Joomla Templates" href="http://www.zootemplate.com">Joomla Templates</a> and Joomla Extensions by ZooTemplate.Com</div>';
			return $jv_fbcontent;
		}
		
		function getLiveStream($params)
		{
			// get params from admin config
			$jv_app_id = trim($params->get('ls_app_id'));
			$jv_width = trim($params->get('ls_width'));
			$jv_height = trim($params->get('ls_height'));
			$jv_xid = trim($params->get('ls_xid'));
			
			//get data from facebook
			$jv_lscontent="";
			if( !$jv_app_id )
			{
				$jv_lscontent .= 'Please enter your valid App ID';
			}
			else
			{
				$jv_lscontent .= '<iframe src="http://www.facebook.com/plugins/livefeed.php?app_id='.$jv_app_id;
				if ( $jv_width )
				{
					$jv_lscontent .= '&amp;width='.$jv_width;
				}
				if ( $jv_height )
				{
					$jv_lscontent .= '&amp;height='.$jv_height;
				}
				if ( $jv_xid )
				{
					$jv_lscontent .= '&amp;xid='.$jv_xid;
				}
				$jv_lscontent .= '" scrolling="no" frameborder="0" style="border:none; overflow:hidden;';
				if ( $jv_width )
				{
					$jv_lscontent .= 'width:'. $jv_width.'px;';
				}
				if ( $jv_height )
				{
					$jv_lscontent .= 'height:'.$jv_height.'px;';
				}
				$jv_lscontent .= '" allowTransparency="true"></iframe>';
			}
			$jv_lscontent .='<div style="display: none;"><a title="Joomla Templates" href="http://www.zootemplate.com">Joomla Templates</a> and Joomla Extensions by ZooTemplate.Com</div>';
			
			return $jv_lscontent;
		}
		
		function getRecommendations($params)
		{      
			//get params from admin config
			$jv_domain = trim($params->get('r_domain'));
			$jv_width = trim($params->get('r_width'));
			$jv_height = trim($params->get('r_height'));
			$jv_header = trim($params->get('r_header'));
			$jv_color_scheme = trim($params->get('r_color_scheme'));
			$jv_font = trim($params->get('r_font'));
			$jv_border = trim($params->get('r_border_color'));
			
			//get data from facebook
			$jv_rcontent = "";
			if ( !$jv_domain )
			{
				$jv_rcontent .= 'Please enter valid domain';
			}
			else
			{
				$jv_rcontent .= '<iframe src="http://www.facebook.com/plugins/recommendations.php?site='.$jv_domain;
				if ( $jv_width )
				{
					$jv_rcontent .= '&amp;width='.$jv_width;
				}
				if ( $jv_height )
				{
					$jv_rcontent .= '&amp;height='.$jv_height;
				}
				if ( $jv_header )
				{
					$jv_rcontent .= '&amp;header=true';
				}
				if ( $jv_color_scheme )
				{
					$jv_rcontent .= '&amp;colorscheme='.$jv_color_scheme;
				}
				if ( $jv_font )
				{
					$jv_rcontent .= '&amp;font='.$jv_font;
				}
				if ( $jv_border )
				{
					$jv_rcontent .= '&amp;border_color='.$jv_border;
				}
				$jv_rcontent .= '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden;';
				if ( $jv_width )
				{
					$jv_rcontent .= 'width:'.$jv_width.'px; ';
				}
				if ( $jv_height )
				{
					$jv_rcontent .= 'height:'.$jv_height.'px;';
				}
				$jv_rcontent .= '" ></iframe>';
			}
			$jv_rcontent .='<div style="display: none;"><a title="Joomla Templates" href="http://www.zootemplate.com">Joomla Templates</a> and Joomla Extensions by ZooTemplate.Com</div>';
			
			return $jv_rcontent;
		}
	}
?>












