<?php
/**
 * @Copyright
 * @package    	EasyCalcCheck Plus
 * @author      Viktor Vogel {@link http://www.kubik-rubik.de}
 * @version     1.5-14-1
 * @date        Created on 29-Dec-2011
 * @link        Project Site {@link http://joomla-extensions.kubik-rubik.de/ecc-easycalccheck-plus}
 *
 *  @license GNU/GPL
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
// Kein direkter Zugriff
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

/**
 * EasyCalcCheck PLUS
 * System Plugin
 *
 * @package     EasyCalcCheckPlus
 * @subpackage	Plugin
 */
class plgSystemEasyCalcCheckPlus extends JPlugin
{
    /**
     * Constructor
     *
     * @access      protected
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     */
    function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);

        // Sprache aus Administrator einlesen
        $this->loadLanguage('', JPATH_ADMINISTRATOR);
    }

    /**
     * Formularfelder suchen und Schutzmechanismen ansetzen
     *
     * @return void
     */
    public function onAfterRender()
    {
        // Nur im Frontend
        $app = JFactory::getApplication();

        if($app->isAdmin())
        {
            return;
        }

        if($this->params->get('onlyguests'))
        {
            $user = JFactory::getUser();
            if(!$user->guest)
            {
                return;
            }
        }

        $option = JRequest::getWord('option');
        $view = JRequest::getWord('view');
        $page = JRequest::getCmd('page');
        $task = JRequest::getWord('task');
        $layout = JRequest::getWord('layout');
        $func = JRequest::getWord('func');
        $do = JRequest::getWord('do');

        switch($option)
        {
            // ALFContact - getestet mit Version 1.9.3 - 1.5-9
            case 'com_alfcontact':
                if(!$this->params->get('alfcontact'))
                {
                    return;
                }
                $_SESSION["alfcontact"] = 0;
                break;

            // Alpharegistration - getestet mit Version 2.0.12 - 1.5-9
            case 'com_alpharegistration':
                if(!$this->params->get('alpharegistration'))
                {
                    return;
                }
                if($view != 'register')
                {
                    return;
                };
                break;

            // CBE - getestet mit Version 1.4.12 - 1.5-9
            case 'com_cbe':
                if(!$this->params->get('cbe'))
                {
                    return;
                }
                if($task != 'registers')
                {
                    return;
                };
                break;

            // Community Builder - getestet mit Version 1.2.3 - 1.5-8
            case 'com_comprofiler':
                if(!$this->params->get('communitybuilder'))
                {
                    return;
                }
                if($task != 'registers' AND $task != 'lostpassword')
                {
                    return;
                };
                break;

            case 'com_contact':
                if(!$this->params->get('contact'))
                {
                    return;
                }
                if($view != 'contact')
                {
                    return;
                };
                break;

            // JomSocial - getestet mit Version 2.0.2 - 1.5-9
            case 'com_community':
                if(!$this->params->get('jomsocial'))
                {
                    return;
                }
                if($view != 'register')
                {
                    return;
                };
                if($task == 'registerProfile' OR $task == 'registerAvatar' OR $task == 'registerSucess')
                {
                    return;
                }
                break;

            // DFContact - getestet mit Version 1.5.12 - 1.5-9
            case 'com_dfcontact':
                if(!$this->params->get('dfcontact'))
                {
                    return;
                }
                $_SESSION["dfcontact"] = 0;
                break;

            // Easybook Reloaded - getestet mit Version 2.0.8.1 - 1.5-12
            case 'com_easybookreloaded':
                if(!$this->params->get('easybookreloaded'))
                {
                    return;
                }
                if($task != 'add')
                {
                    return;
                };
                $_SESSION["easybookreloaded"] = 0;
                break;

            // FlexiContact - getestet mit Version 3.13 - 1.5-9
            case 'com_flexicontact':
                if(!$this->params->get('flexicontact'))
                {
                    return;
                }
                $_SESSION["flexicontact"] = 0;
                break;

            // Kunena Forum - getestet mit Version 1.6.1 - 1.5-11
            case 'com_kunena':
                if(!$this->params->get('kunena'))
                {
                    return;
                }
                if($func != 'post' AND $func != 'view')
                {
                    return;
                };
                $user = JFactory::getUser(); // Nur bei Gästen
                if(!$user->guest)
                {
                    return;
                }
                break;

            // Phoca Guestbook - getestet mit Version 1.4.3 - 1.5-9
            case 'com_phocaguestbook':
                if(!$this->params->get('phocaguestbook'))
                {
                    return;
                }
                if($view != 'phocaguestbook')
                {
                    return;
                };
                break;

            // QContacts - getestet mit Version 1.0.6 - 1.5-8
            case 'com_qcontacts':
                if(!$this->params->get('qcontacts'))
                {
                    return;
                }
                if($view != 'contact')
                {
                    return;
                };
                break;

            case 'com_user':
                if(!$this->params->get('user_reg'))
                {
                    return;
                }
                if($view != 'register' AND $view != 'reset' AND $view != 'remind')
                {
                    return;
                };
                if($layout == 'confirm' OR $layout == 'complete')
                {
                    return;
                };
                break;

            // Virtuemart Registrierung - getestet mit Version 1.1.6 - 1.5-3
            case 'com_virtuemart':
                if(!$this->params->get('virtuemart'))
                {
                    return;
                }
                if(($page != 'shop.registration') AND ($page != 'checkout.index') AND ($page != 'shop.ask'))
                {
                    return;
                };
                break;

            // Job Board - getestet mit Version 1.5.0d_i - 1.5-13
            case 'com_jobboard':
                if(!$this->params->get('jobboard'))
                {
                    return;
                }
                if(($view != 'share') AND ($view != 'apply') AND ($view != 'unsolicited'))
                {
                    return;
                };
                break;

            default:
                return;
                break;
        }

        $this->loadLanguage('', JPATH_ADMINISTRATOR); // Google Translator Fix
        $body = JResponse::getBody(); // Inhalt der Ausgabe einlesen
        // Clean Cache - 1.5.10
        $cache = JFactory::getCache($option);
        // Global Cache
        $cache->clean();
        // System Plugin - Page
        $url = JURI::getInstance(JURI::getInstance()->toString());
        $query = '/index.php?'.$url->getQuery();
        $cache->remove(md5($query), 'page');

        // Formular mit eingegeben Werten bei Falscheingabe füllen
        if($this->params->get('autofill_values'))
        {
            require_once(dirname(__FILE__).DS.'easycalccheckplus'.DS.'autofill.php');
        }

        // Verstecktes Feld gewählt
        if($this->params->get('type_hidden'))
        {
            // Zufallsvariable für Anzeige des versteckten Feldes - 1.5-2
            $lsrandom = mt_rand(1, 5);
            // Zeilenbreite für Verschleierung - 1.5-4
            $input_size = 30;
            // Bei Nutzung von Layout Overrides, könnte die Ausgabe variieren. Suchstring sollte ggf. angepasst werden!
            // Bei BEEZ-Template bitte Option BEEZ aktivieren. 1.5-4
            if($option == 'com_contact' AND $view == 'contact')
            {
                if($lsrandom == 1)
                {
                    $searchString = '<label for="contact_name">';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<label id="contact_emailmsg" for="contact_email">';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<label for="contact_subject">';
                }
                elseif($lsrandom == 4)
                {
                    if(!$this->params->get('beez'))
                    {
                        $searchString = '<label id="contact_textmsg" for="contact_text">';
                    }
                    elseif($this->params->get('beez'))
                    {
                        $searchString = '<label id="contact_textmsg" for="contact_text" class="textarea">';
                    }
                }
                elseif($lsrandom == 5)
                {
                    if(!$this->params->get('beez'))
                    {
                        $searchString = '<label for="contact_email_copy">';
                    }
                    elseif($this->params->get('beez'))
                    {
                        $searchString = '<label for="contact_email_copy" class="copy">';
                    }
                }
            }
            elseif($option == 'com_qcontacts' AND $view == 'contact')
            {
                if($lsrandom == 1)
                {
                    $searchString = '<label for="contact_name" class="required">';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<label for="contact_email" class="required">';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<label for="contact_subject">';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<label for="contact_text" class="required">';
                }
                elseif($lsrandom == 5)
                {
                    $searchString = '<label class="chkbox" for="contact_email_copy">';
                }
            }
            elseif($option == 'com_user' AND $view == 'register')
            {
                // Bei Registrierung Zeilenbreite von 40 - 1.5-4
                $input_size = 40;
                if($lsrandom == 1)
                {
                    $searchString = '<label id="namemsg" for="name">';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<label id="usernamemsg" for="username">';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<label id="emailmsg" for="email">';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<label id="pwmsg" for="password">';
                }
                elseif($lsrandom == 5)
                {
                    $searchString = '<label id="pw2msg" for="password2">';
                }
            }
            elseif($option == 'com_user' AND ($view == 'reset' OR $view == 'remind'))
            {
                // Bei Registrierung Zeilenbreite von 40 - 1.5-4
                $input_size = 40;
                $pattern = "@(<label.+</label>)@";

                if(preg_match($pattern, $body, $matches))
                {
                    $searchString = $matches[0];
                }
            }
            elseif($option == 'com_comprofiler' AND $task == 'registers')
            {
                if($lsrandom == 1)
                {
                    $searchString = '<label for="name"';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<label for="username"';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<label for="email"';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<label for="password"';
                }
                elseif($lsrandom == 5)
                {
                    $searchString = '<label for="password__verify"';
                }
            }
            elseif($option == 'com_comprofiler' AND $task == 'lostpassword')
            {
                $searchString = '<label for="checkemail">';
            }
            elseif($option == 'com_virtuemart') // Virtuemart Registrierung - 1.5-3
            {
                if($page == 'shop.registration' OR $page == 'checkout.index')
                {
                    if($lsrandom == 1)
                    {
                        $searchString = '<label for="email_field">';
                    }
                    elseif($lsrandom == 2)
                    {
                        $searchString = '<label for="username_field">';
                    }
                    elseif($lsrandom == 3)
                    {
                        $searchString = '<label for="password_field">';
                    }
                    elseif($lsrandom == 4)
                    {
                        $searchString = '<label for="password2_field">';
                    }
                    elseif($lsrandom == 5)
                    { // Hier nicht label von agreed_field, da sonst aufgrund von JS das versteckte Feld nicht funktioniert
                        $searchString = '<input type="checkbox" id="agreed_field" name="agreed" value="1" class="inputbox" />';
                    }
                }
                elseif($page == 'shop.ask') // Virtuemart - Ask Page - 1.5-8
                {
                    $lsrandom = mt_rand(1, 3);

                    if($lsrandom == 1)
                    {
                        $searchString = '<label for="contact_name">';
                    }
                    elseif($lsrandom == 2)
                    {
                        $searchString = '<label for="contact_mail">';
                    }
                    elseif($lsrandom == 3)
                    {
                        $searchString = '<label for="contact_text">';
                    }
                }
            }
            elseif($option == 'com_alpharegistration' AND $view == 'register') // Alpharegistration - 1.5-9
            {
                if($lsrandom == 1)
                {
                    $searchString = '<label for="name"';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<label for="username"';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<label for="email"';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<label for="password"';
                }
                elseif($lsrandom == 5)
                {
                    $searchString = '<label for="password2"';
                }
            }
            elseif($option == 'com_community' AND $view == 'register' AND $task != 'activation') // JomSocial - 1.5-9
            {
                if($lsrandom == 1)
                {
                    $searchString = '<label id="jsnamemsg" for="jsname" class="label">';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<label id="jsusernamemsg" for="jsusername" class="label">';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<label id="jsemailmsg" for="jsemail" class="label">';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<label id="pwmsg" for="jspassword" class="label">';
                }
                elseif($lsrandom == 5)
                {
                    $searchString = '<label id="pw2msg" for="jspassword2" class="label">';
                }
            }
            elseif($option == 'com_community' AND $task == 'activation') // JomSocial Activation - 1.5-9
            {
                $searchString = '<label id="jsemailmsg" for="jsemail">';
            }
            elseif($option == 'com_dfcontact') // DFContact - 1.5-9
            {
                $lsrandom = mt_rand(1, 3);

                if($lsrandom == 1)
                {
                    $searchString = '<label for="dfContactField-name">';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<label for="dfContactField-email">';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<textarea name="message" id="dfContactField-message"';
                }
            }
            elseif($option == 'com_phocaguestbook') // Phoca Guestbook - 1.5-9
            {
                $lsrandom = mt_rand(1, 4);

                if($lsrandom == 1)
                {
                    $searchString = '<input type="text" name="title"';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<input type="text" name="pgusername"';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<input type="text" name="email"';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<textarea id="pgbcontent" name="pgbcontent"';
                }
            }
            elseif($option == 'com_cbe') // CBE - 1.5-9
            {
                $lsrandom = mt_rand(1, 4);

                if($lsrandom == 1)
                {
                    $searchString = '<input type="text" name="username" id="usrname"';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<input type="text" name="email"';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<input class="inputbox" type="password" name="password"';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<input class="inputbox" type="password" name="password2"';
                }
            }
            elseif($option == 'com_alfcontact') // AlfaContact - 1.5-9
            {
                $lsrandom = mt_rand(1, 4);

                if($lsrandom == 1)
                {
                    $searchString = '<input class="text_area" name="name"';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<input class="text_area" name="email"';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<input class="text_area" name="subject"';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<textarea class="text_area" name="message"';
                }
            }
            elseif($option == 'com_flexicontact') // Flexi Contact - 1.5-9
            {
                $lsrandom = mt_rand(1, 4);

                if($lsrandom == 1)
                {
                    $searchString = '<input type="text" name="fromName"';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<input type="text" name="fromAddress"';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<input type="text" name="subject"';
                }
                elseif($lsrandom == 4)
                {
                    $searchString = '<textarea name="area_data"';
                }
            }
            elseif($option == 'com_kunena' AND $func == 'post') // Kunena Forum - 1.5-11
            {
                $lsrandom = mt_rand(1, 3);

                if($lsrandom == 1)
                {
                    $searchString = '<input type="text" id="kauthorname" name="authorname"';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<input type="text" class="kinputbox postinput required" name="subject"';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<textarea class="ktxtarea required" name="message"';
                }
            }
            elseif($option == 'com_easybookreloaded') // Easybook Reloaded - 1.5-12
            {
                $lsrandom = mt_rand(1, 3);

                if($lsrandom == 1)
                {
                    $searchString = '<input type=\'text\' name=\'gbname\' id=\'gbname\'';
                }
                elseif($lsrandom == 2)
                {
                    $searchString = '<input type=\'text\' name=\'gbmail\' id=\'gbmail\'';
                }
                elseif($lsrandom == 3)
                {
                    $searchString = '<textarea name=\'gbtext\' id=\'gbtext\'';
                }
            }
            elseif($option == 'com_jobboard') // Job Board - 1.5-13
            {
                if($view == 'share')
                {
                    $lsrandom = mt_rand(1, 4);

                    if($lsrandom == 1)
                    {
                        $searchString = '<label for="sender_email">';
                    }
                    elseif($lsrandom == 2)
                    {
                        $searchString = '<label for="sender_name">';
                    }
                    elseif($lsrandom == 3)
                    {
                        $searchString = '<label for="rec_emails">';
                    }
                    elseif($lsrandom == 4)
                    {
                        $searchString = '<label for="personal_message">';
                    }
                }
                elseif($view == 'apply' OR $view == 'unsolicited')
                {
                    $lsrandom = mt_rand(1, 4);

                    if($lsrandom == 1)
                    {
                        $searchString = '<label for="first_name">';
                    }
                    elseif($lsrandom == 2)
                    {
                        $searchString = '<label for="last_name">';
                    }
                    elseif($lsrandom == 3)
                    {
                        $searchString = '<label for="email">';
                    }
                    elseif($lsrandom == 4)
                    {
                        $searchString = '<label for="tel">';
                    }
                }
            }

            // Zufallsvariable generieren
            $_SESSION["hidden_field"] = $this->random();
            $_SESSION["hidden_field_label"] = $this->random();

            if($this->params->get('jobboard') AND $option == "com_jobboard")
            {
                $addString = '<label for="'.$_SESSION["hidden_field_label"].'" style="padding-left: 0px !important;"></label><input type="text" id="'.$_SESSION["hidden_field_label"].'" name="'.$_SESSION["hidden_field"].'" size="'.$input_size.'" class="inputbox '.$_SESSION["hidden_class"].'" />';
            }
            else
            {
                // Label-Tag, um Verschleierung zu vergrößern - 1.5-4
                if(!$this->params->get('beez'))
                {
                    $addString = '<label for="'.$_SESSION["hidden_field_label"].'"></label><input type="text" id="'.$_SESSION["hidden_field_label"].'" name="'.$_SESSION["hidden_field"].'" size="'.$input_size.'" class="inputbox '.$_SESSION["hidden_class"].'" />';
                }
                elseif($this->params->get('beez'))
                {
                    $addString = '<label for="'.$_SESSION["hidden_field_label"].'" class="'.$_SESSION["hidden_class"].'"></label><input type="text" id="'.$_SESSION["hidden_field_label"].'" name="'.$_SESSION["hidden_field"].'" size="'.$input_size.'" class="inputbox '.$_SESSION["hidden_class"].'" />';
                }
            }

            if(isset($searchString))
            {
                $body = str_replace($searchString, $addString.$searchString, $body);
                JResponse::setBody($body);
            }
        }

        // Ersetzung der Joomla-Inputfelder 1.5-4 - optional 1.5-5
        // Nur in Joomla-Felder und Virtuemart
        if($this->params->get('encode'))
        {
            if($option == 'com_contact' OR $option == 'com_user' OR $option == 'com_virtuemart')
            {
                $session = JFactory::getSession();

                // Zufallsvariablen setzen
                $random = $this->random();
                $random2 = $this->random();
                $random3 = $this->random();
                $random4 = $this->random();
                $random5 = $this->random();

                if(($option == 'com_contact'))
                {
                    $session->set('name', $random, 'easycalccheck');
                    $session->set('email', $random2, 'easycalccheck');
                    $session->set('subject', $random3, 'easycalccheck');
                    $session->set('text', $random4, 'easycalccheck');
                    $session->set('email_copy', $random5, 'easycalccheck');

                    $name_old = array('name="name"', 'name="email"', 'name="subject"', 'name="text"', 'name="email_copy"');
                    $name_new = array('name="'.$random.'"', 'name="'.$random2.'"', 'name="'.$random3.'"', 'name="'.$random4.'"', 'name="'.$random5.'"');

                    if(!$this->params->get('beez'))
                    {
                        if($this->params->get('encode') == 2)
                        {
                            $id_old = array('class="inputbox', 'contact_email_copy', 'contact_email', 'contact_emailmsg', 'contact_name', 'contact_subject', 'contact_textmsg', 'contact_text');
                            $id_new = array('class="inputbox '.$this->random().'', $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random());
                        }
                        else
                        {
                            $id_old = array('class="inputbox', 'contact_email_copy', 'contact_email', 'contact_emailmsg', 'contact_name', 'contact_subject', 'contact_textmsg', 'contact_text', 'required validate-email', 'required');
                            $id_new = array('class="inputbox '.$this->random().'', $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random());
                        }
                    }
                    elseif($this->params->get('beez'))
                    {
                        if($this->params->get('encode') == 2)
                        {
                            $id_old = array('contact_email_copy', 'for="contact_email"', 'id="contact_email"', 'contact_emailmsg', 'contact_name', 'contact_subject', 'contact_textmsg', 'class="inputbox"');
                            $id_new = array($this->random(), 'for="'.$ce = $this->random().'"', 'id="'.$ce.'"', $this->random(), $this->random(), $this->random(), $this->random(), 'class="inputbox '.$this->random().'"');
                        }
                        else
                        {
                            $id_old = array('contact_email_copy', 'for="contact_email"', 'id="contact_email"', 'contact_emailmsg', 'contact_name', 'contact_subject', 'contact_textmsg', 'required validate-email', 'required', 'class="inputbox"');
                            $id_new = array($this->random(), 'for="'.$this->random().'"', 'id="'.$this->random().'"', $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), 'class="inputbox '.$this->random().'"');
                        }
                    }
                    $body = str_replace($name_old, $name_new, $body);
                    $body = str_replace($id_old, $id_new, $body);
                }
                elseif($option == 'com_user' AND $view == 'register')
                {
                    $session->set('name', $random, 'easycalccheck');
                    $session->set('email', $random2, 'easycalccheck');
                    $session->set('username', $random3, 'easycalccheck');
                    $session->set('password', $random4, 'easycalccheck');
                    $session->set('password2', $random5, 'easycalccheck');

                    $name_old = array('name="name"', 'name="email"', 'name="username"', 'name="password"', 'name="password2"');
                    $name_new = array('name="'.$random.'"', 'name="'.$random2.'"', 'name="'.$random3.'"', 'name="'.$random4.'"', 'name="'.$random5.'"');

                    if($this->params->get('encode') == 2)
                    {
                        $id_old = array('namemsg', 'usernamemsg', 'emailmsg', 'pwmsg', 'pw2msg', '"email"', 'for="password"', 'id="password"', '"password2"', '"name"', '"username"', 'class="inputbox required"');
                        $id_new = array($this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), 'for="'.$pw_for = $this->random().'"', 'id="'.$pw_for.'"', $this->random(), $this->random(), $this->random(), 'class="inputbox '.$this->random().'"');
                    }
                    else
                    {
                        $id_old = array('namemsg', 'usernamemsg', 'emailmsg', 'pwmsg', 'pw2msg', '"email"', 'for="password"', 'id="password"', '"password2"', '"name"', '"username"', 'required validate-username', 'required validate-email', 'required validate-password', 'required validate-passverify', 'class="inputbox required"');
                        $id_new = array($this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), 'for="'.$pw_for = $this->random().'"', 'id="'.$pw_for.'"', $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), $this->random(), 'class="inputbox '.$this->random().'"');
                    }
                    $body = str_replace($name_old, $name_new, $body);
                    $body = str_replace($id_old, $id_new, $body);
                }
                elseif($this->params->get('encode_virtuemart') AND $option == 'com_virtuemart')
                {
                    $session->set('email', $random, 'easycalccheck');
                    $session->set('username', $random2, 'easycalccheck');
                    $session->set('password', $random3, 'easycalccheck');
                    $session->set('password2', $random4, 'easycalccheck');
                    $session->set('agreed', $random5, 'easycalccheck');

                    $name_old = array('name="email"', 'id="username_field" name="username"', 'name="password"', 'name="password2"', 'name="agreed"');
                    $name_new = array('name="'.$random.'"', 'id="username_field" name="'.$random2.'"', 'name="'.$random3.'"', 'name="'.$random4.'"', 'name="'.$random5.'"');

                    $id_old = array('email_field', 'username_field', 'password_field', 'password2_field', 'agreed_field', 'class="inputbox"');
                    $id_new = array($this->random(), $this->random(), $this->random(), $this->random(), $this->random(), 'class="inputbox '.$this->random().'"');

                    $body = str_replace($name_old, $name_new, $body);
                    $body = str_replace($id_old, $id_new, $body);
                }
                JResponse::setBody($body);
            }
        }

        // Rechenaufgabe aktiviert
        if($this->params->get('type_calc') OR ($this->params->get('recaptcha')) OR ($this->params->get('question')))
        {
            // Virtuemart Registrierung - 1.5-3
            if($option == 'com_virtuemart')
            {
                if($page == 'shop.registration' OR $page == 'checkout.index')
                {
                    if($this->params->get('artisteer'))
                    {
                        $pattern = '@(<span class="art-button-wrapper"><span class="art-button-l"> </span><span class="art-button-r"> </span><input type="submit" value=".+" class=".+" onclick="return\(.?submitregistration\(\)\);" />)@';
                    }
                    else
                    {
                        // Button über reguläre Ausdrücke finden - 1.5-8
                        $pattern = '@(<input type="submit" value=".+" class="button" onclick="return\(.?submitregistration\(\)\);" />)@';
                    }
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
                elseif($page == 'shop.ask')
                {
                    if($this->params->get('artisteer'))
                    {
                        $pattern = '@<form[^>]*id="emailForm".*>.*(<span class="art-button-wrapper">.*<input type="button" name="send" value=".+" class=".*" onclick="validateEnquiryForm\(\)" />).*</form>@isU';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[1];
                        }
                    }
                    else
                    {
                        $pattern = '@(<input type="button" name="send" value=".+" class="button" onclick="validateEnquiryForm\(\)" />)@';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[0];
                        }
                    }
                }
            }
            elseif($option == 'com_comprofiler')
            {
                if($task == 'registers')
                {
                    if($this->params->get('artisteer'))
                    {
                        $pattern = '@<form[^>]*id="cbcheckedadminForm".*>.*(<span class="art-button-wrapper">.*<input type="submit" value=".+" class=".*" />).*</form>@isU';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[1];
                        }
                    }
                    else
                    {
                        $pattern = '@(<input type="submit" value=".+" class="button" />)@';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[0];
                        }
                    }
                }
                elseif($task == 'lostpassword')
                {
                    if($this->params->get('artisteer'))
                    {
                        $pattern = '@<form[^>]*id="adminForm".*>.*(<span class="art-button-wrapper">.*<input type="submit" class=".*" id="cbsendnewuspass" value=".+" />).*</form>@isU';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[1];
                        }
                    }
                    else
                    {
                        $pattern = '@(<input type="submit" class="button" id="cbsendnewuspass" value=".+" />)@';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[0];
                        }
                    }
                }
            }
            elseif($option == 'com_qcontacts')
            {
                if($view == 'contact')
                {
                    $pattern = '@(<input type="submit" name="submit" class="contact-button" value=".+" />)@';
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
            }
            elseif($option == 'com_alpharegistration')
            {
                if($view == 'register')
                {
                    if($this->params->get('artisteer'))
                    {
                        $pattern = '@<form[^>]*id="josFormARG".*>.*(<span class="art-button-wrapper">.*<button.*type="submit".*>).*</form>@isU';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[1];
                        }
                    }
                    else
                    {
                        $pattern = '@(<button id="submitter" type="submit")@';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[0];
                        }
                    }
                }
            }
            elseif($option == 'com_cbe')
            {
                if($task == "registers")
                {
                    $pattern = '@(<input type="button" value=".+" class="button" onclick="submitbutton_cbe\(\)" id="submit_btn" />)@';
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
            }
            elseif($option == 'com_community')
            {
                if($view == 'register' AND $task != "registerProfile")
                {
                    if($this->params->get('artisteer'))
                    {
                        $pattern = '@<form[^>]*id="jomsForm".*>.*(<span class="art-button-wrapper">.*<input class=".*" type="submit" id="btnSubmit" value=".+").*</form>@isU';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[1];
                        }
                    }
                    else
                    {
                        $pattern = '@(<input class="button validateSubmit" type="submit" id="btnSubmit" value=".+")@';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[0];
                        }
                    }
                }
            }
            elseif($option == 'com_phocaguestbook')
            {
                if($view == 'phocaguestbook')
                {
                    $pattern = '@(<input type="submit" name="save" value=".+" />)@';
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
            }
            elseif($option == 'com_dfcontact')
            {
                if($this->params->get('artisteer'))
                {
                    $pattern = '@<form[^>]*id="dfContactForm".*>.*(<span class="art-button-wrapper">.*<input type="submit" value=".+" class=".*>).*</form>@isU';
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[1];
                    }
                }
                else
                {
                    $pattern = '@(<input type="submit" value=".+" class="button" />)@';
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
            }
            elseif($option == 'com_alfcontact')
            {
                $pattern = '@(<input type="submit" value=".+" class="button" id="button" />)@';
                if(preg_match($pattern, $body, $matches))
                {
                    $searchString = $matches[0];
                }
            }
            elseif($option == 'com_flexicontact')
            {
                $pattern = '@(<input type="submit" name="submit1" value=".+" />)@';
                if(preg_match($pattern, $body, $matches))
                {
                    $searchString = $matches[0];
                }
            }
            elseif($option == 'com_kunena')
            {
                if($func == 'post' AND ($do == 'reply' OR $do == 'quote' OR $do == 'new'))
                {
                    $pattern = '@(<input type="submit" name="ksubmit" class="kbutton".+value=".+".+title=".+" />)@s';

                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
            }
            elseif($option == 'com_easybookreloaded')
            {
                if($task == 'add')
                {
                    $pattern = '@(<p id="easysubmit">)@s';

                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
            }
            elseif($option == 'com_jobboard')
            {
                if($view == 'share')
                {
                    $pattern = '@(<input name="sendsubmit" value=".+" class="button" type="submit">)@';
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
                elseif($view == 'apply' OR $view == 'unsolicited')
                {
                    $pattern = '@(<input id="applsubmt" name="submit_application" value=".+" class="button" type=".ubmit">)@';
                    if(preg_match($pattern, $body, $matches))
                    {
                        $searchString = $matches[0];
                    }
                }
            }
            else
            {
                if($view == 'reset' OR $view == 'remind') // User - Passwort oder Benutzernamen vergessen
                {
                    if($this->params->get('artisteer'))
                    {
                        $pattern = '@<form[^>]*class="josForm.*>.*(<span class="art-button-wrapper">.*<button.*type="submit".*>).*</form>@isU';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[1];
                        }
                    }
                    else
                    {
                        $pattern = '@(<button type="submit" class="validate">)@';
                        if(preg_match($pattern, $body, $matches))
                        {
                            $searchString = $matches[0];
                        }
                        else
                        {
                            $pattern = '@<form[^>]*class="josForm.*>.*(<[^>]*type="submit".*>).*</form>@isU';
                            if(preg_match($pattern, $body, $matches))
                            {
                                $searchString = $matches[1];
                            }
                        }
                    }
                }
                else
                {
                    if($option == 'com_contact')
                    {
                        if($this->params->get('artisteer'))
                        {
                            $pattern = '@<form[^>]*id="emailForm".*>.*(<span class="art-button-wrapper">.*<button.*type="submit".*>).*</form>@isU';
                            if(preg_match($pattern, $body, $matches))
                            {
                                $searchString = $matches[1];
                            }
                        }
                        else
                        {
                            if($this->params->get('rockettheme'))
                            {
                                $pattern = '@(<div class="readon">)@';
                            }
                            else
                            {
                                $pattern = '@(<button class="button validate" type="submit">)@';
                            }
                            if(preg_match($pattern, $body, $matches))
                            {
                                $searchString = $matches[0];
                            }
                            else
                            {
                                $pattern = '@<form[^>]*id="emailForm".*>.*(<[^>]*type="submit".*>).*</form>@isU';
                                if(preg_match($pattern, $body, $matches))
                                {
                                    $searchString = $matches[1];
                                }
                            }
                        }
                    }
                    elseif($option == 'com_user')
                    {
                        if($this->params->get('artisteer'))
                        {
                            $pattern = '@<form[^>]*id="josForm".*>.*(<span class="art-button-wrapper">.*<button.*type="submit".*>).*</form>@isU';
                            if(preg_match($pattern, $body, $matches))
                            {
                                $searchString = $matches[1];
                            }
                        }
                        else
                        {
                            if($this->params->get('rockettheme'))
                            {
                                $pattern = '@(<div class="readon">)@';
                            }
                            else
                            {
                                $pattern = '@(<button class="button validate" type="submit">)@';
                            }
                            if(preg_match($pattern, $body, $matches))
                            {
                                $searchString = $matches[0];
                            }
                            else
                            {
                                $pattern = '@<form[^>]*id="josForm".*>.*(<[^>]*type="submit".*>).*</form>@isU';
                                if(preg_match($pattern, $body, $matches))
                                {
                                    $searchString = $matches[1];
                                }
                            }
                        }
                    }
                }
            }

            if($this->params->get('type_calc'))
            {
                // Globale Variable - 1.5-2
                $_SESSION["spamcheck"] = $this->random();
                $_SESSION["rot13"] = mt_rand(0, 1);

                // Operator bestimmen
                if($this->params->get('operator') == 2)
                {
                    $tcalc = mt_rand(1, 2);
                }
                elseif($this->params->get('operator') == 1)
                {
                    $tcalc = 2;
                }
                else
                {
                    $tcalc = 1;
                }

                // Operanden bestimmen
                $max_value = $this->params->get('max_value', 20);

                if(($this->params->get('negativ') == 0) AND ($tcalc == 2))
                {
                    $spamCheckNr1 = mt_rand($max_value / 2, $max_value);
                    $spamCheckNr2 = mt_rand(1, $max_value / 2);
                    if($this->params->get('operand') == 3)
                    {
                        $spamCheckNr3 = mt_rand(0, $spamCheckNr1 - $spamCheckNr2);
                    }
                }
                else
                {
                    $spamCheckNr1 = mt_rand(1, $max_value);
                    $spamCheckNr2 = mt_rand(1, $max_value);
                    if($this->params->get('operand') == 3)
                    {
                        $spamCheckNr3 = mt_rand(0, $max_value);
                    }
                }

                // Speicherung des Ergebnisses als Session-Variable - 1.5-4
                $addString = '';

                if($tcalc == 1) // Addition
                {
                    if($_SESSION["rot13"] == 1) // ROT13 Kodierung - 1.5-2
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $_SESSION["spamcheckresult"] = str_rot13(base64_encode($spamCheckNr1 + $spamCheckNr2));
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $_SESSION["spamcheckresult"] = str_rot13(base64_encode($spamCheckNr1 + $spamCheckNr2 + $spamCheckNr3));
                        }
                    }
                    else
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $_SESSION["spamcheckresult"] = base64_encode($spamCheckNr1 + $spamCheckNr2);
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $_SESSION["spamcheckresult"] = base64_encode($spamCheckNr1 + $spamCheckNr2 + $spamCheckNr3);
                        }
                    }
                }
                elseif($tcalc == 2) // Subtraktion
                {
                    if($_SESSION["rot13"] == 1)
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $_SESSION["spamcheckresult"] = str_rot13(base64_encode($spamCheckNr1 - $spamCheckNr2));
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $_SESSION["spamcheckresult"] = str_rot13(base64_encode($spamCheckNr1 - $spamCheckNr2 - $spamCheckNr3));
                        }
                    }
                    else
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $_SESSION["spamcheckresult"] = base64_encode($spamCheckNr1 - $spamCheckNr2);
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $_SESSION["spamcheckresult"] = base64_encode($spamCheckNr1 - $spamCheckNr2 - $spamCheckNr3);
                        }
                    }
                }

                // Anzeige der Rechenaufgabe - DIV Layer hinzugefügt - 1.5-6
                if(!$this->params->get('beez'))
                {
                    if($option == 'com_qcontacts' OR $option == 'com_community')
                    {
                        $addString .= '<div><label for="'.$_SESSION["spamcheck"].'" style="display: inline;">';
                    }
                    elseif($option == 'com_easybookreloaded')
                    {
                        $addString .= '<div style="padding-left: 50px;"><label for="'.$_SESSION["spamcheck"].'">';
                    }
                    else
                    {
                        $addString .= '<div><label for="'.$_SESSION["spamcheck"].'">';
                    }
                }
                elseif($this->params->get('beez'))
                {
                    if($option == 'com_qcontacts')
                    {
                        $addString .= '<div class="'.$_SESSION["label_calc_div"].'"><label for="'.$_SESSION["spamcheck"].'" class="'.$_SESSION["label_calc"].'" style="display: inline;">';
                    }
                    elseif($option == 'com_easybookreloaded')
                    {
                        $addString .= '<div class="'.$_SESSION["label_calc_div"].'" style="padding-left: 50px;"><label for="'.$_SESSION["spamcheck"].'" class="'.$_SESSION["label_calc"].'" style="display: inline;">';
                    }
                    else
                    {
                        $addString .= '<div class="'.$_SESSION["label_calc_div"].'"><label for="'.$_SESSION["spamcheck"].'" class="'.$_SESSION["label_calc"].'">';
                    }
                }
                $addString .= JText::_('Spamcheck').': ';
                if($tcalc == 1)
                {
                    if($this->params->get('converttostring'))
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $addString .= $this->converttostring($spamCheckNr1).' '.JText::_('PLUS').' '.$this->converttostring($spamCheckNr2).' '.JText::_('equals').' ';
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $addString .= $this->converttostring($spamCheckNr1).' '.JText::_('PLUS').' '.$this->converttostring($spamCheckNr2).' '.JText::_('PLUS').' '.$this->converttostring($spamCheckNr3).' '.JText::_('equals').' ';
                        }
                    }
                    else
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $addString .= $spamCheckNr1.' '.JText::_('PLUS').' '.$spamCheckNr2.' '.JText::_('equals').' ';
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $addString .= $spamCheckNr1.' '.JText::_('PLUS').' '.$spamCheckNr2.' '.JText::_('PLUS').' '.$spamCheckNr3.' '.JText::_('equals').' ';
                        }
                    }
                }
                elseif($tcalc == 2)
                {
                    if($this->params->get('converttostring'))
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $addString .= $this->converttostring($spamCheckNr1).' '.JText::_('MINUS').' '.$this->converttostring($spamCheckNr2).' '.JText::_('equals').' ';
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $addString .= $this->converttostring($spamCheckNr1).' '.JText::_('MINUS').' '.$this->converttostring($spamCheckNr2).' '.JText::_('MINUS').' '.$this->converttostring($spamCheckNr3).' '.JText::_('equals').' ';
                        }
                    }
                    else
                    {
                        if($this->params->get('operand') == 2)
                        {
                            $addString .= $spamCheckNr1.' '.JText::_('MINUS').' '.$spamCheckNr2.' '.JText::_('equals').' ';
                        }
                        elseif($this->params->get('operand') == 3)
                        {
                            $addString .= $spamCheckNr1.' '.JText::_('MINUS').' '.$spamCheckNr2.' '.JText::_('MINUS').' '.$spamCheckNr3.' '.JText::_('equals').' ';
                        }
                    }
                }
                $addString .= '</label>';
                $addString .= '<input type="text" name="'.$_SESSION["spamcheck"].'" id="'.$_SESSION["spamcheck"].'" size="3" class="inputbox '.$this->random().'" value="" /> *';
                $addString .= '</div>';

                // Warnhinweise einblenden
                if($this->params->get('warn_ref') AND !$this->params->get('autofill_values'))
                {
                    if($option == 'com_easybookreloaded')
                    {
                        $addString .= '<p style="padding-left: 50px;"><img src="'.JURI::root().'plugins/system/easycalccheckplus/warning.png" alt="'.JText::_('Warning').'" /> ';
                    }
                    else
                    {
                        $addString .= '<p><img src="'.JURI::root().'plugins/system/easycalccheckplus/warning.png" alt="'.JText::_('Warning').'" /> ';
                    }
                    $addString .= '<strong>'.JText::_('Warning').'</strong><br /><small>'.JText::_('Warning desc').'</small>';
                    if($this->params->get('converttostring'))
                    {
                        $addString .= '<br /><small>'.JText::_('CONVERTWARNING').'</small><br />';
                    }
                    $addString .= '</p>';
                }
                elseif($this->params->get('converttostring'))
                {
                    if($option == 'com_easybookreloaded')
                    {
                        $addString .= '<p style="padding-left: 50px;"><small>'.JText::_('CONVERTWARNING').'</small></p>';
                    }
                    else
                    {
                        $addString .= '<p><small>'.JText::_('CONVERTWARNING').'</small></p>';
                    }
                }

                if(isset($searchString))
                {
                    $body = str_replace($searchString, $addString.$searchString, $body);
                    JResponse::setBody($body);
                }
            }

            // ReCaptcha - 1.5-10
            if($this->params->get('recaptcha') AND $this->params->get('recaptcha_publickey') AND $this->params->get('recaptcha_privatekey'))
            {
                require_once(dirname(__FILE__).DS.'easycalccheckplus'.DS.'recaptchalib.php');
                $publickey = $this->params->get('recaptcha_publickey');

                $addString = recaptcha_get_html($publickey).'<br />';

                if(isset($searchString))
                {
                    $body = str_replace($searchString, $addString.$searchString, $body);
                    JResponse::setBody($body);
                }
            }

            // Question - 1.5-13
            if($this->params->get('question') AND $this->params->get('question_q') AND $this->params->get('question_a'))
            {
                $_SESSION["question"] = $this->random();

                // Variable Input-Breite
                $size = strlen($this->params->get('question_a')) + mt_rand(0, 2);

                if($option == 'com_easybookreloaded')
                {
                    $addString = '<p style="padding-left: 50px;">'.$this->params->get('question_q').' <input type="text" name="'.$_SESSION["question"].'" id="'.$_SESSION["question"].'" size="'.$size.'" class="inputbox '.$this->random().'" value="" /> *</p>';
                }
                else
                {
                    $addString = '<p>'.$this->params->get('question_q').' <input type="text" name="'.$_SESSION["question"].'" id="'.$_SESSION["question"].'" size="'.$size.'" class="inputbox '.$this->random().'" value="" /> *</p>';
                }

                if(isset($searchString))
                {
                    $body = str_replace($searchString, $addString.$searchString, $body);
                    JResponse::setBody($body);
                }
            }
        }

        // Zeitsperre - 1.5-2
        if($this->params->get('type_time'))
        {
            $_SESSION["time"] = time();
        }

        // IP Adresse des Einträgers ermitteln - 1.5-7
        $_SESSION["ip"] = getenv('REMOTE_ADDR');

        // Schnellantwort für Gäste entfernen - Eintrag nur über das normale Formular möglich
        if($option == 'com_kunena' AND $func == 'view')
        {
            $pattern = '@(<a class="kicon-button kbuttoncomm btn-left kqreply".+><span class="reply"><span>.+</span></span></a>)@isU';

            if(preg_match_all($pattern, $body, $matches))
            {
                foreach($matches[1] as $match)
                {
                    $body = str_replace($match, '', $body);
                }
                JResponse::setBody($body);
            }
        }

        // Sessionvariable wegen Fehlermeldung Phoca Guestbook / Easybook Reloaded
        if($option == 'com_phocaguestbook')
        {
            $_SESSION["phocaguestbook"] = 0;
        }
        if($option == 'com_easybookreloaded')
        {
            $_SESSION["easybookreloaded"] = 0;
        }

        return;
    }
    // Ende Funktion onAfterRender

    /**
     *
     * Namen der Inputfelder zurücksetzen, damit die Komponenten sie verarbeiten können - 1.5-4
     * Setzung der CSS-Anweisung in der Funktion onAfterRoute, um Funktionalität bei SEO zu bewahren - 1.5-6
     *
     */
    function onAfterRoute()
    {
        // CSS in Head-Bereich - nur im Frontend - 1.5-4 - nur bei benötigen Komponenten - 1.5-5
        $app = JFactory::getApplication();
        $task = JRequest::getWord('task');
        $format = JRequest::getWord('format');

        // Nur im Frontend, VCARD Anforderung und PDF-Erzeugung - keine Ausführung von addCustomTag - 1.5-5
        if(($app->isAdmin()) OR ($task == 'vcard') OR ($format == 'pdf') OR ($format == 'feed'))
        {
            return;
        }

        if($this->params->get('onlyguests'))
        {
            $user = JFactory::getUser();
            if(!$user->guest)
            {
                return;
            }
        }

        $option = JRequest::getWord('option');
        $page = JRequest::getCmd('page');
        $view = JRequest::getWord('view');
        $func = JRequest::getWord('func');

        if(($this->params->get('type_hidden')) OR ($this->params->get('beez') AND $this->params->get('type_calc')) OR ($this->params->get('kunena') AND $this->params->get('recaptcha') AND $option == "com_kunena") OR ($this->params->get('easybookreloaded') AND $this->params->get('recaptcha') AND $option == "com_easybookreloaded") OR $this->params->get('recaptcha_theme'))
        {
            if(($this->params->get('contact') AND $option == "com_contact" AND $view == 'contact') OR ($this->params->get('user_reg') AND $option == "com_user") OR ($this->params->get('virtuemart') AND $option == "com_virtuemart" AND ($page == 'shop.registration' OR $page == 'checkout.index' OR $page == 'shop.ask')) OR ($this->params->get('communitybuilder') AND $option == 'com_comprofiler' AND ($task == 'registers' OR $task == 'lostpassword')) OR ($this->params->get('qcontacts') AND $option == "com_qcontacts" AND $view == 'contact') OR ($this->params->get('alpharegistration') AND $option == "com_alpharegistration") OR ($this->params->get('jomsocial') AND $option == "com_community" AND $view == 'register') OR ($this->params->get('dfcontact') AND $option == "com_dfcontact") OR ($this->params->get('phocaguestbook') AND $option == "com_phocaguestbook") OR ($this->params->get('cbe') AND $option == "com_cbe" AND $task == "registers") OR ($this->params->get('alfcontact') AND $option == "com_alfcontact") OR ($this->params->get('flexicontact') AND $option == "com_flexicontact") OR ($this->params->get('kunena') AND $option == "com_kunena") OR ($this->params->get('easybookreloaded') AND $option == "com_easybookreloaded") OR ($this->params->get('jobboard') AND $option == "com_jobboard"))
            {
                $head = array();
                if($this->params->get('type_hidden'))
                {
                    $_SESSION["hidden_class"] = $this->random();
                    $head[] = '<style type="text/css">.'.$_SESSION["hidden_class"].' {display: none;}</style>';
                }
                if($this->params->get('beez') AND $this->params->get('type_calc'))
                {
                    $_SESSION["label_calc"] = $this->random();
                    $head[] = '<style type="text/css">.'.$_SESSION["label_calc"].' {width:27em !important;}</style>';
                    $_SESSION["label_calc_div"] = $this->random();
                    $head[] = '<style type="text/css">.'.$_SESSION["label_calc_div"].' {overflow: hidden;}</style>';
                }
                if($this->params->get('kunena') AND $this->params->get('recaptcha') AND $option == "com_kunena")
                {
                    $head[] = '<style type="text/css">div#recaptcha_area{margin: auto !important;}</style>';
                }
                if($this->params->get('easybookreloaded') AND $this->params->get('recaptcha') AND $option == "com_easybookreloaded")
                {
                    $head[] = '<style type="text/css">div#recaptcha_area{padding-left: 50px !important;}</style>';
                }
                if($this->params->get('recaptcha_theme'))
                {
                    if($this->params->get('recaptcha_theme') == 1)
                    {
                        $theme = 'white';
                    }
                    elseif($this->params->get('recaptcha_theme') == 2)
                    {
                        $theme = 'blackglass';
                    }
                    elseif($this->params->get('recaptcha_theme') == 3)
                    {
                        $theme = 'clean';
                    }

                    $head[] = '<script type="text/javascript">var RecaptchaOptions = { theme : "'.$theme.'" };</script>';
                }

                $head = "\n".implode("\n", $head)."\n";
                $document = JFactory::getDocument();
                $document->addCustomTag($head);
            }
        }

        // Rücksetzung der Joomla-Inputfelder 1.5-4 - optional 1.5-5
        if($this->params->get('encode'))
        {
            $session = JFactory::getSession();
            if($this->params->get('contact') AND ($option == 'com_contact') AND ($view == 'contact'))
            {
                $name = $session->get('name', null, 'easycalccheck');
                $email = $session->get('email', null, 'easycalccheck');
                $subject = $session->get('subject', null, 'easycalccheck');
                $text = $session->get('text', null, 'easycalccheck');
                $email_copy = $session->get('email_copy', null, 'easycalccheck');

                $name_value = JRequest::getString($name);
                $email_value = JRequest::getString($email);
                $subject_value = JRequest::getString($subject);
                $text_value = JRequest::getString($text);
                $email_copy_value = JRequest::getString($email_copy);

                JRequest::setVar('name', $name_value);
                JRequest::setVar('email', $email_value);
                JRequest::setVar('subject', $subject_value);
                JRequest::setVar('text', $text_value);
                JRequest::setVar('email_copy', $email_copy_value);

                $session->clear('name', 'easycalccheck');
                $session->clear('email', 'easycalccheck');
                $session->clear('subject', 'easycalccheck');
                $session->clear('text', 'easycalccheck');
                $session->clear('email_copy', 'easycalccheck');
            }
            elseif($this->params->get('user_reg') AND ($option == 'com_user') AND ($task == 'register_save'))
            {
                $name = $session->get('name', null, 'easycalccheck');
                $email = $session->get('email', null, 'easycalccheck');
                $username = $session->get('username', null, 'easycalccheck');
                $password = $session->get('password', null, 'easycalccheck');
                $password2 = $session->get('password2', null, 'easycalccheck');

                $name_value = JRequest::getString($name);
                $email_value = JRequest::getString($email);
                $username_value = JRequest::getString($username);
                $password_value = JRequest::getString($password);
                $password2_value = JRequest::getString($password2);

                JRequest::setVar('name', $name_value);
                JRequest::setVar('email', $email_value);
                JRequest::setVar('username', $username_value);
                JRequest::setVar('password', $password_value);
                JRequest::setVar('password2', $password2_value);

                $session->clear('name', 'easycalccheck');
                $session->clear('email', 'easycalccheck');
                $session->clear('username', 'easycalccheck');
                $session->clear('password', 'easycalccheck');
                $session->clear('password2', 'easycalccheck');
            }
            elseif(($this->params->get('encode_virtuemart')) AND ($option == 'com_virtuemart') AND (($page == 'shop.registration') OR ($page == 'checkout.index')))
            {
                $email = $session->get('email', null, 'easycalccheck');
                $username = $session->get('username', null, 'easycalccheck');
                $password = $session->get('password', null, 'easycalccheck');
                $password2 = $session->get('password2', null, 'easycalccheck');
                $agreed = $session->get('agreed', null, 'easycalccheck');

                $email_value = JRequest::getString($email);
                $username_value = JRequest::getString($username);
                $password_value = JRequest::getString($password);
                $password2_value = JRequest::getString($password2);
                $agreed_value = JRequest::getString($agreed);

                JRequest::setVar('email', $email_value);
                JRequest::setVar('username', $username_value);
                JRequest::setVar('password', $password_value);
                JRequest::setVar('password2', $password2_value);
                JRequest::setVar('agreed', $agreed_value);

                $session->clear('email', 'easycalccheck');
                $session->clear('username', 'easycalccheck');
                $session->clear('password', 'easycalccheck');
                $session->clear('password2', 'easycalccheck');
                $session->clear('agreed', 'easycalccheck');
            }
        }

        // Formulareingabe in Session speichern - Formular mit Eingabe befüllen - 1.5-11
        if($this->params->get('autofill_values'))
        {
            $request = JRequest::get();
            $session = JFactory::getSession();

            if($option == 'com_contact' OR $option == 'com_qcontacts' OR $option == 'com_alfcontact' OR $option == 'com_dfcontact')
            {
                if(!empty($request['name']))
                {
                    $session->set('autofill_name', $request['name'], 'easycalccheck');
                }
                if(!empty($request['email']))
                {
                    $session->set('autofill_email', $request['email'], 'easycalccheck');
                }
                if(!empty($request['subject']))
                {
                    $session->set('autofill_subject', $request['subject'], 'easycalccheck');
                }
                if($option == 'com_contact')
                {
                    if(!empty($request['text']))
                    {
                        $session->set('autofill_text', $request['text'], 'easycalccheck');
                    }
                }
                elseif($option == 'com_qcontacts')
                {
                    if(!empty($request['body']))
                    {
                        $session->set('autofill_body', $request['body'], 'easycalccheck');
                    }
                }
                elseif($option == 'com_alfcontact' OR $option == 'com_dfcontact')
                {
                    if(!empty($request['message']))
                    {
                        $session->set('autofill_message', $request['message'], 'easycalccheck');
                    }
                }
            }

            if($option == 'com_user' OR $option == 'com_alpharegistration')
            {
                if(!empty($request['name']))
                {
                    $session->set('autofill_name', $request['name'], 'easycalccheck');
                }
                if(!empty($request['username']))
                {
                    $session->set('autofill_username', $request['username'], 'easycalccheck');
                }
                if(!empty($request['email']))
                {
                    $session->set('autofill_email', $request['email'], 'easycalccheck');
                }
            }

            if($option == 'com_community')
            {
                if(!empty($request['jsname']))
                {
                    $session->set('autofill_jsname', $request['jsname'], 'easycalccheck');
                }
                if(!empty($request['jsusername']))
                {
                    $session->set('autofill_jsusername', $request['jsusername'], 'easycalccheck');
                }
                if(!empty($request['jsemail']))
                {
                    $session->set('autofill_jsemail', $request['jsemail'], 'easycalccheck');
                }
            }

            if($option == 'com_flexicontact')
            {
                if(!empty($request['fromName']))
                {
                    $session->set('autofill_fromName', $request['fromName'], 'easycalccheck');
                }
                if(!empty($request['fromAddress']))
                {
                    $session->set('autofill_fromAddress', $request['fromAddress'], 'easycalccheck');
                }
                if(!empty($request['subject']))
                {
                    $session->set('autofill_subject', $request['subject'], 'easycalccheck');
                }
                if(!empty($request['area_data']))
                {
                    $session->set('autofill_area_data', $request['area_data'], 'easycalccheck');
                }
            }

            if($option == 'com_phocaguestbook')
            {
                if(!empty($request['title']))
                {
                    $session->set('autofill_title', $request['title'], 'easycalccheck');
                }
                if(!empty($request['pgusername']))
                {
                    $session->set('autofill_pgusername', $request['pgusername'], 'easycalccheck');
                }
                if(!empty($request['email']))
                {
                    $session->set('autofill_email', $request['email'], 'easycalccheck');
                }
                if(!empty($request['pgbcontent']))
                {
                    $session->set('autofill_pgbcontent', $request['pgbcontent'], 'easycalccheck');
                }
            }

            if($option == 'com_comprofiler')
            {
                if(!empty($request['name']))
                {
                    $session->set('autofill_name', $request['name'], 'easycalccheck');
                }
                if(!empty($request['firstname']))
                {
                    $session->set('autofill_firstname', $request['firstname'], 'easycalccheck');
                }
                if(!empty($request['middlename']))
                {
                    $session->set('autofill_middlename', $request['middlename'], 'easycalccheck');
                }
                if(!empty($request['lastname']))
                {
                    $session->set('autofill_lastname', $request['lastname'], 'easycalccheck');
                }
                if(!empty($request['email']))
                {
                    $session->set('autofill_email', $request['email'], 'easycalccheck');
                }
                if(!empty($request['username']))
                {
                    $session->set('autofill_username', $request['username'], 'easycalccheck');
                }
                if(!empty($request['company']))
                {
                    $session->set('autofill_company', $request['company'], 'easycalccheck');
                }
                if(!empty($request['city']))
                {
                    $session->set('autofill_city', $request['city'], 'easycalccheck');
                }
                if(!empty($request['state']))
                {
                    $session->set('autofill_state', $request['state'], 'easycalccheck');
                }
                if(!empty($request['zipcode']))
                {
                    $session->set('autofill_zipcode', $request['zipcode'], 'easycalccheck');
                }
                if(!empty($request['country']))
                {
                    $session->set('autofill_country', $request['country'], 'easycalccheck');
                }
                if(!empty($request['address']))
                {
                    $session->set('autofill_address', $request['address'], 'easycalccheck');
                }
                if(!empty($request['phone']))
                {
                    $session->set('autofill_phone', $request['phone'], 'easycalccheck');
                }
                if(!empty($request['fax']))
                {
                    $session->set('autofill_fax', $request['fax'], 'easycalccheck');
                }
            }

            if($option == 'com_cbe')
            {
                if(!empty($request['firstname']))
                {
                    $session->set('autofill_firstname', $request['firstname'], 'easycalccheck');
                }
                if(!empty($request['lastname']))
                {
                    $session->set('autofill_lastname', $request['lastname'], 'easycalccheck');
                }
                if(!empty($request['username']))
                {
                    $session->set('autofill_username', $request['username'], 'easycalccheck');
                }
                if(!empty($request['email']))
                {
                    $session->set('autofill_email', $request['email'], 'easycalccheck');
                }
            }

            if($option == 'com_virtuemart')
            {
                if(!empty($request['name']))
                {
                    $session->set('autofill_name', $request['name'], 'easycalccheck');
                }
                if(!empty($request['text']))
                {
                    $session->set('autofill_text', $request['text'], 'easycalccheck');
                }
                if(!empty($request['username']))
                {
                    $session->set('autofill_username', $request['username'], 'easycalccheck');
                }
                if(!empty($request['email']))
                {
                    $session->set('autofill_email', $request['email'], 'easycalccheck');
                }
                if(!empty($request['company']))
                {
                    $session->set('autofill_company', $request['company'], 'easycalccheck');
                }
                if(!empty($request['first_name']))
                {
                    $session->set('autofill_first_name', $request['first_name'], 'easycalccheck');
                }
                if(!empty($request['last_name']))
                {
                    $session->set('autofill_last_name', $request['last_name'], 'easycalccheck');
                }
                if(!empty($request['middle_name']))
                {
                    $session->set('autofill_middle_name', $request['middle_name'], 'easycalccheck');
                }
                if(!empty($request['address_1']))
                {
                    $session->set('autofill_address_1', $request['address_1'], 'easycalccheck');
                }
                if(!empty($request['address_2']))
                {
                    $session->set('autofill_address_2', $request['address_2'], 'easycalccheck');
                }
                if(!empty($request['city']))
                {
                    $session->set('autofill_city', $request['city'], 'easycalccheck');
                }
                if(!empty($request['zip']))
                {
                    $session->set('autofill_zip', $request['zip'], 'easycalccheck');
                }
                if(!empty($request['phone_1']))
                {
                    $session->set('autofill_phone_1', $request['phone_1'], 'easycalccheck');
                }
                if(!empty($request['phone_2']))
                {
                    $session->set('autofill_phone_2', $request['phone_2'], 'easycalccheck');
                }
                if(!empty($request['fax']))
                {
                    $session->set('autofill_fax', $request['fax'], 'easycalccheck');
                }
                if(!empty($request['country']))
                {
                    $session->set('autofill_country', $request['country'], 'easycalccheck');
                }
            }

            if($option == 'com_kunena')
            {
                $user = & JFactory::getUser();
                if($user->guest)
                {
                    if(!empty($request['authorname']))
                    {
                        $session->set('autofill_authorname', $request['authorname'], 'easycalccheck');
                    }
                    if(!empty($request['subject']))
                    {
                        $session->set('autofill_subject', $request['subject'], 'easycalccheck');
                    }
                    if(!empty($request['message']))
                    {
                        $session->set('autofill_message', $request['message'], 'easycalccheck');
                    }
                }
            }

            if($option == 'com_easybookreloaded')
            {
                if(!empty($request['gbname']))
                {
                    $session->set('autofill_gbname', $request['gbname'], 'easycalccheck');
                }
                if(!empty($request['gbmail']))
                {
                    $session->set('autofill_gbmail', $request['gbmail'], 'easycalccheck');
                }
                if(!empty($request['gbpage']))
                {
                    $session->set('autofill_gbpage', $request['gbpage'], 'easycalccheck');
                }
                if(!empty($request['gbloca']))
                {
                    $session->set('autofill_gbloca', $request['gbloca'], 'easycalccheck');
                }
                if(!empty($request['gbicq']))
                {
                    $session->set('autofill_gbicq', $request['gbicq'], 'easycalccheck');
                }
                if(!empty($request['gbaim']))
                {
                    $session->set('autofill_gbaim', $request['gbaim'], 'easycalccheck');
                }
                if(!empty($request['gbmsn']))
                {
                    $session->set('autofill_gbmsn', $request['gbmsn'], 'easycalccheck');
                }
                if(!empty($request['gbyah']))
                {
                    $session->set('autofill_gbyah', $request['gbyah'], 'easycalccheck');
                }
                if(!empty($request['gbskype']))
                {
                    $session->set('autofill_gbskype', $request['gbskype'], 'easycalccheck');
                }
                if(!empty($request['gbvote']))
                {
                    $session->set('autofill_gbvote', $request['gbvote'], 'easycalccheck');
                }
                if(!empty($request['gbtext']))
                {
                    $session->set('autofill_gbtext', $request['gbtext'], 'easycalccheck');
                }
            }

            if($option == 'com_jobboard')
            {
                if(!empty($request['sender_name']))
                {
                    $session->set('autofill_sender_name', $request['sender_name'], 'easycalccheck');
                }
                if(!empty($request['first_name']))
                {
                    $session->set('autofill_first_name', $request['first_name'], 'easycalccheck');
                }
                if(!empty($request['last_name']))
                {
                    $session->set('autofill_last_name', $request['last_name'], 'easycalccheck');
                }
                if(!empty($request['title']))
                {
                    $session->set('autofill_title', $request['title'], 'easycalccheck');
                }
                if(!empty($request['tel']))
                {
                    $session->set('autofill_tel', $request['tel'], 'easycalccheck');
                }
                if(!empty($request['sender_email']))
                {
                    $session->set('autofill_sender_email', $request['sender_email'], 'easycalccheck');
                }
                if(!empty($request['email']))
                {
                    $session->set('autofill_email', $request['email'], 'easycalccheck');
                }
                if(!empty($request['personal_message']))
                {
                    $session->set('autofill_personal_message', $request['personal_message'], 'easycalccheck');
                }
                if(!empty($request['cover_text']))
                {
                    $session->set('autofill_cover_text', $request['cover_text'], 'easycalccheck');
                }
                if(!empty($request['rec_emails']))
                {
                    $session->set('autofill_rec_emails', $request['rec_emails'], 'easycalccheck');
                }
            }
        }

        // Validierung - Passwort und Benutzernamen vergessen
        if($this->params->get('user_reg'))
        {
            if($option == 'com_user' AND $task == 'requestreset')
            {
                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_user&view=reset&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
            elseif($option == 'com_user' AND $task == 'remindusername')
            {
                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_user&view=remind&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }

        // CBE - Registrieren
        if($this->params->get('cbe'))
        {
            if($option == 'com_cbe' AND $task == 'saveRegistration')
            {
                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_cbe&task=registers&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }

        // Community Builder - Neues Passwort
        if($this->params->get('communitybuilder'))
        {
            if($option == 'com_comprofiler' AND $task == 'sendNewPass')
            {
                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_comprofiler&task=lostpassword&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }

        // Jomsocial - Prüfung hier, da Registrierung auf mehreren Seiten verteilt ist
        if($this->params->get('jomsocial'))
        {
            if($option == 'com_community' AND $task == 'register_save')
            {
                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_community&view=register&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
            if($option == 'com_community' AND $task == 'activationResend')
            {
                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_community&view=register&task=activation&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }

        // Virtuemart - Produktanfrage
        if($this->params->get('virtuemart'))
        {
            if($option == 'com_virtuemart' AND $func == 'productAsk')
            {
                $flypage = JRequest::getCmd('flypage');
                $product_id = JRequest::getCmd('product_id');

                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_virtuemart&page=shop.ask&flypage='.$flypage.'&product_id='.$product_id.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }

        // DFContact - Kontaktformular
        // Session-Variable, um Fehleranzeige bei erfolgreicher Eingabe zu unterdrücken, da kein Redirect durchgeführt wird
        if($this->params->get('dfcontact'))
        {
            if($option == 'com_dfcontact' AND !empty($_REQUEST["submit"]))
            {
                if(!$this->performChecks())
                {
                    $_SESSION["dfcontact"] = 1;
                    $returnURI = JURI::current().'?option=com_dfcontact&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
                else
                {
                    $_SESSION["dfcontact"] = 0;
                }
            }
        }

        // Phoca Guestbook - Formular
        // Session-Variable, um Fehleranzeige bei erfolgreicher Eingabe zu unterdrücken, da kein Redirect durchgeführt wird
        if($this->params->get('phocaguestbook'))
        {
            if($option == 'com_phocaguestbook' AND $task == 'submit')
            {
                $id = JRequest::getCmd('id');
                $Itemid = JRequest::getCmd('Itemid');

                if(!$this->performChecks())
                {
                    $_SESSION["phocaguestbook"] = 1;
                    $returnURI = JURI::current().'?option=com_phocaguestbook&view=phocaguestbook&id='.$id.'&Itemid='.$Itemid.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }

        // ALFContact - Kontaktformular
        // Session-Variable, um Fehleranzeige bei erfolgreicher Eingabe zu unterdrücken, da kein Redirect durchgeführt wird
        if($this->params->get('alfcontact'))
        {
            if($option == 'com_alfcontact' AND $task == 'sendemail')
            {
                $Itemid = JRequest::getCmd('Itemid');

                if(!$this->performChecks())
                {
                    $_SESSION["alfcontact"] = 1;
                    $returnURI = JURI::current().'?option=com_alfcontact&Itemid='.$Itemid.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
                else
                {
                    $_SESSION["alfcontact"] = 0;
                }
            }
        }

        // FlexiContact - Neues Passwort
        // Session-Variable, um Fehleranzeige bei erfolgreicher Eingabe zu unterdrücken, da kein Redirect durchgeführt wird
        if($this->params->get('flexicontact'))
        {
            if($option == 'com_flexicontact' AND $task == 'send')
            {
                $Itemid = JRequest::getCmd('Itemid');

                if(!$this->performChecks())
                {
                    $_SESSION["flexicontact"] = 1;
                    $returnURI = JURI::current().'?option=com_flexicontact&Itemid='.$Itemid.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
                else
                {
                    $_SESSION["flexicontact"] = 0;
                }
            }
        }

        // Kunena Forum - Formular
        if($this->params->get('kunena'))
        {
            $user = & JFactory::getUser();
            if($user->guest)
            {
                $action = JRequest::getCmd('action');

                if($option == 'com_kunena' AND $action == 'post')
                {
                    $catid = JRequest::getCmd('catid');
                    $id = JRequest::getCmd('id');
                    $Itemid = JRequest::getCmd('Itemid');

                    if(!$this->performChecks())
                    {
                        $returnURI = JURI::current().'?option=com_kunena&func='.$func.'&do=reply&catid='.$catid.'&id='.$id.'&Itemid='.$Itemid.'&essp_err=check_failed';
                        $this->redirect($returnURI);
                    }
                }
            }
        }

        // Easybook Reloaded - 1.5-12
        if($this->params->get('easybookreloaded'))
        {
            if($option == 'com_easybookreloaded' AND $task == 'save')
            {
                $Itemid = JRequest::getCmd('Itemid');

                if(!$this->performChecks())
                {
                    $_SESSION["easybookreloaded"] = 1;
                    $returnURI = JURI::current().'?option=com_easybookreloaded&controller=entry&task=add&Itemid='.$Itemid.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }

        // Job Board - 1.5-13
        if($this->params->get('jobboard'))
        {
            if($option == 'com_jobboard' AND $task == 'share')
            {
                $job_id = JRequest::getCmd('job_id');
                $catid = JRequest::getCmd('catid');
                $lyt = JRequest::getCmd('lyt');
                $Itemid = JRequest::getCmd('Itemid');

                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_jobboard&view=share&job_id='.$job_id.'&catid='.$catid.'&lyt='.$lyt.'&Itemid='.$Itemid.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
            elseif($option == 'com_jobboard' AND $view == 'upload' AND $task != 'uload')
            {
                $job_id = JRequest::getCmd('job_id');
                $catid = JRequest::getCmd('catid');
                $lyt = JRequest::getCmd('lyt');
                $Itemid = JRequest::getCmd('Itemid');

                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_jobboard&view=apply&job_id='.$job_id.'&catid='.$catid.'&lyt='.$lyt.'&Itemid='.$Itemid.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
            elseif($option == 'com_jobboard' AND $view == 'upload' AND $task == 'uload')
            {
                $Itemid = JRequest::getCmd('Itemid');

                if(!$this->performChecks())
                {
                    $returnURI = JURI::current().'?option=com_jobboard&view=unsolicited&Itemid='.$Itemid.'&essp_err=check_failed';
                    $this->redirect($returnURI);
                }
            }
        }
    }
    // Ende Funktion onAfterRoute

    /**
     * Exception kann durch Komponente nicht verarbeitet werden
     * Redirection durch PHP / JS durchgeführt und abgefangen
     *
     * @return void
     */
    function onAfterInitialise()
    {
        $option = JRequest::getWord('option');

        if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
        {
            if(($option == 'com_dfcontact' AND $_SESSION["dfcontact"] == 0) OR ($option == 'com_alfcontact' AND $_SESSION["alfcontact"] == 0) OR ($option == 'com_flexicontact' AND $_SESSION["flexicontact"] == 0))
            {
                JFactory::getApplication()->enqueueMessage(JText::_('You have resolved our spamcheck'));
            }
            elseif(($option == 'com_phocaguestbook' AND $_SESSION["phocaguestbook"] == 0) OR ($option == 'com_easybookreloaded' AND $_SESSION["easybookreloaded"] == 0))
            {
                // Kein Hinweis - Erfolgreicher Eintrag wird von der Komponente angezeigt
            }
            else
            {
                JError::raiseWarning(100, JText::_('You have not resolved our spamcheck'));
            }
        }

        // Bot-Trap einbinden - 1.5-7
        // Weitere Infos unter http://www.bot-trap.de
        // Datei muss page.restrictor.php heißen und in den Ordner plugins/system/bottrap abgelegt werden
        if($this->params->get('bottrap'))
        {
            $app = JFactory::getApplication();

            if($app->isAdmin())
            {
                $path = '../plugins/system/bottrap/';
            }
            else
            {
                $path = 'plugins/system/bottrap/';
            }

            if(file_exists($path.'page.restrictor.php'))
            {
                if($this->params->get('btWhitelistIP'))
                {
                    $btWhitelistIP = str_replace(',', '|', $this->params->get('btWhitelistIP'));
                    define('PRES_WHITELIST_IP', $btWhitelistIP);
                }
                if($this->params->get('btWhitelistIPRange'))
                {
                    $btWhitelistIPRange = str_replace(',', '|', $this->params->get('btWhitelistIPRange'));
                    define('PRES_WHITELIST_IPR', $btWhitelistIPRange);
                }
                if($this->params->get('btWhitelistUA'))
                {
                    $btWhitelistUA = str_replace(',', '|', $this->params->get('btWhitelistUA'));
                    define('PRES_WHITELIST_UA', $btWhitelistUA);
                }
                if($this->params->get('btBlacklistIP'))
                {
                    $btBlacklistIP = str_replace(',', '|', $this->params->get('btBlacklistIP'));
                    define('PRES_BLACKLIST_IP', $btBlacklistIP);
                }
                if($this->params->get('btBlacklistIPRange'))
                {
                    $btBlacklistIPRange = str_replace(',', '|', $this->params->get('btBlacklistIPRange'));
                    define('PRES_BLACKLIST_IPR', $btBlacklistIPRange);
                }
                if($this->params->get('btBlacklistUA'))
                {
                    $btBlacklistUA = str_replace(',', '|', $this->params->get('btBlacklistUA'));
                    define('PRES_BLACKLIST_UA', $btBlacklistUA);
                }
                include_once($path.'page.restrictor.php');
            }
            else
            {
                JError::raiseWarning(100, JText::_('ERROR BOTTRAP'));
            }
        }

        // Credit: Marco's SQL Injection Plugin - 1.5-7
        // Weitere Infos unter http://www.mmleoni.net/sql-iniection-lfi-protection-plugin-for-joomla
        if($this->params->get('sqlinjection-lfi'))
        {
            $mainframe = JFactory::getApplication();
            $p_dbprefix = $mainframe->getCfg('dbprefix');
            $p_errorCode = 500;
            $p_errorMsg = 'Internal Server Error - SQL Injection detected!';
            $p_nameSpaces = 'GET,POST,REQUEST';

            foreach(explode(',', $p_nameSpaces) as $nsp)
            {
                switch($nsp)
                {
                    case 'GET':
                        $nameSpace = $_GET;
                        break;
                    case 'POST':
                        $nameSpace = $_POST;
                        break;
                    case 'REQUEST':
                        $nameSpace = $_REQUEST;
                        break;
                }

                foreach($nameSpace as $k => $v)
                {
                    if(is_numeric($v))
                    {
                        continue;
                    }
                    if(is_array($v))
                    {
                        continue;
                    }

                    $a = preg_replace('@/\*.*?\*/@s', ' ', $v);
                    if(preg_match('@UNION(?:\s+ALL)?\s+SELECT@i', $a))
                    {
                        JError::raiseError($p_errorCode, $p_errorMsg);
                        return;
                    }
                    $ta = array('/(\s+|\.|,)`?(#__)/', '/(\s+|\.|,)`?(jos_)/i', "/(\s+|\.|,)`?({$p_dbprefix}_)/i");
                    foreach($ta as $t)
                    {
                        if(preg_match($t, $v))
                        {
                            JError::raiseError($p_errorCode, $p_errorMsg);
                            return;
                        }
                    }
                    if(in_array($k, array('controller', 'view', 'model', 'template')))
                    {
                        $recurse = str_repeat('\.\.\/', 2);
                        while(preg_match("@$recurse@", $v))
                        {
                            JError::raiseError($p_errorCode, $p_errorMsg);
                            return;
                        }
                    }
                    unset($v);
                }
            }
        }

        // Backend protection
        // Inspired by the plugin Backend Token - http://extensions.joomla.org/extensions/access-a-security/site-security/login-protection/13919
        if($this->params->get('backendprotection'))
        {
            $app = JFactory::getApplication();
            if($app->isAdmin())
            {
                $user = JFactory::getUser();
                if($user->guest)
                {
                    $session = JFactory::getSession();

                    $token = $this->params->get('token');
                    $request = JRequest::get();
                    $tokensession = $session->get('token', null, 'easycalccheck');

                    if(!isset($tokensession))
                    {
                        $tokensession = $session->set('token', 0, 'easycalccheck');
                    }
                    if(utf8_encode($request['token']) == $token) // Umwandlung in UTF8, um auch Umlaute zu ermöglichen
                    {
                        $tokensession = $session->set('token', 1, 'easycalccheck');
                    }
                    elseif(utf8_encode($request['token']) != $token)
                    {
                        $url = $this->params->get('urlfalsetoken');
                        if(empty($url))
                        {
                            $url = JURI::root();
                        }
                        if($tokensession != 1)
                        {
                            $tokensession = $session->clear('token', 'easycalccheck');
                            $this->redirect($url);
                        }
                    }
                }
            }
        }
    }
    // Ende Funktion onAfterInitialise

    /**
     * Checks the result of the calc check submittet by the contact form
     *
     * @param $contact
     * @param $post
     *
     * @return mixed true on success / JExecption on failure
     */
    public function onValidateContact($contact, $post)
    {
        // Nur im Frontend und bei gewählter Option
        $app = JFactory::getApplication();

        if($app->isAdmin())
        {
            return;
        }

        if($this->params->get('onlyguests'))
        {
            $user = JFactory::getUser();
            if(!$user->guest)
            {
                return;
            }
        }

        $option = JRequest::getWord('option');

        if(($this->params->get('contact') AND $option == 'com_contact') OR ($this->params->get('qcontacts') AND $option == 'com_qcontacts'))
        {
            if($this->performChecks())
            {
                return true;
            }

            // ID das Kontaktes auslesen - 1.5-3
            $id = JRequest::getCmd('id');

            if($option == 'com_qcontacts')
            {
                $returnURI = JURI::current().'?option=com_qcontacts&view=contact&id='.$id.'&essp_err=check_failed';
            }
            else
            {
                $returnURI = JURI::current().'?option=com_contact&view=contact&id='.$id.'&essp_err=check_failed';
            }
            $this->redirect($returnURI);
        }

        return true;
    }
    // Ende Funktion onValidateContact

    /**
     * Checks the result of the checks submittet by the registration form
     *
     * @param $user
     * @param $isnew bool
     *
     * @return mixed true on succes - jexit() on failure as com_user does not hande plugin return values
     */
    public function onBeforeStoreUser($user, $isnew)
    {
        // Nur im Frontend und wenn Abfrage aktiviert - 1.5-8
        $app = JFactory::getApplication();

        if($app->isAdmin() OR !$isnew)
        {
            return true;
        }

        if($this->params->get('onlyguests'))
        {
            $user = JFactory::getUser();
            if(!$user->guest)
            {
                return;
            }
        }

        $option = JRequest::getWord('option');

        if(($this->params->get('user_reg') AND $option == 'com_user') OR ($this->params->get('virtuemart') AND $option == 'com_virtuemart') OR ($this->params->get('communitybuilder') AND $option == 'com_comprofiler') OR ($this->params->get('alpharegistration') AND $option == 'com_alpharegistration') OR ($option == 'com_community'))
        {
            if($this->performChecks())
            {
                return true;
            }

            // Virtuemart Registrierung - 1.5-3
            if($option == 'com_virtuemart')
            {
                $returnURI = JURI::current().'?option=com_virtuemart&page=shop.registration&essp_err=check_failed';
            }
            elseif($option == 'com_comprofiler')
            {
                $returnURI = JURI::current().'?option=com_comprofiler&task=registers&essp_err=check_failed';
            }
            elseif($option == 'com_alpharegistration')
            {
                $returnURI = JURI::current().'?option=com_alpharegistration&view=register&essp_err=check_failed';
            }
            else
            {
                $returnURI = JURI::current().'?option=com_user&view=register&essp_err=check_failed';
            }
            $this->redirect($returnURI);
        }

        return true;
    }
    // Ende Funktion onBeforeStoreUser

    /**
     * checks the result of the form field checks from request
     *
     * @access private
     *
     * @return bool true on success
     */
    private function performChecks()
    {
        // Rechenaufgabe prüfen
        if($this->params->get('type_calc'))
        {
            if($_SESSION["rot13"] == 1)
            {
                $spamcheckresult = base64_decode(str_rot13($_SESSION["spamcheckresult"]));
            }
            else
            {
                $spamcheckresult = base64_decode($_SESSION["spamcheckresult"]);
            }
            $spamcheck = JRequest::getInt($_SESSION["spamcheck"], '', 'post');

            if(!is_numeric($spamcheckresult) || $spamcheckresult != $spamcheck)
            {
                return false; // Aufgabe nicht gelöst
            }
            unset($_SESSION["spamcheckresult"]);
            unset($_SESSION["spamcheck"]);
            unset($_SESSION["rot13"]);
        }

        // Verstecktes Feld prüfen
        if($this->params->get('type_hidden'))
        {
            if(JRequest::getVar($_SESSION["hidden_field"], '', 'post'))
            {
                return false; // Verstecktes Feld wurde ausgefüllt
            }
            unset($_SESSION["hidden_field"]);
        }

        // Zeitsperre prüfen
        if($this->params->get('type_time'))
        {
            if(time() - $this->params->get('type_time_sec') <= $_SESSION["time"])
            {
                return false; // Eingabe zu schnell
            }
            unset($_SESSION["time"]);
        }

        // Frage prüfen
        // Umwandlung in Kleinbuchstaben, für bessere Überprüfung
        if($this->params->get('question'))
        {
            $answer = strtolower(JRequest::getString($_SESSION["question"], '', 'post'));

            if($answer != strtolower($this->params->get('question_a')))
            {
                return false; // Frage nicht beantwortet
            }
            unset($_SESSION["question"]);
        }

        // StopForumSpam - Überprüfung der IP Adresse - 1.5-7
        // Weitere Infos unter http://www.stopforumspam.com
        if($this->params->get('stopforumspam'))
        {
            $url = 'http://www.stopforumspam.com/api?ip='.$_SESSION["ip"];
            // Funktionstest - Auskommentieren, um zu testen - Wichtig: Aktive Spam-IP einfügen
            // $ip = '109.230.246.224';
            // $url = 'http://www.stopforumspam.com/api?ip='.$ip;

            $response = false;
            $is_spam = false;

            if(function_exists('curl_init'))
            {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                curl_close($ch);
            }

            if($response)
            {
                preg_match('#<appears>(.*)</appears>#', $response, $out);
                $is_spam = $out[1];
            }
            else
            {
                $response = @ fopen($url, 'r');

                if($response)
                {
                    while(!feof($response))
                    {
                        $line = fgets($response, 1024);

                        if(preg_match('#<appears>(.*)</appears>#', $line, $out))
                        {
                            $is_spam = $out[1];
                            break;
                        }
                    }
                    fclose($response);
                }
            }

            if($is_spam == 'yes' AND $response == true)
            {
                return false; // Spam IP-Adresse
            }
        }
        // Honeypot Project - 1.5-7
        // Weitere Infos unter http://www.projecthoneypot.org/home.php
        // BL ACCESS KEY - http://www.projecthoneypot.org/httpbl_configure.php
        if($this->params->get('honeypot'))
        {
            require('easycalccheckplus/honeypot.php');
            $http_blKey = $this->params->get('honeypot_key');

            if($http_blKey)
            {
                $http_bl = new http_bl($http_blKey);

                $result = $http_bl->query($_SESSION["ip"]);

                // Funktionstest - Auskommentieren, um zu testen - Wichtig: Aktive Spam-IP einfügen
                // $ip = '41.249.250.211';
                // $result = $http_bl->query($ip);

                if($result == 2)
                {
                    return false;
                }
            }
        }
        // AKISMET - 1.5-10
        // Weitere Infos unter http://akismet.com/
        if($this->params->get('akismet'))
        {
            require_once(dirname(__FILE__).DS.'easycalccheckplus'.DS.'akismet.php');
            $WordPressAPIKey = $this->params->get('akismet_key');

            if($WordPressAPIKey)
            {
                $request = JRequest::get();

                $MyBlogURL = JURI::getInstance()->toString();

                $name = '';
                $email = '';
                $url = '';
                $comment = '';

                if($request['option'] == 'com_contact')
                {
                    $name = $request['name'];
                    $email = $request['email'];
                    $comment = $request['text'];
                }
                elseif($request['option'] == 'com_user' OR $request['option'] == 'com_alpharegistration' OR $request['option'] == 'com_cbe' OR $request['option'] == 'com_comprofiler')
                {
                    if(isset($request['username']))
                    {
                        $name = $request['username'];
                    }
                    if(isset($request['checkemail'])) // CB - Forgot Login
                    {
                        $email = $request['checkemail'];
                    }
                    else
                    {
                        $email = $request['email'];
                    }
                }
                elseif($request['option'] == 'com_alfcontact' OR $request['option'] == 'com_dfcontact' OR $request['option'] == 'com_qcontacts')
                {
                    $name = $request['name'];
                    $email = $request['email'];
                    if(isset($request['body'])) // QContacts - Textarea
                    {
                        $comment = $request['body'];
                    }
                    else
                    {
                        $comment = $request['message'];
                    }
                }
                elseif($request['option'] == 'com_flexicontact')
                {
                    $name = $request['fromName'];
                    $email = $request['fromAddress'];
                    $comment = $request['area_data'];
                }
                elseif($request['option'] == 'com_community')
                {
                    if(isset($request['jsusername']))
                    {
                        $name = $request['jsusername'];
                    }
                    $email = $request['jsemail'];
                }
                elseif($request['option'] == 'com_phocaguestbook')
                {
                    $name = $request['pgusername'];
                    $email = $request['email'];
                    $comment = $request['pgbcontent'];
                }
                elseif($request['option'] == 'com_easybookreloaded')
                {
                    $name = $request['gbname'];
                    $email = $request['gbmail'];
                    $comment = $request['gbtext'];
                    if(isset($request['gbpage']))
                    {
                        $url = $request['gbpage'];
                    }
                }
                elseif($request['option'] == 'com_virtuemart')
                {
                    if(isset($request['name']))
                    {
                        $name = $request['name'];
                    }
                    else
                    {
                        $name = $request['username'];
                    }
                    $email = $request['email'];
                    if(isset($request['text']))
                    {
                        $comment = $request['text'];
                    }
                }
                elseif($request['option'] == 'com_kunena')
                {
                    if(isset($request['authorname']))
                    {
                        $name = $request['authorname'];
                    }
                    if(isset($request['subject']))
                    {
                        $comment = $request['subject'];
                    }
                    if(isset($request['message']))
                    {
                        $comment .= $request['message'];
                    }
                }
                elseif($request['option'] == 'com_jobboard')
                {
                    if(isset($request['sender_name']))
                    {
                        $name = $request['sender_name'];
                    }
                    if(isset($request['first_name']))
                    {
                        $name = $request['first_name'];
                    }
                    if(isset($request['last_name']))
                    {
                        $name .= $request['last_name'];
                    }
                    if(isset($request['sender_email']))
                    {
                        $email = $request['sender_email'];
                    }
                    if(isset($request['email']))
                    {
                        $email = $request['email'];
                    }
                    if(isset($request['cover_text']))
                    {
                        $comment = $request['cover_text'];
                    }
                }

                $akismet = new Akismet($MyBlogURL, $WordPressAPIKey);
                $akismet->setCommentAuthor($name);
                $akismet->setCommentAuthorEmail($email);
                $akismet->setCommentAuthorURL($url);
                $akismet->setCommentContent($comment);

                if($akismet->isCommentSpam())
                {
                    return false;
                }
            }
        }
        // ReCaptcha - 1.5-10
        // Weitere Infos unter http://www.google.com/recaptcha
        if($this->params->get('recaptcha') AND $this->params->get('recaptcha_publickey') AND $this->params->get('recaptcha_privatekey'))
        {
            require_once(dirname(__FILE__).DS.'easycalccheckplus'.DS.'recaptchalib.php');
            $privatekey = $this->params->get('recaptcha_privatekey');

            $request = JRequest::get();

            $resp = recaptcha_check_answer($privatekey, $_SESSION["ip"], $request['recaptcha_challenge_field'], $request['recaptcha_response_field']);

            if(!$resp->is_valid)
            {
                return false;
            }
        }
        // Botscout - Überprüfung der IP Adresse - 1.5-13
        // Weitere Infos unter http://botscout.com/
        if($this->params->get('botscout') AND $this->params->get('botscout_key'))
        {
            $url = 'http://botscout.com/test/?ip='.$_SESSION["ip"].'&key='.$this->params->get('botscout_key');
            // Funktionstest - Auskommentieren, um zu testen - Wichtig: Aktive Spam-IP einfügen
            // $ip = '87.103.128.199';
            // $url = 'http://botscout.com/test/?ip='.$ip.'&key='.$this->params->get('botscout_key');
            $response = false;
            $is_spam = false;

            if(function_exists('curl_init'))
            {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                curl_close($ch);
            }

            if($response)
            {
                $is_spam = substr($response, 0, 1);
            }
            else
            {
                $response = @ fopen($url, 'r');

                if($response)
                {
                    while(!feof($response))
                    {
                        $line = fgets($response, 1024);

                        $is_spam = substr($line, 0, 1);
                    }
                    fclose($response);
                }
            }

            if($is_spam == 'Y' AND $response == true)
            {
                return false; // Spam IP-Adresse
            }
        }
        // Mollom - 1.5-13
        // Weitere Infos unter http://mollom.com/
        if($this->params->get('mollom') AND $this->params->get('mollom_publickey') AND $this->params->get('mollom_privatekey'))
        {
            require_once(dirname(__FILE__).DS.'easycalccheckplus'.DS.'mollom.php');

            Mollom::setPublicKey($this->params->get('mollom_publickey'));
            Mollom::setPrivateKey($this->params->get('mollom_privatekey'));

            $servers = Mollom::getServerList();

            $request = JRequest::get();

            $name = '';
            $email = '';
            $url = '';
            $comment = '';

            if($request['option'] == 'com_contact')
            {
                $name = $request['name'];
                $email = $request['email'];
                $comment = $request['text'];
            }
            elseif($request['option'] == 'com_user' OR $request['option'] == 'com_alpharegistration' OR $request['option'] == 'com_cbe' OR $request['option'] == 'com_comprofiler')
            {
                if(isset($request['username']))
                {
                    $name = $request['username'];
                }
                if(isset($request['checkemail'])) // CB - Forgot Login
                {
                    $email = $request['checkemail'];
                }
                else
                {
                    $email = $request['email'];
                }
            }
            elseif($request['option'] == 'com_alfcontact' OR $request['option'] == 'com_dfcontact' OR $request['option'] == 'com_qcontacts')
            {
                $name = $request['name'];
                $email = $request['email'];
                if(isset($request['body'])) // QContacts - Textarea
                {
                    $comment = $request['body'];
                }
                else
                {
                    $comment = $request['message'];
                }
            }
            elseif($request['option'] == 'com_flexicontact')
            {
                $name = $request['fromName'];
                $email = $request['fromAddress'];
                $comment = $request['area_data'];
            }
            elseif($request['option'] == 'com_community')
            {
                if(isset($request['jsusername']))
                {
                    $name = $request['jsusername'];
                }
                $email = $request['jsemail'];
            }
            elseif($request['option'] == 'com_phocaguestbook')
            {
                $name = $request['pgusername'];
                $email = $request['email'];
                $comment = $request['pgbcontent'];
            }
            elseif($request['option'] == 'com_easybookreloaded')
            {
                $name = $request['gbname'];
                $email = $request['gbmail'];
                $comment = $request['gbtext'];
                if(isset($request['gbpage']))
                {
                    $url = $request['gbpage'];
                }
            }
            elseif($request['option'] == 'com_virtuemart')
            {
                if(isset($request['name']))
                {
                    $name = $request['name'];
                }
                else
                {
                    $name = $request['username'];
                }
                $email = $request['email'];
                if(isset($request['text']))
                {
                    $comment = $request['text'];
                }
            }
            elseif($request['option'] == 'com_kunena')
            {
                if(isset($request['authorname']))
                {
                    $name = $request['authorname'];
                }
                if(isset($request['subject']))
                {
                    $comment = $request['subject'];
                }
                if(isset($request['message']))
                {
                    $comment .= $request['message'];
                }
            }
            elseif($request['option'] == 'com_jobboard')
            {
                if(isset($request['sender_name']))
                {
                    $name = $request['sender_name'];
                }
                if(isset($request['first_name']))
                {
                    $name = $request['first_name'];
                }
                if(isset($request['last_name']))
                {
                    $name .= $request['last_name'];
                }
                if(isset($request['sender_email']))
                {
                    $email = $request['sender_email'];
                }
                if(isset($request['email']))
                {
                    $email = $request['email'];
                }
                if(isset($request['personal_message']))
                {
                    $comment = $request['personal_message'];
                }
                if(isset($request['cover_text']))
                {
                    $comment = $request['cover_text'];
                }
            }

            $feedback = Mollom::checkContent(null, null, $comment, $name, $url, $email);

            if($feedback['spam'] == 'spam')
            {
                return false;
            }
        }

        unset($_SESSION["ip"]);
        return true;
    }
    // Ende Funktion performChecks

    /**
     * redirect function
     *
     * @access private
     *
     */
    private function redirect($returnURI)
    {
        // PHP Redirection
        header('Location: '.$returnURI);

        // JS Redirection
        ?>
        <script type="text/javascript">window.location = '<?php echo $returnURI; ?>'</script>
        <?php
        // Weiße Seite (im Notfall)
        echo JText::_('You have not resolved our spamcheck');
        jexit();
    }
    // Ende Funktion redirect

    /**
     * returns a random string
     *
     * @access private
     *
     * @return random string
     */
    private function random()
    {
        $pw = '';
        // 1. Zeichen muss ein Buchstabe sein
        $characters = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";
        $array_a = explode(",", $characters);
        $z = mt_rand(0, 25);
        $pw .= "".$array_a[$z]."";
        // restliche Zeichen beliebig
        $characters = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";
        $array_b = explode(",", $characters);
        $pw_l = mt_rand(4, 12);
        for($i = 0; $i < $pw_l; $i++)
        {
            srand((double) microtime() * 1000000);
            $z = mt_rand(0, 35);
            $pw .= "".$array_b[$z]."";
        }
        return $pw;
    }
    // Ende Funktion random

    /**
     * converts numbers into strings
     *
     * @access private
     *
     * @return string of a number
     */
    private function converttostring($x)
    {
        // Wahrscheinlichkeit 2/3 für Konvertierung
        $random = mt_rand(1, 3);

        if($random != 1)
        {
            if($x > 20)
            {
                return $x;
            }
            else
            {
                // Namen der Zahlen werden aus Sprachdatei ausgelesen - 1.5-7
                $names = array(JText::_('NULL'), JText::_('ONE'), JText::_('TWO'), JText::_('THREE'), JText::_('FOUR'), JText::_('FIVE'), JText::_('SIX'), JText::_('SEVEN'), JText::_('EIGHT'), JText::_('NINE'), JText::_('TEN'), JText::_('ELEVEN'), JText::_('TWELVE'), JText::_('THIRTEEN'), JText::_('FOURTEEN'), JText::_('FIFTEEN'), JText::_('SIXTEEN'), JText::_('SEVENTEEN'), JText::_('EIGHTEEN'), JText::_('NINETEEN'), JText::_('TWENTY'));
                return $names[$x];
            }
        }
        else
        {
            return $x;
        }
    }

// Ende Funktion converttostring

}
// Ende Klasse