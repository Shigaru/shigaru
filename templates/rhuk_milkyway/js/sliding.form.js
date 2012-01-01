jQuery(function() {
	/*
	number of fieldsets
	*/
	var fieldsetCount = jQuery('#formElem').children().length;
	/*
	current position of fieldset / navigation link
	*/
	var current 	= 1;
	
	/*
	json array with invalid fields
	*/
	var oInvalids 	= [];
    
	/*
	sum and save the widths of each one of the fieldsets
	set the final sum as the total width of the steps element
	*/
	var stepsWidth	= 0;
    var widths 		= new Array();
	jQuery('#steps .step').each(function(i){
        var $step 		= jQuery(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	jQuery('#steps').width(stepsWidth);
	
	/*
	to avoid problems in IE, focus the first input of the form
	*/
	jQuery('#formElem').children(':first').find(':input:first').focus();	
	
	/*
	show the navigation bar
	*/
	jQuery('#navigations').show();
	
	/*
	when clicking on a navigation link 
	the form slides to the corresponding fieldset
	*/
    jQuery('#navigations a').bind('click',function(e){
		var $this	= jQuery(this);
		var prev	= current;
		$this.closest('ul').find('li').removeClass('selected');
        $this.parent().addClass('selected');
		/*
		we store the position of the link
		in the current variable	
		*/
		current = $this.parent().index() + 1;
		/*
		animate / slide to the next or to the corresponding
		fieldset. The order of the links in the navigation
		is the order of the fieldsets.
		Also, after sliding, we trigger the focus on the first 
		input element of the new fieldset
		If we clicked on the last link (confirmation), then we validate
		all the fieldsets, otherwise we validate the previous one
		before the form slided
		*/
        jQuery('#steps').stop().animate({
            marginLeft: '-' + widths[current-1] + 'px'
        },500,function(){
			if(current == fieldsetCount)
				validateSteps();
			else
				validateStep(prev);
			jQuery('#formElem').children(':nth-child('+ parseInt(current) +')').find(':input:first').focus();	
		});
        e.preventDefault();
    });
	
	/*
	clicking on the tab (on the last input of each fieldset), makes the form
	slide to the next step
	*/
	jQuery('#formElem > fieldset').each(function(){
		var $fieldset = jQuery(this);
		$fieldset.children(':last').find(':input').keydown(function(e){
			if (e.which == 9){
				jQuery('#navigations li:nth-child(' + (parseInt(current)+1) + ') a').click();
				/* force the blur for validation */
				jQuery(this).blur();
				e.preventDefault();
			}
		});
	});
	
	/*
	validates errors on all the fieldsets
	records if the Form has errors in jQuery('#formElem').data()
	*/
	function validateSteps(){
		var FormErrors = false;
		for(var i = 1; i < fieldsetCount; ++i){
			var error = validateStep(i);
			if(error == -1)
				FormErrors = true;
		}
		jQuery('#formElem').data('errors',FormErrors);	
	
	}
	
	
	/*
	checks if the field is already in oInvalids array
	*/
	function inInvalidsList(oElement){
		var inList= [false,0];
		for(var o=0;o<oInvalids.length;o++){
			if(oInvalids[o].name == oElement.name)	{
				inList = [true,o];
				}
			}
			return inList;	
		}
		
	
	/*
	manages the array of invalid fields
	*/
	function manageInvalids(oElement,action){
		
		var oInInvalidsList = inInvalidsList(oElement);
		if(action=='add' && !oInInvalidsList[0]){
				oInvalids[oInvalids.length]={ide:oElement.name,name:oElement.name}
			}else if(action=='remove' && oInInvalidsList[0]){
					oInvalids = oInvalids.splice(oInInvalidsList[1],oInInvalidsList[1]+1);
			}
		
			
	}
	
	/*
	validates one fieldset
	and returns -1 if errors found, or 1 if not
	*/
	function validateStep(step){
		if(step == fieldsetCount) return;
		
		var error = 1;
		var hasError = false;
		jQuery('#formElem').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
			var $this 		= jQuery(this);
			if(!document.formvalidator.validate(this)){
				manageInvalids(this,'add');
				}else{
					manageInvalids(this,'remove');
					}
		});
		var $link = jQuery('#navigations li:nth-child(' + parseInt(step) + ') a');
		$link.parent().find('.error,.checked').remove();
		
		var valclass = 'checked';
		if(oInvalids.length>0){
			error = -1;
			valclass = 'error';
		}
		
		jQuery('<span class="'+valclass+'"></span>').insertAfter($link);
		oInvalids = [];
		return error;
	}
	
	function stopEvent(e) {
		if (e.stopPropagation) e.stopPropagation();
		else e.cancelBubble = true;

		if (e.preventDefault) e.preventDefault();
		else e.returnValue = false;
	}
	
	/*
	if there are errors don't allow the user to submit
	*/
	jQuery('#registerButton').bind('click',function(e){
		var oSubmitInvalids = jQuery('#formElem .invalid');
		if(oSubmitInvalids.length >0){
				jQuery('#navigations li:nth-child(' + (parseInt(jQuery(oSubmitInvalids[0]).closest('.step').index())+1) + ') a').click();
				jQuery(oSubmitInvalids[0]).blur();
				stopEvent(e);
		}
	});
	
	

});
