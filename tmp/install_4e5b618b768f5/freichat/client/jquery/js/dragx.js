(function($){
    $.fn.dragx = function(options) {

        var defaults = {
            repos:false,
            draggable:true,
            containment:"document",
            scroll: false,
            handle:this,

            stack:this,
            animate:true,
            id:freichatusers,
            restore:false,
            restoreElem:"#frei_",
            speed:500
        };

        var option = $.extend(defaults, options);
        var obj = $(this);
        var dpos = Get_Cookie("frei_stat_"+option.id);

        if(dpos!=null)
        {
            dpos=dpos.split("&");
        }
        else
        {
            dpos = new Array('en','closed','max','clear',null,null);
        }

        if(option.draggable == true)
        {
            obj.draggable('enable');
            obj.draggable({
                stop: function(event, ui)
                {
                    var pos = $(this).position();

                    if(option.animate == true)
                    {
                        var e=($(window).height()-604)+284+"px";

                        if(pos.top>9)
                        {
                            obj.animate({
                                top: '0px'
                            }, option.speed,function(){
                                Set_Cookie( "frei_stat_"+option.id, dpos[0]+"&"+dpos[1]+"&"+dpos[2]+"&"+dpos[3]+"&"+obj.position().top+"&"+obj.position().left , 0, '/', '', '' );
                            });
                        }
                        else if(pos.top<-260)
                        {
                            obj.animate({
                                top: '-'+e
                            }, option.speed,function(){
                                Set_Cookie( "frei_stat_"+option.id, dpos[0]+"&"+dpos[1]+"&"+dpos[2]+"&"+dpos[3]+"&"+obj.position().top+"&"+obj.position().left , 0, '/', '', '' );
                            });
                        }
                        else
                        {
                            Set_Cookie( "frei_stat_"+option.id, dpos[0]+"&"+dpos[1]+"&"+dpos[2]+"&"+dpos[3]+"&"+obj.position().top+"&"+obj.position().left , 0, '/', '', '' );
                        }
                    }
                }
            },
            {
                containment:option.containment
            },

            {
                scroll:option.scroll
            },


            {
                handle:option.handle
            },


            {
                cursor: 'move'
            }
            );
        }
        else
        {
            obj.draggable('disable');
        }

        if(option.repos == true)
        {
            obj.animate({
                top: dpos[4],
                left:dpos[5]
            }, option.speed,function(){
                repos=true;
            }
            );
        }
        //#drag_freicontent_1296070279
        if(option.restore == true)
        {
            var i=0;
            var optionLength=option.id.length;
            for(i=0;i<=optionLength;i++)
            {
                if(option.id[i]==undefined || option.id[i]==0)
                {
                    break;
                }
                else
                {
                    //alert(option.restoreElem+option.id[i]);
                    Set_Cookie( "frei_stat_"+option.id[i], dpos[0]+"&"+dpos[1]+"&"+dpos[2]+"&"+dpos[3]+"&0&0" , 0, '/', '', '' );
                    $(option.restoreElem+option.id[i]).animate({
                        top: '0px',
                        left:'0px'
                    },option.speed);
                }
            }
        }
        return obj;
    };
})(jQuery);