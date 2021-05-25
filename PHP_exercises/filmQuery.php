<?php
include 'database_conn.php';      // make db connection
include 'filmStyle.css';


$sql = "SELECT filmID, title, categoryName, notes FROM film ORDER BY title";
$queryResult = $dbConn->query($sql);
if($queryResult === false) {
    echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
    exit;
}
else {
    while($rowObj = $queryResult->fetch_object()){
        $filmTitle = $rowObj->title;
        $filmID = $rowObj->filmID;
        $filmCat = $rowObj->categoryName;
        $filmNotes = $rowObj->notes;
        echo "<div class='film'>
        <span class='filmID'>$filmID</span>
        <span class='title'>$filmTitle</span>
        <span class='category'>$filmCat</span>
        <span class='notes'>$filmNotes</span>
        </div>";
    }
}
$queryResult->close();
$dbConn->close();
?>
