<!--Andrew Robson - w16011147-->
<!--this page holds the functionality that updates the book and executes the changes to the database-->
<!--the user will need to be logged in if they want to be able to update a book-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="styling.css"> <!--Links the stylesheet-->
    <title>Update Book</title>
</head>
<body>
<?php
require_once("functions.php"); //link to functions.php
ini_set("session.save_path", "/home/unn_w16011147/sessionData"); //initialises session
session_start(); //starts the session
displayLoginLogout(); //displays the login/logout functionality
displayNav(); //displays the navigation functionality

if (checkLogin()) //if the user is logged in, proceed
{
    $errors = false; //declare errors as false since it is the start of the program
    //retrieves the bookISBN from the previous page
    $bookISBN  = filter_has_var(INPUT_GET, 'bookISBN') ? $_GET['bookISBN'] : null;
    //retrieves the bookTitle from the previous page
    $bookTitle = filter_has_var(INPUT_GET, 'bookTitle') ? $_GET['bookTitle'] : null;
    //retrieves the bookYear from the previous page
    $bookYear  = filter_has_var(INPUT_GET, 'bookYear') ? $_REQUEST['bookYear'] : null;
    //retrieves the catID from the previous page
    $catID     = filter_has_var(INPUT_GET, 'catID') ? $_GET['catID'] : null;
    //retrieves the pubID from the previous page
    $pubID     = filter_has_var(INPUT_GET, 'pubID') ? $_GET['pubID'] : null;
    //retrieves the bookPrice from the previous page
    $bookPrice = filter_has_var(INPUT_GET, 'bookPrice') ? $_GET['bookPrice'] : null;

    $bookISBN  = trim($bookISBN); //trims the whitespace around the variable
    $bookTitle = trim($bookTitle); //trims the whitespace around the variable
    $bookYear  = trim($bookYear); //trims the whitespace around the variable
    $catID     = trim($catID); //trims the whitespace around the variable
    $pubID     = trim($pubID); //trims the whitespace around the variable
    $bookPrice = trim($bookPrice); //trims the whitespace around the variable

    if (empty($bookTitle)) //checks if the variable is empty
    {
        echo "<p>Please enter a title for the book.</p>\n";
        $errors = true;
    }

    if (empty($bookYear)) //checks if the variable is empty
    {
        echo "<p>Please enter a year for the book.</p>\n";
        $errors = true;
    }

    else {
        if (!filter_var($bookYear, FILTER_VALIDATE_INT)) //validates the bookYear by making sure it is an integer
        {
            echo "<p>Please enter the year as a number e.g. 2008</p>\n";
            $errors = true;
        }
    }

    if (empty($catID)) //checks if the variable is empty
    {
        echo "<p>Please enter a category ID for the book.</p>\n";
        $errors = true;
    }

    else {
        //makes sure that only the alphabet is being used, no symbols
        if (!filter_var($catID, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Z]+$/i"))))
        {
            echo "<p>Please enter the catID using only letters, no symbols.</p>\n";
            $errors = true;
        }
    }

    if (empty($pubID)) //checks if the variable is empty
    {
        echo "<p>please enter a pubID for the book.</p>\n";
        $errors = true;
    }

    else
    {
        //makes sure that the alphabet is being used, no symbols
        if (!filter_var($pubID, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Z]+$/i"))))
        {
            echo "<p>Please enter the pubID using only letters, no symbols.</p>\n";
            $errors = true;
        }
    }

    if (empty($bookPrice))
    {
        echo "<p>Please enter a price for the book.</p>\n";
        $errors = true;
    }

    else
    {
        if (!filter_var($bookPrice, FILTER_VALIDATE_FLOAT)) //makes sure that the variable is a floar
        {
            echo "<p>Please enter the price as a number followed by a decimal number e.g. 23.56</p>\n";
            $errors = true;
        }
    }

    if ($errors)
    {
        echo "<p>One or more errors have occurred, please try <a href='allBooks.php'>again</a></p>\n";
    }

    else
    {
        try
        {
            $dbConn = getConnection(); //connects to the database

            //updates the database
            $sqlUpdate = "UPDATE nbc_books
              SET  bookTitle = '$bookTitle', bookYear = '$bookYear',
              pubID = '$pubID', catID = '$catID', bookPrice = '$bookPrice'
              WHERE bookISBN = $bookISBN";
            $dbConn->exec($sqlUpdate);

            echo "<p>Book has been successfully updated</p>\n";
        }
        catch (Exception $e)
        {
            echo "<p>Book not updated: " . $e->getMessage() . "</p>\n";
        }
    }
}
else
{
    echo "<p>You must be logged in to access this content.</p>\n";
}
?>
</body>
</html>