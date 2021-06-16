<?php

/*
Created dbConn to act as a callable function to connect directly to the local database,
can be reused easily. 
Connects to database by providing address, username, and password (additional optional criteria can be provided such as 
the database name and the port being connected on).
*/
    function DatabaseConnection2() 
    {
        $host ="host.docker.internal";
        $username ="root";
        $password ="password";
        //$dbname ="clean";
        //$port = "33066";

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

        //Creates the database connection
        $dbConn = new mysqli($host, $username, $password);

        //Checks the database connection
        //If the database can not be connected to, will return an error message.
        if ($dbConn->connect_error) 
        {
            echo "<p>Connection Failed: ".$dbConn->connect_error."</p>\n";
           exit;
        }

        echo "Connected Successfully";
    }
?>