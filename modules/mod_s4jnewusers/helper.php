<?php

/**
 * @package Module s4j New Users for Joomla! 1.5.x, 1.6.x, 1.7.x and 2.5.x
 * @version $Id: mod_s4jnewusers$
 * @author Software4Joomla.com
 * @copyright (C) 2007 - 2012 Software4Joomla
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * */
/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

class s4jLibNewUsers {

    var $_owner = "";
    var $_s4jTyp = 0; // 0= component, 1= modul 2 = plugin, 3=cbplugin 	
    var $_lang = "default_language";
    var $_params = null;

    function s4jLibNewUsers(&$params, $s4jTyp, $owner = "", $ageadd = 0) {
        global $mainframe;
        $this->_owner = $owner;
        $this->_s4jTyp = $s4jTyp;
        $this->_params = $params;

        $this->_ageadd = $ageadd;

        //Tooltip
        $this->_show_tooltip = $params->get('show_tooltip', 1); //0 = No, 1 = Yes
        // display users
        $this->_displayusers = $params->get('displayusers', 0); //0 = All users, 1 = Users with picture
        $this->_exclude_users = $params->get('exclude_users', 0);
        $this->_list_order = $params->get('list_order', 0);

        //0=Username, 1=Username (name), 2= Name, 3=Name (Username)
        $this->_format_name = $params->get('format_name', 0);
        $this->_format_name_tooltip = $params->get('format_name_tooltip', 1);

        //Date Format
        $this->_date_format = $params->get('date_format', "%Y-%m-%d");
        $this->_enable_custom_dateformat = $params->get('enable_custom_dateformat', 0);
        if ($this->_enable_custom_dateformat == 1)
            $this->_date_format = $params->get('custom_dateformat', '%Y-%m-%d');

        //Format der Ausgabe
        //B% = Birthday & Age, A% = Avatar, U% = Username, G% =Gender, O%=Online, P% = PMS, H% = Hits, 
        //R% = Register date, L% = Last update date, C1%-C3% Customfields 1-3		
        $this->_out_format = $params->get('out_format', "U%");
        $this->_out_format_tooltip = $params->get('out_format_tooltip', "U%");

        //remove \r needed for tooltip 
        $this->_out_format = str_replace("\r", "", $this->_out_format);
        $this->_out_format_tooltip = str_replace("\r", "", $this->_out_format_tooltip);

        //replace \" \' for tooltip
        $this->_out_format = str_replace('"', "'", $this->_out_format);
        $this->_out_format_tooltip = str_replace('"', "'", $this->_out_format_tooltip);

        //replace \n  for tooltip
        $this->_out_format = str_replace("\n", "", $this->_out_format);
        $this->_out_format_tooltip = str_replace("\n", "", $this->_out_format_tooltip);

        //$tooltip = str_replace("\n","",$tooltip);
        //$tooltip = str_replace("\r","",$tooltip);
        //remove breaks in form element
        $this->_out_format = str_replace("<br />", "", $this->_out_format);
        $this->_out_format_tooltip = str_replace("<br />", "", $this->_out_format_tooltip);

        //Online status
        $this->_show_online = $params->get('show_online', 0); //0=No, 1=Yes
        $this->_show_online_tooltip = $params->get('show_online_tooltip', 1); //0=No, 1=Yes
        //hits
        $this->_show_hits = $params->get('show_hits', 0); //0=No, 1=Yes
        $this->_show_hits_tooltip = $params->get('show_hits_tooltip', 0); //0=No, 1=Yes
        //register date
        $this->_show_register = $params->get('show_register', 0); //0=No, 1=Yes
        $this->_show_register_tooltip = $params->get('show_register_tooltip', 0); //0=No, 1=Yes
        //lastupdate date
        $this->_show_lastupdatedate = $params->get('show_lastupdatedate', 0); //0=No, 1=Yes
        $this->_show_lastupdatedate_tooltip = $params->get('show_lastupdatedate_tooltip', 0); //0=No, 1=Yes
        //custom fields
        //custom field 1
        $this->_cb_custom1 = $params->get('cb_custom1', "");
        $this->_cb_custom1_image = $params->get('cb_custom1_image', -1); //-1 Do Not Use
        $this->_cb_show_custom1 = $params->get('cb_show_custom1', 0); //0=No, 1=Value, 2=Image & Value
        $this->_cb_show_custom1_tooltip = $params->get('cb_show_custom1_tooltip', 0); //0=No, 1=Value, 2=Image & Value	
        //custom field 2
        $this->_cb_custom2 = $params->get('cb_custom2', "");
        $this->_cb_custom2_image = $params->get('cb_custom2_image', -1); //-1 Do Not Use
        $this->_cb_show_custom2 = $params->get('cb_show_custom2', 0); //0=No, 1=Value, 2=Image & Value
        $this->_cb_show_custom2_tooltip = $params->get('cb_show_custom2_tooltip', 0); //0=No, 1=Value, 2=Image & Value
        //custom field 3
        $this->_cb_custom3 = $params->get('cb_custom3', "");
        $this->_cb_custom3_image = $params->get('cb_custom3_image', -1); //-1 Do Not Use
        $this->_cb_show_custom3 = $params->get('cb_show_custom3', 0); ///0=No, 1=Value, 2=Image & Value
        $this->_cb_show_custom3_tooltip = $params->get('cb_show_custom3_tooltip', 0); //0=No, 1=Value, 2=Image & Value
        //custom field 4
        $this->_cb_custom4 = $params->get('cb_custom4', "");
        $this->_cb_custom4_image = $params->get('cb_custom4_image', -1); //-1 Do Not Use
        $this->_cb_show_custom4 = $params->get('cb_show_custom4', 0); ///0=No, 1=Value, 2=Image & Value
        $this->_cb_show_custom4_tooltip = $params->get('cb_show_custom4_tooltip', 0); //0=No, 1=Value, 2=Image & Value		
        //custom field 5
        $this->_cb_custom5 = $params->get('cb_custom5', "");
        $this->_cb_custom5_image = $params->get('cb_custom5_image', -1); //-1 Do Not Use
        $this->_cb_show_custom5 = $params->get('cb_show_custom5', 0); ///0=No, 1=Value, 2=Image & Value
        $this->_cb_show_custom5_tooltip = $params->get('cb_show_custom5_tooltip', 0); //0=No, 1=Value, 2=Image & Value
        //Avatar
        $this->_cb_avatar = $params->get('cb_avatar', 0); //0 = No,  1= always,  2=if avaliable 
        $this->_cb_avatar_image = $params->get('cb_avatar_image', 1);
        $this->_cb_set_avatar_size = $params->get('cb_set_avatar_size', 0); // 0 = No, 1 = Height, 2 = Width, 3 = Height & Width
        $this->_cb_avatar_height = $params->get('cb_avatar_height', 100);
        $this->_cb_avatar_width = $params->get('cb_avatar_width', 100);

        $this->_cb_avatar_tooltip = $params->get('cb_avatar_tooltip', 0); //0=No 1 = Name, 2=if avaliable 
        $this->_cb_avatar_tooltip_image = $params->get('cb_avatar_tooltip_image', 1);
        $this->_cb_set_avatar_tooltip_size = $params->get('cb_set_avatar_tooltip_size', 0); // 0 = No, 1 = Height, 2 = Width, 3 = Height & Width
        $this->_cb_avatar_tooltip_height = $params->get('cb_avatar_tooltip_height', 100);
        $this->_cb_avatar_tooltip_width = $params->get('cb_avatar_tooltip_width', 100);


        //Birthday & Age
        $this->_cb_age = $params->get('cb_age', 0); //0 = No, birhtday, age, birthday & age // 
        $this->_cb_age_tooltip = $params->get('cb_age_tooltip', 0); //0 = No, birhtday, age, birthday & age		
        $this->_cb_age_field = $params->get('cb_age_field', "cb_birthday");
        $this->_cb_age_minagetohide = $params->get('cb_age_minagetohide', 0);
        $this->_cb_age_maxagetohide = $params->get('cb_age_maxagetohide', 100);

        //Gender
        $this->_cb_gender = $params->get('cb_gender', 0); // 0 = No, 1=Symbol, 2 = Value
        $this->_cb_gender_tooltip = $params->get('cb_gender_tooltip', 0); // 0 = No, 1=Symbol, 2 = Value
        $this->_cb_gender_field = $params->get('cb_gender_field', "cb_gender"); //Optimierung
        $this->_cb_gender_male = $params->get('cb_gender_male', "male");
        $this->_cb_gender_male_image = $params->get('cb_gender_male_image', "male.png");
        $this->_cb_gender_female = $params->get('cb_gender_female', "female");
        $this->_cb_gender_female_image = $params->get('cb_gender_female_image', "female.png");

        //PMS
        $this->_pms_link = $params->get('pms_link', 0); // 0 = No, 1=MyPMS OS, 2=PMS Pro, 3=UddeIM 0.4 & 0.5, 4=PMS enhanced 2.x by Stefan Klingner, 5=JIM 1.0.1 
        //Filter
        $this->_cb_filter = $params->get('cb_filter', 0); // 0 = No, 1= Gender, 2 = Custom 1, 3 = Custom 2, 4 = Custom 3  
        $this->_cb_filter_value = $params->get('cb_filter_value', "");

        //Chat System 0=No, 1=FlashChat
        $this->_chat_system = $params->get('chat_system', 0);

        if ($this->_show_tooltip == 1) {
            $document = & JFactory::getDocument();
            //$document->addScript( JURI::root(true).'/includes/js/overlib_mini.js');
            //$document->addScript( JURI::root(true).'/components/com_comprofiler/js/overlib_all_mini.js');
            $document->addScript(JURI::root(true) . '/modules/mod_s4jnewusers/js/overlib_mini.js');
        }

        $this->IncludeLanguageFiles();
    }

