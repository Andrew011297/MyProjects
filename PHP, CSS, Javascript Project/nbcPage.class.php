<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04/11/2017
 * Time: 15:48
 */
//include functions
require_once('functions.php');

class webPage{
    //attributes
    private $pageStart;
    private $headerLogo;
    private $header;
    private $navBar;
    private $main;
    private $body;
    private $footerText;
    private $tabIndex;

    /*
    * the contructor to the webpage class
    */
    function __construct($pageTitle, $stylesheet, array $navLinks,
                         $headerText, $footerText, $loginActionName = null,
                         $logo = null, $logoAlt = null){
        //initialise tab index to 1
        $this->tabIndex = 1;
        //set page start
        $this->pageStart = $this->createPageStart($pageTitle, $stylesheet);
        //create a header logo
        $this->headerLogo = $this->createLogo($logo, $logoAlt);
        //set header contents
        $this->header = $this->createHeader($headerText, $loginActionName);
        //set the nav bar
        $this->navBar = $this->createNavBar($navLinks);
        //hold the text for the footer
        $this->footerText = $footerText;
        //initialise the body to be empty
        $this->body = "";
        //start the main tag
        $this->main = "<main>\n";
    }

    /*
    * creates the meta data for the webpage
    *
    * @param title - the title of the webpage
    * @param stylesheet - the stylesheet included in the webpage
    *
    * @return pageStart - the page meta data
    */
    private function createPageStart($title, $stylesheet = null){
        //create page start content using heredoc for simplicity
        $pageStart=<<<PAGESTART
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <!--Create page title using title passed-->
        <title>$title</title>
        <!--Link a stylesheet if applicable-->
        <link href="$stylesheet" rel="stylesheet" type="text/css"/>
        </head>
        <!--start body content-->
        <body>
PAGESTART;
        //add new line break so the source code is neat
        $pageStart.="\n";
        //pass back content string
        return $pageStart;
    }

    private function createLogin($actionName, $invalidLogin){
        $invalid = "";
        //get class tab index
        $startTabIndex = $this->getTabIndex();
        //generate tab indexes for login form elements
        $usernameIndex=$startTabIndex;
        $passwordIndex=$startTabIndex+1;
        $loginBtnIndex=$startTabIndex+2;
        //increase tab index by 3
        $this->increaseTabIndex(3);
        //check if user has had an invalid login
        if($invalidLogin){
          $invalid = "<p>Invalid Credentials</p>\n";
        }
        //create login bar using heredoc
        $loginBar=<<<LOGIN
        <form id="login" action="$actionName" method="post">
            $invalid
            <label>Username:
                <input type="text" name="username" value="" 
                tabindex="$usernameIndex"/>
            </label>
            <label>Password:
                <input type="password" name="password" value="" 
                tabindex="$passwordIndex"/>
            </label>
            <input type="submit" value="Login" 
            tabindex="$loginBtnIndex"/>
        </form>   
LOGIN;
        //create a new line after login bar in source
        $loginBar.="\n";
        //pass back the login bar string
        return $loginBar;
    }

    private function createLogout($actionName){
        //get tab index
        $tabIndex = $this->getTabIndex();
        //increase class tab index attribute by 1
        $this->increaseTabIndex();
        $name = $_SESSION['firstname'].' '.$_SESSION['surname'];
        //create logout bar using heredoc
        $logoutBar=<<<LOGOUT
        <form id="logout" action="$actionName" method="post">
        <label>Logged in as: $name</label>
        <input type="submit" value="Logout" tabindex="$tabIndex"/>
        </form>
LOGOUT;
        //create a new line after logout bar in source
        $logoutBar.="\n";
        //pass back the logout bar string
        return $logoutBar;
    }

    /*
     * creates a logo using an image tag that will appear in the header
     *
     * @return the img tag to add the logo specified
     */
    private function createLogo($logoPath, $altText){
        return "<img src='$logoPath' id='logo' alt='$altText'/>\n";
    }

