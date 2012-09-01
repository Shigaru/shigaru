<?php
/**
 * $Id: helper.php 353 2012-03-03 01:53:03Z meloman $
 * @package     mod_incomplete_info
 * @copyright   Copyright © 2010-2012 - All rights reserved.
 * @license     GNU/GPL
 * @author      Alain Rivest
 * @author mail info@aldra.ca
 * @website     Aldra.ca
 */

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

class modIncompleteInfoHelper extends JObject
{
    function __construct($params)
    {
    	$this->params = $params;
    }
    
    function getFieldList ($field_type)
    {
        $db =& JFactory::getDBO();

        $query = 'SELECT ' . $db->nameQuote('name')
               . ' FROM ' . $db->nameQuote('#__comprofiler_fields')
               . ' WHERE ' . $db->nameQuote('tablecolumns') . ' != ' . $db->Quote('')
               . ' AND ' . $db->nameQuote('table') . ' LIKE ' . $db->Quote('%_comprofiler')
               . ' AND ' . $db->nameQuote('published') . ' = 1 ';

        if ($field_type == 'required')
            $query .= ' AND ' . $db->nameQuote('required') . ' != 0 ';
            
        else if ($field_type == 'visible')
            $query .= ' AND ' . $db->nameQuote('profile') . ' != 0 ';

        $db->setQuery( $query, 0, 0 );
        $fields = $db->loadObjectList();
         
        if (!is_array($fields))
            $fields = array();
         	
        return $fields;
    }
    
    function checkInfo()
    {
        $field_type = $this->params->get('incomplete_info_field_type', 'required');
        
    	$missing_info = 0;
    	$fields = $this->getFieldList ($field_type);
    	
    	if (count ($fields) != 0)
    	{
            $db =& JFactory::getDBO();
            $user =& JFactory::getUser();
	
            if ($user->id != 0)
            {
                $query = 'SELECT COUNT(*) as missing_info '
                       . ' FROM ' . $db->nameQuote('#__comprofiler')
                       . ' WHERE ' . $db->nameQuote('user_id') . ' = ' . $db->Quote($user->id)
                       . ' AND (';

                foreach ($fields as $i => $field)
                {
	                if ($i != 0)
		                $query .= ' OR ';
                    $query .= "IFNULL(" . $db->nameQuote($field->name) . ",'') = '' ";
                }
                $query .= ')';

                //$txt = "\n\n$query\n\n";
                //error_log ($txt, 3, JPATH_ROOT.DS."logs/incomplete_info.log");

                $db->setQuery( $query, 0, 0 );
                $missing_info = $db->loadResult();

                //$txt = "\n\nmissing_info=$missing_info\n\n";
                //error_log ($txt, 3, JPATH_ROOT.DS."logs/incomplete_info.log");
            }
    	}
    	return $missing_info;
    }
}
?>