    function isJ15() {

        $jver = new JVersion();
        if (!strncasecmp($jver->RELEASE, "1.5", 3)) {
            return(1);
        }
        return(0);
    }

    function IncludeLanguageFiles() {
        $lang = & JFactory::getLanguage();
        //$langname 		= strtolower($lang->getName());
        $langtag = strtolower($lang->getTag());
        $langRoot = JPATH_BASE . DS . 'components' . DS . 'com_comprofiler' . DS . 'plugin' . DS . 'language' . DS;

        //CB Languagefiles		
        //if (file_exists($langRoot . $langname .DS. $langname.'.php')) { 
        if (file_exists($langRoot . $langtag . DS . 'language.php')) {
            //if( defined('_VALID_MOS') && !defined('_UE_NAME_FORMAT'))
            if (!defined('_UE_NAME_FORMAT'))
                require_once($langRoot . $langtag . DS . 'language.php');
            //$this->_lang = $langname;
            $this->_lang = $langtag;
        } else {
            //if( defined('_VALID_MOS') && !defined('_UE_NAME_FORMAT'))
            if (!defined('_UE_NAME_FORMAT'))
                require_once( $langRoot . 'default_language' . DS . 'default_language.php');
        }
    }

    function _($text) {
        if (defined($text))
            return constant($text);
        return $text;
    }

