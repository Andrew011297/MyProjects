<?php
$dbConn = new mysqli('localhost', 'unn_w16011147', 'password', 'unn_w16011147');

if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}
?>
