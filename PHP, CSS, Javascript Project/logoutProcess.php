<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/10/2017
 * Time: 15:35
 */
//include functions
require_once ('functions.php');
//include sessions
includeSession();
//empty session array
$_SESSION = array();
//destroy the session
session_destroy();
//return user back to the previous page they came from
header('Location: '. $_SERVER['HTTP_REFERER']);
?>