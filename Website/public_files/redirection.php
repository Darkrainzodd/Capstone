<?php
// Include the shared code
include '../lib/common.php';
include '../lib/db.php';
include '../lib/functions.php';
include '../lib/User.php';

// Start or continue the session.
session_start();

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $test = $GLOBALS['TEMPLATE']['content'] = '<p>Be sure to verify your ' .
                'account by visiting <a href="signin.php?uid=' . 
                $u->userId . '&token=' . $token . '">here' . '</a></p>';

            $username = $_POST["username"];
            $message = "<html><body>Thank you for registering $username! Your account has been sucessfully created.
            $test
            If you are seeing this email in error, please contact us at webmaster@gameoverx.com. See you in the community!</body><html>";
            $subject = "Welcome To Game Over X!";
            $to = $_POST["email"];

            $message = wordwrap($message, 90, "\r\n");
            
            mail($to, $subject, $message, $headers);
			
			echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
            
            ?>
<!DOCTYPE html>
    <head>
        <title></title>
        <meta http-equiv="refresh" content="4;URL=index.php">
    </head>
	
    <body>
            Thank you for signing up, this page will redirect you to the homepage shortly. if you do not get redirected then click <a href="index.php">here</a>
    </body>
</html>