    function GetUserName(&$row, $format) {
        switch ($format) {
            case 0 :
                return $row->username;
                break;
            case 1 :
                return $row->username . " (" . $row->name . ")";
                break;
            case 2 :
                return $row->name;
                break;
            case 3 :
                return $row->name . " (" . $row->username . ")";
                break;
        }
        return "";
    }

    function GetUserIcon(& $row) {
        if ($this->isJ15()) {
            switch ($row->gid) {
                case 18 :return $this->GetS4JImage($this->_params->get("cb_image_registered"), "");
                case 19 :return $this->GetS4JImage($this->_params->get("cb_image_author"), "");
                case 20 :return $this->GetS4JImage($this->_params->get("cb_image_editor"), "");
                case 21 :return $this->GetS4JImage($this->_params->get("cb_image_publisher"), "");
                case 23 :return $this->GetS4JImage($this->_params->get("cb_image_manager"), "");
                case 24 :return $this->GetS4JImage($this->_params->get("cb_image_administrator"), "");
                case 25 :return $this->GetS4JImage($this->_params->get("cb_image_superadministrator"), "");
            }
        } else {
            $j17gids = JFactory::getUser($row->id)->getAuthorisedGroups();
            if (in_array(8, $j17gids))
                return $this->GetS4JImage($this->_params->get("cb_image_superadministrator"), "");
            if (in_array(7, $j17gids))
                return $this->GetS4JImage($this->_params->get("cb_image_administrator"), "");
            if (in_array(6, $j17gids))
                return $this->GetS4JImage($this->_params->get("cb_image_manager"), "");
            if (in_array(5, $j17gids))
                return $this->GetS4JImage($this->_params->get("cb_image_publisher"), "");
            if (in_array(4, $j17gids))
                return $this->GetS4JImage($this->_params->get("cb_image_editor"), "");
            if (in_array(3, $j17gids))
                return $this->GetS4JImage($this->_params->get("cb_image_author"), "");
            if (in_array(2, $j17gids))
                return $this->GetS4JImage($this->_params->get("cb_image_registered"), "");
        }
        return $this->GetS4JImage($this->_params->get("cb_image_other"), "");
    }

