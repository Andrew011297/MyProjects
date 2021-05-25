<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$db = new mysqli('localhost', 'unn_w16011147', 'Fasran1997', 'unn_w16011147');
if ($db === false) {
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
$filmID = $db->escape_string($filmID);
$title = $db->escape_string($title);
$categoryName = $db->escape_string($categoryName);
$notes = $db->escape_string($notes);

$updateSQL = "UPDATE film SET
title = '$title',
categoryName = '$categoryName',
notes = '$notes'
WHERE filmID = $filmID";

$success = $db->query($updateSQL);
/*if ($success === false) {
    echo “<p>sorry, problem when saving, “;
    echo “<a href=‘inputForm.php’>try again</a></p>\n”;
} else {
    echo “<p>Thanks $custforename for your info</p>\n”;
}
echo “<p>Return to the            <a href=‘index.html’>Home page</a></p>\n”;
*/
?>
</body>
</html>

