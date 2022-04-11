<?php

function check_login($con)
{
	#makes sure the session is the same as when the user logged in and returns all variables from current row of database 

	if(isset($_SESSION['userID']))
	{

		$userID = $_SESSION['userID'];
		$query = "select * from users where userID = '$userID' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function setData($con)
{
	#makes sure the session is the same as when the user logged in and returns all variables from current row of database 

	if(isset($_SESSION['userID']))
	{

		$userID = $_SESSION['userID'];
		$query = "select * from users where userID = '$userID' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	

}

function random_num($length)
{

	 #generate random number for userID
	
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}

	return $text;
}
