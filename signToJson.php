<?php

#this script writes all the user input information to a json file and executes a python script which creates the signature
#the signature is then stored in the database

    session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $id = $user_data['id'];

    $file = "signInfo.json";
    if (file_exists($file)) {
        unlink($file);
        $fileID = fopen($file, "x");
    }
    else {
        $fileID = fopen($file, "x");
    }

    $input = array("first_name" => $user_data['firstName'],"last_name" => $user_data['lastName'], 'institution_type' => $user_data['instType'],'institution_code' => $user_data['institution'], 'password' => $user_data['password'], 'country' => $user_data['country']);

    $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

    fwrite($fileID, $jsonStr);
    fclose($fileID);

    $output = exec('dnasignencrypt.py', $encryptSign);
    print_r($encryptSign);

    $sql = "UPDATE users SET encryptedSignature = '$encryptSign[0]' WHERE id = '$id'";
    mysqli_query($con,$sql);

    header("Location: user_profile.php");
     
?>
