<?php 

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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);


			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['userID'] = $user_data['userID'];
						header("Location: signatureInput.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>login</title>
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
			<div style="font-size: 20px;color: white;">Login</div> <br>
			<div style= 'font-size: 15px; color: white;'>Username: </div>
			<input id="text" type="text" name="user_name"><br><br>
			<div style= 'font-size: 15px; color: white;'>Password: </div>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>