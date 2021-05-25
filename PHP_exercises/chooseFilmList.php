<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href ="PracticeCSS.css" rel="stylesheet" type="text/css" />
    <title>Title</title>
</head>
<body>
<?php
include 'database_conn.php';

$sql = "SELECT filmID, title, categoryName, notes FROM film ORDER BY title";
$queryResult = $dbConn->query($sql);
if($queryResult === false) {
    echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
    exit;
}
else {
    while($rowObj = $queryResult->fetch_object()){
        $filmID = $rowObj->filmID;
        $filmTitle = $rowObj->title;
        $filmCat = $rowObj->categoryName;

        echo "<div class='film'>
        <span class ='category'><a href='editFilmForm.php?filmID=$filmID'>$filmTitle</a></span>
        <p> , </p>
        <span class='category'>$filmCat</span>
        </div>";
    }
}
$queryResult->close();
$dbConn->close();
?>
</body>
</html>
<?php
