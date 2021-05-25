<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$dbConn = new mysqli('localhost', 'unn_w16011147', 'Fasran1997', 'unn_w16011147');

if ($dbConn === false) {
    echo '<p>Sorry the connection failed</p>';
    exit;
}

$filmID = isset($_REQUEST['filmID']) ? $_REQUEST['filmID'] : null;
$title = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
$categoryName = isset($_REQUEST['categoryName']) ? $_REQUEST['categoryName'] : null;
$notes = isset($_REQUEST['notes']) ? $_REQUEST['notes'] : null;

if (empty($filmID)) {
    echo '<p>Sorry, film ID required </p>';
}
if (empty($title)) {
    echo '<p>Sorry, title required </p>';
}
if (empty($categoryName)) {
    echo '<p>Sorry, categoryName required </p>';
}
if (empty($notes)) {
    echo '<p>Sorry, notes required </p>';
}
$filmID = $dbConn->escape_string($filmID);
$title = $dbConn->escape_string($title);
$categoryName = $dbConn->escape_string($categoryName);
$notes = $dbConn->escape_string($notes);

$updateSQL = "UPDATE film SET
title = '$title',
categoryName = '$categoryName',
notes = '$notes'
WHERE filmID = $filmID";

$success = $dbConn->query($updateSQL);
echo '<p>Record has been updated, to return click the link: <a href="chooseFilmList.php">Film List</a></p>'
?>
</body>
</html>