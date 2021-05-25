<!--Andrew Robson - w16011147-->
<!--This file is used to display all of the references I have used in the creation of this project.-->
<!--The user will need to be logged in to access the data-->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="styling.css"> <!--Links the stylesheet-->
    <title>Credits</title>
</head>
<body>
<?php
require_once ('functions.php'); //link to functions.php
ini_set("session.save_path", "/home/unn_w16011147/sessionData"); //initialises the session data
session_start(); //begins a session

$dbConn = getConnection(); //connects to the database

displayLoginLogout(); //displays the login functionality
displayNav(); //displays the navigation functionality

if (checkLogin()) //if the user is logged in then display the following
{
    echo "<p>Andrew Robson - w16011147 </p>\n";
    echo "<p><em>References: </em> </p>\n";
    echo "<p>(Meloni, 2007) Meloni, J. (2007). PHP, MYSQL, and Apache. Indianapolis, Ind.: Sams.</p>\n";
    echo "<p>(Negrino and Smith, 2009) Negrino, T. and Smith, D. (2009). JavaScript and Ajax for the web. 
         Berkeley: Peachpit Press.</p>\n";
    echo "<p>Unn-isrd1.newnumyspace.co.uk. (2017). The Wheel: Teaching. 
         [online] Available at: http://unn-isrd1.newnumyspace.co.uk/learn
         [Accessed 13 Dec. 2017]. </p>\n";
    echo "<p>W3schools.com. (2017). W3Schools Online Web Tutorials. 
         [online] Available at: https://www.w3schools.com/ [Accessed 15 Dec. 2017].</p>";
    echo "<p>Codecademy. (2017). JavaScript. 
         [online] Available at: https://www.codecademy.com/en/tracks/javascript [Accessed 15 Dec. 2017].</p>";
}
else //if the user is not logged in then display the following
{
    echo "<p>You must be logged in to access this content.</p>\n";
}
?>

</body>
</html>


