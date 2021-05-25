<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/10/2017
 * Time: 15:35
 */
//include functions
require_once('functions.php');
//add sessions to page
includeSession();
//get username and password from previous page
$username = isset($_REQUEST['username'])? $_REQUEST['username']:null;
$password = isset($_REQUEST['password'])? $_REQUEST['password']:null;
//remove white space
$username = trim($username);
$password = trim($password);
//check if username is empty
if(!$username){
    //indicate invalid login in sessions
    setSession('invalid', true);
    //return user back to previous page
    header('Location: '. $_SERVER['HTTP_REFERER']);
    //stop processing
    exit;
}
//check if password is empty
if(!$password){
    //indicate invalid login in sessions
    setSession('invalid', true);
    //return user back to previous page
    header('Location: '. $_SERVER['HTTP_REFERER']);
    //stop processing
    exit;
}
//attempt to check login details
try{
    //connect to database
    $databaseConn = connectDatabase();
    //define sql to get user details based on the username given
    $sql = "SELECT firstname, surname, passwordHash
    FROM nbc_users
    WHERE username=:username";
    //prepare sql
    $sqlStatement = $databaseConn->prepare($sql);
    //execute sql passing the user's given username
    $sqlStatement->execute(array(':username'=>$username));
    //get database object
    $user = $sqlStatement->fetchObject();
    //check if a user was found in the system
    if(!$user){
        //indicate invalid login in sessions
        setSession('invalidLogin', true);
        //return user back to previous page
        header('Location: '. $_SERVER['HTTP_REFERER']);
        //stop processing
        exit;
    }
    else{
        //place user details inside variables
        $realPassword = $user->passwordHash;
        $firstname = $user->firstname;
        $surname = $user->surname;
        //compare password given with actual hashed password
        if(!password_verify($password,$realPassword)){
            //indicate invalid login in the sessions
            setSession('invalidLogin', true);
            //return user to previous page
            header('Location: '. $_SERVER['HTTP_REFERER']);
            //stop processing
            exit;
        }
        else{
            //indicate valid login in sessions
            setSession('invalidLogin', false);
            //indicate user is logged in in sessions
            setSession('loggedIn', true);
            //set session user first name to user's firstname
            setSession('firstname', $firstname);
            //set session user surname to user's surname
            setSession('surname', $surname);
            //return user to previous page
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
    }
}
catch(Exception $e){
    //echo any error occuring with database connection
    echo "<p>".$e."</p>";
}
?>