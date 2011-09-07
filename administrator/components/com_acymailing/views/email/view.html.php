<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class EmailViewEmail extends JView
{
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function form(){
		$mailid = acymailing::getCID('mailid');
		if(empty($mailid)) $mailid = JRequest::getString('mailid');
		$mailClass = acymailing::get('class.mail');
		$mail = $mailClass->get($mailid);
		if(empty($mail)){
			$config =& acymailing::config();
			$mail->created = time();
			$mail->fromname = $config->get('from_name');
			$mail->fromemail = $config->get('from_email');
			$mail->replyname = $config->get('reply_name');
			$mail->replyemail = $config->get('reply_email');
			$mail->subject = '';
			$mail->type = JRequest::getString('type');
			$mail->published = 1;
			$mail->visible = 0;
			$mail->html = 1;
			$mail->body = '';
			$mail->altbody = '';
			$mail->tempid = 0;
		};
		jimport('joomla.html.pane');
		$tabs	=& JPane::getInstance('tabs');
		$values = null;
		$values->maxupload = (acymailing::bytes(ini_get('upload_max_filesize')) > acymailing::bytes(ini_get('post_max_size'))) ? ini_get('post_max_size') : ini_get('upload_max_filesize');
		$toggleClass = acymailing::get('helper.toggle');
		$editor = acymailing::get('helper.editor');
		$editor->name = 'editor_body';
		$editor->content = $mail->body;
		$js = "function updateEditor(htmlvalue){";
			$js .= 'if(htmlvalue == \'0\'){window.document.getElementById("htmlfieldset").style.display = \'none\'}else{window.document.getElementById("htmlfieldset").style.display = \'block\'}';
		$js .= '}';
		$js .='window.addEvent(\'load\', function(){ updateEditor('.$mail->html.'); });';
		$script = 'function addFileLoader(){
		var divfile=window.document.getElementById("loadfile");
		var input = document.createElement(\'input\');
		input.type = \'file\';
		input.size = \'30\';
		input.name = \'attachments[]\';
		divfile.appendChild(document.createElement(\'br\'));
		divfile.appendChild(input);}
		';
		$script .= 'function submitbutton(pressbutton){
						if (pressbutton == \'cancel\') {
							submitform( pressbutton );
							return;
						}';
		$script .= 'if(window.document.getElementById("subject").value.length < 2){alert(\''.JText::_('ENTER_SUBJECT',true).'\'); return false;}';
		$script .= $editor->jsCode();
		$script .= 'submitform( pressbutton );}';
		$script .= "function changeTemplate(newhtml,newtext,tempid){
			if(newhtml.length>2){".$editor->setContent('newhtml')."}
			var vartextarea =$('altbody'); if(newtext.length>2){vartextarea.setHTML(newtext);}
			var vartempid =$('tempid'); vartempid.value = tempid;
		}";
		$script .= "function insertTag(tag){jInsertEditorText(tag,'editor_body');}";
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js.$script );
		$doc->addStyleSheet( ACYMAILING_CSS.'frontendedition.css' );
		$this->assignRef('toggleClass',$toggleClass);
		$this->assignRef('editor',$editor);
		$this->assignRef('values',$values);
		$this->assignRef('mail',$mail);
		$this->assignRef('tabs',$tabs);
	}
}