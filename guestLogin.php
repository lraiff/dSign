<?php 

session_start();

	include("connection.php");
	include("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Guest</title>
</head>
<body>

	<style type="text/css">

	body {
		/**background-image: url('https://us.123rf.com/450wm/arinashe/arinashe1904/arinashe190400323/123496911-genome-sequencing-pattern-in-bright-colors-background-in-doodle-style-dna-genome-scissors-test-tube-.jpg?ver=6');**/
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
		
		<form action = "guest_access.php" method="POST" enctype="multipart/form-data"> 
			<div style="font-size: 20px;color: white;">Guest</div> <br>
			<div style= 'font-size: 15px; color: white;'>Upload your key file: </div>
			<input type = 'file' id='key'  name='key'><br><br>
			<div style= 'font-size: 15px; color: white;'>Upload your data file: </div>
			<input id='data' type='file' name='data'><br><br>

			<input id="button" type="submit" value="Submit"><br><br>

			<a href="index.php">Back to Home</a><br><br>
		</form>
	</div>
</body>
</html>
