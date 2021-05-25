<?php
/**
 * Created by PhpStorm.
 * User: Sam Noble - w16006438
 * Date: 15/11/2017
 * Time: 23:59
 */

//include the functions and page class
require_once('functions.php');
require_once('nbcPage.class.php');
//include sessions on this page
includeSession();
//get input details
//define footer text
$footerText = "<p>Northumbria Book Company, Created 
by Sam Noble - w16006438 for KF5002 Assignment</p>";
//define the links and aliases to the nav bar
$navLinks = array('index.php'=>'Home',
    'bookList.php'=>'Book List', 'orderBooksForm.php'=>'Order Books',
    'credits.php'=>'Credits');
//check if user is logged in
if(checkLogin()){
    //set the login function to logout
    $actionName = "logoutProcess.php";
}
else{
    //send user back to the book list (restricted access)
    header("Location: bookList.php");
    //set the login function to login
    $actionName = "loginProcess.php";
}
//initialise the page instance
$page = new webPage("Update Book", "nbcStyle.css", $navLinks,
    "Update Book", $footerText, $actionName, "nbcLogo.png", "NBC Logo");
//check for errors in the book details given
list($bookDetails, $errors) = validateBookDetails();
//check if theres any errors in the details
if($errors){
    //add errors to main
    $page->addToMain(displayErrors($errors));
    //display page and end processing
    echo $page->getPage();
    exit;
}
//try to update book details
try{
    //connect to the database
    $databaseConnection = connectDatabase();
    //generate the SQL to update book details
    $sql = "UPDATE nbc_books
                SET  bookTitle = :bookTitle, bookYear = :bookYear,
                pubID = :pubID, catID = :catID, bookPrice = :bookPrice
                WHERE bookISBN = :bookISBN";
    //prepare SQL
    $statement = $databaseConnection->prepare($sql);
    //pass the data to the SQL and update
    $statement->execute(array(':bookISBN' => $bookDetails['bookISBN'],
        ':bookTitle' => $bookDetails['bookTitle'],
        ':bookYear' => $bookDetails['bookYear'],
        ':pubID' => $bookDetails['publisher'],
        ':catID' => $bookDetails['category'],
        ':bookPrice' => $bookDetails['bookPrice']));
}
//catch any exception caused from updating book
catch(Exception $e){
    //indicate system failed to update
    $errors[] = "Failed to Update Book Details: ". $e->getMessage();
    //add errors to main
    $page->addToMain(displayErrors($errors));
    //display page and end processing
    echo $page->getPage();
    exit;
}
//try to display the new details back to the user
try{
    //connect to the database
    $databaseConnection = connectDatabase();
    //generate sql to get new book details
    $sql = "SELECT bookTitle, bookYear, catDesc, pubName, location ,bookPrice
        FROM nbc_books JOIN nbc_category
          ON nbc_category.catID = nbc_books.catID
          JOIN nbc_publisher 
          ON nbc_publisher.pubID = nbc_books.pubID
        WHERE bookISBN = :bookISBN";
    //prepare sql
    $statement = $databaseConnection->prepare($sql);
    //execute sql
    $statement->execute(array(':bookISBN' => $bookDetails['bookISBN']));
    $newBook = $statement->fetchObject();
    //create variables for heredoc containing new book details
    $bookISBN = $bookDetails['bookISBN'];
    $bookTitle = $newBook->bookTitle;
    $bookYear = $newBook->bookYear;
    $bookCat = $newBook->catDesc;
    $bookPub = $newBook->pubName." - ".$newBook->location;
    $bookPrice = $newBook->bookPrice;
    //create page content
    $bookDisplay = <<<BOOKDISPLAY
    <h2>Book Updated</h2>
    <div class='bookSelect'>
        <h3>$bookTitle</h3>
        <p>ISBN: $bookISBN</p>
        <p>Year: $bookPrice</p>
        <p>Publisher: $bookPub</p>
        <p>Category: $bookCat</p>
        <p>Price: $bookPrice</p>
    </div>
BOOKDISPLAY;
    //add new line char to end of book display
    $bookDisplay.="\n";
    //add content to main
    $page->addToMain($bookDisplay);
    //display page
    echo $page->getPage();
}
catch(Exception $e){
    //indicate system failed to retrieve book details
    $errors[] = "Failed to Retrieve New Book Details: ".$e->getMessage();
    //add errors to main
    $page->addToMain(displayErrors($errors));
    //display page
    echo $page->getPage();
}