var youtubeRE = /(http:\/\/)?([a-zA-Z]+.)?youtube.com\/watch\?v=([\w-]+)/;
var gvRE = /(http:\/\/)?video.google.com\/videoplay\?docid=([\w-]+)/;


function video_Expand(idTag, warnText) {
	if (document.getElementById('div'+idTag).style.getPropertyValue) {
		direction = document.getElementById('div'+idTag).style.getPropertyValue("display");
	} else {
		direction = document.getElementById('div'+idTag).style.display;
	}
	if (direction=='block') {
		direction = 'none';
	} else {
		if (warnText == '' || confirm(warnText)) {
			direction='block';
		}
	}
	document.getElementById('div'+idTag).style.display = direction;
}



function video_submitForm(mfrm) {
	var me = mfrm.elements;

        var url = me['video'].value;
        var match = youtubeRE.exec(url);
        if (match != null) {
          me['videotype'].value = "youtube";
          return true;
        }
        match = gvRE.exec(url);
        if (match != null) {
          me['videotype'].value = "google";
          return true;
        }
        
        alert( "Please enter a valid  YouTube url.");
        return false;
}
