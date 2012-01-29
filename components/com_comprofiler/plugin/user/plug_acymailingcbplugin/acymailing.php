<?php

if(!@include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_acymailing'.DS.'helpers'.DS.'helper.php')){
	return;
};

$_PLUGINS->registerFunction( 'onUserActive', 'userActivated','getAcyMailingTab' );
$_PLUGINS->registerFunction( 'onAfterDeleteUser', 'userDelete','getAcyMailingTab' );

class getAcyMailingTab extends cbTabHandler {

	var $installed = true;
	var $errorMessage = 'This plugin can not work without the AcyMailing Component.<br/>Please download it from <a href="http://www.acyba.com">http://www.acyba.com</a> and install it.';

	function getAcyMailingTab(){
		if(!class_exists('acymailing')){
			$this->installed = false;
		}else{
			$lang =& JFactory::getLanguage();
			$lang->load(ACYMAILING_COMPONENT,JPATH_SITE);
		}
		$this->cbTabHandler();
	}

	function getDisplayRegistration($tab, $user, $ui) {
		$return = '';

		$visibleLists=$this->params->get('lists','All');
		$hiddenLists=$this->params->get('hiddenlists','None');
		$displayhtml=$this->params->get('display_html',1);

		if($displayhtml){
			$return .= '<tr><td class="titleCell">'.JText::_('RECEIVE').'</td><td class="fieldCell">'.JHTML::_('select.booleanlist', "acymailing[user][html]" ,'',1,JText::_('HTML'),JText::_('JOOMEXT_TEXT').'&nbsp;&nbsp;').'</td></tr>';
		}

		$listsClass = acymailing::get('class.list');
		$allLists = $listsClass->getLists('listid');
		if(acymailing::level(1)){
			$allLists = $listsClass->onlyCurrentLanguage($allLists);
		}

		if(empty($allLists)) return $return;

		$visibleListsArray = array();
		$hiddenListsArray = array();

		//Load the lists...
		if(strpos($visibleLists,',') OR is_numeric($visibleLists)){
			$allvisiblelists = explode(',',$visibleLists);
			foreach($allLists as $oneList){
				if($oneList->published AND in_array($oneList->listid,$allvisiblelists)){ $visibleListsArray[] = $oneList->listid; }
			}
		}elseif(strtolower($visibleLists) == 'all'){
			foreach($allLists as $oneList){
				if($oneList->published){$visibleListsArray[] = $oneList->listid;}
			}
		}

		if(strpos($hiddenLists,',') OR is_numeric($hiddenLists)){
			$hiddenListsArray = explode(',',$hiddenLists);
		}elseif(strtolower($hiddenLists) == 'all'){
			$visibleListsArray = array();
			foreach($allLists as $oneList){
				if($oneList->published){$hiddenListsArray[] = $oneList->listid;}
			}
		}

		if(!empty($visibleListsArray) AND !empty($hiddenListsArray)){
			$visibleListsArray =  array_diff($visibleListsArray, $hiddenListsArray);
		}

		//Check lists...
		$checkedLists = $this->params->get('listschecked','All');
		if(strtolower($checkedLists) == 'all'){ $checkedListsArray = $visibleListsArray;}
		elseif(strpos($checkedLists,',') OR is_numeric($checkedLists)){ $checkedListsArray = explode(',',$checkedLists);}
		else{ $checkedListsArray = array();}

		if($this->params->get('addoverlay',false)) JHTML::_('behavior.tooltip');

		$hiddenLists = implode(',',$hiddenListsArray);
		if(!empty($visibleListsArray)){
			foreach($visibleListsArray as $oneList){
				$return .= '<div class="mbot6 acymailwrapper">';
				$check = in_array($oneList,$checkedListsArray) ? 'checked="checked"' : '';
				$name = $this->params->get('addoverlay',false) ? acymailing::tooltip($allLists[$oneList]->description,$allLists[$oneList]->name, '', $allLists[$oneList]->name) : $allLists[$oneList]->name;
				$return .= '<input type="checkbox" id="newssubs" style="" class="acymailing_checkbox" name="acymailing[subscription][]" '.$check.' value="'.$oneList.'"/>';
				$return .='<label for="newssubs" class="fontbold">'.JText::_('SUBSCRIPTION').'</label>';
				$return .= '<div>'.JText::_('SHIGARUSUBTEXT').'</div>';
				
			}
			
			$return .= '</div>';
			
		}

		return $return;
	}

