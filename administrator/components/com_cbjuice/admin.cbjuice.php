<?php

/**

* @version $Id: admin.cbjuice.php, v1.7Beta7 2010-03-27 

* @package CBUICE

* @subpackage CBJUICE

* @copyright  2007-2009 Jacobson Consulting Inc.

* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL

*   Concept based on M3Port/Juice released as Free Software by Pronique software
* - Modded by billt/billt_3 to include email notification
* - Generalized and written by JCI with added functionality to add users and with general email notification option for Joomla
* - Modded by jciconsult, generalized to CB. edit/export  functionality added and updated to 1.5.
* - NOTE - THIS VERSION REQUIRES USE OF FIRST AND LAST NAME AT LEAST AS SEPARATE COMPROFILER FIELDS
* - Supports JACLPLUS AND JUGA

*/



/** ensure this file is being included by a parent file */

if ( ! (  defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

if(!function_exists('array_combine')){
	echo 'function defined<br>';
	function array_combine($a, $b) {
		$c = array();
		$at = array_values($a);
		$bt = array_values($b);
		foreach($at as $key=>$aval) $c[$aval] = $bt[$key];
		return $c;
	}
}
if(!function_exists('str_ireplace')){
	#definition found in php.net
	function str_ireplace($search,$replace,$subject){
		$token = chr(1);
		$haystack = strtolower($subject);
		$needle = strtolower($search);
		while (($pos=strpos($haystack,$needle))!==FALSE){
			$subject = substr_replace($subject,$token,$pos,strlen($search));
			$haystack = substr_replace($haystack,$token,$pos,strlen($search));
		}
		$subject = str_replace($token,$replace,$subject);
		return $subject;
	}
}
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	$acl=&JFactory::getACL();
	$user = &JFactory::getUser();
	$mystuff=$user->usertype;
	#echo "My user type is $mystuff<br>";
	$test=$acl->acl_check('com_user', 'edit', 'users', $mystuff );
	#echo "Test results are $test<br>";
	$user =& JFactory::getUser();
	if($mystuff == "Super Administrator" || $mystuff == "Administrator")
	{
		#echo 'You are an Administrator';
	}
	else
	{
		$app = &JFactory::getApplication();
		$url='index2.php';
		$app->redirect($url, "$mystuff not authorized to use CBJUICE. Administrators and Super Administrators only.");
		echo "failed acl check<br>";
	}
}
else
{
	global $my;
	if (!$acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' )) {

		mosRedirect( 'index2.php', _NOT_AUTH );
	}
}
/* following code ripped off from CB*/
global $_CB_joomla_adminpath, $_CB_adminpath, $ueConfig;
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	$_CB_joomla_adminpath = JPATH_ADMINISTRATOR;
	require_once(JApplicationHelper::getPath('admin_html'));
} else {
	global $mainframe;
	$_CB_joomla_adminpath = $mainframe->getCfg( 'absolute_path' ). "/administrator";
	require_once( $mainframe->getPath( 'admin_html' ) );
}
$_CB_adminpath = $_CB_joomla_adminpath. "/components/com_comprofiler";
include_once($_CB_adminpath."/ue_config.php" );
include_once($_CB_adminpath."/plugin.class.php");
include_once($_CB_adminpath."/comprofiler.class.php");
include_once($_CB_adminpath."/imgToolbox.class.php");
/* end of cb includes*/


if (defined('JPATH_ADMINISTRATOR')){
	$cid = JRequest::getVar('cid', array());
	$task= trim(JRequest::getVar('task', null));
	$delimiter=trim(JRequest::getVar('delimiter',','));
	$opptype=jRequest::getVar('opptype');

}else {
	$task 	= trim( mosGetParam( $_REQUEST, 'task', null ) );
	$cid 	= mosGetParam( $_REQUEST, 'cid', array( 0 ) );
	$delimiter=mosGetParam($_REQUEST,'delimiter',',');
	$opptype=mosGetParam($_REQUEST,'opptype');
}
if ($delimiter== 'TAB') {
	$delimiter = "\t";
}
if (!is_array( $cid )) {

	$cid = array ( 0 );
}
#adding save user capability
#echo  "operation type is $opptype<br/>";
#echo "task type is $task<br>";
$operation=$task;

$exportmode=false;
if($opptype ==3){$exportmode=True;
$operation='save';}
if($opptype ==4){$deletemode=TRUE;
$operation='deleteusers';}
#echo "Operation is $operation<br>";
switch ($operation) {

	case 'process':

		#echo "Goto import users function with option:".$option." and task:".$task."<br>";
		importUsers($option, $task);

		break;

	case 'deleteusers':

		$delcount = deleteregusers();

		HTML_CBJUsers::showDeleted($delcount);

		break;

	case 'about';

	HTML_CBJUsers::showAbout($option);

	break;

	case 'save':

	case 'apply':

		saveUser( $option, $task ,$delimiter);

		break;



	default:

		showUsersImport( $option);

		break;

}





function showUsersImport( $option ) {

	/* global $database, $mainframe, $my, $acl, $mosConfig_list_limit;*/



	HTML_CBJUsers::showUsersImport($option);

}



