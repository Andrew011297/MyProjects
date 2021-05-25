<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Fish Results</title>
</head>
<body>
<h1>Fish chosen</h1>
<?php
$fish = $_GET['fish'];
$amount =  $_GET['number'];
echo "<p>The fish you have chosen is $fish</p>";
echo "<p>You have decided to purchase $amount</p>";
?>
</body>
</html>
