<?php
/**
 * Created by PhpStorm.
 * User: Sam Noble - w16006438
 * Date: 15/10/2017
 * Time: 15:11
 */
//include functions
require_once('functions.php');
//include page class
require_once('nbcPage.class.php');
//include sessions on this page
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
    //set login function to login
    $actionName = "loginProcess.php";
}
//create page instance
$page = new webPage("Credits", "nbcStyle.css", $navLinks,
    "Credits", $footerText, $actionName, "nbcLogo.png", "NBC Logo");
//add header references
$page->addToMain("<h2>References</h2>");
//use here doc to create variable containing page display of references
//use of <i> tag to follow similar formatting of harvard referencing
$references = <<<REFERENCES
<p>Daveismyname.blog. (2017). <i>Autocomplete with PHP, MySQL and Jquery UI
 - David Carr | Web Developer</i>. [online] Available at: https://daveismy
 name.blog/autocomplete-with-php-mysql-and-jquery-ui 
 [Accessed 1 Dec. 2017].</p>
<p>jquery.org, j. (2017). <i>Autocomplete Widget | jQuery UI API Documentation
</i>. [online] Api.jqueryui.com. Available at: http://api.jqueryui.com
/autocomplete/ [Accessed 1 Dec. 2017].</p>
<p>list, H. (2017). <i>How to style autocomplete dropdown list</i>. [online] 
Stackoverflow.com. Available at: https://stackoverflow.com/questions
/28308574/how-to-style-autocomplete-dropdown-list [Accessed 1 Dec. 2017].</p>
<p>McFarland, D. (2014). <i>JavaScript & jQuery</i>. 
3rd ed. Sebastopol, CA: O'Reilly, pp.370-384.</p>
<p>Unn-isrd1.newnumyspace.co.uk. (2017). <i>The Wheel: Teaching</i>. 
[online] Available at: http://unn-isrd1.newnumyspace.co.uk/learn/ 
[Accessed 10 Oct. 2017].</p>
<p>W3schools.com. (2017). <i>W3Schools Online Web Tutorials</i>.
 [online] Available at: https://www.w3schools.com 
 [Accessed 10 Oct. 2017].</p>
REFERENCES;
//add new line char onto end of references
$references.="\n";
//add references to main
$page->addToMain($references);
//display page
echo $page->getPage();
?>