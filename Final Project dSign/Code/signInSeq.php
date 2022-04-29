<?php

    session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $id = $user_data['id'];

    #create a json file
    $file = "seqInfo.json";
    if (file_exists($file)) {
        unlink($file);
        $fileID = fopen($file, "x");
    }
    else {
        $fileID = fopen($file, "x");
    }

    #depending on which sequence number the user chose, write sequence information to a json file and execute a python script that depending on they type of sequence places the signature in the sequence
    if($_SESSION['seqNum'] == 1) {
        $input = array("sequence" => $user_data['Sequence1'], "state" => $user_data['designType1'], "location" => $user_data['location1'], "signature" => $user_data['encryptedSignature']);

        $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

        fwrite($fileID, $jsonStr);
        fclose($fileID);

        if ($user_data['designType1'] == 'Reversible') {
            $output = passthru('reversibleESeq.py', $encryptSeq);

        }
        else {
            $output = exec('irreversibleESeq.py', $encryptSeq);
        }


        $sql = "UPDATE users SET eSeq1 = '$encryptSeq[0]' WHERE id = '$id'";
    }
    if($_SESSION['seqNum'] == 2) {
        $input = array("sequence" => $user_data['Sequence2'], "state" => $user_data['designType2'], "location" => $user_data['location2'], "signature" => $user_data['encryptedSignature']);

        $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

        fwrite($fileID, $jsonStr);
        fclose($fileID);

        if ($user_data['designType2'] == 'Reversible') {
            $output = exec('reversibleESeq.py', $encryptSeq);

        }
        else {
            $output = exec('irreversibleESeq.py', $encryptSeq);
        }

        $sql = "UPDATE users SET eSeq2 = '$encryptSeq[0]' WHERE id = '$id'";
    }
    if($_SESSION['seqNum'] == 3) {
        $input = array("sequence" => $user_data['Sequence3'], "state" => $user_data['designType3'], "location" => $user_data['location3'], "signature" => $user_data['encryptedSignature']);

        $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

        fwrite($fileID, $jsonStr);
        fclose($fileID);

        if ($user_data['designType3'] == 'Reversible') {
            $output = exec('reversibleESeq.py', $encryptSeq);

        }
        else {
            $output = exec('irreversibleESeq.py', $encryptSeq);
        }

        $sql = "UPDATE users SET eSeq3 = '$encryptSeq[0]' WHERE id = '$id'";
    }
    if($_SESSION['seqNum'] == 4) {
        $input = array("sequence" => $user_data['Sequence4'], "state" => $user_data['designType4'], "location" => $user_data['location4'], "signature" => $user_data['encryptedSignature']);

        $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

        fwrite($fileID, $jsonStr);
        fclose($fileID);

        if ($user_data['designType4'] == 'Reversible') {
            $output = exec('reversibleESeq.py', $encryptSeq);

        }
        else {
            $output = exec('irreversibleESeq.py', $encryptSeq);
        }

        $sql = "UPDATE users SET eSeq4 = '$encryptSeq[0]' WHERE id = '$id'";
    }
    if($_SESSION['seqNum'] == 5) {
        $input = array("sequence" => $user_data['Sequence5'], "state" => $user_data['designType5'], "location" => $user_data['location5'], "signature" => $user_data['encryptedSignature']);

        $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

        fwrite($fileID, $jsonStr);
        fclose($fileID);

        if ($user_data['designType5'] == 'Reversible') {
            $output = exec('reversibleESeq.py', $encryptSeq);

        }
        else {
            $output = exec('irreversibleESeq.py', $encryptSeq);
        }

        $sql = "UPDATE users SET eSeq5 = '$encryptSeq[0]' WHERE id = '$id'";
    }

    mysqli_query($con,$sql);

    header("Location: user_profile.php");
     
?>