	function getDisplayTab( $tab, $user, $ui) {

		$my =& JFactory::getUser();

		if (empty($my->id) OR $my->id != $user->user_id) return;

		$userClass = acymailing::get('class.subscriber');
		$joomUser = $userClass->get($user->email);

		if(empty($joomUser->subid)) return;

		$doc =& JFactory::getDocument();
		$config =& acymailing::config();
		$cssFrontend = $config->get('css_frontend','default');
		if(!empty($cssFrontend)){
			$doc->addStyleSheet( ACYMAILING_CSS.'component_'.$cssFrontend.'.css' );
		}

		$listsClass = acymailing::get('class.list');
		$allLists = $userClass->getSubscription($joomUser->subid,'listid');

		if(acymailing::level(1)){
			$allLists = $listsClass->onlyCurrentLanguage($allLists);
		}

		if(acymailing::level(3)){
			foreach($allLists as $listid => $oneList){
				if(!$allLists[$listid]->published) continue;
				if($oneList->access_sub == 'all') continue;
				if($oneList->access_sub == 'none' OR empty($my->id) OR empty($my->gid)){
					$allLists[$listid]->published = false;
					continue;
				}
				if(!in_array($my->gid,explode(',',$oneList->access_sub))){
					$allLists[$listid]->published = false;
					continue;
				}
			}
		}

		$lists=$this->params->get('lists','All');

		$visibleListsArray = array();
		if(strpos($lists,',') OR is_numeric($lists)){
			$allvisiblelists = explode(',',$lists);
			foreach($allLists as $oneList){
				if($oneList->published AND in_array($oneList->listid,$allvisiblelists)) {$visibleListsArray[] = $oneList->listid;}
			}
		}elseif(strtolower($lists) == 'all'){
			foreach($allLists as $oneList){
				if($oneList->published){$visibleListsArray[] = $oneList->listid;}
			}
		}

		if(empty($visibleListsArray)) return;

		$return = '<table><tr><th>'.JText::_('SUBSCRIPTION').'</th><th>'.JText::_('LIST').'</th></tr>';
		$k = 0;
		$i = 0;
		foreach($visibleListsArray as $oneListid){
			$return .= '<tr class="row'.$k.'"><td align="center" valign="top"><input type="checkbox" disabled="disabled"'.(($allLists[$oneListid]->status > 0) ? ' checked="checked" ' : '').'/></td>';
			$return .= '<td valign="top"><div class="list_name">'.$allLists[$oneListid]->name.'</div><div class="list_description">'.$allLists[$oneListid]->description.'</div></td></tr>';
			$k = 1-$k;
		}

		$return .= '</table>';

		return $return;
    }

