<?php
/**
* Multi Author Tab, based on cb.authortab by beat@joomlapolis.com
* @version $Id: multiauthortab.php 340 2012-02-05 00:36:41Z meloman $
* @package Multi Author Tab
* @author Alain Rivest
* @copyright (C) Alain Rivest Aldra.ca
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

// ensure this file is being included by a parent file
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }


class MultiAuthorTab extends cbTabHandler {

    function MultiAuthorTab() {
        $this->cbTabHandler();
    }
    
    /**
     * @param       int     The route of the content item
     */
    function getK2ItemRoute ($id)
    {
        $needles = array(
            'item'  => (int) $id,
            'category' => (int) $catid
        );

        //Create the link
        $link = 'index.php?option=com_k2&view=item&id='. $id;

        if ($item = $this->_findItem($needles)) {
            $link .= '&Itemid='.$item->id;
        };

        return $link;
    }
    
    function _findItem ($needles)
    {
        $component =& JComponentHelper::getComponent('com_k2');

        $menus  = &JApplication::getMenu('site', array());
        $items  = $menus->getItems('componentid', $component->id);

        $match = null;

        foreach ($needles as $needle => $id)
        {
            foreach($items as $item)
            {
                if ((@$item->query['view'] == $needle) && (@$item->query['id'] == $id))
                {
                    $match = $item;
                    break;
                }
            }

            if (isset($match)) {
                break;
            }
        }

        return $match;
    }

    function getDisplayTab ($tab, $user, $ui, $tab_number)
    {
        global $_CB_framework, $_CB_database, $mainframe;

        $jVer = checkJversion();
        
        $params = $this->params; // get parameters (plugin and related tab)

        $contentType = $params->get('MatContentType', 'joomla');
        
        $showHits = $params->get('MatShowHits', 0);
        $showRating = $params->get('MatShowRating', 0);
        
        $showSectionId = $params->get('MatShowSectionId', 0);
        $showSectionName = $params->get('MatShowSectionName', 0);
        $showSection = ($showSectionId || $showSectionName) && $jVer <= 1;

        $showCategoryId = $params->get('MatShowCatId', 0);
        $showCategoryName = $params->get('MatShowCatName', 0);
        $showCategory = $showCategoryId || $showCategoryName;

        $showEmptyTab = $params->get('MatShowEmptyTab', 0);
        $showEdit = $params->get('MatShowEdit', 1);
                
        $list_sectionid = trim ($params->get('MatSectionId', ''));
        $list_catid = trim ($params->get('MatCatId', ''));

        $what_date = $params->get('MatDate', 1);
        $authorAlias = $params->get('MatAuthorAlias', 0);
		$myArticles = intval ($params->get('MatMyArticles', 1));
        $maxArticle = intval ($params->get('MatMaxArticle', 0));
        $NbPerPage = intval ($params->get('MatNbPerPage', 10));
        
        $order = $params->get('MatOrder', 0);
        $orderDir = $params->get('MatOrderDir', 'DESC');

        // error_log("tab_number=$tab_number\nsection=($list_sectionid)\ncatid=($list_catid)\n", 3, "/var/www/multiauthortab.log");

        $return	= '';

        $now = date( 'Y-m-d H:i:s', $_CB_framework->now() - $_CB_framework->getCfg( 'offset' ) * 60 * 60 );
        $q_count = "SELECT COUNT(*) ";

        // K2
        if ($contentType == 'k2')
        {
            $q_select = "SELECT a.id, a.catid, a.title, a.hits, a.created, a.modified, ROUND( r.rating_sum / r.rating_count ) AS rating, r.rating_count";
            $q_select .= ", cc.name AS c_title, a.created_by";
        }
        // J 1.6 +
        else if ($jVer >= 2)
        {
        	$q_select = "SELECT a.id, a.catid, a.title, a.hits, a.created, a.modified, ROUND( r.rating_sum / r.rating_count ) AS rating, r.rating_count";
	        $q_select .= ", cc.title AS c_title, a.created_by";
        }
        else
        {
        	$q_select = "SELECT a.id, a.catid, a.sectionid, a.title, a.hits, a.created, a.modified, ROUND( r.rating_sum / r.rating_count ) AS rating, r.rating_count";
	        $q_select .= ", s.title AS s_title, cc.title AS c_title, a.created_by";
        }

        // J 1.5 +
        if ($jVer >= 1)
        {
            $q_select .= ', CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(\':\', a.id, a.alias) ELSE a.id END as slug,'
                    . ' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug';
        }

        // K2
        if ($contentType == 'k2')
        {
            $q_from = "\n FROM #__k2_items AS a"
                    . "\n LEFT JOIN #__k2_rating AS r ON r.itemID = a.id";
        }
        // J 1.6+
        else if ($jVer >= 2)
        {
	        $q_from = "\n FROM #__content AS a"
                    . "\n LEFT JOIN #__content_rating AS r ON r.content_id = a.id";
        }
        else
        {
	        $q_from = "\n FROM #__content AS a"
                    . "\n LEFT JOIN #__content_rating AS r ON r.content_id = a.id"
		            . "\n INNER JOIN #__sections AS s ON s.id = a.sectionid AND s.title != 'Mamblog'";
        }

        // K2
        if ($contentType == 'k2') {
            $q_from .=  "\n LEFT JOIN #__k2_categories AS cc ON cc.id = a.catid";
        }
        // J 1.5 +
        else if ($jVer >= 1) {
            $q_from .=	"\n LEFT JOIN #__categories AS cc ON cc.id = a.catid";
        }

        // K2
        if ($contentType == 'k2') {
            $q_where = "\n WHERE a.published = 1 and a.trash = 0 ";
        } else {
            $q_where = "\n WHERE a.state = 1 ";
        }
        $q_where .= "\n AND (publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now')"
                  . "\n AND (publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now')"
                  . "\n AND a.access <= " . (int) $_CB_framework->myCmsGid();

		if ($myArticles)
		{
	        if ($authorAlias) {
	            $q_where .= "\n AND a.created_by_alias = '". $user->username ."'";
	        } else {
	            $q_where .= "\n AND a.created_by = ". (int) $user->id ."";
	        }
		}

        // J 1.5 -
        if ($jVer <= 1 && strlen ($list_sectionid) > 0) {
            $q_where .= "\n AND a.sectionid IN ($list_sectionid)";
        }
        if (strlen ($list_catid) > 0) {
            $q_where .= "\n AND a.catid IN ($list_catid)";
        }

        switch ($order)
        {
            case 0: $col = "a.created";
                    break;
            case 1: $col = "a.modified";
                    break;
            case 2: $col = "a.title";
                    break;
            case 3: $col = "a.hits";
                    break;
            case 4: if ($jVer <= 1)
	            		$col = "a.sectionid";
	            	else
	            		$col = "a.catid";
                    break;
            case 5: if ($jVer <= 1)
            			$col = "s_title";
            		else
            			$col = "c_title";
                    break;
            case 6: $col = "a.catid";
                    break;
            case 7: $col = "c_title";
                    break;
            case 8: $col = "rating";
                    break;
            default: $col = "a.created";
        }
        $q_order_by = "\n ORDER BY $col $orderDir";

        // Count how many articles
        $query = $q_count . $q_from . $q_where;
        $_CB_database->setQuery ($query);
        $total = $_CB_database->loadResult();

        // If we want to limit the total number of articles, set a new total if it exceed the max.
        if ($maxArticle > 0 && $total > $maxArticle)
            $total = $maxArticle;

        if ($total == 0)
        {
            if ($showEmptyTab)
            {
                $return .= "<br /><br /><div class=\"cbNoArticles\" style=\"text-align:left;width:95%;\">";
                $return .= _UE_NOARTICLES;
                $return .= "</div>";
            }
            return $return;
        }

        // Pagination
        $pagination = "";
        $limitstart = 0;
        $limit = $maxArticle;
        
        // If we want pagination
        if ($NbPerPage > 0)
        {
            $prefix = 'mat' . $tab_number . '_';
            $pagingParams = $this->_getPaging (array(), array($prefix));

            if ($pagingParams[$prefix.'limitstart'] === null)
                $pagingParams[$prefix.'limitstart'] = 0;

            // If there's more than one page
            if ($total > $NbPerPage)
                $pagination = '<div align="center">' . $this->_writePaging ($pagingParams, $prefix, $NbPerPage, $total) . '</div>';
                
            // Set the limit for the query
            $limit = $NbPerPage;
            $limitstart = $pagingParams[$prefix.'limitstart'];
            
            // If we want to limit the total number of articles, set a new limit if it exceed the max.
            if ($maxArticle > 0)
            {
                if ($NbPerPage > $maxArticle)
                    $NbPerPage = $maxArticle;
                
                if ($limitstart + $limit > $maxArticle)
                    $limit = ($limitstart + $limit) - $maxArticle; 
            }
        }
        
        // Get the articles
        $query = $q_select . $q_from . $q_where . $q_order_by;
        
        if ($limit > 0)
            $_CB_database->setQuery ($query, $limitstart, $limit);
        else
            $_CB_database->setQuery ($query);

        $items = $_CB_database->loadObjectList ();

        $return .= $this->_writeTabDescription( $tab, $user );
        
        /* DEBUG */
        // $return .= "<b>Query=</b>$query<br/>";

        $return .= "<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" width=\"95%\">";
        $return .= "<tr class=\"sectiontableheader\">";

        if ($what_date != 0) {
            $return .= "<th>"._UE_ARTICLEDATE."</th>";
        }

        if ($showSection) {
            $return .= "<th>" . JText::_('Section') . "</th>";
        }

        if ($showCategory) {
            $return .= "<th>" . JText::_('Category') . "</th>";
        }

        $return .= "<th>"._UE_ARTICLETITLE."</th>";

        if ($showHits) {
        	$return .= "<th>"._UE_ARTICLEHITS."</th>";
        }

        if ($showRating) {
        	$return .= "<th>"._UE_ARTICLERATING."</th>";
        }
        $return .= "</tr>";
        $i=1;
        $hits="";
        $rating="";
        foreach ($items AS $item)
        {
            if ( isset( $mainframe ) && is_callable( array( $mainframe, "getItemid" ) ) ) {
                $itemid	= $mainframe->getItemid( $item->id );
            } elseif (is_callable( "JApplicationHelper::getItemid" ) ) {
                $itemid	= JApplicationHelper::getItemid( $item->id );
            } else {
                $itemid = null;
            }
            $itemidtxt	= $itemid ? "&amp;Itemid=" . (int) $itemid : "";
            $i= ($i==1) ? 2 : 1;
            $img="";

			if ($showEdit) {
	            $showEdit = ($_CB_framework->myId() == $item->created_by);
			}
			
            if ($showEdit)
            {
            	// J 1.6+
            	if ($jVer >= 2) {
            		$editImage = JHTML::_('image.site', 'edit.png', '/media/system/images/', NULL, NULL, JText::_('Edit'), array('border' => 0) );
            	}	
	            // J 1.5
            	else if ($jVer == 1) {
	                $editImage = JHTML::_('image.site', 'edit.png', '/images/M_images/', NULL, NULL, JText::_('Edit'), array('border' => 0) );
	            }
	            // J 1.0
	            else if (is_callable(array("mosAdminMenus","ImageCheck"))) {
	                $editImage = mosAdminMenus::ImageCheck( 'edit.png', '/images/M_images/' );
	            }
	            // Mambo 4.5.0:
	            else {
	                $editImage = '<img src="'.$_CB_framework->getCfg( 'live_site' ).'/images/M_images/edit.png" alt="" align="middle" style="border:0px;" />';
	            }

	            // K2
	            if ($contentType == 'k2') {
                    $url_edit = cbSef( 'index.php?option=com_k2&amp;view=item&amp;layout=itemform&amp;task=edit&amp;id=' . $item->id );
	            }
	            // J 1.6+
	            else if ($jVer >= 2) {
	                $url_edit = cbSef( 'index.php?option=com_content&amp;task=article.edit&amp;a_id=' . $item->slug . '&amp;catid=' . $item->catslug . $itemidtxt );
	            }
	            // J 1.5
	            else if ($jVer == 1) {
	                $url_edit = cbSef( 'index.php?option=com_content&amp;view=article&amp;task=edit&amp;id=' . $item->slug . '&amp;catid=' . $item->catslug . $itemidtxt );
	            }
	            // J 1.0
	            else {
	                $url_edit = cbSef( 'index.php?option=com_content&amp;task=edit&amp;id=' . (int) $item->id . $itemidtxt );
	            }
            }
            
            if ($showRating)
            {
            	// J 1.6+
            	if ($jVer >= 2)
            	{
	                $starImageOn = JHTML::_('image.site', 'rating_star.png', '/media/system/images/');
	                $starImageOff = JHTML::_('image.site', 'rating_star_blank.png', '/media/system/images/');
            	}
            	// J 1.5
	            else if ($jVer == 1)
	            {
	                $starImageOn = JHTML::_('image.site', 'rating_star.png', '/images/M_images/' );
	                $starImageOff = JHTML::_('image.site', 'rating_star_blank.png', '/images/M_images/' );
	            }
	            // J 1.0
	            else if (is_callable(array("mosAdminMenus","ImageCheck")))
	            {
	                $starImageOn = mosAdminMenus::ImageCheck( 'rating_star.png', '/images/M_images/' );
	                $starImageOff = mosAdminMenus::ImageCheck( 'rating_star_blank.png', '/images/M_images/' );
	            }
	            // Mambo 4.5.0:
	            else
	            {
	                $starImageOn  = '<img src="'.$_CB_framework->getCfg( 'live_site' ).'/images/M_images/rating_star.png" alt="" align="middle" style="border:0px;" />';
	                $starImageOff = '<img src="'.$_CB_framework->getCfg( 'live_site' ).'/images/M_images/rating_star_blank.png" alt="" align="middle" style="border:0px;" />';
	            }
            	
            	for ($j=0; $j < $item->rating; $j++) {
                    $img .= $starImageOn;
                }
                for ($j=$item->rating; $j < 5; $j++) {
                    $img .= $starImageOff;
                }

                $rating = '<td><span class="content_rating">';
                $rating .= $img . '&nbsp;/&nbsp;';
                $rating .= intval( $item->rating_count );
                $rating .= "</span></td>\n";
            }
            if ($showHits) {
                $hits = "<td>".$item->hits."</td>";
            }

            // K2
            if ($contentType == 'k2') {
                $url = cbSef( $this->getK2ItemRoute( $item->id ));
            }
            // J1.6+
            else if ($jVer >= 2)
            {
                require_once( $_CB_framework->getCfg( 'absolute_path' ) . '/components/com_content/helpers/route.php' );
                $url = cbSef( ContentHelperRoute::getArticleRoute( $item->slug, $item->catid ) );
            }
            // J 1.5
            else if ($jVer == 1)
            {
                $url = cbSef( 'index.php?option=com_content&amp;view=article&amp;id=' . $item->slug . '&amp;catid=' . $item->catslug . $itemidtxt );
            }
            else
            {
                $url = cbSef( 'index.php?option=com_content&amp;task=view&amp;id=' . (int) $item->id . $itemidtxt );
            }

            $return .= "<tr class=\"sectiontableentry$i\">";

            if ($what_date == 1) {
                $return .= "<td>".cbFormatDate( $item->created )."</td>";
            } else if ($what_date == 2) {
                $return .= "<td>".cbFormatDate( $item->modified )."</td>";
            }

            if ($showSection)
            {
                $return .= "<td>";
                if ($showSectionId)
                    $return .= $item->sectionid;
                if ($showSectionId && $showSectionName)
                    $return .= ". ";
                if ($showSectionName)
                    $return .= $item->s_title;
                $return .= "</td>";
            }

            if ($showCategory)
            {
                $return .= "<td>";
                if ($showCategoryId)
                    $return .= $item->catid;
                if ($showCategoryId && $showCategoryName)
                    $return .= ". ";
                if ($showCategoryName)
                    $return .= $item->c_title;
                $return .= "</td>";
            }

            // Edit
            $return .= "<td>";
            if ($showEdit)
            {
                // K2
                if ($contentType == 'k2') {
                    $return .= "<a "
                             . "onclick=\"window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,');return false;\" "
                             . "href=\"$url_edit\">$editImage</a> ";
                } else {
                    $return .= "<a href=\"$url_edit\">$editImage</a> ";
                }
            }
			$return .= "<a href=\"" . $url . "\">" . $item->title . "</a></td>" . $hits . $rating . "</tr>\n";
        }
        $return .= "</table>";

        // Pagination
        $return .= $pagination;

        return $return;
    }
}

