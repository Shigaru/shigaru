<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class updateHelper{
	var $db;
	function updateHelper(){
		$this->db =& JFactory::getDBO();
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
	}
	function installNotifications(){
		$this->db->setQuery('SELECT `alias` FROM `#__acymailing_mail` WHERE `type` = \'notification\'');
		$notifications = $this->db->loadResultArray();
		$data = array();
		if(!in_array('notification_created',$notifications)){
			$data[] = "('New Subscriber on your website', '<p>Hello {subtag:name},</p><p>A new user has been created in AcyMailing : </p><blockquote><p>Name : {user:name}</p><p>Email : {user:email}</p><p>IP : {user:ip} </p></blockquote>', '', 1, 'notification', 0,'notification_created', 1)";
		}
		if(!in_array('notification_unsuball',$notifications)){
			$data[] = "('A User unsubscribed from all your lists', '<p>Hello {subtag:name},</p><p>The user {user:name} : {user:email} unsubscribed from all your lists</p>', '', 1, 'notification', 0, 'notification_unsuball', 1)";
		}
		if(!in_array('notification_unsub',$notifications)){
			$data[] = "('A User unsubscribed', '<p>Hello {subtag:name},</p><p>The user {user:name} : {user:email} unsubscribed from your list</p>', '', 1, 'notification', 0, 'notification_unsub', 1)";
		}
		if(!in_array('notification_refuse',$notifications)){
			$data[] = "('A User refuses to receive e-mails from your website', '<p>The User {user:name} : {user:email} refuses to receive any e-mail anymore from your website.</p>', '', 1, 'notification',0,'notification_refuse', 1)";
		}
		if(!in_array('confirmation',$notifications)){
			$data[] = "('{subtag:name}, please confirm your subscription', '<p> Hello {subtag:name}, </p><p><strong>{confirm}Click here to confirm your subscription{/confirm}</strong></p>', '',1, 'notification', 0, 'confirmation', 1)";
		}
		if(!in_array('report',$notifications)){
			$data[] = "('AcyMailing Cron Report', '<p>{report}</p><p>{detailreport}</p>', '',1, 'notification',0,  'report', 1)";
		}
		if(!in_array('notification_autonews',$notifications)){
			$data[] = "('A Newsletter has been generated : \"{subject}\"', '<p>The Newsletter issue {issuenb} has been generated : </p><p>Subject : {subject}</p><p>{body}</p>', '',1, 'notification', 0, 'notification_autonews',1)";
		}
		if(!in_array('modif',$notifications)){
			$data[] = "('Modify your subscription', '<p>Hello {subtag:name}, </p><p>You requested some changes on your subscription,</p><p>Please {modify}click here{/modify} to be identified as the owner of this account and then modify your subscription.</p>', '',1, 'notification', 0, 'modif', 1)";
		}
		if(!empty($data)){
			$this->db->setQuery("INSERT INTO `#__acymailing_mail` (`subject`, `body`, `altbody`, `published`, `type`, `visible`, `alias`, `html`) VALUES ".implode(',',$data));
			$this->db->query();
		}
		$query = "INSERT IGNORE INTO `#__acymailing_fields` (`fieldname`, `namekey`, `type`, `value`, `published`, `ordering`, `options`, `core`, `required`, `backend`, `frontcomp`, `default`, `listing`) VALUES
		('NAMECAPTION', 'name', 'text', '', 1, 1, '', 1, 1, 1, 1, '',1),
		('EMAILCAPTION', 'email', 'text', '', 1, 2, '', 1, 1, 1, 1, '',1),
		('RECEIVE', 'html', 'radio', '0::JOOMEXT_TEXT\n1::HTML', 1, 3, '', 1, 1, 1, 1, '1',1);";
		$this->db->setQuery($query);
		$this->db->query();
	}
	function installTemplates(){
		$path = ACYMAILING_FRONT.'templates';
		$dirs = JFolder::folders( $path );
		$template = array();
		$order = 0;
		foreach($dirs as $oneTemplateDir){
			$order++;
			$description = '';
			$name = '';
			$body = '';
			$altbody = '';
			$premium = 0;
			$ordering = $order;
			$styles=array();
			if(!@include($path.DS.$oneTemplateDir.DS.'install.php')) continue;
			$body = str_replace(array('src="./','src="../'),array('src="components/com_acymailing/templates/'.$oneTemplateDir.'/','src="components/com_acymailing/templates/'),$body);
			$template[] = $this->db->Quote($oneTemplateDir).','.$this->db->Quote($name).','.$this->db->Quote($description).','.$this->db->Quote($body).','.$this->db->Quote($altbody).','.$this->db->Quote($premium).','.$this->db->Quote($ordering).','.$this->db->Quote(serialize($styles));
		}
		if(empty($template)) return true;
		$this->db->setQuery("INSERT IGNORE INTO `#__acymailing_template` (`namekey`, `name`, `description`, `body`, `altbody`, `premium`, `ordering`, `styles`) VALUES (".implode('),(',$template).')');
		$this->db->query();
		$ndTemplates = $this->db->getAffectedRows();
		if(!empty($ndTemplates)){
			acymailing::display(JText::sprintf('TEMPLATES_INSTALL',$ndTemplates),'success');
		}
	}
	function initList(){
		$query = 'UPDATE IGNORE '.acymailing::table('users',false).' as b, '.acymailing::table('subscriber').' as a SET a.email = b.email, a.name = b.name WHERE a.userid = b.id AND a.userid > 0';
		$this->db->setQuery($query);
		$this->db->query();
		$time = time();
		$query = 'INSERT IGNORE INTO `#__acymailing_subscriber` (`email`,`name`,`confirmed`,`userid`,`created`,`enabled`,`accept`,`html`) SELECT `email`,`name`,1-`block`,`id`,'.$time.',1-`block`,1,1 FROM `#__users`';
		$this->db->setQuery($query);
		$this->db->query();
		$this->db->setQuery('SELECT COUNT(*) FROM `#__acymailing_list`');
		$nbLists = $this->db->loadResult();
		if(!empty($nbLists)) return true;
		$user =& JFactory::getUser();
		$this->db->setQuery("INSERT INTO `#__acymailing_list` (`name`, `description`, `ordering`, `published`, `alias`, `color`, `visible`, `type`,`userid`) VALUES ('Newsletters','Receive our latest news','1','1','mailing_list','#3366ff','1','list',".(int) $user->id.")");
		$this->db->query();
		$listid = $this->db->insertid();
		$this->db->setQuery('INSERT IGNORE INTO `#__acymailing_listsub` (`listid`, `subid`, `subdate`, `status`) SELECT '.$listid.', subid, '.$time.',1 FROM `#__acymailing_subscriber`');
		$this->db->query();
	}
	function installExtensions(){
		$path = ACYMAILING_BACK.'plugins';
		$dirs = JFolder::folders( $path );
		$this->db->setQuery('SELECT max(`id`) FROM `#__plugins`');
		$pluginMax = $this->db->loadResult();
		$success = array();
		$error = array();
		ob_start();
		foreach($dirs as $oneDir){
			if($this->_installOne($path.DS.$oneDir)){
				$success[] = JText::sprintf('PLUG_INSTALLED',$oneDir);
			}else{
				$error[] = JText::sprintf('PLUG_ERROR',$oneDir);
			}
		}
		$data = ob_end_clean();
		$plugcompo = array('tagcbuser' => '#__comprofiler','tagvmcoupon' => '#__vm_coupons','tagvmproduct' => '#__vm_product','tagjomsocial' => '#__community_users');
		$listTables = $this->db->getTableList();
		$excludePlugins = array($this->db->Quote('vmacymailing'),$this->db->Quote('contentplugin'));
		foreach($plugcompo as $tagname => $tablename){
			if(!in_array(str_replace('#__',$this->db->getPrefix(),$tablename),$listTables)) $excludePlugins[] = $this->db->Quote($tagname);
		}
		$query = "UPDATE `#__plugins` SET `published` = 1 WHERE `id` > '.$pluginMax.' AND (`folder` LIKE '%acymailing%' OR `element` LIKE '%acymailing%')";
		$query .= ' AND `element` NOT IN ('.implode(',',$excludePlugins).')';
		$this->db->setQuery($query);
		$this->db->query();
		$order = array('tagsubscription' => 1,'tagsubscriber' => 2,'taguser' => 3,'tagcbuser' => 4,'tagjomsocial' => 4,'tagtime'=> 5, 'online' => 6,'tagvmcoupon'=>7,'tagvmproduct' => 8,'tagcontent' => 11,'tagmodule' => 12,'contentplugin' => 15,'template'=>25,'urltracker' => 30,'stats' => 50);
		foreach($order as $name => $num){
			$this->db->setQuery("UPDATE `#__plugins` SET `ordering` = $num WHERE `element` = ".$this->db->Quote($name)." AND `id` > $pluginMax");
			$this->db->query();
		}
		$path = ACYMAILING_BACK.'modules';
		$dirs = JFolder::folders( $path );
		ob_start();
		foreach($dirs as $oneDir){
			if($this->_installOne($path.DS.$oneDir)){
				$success[] = JText::sprintf('MODULE_INSTALLED',$oneDir);
			}else{
				$error[] = JText::sprintf('MODULE_ERROR',$oneDir);
			}
		}
		$data = ob_end_clean();
		if(!empty($success)) acymailing::display('<ul><li>'.implode('</li><li>',$success).'</li></ul>','success');
		if(!empty($error)){
			acymailing::display('<ul><li>'.implode('</li><li>',$error).'</li></ul>','error');
		}else{
			$app =& JFactory::getApplication();
			$app->_messageQueue = array();
		}
	}
	function _installOne($folder){
		if(empty($folder)) return false;
		unset($GLOBALS['_JREQUEST']['installtype']);
		unset($GLOBALS['_JREQUEST']['install_directory']);
		JRequest::setVar('installtype','folder');
		JRequest::setVar('install_directory',$folder);
		$_REQUEST['installtype']='folder';
		$_REQUEST['install_directory']=$folder;
		$controller = new JController(array('base_path'=>
		ACYMAILING_ROOT.'administrator'.DS.'components'.DS.'com_installer','name'=>'Installer','default_task'
		=> 'installform'));
		$model  = $controller->getModel('Install');
		return $model->install();
	}
	function getUrl(){
		$urls = parse_url(ACYMAILING_LIVE);
		$lurl = preg_replace('#^www2?\.#Ui','',$urls['host'],1);
		if(!empty($urls['path'])) $lurl .= $urls['path'];
		return strtolower(rtrim($lurl,'/'));
	}
}