	function saveRegistrationTab($tab, &$user, $ui, $postdata) {
		if(empty($postdata['acymailing']) OR empty($user->user_id)) return;

		$subscriberClass = acymailing::get('class.subscriber');
		$subscriberClass->checkVisitor = false;
		$subscriberClass->sendConf = false;
		$subscriber = $subscriberClass->get($user->email);

		$subscriber->email = $user->email;
		if(!empty($user->name)) $subscriber->name = $user->name;
		if(!empty($user->user_id)) $subscriber->userid = $user->user_id;
		if(!empty($user->confirmed)) $subscriber->confirmed = $user->confirmed;
		if(!empty($user->block)) $subscriber->enabled = 0;

		if(!empty($postdata['acymailing']['user'])){
			$subscriberClass->checkFields($postdata['acymailing']['user'],$subscriber);
		}

		$subscriber->subid = $subscriberClass->save($subscriber);

		//Subscription...

		$config = acymailing::config();
		$statusAdd = (empty($user->confirmed) AND $config->get('require_confirmation',false)) ? 2 : 1;

		$allLists = $subscriberClass->getSubscriptionStatus($subscriber->subid);

		$hiddenLists = $this->params->get('hiddenlists');
		if(strpos($hiddenLists,',') OR is_numeric($hiddenLists)){
			$hiddenListsArray = explode(',',$hiddenLists);
		}elseif(strtolower($hiddenLists) == 'all'){
			$hiddenListsArray = array_keys($allLists);
		}

		$addlists = array();
		if(!empty($hiddenListsArray)){
			foreach($hiddenListsArray as $idOneList){
				if(empty($allLists[$idOneList]->status)) $addlists[$statusAdd][] = $idOneList;
			}
		}

		if(!empty($postdata['acymailing']['subscription'])){
			foreach($postdata['acymailing']['subscription'] as $idOneList){
				if(empty($allLists[$idOneList]->status)) $addlists[$statusAdd][] = $idOneList;
			}
		}

		$listsubClass = acymailing::get('class.listsub');
		if(!empty($addlists)){
			$listsubClass->addSubscription($subscriber->subid,$addlists);
		}

		return;
	}

	function userDelete($user, $success) {
		if(!$this->installed){ return $this->errorMessage;}

		if (!$success) return;

		$userClass = acymailing::get('class.subscriber');
		$subid = $userClass->subid($user->email);
		if(!empty($subid)){
			$userClass->delete($subid);
		}
	}

	function userActivated($user, $success) {
		if(!$this->installed){ return $this->errorMessage;}

		if (!$success) return;

		$userClass = acymailing::get('class.subscriber');
		$subid = $userClass->subid($user->email);
		if(!empty($subid)){
			if(empty($user->block)){
				$db =& JFactory::getDBO();
				$db->setQuery('UPDATE `#__acymailing_subscriber` SET `enabled` = 1 WHERE `subid` = '.$subid.' LIMIT 1');
				$db->query();
			}
			$userClass->confirmSubscription($subid);
		}

		return;
	}

	function getEditTab( $tab, $user, $ui) {
		if(!$this->installed){ return $this->errorMessage;}

		global $mainframe;

		$return = '';

		$lists=$this->params->get('lists','All');
		$displayhtml=$this->params->get('display_html',1);

		$userClass = acymailing::get('class.subscriber');
		$joomUser = $userClass->get($user->email);

		$db =& JFactory::getDBO();

		if(empty($joomUser->subid)){
			//User not inserted?? How is that possible...? well, if it's a new!
		}elseif(!empty($user->id) AND (int)$joomUser->userid != (int)$user->id){
			//Update the field so that it's linked to this user so during the update we can keep the same user.
			//Let's update the user Id...
			$db->setQuery('UPDATE '.acymailing::table('subscriber').' SET userid = '.(int) $user->id.' WHERE subid = '.(int) $joomUser->subid.' LIMIT 1');
			$db->query();
		}

		$listsClass = acymailing::get('class.list');
		if(!empty($joomUser->subid)){
			$allLists = $userClass->getSubscription($joomUser->subid,'listid');
		}else{
			$allLists = $listsClass->getLists('listid');
		}

		if(!$mainframe->isAdmin() AND acymailing::level(1)){
			$allLists = $listsClass->onlyCurrentLanguage($allLists);
		}

		if(!$mainframe->isAdmin() AND acymailing::level(3)){
			$my = JFactory::getUser();
			foreach($allLists as $listid => $oneList){
				if(!$allLists[$listid]->published) continue;
				if($oneList->access_sub == 'all') continue;
				if($oneList->access_sub == 'none' OR empty($my->id) OR empty($my->gid)){
					$allLists[$listid]->published = false;
					continue;
				}
				if(!in_array($my->gid,explode(',',$oneList->access_sub))){
					$allLists[$listid]->published = false;
					continue;
				}
			}
		}

		//If we come from the Admin interface, we display all the lists.
		if($mainframe->isAdmin()){
			$visibleListsArray = array_keys($allLists);
		}else{
			$visibleListsArray = array();
			if(strpos($lists,',') OR is_numeric($lists)){
				$allvisiblelists = explode(',',$lists);
				foreach($allLists as $oneList){
					if($oneList->published AND in_array($oneList->listid,$allvisiblelists)) {$visibleListsArray[] = $oneList->listid;}
				}
			}elseif(strtolower($lists) == 'all'){
				foreach($allLists as $oneList){
					if($oneList->published){$visibleListsArray[] = $oneList->listid;}
				}
			}
		}


		if($displayhtml){
			//Add the receive text/html option
			$return .= '<table><tr><td class="titleCell">'.JText::_('RECEIVE').'</td><td class="fieldCell">'.JHTML::_('select.booleanlist', "acymailing[user][html]" ,'',empty($joomUser->subid) ? 1 : $joomUser->html,JText::_('HTML'),JText::_('JOOMEXT_TEXT').'&nbsp;&nbsp;').'</td></tr></table>';
		}

		if(!empty($visibleListsArray)){
			if($mainframe->isAdmin()){
				$status = acymailing::get('type.status');
			}else{
				$status = acymailing::get('type.festatus');
			}

			$k = 0;
			if($this->params->get('addoverlay',false)) JHTML::_('behavior.tooltip');

			$return .= '<fieldset><legend>'.JText::_('SUBSCRIPTION').'</legend><table>';
			foreach($visibleListsArray as $oneListid){
				$name = $this->params->get('addoverlay',false) ? acymailing::tooltip($allLists[$oneListid]->description,$allLists[$oneListid]->name, '', $allLists[$oneListid]->name) : $allLists[$oneListid]->name;
				$return.='<tr class="row'.$k.'">
					<td valign="top">
						'.$name.'
					</td>
					<td align="center" class="fieldCell">
						'.$status->display("acymailing[listsub][".$oneListid."][status]",@$allLists[$oneListid]->status).'
					</td>
				</tr>';
				$k = 1 - $k;
			}
			$return.='</table></fieldset>';
		}

		return $return;
	}