function importUsers($option, $task) {

	global $_REQUESTS,$HTTP_POST_FILES;



	global $mosConfig_live_site, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_sitename;

	if (defined('JPATH_ADMINISTRATOR')){

		$delimiter=trim(JRequest::getVar('delimiter',','));
		$opptype=JRequest::getVar('opptype',3);
		$ConfirmationEmail=JRequest::getVar('ConfirmationEmail',0);
		$AuditTrail=JRequest::getVar('auditlist',0);
		$database = &JFactory::getDbo();
		$my = &JFactory::getUser();

	}else {

		$delimiter=trim(mosGetParam($_REQUEST,'delimiter',','));
		$opptype=mosGetParam($_REQUEST,'opptype',3);
		$ConfirmationEmail = mosGetParam($_REQUEST,'ConfirmationEmail',0);
		$AuditTrail=mosGetParam($_REQUEST,'auditlist',0);
		global $database,$my;
	}
	if ($delimiter== 'TAB') {
		$delimiter = "\t";
	}




	#Echo "Confirmation email flag is $ConfirmationEmail <br>";
	#$ConfirmationEmail=0;
	#check the field for add mode
	$addmode=False;
	$exportmode=False;
	$auditlist=False;
	$usertypemode=False;

	if($opptype==1){$addmode=True;}
	if($AuditTrail==1){$auditlist=True;}
	#
	#$addmode=False;

	#Echo "Add mode is $addmode <br>";

	#set a flag for the joomla version
	$cbJoomlaVersion=checkJversion();
	#now check to see if the juga_users table is defined
	$JugaDefined=checkforJuga();
	# Figure out what the last table id and determine the next one as $new_id

	$query = "SELECT MAX(id) FROM #__users";

	$database->setQuery( $query );

	$old_id = $database->loadResult();

	$new_id = $old_id + 1;


	# Figure out what the last table id and determine the next one as $new_aro_id
	if($cbJoomlaVersion==1){
		$query_aro = "SELECT MAX(id) FROM #__core_acl_aro";
	} else
	{
		$query_aro = "SELECT MAX(aro_id) FROM #__core_acl_aro";
	}

	$database->setQuery( $query_aro );

	$old_aro_id = $database->loadResult();

	$new_aro_id = $old_aro_id + 1;
	#Echo "NewAro ID is $new_aro_id<br>";

	# Figure out what the last table id and determine the next one as $new_comprofiler_id

	$query_comprofiler = "SELECT MAX(id) FROM #__comprofiler";

	$database->setQuery( $query_comprofiler );

	$old_comprofiler_id = $database->loadResult();

	$new_comprofiler_id = $old_comprofiler_id + 1;


	# Set the register date to the current time and date

	$registerdate = date("Y-m-d H:i:s");

	#set default counts - BT
	$ImportedRecord = 0;
	$AlreadyExists = 0;
	#open file for read only
	$filehandle=fopen($_FILES['csvusers']['tmp_name'],'r');
	if($filehandle==0){
		Echo "Input file is not defined<br>";
		return;
	}
	#now process the header variables
	$headervariables=fgetcsv($filehandle,4096,$delimiter,'"');
	/* here we need to clean the header variables for leading and trailing blanks*/
	$numbheader=count($headervariables);
	$headpoint=0;
	while($headpoint<$numbheader){
		$headervariables[$headpoint]=trim($headervariables[$headpoint]);
		$headpoint++;
	}
	echo "Header Variables are<br>";
	print_r($headervariables);
	echo "<br>";
	# check for username;
	if(checkHeaderNames($headervariables,"username")<0){
		Echo "username must be supplied<br>";
		return;
	}
	/* Now we are setting up the usertype coding
	 This is a special variable usertype which must be in aro_group
	 */
	if(checkHeaderNames($headervariables,"usertype")>=0){
		echo "usertypes will be processed<br>";
		$usertypemode=True;
	}
	$middlenamedefined=False;
	if(checkHeaderNames($headervariables,"middlename")>=0){
		echo "Middle Name is Defined<br>";
		$middlenamedefined=True;
	}
	#now check for Juga in the processing
	$JugaRun=False;
	$JugaHeaderPointer=0;
	if(checkHeaderNames($headervariables,"jugagroups")>=0){
		Echo "Juga group in header<br>";
		if(!$JugaDefined){
			echo "Juga tables are not available<br>";
			return;
		}
		$JugaHeaderPointer=checkFields("jugagroups",$headervariables);
		echo "Juga header pointer $JugaHeaderPointer<br>";
		$JugaRun=True;
	}
	#now we have to get the Juga groups definition
	if($JugaRun){
		$query="Select * FROM #__juga_groups";
		$database->setquery($query);
		$database->query();
		if($database->getErrorNum()){
			print("<font colour=red>SQL Error in #__juga_groups looking for juga_groups".
			$database->stderr(true)."<font colour=red>");
			$returnflag=999;
			return $returnflag;
		}
		$Juga_Groups=$database->loadObjectList();
		echo "Jugagroups retrieved<br>";
		#print_r($Juga_Groups);
		$Juga_group_names=$database->loadResultArray(1);
		#print_r($Juga_group_names);
		$Juga_group_ids=$database->loadResultArray(0);
		#print_r($Juga_group_ids);
	} else {
		$Juga_Groups=array();  /* this provides a default for the array*/
	}

	#rules are to default the last name to user name in add mode
	#password to username
	#first and middel to blank
	#
	#now get field names
	#in CB1.2, a new variable has been added to the fields tablecolumns just to screw things up.
	#therefore we have to get the fields in field table to tell what version we are working with
	#now get the fields in comprofiler_fields;
	$query="SHOW FIELDS FROM #__comprofiler_fields";
	$database->setquery($query);
	$database->query();
	if($database->getErrorNum()){
		print("<font colour=red>SQL Error in #__comprofiler_fields looking for comprofiler fields".
		$database->stderr(true)."<font colour=red>");
		$returnflag=999;
		return $returnflag;
	}
	$comprofiler_fields_fields=$database->loadResultArray();
	$tablecolumnsthere=False;
	if(array_search("tablecolumns",$comprofiler_fields_fields)>0){
		#tablecolumns are there
		$tablecolumnsthere=True;
	}
	#because some compound fields  are only in the comprofiler table,
	#we need to check the fields in the comprofiler table itself
	$query="SHOW FIELDS FROM #__comprofiler";
	$database->setquery($query);
	$database->query();
	if($database->getErrorNum()){
		print("<font colour=red>SQL Error in #__comprofiler looking for comprofiler fields".
		$database->stderr(true)."<font colour=red>");
		$returnflag=999;
		return $returnflag;
	}
	$comprofiler_variables=$database->loadResultArray();
	#print_r($comprofiler_variables);
	#echo "<br>";
	#Echo "Starting names<br>";
	if($tablecolumnsthere){
		$query_fieldnames="SELECT  u.name, u.table,u.tablecolumns FROM #__comprofiler_fields u";}
		else {
			$query_fieldnames="SELECT  u.name, u.table FROM #__comprofiler_fields u";
		}
		$database->setquery($query_fieldnames);
		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in comprofiler" . $database->stderr(true)."</font><br />");
			return;
		}
		$fieldlist=$database->loadResultArray();
		$fieldobject=$database->loadObjectList();

		$numbfields=count($fieldlist);
		#
		#debug code
		#echo "number of fields= $numbfields<br>";
		#print_r(($fieldlist));
		#echo "<br>";
		#print_r($fieldobject);

		#echo "<br>starting names<br>";
		#for edit processing we need to know if any of the name fields are supplied
		$namesfound=False;

		# we must check to see if name variables are in the header
		$namefields=array("firstname","middlename"."lastname");
		$namevariables=array_intersect($namefields,$headervariables);
		if(count($namevariables)>0){$namesfound=True;}

		#print_r($namevariables);
		#echo "<br>finished<br>";
			

		##Next code checks for missing variables and builds up a list of variables and pointers that go to the comprofiler table.


		$numbmissing=0;
		$comprofilernames=array();
		#comprofilerpointers maps the user data defined by the header variables to the array comprofiler values that goes into the comprofiler table
		$comprofilerpointers=array();
		$users_names=array();
		$users_pointers=array();
		$extra_user_variables=array("username","password","usertype","jugagroups");
		foreach($headervariables as $thisvar){
			if(checkFields($thisvar,$extra_user_variables)>0) {
				$nop1=1;
			}else{
				#The first test is against the cb field list, the second is against the comprofiler variables
				$testindex=checkFields($thisvar,$fieldlist);
				$testincomprofiler=checkFields($thisvar,$comprofiler_variables);
				#$resulttest=checkIsInTable($thisvar,$fieldobject,"#__users");
				#echo "$thisvar has a result of $resulttest<br>";
				if($thisvar=="block"){
					 $users_names[]=$thisvar;
					 $users_pointers[]=array_search($thisvar,$headervariables);
					$testindex=1;
				}
				
				if($testindex<0 and $testincomprofiler<0 ){
					$numbmissing++;
					echo "Field not defined in CB $thisvar<br>";
				}elseif(checkIsInTable($thisvar,$fieldobject,"#__comprofiler")>0){
					#because of a change in comprofiler, this code must change  to allow a remap to a different name.
					if($tablecolumnsthere){
						$icolumnpointer=CheckIsInTable($thisvar,$fieldobject,"#__comprofiler");
						#echo "$thisvar has a pointer of $icolumnpointer<br>";

						$columnname=$fieldobject[$icolumnpointer]->tablecolumns;
						#it only makes sense to update if valid names are there
						$xx=strpos($columnname,",") == False;
						#echo "$thisvar has a column name of $columnname with a test of $xx<br>";
						if(is_string($columnname) AND $columnname <> "" AND strpos($columnname,",") == False){
							$comprofilernames[]=$columnname;
							$comprofilerpointers[]=array_search($thisvar,$headervariables);
						} elseif ($columnname==""){  #this is the case where there is no column name
							$comprofilernames[]=$thisvar;
							$comprofilerpointers[]=array_search($thisvar,$headervariables);
						} else {
							$comprofilernames[]=$thisvar;
							$comprofilerpointers[]=array_search($thisvar,$headervariables);
							echo "$thisvar is part of a compound variable <br>";
						}
					} else{
						$comprofilernames[]=$thisvar;
						$comprofilerpointers[]=array_search($thisvar,$headervariables);
					}


				}elseif(checkIsInTable($thisvar,$fieldobject,"#__users")>0){
					$users_names[]=$thisvar;
					Echo "Processing $thisvar in users<br>";
					$users_pointers[]=array_search($thisvar,$headervariables);
				}

			}
		}

		if($numbmissing>0){
			echo "Now aborting because $numbmissing fields are not defined in the CB database<br>";
			return;

		}
		/*We want to add at least one variable to comprofiler*/
		if(sizeof($comprofilernames)<=0 && $addmode){
			Echo "There must be at least one CB field in an ADD run<br>";
			return;
		}
		/* need to check for duplicates */
		$count=0;
		$bad=0;
		$numbheader=array_count_values($headervariables);
		foreach($numbheader as $thisitem){
			if($thisitem>1){
				$bad++;
				echo "$headervariables[$count] is duplicated<br>";
			}
			$count++;
		}
		if($bad>0){
			echo "aborting because of duplicate header variables<>";
			return;
		}
		/* end of duplicate check*/
		#if the header contains password then we have to add it to the user table;
		$pwpointer=checkFields("password",$headervariables);
		if($pwpointer>=0){
			$users_names=array_merge(array("password"),$users_names);
			$users_pointers=array_merge(array($pwpointer),$users_pointers);

		}
		#
		# Comprofiler names are the names of the variables going into the comprofiler table
		# users_names go to the users table
		# the corresponding pointer arrays refer to the position of the information in the input CSV file
		#
		#print_r($comprofilernames);
		#echo "<br>";
		#print_r($comprofilerpointers);
		#echo "<br> Users_names<br>";
		#print_r($users_names);
		#echo "<br>users_pointers <br>";
		#print_r($users_pointers);
		#echo "<br>";
		#$x=format_sql_array($comprofilernames);
		#echo "formated names = $x<br>";
		#return;
		#now get the fields in comprofiler;
		$query="SHOW FIELDS FROM #__comprofiler";
		$database->setquery($query);
		if($database->getErrorNum()){
			print("<font colour=red>SQL Error in #__users looking for comprofiler fields".
			$database->stderr(true)."<font colour=red>");
			$returnflag=999;
			return $returnflag;
		}
		$comprofiler_field_list=$database->loadResultArray();
		#echo "Comprofiler fields <br>";
		#print_r($comprofiler_field_list);
		#echo "<br>";
		if($addmode){
			if(array_search("lastname",$comprofiler_field_list)<=0){
				Echo "This COM requires at least firstname and lastname<br>";
				return;
			}
		}
		/* this code sets up the array for looking up the usertype
		 Unfortunately, the structure of core_acl_aro_groups is slightly different between the two versions of Joomla
		 This code will have to be revisited in each new major change to the Joomla ACL
		 We build up an array with the id field and the name
		 This is used to check the type in the special variable usertype
		 */
		if($cbJoomlaVersion==1){
			$query="select u.id, u.name from #__core_acl_aro_groups u";
		}else {
			$query="select u.group_id, u.name from #__core_acl_aro_groups u";
		}
		$database->setquery($query);
		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in core_acl_aro_groups" . $database->stderr(true)."</font><br />");
			return;
		}
		$aro_group_ids=$database->loadResultArray(0);
		$aro_group_names=$database->loadResultArray(1);
		/*at this point, we have two vectors, we look up the type in acl names and find the aclid*/
		$new_group_name="Registered";
		/* bebugging code
		 print "<br> aro arrays <br>";
		 print_r($aro_group_names);
		 print "<br>";
		 print_r($aro_group_ids);
		 print "<br>";
		 */
		$new_group_id=find_group_id($new_group_name,$aro_group_names,$aro_group_ids);
		if($new_group_id<0){
			print ("<font color=red> $new_group_name not found in core_acl_aro_groups </font><br />");
			return;
		}
		$usertypepointer=checkFields("usertype",$headervariables);


		##### Debug
		########
		$a=0;
		while ($eachuser = fgetcsv($filehandle,4096,",","\"")) {

			$a++;
			$new_id++;
			$new_aro_id++;
			$new_comprofiler_id++;



			#now we need to edit each cell in eachuser;
			$cellcount=0;
			Foreach($eachuser as $thiscell) {
				$eachuser[$cellcount]=addcslashes($thiscell,"'");
				$cellcount++;
			}


			$cf=checkFields("username",$headervariables);
			if ($cf>-1) $username=$eachuser[$cf];
			$cf=checkFields("password",$headervariables);
			if ($cf>-1) $password1=$eachuser[$cf];
			if($addmode){
				$password=defaultNameFields($eachuser,$headervariables,"password",RandomPassword(8));
			}else
			{
				$password=defaultNameFields($eachuser,$headervariables,"password","not available");
			};
			$lastname=defaultNameFields($eachuser,$headervariables,"lastname",$username);
			$cf=checkFields("firstname",$headervariables);
			if ($cf>-1) $firstname=$eachuser[$cf];
			$firstname=defaultNameFields($eachuser,$headervariables,"firstname","");
			$email=defaultNameFields($eachuser,$headervariables,"email",($username . "@" . $_REQUEST['defaultemaildomain']));
			#echo "<br> $email is email<br>";
			#print_r($eachuser);
			#echo "<br> end of eachuser <br>";
			$comprofilervalues=array();
			foreach($comprofilerpointers as $thispointer){
				$comprofilervalues[]=$eachuser[$thispointer];
				#echo "value is $eachuser[$thispointer]<br>";
			}
			$users_values=array();
			foreach($users_pointers as $thispointer){
				$users_values[]=$eachuser[$thispointer];
			}
			#we need to encode the password with md5
			$pwpointer=CheckFields("password",$users_names);
			#echo "<br> Password pointer is $pwpointer<br>";
			if($pwpointer>=0){
				$users_values[$pwpointer]=cbHashPassword($users_values[$pwpointer]);

			}

			#now, we have to see if the usertype is defined;
			$new_aro_group_name="Registered";
			$new_aro_group_id=18;
			if($usertypepointer>=0){
				$checkvalue=$eachuser[$usertypepointer];
				#echo "testing $checkvalue <br>";
				$new_aro_group_id=find_group_id($checkvalue,$aro_group_names,$aro_group_ids);
				if($new_aro_group_id>=0){
					$new_aro_group_name=find_group_name($checkvalue,$aro_group_names);
					#echo "$username $new_aro_group_name  $new_aro_group_id <br>";
				}else
				{
					echo "Not found $username $checkvalue Registered assumed<br>";
					$new_aro_group_name="Registered";
					$new_aro_group_id=18;
				}
			}
			#now we have to create the group ids the current algorithm replaces the Juga Group i
			if($JugaRun & ($JugaHeaderPointer>0)){
				$JugaIdsForUser=array();
				#echo "Juga for $username<br>";

				$checkvalues=explode("+",$eachuser[$JugaHeaderPointer]);
				foreach($checkvalues as $checkvalue){
					$new_Juga_id=find_group_id($checkvalue,$Juga_group_names,$Juga_group_ids);
					if($new_Juga_id>=0){
						$JugaIdsForUser[]=$new_Juga_id;
						#echo "Juga $username $checkvalue $new_Juga_id<br>";
					} else
					{
						# default  to 0
						#$JugaIdsForUser[]=$Juga_group_ids[0];
						#echo "$username $checkvalue defaulted to $Juga_group_ids[0] $Juga_group_names[0]<br>";
						$JugaIdsForUser[]=0;
						echo "$username $checkvalue will not be processed<br>";

					}
				}
			} else {
				$JugaIdsForUser=array();
			}

			# added for Joomla name - BT
			$name = $firstname . " " . $lastname;
			if($middlenamedefined){
				$middlename=defaultNameFields($eachuser,$headervariables,"middlename","");
				$name=$firstname." ".$middlename." ".$lastname;
			}

			if ($username) {

				if (!$name) {$name = $username;}

				if (!$email) {$email = $username . "@" . $_REQUEST['defaultemaildomain'];}

				#echo "call to insertuser function";
				# now use arrays of names and values
				$error=0;
				#removed by pmj if (!isset($namesvariables))$namesvariables="";
				if($addmode){
					$error = insertuser($auditlist,$cbJoomlaVersion,$new_aro_group_name,$new_aro_group_id,$username, $password, $name, $email,
					$registerdate, $new_id, $new_aro_id, $new_comprofiler_id, $lastname, $firstname, $comprofilernames,$comprofilervalues,$JugaRun,$JugaIdsForUser);
				}else{
					#now we are in edit mode
				#	$error=edituser($auditlist,$cbJoomlaVersion,$usertypemode,$new_aro_group_name,$new_aro_group_id,$username,$new_id,$new_aro_id,
				#	$new_comprofiler_id,$namesvariables,$namesfound,$users_names,$users_values,$comprofilernames,$comprofilervalues,$JugaRun,$JugaIdsForUser);
					
					$error=edituser($auditlist,$cbJoomlaVersion,$usertypemode,$new_aro_group_name,$new_aro_group_id,$username,$new_id,$new_aro_id,
					$new_comprofiler_id,$namevariables,$namesfound,$users_names,$users_values,$comprofilernames,$comprofilervalues,$JugaRun,$JugaIdsForUser);

				}
				# Update counts of imported records - BT
				if ($error < 1) {
					$ImportedRecord++;
				} else { $AlreadyExists++; }


			} else { echo "Line $a ignored, probably blank<br>";}
			# send confirmation email if checked - BT
			#echo "Confirmation Email flag is $ConfirmationEmail <br>";
			if ($ConfirmationEmail == 1 && $error < 1) {
				if (defined('JPATH_ADMINISTRATOR')){
					$adminEmail2=JRequest::getVar('cbjuice_ConfirmationSender');
					$emailsubject=	JRequest::getVar('cbjuice_ConfirmationSubject');
					$emailbody=JRequest::getVar('cbjuice_message');
				}else {
					$adminEmail2=mosGetParam($_REQUEST,'cbjuice_ConfirmationSender');
					$emailsubject=mosGetParam($_REQUEST,'cbjuice_ConfirmationSubject');
					$emailbody=mosGetParam($_REQUEST,'cbjuice_message');

				}
				$
				$adminName2="Registration";

				$emailbody= str_ireplace("{username}",$username,$emailbody);
				$emailbody=str_ireplace("{firstname}",$firstname,$emailbody);
				$emailbody=str_ireplace("{lastname}",$lastname,$emailbody);
				$emailbody=str_ireplace("{password}",$password,$emailbody);

				// Send first email to user
				$bccaddress=NULL;
				if($_REQUEST['BccEmail']==1){
					$bccaddress=$adminEmail2;
				}
				if (defined('JPATH_ADMINISTRATOR')){
					JUtility::sendMail($adminEmail2, $adminName2, $email, $emailsubject, wordwrap($emailbody),
					false, NULL, $bccaddress );
				}else{
					mosMail($adminEmail2, $adminName2, $email, $emailsubject, wordwrap($emailbody),
					false, NULL, $bccaddress );
				}
				echo "User Created and Confirmation email Sent to $email and $bccaddress <br>";
				#echo "$emailbody<br>";
			}

		}

		fclose($filehandle);
		if(!$addmode){
			echo "<h3> $ImportedRecord users of $a records have been updated</H3>";
		}else{
			echo "<H3>$ImportedRecord users out of $a record(s) imported! $AlreadyExists user record(s) already existed.</H3>";
		}



}



