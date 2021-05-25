<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
</head>
<body>
<h1>Students</h1>

<?php
include 'database_conn.php';      // make db connection
include 'searchByStageForm.html';

$srs_student = isset($_REQUEST['stage']) ? $_REQUEST['stage'] : null;
$sql = "SELECT studentid, forename, surname,coursecode, stage, email FROM srs_student
WHERE $stage = stage";
$queryResult = $dbConn->query($sql);
if($queryResult === false) {
    echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
    exit;
}
else {
    while($rowObj = $queryResult->fetch_object()){
        $studentid = $rowObj->studentid;
        $forename = $rowObj->forename;
        $surname = $rowObj->surname;
        $coursecode = $rowObj->coursecode;
        $stage = $rowObj->stage;
        $email = $rowObj->email;
        echo "<div class='student'>
        <span class='studentid'>$studentid</span>
        <span class='forename'>$forename</span>
        <span class='surname'>$surname</span>
        <span class='courseCode'>$coursecode</span>
        <span class='stage'>$stage</span>
        <span class='email'>$email</span>
        </div>";
    }
}
$queryResult->close();
$dbConn->close();
?>
</body>
</html>/