    function GetAge(&$row, $format) {

        $result = "";
        if ($this->_cb_age > 0 || $this->_cb_age_tooltip > 0) {
            if ($row->s4jage > $this->_cb_age_minagetohide && $row->s4jage < $this->_cb_age_maxagetohide) {
                if (( date("d") == date("d", strtotime($row->s4jbirthday)) ) &&
                        ( date("m") == date("m", strtotime($row->s4jbirthday)) )) {
                    $s4jage = $row->s4jage;
                } else {
                    $s4jage = $row->s4jage + $this->_ageadd;
                }

                switch ($format) {
                    case 1:
                        $result = $this->s4jFormatDate($row->s4jbirthday, $this->_date_format, 0);
                        break;
                    case 2:
                        $result = "($s4jage)";
                        break;
                    case 3:
                        $result = $this->s4jFormatDate($row->s4jbirthday, $this->_date_format, 0) . " (" . $s4jage . ")";
                        break;
                }
                return $result;
            }
            return $result;
        }
        return $result;
    }

    function GetAvatar(&$row, $format, $imagetype, $size, $height, $width) {
        if ($format == 0)
            return "";

        $tn = ( $imagetype == 0 ) ? "tn" : "";

        $nophoto = "nophoto.jpg";
        $attribs = array();
        $attribs["border"] = 0;

        switch ($size) {
            case 1:
                $attribs["height"] = "$height";
                break;
            case 2:
                $attribs["width"] = "$width";
                break;
            case 3:
                $attribs["height"] = "$height";
                $attribs["width"] = "$width";
                break;
        }

        //show image if approved and avaliable
        if ($row->avatar != null && $row->avatarapproved == 1) {
            if ($this->IsGalleryAvatar($row->avatar))
                $imagesrc = "images/comprofiler/$row->avatar";
            else
                $imagesrc = "images/comprofiler/$row->avatar";
				//return "<img width=\"$width\"  height=\"$height\" class=\"zncbmimg\" src=\"".$imagesrc."\" border=\"0\"/>";
            return JHTML::image($imagesrc, '', $attribs);
        } else {
            if ($format == 1) { //show image always
                if ($row->avatar != null && $row->avatarapproved == 0)  //show pending image if avaliable
                    return JHTML::image("components/com_comprofiler/plugin/language/$this->_lang/images/" . $tn . "pendphoto.jpg", "", $attribs);
                else
                    return JHTML::image("components/com_comprofiler/plugin/language/$this->_lang/images/" . $tn . "nophoto.jpg", "", $attribs);
            }
        }

        return "";
    }

    function IsGalleryAvatar($file) {
        return eregi("gallery/", $file);
    }

    function GetAvatarDetails(&$row) {
        return $this->GetAvatar($row, $this->_cb_avatar, $this->_cb_avatar_image, $this->_cb_set_avatar_size, $this->_cb_avatar_height, $this->_cb_avatar_width);
    }

    function GetAvatarTooltip(&$row) {
        return $this->GetAvatar($row, $this->_cb_avatar_tooltip, $this->_cb_avatar_tooltip_image, $this->_cb_set_avatar_tooltip_size, $this->_cb_avatar_tooltip_height, $this->_cb_avatar_tooltip_width);
    }

    function GetGender(&$row, $format) {
        $result = "";
        switch ($format) {
            case 1:
                if ($row->s4jgender == $this->_cb_gender_male) {
                    $image = $this->_cb_gender_male_image;
                } elseif ($row->s4jgender == $this->_cb_gender_female) {
                    $image = $this->_cb_gender_female_image;
                } else {
                    $image = "other.gif";
                }
                $result = $this->GetS4JImage($image, "");
                break;
            case 2:
                $result = $row->s4jgender;
                break;
            case 3:
                if ($row->s4jgender == $this->_cb_gender_male) {
                    $image = $this->_cb_gender_male_image;
                } elseif ($row->s4jgender == $this->_cb_gender_female) {
                    $image = $this->_cb_gender_female_image;
                } else {
                    $image = "other.gif";
                }

                $result = $this->GetS4JImage($image, "") . " " . $row->s4jgender;
                break;
        }
        return $result;
    }

    function GetOnlineStatus(&$row, $bShow) {
        if (!$bShow)
            return "";

        if ($row->s4jonline != null) {
            return $this->GetS4JImage("online.gif", "online");
        } else {
            return $this->GetS4JImage("offline.gif", "offline");
        }
    }

    function GetChatStatus(&$row) {
        if ($this->_chat_system == 0)
            return "";

        if ($row->s4jchat != null) {
            return $this->GetS4JImage("chat.gif", "chat");
        }

        return "";
    }

