<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
session_start();
if (!isset($_SESSION['FREIX'])) {
    $_SESSION['FREIX'] = 'authenticated';
}
require('../arg.php');
$_SESSION['index'] = time() + rand(989, 98999);
if ($installed == true) {
    echo "<b>FreiChatX is already installed on your server </b><br/><br/>Hence for security reasons , the install has been locked.<br/><br/>Yet if you want to install it again or think if FreiChatX is wrong <br/> please change the variable \$installed to false in ~/freichat/arg.php and then refresh this page";
    exit;
}
?>
<?php
require("head.php");
?>

<li><b><u>License</u></b></li>
<li>Install Type</li>
<li>Configuration Check</li>
<li>Configuration Details</li>
<li>Setup</li>


<?php
require("mid.php");
?>
<p>Welcome to FreiChatX Installation</p>
<p><br/>Please Read The Document Carefully<br/><br/></p>

<div style='overflow:scroll;width:100%;height:300px;text-align:left;'>
<?php echo str_replace("\n", "<br/>", file_get_contents('license.txt')); ?>
</div>
<form action="specific.php?<?php echo $_SESSION['index']; ?>=true" method="post">
    <input type="submit" name="Next" value="Accept">
    <input type="submit" name="Deny" value="Deny">
</form>

<?php
require("foot.php");
?>
