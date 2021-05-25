<?php
/**
 * Created by PhpStorm.
 * User: Sam Noble - w16006438
 * Date: 01/12/2017
 * Time: 11:39
 */
$bookISBN = isset($_REQUEST['bookISBN']) ? $_REQUEST['bookISBN'] : null;
try{
    require_once('functions.php');
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
    $statement->execute(array(':bookISBN' => $bookISBN));
    $book = $statement->fetchObject();
    //create variables for heredoc containing new book details
    $bookTitle = $book->bookTitle;
    $bookYear = $book->bookYear;
    $bookCat = $book->catDesc;
    $bookPub = $book->pubName." - ".$book->location;
    $bookPrice = $book->bookPrice;
    //create page content
    $bookDisplay = <<<BOOKDISPLAY
    <h2>Searched Book:</h2>
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
    //return the book details
    echo $bookDisplay;
}
catch(Exception $e) {
    echo "Error Occured: " . $e->getMessage();
}
?>