    function GetCustomField($value, $show, $imagetype) {
        //Wenn leer, dann nichts
        if ($value == NULL || $value == '')
            return '';

        switch ($show) {
            case 1: return $this->_($value);
            case 2:
                if ($imagetype != -1) { //wenn image verfuegbar
                    return $this->GetS4JImage($imagetype, "") . " " . $this->_($value);
                }
                return $this->_($value);
        }
    }

    function GetPmsLink(&$row) {
        if ($this->_pms_link == 0)
            return "";

        switch ($this->_pms_link) {
            case 1:  //MyPMS OS
                $link = JROUTE::_("index.php?option=com_pms&amp;page=new&amp;id=" . urlencode($row->username));
                break;
            case 2:  //PMS Pro
                $link = JROUTE::_("index.php?option=com_mypms&amp;task=new&amp;to=" . urlencode($row->username));
                break;
            case 3:  //UddeIM 0.4 & 0.5
                $link = JROUTE::_("index.php?option=com_uddeim&amp;task=new&amp;recip=" . $row->id);
                break;
            case 4:  //PMS enhanced 2.x by Stefan Klingner
                $link = JROUTE::_("index.php?option=com_pms&amp;page=new&amp;id=" . urlencode($row->username));
                break;
            case 5:  //JIM 1.0.1
                $link = JROUTE::_("index.php?option=com_jim&amp;page=new&amp;id=" . urlencode($row->username));
                break;
            case 6:   //Missus
                $link = JROUTE::_("index.php?option=com_missus&amp;func=newmsg&amp;user=" . $row->id);
                break;
            case 7:  //Primezilla
                $pmsLink = JROUTE::_("index.php?option=com_primezilla&amp;page=write&amp;Itemid=0&amp;uid=" . $row->id);
                break;
            case 8: //Clexus
                $pmsLink = JROUTE::_("index.php?option=com_mypms&amp;task=compose&amp;to=" . $row->id);
                break;
        }

        $image = $this->GetS4JImage("pms.gif", ""); // TODO: add alt text
        $result = $this->link($link, $image);

        return $result;
    }

    function GetFields($tblalisas = "c", $tblalisasuser = "u") {
        $result = " ";

        //age
        if ($this->_cb_age > 0 || $this->_cb_age_tooltip > 0) {
            $field = $tblalisas . "." . $this->_cb_age_field;
            $result .= ", DATE_FORMAT($field,  '%Y-%m-%d %T') AS s4jbirthday"; //birthday field
            $result .= ", (YEAR(CURDATE()) - YEAR($field)) -(RIGHT(CURDATE(),5) < RIGHT($field,5)) AS s4jage"; //age field
        }

        //avatar
        if ($this->_cb_avatar > 0 || $this->_cb_avatar_tooltip > 0) {
            $result .= ", $tblalisas.avatar , $tblalisas.avatarapproved";
        }

        //gender
        if ($this->_cb_gender > 0 || $this->_cb_gender_tooltip > 0) {
            $result .= ", " . $tblalisas . "." . $this->_cb_gender_field . " AS s4jgender"; //gender field 
        }

        //hits
        if ($this->_show_hits > 0 || $this->_show_hits_tooltip > 0) {
            $result .= ", " . $tblalisas . ".hits";
        }

        //registration date
        if ($this->_show_register > 0 || $this->_show_register_tooltip > 0) {
            $result .= ", " . $tblalisasuser . ".registerDate";
        }
        //lastupdate date
        if ($this->_show_lastupdatedate > 0 || $this->_show_lastupdatedate_tooltip > 0) {
            $result .= ", " . $tblalisas . ".lastupdatedate";
        }

        //custom fields
        //custom field 1
        if ($this->_cb_show_custom1 > 0 || $this->_cb_show_custom1_tooltip > 0) {
            $result .= ", " . $tblalisas . "." . $this->_cb_custom1 . " as s4jcustom1";
        }

        //custom field 2
        if ($this->_cb_show_custom2 > 0 || $this->_cb_show_custom2_tooltip > 0) {
            $result .= ", " . $tblalisas . "." . $this->_cb_custom2 . " as s4jcustom2";
        }

        //custom field 3
        if ($this->_cb_show_custom3 > 0 || $this->_cb_show_custom3_tooltip > 0) {
            $result .= ", " . $tblalisas . "." . $this->_cb_custom3 . " as s4jcustom3";
        }

        //custom field 4
        if ($this->_cb_show_custom4 > 0 || $this->_cb_show_custom4_tooltip > 0) {
            $result .= ", " . $tblalisas . "." . $this->_cb_custom4 . " as s4jcustom4";
        }

        //custom field 5
        if ($this->_cb_show_custom5 > 0 || $this->_cb_show_custom5_tooltip > 0) {
            $result .= ", " . $tblalisas . "." . $this->_cb_custom5 . " as s4jcustom5";
        }

        //ChatSystem FlasChat
        if ($this->_chat_system == 1) {
            $result .= ", fc.userid as s4jchat";
        }

        if ($this->isJ15()) {
            //usertype Group id
            $result .= ", " . $tblalisasuser . ".gid";
        }

        return $result;
    }

