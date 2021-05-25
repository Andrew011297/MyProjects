<!--Andrew Robson - w16011147-->
<!--This page is essentially the homepage, all of the other pages can be reached
from this page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="styling.css"> <!--Links the stylesheet-->
    <title>Home page</title>
</head>
<body>

<?php
require_once ('functions.php'); //links to the function.php
ini_set("session.save_path", "/home/unn_w16011147/sessionData"); //initialise the session
session_start(); //begin the session

$dbConn = getConnection(); //connect to the database

displayLoginLogout(); //call the function to display the login/logout functionality
displayNav(); //call the function to display the navigation functionality
?>
<script type="text/javascript" src="offersAJAX.js"> //connect to offersAjax.js
</script>

<script type="text/javascript">
    //<![CDATA[
    'use strict';

    window.addEventListener('load', function initialise()
    {
        var offerReturned = function() //the 'offerReturned' is the function that will be altered every 5
        //seconds
        {
            getRequest('getOffers.php', transferOffer); //this returns a request to 'getOffers.php' and transfers it
            setTimeout(offerReturned, 5000); //this calls the function 'offeredReturn' every 5 seconds
            //5000 stands for 5000 millisecondsis, which is 5 seconds
        };
        offerReturned(); //calls itself, sending itself back though code
    });
    //]]>
</script>

<aside id='offers'> <!--the id 'offers' is crucial for the AJAX to work in this context-->

</aside>



</body>
</html>
