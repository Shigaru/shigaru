<?php 

//Params needed for templating
$module_width = intval( $params->get( 'module_width', 400) );
$module_height = intval( $params->get( 'module_height', 400) );
$width_thumbcb = intval( $params->get( 'width_thumbcb', 80) );
$height_thumbcb = intval( $params->get( 'height_thumbcb', 80) );
$viewname = intval( $params->get( 'viewname', 0) );
$imagelinked  = intval( $params->get( 'imagelinked', 1) );
$gender =  $params->get( 'gender_field', 'cb_gender') ;
$age =  $params->get( 'age_field', 'cb_age');
$location = $params->get( 'location_field', 'cb_location');
$show_gender = $params->get( 'showgender', '0');
$show_age = $params->get( 'showage', '0');
$show_location= $params->get( 'showlocation', '0');
$mw = $module_width . 'px';
$mh = $module_height . 'px';


echo	"<div class=\"pe-container\"><ul id=\"pe-thumbs\" class=\"pe-thumbs\">";
foreach ( $zncbmembers as $row ) {
	// Check if user has an avatar	
	if ($row->avatar != NULL) {
               
        $img = "<img width=\"$width_thumbcb\"  height=\"$height_thumbcb\" class=\"zncbmimg\" src=\"images/comprofiler/" .$row->avatar ."\" t=\"#a".$row->id."\" border=\"0\"/>";
		$imgrel = "images/comprofiler/" .$row->avatar ."\" ";
        } 
	else {
	  
        $img = "<img width=\"61\"  height=\"85\" class=\"zncbmimg\" src=\"components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg\"   t=\"#a".$row->id."\" border=\"0\"/>";
		$imgrel = "components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg\" ";
        }
			
	
		//Show Name or Username?
		if ($viewname == 1) {
			$znname = "$row->name";
		} else {
			$znname = "$row->username";
		}
		
		//Show gender?
		if ($show_gender == 1) {
			$zngender = '- ' . $row->$gender;
		} else {
			$zngender = '';
		}
		
		$years = $row->age;
				//Show location?
		if ($show_location == 1) {
			$znlocation = ' - ' . $row->$location;
		} else {
			$znlocation = '';
		}
		$titleimg = 'Username: '.$znname.'<br/> Status: '.$zngender.'<br /> Age: '.$years.'<br /> Location: '.$znlocation.'<br /> Gender: '.$znlocation;
	
	if ($imagelinked == 1) {
		echo "<li><a href=\"index.php?option=com_comprofiler&task=userprofile&user=$row->id\" >";
		echo $img;
		echo "<div class=\"pe-description\"><h3>".$znname."</h3><p>Status: ".constant($zngender)."<br /> Age: ".$years."<br /> Location: ".constant($znlocation)."<br /></p></div></a></li>	";	
		}
	else {
	echo $img;
	}
				}
	echo "</ul></div>";
				?>