function deleteregusers() {





	if (defined('JPATH_ADMINISTRATOR')){

		$deletetype=trim(JRequest::getVar('deletetype',''));
		$database = &JFactory::getDbo();
		$my = &JFactory::getUser();

	}else {

		$deletetype=mosGetParam($_REQUEST,'deletetype','');
		global $database,$my;
	}
	/* first, we must find the type to be deleted*/

	if($deletetype==""){echo "no delete type defined<br>";
	return;
	}
	#set a flag for the joomla version

	$target_gid=-99;
	$myid=$my->id;
	#echo "My id is $myid  I can't delete myself<br>";

	#now check to see if the juga_users table is defined
	$JugaDefined=checkforJuga();

	/* this code sets up the array for looking up the usertype
	 Unfortunately, the structure of core_acl_aro_groups is slightly different between the two versions of Joomla
	 This code will have to be revisited in each new major change to the Joomla ACL
	 We build up an array with the id field and the name
	 This is used to check the type in the special variable usertype
	 */
	$cbJoomlaVersion=checkJversion();
	if($cbJoomlaVersion==1){
		$query="select u.id, u.name from #__core_acl_aro_groups u";
	}else {
		$query="select u.group_id, u.name from #__core_acl_aro_groups u";
	}
	$database->setquery($query);
	$database->query();
	if ($database->getErrorNum()) {
		print("<font color=red>SQL error in core_acl_aro_groups" . $database->stderr(true)."</font><br />");
		return;
	}
	$aro_group_ids=$database->loadResultArray(0);
	$aro_group_names=$database->loadResultArray(1);
	/*at this point, we have two vectors, we look up the type in acl names and find the aclid*/
	$new_group_name=$deletetype;
	/* bebugging code
	 print "<br> aro arrays <br>";
	 print_r($aro_group_names);
	 print "<br>";
	 print_r($aro_group_ids);
	 print "<br>";
	 */
	$target_gid=find_group_id($new_group_name,$aro_group_names,$aro_group_ids);
	if($target_gid<0){
		print ("<font color=red> $new_group_name not found in core_acl_aro_groups </font><br />");
		return;
	}

	$query = "SELECT id FROM #__users where `gid`=".$target_gid;

	$database->setQuery( $query );
	$database->query();

	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		print("<font color=red>SQL error in users in delete" . $database->stderr(true)."</font><br />");
		return;
	}



	foreach ($rows as $row) {
		$thisid=$row->id;
		if($thisid==$myid){ echo "You cannot delete yourself<br>";

		}else{
			$delcount++;
			#first, we must the aro_id to delete from the map  this code will not be version invariant
			if($cbJoomlaVersion==1){
				$query1="SELECT id FROM #__core_acl_aro where `value`=".$row->id;
			}else{
				$query1="SELECT aro_id  FROM  #__core_acl_aro where `value`=".$row->id;
			}
			$database->setQuery($query1);
			$database->query();
			if ($database->getErrorNum()) {
				print("<font color=red>SQL error in #__core_acl_aro  in delete get map id" . $database->stderr(true)."</font><br />");
				return;
			}
			$aro_map_id=$database->loadResult();
			$query2 = "DELETE FROM #__core_acl_groups_aro_map where `aro_id`=".$aro_map_id;

			$database->setQuery( $query2 );

			$database->query();

			if ($database->getErrorNum()) {
				print("<font color=red>SQL error in #__core_acl_groups_aro_map in delete" . $database->stderr(true)."</font><br />");
				return;
			}

			$query = "DELETE FROM #__core_acl_aro where `value`=" . $row->id;

			$database->setQuery( $query );

			$database->query();
			if ($database->getErrorNum()) {
				print("<font color=red>SQL error in #__core_acl_aro  in delete" . $database->stderr(true)."</font><br />");
				return;
			}
			$query ="DELETE FROM #__comprofiler where `user_id`=".$row->id;
			$database->setQuery($query);
			$database->query();
			if ($database->getErrorNum()) {
				print("<font color=red>SQL error in #__comprofiler  in delete" . $database->stderr(true)."</font><br />");
				return;
			}
			$query = "DELETE FROM #__users where `id`=".$row->id;


			$database->setQuery( $query );

			$database->query();
			if ($database->getErrorNum()) {
				print("<font color=red>SQL error in #__users in delete" . $database->stderr(true)."</font><br />");
				return;
			}
			if($JugaDefined){
				#echo "Juga is defined in Delete Run for $row->id<br>";
				#we must delete any existing Juga records
				#first, we must see if any records available;
				#First we must delete the existing juga groupids for this user;
				$query = "SELECT COUNT(user_id) from #__juga_u2g WHERE `user_id` =". $row->id;

				$database->setQuery( $query );
				if ($database->getErrorNum()) {
					print("<font color=red>SQL error in #__juga_u2g checking for existing records" . $database->stderr(true)."</font><br />");
					return;
				}
				$RecordCount = $database->loadResult();
				print("U2G count to be delete is ". $RecordCount ." for '$row->id'<br/>");
					
				if($RecordCount>0){

					$query = "DELETE FROM #__juga_u2g where `user_id`=".$row->id;

					$database->setQuery( $query );

					$database->query();
					if ($database->getErrorNum()) {
						print("<font color=red>SQL error in #__juga_u2g in delete" . $database->stderr(true)."</font><br />");
						return;
					}
				}

			}



		}
	}

	return $delcount;

}



