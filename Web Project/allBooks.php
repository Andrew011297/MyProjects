<!--Andrew Robson - w16011147-->
<!--This file will be used to display all of the books to the user -->
<!--The user will need to be logged in if they wish to access the data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="styling.css"> <!--Links the stylesheet-->
    <title>List All Books</title>
</head>
<body>
<?php
require_once ('functions.php'); //links to functions.php
ini_set("session.save_path", "/home/unn_w16011147/sessionData"); //initialises the session data
session_start(); //begins a session

$dbConn = getConnection(); //connects to the database

displayLoginLogout(); //calls function to display login functionality
displayNav(); //calls a function to display navigation

if (checkLogin()) //if the user is logged in then proceed
{
    //sql statement to retrieve the data from nbc_books
    $sqlSelect = "SELECT bookISBN, bookTitle, bookYear, pubID, catID, bookPrice
                  FROM nbc_books
                  ORDER BY bookTitle";

    $result = $dbConn->prepare($sqlSelect); //prepare the statement
    $result->execute(); //execute the statement

    while ($returnedBook = $result->fetchObject()) //while values are being returned echo out the following
    {
        //applies a link to the results, when clicked the user is redirected to the edit page
        echo "<div class='bookOption'>\n
        <span class='ISBN - '>
        <a href='editBook.php?bookISBN={$returnedBook->bookISBN}'>{$returnedBook->bookISBN}</span>\n
        <span class='Title - '>{$returnedBook->bookTitle}</span>\n
	    <span class='Year - '>{$returnedBook->bookYear}</span>\n
	    <span class='PublisherID - '>{$returnedBook->pubID}</span>\n
	    <span class='CategoryID - '>{$returnedBook->catID}</span>\n
	    <span class='Price - '>{$returnedBook->bookPrice}</span>\n
	    </div>\n";
    }
}
else //if the user is not logged in then echo out the following
{
    echo "<p>You must be logged in to access this content.</p>\n";
}

?>
</body>
</html>