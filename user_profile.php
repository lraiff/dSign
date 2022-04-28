<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con); 
  $id = $user_data['id']; 


  
  if($_SERVER['REQUEST_METHOD'] == "POST") {

    #the send button writes to a file that will hold the guest access key
    #the export button writes to a file with all the sequence information that the user wants to themselves
    #the delete button deletes all the information corresponding to that sequence from the database

    #each sequence has a set of if statements that execute depending if the user selected the send, export, or delete button

    #sequence1

    #send 1
    if(isset($_POST['send1'])) {

      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc1'], "sequence" => $user_data['eSeq1']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc1'], "sequence" => $user_data['eSeq1']);
      }

      #create a json file for sharing
      $fileSH = "shareSeq.json";
      if (file_exists($fileSH)) {
          unlink($fileSH);
          $fileIDSH = fopen($fileSH, "x");
      }
      else {
          $fileIDSH = fopen($fileSH, "x");
    }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDSH, $jsonStr);
      fclose($fileIDSH);

      #make keys and write to files, these files are what you are sharing
      $python  = 'C:\Users\laura\AppData\Local\Programs\Python\Python39\python.exe';
      $pyscript = 'C:\xampp\htdocs\dSign\dnaencrypt.py';
      unset($shareKey);
      unset($output);

      $output = exec($pyscript, $shareKey);
      header("Location: user_profile.php");
    }

    #export 1
    if(isset($_POST['export1'])) {
      if($user_data['designType1'] == 'Irreversible') {
        $input = array("Name" => $user_data['seqName1'], "Description" => $user_data['seqDesc1'], "Sequence" => $user_data['Sequence1'], "Signature" => $user_data['encryptedSignature'], "Signature location" => $user_data['location1'], "Encrypted Sequence" => $user_data['eSeq1'], "Instructions" => "For manufacturing purposes only");
        }
        else {
          $input = array("Name" => $user_data['seqName1'], "Description" => $user_data['seqDesc1'], "Sequence" => $user_data['Sequence1'], "Signature" => $user_data['encryptedSignature'], "Encrypted Sequence" => $user_data['eSeq1'], "Instructions" => "For computational purposes only");
        }

      #create a json file for exporting
      $fileEX = "seq1.json";
      if (file_exists($fileEX)) {
          unlink($fileEX);
          $fileIDEX = fopen($fileEX, "x");
      }
      else {
          $fileIDEX = fopen($fileEX, "x");
      }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDEX, $jsonStr);
      fclose($fileIDEX);
      header("Location: user_profile.php");
    }

    #delete 1
    if(isset($_POST['delete1'])) {

      $sql = "UPDATE users set Sequence1 = '', eSeq1 = '', designType1 = '', seqName1 = '', seqName1 = '', seqDesc1 = '', location1 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence2
    #send 2
    if(isset($_POST['send2'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc2'], "sequence" => $user_data['eSeq2']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc2'], "sequence" => $user_data['eSeq2']);
      }

      #create a json file for sharing
      $fileSH = "shareSeq.json";
      if (file_exists($fileSH)) {
          unlink($fileSH);
          $fileIDSH = fopen($fileSH, "x");
      }
      else {
          $fileIDSH = fopen($fileSH, "x");
    }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);
      
      fwrite($fileIDSH, $jsonStr);
      fclose($fileIDSH);



      #make keys and write to files, these files are what you are sharing
      $python  = 'C:\Users\laura\AppData\Local\Programs\Python\Python39\python.exe';
      $pyscript = 'C:\xampp\htdocs\dSign\dnaencrypt.py';
      unset($shareKey);
      unset($output);

      $output = exec($pyscript, $shareKey);

      header("Location: user_profile.php");

      }

    #export 2
    if(isset($_POST['export2'])) {
      if($user_data['designType2'] == 'Irreversible') {
        $input = array("Name" => $user_data['seqName2'], "Description" => $user_data['seqDesc2'], "Sequence" => $user_data['Sequence2'], "Signature" => $user_data['encryptedSignature'], "Signature location" => $user_data['location2'], "Encrypted Sequence" => $user_data['eSeq2'], "Instructions" => "For manufacturing purposes only");
        }
      else {
        $input = array("Name" => $user_data['seqName2'], "Description" => $user_data['seqDesc2'], "Sequence" => $user_data['Sequence2'], "Signature" => $user_data['encryptedSignature'], "Encrypted Sequence" => $user_data['eSeq2'], "Instructions" => "For computational purposes only");
      }
      #create a json file for exporting
      $fileEX = "seq2.json";
      if (file_exists($fileEX)) {
          unlink($fileEX);
          $fileIDEX = fopen($fileEX, "x");
      }
      else {
          $fileIDEX = fopen($fileEX, "x");
      }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDEX, $jsonStr);
      fclose($fileIDEX);
      header("Location: user_profile.php");      
     
    }

    #delete2
    if(isset($_POST['delete2'])) {

      $sql = "UPDATE users set Sequence2 = '', eSeq2 = '', designType2 = '', seqName2 = '', seqName2 = '', seqDesc2 = '', location2 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence3
    #send 3
    if(isset($_POST['send3'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc3'], "sequence" => $user_data['eSeq3'];
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc3'], "sequence" => $user_data['eSeq3']);
      }

      #create a json file for sharing
      $fileSH = "shareSeq.json";
      if (file_exists($fileSH)) {
          unlink($fileSH);
          $fileIDSH = fopen($fileSH, "x");
      }
      else {
          $fileIDSH = fopen($fileSH, "x");
    }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDSH, $jsonStr);
      fclose($fileIDSH);

      #make keys and write to files, these files are what you are sharing
      $python  = 'C:\Users\laura\AppData\Local\Programs\Python\Python39\python.exe';
      $pyscript = 'C:\xampp\htdocs\dSign\dnaencrypt.py';
      unset($shareKey);
      unset($output);

      $output = exec($pyscript, $shareKey);

      $fileP = "public.key";
      header("Location: user_profile.php");
    }

    #export 3
    if(isset($_POST['export3'])) {
      if($user_data['designType3'] == 'Irreversible') {
        $input = array("Name" => $user_data['seqName3'], "Description" => $user_data['seqDesc3'], "Sequence" => $user_data['Sequence3'], "Signature" => $user_data['encryptedSignature'], "Signature location" => $user_data['location3'], "Encrypted Sequence" => $user_data['eSeq3'], "Instructions" => "For manufacturing purposes only");
        }
      else {
          $input = array("Name" => $user_data['seqName3'], "Description" => $user_data['seqDesc3'], "Sequence" => $user_data['Sequence3'], "Signature" => $user_data['encryptedSignature'], "Encrypted Sequence" => $user_data['eSeq3'], "Instructions" => "For computational purposes only");
      }
      #create a json file for exporting
      $fileEX = "seq3.json";
      if (file_exists($fileEX)) {
          unlink($fileEX);
          $fileIDEX = fopen($fileEX, "x");
      }
      else {
          $fileIDEX = fopen($fileEX, "x");
      }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDEX, $jsonStr);
      fclose($fileIDEX); 
      header("Location: user_profile.php");  
    }

    #delete3
    if(isset($_POST['delete3'])) {

      $sql = "UPDATE users set Sequence3 = '', eSeq3 = '', designType3 = '', seqName3 = '', seqName3 = '', seqDesc3 = '', location3 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence4
    #send 4
    if(isset($_POST['send4'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc4'], "sequence" => $user_data['eSeq4']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc4'], "sequence" => $user_data['eSeq4']);
      }

      #create a json file for sharing
      $fileSH = "shareSeq.json";
      if (file_exists($fileSH)) {
          unlink($fileSH);
          $fileIDSH = fopen($fileSH, "x");
      }
      else {
          $fileIDSH = fopen($fileSH, "x");
    }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDSH, $jsonStr);
      fclose($fileIDSH);

      #make keys and write to files, these files are what you are sharing
      $python  = 'C:\Users\laura\AppData\Local\Programs\Python\Python39\python.exe';
      $pyscript = 'C:\xampp\htdocs\dSign\dnaencrypt.py';
      unset($shareKey);
      unset($output);

      $output = exec($pyscript, $shareKey);

      header("Location: user_profile.php");
    }

    #export 4
    if(isset($_POST['export4'])) {
      if($user_data['designType4'] == 'Irreversible') {
        $input = array("Name" => $user_data['seqName4'], "Description" => $user_data['seqDesc4'], "Sequence" => $user_data['Sequence4'], "Signature" => $user_data['encryptedSignature'], "Signature location" => $user_data['location4'], "Encrypted Sequence" => $user_data['eSeq4'], "Instructions" => "For manufacturing purposes only");
        }
      else {
          $input = array("Name" => $user_data['seqName4'], "Description" => $user_data['seqDesc4'], "Sequence" => $user_data['Sequence4'], "Signature" => $user_data['encryptedSignature'], "Encrypted Sequence" => $user_data['eSeq4'], "Instructions" => "For computational purposes only");
      }
      #create a json file for exporting
      $fileEX = "seq4.json";
      if (file_exists($fileEX)) {
          unlink($fileEX);
          $fileIDEX = fopen($fileEX, "x");
      }
      else {
          $fileIDEX = fopen($fileEX, "x");
      }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDEX, $jsonStr);
      fclose($fileIDEX);



      header("Location: user_profile.php");
    }

    #delete4
    if(isset($_POST['delete4'])) {

      $sql = "UPDATE users set Sequence4 = '', eSeq4 = '', designType4 = '', seqName4 = '', seqName4 = '', seqDesc4 = '', location4 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence 5
    #send 5
    if(isset($_POST['send5'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc5'], "sequence" => $user_data['eSeq5']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc5'], "sequence" => $user_data['eSeq5']);
      }

      #create a json file for sharing
      $fileSH = "shareSeq.json";
      if (file_exists($fileSH)) {
          unlink($fileSH);
          $fileIDSH = fopen($fileSH, "x");
      }
      else {
          $fileIDSH = fopen($fileSH, "x");
    }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDSH, $jsonStr);
      fclose($fileIDSH);

      #make keys and write to files, these files are what you are sharing
      $python  = 'C:\Users\laura\AppData\Local\Programs\Python\Python39\python.exe';
      $pyscript = 'C:\xampp\htdocs\dSign\dnaencrypt.py';
      unset($shareKey);
      unset($output);

      $output = exec($pyscript, $shareKey);
      header("Location: user_profile.php");

    }

    #export5
    if(isset($_POST['export5'])) {
      if($user_data['designType5'] == 'Irreversible') {
        $input = array("Name" => $user_data['seqName5'], "Description" => $user_data['seqDesc5'], "Sequence" => $user_data['Sequence5'], "Signature" => $user_data['encryptedSignature'], "Signature location" => $user_data['location5'], "Encrypted Sequence" => $user_data['eSeq5'], "Instructions" => "For manufacturing purposes only");
        }
      else {
          $input = array("Name" => $user_data['seqName5'], "Description" => $user_data['seqDesc5'], "Sequence" => $user_data['Sequence5'], "Signature" => $user_data['encryptedSignature'], "Encrypted Sequence" => $user_data['eSeq5'], "Instructions" => "For computational purposes only");
      }
      #create a json file for exporting
      $fileEX = "seq5.json";
      if (file_exists($fileEX)) {
          unlink($fileEX);
          $fileIDEX = fopen($fileEX, "x");
      }
      else {
          $fileIDEX = fopen($fileEX, "x");
      }

      $jsonStr = json_encode($input, JSON_PRETTY_PRINT);

      fwrite($fileIDEX, $jsonStr);
      fclose($fileIDEX);
      header("Location: user_profile.php");

    }

    #delete5
    if(isset($_POST['delete5'])) {

      $sql = "UPDATE users set Sequence5 = '', eSeq5 = '', designType5 = '', seqName5 = '', seqName5 = '', seqDesc5 = '', location5 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #button to input a new sequence
    if(isset($_POST['seq3']) && $user_data['encryptedSignature'] != '') {

      header("Location: sequence_input.php");
    }

        
    }
  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile</title>
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

     body {
		background-image: url('https://us.123rf.com/450wm/arinashe/arinashe1904/arinashe190400323/123496911-genome-sequencing-pattern-in-bright-colors-background-in-doodle-style-dna-genome-scissors-test-tube-.jpg?ver=6');
    }

 .hide {
 display: none
 }

 .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: auto;
  border-radius: 8px;
  color: #FFF;
  background-color: #FFF !important;
  margin-left:5%;
  margin-right:5%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 15px 15px;
  color: #000;
}