	function saveEditTab($tab, &$user, $ui, $postdata) {

		$subscriberClass = acymailing::get('class.subscriber');
		$subscriber = null;
		$subscriber->subid = $subscriberClass->subid($user->id);

		//We use the user->id to update the infos as we are sure it does exists.
		if(!empty($postdata['acymailing']['user'])){
			//Check the infos...
			$subscriberClass->checkFields($postdata['acymailing']['user'],$subscriber);
		}

		if(!empty($user->name)) $subscriber->name = $user->name;
		if(!empty($user->email)) $subscriber->email = $user->email;
		$subscriber->enabled = empty($user->block) ? 1 : 0;
		$subscriber->confirmed = $user->confirmed;
		$subscriber->subid = $subscriberClass->save($subscriber);

		if(empty($subscriber->subid)) return;

		if(!empty($postdata['acymailing']['listsub'])){
			$subscriberClass->saveSubscription($subscriber->subid,$postdata['acymailing']['listsub']);
		}

	}

	function help($name,$value,$control_name){

		if(!$this->installed){ return $this->errorMessage;}

		JHTML::_('behavior.modal');
		$config =& acymailing::config();
		$level = $config->get('level');

		$link = ACYMAILING_HELPURL.'cbplugin'.'&level='.$level;
		$text = '<a class="modal" title="'.JText::_('HELP',true).'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 500}}"><button onclick="return false">'.JText::_('HELP').'</button></a>';

		return $text;
	}

	function lists($name,$value,$control_name){

		if(!$this->installed){ return $this->errorMessage;}

		JHTML::_('behavior.modal');
		$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;gtask=chooselist&amp;task='.$name.'&amp;control='.$control_name.'&amp;values='.$value;
		$text = '<input class="inputbox" id="'.$control_name.$name.'" name="'.$control_name.'['.$name.']" type="text" size="20" value="'.$value.'">';
		$text .= '<a class="modal" id="link'.$control_name.$name.'" title="'.JText::_('Select one or several Lists').'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 650, y: 375}}"><button onclick="return false">'.JText::_('Select').'</button></a>';

		return $text;

	}
}

