<?php
/**
 * Created by PhpStorm.
 * User: Sam Noble - w16006438
 * Date: 10/10/2017
 * Time: 21:36
 */

/*
 * connectDatabase function allows for a connection the the database
 */
function connectDatabase(){
    try{
        //use PDO to connect to database
        $connection = new PDO("mysql:host=localhost;dbname=unn_w16006438",
            "unn_w16006438", "Forsaken001");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    catch(Exception $e){
        throw new Exception("Connection error ". $e->getMessage(),0,$e);
    }
}

//function allows for a page to be added to the sessions
function includeSession(){
    ini_set("session.save_path","/home/unn_w16006438/sessionData");
    session_start();
}

/*
 * setSession function sets the value of a particular element to
 * the value. The function is passed the variable name and the
 * value which it needs to be set to and returns a flag to indicate
 * the task completed.
 */
function setSession($element, $value){
    $_SESSION[$element] = $value;
    return true;
}

/*
 * getSession function gets the value associated to a key within the
 * session array. If the element doesn't exist, function returns null
 */
function getSession($element){
    //check element has a set value
    if(isset($_SESSION[$element])){
        //return value
        return $_SESSION[$element];
    }
    else{
        //return nothing
        return null;
    }
}

/*
 * checkLogin function checks if the user is logged in using the
 * session array, if an element does not exist or is false
 * then the function returns false to indicate user not logged in
 */
function checkLogin(){
    //check if logged in element is null
    if(getSession('loggedIn')===null){
        //indicate user is not logged in
        return false;
    }
    else{
        //indicate user is logged in
        return getSession('loggedIn');
    }
}

/*
 * checks if the isbn appears in the database
 *
 * @param isbn - the isbn of the book to check
 *
 * @return - true or false based on the existance of book
 */
function checkISBN($isbn){
    try {
        //connect to the database
        $databaseConnection = connectDatabase();
        //generate the SQL to get all book details
        $sql = "SELECT bookTitle, bookYear, pubID, catID, bookPrice
                FROM nbc_books
                WHERE bookISBN = :bookISBN";
        //prepare SQL
        $statement = $databaseConnection->prepare($sql);
        //execute SQL
        $statement->execute(array(':bookISBN' => $isbn));
        //get book details
        $book = $statement->fetchObject();
        //check if book has been found
        if ($book) {
            return true;
        }
        return false;
    }
    catch(Exception $e){
        return null;
    }
}

function checkCat($catID){
    try {
        //connect to the database
        $databaseConnection = connectDatabase();
        //generate the SQL to get all book details
        $sql = "SELECT catDesc
                FROM nbc_category
                WHERE catID = :catID";
        //prepare SQL
        $statement = $databaseConnection->prepare($sql);
        //execute SQL
        $statement->execute(array(':catID' => $catID));
        //get book details
        $category = $statement->fetchObject();
        //check if book has been found
        if ($category) {
            return true;
        }
        return false;
    }
    catch(Exception $e){
        return null;
    }
}

function checkPub($pubID){
    try {
        //connect to the database
        $databaseConnection = connectDatabase();
        //generate the SQL to get all book details
        $sql = "SELECT pubName
                FROM nbc_publisher
                WHERE pubID = :pubID";
        //prepare SQL
        $statement = $databaseConnection->prepare($sql);
        //execute SQL
        $statement->execute(array(':pubID' => $pubID));
        //get book details
        $publisher = $statement->fetchObject();
        //check if book has been found
        if ($publisher) {
            return true;
        }
        return false;
    }
    catch(Exception $e){
        return null;
    }
}

/*
 * showErrors function displays the errors array passed
 */
function displayErrors(array $errors){
    //create header for errors
    $errorMessage = "<h2>Errors Occurred:</h2>\n";
    //display every error in the array
    foreach($errors as $error){
        $errorMessage.="<p>".$error."</p>\n";
    }
    //return string of errors
    return $errorMessage;
}

/*
 * This function gets the details of a specific book from the
 * database and returns an array with the results in
 */
function getBookDetails($isbn){
    try {
        //initialise the array
        $bookDetails = array();
        //connect to the database
        $databaseConnection = connectDatabase();
        //generate the SQL to get all book details
        $sql = "SELECT bookTitle, bookYear, pubID, catID, bookPrice
                FROM nbc_books
                WHERE bookISBN = :bookISBN";
        //prepare SQL
        $statement = $databaseConnection->prepare($sql);
        //execute SQL
        $statement->execute(array(':bookISBN' => $isbn));
        //get book details
        $book = $statement->fetchObject();
        //put book details into the array
        $bookDetails['bookISBN'] = $isbn;
        $bookDetails['bookTitle'] = $book->bookTitle;
        $bookDetails['bookYear'] = $book->bookYear;
        $bookDetails['pubID'] = $book->pubID;
        $bookDetails['catID'] = $book->catID;
        $bookDetails['bookPrice'] = $book->bookPrice;
        //pass back the book details
        return $bookDetails;
    }
    catch(Exception $e){
        return null;
    }
}

/*
 * function creates a select box for publisher, tabindex must be given
 *
 * @param tabIndex - the value of the tab index for the select box
 * @param pubID - the ID of the publisher, if not given parameter is null
 *
 * @return the string to create the publisher select box
 */
function createPublisherSelect($tabIndex, $pubID = NULL){
    $selectContent = "<select name='publisher' tabIndex='" . $tabIndex . "'>\n";
    if(is_null($pubID)) {
        $selectContent .= "<option value='' 
            selected='selected'>Select One...</option>\n";
    }
    $databaseConnection = connectDatabase();
    $sql = "SELECT pubID, pubName, location
        FROM nbc_publisher
        ORDER BY pubName";
    $statement = $databaseConnection->prepare($sql);
    $statement->execute();

    while($publisher = $statement->fetchObject()) {
        if ($publisher->pubID === $pubID) {
            $selectContent .= "<option 
            value='".$publisher->pubID."' selected='selected'>".
            $publisher->pubName." - ".$publisher->location.
            "</option>\n";
        } else {
            $selectContent .= "<option 
            value='".$publisher->pubID."'>".
            $publisher->pubName." - ".$publisher->location.
            "</option>\n";
        }
    }
    $selectContent.="</select>\n";
    return $selectContent;
}

/*
 * function creates a select box for category, tabindex must be given
 *
 * @param tabIndex - the value of the tab index for the select box
 * @param pubID - the ID of the category, if not given parameter is null
 *
 * @return the string to create the category select box
 */
function createCategorySelect($tabIndex, $catID = NULL){
    $selectContent = "<select name='category' tabIndex='".$tabIndex."'>\n";
    if(is_null($catID)) {
        $selectContent .= "<option value='' 
            selected='selected'>Select One...</option>\n";
    }
    $databaseConnection = connectDatabase();
    $sql = "SELECT catID, catDesc
        FROM nbc_category
        ORDER BY catDesc";
    $statement = $databaseConnection->prepare($sql);
    $statement->execute();

    while($category = $statement->fetchObject()) {
        if ($category->catID === $catID) {
            $selectContent .= "<option 
            value='".$category->catID."' selected='selected'>".
            $category->catDesc.
            "</option>\n";
        } else {
            $selectContent .= "<option 
            value='".$category->catID."'>".
            $category->catDesc.
            "</option>\n";
        }
    }
    $selectContent.="</select>\n";
    return $selectContent;
}

/*
 * checks the data input is safe and valid
 *
 * @return the data received and an array of errors
 */
function validateBookDetails(){
    $bookDetails = array();
    $errors = array();

    //get all book details from edit book page
    $bookDetails['bookTitle'] = filter_has_var(INPUT_GET, 'bookTitle')
        ? $_REQUEST['bookTitle'] : null;
    $bookDetails['bookISBN'] = filter_has_var(INPUT_GET, 'bookISBN')
        ? $_REQUEST['bookISBN'] : null;
    $bookDetails['bookYear'] = filter_has_var(INPUT_GET, 'bookYear')
        ? $_REQUEST['bookYear'] : null;
    $bookDetails['category'] = filter_has_var(INPUT_GET, 'category')
        ? $_REQUEST['category'] : null;
    $bookDetails['publisher'] = filter_has_var(INPUT_GET, 'publisher')
        ? $_REQUEST['publisher'] : null;
    $bookDetails['bookPrice'] = filter_has_var(INPUT_GET, 'bookPrice')
        ? $_REQUEST['bookPrice'] : null;

    //for each element in bookDetails
    foreach($bookDetails as $key=>$value){
        //trim element value
        $value = trim($value);
        //check if element is empty
        if(!$value){
            //add to errors an error message
            $errors[] = "<p>".$key." is missing</p>";
        }
    }

    //check that the book doesn't exist in the system
    if(!checkISBN($bookDetails['bookISBN'])){
        //display error message
        $errors[] = "<p>Book ISBN not recognised</p>";
    }
    //check that the categroy doesn't exist in the system
    if(!checkCat($bookDetails['category'])){
        //display error message
        $errors[] = "<p>Book Category not recognised</p>";
    }
    //check that the publisher doesn't exist in the system
    if(!checkPub($bookDetails['publisher'])){
        //display error message
        $errors[] = "<p>Book Publisher not recognised</p>";
    }
    //check that the price is not numeric
    if(!is_numeric($bookDetails['bookPrice'])){
        //display error message
        $errors[] = "<p>Price is not numeric</p>";
    }

    //return $bookDetails and Errors Array
    return array($bookDetails, $errors);
}
?>