class getMultiAuthorTab1 extends MultiAuthorTab {
	
    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,1);
    }
}

class getMultiAuthorTab2 extends MultiAuthorTab {

	function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,2);
    }
}

class getMultiAuthorTab3 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,3);
    }
}

class getMultiAuthorTab4 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,4);
    }
}

class getMultiAuthorTab5 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,5);
    }
}

class getMultiAuthorTab6 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,6);
    }
}

class getMultiAuthorTab7 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,7);
    }
}

class getMultiAuthorTab8 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,8);
    }
}

class getMultiAuthorTab9 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,9);
    }
}

class getMultiAuthorTab10 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,10);
    }
}

class getMultiAuthorTab11 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,11);
    }
}

class getMultiAuthorTab12 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,12);
    }
}

class getMultiAuthorTab13 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,13);
    }
}

class getMultiAuthorTab14 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,14);
    }
}

class getMultiAuthorTab15 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,15);
    }
}

class getMultiAuthorTab16 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,16);
    }
}

class getMultiAuthorTab17 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,17);
    }
}

class getMultiAuthorTab18 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,18);
    }
}

class getMultiAuthorTab19 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,19);
    }
}

class getMultiAuthorTab20 extends MultiAuthorTab {

    function getDisplayTab($tab,$user,$ui) {
        return parent::getDisplayTab($tab,$user,$ui,20);
    }
}

?>
