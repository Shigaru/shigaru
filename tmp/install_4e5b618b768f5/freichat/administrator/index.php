<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
require('../arg.php');

$path_host = str_replace("administrator/index.php", "", "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);

if (isset($_POST['login'])) {


    $password = $_POST['pswd'];

    if ($password == $admin_pswd) { //Replace mypassword with your password it login
        $_SESSION['phplogin'] = true;
//echo 'ddd';
        header('Location: ' . $path_host . 'server/admin.php'); //Replace index.php with what page you want to go to after succesful login

        exit;
    } else {
        ?>
        <script type="text/javascript">
            <!--
            alert('Wrong Password, Please Try Again')
            //-->
        </script>
        <?php
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="index.css"/>
        <style type="text/css">
            body{
                background-attachment:fixed;
                background-position:center;
                background-repeat:no-repeat;
            }
        </style>
        <title> PHP Login </title>
    </head>
    <body background="../server/admin_files/home/untitled.png">

        <div>

            <img src="../server/admin_files/home/head.png" height=100 width=100% />
        </div>


        <center><h1>FreiChatX Login </h1></center>
        <div id="main" class="main">
            <h2>Administration Authentication</h2>
            <div id="container" class="container">
                <form method="post" action="index.php">

                    <b>Enter Password:</b><br><br/>
                    &nbsp;<input style="width: 200px; border: 1px solid gray" type="password" name="pswd" value=''><br/>
                    <br/><span class="info">(defined in freichat/arg.php)</span><br/><br/>
                    <input type="submit" name="login" value="Login">
                </form>
            </div>
        </div>
    </body>
</html>
