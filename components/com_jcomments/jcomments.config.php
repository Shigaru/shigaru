<?php
/**
 * JComments - Joomla Comment System
 *
 * Configuration loader class
 *
 * @version 2.0
 * @package JComments
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

class JCommentsCfg
{
	/**
	 * Associative array of configuration variables
	 * @var array
	 */
	var $_params = array();
	/**
	 * Last loaded language name
	 * @var string
	 */
	var $_current = '';

	/**
	 * Returns a reference to a language object.
	 *
	 * @access public
	 * @param string $language The language to use.
	 * @return object JCommentsCfg
	 */
	function &getInstance($language='')
	{
		static $instance = null;
		global $mainframe;

		if (!is_object( $instance )) {
			$instance = new JCommentsCfg();

			if ($language == '') {
		       		$multilingual_support = ($mainframe->getCfg('multilingual_support') == 1);
				$language = $multilingual_support ? JCommentsMultilingual::getLanguage() : '';
			}
			$instance->load($language);
		} else {
			if ($language != $instance->_current && $instance->_current == '') {
				if ($language != '') {
					$instance->load($language);
				} else {
			       		$multilingual_support = ($mainframe->getCfg('multilingual_support') == 1);
					$language = $multilingual_support ? JCommentsMultilingual::getLanguage() : '';

					if ($language != '') {
						$instance->load($language);
					}
				}
			}
		}

		return $instance;
	}

	/**
	 * Returns params names
	 *
	 * @return array
	 */
	function getKeys()
	{
		return array_keys($this->_params);
	}

	function get( $name, $default = '' )
	{
		return isset($this->_params[$name]) ? $this->_params[$name] : $default;
	}

	/**
	 * Fetches and returns a given variable as integer.
	 * This is currently only a proxy function for get().
	 *
	 * See getVar() for more in-depth documentation on the parameters.
	 *
	 * @param	string	$name		Variable name
	 * @param	string	$default	Default value if the variable does not exist
	 * @return	integer	Requested variable
	 * @access 	public
	 */
	function getInt( $name, $default = 0 )
	{
		return (int) $this->get($name, $default);
	}

	/**
	 * Sets a configuration variable
	 *
	 * @access	public
	 * @param	string $name The name of the variable
	 * @param	mixed  $value The value of the variable to set
	 * @return	void
	 */
	function set( $name, $value )
	{
		$this->_params[$name] = $value;
	}

	/**
	 * Sets a configuration variable
	 *
	 * @access	private
	 * @param	string $lang The language name to use.
	 * @param	mixed  $component The component name to use
	 * @return	array An array of loaded configuration variables
	 */
	function _load( $lang = '', $component = '' )
	{
		$dbo = & JCommentsFactory::getDBO();

		$where = array();

		if ($lang != '') {
			$where[] = "lang = '$lang'";
		}

		if ($component != '') {
			$where[] = "component = '$component'";
		}

		$query = "SELECT * FROM #__jcomments_settings"
        		. (count($where) ? ("\nWHERE " . implode(' AND ', $where)) : "" )
        		;

		$dbo->setQuery($query);
		$data = $dbo->loadObjectList();

		if (count($data) == 0) {
			$dbo->setQuery( "SELECT * FROM #__jcomments_settings WHERE lang='' AND component=''" );
			$data = $dbo->loadObjectList();
		}

		return $data;
	}

	/**
	 * Load configuration from DB and stores it into field _params
	 *
	 * @access public
	 * @return void
	 */
	function load( $lang = '', $component = '' )
	{
	
		$cache = JCommentsCache::getCache('com_jcomments');
		$params = (array) $cache->call('JCommentsCfg::_load', $lang, $component);

		foreach ($params as $param) {
			if ('smiles' == $param->name) {
				if (!empty($param->value)) {
					$smileValues = explode("\n", $param->value);
					$this->_params['smiles'] = array();
					foreach ($smileValues as $v) {
						list ($code, $image) = explode("\t", $v);
						$this->_params['smiles'][$code] = $image;
					}
				} else {
					$this->_params['smiles'] = array();
				}
			} else if ('badwords' == $param->name) {
				if ('' != trim($param->value)) {
					$this->_params['badwords'] = explode("\n", $param->value);
				}
			} else {
				$this->_params[$param->name] = $param->value;
			}
		}

		$this->_current = $lang;

		unset( $params );
	}
}
?>