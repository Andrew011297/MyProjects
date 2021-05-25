<!--Andrew Robson - w16011147-->
<!--This file will display the edit form that the user be directed to from 'allBooks.php'-->
<!--The user will need to be logged in to access this page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="styling.css"> <!--Links the stylesheet-->
    <title>Edit Books</title>
</head>
<body>
<?php
require_once("functions.php"); //links the file to functions.php
$dbConn = getConnection(); //connects the file to the database
ini_set("session.save_path", "/home/unn_w16011147/sessionData"); //initialises the session data
session_start(); //begins a session
displayLoginLogout(); //displays the login functionality
displayNav(); //displays the navigation functionality

if(checkLogin()) //if the user is logged in then proceed
{
    $bookISBN = filter_has_var(INPUT_GET, 'bookISBN') ? $_GET['bookISBN'] : null;
    //retrieves the bookISBN number from the previous page
    $bookISBN = trim($bookISBN); //trims the bookISBN in case there is any spaces either side

    if (!$bookISBN) //if bookISBN is null then display the following
    {
        echo "<p>No ISBN number has been passed.</p>\n";
        echo "<p>To return to book list, click <a href='allBooks.php'>Here</a></p>"; //provides a link to book list
        exit;
    }

    try
    {
        $sqlSelect = "SELECT bookISBN, bookTitle, bookYear, pubID, catID, bookPrice
                  FROM nbc_books
                  WHERE bookISBN = $bookISBN"; //retrieve all the data relevant for a specific bookISBN

        $queryResult  = $dbConn->query($sqlSelect);
        $returnedBook = $queryResult->fetchObject();

        echo "<span class='bookTitle'>{$returnedBook->bookTitle} . $bookISBN</span><br>";
        echo "<form method='get' action='updateBook.php'> 
        <!--when the form is submitted, it will send its data to updateBook.php-->
   
Book ISBN: 
<input type='text'
       name='bookISBN'
       value='$bookISBN' readonly/> <br /><br />
       
Title: 
<input type='text'
       name='bookTitle'
       value='{$returnedBook->bookTitle}' /> <br /><br />
Year:
<input type='text'
       name='bookYear'
       value='{$returnedBook->bookYear}' /><br /><br />
Publisher ID:
<input type='text'
       name='pubID'
       value='{$returnedBook->pubID}' /><br /><br />
Category ID:
<input type='text'
       name='catID'
       value='{$returnedBook->catID}' /><br /><br />
Price:
<input type='text'
       name='bookPrice'
       value='{$returnedBook->bookPrice}' /><br /><br />
       
<input type=\"submit\" value=\"Update Book\">

</form>";

    } catch (Exception $e)
    {
        echo "<p>Query failed: " . $e->getMessage() . "</p>\n"; //informs the user if the query failes
    }
}
else //if the user is not logged in then display the following
{
    echo "<p>You must be logged in to access this content.</p>\n";
}
?>
</body>
</html>