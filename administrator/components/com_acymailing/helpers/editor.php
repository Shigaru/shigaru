<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class editorHelper{
	var $width = '95%';
	var $height = '750';
	var $cols = 100;
	var $rows = 30;
	var $editor = null;
	var $name = '';
	var $content = '';
	function editorHelper(){
		$config =& acymailing::config();
		$this->editor = $config->get('editor',null);
		if(empty($this->editor)) $this->editor = null;
		$this->myEditor =& JFactory::getEditor($this->editor);
		$this->myEditor->initialise();
	}
	function setTemplate($id){
		if(empty($id)) return;
		$app =& JFactory::getApplication();
		$cssurl = rtrim(JURI::root(),'/').'/'.($app->isAdmin() ? 'administrator/index.php?option=com_acymailing&ctrl=template':'index.php?option=com_acymailing&ctrl=fronttemplate').'&task=load&tempid='.$id;
		$name = $this->myEditor->get('_name');
		if($name == 'tinymce'){
			$editorConfig = array('content_css_custom' => $cssurl,'content_css' => '0');
			$this->myEditor->_loadEditor($editorConfig);
		}elseif($name=='jckeditor' || $name=='fckeditor'){
			$filepath = $this->createTemplateFile($id);
			$editorConfig = array('content_css_custom' => $filepath,'content_css' => '0','editor_css' => '0');
			$this->myEditor->_loadEditor($editorConfig);
		}else{
			$filepath = $this->createTemplateFile($id);
			$fileurl = 'components/com_acymailing/templates/css/template_'.$id.'.css';
			$editorConfig = array('custom_css_url' => $cssurl, 'custom_css_file' => $fileurl, 'custom_css_path' => $filepath);
			$this->myEditor->_loadEditor($editorConfig);
		}
	}
	function createTemplateFile($id){
		if(file_exists(ACYMAILING_TEMPLATE.'css'.DS.'template_'.$id.'.css')) return ACYMAILING_TEMPLATE.'css'.DS.'template_'.$id.'.css';
		$classTemplate = acymailing::get('class.template');
		$template = $classTemplate->get($id);
		if(empty($template->tempid)) return '';
		$css = $classTemplate->buildCSS($template->styles,$template->stylesheet);
		if(empty($css)) return '';
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
		if(!is_dir(ACYMAILING_TEMPLATE.'css')){
			 if(!JFolder::create(ACYMAILING_TEMPLATE.'css')) echo acymailing::display('Could not create the directory '.ACYMAILING_TEMPLATE.'css','error');
			 else JFile::write(ACYMAILING_TEMPLATE.'css'.DS.'index.html','<html><body bgcolor="#FFFFFF"></body></html>');
		}
		if(JFile::write(ACYMAILING_TEMPLATE.'css'.DS.'template_'.$id.'.css',$css)){
			return ACYMAILING_TEMPLATE.'css'.DS.'template_'.$id.'.css';
		}else{
			echo acymailing::display('Could not create the file '.ACYMAILING_TEMPLATE.'css'.DS.'template_'.$id.'.css','error');
			return '';
		}
	}
	function setDescription(){
		$this->width = 700;
		$this->height = 200;
		$this->cols = 80;
		$this->rows = 10;
	}
	function setContent($var){
		$name = $this->myEditor->get('_name');
		$function = "try{".$this->myEditor->setContent($this->name,$var)." }catch(err){alert('Error using the setContent function of the wysiwyg editor')}";
		if(!empty($name)){
			if($name == 'jce'){
				return " try{JContentEditor.setContent('".$this->name."', $var ); }catch(err){".$function."} ";
			}
			if($name == 'fckeditor'){
				return " try{FCKeditorAPI.GetInstance('".$this->name."').SetHTML( $var ); }catch(err){".$function."} ";
			}
			if($name == 'jckeditor'){
				return " try{oEditor.setData(".$var.");}catch(err){(!oEditor) ? CKEDITOR.instances.".$this->name.".setData($var) : oEditor.insertHtml = " .  $var.'}';
			}
		}
		return $function;
	}
	function getContent(){
		return $this->myEditor->getContent($this->name);
	}
	function display(){
		return $this->myEditor->display( $this->name,  $this->content ,$this->width, $this->height, $this->cols, $this->rows,array('pagebreak', 'readmore') ) ;
	}
	function jsCode(){
		return $this->myEditor->save( $this->name );
	}
}//endclass