.tooltip {
  color: #000;
  margin-left:5%;
  display: inline-block;
  position:relative;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 200px;
  background-color: #F9560F;
  color: #FFF;
  text-align: center;
  border-radius: 3px;
  padding: 10px 10px;
  position: absolute;
  z-index: 1;
  top: -5px;
  left: 110%;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
    </style>
  </head>
<body>
  <!-- Navbar -->
<div class="w3-top">
<div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="http://localhost/dSign/index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>

    <?php if( isset($_SESSION['loggedIn'])) { ?>
    <a href="<?php echo "http://localhost/dSign/user_profile.php"; ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Profile</a>
    <?php } else { ?>
    <a href="<?php echo "http://localhost/dSign/login.php"; ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Profile</a>
    <?php } ?>

    <?php if( isset($_SESSION['loggedIn'])) { ?>
    <a href="<?php echo "http://localhost/dSign/signatureInput.php"; ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Signature</a>
    <?php } else { ?>
    <a href="<?php echo "http://localhost/dSign/login.php"; ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Signature</a>
    <?php } ?>

    <a href="http://localhost/dSign/FAQ.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">FAQ</a>

    <?php if( isset($_SESSION['loggedIn'])) { ?>
    <a href="<?php echo "http://localhost/dSign/logout.php"; ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
    <?php } else { ?>
    <a href="<?php echo "http://localhost/dSign/index.php"; ?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
    <?php } ?>
    
    <a href="http://localhost/dSign/guestLogin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Guest</a>
</div>
</div>

<!-- Header -->
<form method = "POST">
<header class="w3-container w3-red w3-center" style="padding:42px 16px">
  <p class="w3-xxlarge">Your Profile</p>
  <hr>
  <p class="w3-large">Your DNA signature</p>
  <?php echo $user_data['encryptedSignature']; ?>
  <p class="w3-large">Send, Export, and Delete your registered sequences below</p>
  <input type = "submit" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" name = 'seq3' value = "Add/Change Sequence Here">
</header>
<br>
<br>


<!-- First Grid -->
<div class="card">
  <div class="container">
      <h3>Sequence 1</h3>
      <fieldset>
      <h5 class="w3-padding-16">Name: </h5>
      <?php
        echo $user_data["seqName1"];
      ?>
      <h5 class="w3-padding-16">Type of Encryption: </h5>
      <?php 
          echo $user_data["designType1"];
      ?>
      <h5 class="w3-padding-16">Description:</h5>
      <?php
        echo $user_data["seqDesc1"];
      ?>
      <h5 class="w3-padding-16">Encrypted Sequence:</h5>
      <?php
        echo $user_data["eSeq1"];
      ?>
      <p class="w3-text-grey"></p>
      <hr>
      <input type = "submit" name = "send1" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export1" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete1" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" 
        onclick="alert('Are you sure you want to delete?');" value = "Delete">
      <div class="tooltip">File Location?
      <span class="tooltiptext">Look for the files in project folder as public.key and datacode.key (for SEND) and as seq1 (for EXPORT)!</span>
      </div>   
      <br>
      <br>
      </fieldset>
    </div>
  </div>
  <br>
  <br>

<!-- Second Grid -->
<div class="card">
  <div class="container">
      <h3>Sequence 2</h3>
      <fieldset>
      <h5 class="w3-padding-16">Name:</h5>
      <?php
        echo $user_data["seqName2"];
      ?>
      <h5 class="w3-padding-16">Type of Encryption: </h5>
      <?php 
          echo $user_data["designType2"];
      ?>
      <h5 class="w3-padding-16">Description:</h5>
      <?php
        echo $user_data["seqDesc2"];
      ?>
      <h5 class="w3-padding-16">Encrypted Sequence:</h5>
      <?php
        echo $user_data["eSeq2"];
      ?>

      <p class="w3-text-grey"></p>

      <hr>
      <input type = "submit" name = "send2" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export2" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete2" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" 
        onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <div class="tooltip">File Location?
      <span class="tooltiptext">Look for the files in project folder as public.key and datacode.key (for SEND) and as seq2 (for EXPORT)!</span>
      </div> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
  <br>
  <br>

<div class="card">
  <div class="container">
      <h3>Sequence 3</h3>
      <fieldset>
      <h5 class="w3-padding-16">Name: </h5>
      <?php
        echo $user_data["seqName3"];
      ?>
      <h5 class="w3-padding-16">Type of Encryption: </h5>
      <?php 
          echo $user_data["designType3"];
      ?>
      <h5 class="w3-padding-16">Description:</h5>
      <?php
        echo $user_data["seqDesc3"];
      ?>
      <h5 class="w3-padding-16">Encrypted Sequence:</h5>
      <?php
        echo $user_data["eSeq3"];
      ?>
      <p class="w3-text-grey"></p>

      <hr>
      <input type = "submit" name = "send3" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export3" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete3" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" 
        onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <div class="tooltip">File Location?
      <span class="tooltiptext">Look for the files in project folder as public.key and datacode.key (for SEND) and as seq3 (for EXPORT)!</span>
      </div> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
  <br>
  <br>

<div class="card">
  <div class="container">
      <h3>Sequence 4</h3>
      <fieldset>
      <h5 class="w3-padding-16">Name:</h5>
      <?php
        echo $user_data["seqName4"];
      ?>
      <h5 class="w3-padding-16">Type of Encryption: </h5>
      <?php 
          echo $user_data["designType4"];
      ?>
      <h5 class="w3-padding-16">Description:</h5>
      <?php
        echo $user_data["seqDesc4"];
      ?>
      <h5 class="w3-padding-16">Encrypted Sequence:</h5>
      <?php
        echo $user_data["eSeq4"];
      ?>

      <p class="w3-text-grey"></p>


      <hr>
      <input type = "submit" name = "send4" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export4" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete4" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" 
        onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <div class="tooltip">File Location?
      <span class="tooltiptext">Look for the files in project folder as public.key and datacode.key (for SEND) and as seq4 (for EXPORT)!</span>
      </div> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
<br>
<br>

<div class="card">
  <div class="container">
      <h3>Sequence 5</h3>
      <fieldset>
      <h5 class="w3-padding-16">Name: </h5>
      <?php
        echo $user_data["seqName5"];
      ?>
      <h5 class="w3-padding-16">Type of Encryption: </h5>
      <?php 
          echo $user_data["designType5"];
      ?>
      <h5 class="w3-padding-16">Description:</h5>
      <?php
        echo $user_data["seqDesc5"];
      ?>
      <h5 class="w3-padding-16">Encrypted Sequence:</h5>
      <?php
        echo $user_data["eSeq5"];
      ?>
      <p class="w3-text-grey"></p>

      <hr>
      <input type = "submit" name = "send5" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export5" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete5" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" 
        onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <div class="tooltip">File Location?
      <span class="tooltiptext">Look for the files in project folder as public.key and datacode.key (for SEND) and as seq5 (for EXPORT)!</span>
      </div> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
      </form>
      <br>
      <br>

</body>
</html>
