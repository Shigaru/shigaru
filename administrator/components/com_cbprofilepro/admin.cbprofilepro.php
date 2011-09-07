<?php

/* Community Builder Profile Pro component for Joomla 1.5 - Version 1.0
-----------------------------------------------------------------------
Copyright (C) 2009 Joomduck. All rights reserved.
Website: www.joomduck.com
E-mail: support@joomduck.com
Developer: Den KD
Created: February 2009
License: Commercial
This is copyrighted commercial software - you may NOT redistribute this file or any of its part! */
 
// no direct access

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');
 
  class FieldController extends JController
{
function insertField()
	{
		$document =& JFactory::getDocument();
		$document->settitle(JText::_('Field Insert'));
		FieldInsert::insertField();
	}
}
  class FieldInsert
{
 
function insertField()
	{
		$eName	= JRequest::getVar('e_name');
		$eName	= preg_replace( '#[^A-Z0-9\-\_\[\]]#i', '', $eName );
		?>
		<script type="text/javascript">
			function insertField()
			{			
			var cbfield = document.getElementById("cbfield").value;
			var fieldclass = document.getElementById("fieldclass").value;
			var showtitle = document.getElementById("showtitle").value;
			var delimeter = document.getElementById("delimeter").value;
			var fnclass = document.getElementById("fnclass").value;
			var fieldname = cbfield.replace(/fld/g, "ftl");

				if (cbfield != '') {				
					cbfield = cbfield;
				}

				if (fieldclass != '') {
					fieldclass = "<span class=\""+fieldclass+"\" >";
					fieldclassend = "</span>&nbsp;";
				}
				else
				{
				fieldclass = "";
				fieldclassend = "";
				}				
				
				if (showtitle != '') {				
				showtitle = showtitle;
				fieldname = fieldname;
				delimeter = delimeter;
				scoba1 = "{";
				scoba2 = "}";	
				spc = "&nbsp;";
				if (fnclass != '') {
					fnclass = "<span class=\""+fnclass+"\" >";
					fnclassend = "</span>";
				}
				else
				{
				fnclass = "";
				fnclassend = "";
				}
				
				}
				else 
				{
				fieldname = "";
				showtitle = "";
				delimeter = "";	
				fnclass = "";
				fnclassend = "";
					scoba1 = "";
				scoba2 = "";
				spc = "";
				
					}
					
			var tag = ""+fnclass+""+scoba1+""+fieldname+""+scoba2+""+delimeter+""+fnclassend+""+spc+""+fieldclass+"{"+cbfield+"}"+fieldclassend+"";

				window.parent.jInsertEditorText(tag, '<?php echo $eName; ?>');
				window.parent.document.getElementById('sbox-window').close();
				return false;
			}
		</script>              
		<?php		}} 
		
$lg = &JFactory::getLanguage();
$language = $lg->get('backwardlang');
	
if 	($language == 'english') {
			if(file_exists(JPATH_SITE . '/components/com_comprofiler/plugin/language/default_language/default_language.php')){
			require_once(JPATH_SITE . '/components/com_comprofiler/plugin/language/default_language/default_language.php');		
			}
} else {
			if(file_exists(JPATH_SITE . '/components/com_comprofiler/plugin/language/'.$language.'/'.$language.'.php')){
		 	require_once(JPATH_SITE . '/components/com_comprofiler/plugin/language/'.$language.'/'.$language.'.php');
			}
			}			
			if(file_exists(JPATH_SITE . '/components/com_comprofiler/plugin/user/plug_cbprofilepro/lang/'.$language.'.php')){
			require_once(JPATH_SITE . '/components/com_comprofiler/plugin/user/plug_cbprofilepro/lang/'.$language.'.php'); 			}
			?>

		<form><table width="100%" align="center"><tr><td colspan="2" align="center" valign="top" height="25"><strong><?php echo JText::_( 'Insert Community Builder Field into the Profile Page' ); ?></strong></td></tr>
			<tr width="40%"><td width="25%" align="right" valign="top">	<label for="cbfield"><?php echo JText::_( 'Field:' ); ?></label>
				</td>
				<td><select name="cbfield" id="cbfield" size="20">
                <option value="-"><?php echo JText::_( '<-- Choose Community Builder Field to insert -->' ); ?></option>
                              
                    <?php

					 $db = &JFactory::getDBO();
$db->setQuery("SELECT * FROM #__comprofiler_fields WHERE type = 'text' OR type = 'datetime' OR type = 'predefined' OR type = 'primaryemailaddress' OR type = 'webaddress' OR type = 'forumstats' OR type = 'counter' OR type = 'multicheckbox' OR type = 'date' OR type = 'select' OR type = 'multiselect' OR type = 'emailaddress' OR type = 'editorta' OR type = 'textarea' OR type = 'integer' OR type = 'radio' OR type = 'delimiter'");
$rows = $db->loadObjectList();
foreach($rows AS $row) {
$valueresult = '<option value="fld '.$row->name.'">'.JText::_( $row->title ).'</option>';
echo $valueresult;
}
$db->setQuery("SELECT * FROM #__comprofiler_fields WHERE type = 'image'");
$rows = $db->loadObjectList();
foreach($rows AS $row) {
$valueresult = '<option value="img '.$row->name.'">'.JText::_( $row->title ).'</option>';
echo $valueresult;
}
$db->setQuery("SELECT * FROM #__comprofiler_fields WHERE type = 'checkbox'");
$rows = $db->loadObjectList();
foreach($rows AS $row) {
$valueresult = '<option value="cbx '.$row->name.'">'.JText::_( $row->title ).'</option>';
echo $valueresult;
} ?>
</select>
				</td>
			</tr>
			<tr width="60%"><td align="right"><label for="alias"><?php echo JText::_( 'Class:' ); ?></label></td><td><input type="text" id="fieldclass" name="fieldclass" size="40" />
				</td>
			</tr><tr width="60%"><td align="right"><label for="alias"><?php echo JText::_( 'Show Field Title:' ); ?></label></td><td>
            <select name="showtitle" id="showtitle" size="1">
            <option value=""><?php echo JText::_( 'No ' ); ?></option>
            <option value="fieldtitleon"><?php echo JText::_( 'Yes ' ); ?></option>
            </td>            
			</tr><tr width="60%"><td align="right"><label for="alias"><?php echo JText::_( 'Field Title Class:' ); ?></label>				
            </td><td><input type="text" id="fnclass" name="fnclass" size="40" /></td></tr>
<tr width="60%"><td align="right"><label for="alias"><?php echo JText::_( 'Delimeter:' ); ?></label></td><td><input type="text" id="delimeter" name="delimeter" size="40" />              </td>
</tr>
</table>
</form>
<br />
<div align="center"><button onclick="insertField();"><?php echo JText::_( 'Insert' ); ?></button></div>

<?php
JHTML::addIncludePath( JPATH_COMPONENT.DS.'helper' );

$controller = new FieldController();
$task = JRequest::getCmd('task');
switch (strtolower($task))
{	case 'ins_cbfield' :
		FieldController::insertField();
		break; }
 ?>
