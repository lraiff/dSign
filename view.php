<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);  

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Signatures</title>
</head>
<body>
    <table>
		<tr>
			<th>Type</th>
			<th> Encrypted Signature </th>
		</tr>
		<?php
		$sql = "SELECT encryptedSignature, designType from users";
		$data = $con -> query($sql);

		if($data -> num_rows > 0) {
			while($row = $data -> fetch_assoc()){
				echo "<tr><td>". $row["designType"]. "</td><td>". $row["encryptedSignature"]. "</td></tr>";
			}
			echo "</table>";
		}
		else {
			echo "0 result";
		}

		$con -> close();
		?>
	</table>
</body>
</html>