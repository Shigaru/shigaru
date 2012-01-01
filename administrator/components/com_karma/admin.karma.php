<?php

defined('_JEXEC') or die();

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');
require_once(JPATH_COMPONENT.DS.'controller.php');

$controller = new KarmaController();
$controller->registerDefaultTask('listMessages');
$task = JRequest::getCmd('task');
$controller->execute($task);
$controller->redirect();

?>