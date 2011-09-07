<?php

require 'base.php';

class Custom extends driver_base {

    public function __construct($db) {
        //parent::__construct();
        $this->db = $db;
    }

//------------------------------------------------------------------------------
    public function getDBdata($session_id, $first) {
        if ($this->freiuse == "Psession" || $this->freiuse == "Sdatabase") {
            if ((isset($_SESSION[$this->ses_username]) === FALSE) || (isset($_SESSION[$this->ses_userid]) === FALSE)) {
                $_SESSION[$this->uid . 'is_guest'] = 1;
            } else if ($_SESSION[$this->ses_username] == $this->default_ses || $_SESSION[$this->ses_userid] == $this->default_ses) {
                $_SESSION[$this->uid . 'is_guest'] = 1;
            } else if (($_SESSION[$this->ses_username] != null && $_SESSION[$this->ses_userid] != null) && ($_SESSION[$this->ses_username] != '' && $_SESSION[$this->ses_userid] != '')) {
                $_SESSION[$this->uid . 'is_guest'] = 0;
            } else {
                $this->freichat_debug("Check the conditions in Custom driver");
            }
        }

        if ($this->freiuse == "Psession") {
            if ($_SESSION[$this->uid . 'is_guest'] == 0) {
                $_SESSION[$this->uid . 'usr_name'] = $_SESSION[$this->ses_username];
                $_SESSION[$this->uid . 'usr_ses_id'] = $_SESSION[$this->ses_userid];
            }
        } else if ($this->freiuse == "Sdatabase" || $this->freiuse == "Pdatabase") {
            if ($this->freiuse == "Pdatabase") {
                if ($session_id != null) {
                    $userID = strip_tags($session_id);
                    $_SESSION[$this->uid . 'is_guest'] = 0;
                } else {
                    $_SESSION[$this->uid . 'is_guest'] = 1;
                }
            } else if ($this->freiuse == "Sdatabase" && $_SESSION[$this->uid . 'is_guest'] == 0) {
                $userID = $_SESSION[$this->ses_userid];
            } else {
                $_SESSION[$this->uid . 'is_guest'] = 1;
            }
            if (($_SESSION[$this->uid . 'time'] < $this->online_time || isset($_SESSION[$this->uid . 'usr_name']) == false || $first == 'false') && $_SESSION[$this->uid . 'is_guest'] == 0) { //To consume less resources , now the query is made only once in 15 seconds
                $query = "SELECT DISTINCT " . $this->row_username . "," . $this->row_userid . "
                      FROM " . DBprefix . $this->usertable . "
                      WHERE " . $this->row_userid . "='" . $session_id . "'
                      LIMIT 1";

                $res_obj = $this->db->query($query);

                $res = $res_obj->fetchAll();

                if ($res == null) {
                    $this->freichat_debug("Incorrect Query :  " . $query . ", check parameters");
                }

                foreach ($res as $result) {
                    if (isset($result[$this->row_username])) { //To avoid undefined index error. Because empty results were shown sometimes
                        $_SESSION[$this->uid . 'usr_name'] = $result[$this->row_username];
                        $_SESSION[$this->uid . 'usr_ses_id'] = $result[$this->row_userid];
                    }
                }
            }
        } else {
            $this->freichat_debug("Wrong method defined!");
        }

        if ($_SESSION[$this->uid . 'is_guest'] == 1) {
            $_SESSION[$this->uid . 'usr_name'] = $_SESSION[$this->uid . 'gst_nam'];
            $_SESSION[$this->uid . 'usr_ses_id'] = $_SESSION[$this->uid . 'gst_ses_id'];
        }
    }

//------------------------------------------------------------------------------
    public function getList() {

        $user_list = null;

        if ($this->show_name == 'guest') {
            $user_list = $this->get_guests();
        } else if ($this->show_name == 'user') {
            $user_list = $this->get_users();
        } else {
            $this->freichat_debug('USER parameters for show_name are wrong.');
        }
        return $user_list;
    }

//------------------------------------------------------------------------------ 
    public function load_driver() {

        define("DBprefix", $this->db_prefix);
        $session_id = $this->options['id'];
        $custom_mesg = $this->options['custom_mesg'];
        $first = $this->options['first'];

// 1. Connect The DB
//      DONE
// 2. Basic Build the blocks        
        $this->createFreiChatXsession();
// 3. Get Required Data from client DB
        $this->getDBdata($session_id, $first);
// 4. Insert user data in FreiChatX Table Or Recreate Him if necessary
        $this->createFreiChatXdb();
// 5. Update user data in FreiChatX Table
        $this->updateFreiChatXdb($first, $custom_mesg);
// 6. Delete user data in FreiChatX Table
        $this->deleteFreiChatXdb();
// 7. Get Appropriate UserData from FreiChatX Table
        if ($this->usr_list_wanted == true) {
            $result = $this->getList();
            return $result;
        }
// 8. Send The final Data back
        return true;
    }

}