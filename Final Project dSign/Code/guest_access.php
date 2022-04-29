<?php

session_start();

include("connection.php");
include("functions.php");

$filename1 = $_FILES['key']['name'];
$filename2 = $_FILES['datacode']['name'];

$pyscript = 'C:\xampp\htdocs\dSign\dnadecrypt.py';

$output = exec("dnadecrypt.py", $message);

if($_SERVER['REQUEST_METHOD'] == "POST") {

  if(isset($_POST['export'])) {

    $fileExport = "My_Sequence_Info.txt";
  if (file_exists($fileExport)) {
      unlink($fileExport);
      $fileExportID = fopen($fileExport, "x");
  }
  else {
      $fileExportID = fopen($fileExport, "x");
  }

  fwrite($fileExportID, $message[0]);
  fclose($fileExportID);
  }

  header("Location: guest_access.php");
}

?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Guest</title>
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
  padding: 10px 10px;
  color: #000;
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
<header class="w3-container w3-red w3-center" style="padding:42px 16px">
  <p class="w3-xxlarge">Guest Sequence Access</p>
  <hr>
  <p class="w3-large">View and export the encrypted sequence sent to you</p>
</header>
<br>
<br>
<div class="card">
  <div class="container">
      <h3>Message</h3>
      <fieldset>
      <?php 
        $charl = "b'";
        $charr = "'1";
        $charr2 = "1";
        $trimmed1 = ltrim($message[0], $charl);
        $trimmed2 = rtrim($trimmed1, $charr);
        $finalMessage = rtrim($trimmed2, $charr2);
        echo print($finalMessage);?>
      <p class="w3-text-grey"></p>
      <hr>
      <input type = "submit" value = "Export" id = "Export" name = "Export" class="w3-button w3-red w3-padding-large w3-small w3-margin-top">
      </fieldset>
    </div>
  </div>
<br>
<br>
</body>
</html>
