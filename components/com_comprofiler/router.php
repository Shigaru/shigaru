<?php
/**
* Joomla/Mambo Community Builder
* @version $Id: router.php 831 2010-01-26 11:04:24Z beat $
* @package Community Builder
* @subpackage router.php
* @author Beat
* @copyright (C) Beat, www.joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }


function comprofilerBuildRoute( &$query ) {
	$segments									=	array();

	if ( isset( $query['task'] ) ) {
	//  if ( empty( $query['Itemid'] ) ) {
		$task									=	strtolower( $query['task'] );
		$segments[]								=	$task;

		switch ( $task ) {
			case 'userprofile':
				
				if ( isset( $query['user'] ) && $query['user'] ) {
					if ( is_numeric( $query['user'] ) ) {
						$sql					=	'SELECT username FROM #__users WHERE id = '. (int) $query['user'];
						$database				=&	JFactory::getDBO();
						$database->setQuery( $sql, 0, 1 );
						$username				=	$database->loadResult();
						if ( $username && ! ( preg_match( '+[@:/\n\r\t\a\e\f\v\x00_]+', $username ) || is_numeric( $username ) ) ) {
							$query['user']		=	str_replace( '.', '_', $username );		// a dot (.) in a username is mishandled by the dot htaccess of joomla 1.5
						}
						$segments									=	array();
					}
					$segments[]					=	reslug($query['user']);
					unset( $query['user'] );
				}
				break;

			case 'userslist':
				$listid							=	false;
				if ( isset( $query['listid'] ) && $query['listid'] ) {
					if ( is_numeric( $query['listid'] ) ) {
						$sql					=	'SELECT title FROM #__comprofiler_lists WHERE listid = '. (int) $query['listid'] . ' AND published = 1';
						$database				=&	JFactory::getDBO();
						$database->setQuery( $sql, 0, 2 );
						$listNames				=	$database->loadResultArray();
						if ( is_array( $listNames ) && ( count( $listNames ) == 1 ) ) {
							$query['listid']	=	$listNames[0];
						}
					}
					$segments[]					=	$query['listid'];
					unset( $query['listid'] );
					$listid						=	true;
				}
				if ( isset( $query['searchmode'] ) && $query['searchmode'] ) {
					if ( ! $listid ) {
						$segments[]				=	'0';
					}
					$segments[]					=	'search';
					unset( $query['searchmode'] );
				}
				break;
				
			default:
				break;
		}
		unset($query['task']);
	//  }
	}

	return $segments;
}

function comprofilerParseRoute( $segments ) {
	$vars										=	array();

	//Get the active menu item
	// $menu									=&	JSite::getMenu();
	// $item									=&	$menu->getActive();
	//
	// if ( ! isset( $item ) ) {
	$count										=	count( $segments );
	if ( $count > 0 ) {
		$vars['task']							=	strtolower( $segments[0] );

		switch ( $vars['task'] ) {
			case 'userprofile':
				if ( $count > 1 ) {
					// Joomla's 1.5 router.php unfortunately encodes '-' as ':' in the decoding,
					// so we do what we can as usernames with '-' are more common than usernames with ':':
					$user						=	str_replace( array( ':', '_' ), array( '-', '.' ), $segments[1] );
					if ( ! is_numeric( $user ) ) {
						$database				=&	JFactory::getDBO();
						$sql					=	'SELECT id FROM #__users WHERE username = '. $database->Quote( $user );
						$database->setQuery( $sql, 0, 2 );
						$userIds				=	$database->loadResultArray();
						if ( is_array( $userIds ) && ( count( $userIds ) == 1 ) ) {
							$user				=	$userIds[0];
						}
					}
					$vars['user']				=	$user;
				}
				break;

			case 'userslist':
				if ( $count > 1 ) {
					$listid						=	$segments[1];
					if ( ! is_numeric( $listid ) ) {
						$database				=&	JFactory::getDBO();
						$sql					=	'SELECT listid FROM #__comprofiler_lists WHERE title = '. $database->Quote( $listid ) . ' AND published = 1';
						$database->setQuery( $sql, 0, 2 );
						$listIds				=	$database->loadResultArray();
						if ( is_array( $listIds ) && ( count( $listIds ) == 1 ) ) {
							$listid				=	$listIds[0];
						}
					}
					$vars['listid']				=	(int) $listid;

					if ( $count > 2 ) {
						if ( $segments[2] == 'search' ) {
							$vars['searchmode']	=	1;
						}
					}
				}
				break;

			default:
				$oUser = getUserBySluggedUsername($vars['task']);
				$vars['task']				=	'userprofile';
				$vars['user']				=	intval($oUser);
				break;
		}
	}
	return $vars;
}

function getUserBySluggedUsername ($paramUsername) {
	$database				=&	JFactory::getDBO();
	$sluggedUserName 		= str_replace("-", ' ', $paramUsername);
	$sql					=	'SELECT id FROM #__users WHERE username = '. $database->Quote( $sluggedUserName );
	$database->setQuery( $sql, 0, 2 );
	$userIds				=	$database->loadResultArray();
	$user					= null;
	if ( is_array( $userIds ) && ( count( $userIds ) == 1 ) ) {
		$user				=	$userIds[0];
	}
	
	return $user;	
}
function reslug($string){
	$chars = 'Á|A, Â|A, Å|A, Ă|A, Ä|A, À|A, Ã|A, Ć|C, Ç|C, Č|C, Ď|D, É|E, È|E, Ë|E, Ě|E, Ê|E, Ì|I, Í|I, Î|I, Ï|I, Ĺ|L, Ń|N, Ň|N, Ñ|N, Ò|O, Ó|O, Ô|O, Õ|O, Ö|O, Ő|O, Ŕ|R, Ř|R, Š|S, Ś|O, Ť|T, Ů|U, Ú|U, Ű|U, Ü|U, Ý|Y, Ž|Z, Ź|Z, á|a, â|a, å|a, ä|a, à|a, ã|a, ć|c, ç|c, č|c, ď|d, đ|d, é|e, ę|e, ë|e, ě|e, è|e, ê|e, ì|i, í|i, î|i, ï|i, ĺ|l, ń|n, ň|n, ñ|n, ò|o, ó|o, ô|o, ő|o, ö|o, õ|o, š|s, ś|s, ř|r, ŕ|r, ť|t, ů|u, ú|u, ű|u, ü|u, ý|y, ž|z, ź|z, ˙|-, ß|ss, Ą|A, µ|u, Ą|A, µ|u, ą|a, Ą|A, ę|e, Ę|E, ś|s, Ś|S, ż|z, Ż|Z, ź|z, Ź|Z, ć|c, Ć|C, ł|l, Ł|L, ó|o, Ó|O, ń|n, Ń|N, Б|B, б|b, В|V, в|v, Г|G, г|g, Д|D, д|d, Ж|Zh, ж|zh, З|Z, з|z, И|I, и|i, Й|Y, й|y, К|K, к|k, Л|L, л|l, м|m, Н|N, н|n, П|P, п|p, т|t, У|U, у|u, Ф|F, ф|f, Х|Ch, х|ch, Ц|Ts, ц|ts, Ч|Ch, ч|ch, Ш|Sh, ш|sh, Щ|Sch, щ|sch, Ы|I, ы|i, Э|E, э|e, Ю|U, ю|iu, Я|Ya, я|ya, Ş|S, İ|I, Ğ|G, ş|s, ğ|g, ı|i, $|S, ¥|Y, £|L, ù|u, °|o, º|o, ª|a';
	$oUri = $string;
	$elements = explode(',', $chars);
			foreach ($elements as $element) {
				@list($source, $destination) = explode('|', JString::trim($element));
				
				$source = JString::trim($source);
				$destination = JString::trim($destination);
				
				// Empty source, continue
                if ($source == '') {
					continue;
				}
				
				$oUri = str_replace($source, $destination, $oUri);
			}
	
	$oUri = str_replace('//', '/', $oUri);
	$oUri = str_replace('--', '-', $oUri);
	$oUri = rtrim($oUri, '-');
	//return strtolower(trim(preg_replace(array('/\'/', '/[^a-zA-Z0-9\-!.,+]+/', '/(^_|_$)/'), array('', 'Á|A, Â|A, Å|A, Ă|A, Ä|A, À|A, Ã|A, Ć|C, Ç|C, Č|C, Ď|D, É|E, È|E, Ë|E, Ě|E, Ê|E, Ì|I, Í|I, Î|I, Ï|I, Ĺ|L, Ń|N, Ň|N, Ñ|N, Ò|O, Ó|O, Ô|O, Õ|O, Ö|O, Ő|O, Ŕ|R, Ř|R, Š|S, Ś|O, Ť|T, Ů|U, Ú|U, Ű|U, Ü|U, Ý|Y, Ž|Z, Ź|Z, á|a, â|a, å|a, ä|a, à|a, ã|a, ć|c, ç|c, č|c, ď|d, đ|d, é|e, ę|e, ë|e, ě|e, è|e, ê|e, ì|i, í|i, î|i, ï|i, ĺ|l, ń|n, ň|n, ñ|n, ò|o, ó|o, ô|o, ő|o, ö|o, õ|o, š|s, ś|s, ř|r, ŕ|r, ť|t, ů|u, ú|u, ű|u, ü|u, ý|y, ž|z, ź|z, ˙|-, ß|ss, Ą|A, µ|u, Ą|A, µ|u, ą|a, Ą|A, ę|e, Ę|E, ś|s, Ś|S, ż|z, Ż|Z, ź|z, Ź|Z, ć|c, Ć|C, ł|l, Ł|L, ó|o, Ó|O, ń|n, Ń|N, Б|B, б|b, В|V, в|v, Г|G, г|g, Д|D, д|d, Ж|Zh, ж|zh, З|Z, з|z, И|I, и|i, Й|Y, й|y, К|K, к|k, Л|L, л|l, м|m, Н|N, н|n, П|P, п|p, т|t, У|U, у|u, Ф|F, ф|f, Х|Ch, х|ch, Ц|Ts, ц|ts, Ч|Ch, ч|ch, Ш|Sh, ш|sh, Щ|Sch, щ|sch, Ы|I, ы|i, Э|E, э|e, Ю|U, ю|iu, Я|Ya, я|ya, Ş|S, İ|I, Ğ|G, ş|s, ğ|g, ı|i, $|S, ¥|Y, £|L, ù|u, °|o, º|o, ª|a', ''), $string)));
	return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($oUri, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
	}

?>
