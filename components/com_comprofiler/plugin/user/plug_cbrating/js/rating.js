//plug_cbkarma js

function rate(userid, myid, myip, myname, rate){

	var txt=document.getElementById('bgtext').value;

	if (txt == "Insert your user rating text here." || txt == ""  ) { 
		alert('Add some text here!');
		return false;
	}
//	alert(txt);
	var postVars = "my_id=" + myid + 
			"&user_id=" + userid +
			"&ip=" + myip +
			"&type=" + rate +
			"&my_name=" + myname +
			"&text=" + txt;
	
	document.getElementById('ratebox').innerHTML = "<h3>Loading...</h3>";
			
	new ajax('index2.php?option=com_rating&task=submitrating&no_html=1', {
		postBody: postVars,
		update: $('ratebox'),
		onComplete: function(){
		}
	});
}

function getdetails(userid, myid, myip, page, limit){
 
	var postVars = "my_id=" + myid + 
			"&user_id=" + userid +
			"&ip=" + myip +
			"&page=" + page +
			"&limit=" +limit;
			
	document.getElementById('details').innerHTML = "<h3>Loading...</h3>";
			
	new ajax('index2.php?option=com_rating&task=getdetails&no_html=1', {
		postBody: postVars,
		update: $('details'),
		onComplete: function(){
		}
	});
}

function reply(id, i, e, sendobj ) {

	 var p = new Array('cb_tabmain', 'cb_head', 'cb_underall' );
	 if ( document.getElementById )   { 
	 var obj = document.getElementById(id); 
	 document.getElementById('rId').value = e;
		for (var i=0; i < p.length; i++){
			 if (document.getElementById(p[i])) {
				var cb_tabmain = document.getElementById(p[i])
				if (isChildOf(sendobj, cb_tabmain)) break;
			 }
			}
	 }
	 else if  ( document.all )  { 
	 obj = document.all.item( id ); 
	 document.all.item( 'rId' ).value = e;
	 	for (var i=0; i < p.length; i++){
			 if (document.all.item(p[i])) {
				cb_tabmain = document.all.item( 'cb_tabmain');
				if (isChildOf(sendobj, cb_tabmain)) break;
			 }
			}
	 
	 }

	cur = findPos(sendobj);
	maintab = findPos(cb_tabmain);
	//alert(cur[0]+"\n"+ cur[1]+"\nMaintab: "+ maintab[0]);
	
	
	if ( (parseInt(maintab[1]) < parseInt(cur[1] )) && isChildOf(sendobj, cb_tabmain) ) {
		obj.style.left = ( cur[0] - maintab[0] ) +'px';
		obj.style.top = ( cur[1] - maintab[1]) + 'px';
		}
	else {
		obj.style.left = parseInt( cur[0] )  +'px';
		obj.style.top = parseInt( cur[1]) + 25  + 'px';
		}
	//obj.style.left = parseInt( cur[0] )  +'px';
	//obj.style.top = parseInt( cur[1] +25 ) + 'px';

	obj.style.position = 'absolute';
	obj.style.zIndex = '10000';
	obj.style.visibility = 'visible';
	//alert( "MyPosLEFT: "+ cur[0] +"\nMaintabLEFT: "+ maintab[0]+"\n\nMyPosTOP: "+ cur[1] +"\nMaintabTOP: "+ maintab[1]+"\nCalcMyNewLEFT "+obj.style.left+"\nCalcMyNewTOP "+ obj.style.top+ "\n"+ sendobj.parentNode.id);

}


function submit_reply(){
	var rtxt=document.getElementById('rtext').value;
	var rId=document.getElementById('rId').value;
		
	document.getElementById('details').innerHTML = "<h3>Loading...</h3>";
			
	new ajax('index2.php?option=com_rating&task=submit_reply&no_html=1', {
		postBody: "rtxt=" + rtxt+ "&rId="+rId,
		update: $('details'),
		onComplete: function(){
		}
	});



}

function findPos(obj) {
	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop];
}

 

function isChildOf(ChildObject,ContainerObject) 
 { 
     var curobj; 
	if(typeof(ContainerObject)=="string")
		{        ContainerObject=document.getElementById(ContainerObject);    }
    if(typeof(ChildObject)=="string")
      {        ChildObject=document.getElementById(ChildObject);    }
       for(curobj=ChildObject.parentNode; ( (curobj!=undefined) && (curobj!=document.body) &&(curobj.id!=ContainerObject.id) );curobj=curobj.parentNode)
       {    }
      return (curobj.id==ContainerObject.id);
}
  


