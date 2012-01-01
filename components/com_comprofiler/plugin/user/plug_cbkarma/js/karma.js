//plug_cbkarma js

function rateKarma(userid, myid, myip, rate){
	var postVars = "my_id=" + myid + 
			"&user_id=" + userid +
			"&ip=" + myip +
			"&type=" + rate;
	
	document.getElementById('ratebox').innerHTML = "<h3>Loading...</h3>";
			
	new ajax('index2.php?option=com_karma&task=submitrating&no_html=1', {
		postBody: postVars,
		update: $('ratebox'),
		onComplete: function(){
		}
	});
}


function adminKarma(userid, monthly, yearly){
	var postVars =
			"&user_id=" + userid +
			"&montly=" + monthly +
			"&yearly=" + yearly;
	
	document.getElementById('ratebox').innerHTML = "<h3>Loading...</h3>";
			
	new ajax('index2.php?option=com_karma&task=adminkarma&no_html=1', {
		postBody: postVars,
		update: $('ratebox'),
		onComplete: function(){
		}
	});
}