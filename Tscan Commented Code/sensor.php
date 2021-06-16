<?php
/*
Sensor.php includes two functions, DatabaseConnection() and readings(). 
'DatabaseConnection' gains access to the database by passing the address, username, and password.
'readings' selects all data from the sensor table, joins the company table onto it, and then joins the readings table onto it.
Afterwards it stores the data in a row object which is passed to a variable, that is displayed in a <span> to be applied to the table hence onwards.
Connection to the database is then closed. 
*/
function DatabaseConnection() 
{
    $host = 'host.docker.internal';
    $username ="root";
    $password ="password";
    //$dbname ="clean";
    //$port = "33066";

    //Create Connection
    /*
        This line will lead to the connection being refused by the database and i am unsure why
        I have:
        Terminated all processes on port 33066 in terminal.
        Used localhost instead of an address.
        Manually put the host, username, password strings inline. 
        Turned off firewall/antivirus in case of interference.
        re-downloaded tscan files.
        Used host.docker.internal in place of address. 
        */ 
    $dbConn = new mysqli($host, $username, $password);

    //Checks database Connection
    if ($dbConn->connect_error) 
    {
        //returns error message
        echo "<p>Connection Failed: ".$dbConn->connect_error."</p>\n";
        exit;
    }
    //confirms database connection
    echo "Connected Successfully";
}

function readings()
{
    //Calls the database connection function, meaning that only one function (readings) will need to be called.
    DatabaseConnection();

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