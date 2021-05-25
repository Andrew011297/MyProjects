<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
include 'database_conn.php';
$custforename = $_REQUEST['forename'];
$custsurname = $_REQUEST['surname'];
$custemail = $_REQUEST['email'];
$rlocation = $_REQUEST['locationID'];
$qservice = $_REQUEST['service'];
$qfood = $_REQUEST['food'];
$morefeedback = $_REQUEST['additionalFeedback'];
$insertSQL = "insert into fine_feedback(custForename, custSurname, custEmail, rLocation, qService, qFood, moreFeedback)
              values ('$custforename', '$custsurname', '$custemail', '$rlocation', '$qservice', '$qfood', '$morefeedback')";


$dbConn->close();
?>

</body>
</html>


//if not empty for the personal details (advanced task)