<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$dbConn = new mysqli('localhost', 'unn_w16011147', 'Fasran1997', 'unn_w16011147');

if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}

$filmID = isset($_REQUEST['filmID']) ? $_REQUEST['filmID']: null;
$sql = "SELECT filmID, title, categoryName, notes
FROM film 
WHERE filmID = $filmID";

$queryResult = $dbConn->query($sql);

$rowObj = $queryResult->fetch_object();
$filmID = $rowObj->filmID;
$title = $rowObj->title;
$categoryName = $rowObj->categoryName;
$notes = $rowObj->notes;

echo "<form method='get'    action='updateFilm.php'>
Film ID: 
<input type='text'
       name='filmID'
       value='$filmID ' /> <br /><br />
       
Title: 
<input type='text'
       name='title'
       value='$title' /> <br /><br />
Category:
<input type='text'
       name='categoryName'
       value='$categoryName' /><br /><br />
       
Film notes:
<textarea
       name='notes'
       value='$notes'>$notes</textarea><br /><br />
       
<input type=\"submit\" value=\"Update film\">

</form>";
//'\t (tab)'
//'\n (new line)'
?>
</body>
</html>

