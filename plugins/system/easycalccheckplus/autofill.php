<?php
/**
 * @Copyright
 * @package    	EasyCalcCheck Plus
 * @author      Viktor Vogel {@link http://www.kubik-rubik.de}
 * @link        Project Site {@link http://joomla-extensions.kubik-rubik.de/ecc-easycalccheck-plus}
 */
// Kein direkter Zugriff
defined('_JEXEC') or die('Restricted access');

$session = JFactory::getSession();

if($option == 'com_contact' OR $option == 'com_qcontacts' OR $option == 'com_alfcontact' OR $option == 'com_dfcontact')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $name = $session->get('autofill_name', null, 'easycalccheck');
        if(!empty($name))
        {
            $muster = '@(<input[^>]+name="name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $email = $session->get('autofill_email', null, 'easycalccheck');
        if(!empty($email))
        {
            if($option == 'com_contact')
            {
                $muster = '@(<input type="text" id="contact_email" name="email".+(value="").*/>)@isU';
            }
            elseif($option == 'com_dfcontact')
            {
                $muster = '@(<input type="text" name="email" id="dfContactField-email" class="inputbox" (value="") style="width:.+em;" />)@isU';
            }
            elseif($option == 'com_alfcontact')
            {
                $muster = '@(<input class="text_area" name="email" id="email" type="text" size=".+" (value="")/>)@isU';
            }
            else
            {
                $muster = '@(<input[^>]+name="email".+(value="").*/>)@isU';
            }
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $subject = $session->get('autofill_subject', null, 'easycalccheck');
        if(!empty($subject))
        {
            $muster = '@(<input[^>]+name="subject".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$subject.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        if($option == 'com_contact')
        {
            $text = $session->get('autofill_text', null, 'easycalccheck');
            if(!empty($text))
            {
                $muster = '@(<textarea[^>]+name="text".+>(</textarea>))@isU';
                if(preg_match($muster, $body, $matches))
                {
                    $replace_value = preg_replace('@'.$matches[2].'@', $text.'</textarea>', $matches[1]);
                    $body = preg_replace($muster, $replace_value, $body);
                }
            }
        }
        elseif($option == 'com_qcontacts')
        {
            $body_q = $session->get('autofill_body', null, 'easycalccheck');
            if(!empty($body_q))
            {
                $muster = '@(<textarea[^>]+name="body".+>(</textarea>))@isU';
                if(preg_match($muster, $body, $matches))
                {
                    $replace_value = preg_replace('@'.$matches[2].'@', $body_q.'</textarea>', $matches[1]);
                    $body = preg_replace($muster, $replace_value, $body);
                }
            }
        }
        elseif($option == 'com_alfcontact' OR $option == 'com_dfcontact')
        {
            $message = $session->get('autofill_message', null, 'easycalccheck');
            if(!empty($message))
            {
                $muster = '@(<textarea[^>]+name="message".+>(</textarea>))@isU';
                if(preg_match($muster, $body, $matches))
                {
                    $replace_value = preg_replace('@'.$matches[2].'@', $message.'</textarea>', $matches[1]);
                    $body = preg_replace($muster, $replace_value, $body);
                }
            }
        }
    }
    $session->clear('autofill_name', 'easycalccheck');
    $session->clear('autofill_email', 'easycalccheck');
    $session->clear('autofill_subject', 'easycalccheck');
    $session->clear('autofill_text', 'easycalccheck');
    $session->clear('autofill_body', 'easycalccheck');
    $session->clear('autofill_message', 'easycalccheck');
}

if($option == 'com_user' OR $option == 'com_alpharegistration')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $name = $session->get('autofill_name', null, 'easycalccheck');
        if(!empty($name))
        {
            $muster = '@(<input[^>]+name="name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $username = $session->get('autofill_username', null, 'easycalccheck');
        if(!empty($username))
        {
            $muster = '@(<input[^>]+name="username".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$username.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $email = $session->get('autofill_email', null, 'easycalccheck');
        if(!empty($email))
        {
            $muster = '@(<input[^>]+name="email".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_name', 'easycalccheck');
    $session->clear('autofill_username', 'easycalccheck');
    $session->clear('autofill_email', 'easycalccheck');
}

if($option == 'com_community')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $jsname = $session->get('autofill_jsname', null, 'easycalccheck');
        if(!empty($jsname))
        {
            $muster = '@(<input[^>]+name="jsname".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$jsname.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $jsusername = $session->get('autofill_jsusername', null, 'easycalccheck');
        if(!empty($jsusername))
        {
            $muster = '@(<input[^>]+name="jsusername".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$jsusername.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $jsemail = $session->get('autofill_jsemail', null, 'easycalccheck');
        if(!empty($jsemail))
        {
            $muster = '@(<input[^>]+name="jsemail".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$jsemail.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_jsname', 'easycalccheck');
    $session->clear('autofill_jsusername', 'easycalccheck');
    $session->clear('autofill_jsemail', 'easycalccheck');
}

if($option == 'com_flexicontact')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $fromName = $session->get('autofill_fromName', null, 'easycalccheck');
        if(!empty($fromName))
        {
            $muster = '@(<input[^>]+name="fromName".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$fromName.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $fromAddress = $session->get('autofill_fromAddress', null, 'easycalccheck');
        if(!empty($fromAddress))
        {
            $muster = '@(<input[^>]+name="fromAddress".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$fromAddress.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $subject = $session->get('autofill_subject', null, 'easycalccheck');
        if(!empty($subject))
        {
            $muster = '@(<input[^>]+name="subject".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$subject.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $area_data = $session->get('autofill_area_data', null, 'easycalccheck');
        if(!empty($area_data))
        {
            $muster = '@(<textarea[^>]+name="area_data".+>(</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $area_data.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_fromName', 'easycalccheck');
    $session->clear('autofill_fromAddress', 'easycalccheck');
    $session->clear('autofill_subject', 'easycalccheck');
    $session->clear('autofill_area_data', 'easycalccheck');
}

if($option == 'com_phocaguestbook')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed' AND $_SESSION["phocaguestbook"] == 1)
    {
        $title = $session->get('autofill_title', null, 'easycalccheck');
        if(!empty($title))
        {
            $muster = '@(<input[^>]+name="title".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$title.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $pgusername = $session->get('autofill_pgusername', null, 'easycalccheck');
        if(!empty($pgusername))
        {
            $muster = '@(<input[^>]+name="pgusername".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$pgusername.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $email = $session->get('autofill_email', null, 'easycalccheck');
        if(!empty($email))
        {
            $muster = '@(<input[^>]+name="email".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $pgbcontent = $session->get('autofill_pgbcontent', null, 'easycalccheck');
        if(!empty($pgbcontent))
        {
            $muster = '@(<textarea[^>]+name="pgbcontent".+>(</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $pgbcontent.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_title', 'easycalccheck');
    $session->clear('autofill_pgusername', 'easycalccheck');
    $session->clear('autofill_email', 'easycalccheck');
    $session->clear('autofill_pgbcontent', 'easycalccheck');
}

if($option == 'com_comprofiler')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $name = $session->get('autofill_name', null, 'easycalccheck');
        if(!empty($name))
        {
            $muster = '@(<input[^>]+name="name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $firstname = $session->get('autofill_firstname', null, 'easycalccheck');
        if(!empty($firstname))
        {
            $muster = '@(<input[^>]+name="firstname".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$firstname.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $middlename = $session->get('autofill_middlename', null, 'easycalccheck');
        if(!empty($middlename))
        {
            $muster = '@(<input[^>]+name="middlename".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$middlename.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $lastname = $session->get('autofill_lastname', null, 'easycalccheck');
        if(!empty($lastname))
        {
            $muster = '@(<input[^>]+name="lastname".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$lastname.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $email = $session->get('autofill_email', null, 'easycalccheck');
        if(!empty($email))
        {
            $muster = '@(<input[^>]+name="email".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $username = $session->get('autofill_username', null, 'easycalccheck');
        if(!empty($username))
        {
            $muster = '@(<input[^>]+name="username".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$username.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $company = $session->get('autofill_company', null, 'easycalccheck');
        if(!empty($company))
        {
            $muster = '@(<input[^>]+name="company".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$company.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $city = $session->get('autofill_city', null, 'easycalccheck');
        if(!empty($city))
        {
            $muster = '@(<input[^>]+name="city".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$city.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $state = $session->get('autofill_state', null, 'easycalccheck');
        if(!empty($state))
        {
            $muster = '@(<input[^>]+name="state".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$state.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $zipcode = $session->get('autofill_zipcode', null, 'easycalccheck');
        if(!empty($zipcode))
        {
            $muster = '@(<input[^>]+name="zipcode".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$zipcode.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $country = $session->get('autofill_country', null, 'easycalccheck');
        if(!empty($country))
        {
            $muster = '@(<input[^>]+name="country".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$country.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $address = $session->get('autofill_address', null, 'easycalccheck');
        if(!empty($address))
        {
            $muster = '@(<input[^>]+name="address".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$address.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $phone = $session->get('autofill_phone', null, 'easycalccheck');
        if(!empty($phone))
        {
            $muster = '@(<input[^>]+name="phone".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$phone.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $fax = $session->get('autofill_fax', null, 'easycalccheck');
        if(!empty($fax))
        {
            $muster = '@(<input[^>]+name="fax".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$fax.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_name', 'easycalccheck');
    $session->clear('autofill_firstname', 'easycalccheck');
    $session->clear('autofill_middlename', 'easycalccheck');
    $session->clear('autofill_lastname', 'easycalccheck');
    $session->clear('autofill_email', 'easycalccheck');
    $session->clear('autofill_username', 'easycalccheck');
    $session->clear('autofill_company', 'easycalccheck');
    $session->clear('autofill_city', 'easycalccheck');
    $session->clear('autofill_state', 'easycalccheck');
    $session->clear('autofill_zipcode', 'easycalccheck');
    $session->clear('autofill_country', 'easycalccheck');
    $session->clear('autofill_address', 'easycalccheck');
    $session->clear('autofill_phone', 'easycalccheck');
    $session->clear('autofill_fax', 'easycalccheck');
}

if($option == 'com_cbe')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $firstname = $session->get('autofill_firstname', null, 'easycalccheck');
        if(!empty($firstname))
        {
            $muster = '@(<input[^>]+name="firstname".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$firstname.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $lastname = $session->get('autofill_lastname', null, 'easycalccheck');
        if(!empty($lastname))
        {
            $muster = '@(<input[^>]+name="lastname".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$lastname.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $username = $session->get('autofill_username', null, 'easycalccheck');
        if(!empty($username))
        {
            $muster = '@(<input[^>]+name="username".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$username.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $email = $session->get('autofill_email', null, 'easycalccheck');
        if(!empty($email))
        {
            $muster = '@(<input[^>]+name="email".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_firstname', 'easycalccheck');
    $session->clear('autofill_lastname', 'easycalccheck');
    $session->clear('autofill_username', 'easycalccheck');
    $session->clear('autofill_email', 'easycalccheck');
}

if($option == 'com_virtuemart')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $name = $session->get('autofill_name', null, 'easycalccheck');
        if(!empty($name))
        {
            $muster = '@(<input[^>]+name="name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $text = $session->get('autofill_text', null, 'easycalccheck');
        if(!empty($text))
        {
            $muster = '@(<textarea[^>]+name="text".+>(</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $text.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $username = $session->get('autofill_username', null, 'easycalccheck');
        if(!empty($username))
        {
            $muster = '@(<input[^>]+name="username".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$username.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $email = $session->get('autofill_email', null, 'easycalccheck');
        if(!empty($email))
        {
            $muster = '@(<input[^>]+name="email".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $company = $session->get('autofill_company', null, 'easycalccheck');
        if(!empty($company))
        {
            $muster = '@(<input[^>]+name="company".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$company.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $first_name = $session->get('autofill_first_name', null, 'easycalccheck');
        if(!empty($first_name))
        {
            $muster = '@(<input[^>]+name="first_name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$first_name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $last_name = $session->get('autofill_last_name', null, 'easycalccheck');
        if(!empty($last_name))
        {
            $muster = '@(<input[^>]+name="last_name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$last_name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $middle_name = $session->get('autofill_middle_name', null, 'easycalccheck');
        if(!empty($middle_name))
        {
            $muster = '@(<input[^>]+name="middle_name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$middle_name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $address_1 = $session->get('autofill_address_1', null, 'easycalccheck');
        if(!empty($address_1))
        {
            $muster = '@(<input[^>]+name="address_1".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$address_1.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $address_2 = $session->get('autofill_address_2', null, 'easycalccheck');
        if(!empty($address_2))
        {
            $muster = '@(<input[^>]+name="address_2".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$address_2.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $city = $session->get('autofill_city', null, 'easycalccheck');
        if(!empty($city))
        {
            $muster = '@(<input[^>]+name="city".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$city.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $zip = $session->get('autofill_zip', null, 'easycalccheck');
        if(!empty($zip))
        {
            $muster = '@(<input[^>]+name="zip".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$zip.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $phone_1 = $session->get('autofill_phone_1', null, 'easycalccheck');
        if(!empty($phone_1))
        {
            $muster = '@(<input[^>]+name="phone_1".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$phone_1.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $phone_2 = $session->get('autofill_phone_2', null, 'easycalccheck');
        if(!empty($phone_2))
        {
            $muster = '@(<input[^>]+name="phone_2".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$phone_2.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $fax = $session->get('autofill_fax', null, 'easycalccheck');
        if(!empty($fax))
        {
            $muster = '@(<input[^>]+name="fax".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$fax.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_name', 'easycalccheck');
    $session->clear('autofill_text', 'easycalccheck');
    $session->clear('autofill_username', 'easycalccheck');
    $session->clear('autofill_email', 'easycalccheck');
    $session->clear('autofill_company', 'easycalccheck');
    $session->clear('autofill_first_name', 'easycalccheck');
    $session->clear('autofill_last_name', 'easycalccheck');
    $session->clear('autofill_middle_name', 'easycalccheck');
    $session->clear('autofill_address_1', 'easycalccheck');
    $session->clear('autofill_address_2', 'easycalccheck');
    $session->clear('autofill_city', 'easycalccheck');
    $session->clear('autofill_zip', 'easycalccheck');
    $session->clear('autofill_phone_1', 'easycalccheck');
    $session->clear('autofill_phone_2', 'easycalccheck');
    $session->clear('autofill_fax', 'easycalccheck');
}

if($option == 'com_kunena')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $authorname = $session->get('autofill_authorname', null, 'easycalccheck');
        if(!empty($authorname))
        {
            $muster = '@(<input[^>]+name="authorname".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$authorname.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $subject = $session->get('autofill_subject', null, 'easycalccheck');
        if(!empty($subject))
        {
            $muster = '@(<input[^>]+name="subject".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$subject.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $message = $session->get('autofill_message', null, 'easycalccheck');
        if(!empty($message))
        {
            $muster = '@(<textarea[^>]+name="message".+>(</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $message.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_authorname', 'easycalccheck');
    $session->clear('autofill_subject', 'easycalccheck');
    $session->clear('autofill_message', 'easycalccheck');
}

if($option == 'com_easybookreloaded')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $user = JFactory::getUser();
        if($user->guest) // Pr�fen, ob Gast - nur bei G�sten eintragen - Fix 1.5-13
        {
            $gbname = $session->get('autofill_gbname', null, 'easycalccheck');
            if(!empty($gbname))
            {
                $muster = '@(<input[^>]+name=\'gbname\'.+(value=\'\').*/>)@isU';
                if(preg_match($muster, $body, $matches))
                {
                    $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbname.'"', $matches[1]);
                    $body = preg_replace($muster, $replace_value, $body);
                }
            }
            $gbmail = $session->get('autofill_gbmail', null, 'easycalccheck');
            if(!empty($gbmail))
            {
                $muster = '@(<input[^>]+name=\'gbmail\'.+(value=\'\').*/>)@isU';
                if(preg_match($muster, $body, $matches))
                {
                    $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbmail.'"', $matches[1]);
                    $body = preg_replace($muster, $replace_value, $body);
                }
            }
        }
        $gbpage = $session->get('autofill_gbpage', null, 'easycalccheck');
        if(!empty($gbpage))
        {
            $muster = '@(<input[^>]+name=\'gbpage\'.+(value=\'\').*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbpage.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $gbloca = $session->get('autofill_gbloca', null, 'easycalccheck');
        if(!empty($gbloca))
        {
            $muster = '@(<input[^>]+name=\'gbloca\'.+(value=\'\').*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbloca.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $gbicq = $session->get('autofill_gbicq', null, 'easycalccheck');
        if(!empty($gbicq))
        {
            $muster = '@(<input[^>]+name=\'gbicq\'.+(value=\'\').*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbicq.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $gbaim = $session->get('autofill_gbaim', null, 'easycalccheck');
        if(!empty($gbaim))
        {
            $muster = '@(<input[^>]+name=\'gbaim\'.+(value=\'\').*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbaim.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $gbmsn = $session->get('autofill_gbmsn', null, 'easycalccheck');
        if(!empty($gbmsn))
        {
            $muster = '@(<input[^>]+name=\'gbmsn\'.+(value=\'\').*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbmsn.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $gbyah = $session->get('autofill_gbyah', null, 'easycalccheck');
        if(!empty($gbyah))
        {
            $muster = '@(<input[^>]+name=\'gbyah\'.+(value=\'\').*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbyah.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $gbskype = $session->get('autofill_gbskype', null, 'easycalccheck');
        if(!empty($gbskype))
        {
            $muster = '@(<input[^>]+name=\'gbskype\'.+(value=\'\').*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$gbskype.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $gbvote = $session->get('autofill_gbvote', null, 'easycalccheck');
        if(!empty($gbvote))
        {
            $body = str_replace('<option>'.$gbvote.'</option>', '<option selected="selected">'.$gbvote.'</option>', $body);
        }
        $gbtext = $session->get('autofill_gbtext', null, 'easycalccheck');
        if(!empty($gbtext))
        {
            $muster = '@(<textarea[^>]+name=\'gbtext\'.+>(</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $gbtext.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_gbname', 'easycalccheck');
    $session->clear('autofill_gbtext', 'easycalccheck');
    $session->clear('autofill_gbmail', 'easycalccheck');
    $session->clear('autofill_gbpage', 'easycalccheck');
    $session->clear('autofill_gbloca', 'easycalccheck');
    $session->clear('autofill_gbicq', 'easycalccheck');
    $session->clear('autofill_gbaim', 'easycalccheck');
    $session->clear('autofill_gbmsn', 'easycalccheck');
    $session->clear('autofill_gbyah', 'easycalccheck');
    $session->clear('autofill_gbskype', 'easycalccheck');
    $session->clear('autofill_gbvote', 'easycalccheck');
}

if($option == 'com_jobboard')
{
    if(JRequest::getCmd('essp_err', '', 'get') == 'check_failed')
    {
        $first_name = $session->get('autofill_first_name', null, 'easycalccheck');
        if(!empty($first_name))
        {
            $muster = '@(<input[^>]+name="first_name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$first_name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $last_name = $session->get('autofill_last_name', null, 'easycalccheck');
        if(!empty($last_name))
        {
            $muster = '@(<input[^>]+name="last_name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$last_name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $email = $session->get('autofill_email', null, 'easycalccheck');
        if(!empty($email))
        {
            $muster = '@(<input[^>]+name="email".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $tel = $session->get('autofill_tel', null, 'easycalccheck');
        if(!empty($tel))
        {
            $muster = '@(<input[^>]+name="tel".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$tel.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $title = $session->get('autofill_title', null, 'easycalccheck');
        if(!empty($title))
        {
            $muster = '@(<input[^>]+name="title".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$title.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $cover_text = $session->get('autofill_cover_text', null, 'easycalccheck');
        if(!empty($cover_text))
        {
            $muster = '@(<textarea[^>]+name="cover_text".+>(</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $cover_text.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $sender_email = $session->get('autofill_sender_email', null, 'easycalccheck');
        if(!empty($sender_email))
        {
            $muster = '@(<input[^>]+name="sender_email".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$sender_email.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $sender_name = $session->get('autofill_sender_name', null, 'easycalccheck');
        if(!empty($sender_name))
        {
            $muster = '@(<input[^>]+name="sender_name".+(value="").*/>)@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', 'value="'.$sender_name.'"', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $rec_emails = $session->get('autofill_rec_emails', null, 'easycalccheck');
        if(!empty($rec_emails))
        {
            $muster = '@(<textarea[^>]+name="rec_emails"?+>(</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $rec_emails.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
        $personal_message = $session->get('autofill_personal_message', null, 'easycalccheck');
        if(!empty($personal_message))
        {
            $muster = '@(<textarea[^>]+name="personal_message"?+>(.*</textarea>))@isU';
            if(preg_match($muster, $body, $matches))
            {
                $replace_value = preg_replace('@'.$matches[2].'@', $personal_message.'</textarea>', $matches[1]);
                $body = preg_replace($muster, $replace_value, $body);
            }
        }
    }
    $session->clear('autofill_sender_name', 'easycalccheck');
    $session->clear('autofill_cover_text', 'easycalccheck');
    $session->clear('autofill_rec_emails', 'easycalccheck');
    $session->clear('autofill_personal_message', 'easycalccheck');
    $session->clear('autofill_last_name', 'easycalccheck');
    $session->clear('autofill_first_name', 'easycalccheck');
    $session->clear('autofill_title', 'easycalccheck');
    $session->clear('autofill_tel', 'easycalccheck');
    $session->clear('autofill_sender_email', 'easycalccheck');
    $session->clear('autofill_email', 'easycalccheck');
}
JResponse::setBody($body);
?>