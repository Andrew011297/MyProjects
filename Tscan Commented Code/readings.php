<?php
/*
reading.php provides a table for the data from clean.sql to be stored in,
table.css provides styling for this page.
Since the database could not be connected to for now, the data in the table is 
placeholder, yet allows for task 3 to be completed which is the styling of the table.
*/
    //include 'sensor.php';
    /*include 'sensor2.php';
    include 'dbConn.php';
    DatabaseConnection2();
    readings2();*/
?>

<link rel="stylesheet" href="<?=base_url('styles/table.css')?>" type="text/css">
<table>
    <thead>
        <tr>
            <th>Sensor ID</th>
            <th>Sensor Name</th>
            <th>Company Name</th>
            <th>Reading Date/Time (DD/MM/YYYY H:m:s)</th>
            <th>Reading (2 decimal places)</th>
        </tr>
        <tr>
    <td>1</td>
    <td>name1</td>
    <td>companyname1</td>
    <td>00/00/0000 00:00:00</td>
    <td>0.00</td>
  </tr>
  <tr>
    <td>2</td>
    <td>name2</td>
    <td>companyname1</td>
    <td>00/00/0000 00:00:00</td>
    <td>0.00</td>
  </tr>
  <tr>
    <td>3</td>
    <td>name3</td>
    <td>companyname1</td>
    <td>00/00/0000 00:00:00</td>
    <td>0.00</td>
  </tr>
  <tr>
    <td>4</td>
    <td>name4</td>
    <td>companyname1</td>
    <td>00/00/0000 00:00:00</td>
    <td>0.00</td>
  </tr>
  <tr>
    <td>5</td>
    <td>name5</td>
    <td>companyname1</td>
    <td>00/00/0000 00:00:00</td>
    <td>0.00</td>
  </tr>
  <tr>
    <td>6</td>
    <td>name6</td>
    <td>companyname1</td>
    <td>00/00/0000 00:00:00</td>
    <td>0.00</td>
  </tr>
    </thead>
</table>