function insertuser ($auditlist,$cbJoomlaVersion,$new_group_name,$new_group_id,$username, $password, $name, $email, $registerdate, $new_id, $new_aro_id, $new_comprofiler_id, $lastname, $firstname,
$comprofilernames, $comprofilervalues,$JugaRun,$JugaIdsForUser) {

	if (defined('JPATH_ADMINISTRATOR')){

		$database = &JFactory::getDbo();
		$my = &JFactory::getUser();

	}else {

		global $database,$my;
	}


	# MD5 the Password as $encpassword - now using cb routine

	$encpassword = cbHashPassword($password);

	# unremarked to show progress - BT
	#echo "Password is '$password' or in MD5 is $encpassword.<br>";
	# modified to current Joomla table name - BT

	$query = "SELECT COUNT(username) from #__users WHERE `username` = '$username'";

	$database->setQuery( $query );
	if ($database->getErrorNum()) {
		print("<font color=red>SQL error in #__users in dupcheck" . $database->stderr(true)."</font><br />");
		return;
	}
	$dupCount = $database->loadResult();
	#echo "<br>For $username the count is $dupCount <br>";

	if ($dupCount > 0) {

		echo "Username Already Exists: $username<br>";

	} else {

		if($auditlist){echo "Inserting for user name  $username $name $email Password= $password<br>";}
		# unremarked for testing purposes - BT
		#echo "Now we will insert the rows into jos_users<br>";
		#echo "$username gets $new_group_name and $new_group_id<br>";
			
		$query = "INSERT INTO #__users (id, name, username, email, password , usertype, block, sendEmail, gid, registerDate, lastvisitDate) VALUES ('$new_id', '$name', '$username', '$email', '$encpassword', '$new_group_name', '0', '0', '$new_group_id', '$registerdate', '0000-00-00 00:00:00')";

		# debug - BT
		#echo "Users table query is '$query'<br>";
		$database->setQuery( $query );
		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in usertable insert" . $database->stderr(true)."</font><br />");
			return;
		}


		#echo print_r($database->errorInfo()) . " - users<br>";


		# unremarked for testing purposes - BT
		#echo "Now we will insert the rows into jos_core_acl_aro<br>";
		#problem is that the names have been changed from aro_id to id in joomla 1.5 - need to change

		if($cbJoomlaVersion==1){
			$query = "INSERT INTO #__core_acl_aro (id , section_value , value , order_value , name , hidden) VALUES ('$new_aro_id', 'users', '$new_id', '0', '$name', '0')";
		} else
		{
			$query = "INSERT INTO #__core_acl_aro (aro_id , section_value , value , order_value , name , hidden) VALUES ('$new_aro_id', 'users', '$new_id', '0', '$name', '0')";
		}

		# debug - BT
		#echo "core_acl_aro table query is '$query'<br>";
		$database->setQuery( $query );

		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in acl_aro" . $database->stderr(true)."</font><br />");
			return;
		}

		#echo print_r($database->errorInfo()) . " - jos_core_acl_ar<br>";



		# unremarked for testing purposes - BT
		#echo "Now we will insert the rows into jos_core_acl_groups_aro_map<br>";
		$query = "INSERT INTO #__core_acl_groups_aro_map (group_id , section_value , aro_id) VALUES ($new_group_id, '', '$new_aro_id')";

		# debug - BT
		#echo "core_acl_groups_aro_map table query is '$query'<br>";
		$database->setQuery( $query );

		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in acl_groups_aro_map" . $database->stderr(true)."</font><br />");
			return;
		}



		#issue is that there may be no compfiler names on an initial add.
		$query1="INSERT INTO #__comprofiler (id, user_id, approved, confirmed, ";
		$query2=implode(",",$comprofilernames);
		$query3=") VALUES ($new_comprofiler_id, $new_id, 1, 1,  ";
		$query4=format_sql_array($comprofilervalues);
		#Echo "query1= $query1<br>";
		#echo "query2= $query2<br>";
		#echo "query3= $query3<br>";
		#echo "query4= $query4<br>";
		$query=$query1 . $query2 . $query3 . $query4 . ")";

		# debug - BT
		#echo "comprofiler table query is $query <br>";
		$database->setQuery( $query );

		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in comprofiler" . $database->stderr(true)."</font><br />");
			return;
		}
		#now we start on JUGA
		if($JugaRun){
			foreach ($JugaIdsForUser as $new_juga_group_id) {
				if($new_juga_group_id>0){
					$query="INSERT INTO #__juga_u2g (user_id,group_id) VALUES ($new_id,$new_juga_group_id)";
					$database->setQuery($query);
					#Echo "query= $query<br>";
					$database->query();
					if($database->getErrorNum()){
						print("<font color=read> SQL Error in Juga_u2g".$database->stderr(true)."</font><br/>");
						return;
					}
				}
			}
		}

	}

	return $dupCount;


} # End insertuser function