    function GetTables($c = "c", $u = "u", $s = "s") {
        $result = " ";
        $result .= "( #__users $u INNER JOIN #__comprofiler $c ON $u.id = $c.user_id AND $u.block =0 AND $c.confirmed =1 AND $c.approved =1 )
					LEFT JOIN #__session $s ON s.userid = $u.id AND $s.guest = 0";

        if ($this->_chat_system == 1) //FlashChat
            $result .= "	LEFT JOIN #__fc_connections fc ON $u.id = fc.userid";

        return $result;
    }

    function GetFilter($tblalisas = "c", $tblalisasuser = "u", $filterprefix = " AND ") {
        // 0 = No, 1= Gender, 2 = Custom 1, 3 = Custom 2, 4 = Custom 3  
        $result = " $filterprefix $tblalisasuser.id NOT IN ($this->_exclude_users)";
        switch ($this->_cb_filter) {
            case 1:
                $result .= " AND $tblalisas.$this->_cb_gender_field = '$this->_cb_filter_value'";
                break;
            case 2:
                $result .= " AND $tblalisas.$this->_cb_custom1 = '$this->_cb_filter_value'";
                break;
            case 3:
                $result .= " AND $tblalisas.$this->_cb_custom2 = '$this->_cb_filter_value'";
                break;
            case 4:
                $result .= " AND $tblalisas.$this->_cb_custom3 = '$this->_cb_filter_value'";
                break;
            case 5:
                $result .= " AND $tblalisas.$this->_cb_custom4 = '$this->_cb_filter_value'";
                break;
            case 6:
                $result .= " AND $tblalisas.$this->_cb_custom5 = '$this->_cb_filter_value'";
                break;
        }

        //display only users with picture
        if ($this->_displayusers == 1) {
            $result .= " AND $tblalisas.avatar IS NOT NULL AND $tblalisas.avatarapproved = 1 ";
        }

        return $result;
    }

    function GetOrderByField($bCaption = true) {
        $result = "u.id";

        switch ($this->_list_order) {
            case 0:
                $result = " u.id ";
                break;
            case 1:
                $result = " u.id ";
                break;
            case 2:
                $result = " u.username ";
                break;
            case 3:
                $result = " u.username ";
                break;
            case 4:
                $result = " u.name ";
                break;
            case 5:
                $result = " u.name ";
                break;
            case 6:
                $result = " u.lastvisitDate ";
                break;
            case 7:
                $result = " u.lastvisitDate ";
                break;
            case 8:
                $result = " u.registerDate ";
                break;
            case 9:
                $result = " u.registerDate ";
                break;
            case 10:
                $result = " c.lastupdateDate ";
                break;
            case 11:
                $result = " c.lastupdateDate ";
                break;
        }

        if ($bCaption) {
            return $result . " AS sortfield ";
        }
        return $result;
    }

    function GetOrderBy($sortfield = 1) {
        if ($this->_list_order % 2 == 0) {
            return " $sortfield ASC";
        } else {
            return " $sortfield DESC";
        }
    }

