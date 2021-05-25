<!--Andrew Robson - w16011147-->
<!--this file contains all of the functions that will be used throughout the rest of the website
    a great deal of this code is reusable and so serves the purpose of saving time and increasing
    efficiency by being here-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="styling.css"> <!--Links the stylesheet-->
    <title>Functions</title>
</head>
<body>
<?php
/*
 * this function makes the connection to the database at phpmyadmin
 * Using PDO the statement will make the connection to the database
 */
function getConnection()
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=unn_w16011147",
            "unn_w16011147", "Fasran1997"); //connects to the server the data is stored on
        $connection->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    catch (Exception $e)
    { //if the server cannot be connected to then it will throw an exception
        throw new Exception("Connection error ". $e->getMessage(), 0, $e);
    }
}

/*
 * this function takes two parameters. It sets $data to be equal to $name
 * When the function is complete it will return true to show that it has finished
 */
function setSession($name, $data) {
    $_SESSION[$name] = $data;
    return true;
}

/*
 * This function retrieves the $name which is located within the session array
 * If the $name can't be retrieved then it will return null in its place.
 */
function getSession($name) {
    if(isset($_SESSION[$name])) {
        return $_SESSION[$name];
    }
    else {
        return null;
    }
}

/*
 * This function tests to see if the user is logged in or not, to do this it
 * checks if the value 'pass' is empty or not. If the value is empty it returns false,
 * if there is a value, it will return that value.
 */
function checkLogin() {
    if(getSession('pass')===null) { //test if 'pass' is null
        return false; //returns false indicating 'pass' was null
    }
    else {
        return getSession('pass'); //returns the value, indicating the user is logged in
    }
}

/*
 * This function is used to create the login and logout functionality on every webpage
 * I found it more efficient to make this code into a function to increase its reusability
 * when 'displayLoginLogout()' is called it will generate the html below.
 */
function displayLoginLogout() {

    if (checkLogin()) {
        echo "<form method='post' action='logout.php'> <!--Logs the user out-->
            <input type='submit' value='Logout'/> <!--logout button-->
        </form>";
    }
    else {
        echo "<form method='post' action='login.php'> <!--Logs the user in-->
            <label>Username:
                <input type='text' name='username' value=''/> <!--the user needs to enter a username-->
            </label>
            <label>Password:
                <input type='password' name='password' value=''/> <!--The user needs to enter a password-->
            </label>
            <input type='submit' value='Login'/> <!--login button-->
        </form>";
    }
}

/*
 * This function is used to create the navigation for the webpages
 * Similarly to 'displayLoginLogout()' I found it more efficient to put this code into a
 * function and call upon it when necessary
 */
function displayNav() {
    if (checkLogin()) { //checks to see if the user is logged in or not before displaying
        echo "<nav>
    <ul>
        <li><a href=\"index.php\">Home</a></li> 
        <li><a href=\"allBooks.php\">Display All Books</a></li>
        <li><a href=\"orderBooksForm.php\">Order Form</a></li>
        <li><a href=\"credits.php\">Credits</a></li>
    </ul>
</nav>";
    }
}
?>
</body>
</html>