function checkFields($fieldname,$fieldsarray){
	if(in_array($fieldname,$fieldsarray)){
		$fieldloc=array_search($fieldname,$fieldsarray);
	}else{
		$fieldloc=-1;
	}
	return $fieldloc;
}

function checkHeaderNames($headervariables,$mustname){
	$thisres=in_array($mustname,$headervariables);
	#echo "Result is $thisres<br>";
	if(!$thisres){
		#echo "$mustname is required <br>";
		return -1;
	}
	return 0;
}
#this function uses an object from the fields table
#to determine if the field is in the comprofiler list
function checkIsInTable($fieldname,$fieldsobjects,$tablename){
	$isInList=-1;
	$cc=0;
	foreach($fieldsobjects as $individualfield){
		# this code checks for membership in the modified table system either in the name field or in the table name field.
		$namesintable=explode(",",$individualfield->tablecolumns);
		if(($fieldname==$individualfield->name OR array_search($fieldname,$namesintable)>0) and
		($tablename==$individualfield->table)){
			#echo "$fieldname is in comprofiler<br>";
			return $cc;
		}
		$cc++;
	}
	return -1;
}
function format_sql_array($array){
	$SQLstring = "";
	foreach($array as $item){
		$SQLstring .= "'$item',";
	}

	$SQLstring = rtrim($SQLstring, ",");

	return $SQLstring;
}
function defaultNameFields($eachuser,$headervariables,$namefield,$defaultvalue){
	#if the name field is not defined in the header, return the default value otherwise return the value in the each user array
	$returnvalue="";
	$thispointer=checkFields($namefield,$headervariables);
	if($thispointer<0){
		$returnvalue=$defaultvalue;
	}else{
		$returnvalue=trim($eachuser[$thispointer]);
	}
	return $returnvalue;
}
#function find_group_id returns the correct group_id
function find_group_id($str, $aro_group_names,$aro_group_ids) {
	$idcount=0;
	foreach ($aro_group_names as $v) {
		if(strcasecmp($str, $v) == 0)
		return ($aro_group_ids[$idcount]) ;
		$idcount++;
			
	}
	return -1;
}
#function find_group_name exists to return the correct case on the aro_group_name
function find_group_name($str, $aro_group_names) {
	$idcount=0;
	foreach ($aro_group_names as $v) {
		if(strcasecmp($str, $v) == 0) {
			return ($aro_group_names[$idcount]);}
			$idcount++;
	}
	return "Registered";
}
function  edituser($auditlist,$cbJoomlaVersion,$usertypemode, $new_group_name,$new_group_id,$username,$new_id,$new_aro_id,$new_comprofiler_id,$namevariables,$namesfound,$users_names,$users_values,
$comprofilernames,$comprofilervalues,$JugaRun,$JugaIdsForUser){

	if (defined('JPATH_ADMINISTRATOR')){

		$database = &JFactory::getDbo();
		$my = &JFactory::getUser();

	}else {

		global $database,$my;
	}

	$returnflag=0;

	if($auditlist){echo "Updating for user name  $username <br>";}
	#print_r($comprofilervalues);
	#echo "<br>end of values<br>";
	#first we must see if the username exists
	$query="SELECT * FROM #__users WHERE `username`= '$username'";
	$database->setquery($query);
	$database->query();
	if($database->getErrorNum()){
		print("<font colour=red>SQL Error in #__users looking for $username".
		$database->stderr(true)."<font colour=red>");
		$returnflag=999;
		return $returnflag;
	}

	$userobject=$database->loadObjectlist();
	$vblcount=count($userobject);
	if($vblcount=0 OR is_null($userobject[0]->id)){
		print "$username is missing<br>";
		$returnflag=1;
		return $returnflag;
	}elseif($vblcount>1){
		print "<font colour=red>$username is duplicated-serious error $vblcount <font colour=red>";
		$returnflag=$vblcount;
		return $returnflag;
	}else{
		#now we are in the main line of this routine
		$currentuserid=$userobject[0]->id;
		#Echo "$username has the id of ". ($userobject[0]->id) . "<br>";
		#first retrieve the comprofiler data
		$query="SELECT * FROM #__comprofiler where `user_id`='$currentuserid'";

		$database->setquery($query);
		$database->query();
		if($database->getErrorNum()){
			print("<font colour=red>SQL Error in #__comprofiler looking for $username".
			$database->stderr(true) . "<font colour=red>");
			$returnflag=999;
			return $returnflag;
		}

		$comprofilerobject=$database->loadObjectlist();
		#the first issue is sorting out whether there are any name changes;
		#this is the original firstname, last name
		$nameschanged=False;
		$firstname=$comprofilerobject[0]->firstname;
		$lastname=$comprofilerobject[0]->lastname;

		if(sizeof($comprofilernames)>0){
			$cc2=array_combine($comprofilernames,$comprofilervalues);

			if(array_key_exists("firstname",$cc2)){
				$nameschanged=true;
				$firstname=$cc2["firstname"];
			}
			if(array_key_exists("lastname",$cc2)){
				$nameschanged=true;
				$lastname=$cc2["lastname"];
			}
		}
		$newname=$firstname . " " .$lastname;
		$query1="UPDATE #__users SET ";
		$query2="";
		$query3="WHERE `id`='$currentuserid'";
		if($nameschanged){
			#echo "<br> changing " . $userobject[0]->name . " to " . $newname . " for " . $username . " <br>";
			if(strlen($query2)>0){$query2=$query2 .",";}
			$query2=$query2 . " `name`='$newname' ";

		}
		#now add the other user variables
		$counter=0;
		foreach($users_names as $thisitem){
			if(strlen($query2)>0){$query2=$query2 . ", ";}
			$query2=$query2. "`" . $thisitem ."` ='" . $users_values[$counter] . "'";
			$counter++;
		}
		#now if the aro stuff is being updated, we have to add it here
		if($usertypemode){
			if(strlen($query2)>0){$query2=$query2 . ", ";}
			$query2=$query2. "`usertype`='".$new_group_name."'";
			$query2=$query2. ",`gid`='".$new_group_id."'";
		}
		#
		if(strlen($query2)>0){    /* this check is need just in case nothing is done to the user table*/
			$query=$query1 . $query2 . $query3;

			$database->setquery($query);
			#Echo "<br>User query is $query <br>";

			$database->query();
			if($database->getErrorNum()){
				print("<font colour=red>SQL Error in #__users updating $username".
				$database->stderr(true) . "<font colour=red>");
				$returnflag=999;
				return $returnflag;
			}
		}
		#now we check again for the user type mode and fix up the aro map
		###
		if($usertypemode){
			# first, we have to get the aro id but it is joomla version specific
			if($cbJoomlaVersion==1){
				$query="SELECT u.id FROM #__core_acl_aro u WHERE `value`='$currentuserid'";
			}else {
				$query="SELECT u.aro_id FROM #__core_acl_aro u WHERE `value`='$currentuserid'";
			}
			$database->setquery($query);
			$database->query();
			if($database->getErrorNum()){
				print("<font colour=red>SQL Error in #__core_acl_aro updating $username".
				$database->stderr(true) . "<font colour=red>");
				$returnflag=999;
				return $returnflag;

			}
			$current_aro_id=$database->loadResult();
			#echo "for $username, aro_id= $current_aro_id <br>";
			#
			$query1="UPDATE #__core_acl_groups_aro_map SET";
			$query2="`group_id`='".$new_group_id."'";
			$query3="where `aro_id`='".$current_aro_id."'";
			$query=$query1 . $query2 . $query3;
			$database->setquery($query);
			$database->query();
			if($database->getErrorNum()){
				print("<font colour=red>SQL Error in #__core_acl_groups_aro_map updating $username".
				$database->stderr(true) . "<font colour=red>");
				$returnflag=999;
				return $returnflag;

			}
		}
		#now it is just to update the comprofiler variables
		$query1="UPDATE #__comprofiler SET";
		$query2="";
		$counter=0;
		foreach($comprofilernames as $thisname){
			if(strlen($query2)>0){$query2=$query2 . " , ";}
			$query2=$query2 . " `" . $thisname . "` = '" . $comprofilervalues[$counter] . "'";
			$counter++;
		}
		$query3=" WHERE `id`=" . $comprofilerobject[0]->id;
		$query=$query1 . $query2 .$query3;
		if($counter>0){
			$database->setquery($query);

			#echo "<br>Comprofiler query is $query <br>";

			$database->query();
			if($database->getErrorNum()){
				print("<font colour=red>SQL Error in #__comprofiler updating $username".
				$database->stderr(true) . "<font colour=red>");
				$returnflag=999;
				return $returnflag;
			}
		} /*end of ifcounter*/

		#now we start on JUGA
		$Jugasum=array_sum($JugaIdsForUser);
		#do not process unless one is non zero
		#echo "Updating for user name  $username with JUGASUM $Jugasum  with jugarun=$JugaRun<br>";
		#print_r($JugaIdsForUser);
		#echo "<br/>";
		if($JugaRun and ($Jugasum>0)){
			#echo "now entering delete <br>";
			#First we must delete the existing juga groupids for this user;
			$query = "SELECT COUNT(user_id) from #__juga_u2g WHERE `user_id` = '$currentuserid'";

			$database->setQuery( $query );
			$database->query();
			if ($database->getErrorNum()) {
				print("<font color=red>SQL error in #__juga_u2g checking for existing records" . $database->stderr(true)."</font><br />");
				return;
			}
			$RecordCount = $database->loadResult();
			#echo "<br>For $username the count is $dupCount <br>";
			if($RecordCount>0){

				$query = "DELETE FROM #__juga_u2g where `user_id`=".$currentuserid;

				$database->setQuery( $query );

				$database->query();
				if ($database->getErrorNum()) {
					print("<font color=red>SQL error in #__juga_u2g in delete" . $database->stderr(true)."</font><br />");
					return;
				}
			}
			foreach ($JugaIdsForUser as $new_juga_group_id) {
				if($new_juga_group_id>0){
					$query1="INSERT INTO #__juga_u2g (user_id,group_id) VALUES ($currentuserid,$new_juga_group_id)";
					$database->setQuery($query1);
					$database->query();
					if($database->getErrorNum()){
						print("<font color=read> SQL Error in Juga_u2g".$database->stderr(true)."</font><br/>");
						return;
					}
				}
			}

		}

	}
}    #end edit user function
function saveuser($option, $task,$delimiter){

	if (defined('JPATH_ADMINISTRATOR')){

		$database = &JFactory::getDbo();
		$my = &JFactory::getUser();

	}else {

		global $database,$my;
	}

	$cbjuicedebug=false;

	#now check to see if the juga_users table is defined
	$JugaDefined=checkforJuga();

	#now get field names
	#in CB1.2, a new variable has been added to the fields tablecolumns just to screw things up.
	#therefore we have to get the fields in field table to tell what version we are working with
	#now get the fields in comprofiler_fields;
	$query="SHOW FIELDS FROM #__comprofiler_fields";
	$database->setquery($query);
	$database->query();
	if($database->getErrorNum()){
		print("<font colour=red>SQL Error in #__comprofiler_fields looking for comprofiler fields".
		$database->stderr(true)."<font colour=red>");
		$returnflag=999;
		return $returnflag;
	}
	$comprofiler_fields_fields=$database->loadResultArray();
	$tablecolumnsthere=False;
	if(array_search("tablecolumns",$comprofiler_fields_fields)>0){
		#tablecolumns are there
		$tablecolumnsthere=True;
	}
	#now get the available fields to dump
	if($tablecolumnsthere){
		$query_fieldnames="SELECT  u.name, u.table,u.tablecolumns FROM #__comprofiler_fields u";}
		else {
			$query_fieldnames="SELECT  u.name, u.table FROM #__comprofiler_fields u";
		}
		$database->setquery($query_fieldnames);
		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in comprofiler" . $database->stderr(true)."</font><br />");
			return;
		}
		#we need a field array for the read and a names array for the write header;
		$fieldlist=$database->loadResultArray();
		$fieldarray=array();
		$namesarray=array();
		$fieldobject=$database->loadObjectList();
		$numbfields=count($fieldlist);
		$query1="SELECT ";
		$fieldcount=1;
		if($tablecolumnsthere){
			foreach($fieldobject as $thisfield){
				$columnname=$thisfield->tablecolumns;
				$tablename=$thisfield->table;
				$table_sel_prefix="";
				if($tablename=="#__comprofiler"){
					$table_sel_prefix="c.";
				}elseif ($tablename=="#__users"){
					$table_sel_prefix="u.";
				}else {
					$table_sel_prefix="";
				}
				if(is_string($columnname) AND $columnname <> "" AND strpos($columnname,",") == False AND
				$thisfield->name <> "password"){
					$fieldarray[]=$columnname;
					$namesarray[]=$thisfield->name;
					if($fieldcount==1){
						$query2=$table_sel_prefix.$columnname;
					} else {
						$query2= $query2 . "," . $table_sel_prefix.$columnname;
					}
					$fieldcount++;

				} elseif(is_string($columnname) AND $columnname <> "" AND strpos($columnname,",") <>False){
					#here we process the fields
					$thesefields=explode(",",$columnname);
					$numbfields=count($thesefields);
					foreach ($thesefields as $unitfield){
						$fieldarray[]=$unitfield;
						$namesarray[]=$unitfield;
						if($fieldcount==1){
							$query2=$table_sel_prefix.$unitfield;
						} else {
							$query2= $query2 . "," . $table_sel_prefix.$unitfield;
						}
						$fieldcount++;

					}
				}
			}
		}else{
			foreach($fieldlist as $thisfield){
				if($thisfield <> "NA"){
					$fieldarray[]=$thisfield;
					$namesarray[]=$thisfield;
					if($fieldcount==1){
						$query2=$thisfield;
					} else {
						$query2= $query2 . "," . $thisfield;
					}
					$fieldcount++;

				}
			}

		}
		/* add the usertype field to the save*/
		$query2=$query2.",u.usertype,u.block";
		$fieldarray[]="usertype";
		$fieldarray[]="block";
		$namesarray[]="usertype";
		$namesarray[]="block";
		#
		$query3= " FROM #__users u  LEFT JOIN #__comprofiler c on (u.id=c.user_id)";
		if($JugaDefined){
			#now add the code to save the jugagroups
			$namesarray[]="jugagroups";
		}

		$query=$query1 . $query2 . $query3;
		#debug echo "New query is $query <br>";
		$database->setquery($query);
		$database->query();
		if ($database->getErrorNum()) {
			print("<font color=red>SQL error in comprofiler" . $database->stderr(true)."</font><br />");
			return;
		}

		$numbusers=$database->getNumRows();
		#debug print_r($fieldarray);
		#debug echo "<br>";
		$fulldata=$database->loadAssocList();
		if($JugaDefined){
			#get an array of user ids
			$query="SELECT ID from #__users";
			$database->setquery($query);
			$database->query();
			if ($database->getErrorNum()) {
				print("<font color=red>SQL error in users" . $database->stderr(true)."</font><br />");
				return;
			}
			$theseuserids=$database->loadResultArray();
		}
		#debug echo "Starting stuff on $numbusers rows<br>";
		#debug print_r(($fulldata[2]));
		#debug echo "<br>";
		#flush buffer
		if(! $cbjuicedebug){
			while( @ob_end_clean() );
			ob_start();
			$browser="IE";
			header('Content-Type: '.(($browser=='IE' || $browser=='OPERA')?
        'text/plain':'text/plain'));
			header('Expires: '.gmdate('D, d M Y H:i:s').' GMT');

			if($browser=='IE') {
				header('Content-Disposition: attachment; filename="users.csv"');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
			} else {
				header('Content-Disposition: attachment; filename="users.csv"');
				header('Cache-Control: no-cache, must-revalidate');
				header('Pragma: no-cache');
			}
		} # end of debug
		#first write header row;
		$outputrow= "\"" . implode("\"$delimiter\"", $namesarray) . "\"" ."\r\n";
		print $outputrow;
		#
		$usercount=0;
		Foreach($fulldata as $thisuser){
			$thisuser1=$thisuser;
			#now add the juga stuff on the end
			if($JugaDefined){
				$userid=$theseuserids[$usercount];
				$person_name=$thisuser["name"];
				#echo "$person_name has an id of $userid<br>";
				$jugavbl="";
				$query="SELECT title from #__juga_u2g j1 LEFT JOIN #__juga_groups j2 on (j1.group_id=j2.id) where j1.user_id=".$userid;
				$database->setquery($query);
				$database->query();
				if ($database->getErrorNum()) {
					print("<font color=red>SQL error in juga tables" . $database->stderr(true)."</font><br />");
					return;
				}
				$numbgroup=$database->getNumRows();
				$grpcount=0;
				$users_juga_groups=$database->loadResultArray();
				if($numbgroup>=0){
					foreach($users_juga_groups as $thisgroup){
						$jugavbl=$jugavbl.$thisgroup;
						$grpcount=$grpcount+1;
						if($grpcount<$numbgroup){
							$jugavbl=$jugavbl."+";
						}
					}
				}
				$thisuser[]=$jugavbl;
				$usercount=$usercount+1;
			}
			#now set the escaping of the fields in this user
			$thisuser2=array();
			foreach($thisuser as $thiscell){
				$newcell=str_replace("\"","\"\"",$thiscell);
				$thisuser2[]=$newcell;
				}
		
			$outputrow= "\"" . implode("\"$delimiter\"", $thisuser2) . "\"" ."\r\n";

			print $outputrow;
		}
		if (!$cbjuicedebug){
			ob_end_flush();
			exit;
		}

} #end of save user function

