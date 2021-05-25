<?php
/**
 * Created by PhpStorm.
 * User: Sam Noble - w16006438
 * Date: 10/10/2017
 * Time: 21:34
 */
//include functions
require_once('functions.php');
//include page class
require_once('nbcPage.class.php');
//add sessions to page
includeSession();
//define footer text
$footerText = "<p>Northumbria Book Company, Created 
by Sam Noble - w16006438 for KF5002 Assignment</p>";
//define nav links and their aliases
$navLinks = array('index.php'=>'Home',
    'bookList.php'=>'Book List', 'orderBooksForm.php'=>'Order Books',
    'credits.php'=>'Credits');
//check if the session user is logged in
if(checkLogin()){
    //set the login function to logout
    $actionName = "logoutProcess.php";
}
else{
    //set the login function to login
    $actionName = "loginProcess.php";
}

$page = new webPage("Home", "nbcStyle.css", $navLinks,
    "Home", $footerText, $actionName, "nbcLogo.png", "NBC Logo");
//add search textbox with label search
$page->addToMain("<label>Search:\n<input type='text' id='search' 
placeholder='Search Book'/>\n</label>");
//add place to hold selected book(s)
$page->addToMain("<div id='searchedBook'>\n</div>");
//filler content for main
$page->addToMain("<h2>Who We Are</h2>");
$page->addToMain("<p>NBC is a imaginary company which deals with books</p>");

//create aside
$page->addToBody("<aside id='offers'>\n</aside>");
//create a heredoc to put scripts into
$scripts = <<<SCRIPT
    <!--Offers javascript (AJAX)-->
<script type="text/javascript" src="nbcOffersAJAX.js"></script>
<script type="text/javascript">
    //<![CDATA[
    window.addEventListener('load', function initialise() {
        'use strict';
        //get the offers aside as an object
        var offerAside = document.getElementById('offers');
        //create a getOffer function and call every 5 seconds
        var getOffer = function(){
            //make a request to the getOffers.php and display it
            getRequest('getOffers.php', displayOffer);
            //call itself after 5 seconds
            setTimeout(getOffer, 5000);
        };
        //call getOffer - now stuck in unending recursion
        getOffer();
    });
    //]]>
</script>
<!--AutoComplete Search Function and Display (JQuery)-->
<script type='text/javascript'
        src='//code.jquery.com/jquery-2.2.0.js'></script>
<script type='text/javascript'
        src='//code.jquery.com/ui/1.11.3/jquery-ui.js'></script>
<script type='text/javascript'>
    //<![CDATA[
    //wait until page is ready
    $(document).ready(function(){
        //enable strict mode
        'use strict';
        //use ajax to get bookList from external php file
        $.ajax({
            method: "get",
            url: "getBookList.php"
        })
        //retrieve data from ajax process
        .done(function(data, status, jqxhr){
            //display data in log for debugging purposes
            console.log(data);
            //add autocomeplete onto 'search' textbox
            $('#search').autocomplete({
                //source is book list from ajax process
                source: data,
                //only activate on 3 characters minimum
                minLength: 3,
                //when user selects an item from autocomplete
                select: function(event, ui){
                    //display book passing the ISBN of selected book
                    displayBooks(ui.item.value);
                }
            });
        }); 
    });
    
    /*
    function gets the details of a book and changes the inner html
    of an element on the page
    @param isbn - the ISBN of the selected book
     */
    function displayBooks(isbn) {
        //perform ajax to get the book details from external php file
        $.ajax({
            method: "get",
            url: 'getBook.php?bookISBN=' + isbn
        })
        //retrieve data from ajax process
        .done(function(data, status, jqxhr){
            //get the element to insert details into
            var searchResultDiv = document.getElementById('searchedBook');
            //log the data for debugging purposes
            console.log(data);
            //set the search result div to contain the data found
            searchResultDiv.innerHTML = data;
            //get the searchbox as object
            var searchBox = document.getElementById('search');
            //empty it for the user to quickly use again
            searchBox.value = "";
        });
    }
    //]]>
</script>
SCRIPT;
//start the next bit of the page on a new line
$scripts.="\n";
//add the scripts to the body
$page->addToBody($scripts);
//display the page
echo $page->getPage();
?>