    function GetUser(&$row) {
        $result = $this->_out_format;

        $profillink = JROUTE::_("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=" . $row->id . getCBprofileItemid( true, false ));
        $displayname = $this->GetUserName($row, $this->_format_name);

        //show tooltip if enable
        $tooltip = "";
        if ($this->_show_tooltip == 1) {
            $tooltip = $this->GetTooltip($row);
            $profile = $this->mosToolTip($tooltip, $displayname, "", "", $displayname, $profillink, 1); // TODO: noch nciht fertig
        } else {
            $profile = $this->link($profillink, $displayname);
        }
        //Username
        $result = str_replace("U%", $profile, $result);
        //Birtday & Age
        $result = str_replace("B%", $this->GetAge($row, $this->_cb_age), $result);

        //link to profile from avatar
        $avatarlink = "";
        if ($this->_cb_avatar > 0) {
            if ($this->_show_tooltip == 1) {
                $avatarlink = $this->mosToolTip($tooltip, $displayname, "", "", $this->GetAvatarDetails($row), $profillink, 1);
            } else {
                $avatarlink = $this->link($profillink, $this->GetAvatarDetails($row));
            }
        }
        $result = str_replace("A%", $avatarlink, $result);

        //Gender
        $result = str_replace("G%", $this->GetGender($row, $this->_cb_gender), $result);
        //Onlinestatus
        $result = str_replace("O%", $this->GetOnlineStatus($row, $this->_show_online > 0), $result);
        //Pms
        $result = str_replace("P%", $this->GetPmsLink($row), $result);
        //Usericon
        $result = str_replace("I%", $this->GetUserIcon($row), $result);
        //Chat
        $result = str_replace("C%", $this->GetChatStatus($row), $result);
        //hits
        $result = str_replace("H%", ($this->_show_hits > 0) ? ( $row->hits ) : (""), $result);
        //registration date
        $result = str_replace("R%", ($this->_show_register > 0) ? ( $this->FormatDate($row->registerDate) ) : (""), $result);
        //lastupdate date
        $result = str_replace("L%", ($this->_show_lastupdatedate > 0) ? ( $this->FormatDate($row->lastupdatedate) ) : (""), $result);
        //custom fields 1-3
        $result = str_replace("C1%", ($this->_cb_show_custom1 > 0) ? ( $this->GetCustomField($row->s4jcustom1, $this->_cb_show_custom1, $this->_cb_custom1_image) ) : (""), $result);
        $result = str_replace("C2%", ($this->_cb_show_custom2 > 0) ? ( $this->GetCustomField($row->s4jcustom2, $this->_cb_show_custom2, $this->_cb_custom2_image) ) : (""), $result);
        $result = str_replace("C3%", ($this->_cb_show_custom3 > 0) ? ( $this->GetCustomField($row->s4jcustom3, $this->_cb_show_custom3, $this->_cb_custom3_image) ) : (""), $result);
        $result = str_replace("C4%", ($this->_cb_show_custom4 > 0) ? ( $this->GetCustomField($row->s4jcustom4, $this->_cb_show_custom4, $this->_cb_custom4_image) ) : (""), $result);
        $result = str_replace("C5%", ($this->_cb_show_custom5 > 0) ? ( $this->GetCustomField($row->s4jcustom5, $this->_cb_show_custom5, $this->_cb_custom5_image) ) : (""), $result);

        return $result;
    }

    function CleanLayoutTags($sOutput) {
        $tags = array("U%", "B%", "C%", "I%", "G%", "U%", "O%", "H%", "P%", "R%", "L%", "C1%", "C2%", "C3%", "C4%", "C5%");
        foreach ($tags as $tag) {
            $sOutput = str_replace($tag, "", $sOutput);
        }
        return $sOutput;
    }

    function GetTooltip(&$row) {
        $result = $this->_out_format_tooltip;
        //Avatar
        $result = str_replace("A%", $this->GetAvatarTooltip($row), $result);
        //Username
        $result = str_replace("U%", $this->GetUserName($row, $this->_format_name_tooltip), $result);
        //Birthday & Age
        $result = str_replace("B%", $this->GetAge($row, $this->_cb_age_tooltip), $result);
        //Gender
        $result = str_replace("G%", $this->GetGender($row, $this->_cb_gender_tooltip), $result);
        //Onlinestatus
        $result = str_replace("O%", $this->GetOnlineStatus($row, $this->_show_online_tooltip > 0), $result);
        //Usericon
        $result = str_replace("I%", $this->GetUserIcon($row), $result);
        //Chat
        $result = str_replace("C%", $this->GetChatStatus($row), $result);
        //hits
        $result = str_replace("H%", ($this->_show_hits_tooltip > 0) ? ( $row->hits ) : (""), $result);
        //registration date
        $result = str_replace("R%", ($this->_show_register_tooltip > 0) ? ( $this->FormatDate($row->registerDate) ) : (""), $result);
        //lastupdate date
        $result = str_replace("L%", ($this->_show_lastupdatedate_tooltip > 0) ? ( $this->FormatDate($row->lastupdatedate) ) : (""), $result);
        //custom fields 1-3
        $result = str_replace("C1%", ($this->_cb_show_custom1_tooltip > 0) ? ( $this->GetCustomField($row->s4jcustom1, $this->_cb_show_custom1_tooltip, $this->_cb_custom1_image) ) : (""), $result);
        $result = str_replace("C2%", ($this->_cb_show_custom2_tooltip > 0) ? ( $this->GetCustomField($row->s4jcustom2, $this->_cb_show_custom2_tooltip, $this->_cb_custom2_image) ) : (""), $result);
        $result = str_replace("C3%", ($this->_cb_show_custom3_tooltip > 0) ? ( $this->GetCustomField($row->s4jcustom3, $this->_cb_show_custom3_tooltip, $this->_cb_custom3_image) ) : (""), $result);
        $result = str_replace("C4%", ($this->_cb_show_custom4_tooltip > 0) ? ( $this->GetCustomField($row->s4jcustom4, $this->_cb_show_custom4_tooltip, $this->_cb_custom4_image) ) : (""), $result);
        $result = str_replace("C5%", ($this->_cb_show_custom5_tooltip > 0) ? ( $this->GetCustomField($row->s4jcustom5, $this->_cb_show_custom5_tooltip, $this->_cb_custom5_image) ) : (""), $result);

        $result = $this->CleanLayoutTags($result);
        return $result;
    }