function RandomPassword($PwdLength=8, $PwdType='standard')
{
	// $PwdType can be one of these:
	//    test .. .. .. always returns the same password = "test"
	//    any  .. .. .. returns a random password, which can contain strange characters
	//    alphanum . .. returns a random password containing alphanumerics only
	//    standard . .. same as alphanum, but not including l10O (lower L, one, zero, upper O)
	//
	/* this function was found in the following reference
	http://wiki.jumba.com.au/wiki/PHP_Generate_random_password
	Code contributed by Thewebdruid, for the Jumba Wiki
	*/

	$Ranges='';

	if('test'==$PwdType)         return 'test';
	elseif('standard'==$PwdType) $Ranges='65-78,80-90,97-107,109-122,50-57';
	elseif('alphanum'==$PwdType) $Ranges='65-90,97-122,48-57';
	elseif('any'==$PwdType)      $Ranges='40-59,61-91,93-126';

	if($Ranges<>'')
	{
		$Range=explode(',',$Ranges);
		$NumRanges=count($Range);
		mt_srand(); //not required after PHP v4.2.0
		$p='';
		for ($i = 1; $i <= $PwdLength; $i++)
		{
			$r=mt_rand(0,$NumRanges-1);
			list($min,$max)=explode('-',$Range[$r]);
			$p.=chr(mt_rand($min,$max));
		}
		return $p;
	}
}
function checkforJuga(){
	/* the purpose of this function is check*/

	if (defined('JPATH_ADMINISTRATOR')){

		$database = &JFactory::getDbo();
		$my = &JFactory::getUser();

	}else {

		global $database,$my;
	}
	$thosetables=$database->gettablelist();
	$testtable=$database->getPrefix()."juga_u2g";
	$returnval=False;
	if(in_array($testtable,$thosetables)){$returnval=True;
	}
	return $returnval;

}

?>