<!--Andrew Robson - w16011147-->
<!--this page performs all of the necessary functionality for the login process-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Login</title>
</head>
<body>
<?php
require_once("functions.php"); //link to functions.php
ini_set("session.save_path", "/home/unn_w16011147/sessionData"); //initialise the session
session_start(); //begin the session

$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
//retrieves the username from the previous page
$username = trim($username); //trims the whitespace around the variable
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
//retrieves the password from the previous page
$password = trim($password); //trims the whitespace around the variable

if (empty($username) || empty($password))
{ //if either the username or password variable are empty, do the following
    echo "<p>Your username and password were incorrect. Please try <a href='allBooks.php'>again</a>.</p>";
    //informs the user of their error and provides a link back to the book list
}
else //if there are values in username and password then continue
    {
    try
    {
        $dbConn = getConnection(); //connect to the database

        $sqlSelect = "SELECT passwordHash FROM nbc_users WHERE username = :username";
        //retrieve the hashed password where username equals what the user entered

        $queryResult = $dbConn->prepare($sqlSelect); //prepare the statement
        $queryResult->execute(array(':username'=>$username)); //execute the statement

        $pass = $queryResult->fetchObject(); //retrieve the data from the database

        if(!$pass)
        {
            echo "<p>Your username and password were incorrect. Please try <a href='allBooks.php'>again</a>.</p>";
            exit;
        }
        else
        {
            $hashedPassword = $pass->passwordHash; //compare database hashed password with our own

            if(!password_verify($password, $hashedPassword))
            {
                echo "<p>Your username and password were incorrect. Please try <a href='allBooks.php'>again</a>.</p>";
                exit;
            }
            else
            {
                setSession('pass', true); //pass is true to show that the user has successfully logged in
                echo "<p>Your username and password were correct. Click 
                <a href='allBooks.php'>OK</a> to continue .</p>";
            }
        }
    }
    catch (Exception $e)
    {
        echo $e; //display any errors that have occurred
    }
}
?>

</body>
</html>