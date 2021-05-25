<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/10/2017
 * Time: 00:17
 */
//include defined functions
require_once ('functions.php');
require_once ('nbcPage.class.php');
//include sessions on the page
includeSession();
//define footer text
$footerText = "<p>Northumbria Book Company, Created 
by Sam Noble - w16006438 for KF5002 Assignment</p>";
//define nav links and their alias's
$navLinks = array('index.php'=>'Home',
    'bookList.php'=>'Book List', 'orderBooksForm.php'=>'Order Books',
    'credits.php'=>'Credits');
//check if session user is logged in
if(checkLogin()){
    //set login function to logout
    $actionName = "logoutProcess.php";
}
else{
    //set login function to logout
    $actionName = "loginProcess.php";
}
//create page instance
$page = new webPage("Book List", "nbcStyle.css", $navLinks,
    "Book List", $footerText, $actionName, "nbcLogo.png", "NBC Logo");
//the following contained in the try produces the book list
//if the user is logged in the divs become links to edit book details
try {
    //connect to the database
    $databaseConnection = connectDatabase();
    //initialise a variable to contain the list of all book records
    $bookList = "";
    //generate sql to get book details, Order by title
    $sql = "SELECT bookISBN, bookTitle, bookYear, catDesc ,bookPrice
        FROM nbc_books JOIN nbc_category
          ON nbc_category.catID = nbc_books.catID
        ORDER BY bookTitle";
    //prepare sql
    $statement = $databaseConnection->prepare($sql);
    //execute sql
    $statement->execute();
    //for each found book record
    while ($book = $statement->fetchObject()) {
        $bookOption = "";
        //get ISBN and title of a book
        $bookTitle = $book->bookTitle;
        $bookISBN = $book->bookISBN;
        $bookYear = $book->bookYear;
        $bookCategory = $book->catDesc;
        $bookPrice = $book->bookPrice;
        //create a division which is a link to the target page,
        //passing the ISBN value, using the book title as the
        //disguise of the link
        $bookSelection = <<<BOOKOPTION
        <div class="bookSelect">
            <h2>$bookTitle</h2>
            <p>ISBN: $bookISBN</p>
            <p>Year: $bookYear</p>
            <p>Category: $bookCategory</p>
            <p>Price: $bookPrice</p>
        </div>
BOOKOPTION;
        //check if user is logged in
        if(checkLogin()){
            //get a tabindex
            $tab = $page->getTabIndex();
            //increase tabindex by one
            $page->increaseTabIndex();
            //make the book option div a link to edit the book details
            //this makes it easier for the user as they
            //only have to click the div
            $bookOption = "<a href='editBook.php?bookISBN="
                .$bookISBN."' tabindex=".$tab.">\n".$bookSelection."\n</a>";
        }
        else {
            //make the book option the same as the selection previously created
            $bookOption = $bookSelection;
        }
        //add division to the list of divisions
        $bookList .= $bookOption;
    }
    //return list of books
    $page->addToMain($bookList);
}
catch(Exception $e){
    $errorMessage = "<h2>Unable to find book list</h2>\n";
    //display error message
    $page->addToMain($errorMessage);
}
finally{
    //display page
    echo $page->getPage();
}
?>
