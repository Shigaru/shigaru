<?php
session_start();

/* Make me secure */


if (!isset($_SESSION['FREIX']) || $_SESSION['FREIX'] != 'authenticated' || isset($_POST["Deny"]) == true || !isset($_GET[$_SESSION['index']])) {
    header("Location:index.php");
    exit;
}

/* Now i am secure */
?>
<?php
require("head.php");
?>
<li><b><s>License</s></b></li>
<li><b><u>Install Type</u></b></li>
<li>Configuration Check</li>
<li>Configuration Details</li>
<li>Setup</li>
<?php
require("mid.php");
?>
<div id='main'><p><br/><br/>Choose Your CMS/Forum/Blog with which FreiChatX has to be integrated(choose customized otherwise)</p><br/>

    <form name="cms" action="info.php" method="POST">
        <select name='cms'>
            <option selected="selected"></option>
            <option name="ccms" value="Joomla">Joomla</option>
            <option name="ccms" value="JCB">Joomla with CB</option>
            <option name="ccms" value="JSocial">Joomla with JomSocial</option>
            <option name="ccms" value="CBE">Joomla with CBE</option>
            <option name="ccms" value="Drupal">Drupal</option>
            <option name="ccms" value="WordPress">WordPress</option>
            <option name="ccms" value="Elgg">Elgg</option>
            <option name="ccms" value="Phpbb">Phpbb</option>
            <option name="ccms" value="Sugarcrm">Sugarcrm</option>
            <option name="ccms" value="Phpvms">PhpVMS</option>
            <option name="ccms" value="Custom">Customized</option>
        </select>
        <br/><br/>
        <input type="submit" value="Submit" />
    </form>
    <?php
    require("foot.php");
    ?>
