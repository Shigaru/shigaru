<?php

/**

* @version $Id: admin.cbjuice.html.php, v1.7Beta7 2010-03-27 

* @package CBUICE

* @subpackage CBJUICE

* @copyright (C) 2000 - 2005 Pronique Software and 2007-9 Jacobson Consulting Inc.

* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL

*   based on M3Port/Juice released as Free Software by Pronique software
* - Modded by billt/billt_3 to do a few fields in CD.
* - added functionality to add users and with email notification option for Joomla
* - Modded by jciconsult, generalized to multiple fields for CB. edit functionality added
* - NOTE - THIS VERSION REQUIRES USE OF FIRST AND LAST NAME AT LEAST AS SEPARATE COMPROFILER FIELDS

*/


/** ensure this file is being included by a parent file */

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

 


/**

* @package JUICE

*/
/* following code ripped off from CB*/
global $_CB_joomla_adminpath, $_CB_adminpath, $ueConfig;
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
		$_CB_joomla_adminpath = JPATH_ADMINISTRATOR;
	} else {
		global $mainframe;
		$_CB_joomla_adminpath = $mainframe->getCfg( 'absolute_path' ). "/administrator";
	}
$_CB_adminpath = $_CB_joomla_adminpath. "/components/com_comprofiler";
include_once($_CB_adminpath."/ue_config.php" );
include_once($_CB_adminpath."/plugin.class.php");
include_once($_CB_adminpath."/comprofiler.class.php");
include_once($_CB_adminpath."/imgToolbox.class.php");
/* end of cb includes*/

class HTML_CBJUsers {



function showDeleted($delcount) {

?>

<h4><?php echo $delcount; ?> Registered Users Deleted.</h4>

<?php

}

	function showAbout() {

?>

<table width="100%"><tr><td align="left">


</td></tr>

<tr><td><h2>CBJUICE</h2></td></tr>

<tr><td><h3>Joomla! User Import ComponEnt extended for Community Builder</h3></td></tr>

<tr><td><H4>Version: 1.7 beta4</H4></td></tr>

<tr><td><h4>Idea developed from original Joomla component (juice) for user management - juice developerhomepage: <a href="http://www.pronique.com">http://www.pronique.com</a></h4></td></tr>
<tr><td><h4>CB Extension developed using ideas contributed by BillT and others by Paul Jacobson of <a href="http://www.jciconsult.com">http://www.jciconsult.com</a></h4></td></tr>
<tr><td><p>This component extends the functionality of the wonderful Community Builder Component.  Please support their development work by purchasing a subscription.</p></td></tr>
<tr><td>

CB-JUICE is an component for Joomla! that allows a site administrator to import users from a CSV text file.  This version of CBJUICE expects the following format CSV file.<br></br>

username,password,firstname,lastname,email<br></br>

A HEADER LINE IS REQUIRED.  Any additional CB profile variables may also be included.<br></br>
A confirmation email can be sent to the user {firstname} {lastname} {username} and {password} are appropriately substituted in the message.

<br></br>
This version now supports the USERTYPE variable and will manage the standard usertypes (publisher) etc in the USERS table.  No support is provided for any non-standard tables.
This version now supports <b>JUGA</b>, the jugagroups variable is used to add persons to a group while clearing membership from all other groups.  Juga must be installed for this feature to work.
<b> This version now supports CB 1.2</b>
<br></br>



Here are some of the features of CBJUICE 1.6<br/><br/>



<b>Configurable Delimiter Character</b><br></br>

If your source application does not support comma delimited files you may choose the delimiter character at the time of import. Use 'TAB' for tab delimited files<br/>



<b>Fills in gaps when Full Name or Email is missing</b><br></br>

In some cases your CSV may not contain the user's fullname or email address.  CBJUICE will use the username for the name fields and generate an invalid email address when one is not supplied.<br/>



<b>Delete Entire User Database</b><br></br>

If you manage your user database in another application besides Joomla! you may find this feature useful.  If selected, just before import all users with the status Registered users are purged from the database.  This will help reduce orphaned users. Be extremely careful.  <b>Consider the edit option first.</b><br/>



<b>Proper handling of Joomla! ACLs</b><br></br>

Importing and Deleting users from Joomla requires an application not only to deal with the users table but also the various ACL permissions tables of Joomla.  CBJuice will make all of the proper table changes that are required. <br></br>


<br></br>



</td></tr>

</table>

<?php

	} # end function showAbout

	function showUsersImport( $option ) {

	$stuff=JPATH_ADMINISTRATOR;
	#echo "The path stuff is $stuff<br>";
        
        /* forcing the definitions */
	if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
		$app = &JFactory::getApplication();
		$mosConfig_sitename=$app->getCFG('sitename');
		$mosConfig_mailfrom=$app->getCFG('mailfrom');
		$mosConfig_fromname=$app->getCFG('fromname');
	} else {
		global $mainframe,$mosConfig_live_site, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_sitename;
		
	}       
        
            $adminName 	= "Registration ".$mosConfig_fromname;
            $adminEmail 	= $mosConfig_mailfrom;
            $emailsubject   = "Your Website Account ID    ";
            $emailbodyline1 = "{firstname},\n\n";
            $emailbodyline2 = "Your account has been setup on ".$mosConfig_sitename."\n\n";
            $emailbodyline3 = "Your Login ID for the website is {username} The related password is {password}.\n\n";
            $emailbodyline4 = "Note that the ID and password are case sensitive within the website.\n Please contact the website administrator if you have any issues.\n\n";
            $defaultjuicemessage=$emailbodyline1.$emailbodyline2.$emailbodyline3.$emailbodyline4;
            /* FOLLOWING VERSION CODE ADAPTED FROM COMMUNITY BUILDER*/
            $os_product=checkJversion('product');
            $os_version=checkJversion('release');
            
        
?>
		<form action="index2.php" method="post" enctype="multipart/form-data" name="adminForm">

