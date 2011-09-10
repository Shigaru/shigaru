<?php 

//Params needed for templating
$module_width = intval( $params->get( 'module_width', 400) );
$module_height = intval( $params->get( 'module_height', 400) );
$width_thumbcb = intval( $params->get( 'width_thumbcb', 80) );
$height_thumbcb = intval( $params->get( 'height_thumbcb', 80) );
$viewname = intval( $params->get( 'viewname', 0) );
$imagelinked  = intval( $params->get( 'imagelinked', 1) );
$gender =  $params->get( 'gender_field', 'cb_gender') ;
$age =  $params->get( 'age_field', 'cb_birthday');
$location = $params->get( 'location_field', 'cb_location');
$show_gender = $params->get( 'showgender', '0');
$show_age = $params->get( 'showage', '0');
$show_location= $params->get( 'showlocation', '0');
$mw = $module_width . 'px';
$mh = $module_height . 'px';

echo	"<div >";
foreach ( $zncbmembers as $row ) {
	// Check if user has an avatar	
	if ($row->avatar != NULL) {
               
        $img = "<img width=\"$width_thumbcb\"  height=\"$height_thumbcb\" class=\"zncbmimg\" src=\"images/comprofiler/" .$row->avatar ."\" t=\"#a".$row->id."\" border=\"0\"/>";
		$imgrel = "images/comprofiler/" .$row->avatar ."\" ";
        } 
	else {
	  
        $img = "<img width=\"$width_thumbcb\"  height=\"$height_thumbcb\" class=\"zncbmimg\" src=\"components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg\"   t=\"#a".$row->id."\" border=\"0\"/>";
		$imgrel = "components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg\" ";
        }
			
	//Displayed pictures 
	
	if ($imagelinked == 1) {
		echo "<a href=\"index.php?option=com_comprofiler&task=userprofile&user=$row->id\">$img</a>";	
		}
	else {
	echo $img;
	}
		//Show Name or Username?
		if ($viewname == 1) {
			$znname = "$row->name";
		} else {
			$znname = "$row->username";
		}
		
		//Show gender?
		if ($show_gender == 1) {
			$zngender = '| ' . $row->$gender;
		} else {
			$zngender = '';
		}
		
				//Show age?
		if ($show_age == 1) {
			$znage = $row->$age;
					$p_strDate = $row->cb_birthday;
			list($Y,$m,$d)    = explode("-",$znage);
		$yearsa            = date("Y") - $Y;
			if(($m > date("m")) || ($m == date("m") && date("d") < $d))
        {
        $yearsa -= 1;
        }
	
	   $years = "| $yearsa years";
		} else {
			$years = '';
		}
		
				//Show location?
		if ($show_location == 1) {
			$znlocation = '| ' . $row->$location;
		} else {
			$znlocation = '';
		}
		
		echo "<div class=\"zntooltip\" id=\"a".$row->id."\"><div style=\"white-space:nowrap;\">$znname $zngender $years  $znlocation</div> </div>";	
	
				}
	echo "</div>";
				?>
