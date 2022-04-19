<?php
//this script logs the current user out by ending the session

session_start();

if(isset($_SESSION['userID']))
{
	unset($_SESSION['userID']);

}

session_destroy();
header("Location: login.php");
die;