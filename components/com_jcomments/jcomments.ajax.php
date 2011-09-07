<?php
/**
 * JComments - Joomla Comment System
 *
 * Frontend event handler
 *
 * @version 2.0
 * @package JComments
 * @subpackage Ajax
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project,
 * please make a reference to JComments someplace in your code
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

ob_start();

class JCommentsAJAX
{
	function convertEncoding( $value )
	{
		$iso = explode('=', _ISO);
		$charset = strtolower($iso[1]);

		if (($charset != 'utf-8')
		&& (is_file(JCOMMENTS_LIBRARIES.DS.'convert'.DS.'ConvertTables'.DS.$charset))) {
			if (!defined('CONVERT_TABLES_DIR')) {
				require_once(JCOMMENTS_LIBRARIES.DS.'convert'.DS.'utf8.class.php');
			}

			$encoding = & JCommentsUtf8::getInstance($charset);
			$needEntities = false;

			if (is_array($value)) {
				$newArray = array();

				foreach ($value as $k => $v) {
					if ($v != '') {
						if ($needEntities === true) {
							$newArray[$k] = $encoding->utf8_to_entities($v);
						} else {
							$newArray[$k] = JCommentsText::isUTF8($v) ? $encoding->utf8ToStr($v) : $v;

							if ($encoding->encodingFailed($newArray[$k])) {
								$newArray[$k] = $encoding->utf8_to_entities($v);
								$needEntities = true;
							}
						}
					}
				}
				return $newArray;
			} else if ($value != '') {
				$text = $value;
				if (JCommentsText::isUTF8($value)) {
					$text = $encoding->utf8ToStr($value);
					if ($encoding->encodingFailed($text)) {
						$text = $encoding->utf8_to_entities($value);
					}
				}

				return $text;
			}
		}
		return $value;
	}

	function prepareValues( &$values )
	{
		foreach ($values as $k => $v) {

			if ($k == 'comment') {
				// strip all HTML except [code]
				$m = array();
				preg_match_all('#(\[code\=?([a-z0-9]*?)\].*\[\/code\])#isU' . JCOMMENTS_PCRE_UTF8, trim($v), $m);

				$tmp = array();
				$key = '';
				
				foreach($m[1] as $code) {
					$key = '{' . md5($code.$key). '}';
					$tmp[$key] = $code;
					$v = preg_replace('#' . preg_quote($code, '#') . "#isU" . JCOMMENTS_PCRE_UTF8, $key, $v);
				}

				$v = trim(strip_tags($v));

				// handle magic quotes compatability
				if (get_magic_quotes_gpc() == 1) {
					$v = stripslashes($v);
				}
				$v = JCommentsText::nl2br($v);
				//$v = JCommentsText::nl2br(stripslashes($v));

				foreach($tmp as $key=>$code) {

					if (get_magic_quotes_gpc() == 1) {
						$code = str_replace('\"', '"', $code);
						$code = str_replace("\'", "'", $code);
					}

					$v = preg_replace('#' . preg_quote($key, '#') . "#isU" . JCOMMENTS_PCRE_UTF8, $code, $v);
				}
				unset($tmp, $m);
				$values[$k] = $v;
			} else {
				$values[$k] = trim(strip_tags($v));

				// handle magic quotes compatability
				if (get_magic_quotes_gpc() == 1) {
					$values[$k] = stripslashes($values[$k]);
				}

			}
		}

		// for Joomla 1.5 change encoding is not needed
		if (JCOMMENTS_JVERSION != '1.5') {
			return JCommentsAJAX::convertEncoding($values);
		} else {
			return $values;
		}
	}

	function showErrorMessage( &$response, $name, $message, $clear = false)
	{
		$message = str_replace("\n", '\n', $message);
		$message = str_replace('\n', '<br />', $message);
		$response->addScript("jcomments.error('$message','$name'," . intval($clear) . ");");
	}

	function showInfoMessage( &$response, $message )
	{
		$message = str_replace("\n", '\n', $message);
		$message = str_replace('\n', '<br />', $message);
		$response->addScript("jcomments.message('$message','info');");
	}

	function showForm( $object_id, $object_group, $target )
	{
		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$response = & JCommentsFactory::getAjaxResponse();

		$form = JComments::getCommentsForm($object_id, $object_group);
		$response->addAssign($target, 'innerHTML', $form);
		return $response;
	}

	function addComment( $values = array() )
	{
		global $my, $mainframe;

		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$acl = & JCommentsFactory::getACL();
		$config = & JCommentsFactory::getConfig();
		$response = & JCommentsFactory::getAjaxResponse();

		if ($acl->canComment()) {
			$values = JCommentsAJAX::prepareValues( $_POST );
			$userIP = $acl->getUserIP();

			if (!$my->id) {
				$noErrors = false;

				if (empty($values['name'])) {
					JCommentsAJAX::showErrorMessage($response, 'name', JText::_('ERROR_EMPTY_NAME'));
				} else if (JCommentsSecurity::checkIsRegisteredUsername($values['name']) == 1) {
					JCommentsAJAX::showErrorMessage($response, 'name', JText::_('ERROR_NAME_EXISTS'));
				} else if (JCommentsSecurity::checkIsForbiddenUsername($values['name']) == 1) {
					JCommentsAJAX::showErrorMessage($response, 'name', JText::_('ERROR_FORBIDDEN_NAME'));
				} else if (preg_match('/[\"\'\[\]\=\<\>\(\)\;]+/', $values['name'])) {
					JCommentsAJAX::showErrorMessage($response, 'name', JText::_('ERROR_INVALID_NAME'));
				} else if (($config->get('username_maxlength') != 0)
					&& (JCommentsText::strlen($values['name']) > $config->get('username_maxlength'))) {
					JCommentsAJAX::showErrorMessage($response, 'name', JText::_('ERROR_TOO_LONG_USERNAME'));
				} else if (empty($values['email']) && ($config->get('author_email') == 2)) {
					JCommentsAJAX::showErrorMessage($response, 'email', JText::_('ERROR_EMPTY_EMAIL'));
				} else if (!empty($values['email']) && (!preg_match( _JC_REGEXP_EMAIL2, $values['email']))) {
					JCommentsAJAX::showErrorMessage($response, 'email', JText::_('ERROR_INCORRECT_EMAIL'));
				} else if (empty($values['homepage']) && ($config->get('author_homepage') == 2)) {
					JCommentsAJAX::showErrorMessage($response, 'homepage', JText::_('ERROR_EMPTY_HOMEPAGE'));
				} else {
					$noErrors = true;
				}

				if (!$noErrors) {
					return $response;
				}
			}

			if (($acl->check('floodprotection') == 1) && (JCommentsSecurity::checkFlood($userIP))) {
				JCommentsAJAX::showErrorMessage($response, '', JText::_('ERROR_TOO_QUICK'));
			} else if (empty($values['homepage']) && ($config->get('author_homepage') == 3)) {
				JCommentsAJAX::showErrorMessage($response, 'homepage', JText::_('ERROR_EMPTY_HOMEPAGE'));
			} else if (empty($values['title']) && ($config->get('comment_title') == 3)) {
				JCommentsAJAX::showErrorMessage($response, 'title', JText::_('ERROR_EMPTY_TITLE'));
			} else if (empty($values['comment'])) {
				JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('ERROR_EMPTY_COMMENT'));
			} else if (($config->getInt('comment_maxlength') != 0)
				&& ($acl->check('enable_comment_length_check') == 1)
				&& (JCommentsText::strlen($values['comment']) > $config->get('comment_maxlength'))) {
				JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('ERROR_TOO_LONG_COMMENT'));
			} else {
				if ($acl->check('enable_captcha') == 1) {
					require_once( JCOMMENTS_BASE.DS.'jcomments.captcha.php' );

					if (!JCommentsCaptcha::check($values['captcha-refid'])) {
						JCommentsAJAX::showErrorMessage($response, 'captcha', JText::_('ERROR_CAPTCHA'), true);
						if (JCommentsCaptcha::attempts() > 3) {
							JCommentsCaptcha::destroy();
							$response->addScript("jcomments.clear('captcha');");
						}
						return $response;
					}
				}

				$dbo = & JCommentsFactory::getDBO();

				// small fix (by default $my has empty 'name' and 'email' field)
				if ($my->id) {
					$currentUser = JCommentsFactory::getUser($my->id);
					$my->name = $currentUser->name;
					$my->username = $currentUser->username;
					$my->email = $currentUser->email;
					unset($currentUser);
				}

				$comment = new JCommentsDB( $dbo );
				$comment->name = $my->id ? $my->name : preg_replace("/[\'\"\>\<\(\)\[\]]?+/i", '', $values['name']);
				$comment->username = $my->id ? $my->username : $comment->name;
				$comment->email = $my->id ? $my->email : (isset($values['email']) ? $values['email'] : '');

				if (($config->getInt('author_homepage') != 0)
				&& !empty($values['homepage'])) {
					$comment->homepage = JCommentsText::url($values['homepage']);
				}

				$comment->comment = $values['comment'];
				//$comment->comment = JCommentsText::nl2br(stripslashes($values['comment']));

				// filter forbidden bbcodes
				$bbcode = JCommentsFactory::getBBCode();
				$comment->comment = $bbcode->filter( $comment->comment );

				if ($comment->comment != '') {
					if ($config->getInt('enable_custom_bbcode')) {
						// filter forbidden custom bbcodes
						$commentLength = strlen($comment->comment);
						$customBBCode = & JCommentsFactory::getCustomBBCode();
						$comment->comment = $customBBCode->filter( $comment->comment );

						if (strlen($comment->comment) == 0 && $commentLength > 0) {
							JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('You have no rights to use this tag'));
							return $response;
						}
					}
				}

				if ($comment->comment == '') {
					JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('ERROR_EMPTY_COMMENT'));
					return $response;
				}

				if ($bbcode->removeQuotes($comment->comment) == '') {
					JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('ERROR_TOO_SHORT_COMMENT'));
					return $response;
				}

				$values['subscribe'] = isset($values['subscribe']) ? (int) $values['subscribe'] : 0;

				if ($values['subscribe'] == 1 && $comment->email == '') {
					JCommentsAJAX::showErrorMessage($response, 'email', JText::_('ERROR_SUBSCRIPTION_EMAIL'));
					return $response;
				}

				$comment->object_id = (int) $values['object_id'];
				$comment->object_group = $values['object_group'];
				$comment->title = isset($values['title']) ? $values['title'] : '';
				$comment->parent = isset($values['parent']) ? intval($values['parent']) : 0;
				$comment->lang = JCommentsMultilingual::getLanguage();
				$comment->ip = $userIP;
				$comment->userid = $my->id ? $my->id : 0;
				$comment->published = $acl->check('autopublish');

				if (JCOMMENTS_JVERSION == '1.5') {
					$datenow =& JFactory::getDate();
					$comment->date = $datenow->toMySQL();
				} else {
					$comment->date = date('Y-m-d H:i:s', time() + $mainframe->getCfg('offset') * 60 * 60);
				}

				$query = "SELECT COUNT(*) "
						. "\nFROM #__jcomments "
						. "\nWHERE comment = '" . $comment->comment . "'"
						. "\n  AND ip = '" . $comment->ip . "'"
						. "\n  AND name = '" . $dbo->getEscaped($comment->name) . "'"
						. "\n  AND userid = '" . $comment->userid . "'"
						. "\n  AND object_id = " . $comment->object_id
						. "\n  AND parent = " . $comment->parent
						. "\n  AND object_group = '" . $dbo->getEscaped($comment->object_group) . "'"
						. (JCommentsMultilingual::isEnabled() ? "\nAND lang = '" . JCommentsMultilingual::getLanguage() . "'" : "")
						;
				$dbo->setQuery($query);
				$found = $dbo->loadResult();

				// if dublicates is not found
				if ($found == 0) {
					// trigger onBeforeCommentAdded event
					$allowed = true;

					if ($config->getInt('enable_mambots') == 1) {
						require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
						JCommentsPluginHelper::importPlugin('jcomments');
						JCommentsPluginHelper::trigger('onBeforeCommentAdded', array(&$comment, &$response, &$allowed));
					}

					if ($allowed === false) {
						return $response;
					}

					// save comments subscription
					if ($values['subscribe']) {
						require_once (JCOMMENTS_BASE . DS . 'jcomments.subscription.php');
						$manager = & JCommentsSubscriptionManager::getInstance();
						$manager->subscribe($comment->object_id, $comment->object_group, $comment->userid, $comment->email, $comment->name, $comment->lang);
					}

					$merged = false;
					$merge_time = $config->getInt('merge_time', 0);

					// merge comments from same author
					if ($my->id && $merge_time > 0) {
						// load previous comment for same object and group
						$prevComment = JComments::getLastComment($comment->object_id, $comment->object_group, $comment->parent);

						if ($prevComment != null) {
							// if previous comment from same author and it currently not eddited
							// by any user - we'll update comment, else - insert new record to database
							if (($prevComment->userid == $comment->userid)
							&& ($prevComment->parent == $comment->parent)
							&& (!$acl->isLocked($prevComment))) {

								$newText = $prevComment->comment . '<br /><br />' . $comment->comment;
								$timeDiff = strtotime($comment->date) - strtotime($prevComment->datetime);

								if ($timeDiff < $merge_time) {

									$maxlength = $config->getInt('comment_maxlength');
									$needcheck = $acl->check('enable_comment_length_check');

									// validate new comment text length and if it longer than specified -
									// disable union current comment with previous
									if (($needcheck == 0) || (($needcheck == 1) && ($maxlength != 0)
										&& (JCommentsText::strlen($newText) <= $maxlength))) {
										$comment->id = $prevComment->id;
										$comment->comment = $newText;
										$merged = true;
									}
								}
							}
							unset($prevComment);
						}
					}

					if ($config->getInt('comment_title') == 1 && $comment->title == '') {
						if ($comment->parent > 0) {
							$parent = new JCommentsDB($dbo);
							if ($parent->load($comment->parent) && !empty($parent->title)) {
								$comment->title = JText::_('Re') . ' ' . $parent->title;
							}
						} else {
							$object_title = JCommentsObjectHelper::getTitle($comment->object_id, $comment->object_group);
							$comment->title = JText::_('Re') . ' ' . $object_title;
						}
					}

					// save new comment to database
					$comment->store();

					// datetime field is used in prepareComment function
					$comment->datetime = $comment->date;

					if (is_string($comment->datetime)) {
						$comment->datetime = strtotime($comment->datetime);
					}

					if ($config->getInt('enable_mambots') == 1) {
						require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
						JCommentsPluginHelper::importPlugin('jcomments');
						JCommentsPluginHelper::trigger('onAfterCommentAdded', array(&$comment, &$response, &$allowed));					}

					// if comment published we need update comments list
					if ($comment->published) {
						// send notification to comment subscribers
						JComments::sendToSubscribers($comment, true);

						if ($merged) {
							JComments::prepareComment($comment);

							$tmpl = & JCommentsFactory::getTemplate();
							$tmpl->load('tpl_comment');
							$tmpl->addVar('tpl_comment', 'get_comment_body', 1);
							$tmpl->addObject('tpl_comment', 'comment', $comment);

							$html = str_replace("\n", '\n', addslashes($tmpl->renderTemplate('tpl_comment')));

							$response->addScript("jcomments.updateComment(".$comment->id.", '$html');");
						} else {
							$count = JComments::getCommentsCount($comment->object_id, $comment->object_group);

							if ($config->get('template_view') == 'tree') {
								if ($count > 1) {
									$html = JComments::getCommentListItem($comment);
									$html = str_replace("\n", '\n', addslashes($html));
									$response->addScript("jcomments.updateTree('$html','$comment->parent');");
								} else {
									$html = JComments::getCommentsTree($comment->object_id, $comment->object_group);
									$html = str_replace("\n", '\n', addslashes($html));
									$response->addScript("jcomments.updateTree('$html',null);");
								}
							} else {
								// if pagination disabled and comments count > 1...
								if ($config->getInt('comments_per_page') == 0 && $count > 1) {
									// update only added comment
									$html = JComments::getCommentListItem($comment);
									$html = str_replace("\n", '\n', addslashes($html));

									if ($config->get('comments_order') == 'DESC') {
										$response->addScript("jcomments.updateList('$html','p');");
									} else {
										$response->addScript("jcomments.updateList('$html','a');");
									}
								} else {
									// update comments list
									$html = JComments::getCommentsList($comment->object_id, $comment->object_group, JComments::getCommentPage($comment->object_id, $comment->object_group, $comment->id));
									$html = str_replace("\n", '\n', addslashes($html));
									$response->addScript("jcomments.updateList('$html','r');");
								}

								// scroll to first comment
								if ($config->get('comments_order') == 'DESC') {
									$response->addScript("jcomments.scrollToList();");
								}
							}
						}
					} else {
						JCommentsAJAX::showInfoMessage($response, JText::_('THANKS'));
					}

					// clear comments textarea & update comment length counter if needed
					$response->addScript("jcomments.clear('comment');");

					if ($config->getInt('enable_notification') == 1) {
						JComments::sendNotification($comment, true);
					}
					unset($comment);

					if ($acl->check('enable_captcha') == 1) {
						JCommentsCaptcha::destroy();
						$response->addScript("jcomments.clear('captcha');");
					}
				} else {
					JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('ERROR_DUPLICATE_COMMENT'));
				}
			}
		} else {
			$response->addAlert(JText::_('ERROR_CANT_COMMENT'));
		}

		return $response;
	}

	function deleteComment($id)
	{
		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$acl = & JCommentsFactory::getACL();
		$dbo = & JCommentsFactory::getDBO();
		$config = & JCommentsFactory::getConfig();
		$response = & JCommentsFactory::getAjaxResponse();

		$comment = new JCommentsDB( $dbo );

		if ($comment->load((int) $id)) {
			if ($acl->isLocked($comment)) {
				$response->addAlert(JText::_('ERROR_BEING_EDITTED'));
			} else if ($acl->canDelete($comment)) {

				$object_id = $comment->object_id;
				$object_group = $comment->object_group;

				// process nested comments (threaded mode)
				$query = "SELECT id, parent"
						. "\n FROM #__jcomments"
						. "\n WHERE `object_group` = '" . $comment->object_group . "'"
						. "\n AND `object_id`='" . $comment->object_id . "'"
						;

				$dbo->setQuery($query);
				$rows = $dbo->loadObjectList();

				require_once( JCOMMENTS_LIBRARIES.DS.'joomlatune'.DS.'tree.php' );

				$tree = new JoomlaTuneTree( $rows );
				$descendants = $tree->descendants( $comment->id );

				if (count($descendants)) {
					$query = "DELETE FROM #__jcomments WHERE id IN (" . implode(',', $descendants) . ')';
					$dbo->setQuery( $query );
					$dbo->query();

					$query = "DELETE FROM #__jcomments_votes WHERE commentid IN (" . implode(',', $descendants) . ')';
					$dbo->setQuery( $query );
					$dbo->query();
				}

				if ($config->getInt('enable_mambots') == 1) {
					$allowed = true;

					require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
					JCommentsPluginHelper::importPlugin('jcomments');
					JCommentsPluginHelper::trigger('onBeforeCommentDeleted', array(&$comment, &$response, &$allowed));

					if ($allowed === false) {
						return $response;
					}

					$comment->delete();

					// delete comment's vote info
					$query = "DELETE FROM #__jcomments_votes WHERE commentid = " . $comment->id;
					$dbo->setQuery( $query );
					$dbo->query();

					JCommentsPluginHelper::trigger('onAfterCommentDeleted', array(&$comment, &$response));
				} else {
					$comment->delete();

					// delete comment's vote info
					$query = "DELETE FROM #__jcomments_votes WHERE commentid = " . $comment->id;
					$dbo->setQuery( $query );
					$dbo->query();
				}

				$count = JComments::getCommentsCount($object_id, $object_group);

				if ($count > 0) {
					$response->addScript("jcomments.updateComment('$id','');");
				} else {
					if ($config->get('template_view') == 'tree') {
        				$response->addScript("jcomments.updateTree('',null);");
					} else {
						$response->addScript("jcomments.updateList('','r');");
					}
				}
			} else {
				$response->addAlert(JText::_('ERROR_CANT_DELETE'));
			}
		}
		unset($comment);
		return $response;
	}

	function publishComment($id)
	{
		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$acl = & JCommentsFactory::getACL();
		$dbo = & JCommentsFactory::getDBO();
		$config = & JCommentsFactory::getConfig();
		$response = & JCommentsFactory::getAjaxResponse();

		$comment = new JCommentsDB($dbo);

		if ($comment->load((int) $id)) {
			if ($acl->isLocked($comment)) {
				$response->addAlert(JText::_('ERROR_BEING_EDITTED'));
			} else if ($acl->canPublish()) {

				$object_id = $comment->object_id;
				$object_group = $comment->object_group;
				$page = JComments::getCommentPage($object_id, $object_group, $comment->id);
				$comment->published = !$comment->published;

				if ($config->getInt('enable_mambots') == 1) {
					$allowed = true;

					require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
					JCommentsPluginHelper::importPlugin('jcomments');
					JCommentsPluginHelper::trigger('onBeforeCommentPublished', array(&$comment, &$response, &$allowed));

					if ($allowed === false) {
						return $response;
					}

					$comment->store();

					JCommentsPluginHelper::trigger('onAfterCommentPublished', array(&$comment, &$response));
				} else {
					$comment->store();
				}

				if ($comment->published) {
					// send notification to comment subscribers
					JComments::sendToSubscribers($comment, true);
				}

				JCommentsAJAX::updateCommentsList($response, $object_id, $object_group, $page);
			} else {
				$response->addAlert(JText::_('ERROR_CANT_PUBLISH'));
			}
		}
		unset($comment);
		return $response;
	}

	function cancelComment( $id )
	{
		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$dbo = & JCommentsFactory::getDBO();
		$response = & JCommentsFactory::getAjaxResponse();
		$comment = new JCommentsDB($dbo);

		if ($comment->load((int) $id)) {
			$acl = & JCommentsFactory::getACL();

			if (!$acl->isLocked($comment)) {
				$comment->checkin();
			}
		}
		unset($comment);
		return $response;
	}

	function editComment( $id, $loadForm = 0 )
	{
		global $my;

		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$dbo = & JCommentsFactory::getDBO();
		$response = & JCommentsFactory::getAjaxResponse();
		$comment = new JCommentsDB($dbo);
		$id = (int) $id;

		if ($comment->load($id)) {
			$acl = & JCommentsFactory::getACL();

			if ($acl->isLocked($comment)) {
				$response->addAlert(JText::_('ERROR_BEING_EDITTED'));
			} else if ($acl->canEdit($comment)) {
					$comment->checkout($my->id);

					$name = ($comment->userid) ? '' : addslashes($comment->name);
					$email = ($comment->userid) ? '' : addslashes($comment->email);
					$homepage = addslashes($comment->homepage);
					$text = str_replace("\n", '\n', addslashes(JCommentsText::br2nl($comment->comment)));
					$title = str_replace("\n", '', addslashes(JCommentsText::br2nl($comment->title)));

					if (intval($loadForm) == 1) {
						$form = JComments::getCommentsForm($comment->object_id, $comment->object_group, true);
						$response->addAssign('comments-form-link', 'innerHTML', $form);
					}
					$response->addScript("jcomments.showEdit(" . $comment->id . ", '$name', '$email', '$homepage', '$title', '$text');");
				} else {
					$response->addAlert(JText::_('ERROR_CANT_EDIT'));
				}
		}
		unset($comment);
		return $response;
	}

	function saveComment( $values = array() )
	{
		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$dbo = & JCommentsFactory::getDBO();
		$config = & JCommentsFactory::getConfig();

		$response = & JCommentsFactory::getAjaxResponse();
		$values = JCommentsAJAX::prepareValues($_POST);
		$comment = new JCommentsDB($dbo);
		$id = (int) $values['id'];

		if ($comment->load($id)) {
			$acl = & JCommentsFactory::getACL();

			if ($acl->canEdit($comment)) {
				if ($values['comment'] == '') {
					JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('ERROR_EMPTY_COMMENT'));
				} else if (($config->getInt('comment_maxlength') != 0)
					&& ($acl->check('enable_comment_length_check') == 1)
					&& (JCommentsText::strlen($values['comment']) > $config->getInt('comment_maxlength'))) {
					JCommentsAJAX::showErrorMessage($response, 'comment', JText::_('ERROR_TOO_LONG_COMMENT'));
				} else {
					$bbcode = & JCommentsFactory::getBBCode();

					$comment->comment = $values['comment'];
					//$comment->comment = JCommentsText::nl2br(stripslashes($comment->comment));
					$comment->comment = $bbcode->filter($comment->comment);
					$comment->published = $acl->check('autopublish');


					if (($config->getInt('comment_title') != 0) && isset($values['title'])) {
						$comment->title = stripslashes($values['title']);
					}

					if (($config->getInt('author_homepage') == 1) && isset($values['homepage'])) {
						$comment->homepage = JCommentsText::url($values['homepage']);
					}

					$allowed = true;

					if ($config->getInt('enable_mambots') == 1) {
						require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
						JCommentsPluginHelper::importPlugin('jcomments');
						JCommentsPluginHelper::trigger('onBeforeCommentChanged', array(&$comment, &$response, &$allowed));
					}

					if ($allowed == false) {
						return $response;
					}

					$comment->store();
					$comment->checkin();

					// send notification to comment subscribers
					//JComments::sendToSubscribers($comment, false);

					$comment->datetime = $comment->date;

					if ($config->getInt('enable_mambots') == 1) {
						JCommentsPluginHelper::importPlugin('jcomments');
						JCommentsPluginHelper::trigger('onAfterCommentChanged', array(&$comment, &$response));
					}

					if ($config->getInt('enable_notification') == 1) {
						JComments::sendNotification($comment, false);
					}

					JComments::prepareComment($comment);

					$tmpl = & JCommentsFactory::getTemplate();
					$tmpl->load('tpl_comment');
					$tmpl->addVar('tpl_comment', 'get_comment_body', 1);
					$tmpl->addObject('tpl_comment', 'comment', $comment);

					$html = str_replace("\n", '\n', addslashes($tmpl->renderTemplate('tpl_comment')));

					$response->addScript("jcomments.updateComment(" . $comment->id . ", '$html');");
				}
			} else {
				$response->addAlert(JText::_('ERROR_CANT_EDIT'));
			}
		}
		unset($comment);
		return $response;
	}

	function quoteComment( $id, $loadForm = 0 )
	{
		if (JCommentsSecurity::badRequest() == 1) {
			JCommentsSecurity::notAuth();
		}

		$dbo = & JCommentsFactory::getDBO();
		$acl = & JCommentsFactory::getACL();
		$config = & JCommentsFactory::getConfig();
		$response = & JCommentsFactory::getAjaxResponse();
		$comment = new JCommentsDB($dbo);
		$id = (int) $id;

		if ($comment->load($id)) {
			$comment_name = JComments::getCommentAuthorName($comment);
			$comment_text = JCommentsText::br2nl($comment->comment);

			if ($config->getInt('enable_nested_quotes') == 0) {
				$bbcode = & JCommentsFactory::getBBCode();
				$comment_text = $bbcode->removeQuotes($comment_text);
			}

			if ($config->getInt('enable_custom_bbcode')) {
				$customBBCode = & JCommentsFactory::getCustomBBCode();
				$comment_text = $customBBCode->filter($comment_text, true);
			}

			if ($acl->getUserId() == 0) {
				$bbcode = & JCommentsFactory::getBBCode();
				$comment_text = $bbcode->removeHidden($comment_text);
			}

			if ($comment_text != '') {
				if ($acl->check('enable_autocensor')) {
					$comment_text = JCommentsText::censor($comment_text);
				}

				if (intval($loadForm) == 1) {
					$form = JComments::getCommentsForm($comment->object_id, $comment->object_group, true);
					$response->addAssign('comments-form-link', 'innerHTML', $form);
				}

				$text = "[quote name=\"" . $comment_name . "\"]" . str_replace("\n", '\n', addslashes($comment_text)) . "[/quote]\\n";
				$response->addScript("jcomments.insertText('" . $text . "');");
			} else {
				$response->addAlert(JText::_('ERROR_NOTHING_TO_QUOTE'));
			}
		}
		unset($comment);
		return $response;
	}

	function updateCommentsList( &$response, $object_id, $object_group, $page )
	{
		$config = & JCommentsFactory::getConfig();

		if ($config->get('template_view') == 'tree') {
			$html = addslashes(JComments::getCommentsTree($object_id, $object_group));
			$response->addScript("jcomments.updateTree('$html',null);");
		} else {
			$html = addslashes(JComments::getCommentsList($object_id, $object_group, $page));
			$response->addScript("jcomments.updateList('$html','r');");
		}
	}

	function showPage($object_id, $object_group, $page)
	{
		$response = & JCommentsFactory::getAjaxResponse();

		$object_id = intval($object_id);
		$object_group = strip_tags($object_group);
		$page = intval($page);

		JCommentsAJAX::updateCommentsList($response, $object_id, $object_group, $page);
		return $response;
	}

	function showComment($id)
	{
		$response = & JCommentsFactory::getAjaxResponse();
		$acl = & JCommentsFactory::getACL();
		$dbo = & JCommentsFactory::getDBO();
		$config = & JCommentsFactory::getConfig();
		$comment = new JCommentsDB($dbo);

		if ($comment->load((int) $id) && ($acl->canPublish() || $comment->published)) {
			if ($config->get('template_view') == 'tree') {
				$page = 0;
			} else {
				$page = JComments::getCommentPage($comment->object_id, $comment->object_group, $comment->id);
			}
			JCommentsAJAX::updateCommentsList($response, $comment->object_id, $comment->object_group, $page);
			$response->addScript("jcomments.scrollToComment('$id');");
		} else {
			$response->addAlert(JText::_('ERROR_NOT_FOUND'));
		}
		unset($comment);
		return $response;
	}

	function jump2email($id, $hash)
	{
		$dbo = & JCommentsFactory::getDBO();
		$response = & JCommentsFactory::getAjaxResponse();
		$comment = new JCommentsDB( $dbo );

		$hash = strip_tags($hash);
		$hash = preg_replace('#[\(\)\'\"]#is', '', $hash);

		if ((strlen($hash) == 32) && ($comment->load( (int) $id))) {
		    $matches = array();
			preg_match_all( _JC_REGEXP_EMAIL, $comment->comment, $matches);
			foreach($matches[0] as $email) {
				if (md5($email) == $hash) {
					$response->addScript("window.location='mailto:$email';");
				}
			}
			unset($matches);
		}
		unset($comment);
		return $response;
	}

	function subscribeUser($object_id, $object_group)
	{
		global $my, $mainframe;

		if (!isset($my)) {
			$my = $mainframe->getUser();
		}

		$response = & JCommentsFactory::getAjaxResponse();

		require_once (JCOMMENTS_BASE . DS . 'jcomments.subscription.php');

		$manager = & JCommentsSubscriptionManager::getInstance();
		$result = $manager->subscribe($object_id, $object_group, $my->id);

		if ($result) {
			$response->addScript("jcomments.updateSubscription(true, '" . JText::_('Unsubscribe') . "');");
		} else {
			$errors = $manager->getErrors();
			if (count($errors)) {
				$response->addAlert(implode('\n', $errors));
			}
		}

		return $response;
	}

	function unsubscribeUser($object_id, $object_group)
	{
		global $my, $mainframe;

		if (!isset($my)) {
			$my = $mainframe->getUser();
		}

		$response = & JCommentsFactory::getAjaxResponse();

		require_once (JCOMMENTS_BASE . DS . 'jcomments.subscription.php');

		$manager = & JCommentsSubscriptionManager::getInstance();
		$result = $manager->unsubscribe($object_id, $object_group, $my->id);

		if ($result) {
			$response->addScript("jcomments.updateSubscription(false, '" . JText::_('Subscribe') . "');");
		} else {
			$errors = $manager->getErrors();
			$response->addAlert(implode('\n', $errors));
		}
		return $response;
	}

	function voteComment( $id, $value )
	{
		global $my;

		$acl = & JCommentsFactory::getACL();
		$dbo = & JCommentsFactory::getDBO();
		$config = & JCommentsFactory::getConfig();
		$response = & JCommentsFactory::getAjaxResponse();

		$id = (int) $id;
		$value = (int) $value;
		$value = ($value > 0) ? 1 : -1;

		$ip = $acl->getUserIP();

		$query = 'SELECT COUNT(*) FROM `#__jcomments_votes` WHERE commentid = ' . $id;

		if ($my->id) {
			$query .= ' AND userid = ' . $my->id;
		} else {
			$query .= ' AND ip = "' . $ip . '"';
		}
		$dbo->setQuery( $query );
		$voted = $dbo->loadResult();

		if ($voted == 0) {
			$comment = new JCommentsDB( $dbo );

			if ($comment->load($id)) {
				if ($acl->canVote($comment)) {


					$allowed = true;

					if ($config->getInt('enable_mambots') == 1) {
						require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
						JCommentsPluginHelper::importPlugin('jcomments');
						JCommentsPluginHelper::trigger('onCommentVote', array(&$comment, &$response, &$allowed, &$value));
					}

					if ($allowed !== false) {

						if ($value > 0) {
							$comment->isgood++;
						} else {
							$comment->ispoor++;
						}
						$comment->store();

						$query = "INSERT INTO `#__jcomments_votes`(`commentid`,`userid`,`ip`,`date`,`value`)"
							. "VALUES('".$comment->id."', '".$my->id."','".$ip."', now(), ".$value.")";
						$dbo->setQuery($query);
						$dbo->query();
					}

					$tmpl = & JCommentsFactory::getTemplate();
					$tmpl->load('tpl_comment');
					$tmpl->addVar('tpl_comment', 'get_comment_vote', 1);
					$tmpl->addObject('tpl_comment', 'comment', $comment);

					$html = $tmpl->renderTemplate('tpl_comment');
					$html = str_replace("\n", '\n', addslashes($html));

					$response->addScript("jcomments.updateVote('" . $comment->id . "','$html');");
				} else {
					$response->addAlert(JText::_('ERROR_CANT_VOTE'));
				}
			} else {
				$response->addAlert(JText::_('ERROR_NOT_FOUND'));
			}
			unset($comment);
		} else {
			$response->addAlert(JText::_('ERROR_ALREADY_VOTED'));
		}
		return $response;
	}
}

$result = ob_get_contents();
ob_end_clean();
?>