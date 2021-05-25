<?php
/**
 * Created by PhpStorm.
 * User: Sam Noble - w16006438
 * Date: 18/10/2017
 * Time: 14:45
 */

//include functions and the page class
require_once('functions.php');
require_once('nbcPage.class.php');
//add sessions to this page
includeSession();
//define footer text
$footerText = "<p>Northumbria Book Company, Created 
by Sam Noble - w16006438 for KF5002 Assignment</p>";
//define the links and aliases to the nav bar
$navLinks = array('index.php'=>'Home',
    'bookList.php'=>'Book List', 'orderBooksForm.php'=>'Order Books',
    'credits.php'=>'Credits');
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
$page = new webPage("Edit Book", "nbcStyle.css", $navLinks,
    "Edit Book", $footerText, $actionName, "nbcLogo.png", "NBC Logo");
//create book details array
$bookDetails = array();
//get book isbn passed from book list
$bookDetails['bookISBN'] = filter_has_var(INPUT_GET, 'bookISBN')
    ? $_REQUEST['bookISBN'] : null;
$bookDetails['bookISBN'] = trim($bookDetails['bookISBN']);

//check if there is nothing in the isbn passed
if(!$bookDetails['bookISBN']){
    //indicate no book selected
    $errors[]='No book selected';
    //add errors to the main
    $page->addToMain(displayErrors($errors));
    //display page and stop processing
    $page->getPage();
    exit;
}

//check if book doesn't exist
if(!checkISBN($bookDetails['bookISBN'])){
    //inidcate book doesn't exist
    $errors[]='Book doesn\'t exist';
    //add errors to the main
    $page->addToMain(displayErrors($errors));
    //display page and stop processing
    $page->getPage();
    exit;
}

try {
    //create array to store input tabIndexes
    $tabIndexes = array();
    //get a starting tab index
    $tabIndexes[0]=$page->getTabIndex();
    //repeat for the remaining input elements
    for($numElements = 1; $numElements < 6; $numElements++){
        //set the current array value to be 1 greater than the previous
        $tabIndexes[$numElements] = $tabIndexes[($numElements-1)] + 1;
    }
    //increase tabIndex by 6 (1 for each input)
    $page->increaseTabIndex(6);
    //get book details
    $bookDetails = getBookDetails($bookDetails['bookISBN']);
    //create publisher and cateogry select box
    $publisherSelect = createPublisherSelect($tabIndexes[3],
        $bookDetails['pubID']);
    $categorySelect = createCategorySelect($tabIndexes[4],
        $bookDetails['catID']);
    $editBookContent = <<<EDITCONTENT
    <form id='bookForm' action='editBookProcess.php' method='get'>
        <label>Title:
        <input type='text' name='bookTitle' 
        value='{$bookDetails['bookTitle']}' tabindex="$tabIndexes[0]"/>
        </label>
        <label>ISBN:
        <input type='text' name='bookISBN'
        value='{$bookDetails['bookISBN']}' tabindex="$tabIndexes[1] readonly"/>
        </label>
        <label>Year: 
        <input type='text' name='bookYear'
        value='{$bookDetails['bookYear']}' tabindex="$tabIndexes[2]"/>
        </label>
        <label>Publisher:
        $publisherSelect
        </label>
        <label>Category:
        $categorySelect
        </label>
        <label>Price: £
        <input type='text' name='bookPrice'
        value='{$bookDetails['bookPrice']}' tabindex="$tabIndexes[5]"/>
        </label>
        <input type='submit' tabindex="14" value="Update"/>
    </form>
EDITCONTENT;
    //add book input details form to main
    $page->addToMain($editBookContent);
}
catch(Exception $e){
    //add user friendly error message to main
    $page->addToMain("<p>Oops, Something Went Wrong</p>");
}
finally{
    //display page
    echo $page->getPage();
}
?>
