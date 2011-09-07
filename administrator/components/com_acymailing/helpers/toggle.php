<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class toggleHelper{
	var $ctrl = 'toggle';
	var $extra = '';
	function _getToggle($column,$table = ''){
		$params = null;
		$params->mode = 'pictures';
		if($column == 'published' AND !in_array($table,array('plugins','list'))){
			$params->pictures = array(0=>'images/publish_r.png',1=>'images/publish_g.png',2=>'images/publish_y.png');
			$params->description = array(0=>JText::_('PUBLISH_CLICK',true),1=>JText::_('UNPUBLISH_CLICK',true),2=>JText::_('UNSCHEDULE_CLICK',true));
			$params->values = array(0=>1,1=>0,2=>0);
			return $params;
		}elseif($column == 'status'){
			$params->mode = 'class';
			$params->class = array(-1=>'roundsubscrib roundunsub',1=>'roundsubscrib roundsub',2=>'roundsubscrib roundconf');
			$params->description = array(-1=>JText::_('SUBSCRIBE_CLICK',true),1=>JText::_('UNSUBSCRIBE_CLICK',true),2=>JText::_('CONFIRMATION_CLICK',true) );
			$params->values = array(-1=>1,1=>-1,2=>1);
			return $params;
		}
		$params->pictures = array(0=>'images/publish_x.png',1=>'images/tick.png');
		$params->values = array(0=>1,1=>0);
		return $params;
	}
	function toggle($id,$value,$table,$extra = null){
		$column = substr($id,0,strpos($id,'_'));
		$params = $this->_getToggle($column,$table);
		$newValue = $params->values[$value];
		if($params->mode == 'pictures'){
			static $pictureincluded = false;
			if(!$pictureincluded){
				$pictureincluded = true;
				$js = "function joomTogglePicture(id,newvalue,table){
					window.document.getElementById(id).className = 'onload';
					new Ajax('index.php?option=com_acymailing&tmpl=component&ctrl=toggle&task='+id+'&value='+newvalue+'&table='+table,{ method: 'get', update: $(id), onComplete: function() {	window.document.getElementById(id).className = 'loading'; }}).request();
				}";
				$doc =& JFactory::getDocument();
				$doc->addScriptDeclaration( $js );
			}
			$desc = empty($params->description[$value]) ? '' : $params->description[$value];
			return '<a href="javascript:void(0);" onclick="joomTogglePicture(\''.$id.'\',\''.$newValue.'\',\''.$table.'\')" title="'.$desc.'"><img src="'.$params->pictures[$value].'"/></a>';
		}elseif($params->mode == 'class'){
			static $classincluded = false;
			if(!$classincluded){
				$classincluded = true;
				$js = "function joomToggleClass(id,newvalue,table,extra){
					var mydiv=$(id); mydiv.setHTML(''); mydiv.className = 'onload';
					new Ajax('index.php?option=com_acymailing&tmpl=component&ctrl=toggle&task='+id+'&value='+newvalue+'&table='+table+'&extra[color]='+extra,{ method: 'get', update: $(id), onComplete: function() {	window.document.getElementById(id).className = 'loading'; }}).request();
				}";
				$doc =& JFactory::getDocument();
				$doc->addScriptDeclaration( $js );
			}

			$desc = empty($params->description[$value]) ? '' : $params->description[$value];
			$return = '<a href="javascript:void(0);" onclick="joomToggleClass(\''.$id.'\',\''.$newValue.'\',\''.$table.'\',\''.urlencode($extra['color']).'\');" title="'.$desc.'"><div class="'. $params->class[$value] .'" style="background-color:'.$extra['color'].'">';
			if(!empty($extra['tooltip'])) $return .= JHTML::_('tooltip', $extra['tooltip'], '','','&nbsp;&nbsp;&nbsp;&nbsp;');
			$return .= '</div></a>';
			return $return;
		}
	}
	function display($column,$value){
		$params = $this->_getToggle($column);
		$picture = $params->pictures[$value];
		return '<img src="'.$picture.'"/>';
	}
	function delete($lineId,$elementids,$table,$confirm = false,$text = ''){
		static $deleteJS = false;
		if(!$deleteJS){
			$deleteJS = true;
			$js = "function joomDelete(lineid,elementids,table,reqconfirm){
				if(reqconfirm){
					if(!confirm('".JText::_('VALIDDELETEITEMS',true)."')) return false;
				}
				new Ajax('index.php?option=com_acymailing&tmpl=component&ctrl=".$this->ctrl.$this->extra."&task=delete&value='+elementids+'&table='+table, { method: 'get', onComplete: function() {window.document.getElementById(lineid).style.display = 'none';}}).request();
			}";
			$doc =& JFactory::getDocument();
			$doc->addScriptDeclaration( $js );
		}
		if(empty($text)) $text = '<img src="'.ACYMAILING_IMAGES.'delete.png"/>';
		return '<a href="javascript:void(0);" onclick="joomDelete(\''.$lineId.'\',\''.$elementids.'\',\''.$table.'\','. ($confirm ? 'true' : 'false').')">'.$text.'</a>';
	}
}
