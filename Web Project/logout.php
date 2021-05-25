<!--Andrew Robson - w16011147-->
<!--This page performs the functionality required for logging out-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Logout</title>
</head>
<body>
<?php
require_once("functions.php"); //link to functions.php, allows use of functions declared within it
ini_set("session.save_path", "/home/unn_w16011147/sessionData"); //initialise the session data
session_start(); //begin a session

$_SESSION = array(); //makes the $_SESSION an empty array, therefore web pages wont load automatically logged in

session_destroy(); //destroys the session
//Gives the users the option to return to allBooks.php
echo "<p>Logout successful. <a href='allBooks.php'>Return</a>.</p>";


?>

</body>
</html>