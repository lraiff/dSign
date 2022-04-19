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
    if(isset($_POST['send1'])) {

      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc1']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc1']);
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
      exec('dnaencrypt.py');
      header("Location: user_profile.php");
    }

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
    if(isset($_POST['delete1'])) {

      $sql = "UPDATE users set Sequence1 = '', eSeq1 = '', designType1 = '', seqName1 = '', seqName1 = '', seqDesc1 = '', location1 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence2
    if(isset($_POST['send2'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc2']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc2']);
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
      exec('dnaencrypt.py');
      header("Location: user_profile.php");

    }
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
    if(isset($_POST['delete2'])) {

      $sql = "UPDATE users set Sequence2 = '', eSeq2 = '', designType1 = '', seqName2 = '', seqName2 = '', seqDesc2 = '', location2 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence3
    if(isset($_POST['send3'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc3']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc3']);
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
      exec('dnaencrypt.py');
      header("Location: user_profile.php");


    }
    if(isset($_POST['export3'])) {
      if($user_data['designType3'] == 'Irreversible') {
        $input = array("Name" => $user_data['seqName3'], "Description" => $user_data['seqDesc1'], "Sequence" => $user_data['Sequence3'], "Signature" => $user_data['encryptedSignature'], "Signature location" => $user_data['location3'], "Encrypted Sequence" => $user_data['eSeq3'], "Instructions" => "For manufacturing purposes only");
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
    if(isset($_POST['delete3'])) {

      $sql = "UPDATE users set Sequence3 = '', eSeq3 = '', designType3 = '', seqName3 = '', seqName3 = '', seqDesc3 = '', location3 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence4
    if(isset($_POST['send4'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc4']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc4']);
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
      exec('dnaencrypt.py');
      header("Location: user_profile.php");


    }
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
    if(isset($_POST['delete4'])) {

      $sql = "UPDATE users set Sequence4 = '', eSeq4 = '', designType4 = '', seqName4 = '', seqName4 = '', seqDesc4 = '', location4 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #sequence 5
    if(isset($_POST['send5'])) {
      if($user_data['instType'] == "Academia") {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Title IV Institution Code", "description" => $user_data['seqDesc5']);
        
      }
      else {
        $input = array("password" => $user_data['password'], "last_name" => $user_data['lastName'], "first_name" => $user_data['firstName'], "email" => $user_data['email'], "institution_code" => $user_data['institution'], "Type" => "Nasdaq Code", "description" => $user_data['seqDesc5']);
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
      exec('dnaencrypt.py');
      header("Location: user_profile.php");

    }
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
    if(isset($_POST['delete5'])) {

      $sql = "UPDATE users set Sequence5 = '', eSeq5 = '', designType5 = '', seqName5 = '', seqName5 = '', seqDesc5 = '', location5 = 0 WHERE id = '$id'";
      mysqli_query($con,$sql);
      header("Location: user_profile.php");
    }

    #button to input a new sequence
    if(isset($_POST['seq3'])) {

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
    </style>
  </head>
<body>
  <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="http://localhost/dSign/" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="https://www.dsign.w3spaces.com/index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="http://localhost/dSign/signatureInput.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Signature</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">FAQ</a>
    <a href="http://localhost/dSign/logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="https://www.dsign.w3spaces.com/index.html" class="w3-bar-item w3-button w3-padding-large">About</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Profile</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Sequence</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">FAQ</a>
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


<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-onethird">
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

      <input type = "submit" name = "send1" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export1" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete1" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" onclick="alert('Are you sure you want to delete?');" value = "Delete">      
      <br>
      <br>
      </fieldset>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-onethird">
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


      <input type = "submit" name = "send2" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export2" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete2" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-onethird">
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


      <input type = "submit" name = "send3" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export3" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete3" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-onethird">
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



      <input type = "submit" name = "send4" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export4" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete4" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-onethird">
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


      <input type = "submit" name = "send5" class="w3-button w3-blue w3-padding-large w3-small w3-margin-top" value = "Send" />
      <input type = "submit" name = "export5" class="w3-button w3-red w3-padding-large w3-small w3-margin-top" value = "Export" />
      <input type = "submit" name = "delete5" class="w3-button w3-black w3-padding-large w3-small w3-margin-top" onclick="alert('Are you sure you want to delete?');" value = "Delete"> 
      <br>
      <br>
      </fieldset>
    </div>
  </div>
</div>
      </form>

</body>
</html>
