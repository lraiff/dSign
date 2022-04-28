<?php 

#this is the signup page
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$userID = random_num(20);
			$query = "insert into users (userId,user_name,password) values ('$userID','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
    .fa-anchor,.fa-coffee {font-size:200px}
    </style>
</head>
<body>

	<style type="text/css">

	body {
		background-image: url('https://us.123rf.com/450wm/arinashe/arinashe1904/arinashe190400323/123496911-genome-sequencing-pattern-in-bright-colors-background-in-doodle-style-dna-genome-scissors-test-tube-.jpg?ver=6');
	}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: #000;
		border: none;
	}

	#box{

		background-color: #F44336;
		margin: auto;
		width: 300px;
		padding: 20px;
		border-style: solid;
		border-width: 5px;
		border-color: #000;
	}

	</style>
	<br><br><br><br><br><br>
	<div id="box">
		<form method="post">
			<div style="font-size: 20px;color: white;">Signup</div> <br>
			<div style= 'font-size: 15px; color: white;'>Username: </div>
			<input id="text" type="text" name="user_name" required ="yes"><br><br>
			<div style= 'font-size: 15px; color: white;'>Password (Exactly 10 characters): </div>
			<input id="text" type="password" name="password" required="yes"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and exactly 10 characters"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
