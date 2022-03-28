<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>dSign</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<br><br>
	<style type="text/css">

		#welcome {
			color: Brown;
			font-size: 50px;
		}

		#sign {
			color: DarkRed;
			font-size: 30px;
		}
	</style>
	<div id = "welcome">
		Welcome, <?php echo $user_data['user_name']; ?>
	</div>
	<div id = "sign">
		What type of signature will you be designing today? 
	</div>
</body>
</html>