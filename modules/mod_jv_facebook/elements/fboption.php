<?php
	defined('JPATH_BASE') or die();
	class JElementFbOption extends JElement
	{
		var	$_name = 'fboption';
		function fetchElement($name, $value, &$node, $control_name)
		{
			$options = array ();
			$val = "fb_activity_feed";
			$text = "Activity Feed";
			$options[] = JHTML::_('select.option', $val, JText::_($text));
			$val = "fb_like_box";
			$text = "Like box";
			$options[] = JHTML::_('select.option', $val, JText::_($text));
			$val = "fb_live_stream";
			$text = "Live Stream";
			$options[] = JHTML::_('select.option', $val, JText::_($text));
			$val = "fb_recommendations";
			$text = "Recommendations";
			$options[] = JHTML::_('select.option', $val, JText::_($text));
?>
			<script type="text/javascript">
				var jpaneAutoHeight = function(){
					 $$('.jpane-slider').each(function(item){
					      item.setStyle('height','auto'); 
					  });
					};
				window.addEvent('domready', function() {
					setTimeout(jpaneAutoHeight,400);
					// add class for activity feed
					var af=$('paramsaf_domain').getParent().getParent();
					for(i=0;i<=7;i++)
					{
		    	   		af.addClass('jv_fbactivityfeed');		    	  
	    	  			af = af.getNext();		    	 
					}
					// add class for fan box
					var fb = $('paramsfb_page_id').getParent().getParent();
					for(i=0;i<=6;i++)
					{
		    	   		fb.addClass('jv_fbfanbox');		    	  
	    	  			fb = fb.getNext();		    	 
					}
					// add class for like stream
					var ls = $('paramsls_app_id').getParent().getParent();
					for(i=0;i<=3;i++)
					{
		    	   		ls.addClass('jv_fblikestream');		    	  
	    	  			ls = ls.getNext();		    	 
					}
					// add class for recommendations
					var r = $('paramsr_domain').getParent().getParent();
					for(i=0;i<=6;i++)
					{
		    	   		r.addClass('jv_fbrecommendations');		    	  
	    	  			r = r.getNext();		    	 
					}

					//set js show option params
					var jv_acti = $$('.jv_fbactivityfeed');
					var jv_fanb = $$('.jv_fbfanbox');
					var jv_likes = $$('.jv_fblikestream');
					var jv_recom = $$('.jv_fbrecommendations');
					var selectStyle = function(style)
					{				
		                switch(style)
		                {               
							case "fb_activity_feed":				
								jv_acti.each(function(item)
									{
										item.setStyle('display','');
				               		}.bind(this));
								jv_fanb.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_likes.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_recom.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								break;
							case "fb_like_box":
								jv_acti.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_fanb.each(function(item)
									{
										item.setStyle('display','');
				               		}.bind(this));
								jv_likes.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_recom.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								break;
							case "fb_live_stream":
								jv_acti.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_fanb.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_likes.each(function(item)
									{
										item.setStyle('display','');
				               		}.bind(this));
								jv_recom.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								break;
							case "fb_recommendations":
								jv_acti.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_fanb.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_likes.each(function(item)
									{
										item.setStyle('display','none');
				               		}.bind(this));
								jv_recom.each(function(item)
									{
										item.setStyle('display','');
				               		}.bind(this));
								break;
		                }
					}
					// call function show params
					var opt_value=$('paramsfb_options').value;
					selectStyle(opt_value);				               	
					$('paramsfb_options').addEvent('change', function() {
						selectStyle(this.value);	
					});
				});
			</script> 
<?php 
			return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', $class, 'value', 'text', $value, $control_name.$name);
		}
	}
?>