		<h2>Community Builder Joomla! User Import ComponEnt (CBJUICE)</h2>

		<h5>Make sure you submit a properly formatted CSV file of users to import- headings must be included</h5>

		<h5>CSV Format: username,firstname,lastname,password,email, any additional CB profile variables added to the site</h5>
        <p>In EDIT mode (add mode unchecked), only the username and at least one additional CB profile variable is required  otherwise all 5 of the variables noted above are required.<br></br>
        <b>In EDIT mode, the password is only usefully edited if it is stored externally and supplied as part of the update.<br></br>
        in ADD mode, at least one CB field is required.</b></p>
         <?php
        echo "<p> <b>If you are using JUGA and get errors on ADD, backup your database, then run the following Query.<br />
        DELETE FROM jos_juga_u2g WHERE user_id NOT IN (SELECT id FROM jos_users ) </b></p>";
        ?>
        <?php
        echo "<p> <b>You are using $os_product $os_version</b></p>";
        ?>
		<table>

                <tr>

                    <td valign="top" align="right" width="30%">Delimiter:</td>

                    <td>

                        <input class="inputbox" type="text" name="delimiter" value="," size="3" maxlength="3"></input>  Enter the uppercase word 'TAB' for tab delimited files.

                    </td>
				</tr>
		        <tr>

                    <td valign="top" align="right" width="30%">Edit/Add/Export Mode switch:</td>

                    <td>

                        <input class="inputbox" type="radio" name="opptype" value="1"  /> Add mode (no updates).<br/>

          
                        <input class="inputbox" type="radio" name="opptype" value="2"  checked="checked"/> Edit Mode (no Adds).<br/>


                        <input class="inputbox" type="radio" name="opptype" value="3"  /> Export a CSV File.<br/>
						<input class="inputbox" type="radio" name="opptype" value="4"  /> <b> DELETE users of a specific type.</b><br/>

                    </td></tr>
				<tr>
					<td valign="top" align="right" width="30%">User type to delete:</td>
					<td>

                        <input class="inputbox" type="text" name="deletetype" value="undefined" /> <b>Usertype to delete - (e.g. editor, registered etc.)</b>

                    </td>
				</tr>

                <tr>

                    <td valign="top" align="right" width="30%">Default Display Name:</td>

                    <td>

                        <input class="inputbox" type="checkbox" name="defaultname" value="1" checked="checked"/> If Display name of user is missing then the username will be inserted in add mode.

                    </td></tr>
					
              <tr>

                    <td valign="top" align="right" width="30%">Provide audit list of users added or modified:</td>

                    <td>

                        <input class="inputbox" type="checkbox" name="auditlist" value="1" checked="checked"/> This displays one line per user processed.

                    </td></tr>
                <tr>

                    <td valign="top" align="right" width="30%">Send Confirmation Email:</td>

                    <td>

                        <input class="inputbox" type="checkbox" name="ConfirmationEmail" value="1"></input> Check this box to send a confirmation email to the user.
				
                    </td>
				</tr>

                <tr>

                    <td valign="top" align="right" width="30%">Default Email Domain:</td>

                    <td>

                        <input class="inputbox" type="text" name="defaultemaildomain" value="foo.foo" checked="checked"></input> If the email address field is blank then a phoney email address will be genereted from the username and the supply value here.  Try to use something nonexistent such as domain.dom or foo.foo.

                    </td>
                </tr>
                <tr>
                <td valign="top" align="right" width="30%">Confirmation email subject:</td>
                <td><input class="inputbox" type="text" name="cbjuice_ConfirmationSubject" size="45" value=
                <?php echo '"'.$emailsubject.'"';?>  
                ></input>
                </td>
                </tr>
                <tr>
                <td valign="top" align="right" width="30%">Confirmation email sender:</td>
                <td><input class="inputbox" type="text" name="cbjuice_ConfirmationSender" size="45" value=
                <?php echo '"'.$adminEmail.'"';?>  
                ></input>
                </td>
                </tr>
                <tr>
                    <td valign="top" align="right" width="30%">BCC copy to sender:</td>
                    <td>

                        <input class="inputbox" type="checkbox" name="BccEmail" value="1"></input> Check this box to send bcc email to the sender.

                    </td>
                
                </tr>
                <tr>
                    <td valign="top" align="right" width="30%">Default Email Text used for add only:</td>
                
	                <td>
			        <textarea cols="80" rows="15" name="cbjuice_message" class="inputbox" ><?php   echo $defaultjuicemessage;?>
                    </textarea>
			        </td>
                </tr>
                <tr>

  		    

                    <td valign="top" align="right" width="30%">File to import:</td>

                    <td>

                        <input class="inputbox" type="file" name="csvusers" value="" size="40" maxlength="250"></input>

                    </td>

                </tr>

		</table>





		<input type="hidden" name="option" value="<?php echo $option;?>" />

		<input type="hidden" name="task" value="process" />

		<input type="hidden" name="boxchecked" value="0" />

		<input type="hidden" name="hidemainmenu" value="0" />

		</form>

		<?php

	}



}

?>