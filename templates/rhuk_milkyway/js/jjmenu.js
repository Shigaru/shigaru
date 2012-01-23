/* jjmenu - context menu jquery plugin
 * http://jursza.net/dev/jjmenu/
 *  
 * @author Jacek Jursza (okhan.pl@gmail.com)
 * @version 1.1.2
 * @date 2010-08-28
 * @category jQuery plugin
 * @copyright (c) 2009 Jacek Jursza (http://jursza.net/)
 * @licence MIT [http://www.opensource.org/licenses/mit-license.php]    
 */

(function(jQuery){  
   
	jQuery.fn.jjmenu = function (clickEvent, param, myReplaces, effect) {  

		var global = this; 
		var acceptEvent = false;
		

		if ( clickEvent == "rightClick" || clickEvent == "both" )
		{
			global.mousedown(function(event) {
					if (event.button == 2 && (clickEvent == "rightClick" || clickEvent == "both")) { // right click
					    global.pageX = event.pageX;
                        global.pageY = event.pageY;
						event.preventDefault();
						event.stopPropagation();
						var mmain = new menu("main", param, myReplaces, this, effect);
						jQuery(this)[0].oncontextmenu = function() {
									return false;
						}
          				jQuery(this).unbind('mouseup');
          				jQuery(this).blur();
          				return false;			
				    }
			});
			
    		document.body.oncontextmenu = function() {
                if (jQuery("div[id^=jjmenu_main]").length) return false;
            }			
		}
		if ( clickEvent == "click" || clickEvent == "both" )
		{
			global.click( 
                    function(event) {
                        if (this == event.target) {
                            global.pageX = event.pageX;
                            global.pageY = event.pageY;
        					event.preventDefault();
        					event.stopPropagation();
        					var mmain = new menu("main", param, myReplaces, this, effect);
        					jQuery(this).blur();
        					return false;			
    					}
	           		});
		}

		jQuery(document).click(function(event) { if (event.button!=2) jQuery("div[id^=jjmenu]").remove(); });

        /* Menu obeject */
		function menu(id,param,myReplaces,el,effect) {
		
			var effect = getEffect(id, effect);
			
			if (id == "main") window.triggerElement = el;
			jQuery("div[id^=jjmenu_"+id+"]").remove();
			
            var m  = document.createElement('div');
			var ms = document.createElement('span');
			jQuery(m).append(ms);
			
			m.className = "jjmenu";	m.id = "jjmenu_"+id;
			jQuery(m).css({display:'none'});
			jQuery(document.body).append(m);
			
			positionMenu();	

			var dynamicItems = false;
			
			for (var i in param) {
				
				if (param[i].get) {
					
					dynamicItems = true;
					jQuery.getJSON(uReplace(param[i].get), function(data) {
						for (var ii in data) {
							putItem(data[ii]);
						}
						checkPosition();
					})
					jQuery(this).ajaxError( function() {
						checkPosition();
					});
				}
				else if (param[i].getByFunction) {
					
					if  (typeof(param[i].getByFunction) == "function") {
						var uF = param[i].getByFunction;
					}
					else {
						var uF = eval(param[i].getByFunction);
					}
					var uItems = uF(myReplaces);
					for (var ii in uItems) {
						putItem(uItems[ii]);
					}
					checkPosition();
				}
				else {
					putItem(param[i]);
				}
			}
			
			if (!dynamicItems) checkPosition();
			showMenu();
			
			/* first position menu */
			function positionMenu() {
			
				var pos = jQuery(el).offset();
				
				var t = pos.top;
				
				if (effect.xposition == "left") {
					 var l = pos.left;
				}
				else {
					 var l = pos.left+jQuery(el).width()+10;
				}
				
				if (effect.xposition == "mouse") {
                    l = global.pageX;
                }
                if (effect.yposition == "mouse") {
                    t = global.pageY;
                }

				jQuery(m).css({position:"absolute",top:t+"px",left:l+"px"});	         
			}
			
			/* correct menu position */
			function checkPosition() {

				var isHidden = jQuery(m).css("display") == "none" ? true : false; 
				var noAuto = false;
				
				if (effect.orientation == "top" || effect.orientation == "bottom") {
					noAuto = true;
				}
			
				if (isHidden) jQuery(m).show();
				    var positionTop = jQuery(m).offset().top;
				    var positionLeft = jQuery(m).offset().left;
				if (isHidden) jQuery(m).hide(); 
			
				var xPos = positionTop - jQuery(window).scrollTop();
	            
                jQuery(m).css({left:"0px"});
                    var menuHeight = jQuery(m).outerHeight();
                    var menuWidth = jQuery(m).outerWidth();
				jQuery(m).css({left:positionLeft+"px"});
                
                var nleft = positionLeft;
				if ( positionLeft + menuWidth > jQuery(window).width() ) {
                    nleft = jQuery(window).width() - menuWidth;
                }
                				
				var spaceBottom = true;
				if (effect.yposition == "auto" && effect.xposition == "left") {
					
                    if ( xPos + menuHeight + jQuery(el).outerHeight() > jQuery(window).height()) {
					    spaceBottom = false;
				    }				
				}				
				else {
    				
                    if ( xPos + menuHeight  > jQuery(window).height()) {
    					spaceBottom = false;
    				}                
                }				

				var spaceTop = true;
				if (positionTop - menuHeight <  0) {
					spaceTop = false;
				}
				
				if (effect.yposition == "bottom") {
					positionTop = positionTop + jQuery(el).outerHeight();
				 }
				
				if ( (effect.orientation == "auto" && spaceBottom == false && spaceTop == true) || effect.orientation == "top") {
					// top orientation
					var ntop = parseInt(positionTop,10) - parseInt(menuHeight,10);
					jQuery(m).addClass("topOriented");

				} else {
					// bottom orientation
					jQuery(m).addClass("bottomOriented");
					if (effect.yposition == "auto" && effect.xposition == "left") {
						positionTop = positionTop + jQuery(el).outerHeight();
					}
					var ntop = parseInt(positionTop,10);
				}
				
				jQuery(m).css({"top":ntop+"px", "left":nleft+"px"});
			}
			
			/* show menu depends to effect.show */
			function showMenu() {

				 if (!effect || effect.show == "default") {
					jQuery(m).show();
					return false;
				 }
				 
				 var speed = parseInt(effect.speed);
				 speed = isNaN(speed) ? 500 : speed;
				   
				 switch (effect.show) 
				 {
					  case "fadeIn": 
						jQuery(m).fadeIn(speed); 
					  break;
					  
					  case "slideDown": 
						jQuery(m).slideDown(speed); 
					  break;
					  
					  default:
						jQuery(m).show();
					  break;
				 }
			}
			
			/* put item to menu */
			function putItem(n) {
				
				var item = document.createElement('div');
				jQuery(item).hover(function(){
								jQuery(this).addClass("jj_menu_item_hover")
							  },
							  function(){
								jQuery(this).removeClass("jj_menu_item_hover")
							  });
				
				jQuery(item).click( function(event) {
					event.stopPropagation();
					doAction(n.action);	
				});	
				
				var span = document.createElement('span');
				jQuery(item).append(span);
				  

				switch (n.type)
				{
					case "sub":
						item.className = "jj_menu_item jj_menu_item_more";
						jQuery(item).click(function() {	 	
							if (jQuery("#jjmenu_"+id+"_sub").length > 0) {
								jQuery("div[id^=jjmenu_"+id+"_sub]").remove();
							}
							else {
								var sub = new menu(id+"_sub", n.src, myReplaces, this, effect);
							}	
						});
					break;
					
					default:
					  jQuery(item).hover(function() { jQuery("div[id^=jjmenu_"+id+"_sub]").remove(); });
						item.className = "jj_menu_item";
					break;
				}
				
				
				if (n.customClass && n.customClass.length>0) {
                    jQuery(span).addClass(n.customClass);
                }
				
				jQuery(span).html(uReplace(n.title));
				jQuery(ms).append(item);
			}
			
			/* do action on menu item */
			function doAction(act) {
			
				if (act) {
					
					switch (act.type) {
						
						case "gourl":
							if (act.target) {
								var newWindow = window.open(uReplace(act.url), act.target);
								newWindow.focus();
								return false;
							}
							else {
								document.location.href=uReplace(act.url);
							}
						break;
						
						case "ajax":
							jQuery.getJSON(uReplace(act.url), function(data) {
							
								var cb = eval(act.callback);
								if (typeof(cb) == "function") {
									cb(data);
								}
							
							});
						break;
						
						case "fn":
                                var callfn = 'var cb = '+act.callback;
                                jQuery.globalEval(callfn);
                                if (typeof(cb) == "function") {
                                    cb(myReplaces);
                                }
						break;
					}
				}
			}
			
			/* replace string with user parameters */
			function uReplace(str) {
				if (myReplaces) {
					for (var u in myReplaces) {
						str = str.replace("#"+u+"#", eval("myReplaces."+u));
					}
				}
				return str;
			}

            /* get effect opbject */
			function getEffect(id, effect) {
			
				var defEffect = {
				  show:"default",
				  xposition:"right",
				  yposition:"auto",
				  orientation:"auto"
				};

				if (!effect) { return defEffect;  }      

				if (!effect.show) effect.show = "default";
						  
				var show = effect.show;

				if (!effect.xposition) effect.xposition = "right";
				if (!effect.yposition) effect.yposition = "auto";
				if (!effect.orientation) effect.orientation = "auto";

				if (id != "main") {
					var subeffect = defEffect;
					subeffect.show = show;
				}

				return ( id == "main" ) ? effect : subeffect;
			}
		} // !menu
	};  
   
 })(jQuery); 
