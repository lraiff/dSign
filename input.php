<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

    
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $lastName = $_POST['last'];
        $firstName = $_POST['first'];
        $institution = $_POST['institution'];
        $instType = $_POST['designType'];

        $query = "insert into users (lastName,firstName,institution,instType) values ('$lastName','$firstName','$institution','$instType')";

        mysqli_query($con, $query);
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>dSign Signature</title>
</head>
<body>
    <div id = "sign">



        What type of signature will you be designing today? 
        <br>
        <div id = "button">
            <button onclick = "window.location.href='reversible.php'">reversible</button>
            <button onclick = "window.location.href='nonreversible.php'">non-reversible</button>
        </div>
    </div>
</body>
</html>