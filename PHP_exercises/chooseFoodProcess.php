<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Food results</title>
</head>
<body>
<?php
$food = isset($_REQUEST['food'])?$_REQUEST['food']:null;
echo "<section>\n";
echo "\t<h1>Foods that you liked</h1>\n";
echo "\t<h2>Your details</h2>\n";
$forename = isset($_REQUEST['forename'])?$_REQUEST['forename']:null;
if(empty($forename)){
    echo "<p>You have not selected a forename. Please try again.</p>\n";
}
if(isset($forename)){
    echo "\t<p>Forename: $forename</p>\n";
}
$surname = isset($_REQUEST['surname'])?$_REQUEST['surname']:null;
if(empty($surname)){
    echo "<p>You have not selected a surname. Please try again.</p>\n";
}
if(isset($surname)){
    echo "\t<p>Surname: $surname</p>\n";
}
$studyLevel = isset($_REQUEST['studyLevel'])?$_REQUEST['studyLevel']:null;
if(empty($studyLevel)){
    echo "<p>You have not selected a study level. Please try again.</p>\n";
}
if(isset($studyLevel)){
    echo "\t<p>Level of study: $studyLevel</p>\n";
}
$gender = isset($_REQUEST['gender'])?$_REQUEST['gender']:null;
if(empty($gender)){
    echo "<p>You have not selected a gender. Please try again.</p>\n";
}
if(isset($gender)){
    echo "\t<p>Gender: $gender</p>\n";
}
echo "\t<h2>Foods that you like</h2>\n";
if(isset($food)){
    echo "\t<p>You like the following type(s) of food: ";
foreach ($food as $foodType) {
    echo "$foodType ";
}
}
if(empty($food)){
    echo "<p>You did not like any of the foods listed.</p>\n";
}
echo "\t</p>\n";
echo "</section>\n";?>
</body>
</html>