    /*
     * creates the header content also creates a login/logout bar
     * in the header if a loginActionName is passed
     *
     * @param headerTitle - The text for h1
     * @param loginActionName - the link for a potential login form
     */
    private function createHeader($headerTitle, $loginActionName = null){
        //initialise loginFunction and headerLogo
        $loginFunction = "";
        //add logo if applicable
        $logo = $this->headerLogo;
        //check if loginActionName has been passes
        if(isset($loginActionName)) {
            //check if the user is logged in
            if (checkLogin()) {
                //create a logout bar
                $loginFunction = $this->createLogout($loginActionName);
            } else {
                /*
                 * create login function - display error if
                 * user had an invalid login
                 */
                $loginFunction = $this->createLogin($loginActionName,
                  getSession('invalidLogin'));
            }
        }
        $headerContent=<<<HEADER
        <!--Display the title of the page using the variable passed-->
        <header>
            <!--add logo if applicable-->
            $logo
            <!--Display login bar if applicable-->
            $loginFunction
            <h1>$headerTitle</h1>
        </header>
HEADER;
        //add new line character
        $headerContent.="\n";
        //pass the header content back to the caller
        return $headerContent;
    }
    /*
     * Creates the nav bar using an array of links and aliases
     *
     * @param links - the array containing the address of the nav link
     *                and the value to disguise it as
     * @return navBar - the nav bar html
     */
    private function createNavBar(array $links){
        //create an empty variable to store the list of links
        $navLinks = "";
        //do for each element in the array passed
        foreach ($links as $link=>$value){
            //get the tabIndex for this link
            $tabIndex = $this->getTabIndex();
            //increase class tabIndex by one
            $this->increaseTabIndex();
            /*
            * add to the list of links a new link using the link
            * and value given in the array using the tab index variable
            * to organise the tab index of the link
            */
            $navLinks.= "<li><a href='$link' 
            tabindex='$tabIndex'>$value</a></li>\n";
        }
        //create the nav bar string using heredoc
        $navBar=<<<NAVIGATION
        <nav>
            <ul id='navBar'>
                <!--Display list of links-->
                $navLinks
            </ul>
        </nav>
NAVIGATION;
        //create new line after nav bar
        $navBar.= "\n";
        //pass back the nav bar string
        return $navBar;
    }

    /*
     * function creates text for the footer
     * also included a standard link to quickly return to the top of the page
     *
     * @param footerText - the text to appear in the footer
     *
     * @return footerContent - the text for the footer of the page
     */
    private function createFooter($footerText){
        //get the tabIndex
        $tabIndex = $this->getTabIndex();
        //get
        $this->increaseTabIndex();
        //create footer using heredoc
        $footerContent=<<<FOOTER
        <footer>
            $footerText
            <a href="#" tabindex="$tabIndex">Return to Top</a>
        </footer>
FOOTER;
        //create new line after footer in source
        $footerContent.= "\n";
        //pass back footer string
        return $footerContent;
    }

    /*
     * this only adds content which appears in the main tags on a page
     * for anything outside main use addToBody
     *
     * @param text - the content to add to main
     */
    public function addToMain($text){
        $this->main .= $text."\n";
    }

    /*
     * adds content to the body tag of the page, this should
     * only be used for anything that doesn't appear in main
     *
     * @param text - the string value of data to be added to page body
     */
    public function addToBody($text){
        $this->body .= $text."\n";
    }

    /*
     * function creates the footer and
     * gets the final product of the page
     *
     * @return the page contents (HTML)
     */
    public function getPage(){
        //create footer
        $footer = $this->createFooter($this->footerText);
        //close main
        $this->main .= "</main>\n";
        //return final product
        return $this->pageStart.$this->header.$this->navBar.
            "\n".$this->main.$this->body.$footer."\n</body>\n</html>";
    }

    /*
    * function get the tab index attribute of the class
    *
    * @return the next free tab index value
    */
    public function getTabIndex(){
        return $this->tabIndex;
    }

    /*
    * function increases the value of the tab index attribute
    * of the class by a given value if no value given,
    * increase by one
    *
    * @param increment - the value to increase tab index by
    */
    public function increaseTabIndex($increment = 1){
        $this->tabIndex = $this->tabIndex + $increment;
    }
}
?>