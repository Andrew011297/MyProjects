<?php
/*
Troubleshooting, made this 'sensor2' in an attempt to try and get the database to connect
'readings2' selects all data from the sensor table, joins the company table onto it, and then joins the readings table onto it.
Afterwards it stores the data in a row object which is passed to a variable, that is displayed in a <span> to be applied to the table hence onwards.
Connection to the database is then closed. 
*/
function readings2()
{
    
    //Joins 3 tables together based on ID data.
    $sql = "SELECT * FROM sensor LEFT JOIN company ON company.id = sensor.id LEFT JOIN readings.sensor_id = sensor.id";
    $queryResult = $dbConn->query($sql);

    //If the database cannot be connected to, an error message is returned
    if($queryResult === false) {
        echo "<p>Query Failed: ".$dbConn->error."</p>";
        exit;
    }

    //Connection to the database is established and database data can be passed to variables
    //Data in the span will then be passed to 'readings.php' to be stored in the table per task 2.
    else 
    {
        while($rowObj = $queryResult->fetch_object()) 
        {
            $sensorid = $rowObj->sensorid;
            $sensorname = $rowObj->sensorname;
            $companyname = $rowObj->companyname;
            $readingtime = $rowObj->readingtime;
            $reading = $rowObj->reading;

            echo"<div class='results'>
            <span> $sensorid </span>
            <span> $sensorname </span>
            <span> $companyname </span>
            <span> $readingtime </span>
            <span> $reading </span>
            </div>";
        }
    }
    //Database connection is closed
    $queryResult->close();
    $dbConn->close();
}
?>