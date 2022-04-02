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
	<style>

		#welcome {
			color: Brown;
			font-size: 50px;
		}

		#option {
			color: DarkRed;
			font-size: 20px;
		}
		#button {
			border: 15px DarkSalmon;
			padding: 10px;

		}
	</style>
	<div id = "welcome">
		Welcome, <?php echo $user_data['user_name']; ?>
	</div>
	<br><br>
	<div id = "option">
		With dSign, you can design an encryped signature for your DNA sequence. 
		What do you want to do today?
		<br>
		<button onclick = "window.location.href='view.php'">view designs</button>
		<button onclick = "window.location.href='input.php'">dSgin a signature</button>
	</div>
</body>
</html>