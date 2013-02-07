jQuery(document).ready(function() {
	  var step = 10;
	  function showNext(list) {
		var current = list.children(':visible').length;
		list
		  .find('li:lt(' + (current + step) + ')')
			.slideDown();
	  }
	  jQuery.each(jQuery('#infocontext ul#relatedvideos'), function(index) {
		showNext(jQuery(this));
	  });
	  
	  jQuery('#infocontext #morerelated').click(function(e) {
		e.preventDefault();
		var list = jQuery(this).parent().siblings('ul#relatedvideos');
		showNext(list);
		// remove button after all results are shown
		if(list.children(':hidden').length == 0) 
		  jQuery(this).hide();
	  });
	  
	  jQuery('#btncomments').click(function(e) {
			e.preventDefault();
			var oPosition = jQuery('#comments-form-comment').focus().position();	  
			jQuery('html, body').animate({scrollTop:oPosition.top+150}, 'slow');
		});
		
		if(jQuery('#truncateMe').height() < jQuery('#videodecription').height())
				jQuery('#truncateMe').next().show();
				
		if(jQuery('#tagwrap').height() < jQuery('#tagwrap span').height())
				jQuery('#tagwrap').next().show();	
				
		jQuery('#showmoredesc,#showmoretags').click(function(e){
			e.preventDefault();
			var oIconChange = jQuery(this).find('i');
			var oThis		= jQuery(this);
			if(oIconChange.hasClass('icon-double-angle-up')){
				oIconChange.removeClass('icon-double-angle-up');
				oIconChange.addClass('icon-double-angle-down');
				oThis.parent().prev().removeAttr('style');
				var oPosition = oThis.parent().prev().position();	
				jQuery('html, body').animate({scrollTop:oPosition.top}, 'slow');
				}else{
					oIconChange.removeClass('icon-double-angle-down');
					oIconChange.addClass('icon-double-angle-up');
					oThis.parent().prev().animate({
							height : oThis.parent().prev().find('span:first').height()
						});
				}
			
			});		
					
	   jQuery('ul.rating li a').click(function(e) {
			e.preventDefault();
			rateIt(e);	
		}); 
	   
	   function rateIt(e){
		   var $this = jQuery(e.target);
			var oUrl = $this.attr('href');	
			$this.parent().parent().siblings('.icon-spinner').show();
			jQuery.ajax({ 
					url: oUrl, 
					cache: false, 
					complete: function(data) { 
						$this.parent().parent().siblings('.icon-spinner').hide();
						$this.parent().parent().parent().html(data.responseText);
						jQuery('ul.rating li a').click(function(e) {
							e.preventDefault();
							rateIt(e);	
						}); 
					} 
				});
		   }
	  jQuery('#tuner').click(function(e){
		    e.preventDefault();
            jQuery.blockUI({ 
						message:'<p class="shigarunotice"><span id="close"></span><iframe class="mtop20" src="http://www.123guitartuner.com/guitar_tuner.swf" width="550" height="350"></iframe><br />created by <a href="http://www.123guitartuner.com/">Guitar Tuner</a></p>',
						 css: { 
							top:  (jQuery(window).height() - 400) /2 + 'px', 
							left: (jQuery(window).width() - 600) /2 + 'px',
							height: '400px',
							width: '600px',
							'overflow-y:': 'auto' 
						} 
						});
						
			jQuery('.shigarunotice #close').click(function(){jQuery.unblockUI();});			  
		  });
	   				
	  jQuery('.crossclose').click(function(e) {
			e.preventDefault();
			jQuery(this).parents('.btn-group').removeClass('open');
		  });
		  
	  jQuery('.videoactions button.btn').click(function(e) {
			//jQuery(this).parents('.btn-group').removeClass('open');
		  });
		  	
	  jQuery('#add2plbutton').click(function(e) {
			e.preventDefault();
			jQuery(this).parents('.btn-group').toggleClass('open');
		  });
		
	  jQuery('#learnlaterbutton').click(function(e) {
			e.preventDefault();
			if(jQuery(this).next().find('li span.pad6').length > 0){
				jQuery(this).parents('.btn-group').toggleClass('open');
			}else{
					var oUrl = 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_manageplaylistitems&'+
					'format=raw&item_id='+jQuery('input#videoid').val()+		
					'&public_private=private&playlist_id=learnlater';		
					var $this = jQuery(this);
					var $thisi = jQuery(this).find('i');
					var oldClass = $thisi[0].className;
					$this.attr('disabled',true);
					$thisi.removeClass();
					$thisi.addClass('icon-spinner icon-spin');
					jQuery.ajax({
					  url: oUrl
					}).done(function(data) {
						onAjaxComplete (data, $this,oldClass);			
						});
				}
		  });
	  
	  jQuery('#add2plbutton').next().find('li a').click(function (e){
			e.preventDefault();
			onListItemClick(e);
		  });
	  
	  function onListItemClick(e){
			var oListItem 	= jQuery(e.target);
			var oListId	  	= oListItem.attr('id');
			oListId	  		= oListId.substring(2);
			var oUrl = 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_manageplaylistitems&'+
					'format=raw&item_id='+jQuery('input#videoid').val()+		
					'&public_private=private&playlist_id='+oListId;
			var $thisi = oListItem.find('i:first');
			var oldClass = $thisi[0].className;
			oListItem.attr('disabled',true);
			$thisi.removeClass();
			$thisi.addClass('icon-spinner icon-spin');
			jQuery.ajax({
			  url: oUrl
			}).done(function(data) {
				onAjaxComplete (data, oListItem,oldClass);		
				});
		  }	
					  	
	  jQuery('#addplbutton').click(function(e) {
			e.preventDefault();
			var oPLName = jQuery('#playlist_name').val();
			if(oPLName.length > 2){
				var oUrl = 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_manageplaylistitems&'+
				'format=raw'+'&playlist_name='+oPLName+
				'&item_id='+jQuery('input#videoid').val()+		
				'&public_private='+jQuery('#public_private').val();		
				var $this = jQuery(this);
				var $thisi = jQuery(this).find('i');
				var oldClass = $thisi[0].className;
				$this.attr('disabled',true);
				$thisi.removeClass();
				$thisi.addClass('icon-spinner icon-spin');
				jQuery.ajax({
				  url: oUrl
				}).done(function(data) {
					var iconPublicPrivate = (jQuery('#public_private').val() == 'public')?'icon-unlock':'icon-lock';
					onAjaxCompletePL (data, $this,oldClass);
					jQuery('#add2plbutton').next().prepend('<li class="justadded" style="display:none;">'+
								'<a id="ll'+data+'" href="#"><i class="icon-check fontgreen"></i> <i class="'+iconPublicPrivate+'"></i> <i class="icon-list-ol"></i> <span>'+oPLName+'</span></a>'+
								'</li>');			
					jQuery('#add2plbutton').next().find('.justadded').fadeIn('slow').removeClass('justadded');			
					jQuery('#playlist_name').val('');
					jQuery('#add2plbutton').next().find('.crossclose').parent().fadeOut().remove();
					jQuery('#add2plbutton').next().find('li a').click(function(e) {
							e.preventDefault();
						});	
					});
					
			}else{
				if(jQuery('#add2plbutton').next().find('.crossclose').length == 0){
						jQuery('#add2plbutton').next().prepend('<li class="mleft12 borbotgrey mbot6">'+
										'<a class="crossclose fright" title="Click on this icon to close this message"><i class="icon-remove"></i></a>'+
										'<div class="reponsesay clear mbot6">'+
										'Please enter at least 3 letters for the new playlist name field'+
										'</div>'+
									'</li>');
						jQuery('#add2plbutton').next().find('.crossclose').click(function(){
								jQuery(this).parent().fadeOut().remove();
							});			
					}else{
						jQuery('#add2plbutton').next().find('.crossclose').parent().fadeIn('slow');
						}
				}		
		});
					
	  jQuery('#hwdvidsflagged_videos').click(function(e) {
			e.preventDefault();
			var oUrl = 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_reportvideo&format=raw&item_id='+jQuery('input#videoid').val();		
			var $this = jQuery(this);
			var $thisi = jQuery(this).find('i');
			var oldClass = $thisi[0].className;
			$this.attr('disabled',true);
			$thisi.removeClass();
			$thisi.addClass('icon-spinner icon-spin');
			jQuery.ajax({
			  url: oUrl
			}).done(function(data) {
				onAjaxComplete (data, $this,oldClass);				
				});	
		});
		
	  jQuery('#hwdvidsfavorites').click(function(e) {
			e.preventDefault();
			var oUrl = 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_addtofavourites&format=raw&item_id='+jQuery('input#videoid').val();		
			var $this = jQuery(this);
			var $thisi = jQuery(this).find('i');
			var oldClass = $thisi[0].className;
			$this.attr('disabled',true);
			$thisi.removeClass();
			$thisi.addClass('icon-spinner icon-spin');
			jQuery.ajax({
			  url: oUrl
			}).done(function(data) {
				onAjaxComplete (data, $this,oldClass);				
				});	
		});
		
	 	
		//ajax_manageplaylistitems
		
	  jQuery('#hwdvidslikes').click(function(e) {
			e.preventDefault();
			var oUrl = prepareUrl(this);
			var $this = jQuery(this);
			var $thisi = jQuery(this).find('i');
			var oldClass = $thisi[0].className;
			$thisi.removeClass();
			$thisi.addClass('icon-spinner icon-spin');
			$this.attr('disabled',true);
			jQuery.ajax({
			  url: oUrl
			}).done(function(data) {
				onAjaxComplete (data, $this,oldClass);				
				});	
		});
		
		function onAjaxCompletePL (data, $this,oldClass){
			var oNumData = parseInt(data);
			var $thisi = $this.find('i');
			
			$this.attr('disabled',false);
			$thisi.removeClass();
			$thisi.addClass(oldClass);
			
			if(!isNaN(oNumData)){
				
				switch(oNumData){
					case 0:
							$this.next().find('li').html('There was an error processing your request please try again later.');
							$this.parent().addClass('open');
							break;
					case 1:
							
							break;		
					default:
							
							break;
					}
				
			}else{
				$this.next().find('li .reponsesay').html(data);
				$this.parent().addClass('open');
				}
			
		}
		
		function onAjaxComplete (data, $this,oldClass){
			var oNumData = parseInt(data);
			var $thisi = $this.find('i');
			
			$this.attr('disabled',false);
			if($this.attr('id').indexOf('ll') ==-1){
				$thisi.removeClass();
				$thisi.addClass(oldClass);
			}
			
			if(!isNaN(oNumData)){
				
				switch(oNumData){
					case 0:
							$this.next().find('li').html('There was an error processing your request please try again later.');
							$this.parent().addClass('open');
							break;
					case 1:
							if($this.attr('id').indexOf('ll') ==-1){
								$thisi.removeClass('fontgreen');
								$thisi.removeClass('fontred');
								$this.removeClass('clicked');
								$this.removeClass('active');
								if($this.attr('id').indexOf('flag') ==-1)
									updateActionCount($this,$this.attr('id'));
							}else{
								$this.find('i:first').removeClass().addClass('icon-check-empty fontgreen');
								}	
							break;		
					default:
							if($this.attr('id').indexOf('ll') ==-1){
								if($this.attr('id').indexOf('flag') ==-1)
									$thisi.addClass('fontgreen');
									else
										$thisi.addClass('fontred');
								$this.addClass('clicked');
								$this.addClass('active');
								$thisi.attr('clicked','likeid'+oNumData);
								if($this.attr('id').indexOf('flag') ==-1)
									updateActionCount($this,$this.attr('id'));
							}else{
								$this.find('i:first').removeClass().addClass('icon-check fontgreen');
								}	
							break;
					}
				
			}else{
				$this.next().find('li .reponsesay').html(data);
				$this.parent().addClass('open');
				}
			
			}
		
		function updateActionCount($this,paramAction){
			var oUrl = 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_getactioncount&format=raw&action='+paramAction+'&item_id='+jQuery('input#videoid').val();
			jQuery.ajax({
			  url: oUrl
			}).done(function(data) {
				var oSpanToUpdate = $this.parents('div.fleft.mright6').find('.timesactioned span');
				oSpanToUpdate.hide().html(data).fadeIn();			
				});	
			};
		
		function prepareUrl(paramObject){
			var likeid = '';
			var $this = jQuery(paramObject);
			var $thisi = jQuery(paramObject).find('i');
			
			
			var oItemId  = jQuery('input#videoid').val();
			if($this.hasClass('active')){
				if(!$this.hasClass('clicked'))
					likeid = '&likeid='+$thisi.attr('id');
					else{
						likeid = '&likeid='+$thisi.attr('clicked');
					}
				}
			return 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_like&format=raw'+likeid+'&item_id='+oItemId+'&item_type=video';		
		  }
});