    function GetS4JImage($image, $alt = "") {
        $path = "";
        switch ($this->_s4jTyp) {
            case 1: $path = "";
                break; // TODO: Change
            case 2: $path = "modules";
                break;
            case 3: $path = "components/com_comprofiler/plugin/user";
                break;
            default:$path = "";
                break; // TODO: Change			
        }
        return JHTML::image("$path/" . $this->_owner . "/images/$image", $alt, "border='0'"); // IDEA: Iconpack
    }

    function link($url, $text, $attribs = null) {
        return '<a href="' . JROUTE::_($url) . '" ' . $attribs . '>' . $text . '</a>';
    }

    /**
     * Utility function to provide ToolTips
     * @param string ToolTip text
     * @param string Box title
     * @returns HTML code for ToolTip
     */
    function mosToolTip($tooltip, $title = '', $width = '', $image = 'tooltip.png', $text = '', $href = '#', $link = 1) {
        if ($width) {
            $width = ', WIDTH, \'' . $width . '\'';
        }
        if ($title) {
            $title = ', CAPTION, \'' . $title . '\'';
        }

        $style = 'style="text-decoration: none; color: #333;"';
        if ($href) {
            $style = '';
        } else {
            $href = '#';
        }
        $tooltip = str_replace('"', "'", $tooltip);
        $mousover = 'return overlib(unescape(\'' . addslashes($tooltip) . '\')' . $title . ', BELOW, RIGHT' . $width . ');';

        $tip = "<!-- Tooltip -->\n";
        if ($link) {
            $tip .= '<a href="' . $href . '" onmouseover="' . $mousover . '" onmouseout="return nd();" ' . $style . '>' . $text . '</a>';
        } else {
            $tip .= '<span onmouseover="' . $mousover . '" onmouseout="return nd();" ' . $style . '>' . $text . '</span>';
        }

        return $tip;
    }

    function FormatDate($date) {
        return $this->s4jFormatDate($date, $this->_date_format);
    }

    //TODO: Add Offset
    function s4jFormatDate($date, $format = "", $offset = NULL) {
        global $mosConfig_offset;
        $result = $date;

        if ($format == '') {
            // %Y-%m-%d %H:%M:%S
            $format = _DATE_FORMAT_LC;
        }
        /*
          if ( is_null($offset) ) {
          $offset = $mosConfig_offset;
          }
         */
        if ($date && preg_match('/([0-9]{4})-([0-9]{2})-([0-9]{2})[ ]([0-9]{2}):([0-9]{2}):([0-9]{2})/', $date, $regs)) {
            //$date =  $regs[4] . $regs[5]. $regs[6]. $regs[2]. $regs[3]. $regs[1] ;
            //$date = mktime( $regs[4], $regs[5], $regs[6], $regs[2], $regs[3], $regs[1] );
            //$date = $date > -1 ? strftime( $format, $date + ($offset*60*60) ) : '-';
            //list($year, $month, $day) = split('[/.-]', strtr($date, " ", "/"));
            $result = str_replace("%Y", $regs[1], $format);
            //$result = str_replace("%y", substr($$regs[1], 2), $result);
            $result = str_replace("%m", $regs[2], $result);
            $result = str_replace("%d", $regs[3], $result);
        }
        return $result;
    }

}

//addslashes
//htmlspecialchars
//highslide
//tooltip style params
//andere avatar einstellungen
?>
