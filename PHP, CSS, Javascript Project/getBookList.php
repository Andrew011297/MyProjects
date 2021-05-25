<?php
/**
 * Created by PhpStorm.
 * User: Sam Noble - w16006438
 * Date: 01/12/2017
 * Time: 11:38
 */
//get the search value from textbox
$searchTerm = isset($_REQUEST['term']) ? $_REQUEST['term'] : null;
try {
    //include functions
    require_once('functions.php');
    //connect to database
    $databaseConnection = connectDatabase();
    //create array to store the list
    $bookList = array();
    //define SQL that gets the book Title and ISBN that
    //title is like the search term
    $sql = "SELECT bookISBN AS value, bookTitle AS label
            FROM nbc_books
            WHERE bookTitle LIKE :searchTerm
            ORDER BY bookTitle";
    //prepare SQL
    $statement = $databaseConnection->prepare($sql);
    //execute SQL with the search term passed
    $statement->execute(array(':searchTerm' => "%{$searchTerm}%"));
    //put all similar books to term into the array
    $bookList = $statement->fetchAll(PDO::FETCH_ASSOC);
    //change to identify data as json
    header('Content-Type: application/json');
    //convert array to json and give back to caller
    echo json_encode($bookList);
} catch (Exception $e) {
    //display an error message
    echo "Error: ".$e->getMessage();
}
?>