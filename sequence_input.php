<?php 
#this script gets the necessary input information from the user for a new sequence and stores it into the database
#the user can't store more than 5 sequences as a time
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con); 
  $id = $user_data['id']; 

  if($_SERVER['REQUEST_METHOD'] == "POST") {

    #get posted values and then depending on which sequence number the user chose to add, query into the database
    $Sequence = $_POST['originalDNA'];
    $designType = $_POST['designType1'];
    $seqName = $_POST['seq_name'];
    $seqDesc = $_POST['seqDescription'];
    $loc = $_POST['location'];
    $_SESSION['seqNum'] = $_POST['seqNum'];

    if($_SESSION['seqNum'] == 1) {
      $sql = "UPDATE users SET Sequence1 = '$Sequence', designType1 = '$designType', seqName1= '$seqName', seqDesc1 = '$seqDesc', location1 = '$loc' WHERE id = '$id'";
      mysqli_query($con,$sql);

    }
    if($_SESSION['seqNum'] == 2) {
      $sql = "UPDATE users SET Sequence2 = '$Sequence', designType2 = '$designType', seqName2= '$seqName', seqDesc2 = '$seqDesc', location2 = '$loc' WHERE id = '$id'";
      mysqli_query($con,$sql);
      
    }
    if($_SESSION['seqNum'] == 3) {
      $sql = "UPDATE users SET Sequence3 = '$Sequence', designType3 = '$designType', seqName3 = '$seqName', seqDesc3 = '$seqDesc', location3 = '$loc' WHERE id = '$id'";
      mysqli_query($con,$sql);
      
    }
    if($_SESSION['seqNum'] == 4) {
      $sql = "UPDATE users SET Sequence4 = '$Sequence', designType4 = '$designType', seqName4 = '$seqName', seqDesc4 = '$seqDesc', location4 = '$loc' WHERE id = '$id'";
      mysqli_query($con,$sql);
      
    }
    if($_SESSION['seqNum'] == 5) {
      $sql = "UPDATE users SET Sequence5 = '$Sequence', designType5 = '$designType', seqName5 = '$seqName', seqDesc5 = '$seqDesc', location5 = '$loc' WHERE id = '$id'";
      mysqli_query($con,$sql);
      
    }

    header("Location: signInSeq.php");


  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>dSign Home</title>
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

  <!-- hides location selection unless its nonreversible -->
<style type="text/css">
 
 .hide {
 display: none
 }
 </style>

<!-- javascript that displays location selection if sequence is nonreversible -->
<script type = "text/javascript">

  function show1() {
    document.getElementById('location').style.display = 'none';
  }

  function show2() {
    document.getElementById('location').style.display = 'block';
  }

  </script>

  <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="http://localhost/dSign/" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="https://www.dsign.w3spaces.com/index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="http://localhost/dSign/user_profile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Profile</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Sequence</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">FAQ</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="https://www.dsign.w3spaces.com/index.html" class="w3-bar-item w3-button w3-padding-large">About</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Profile</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Sequence</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">FAQ</a>
  </div>
</div>
<body>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:42px 16px">
  <p class="w3-xxlarge">Add New Sequence</p>
  <hr>
  <p class="w3-large">Add a new sequence below, 5 is the maximum per account</p>
</header>

<form method="POST">
<p>
<fieldset>
<legend><strong>Sequence Name:</strong></legend>
<p>
<label for="seqNum">Sequence Number:</label>
  <select id="seqNum" name="seqNum">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  </select><br><br>
    <label for = "seq_name"> Sequence Title: </label><br>
    <textarea name="seq_name" rows="1" cols="60" required="yes"></textarea><br>
</fieldset>
</p>



<fieldset>
<legend><strong>Encryption Type:</strong></legend>
<p>
  <input type="radio" id="design_rev" name="designType1" value="Reversible" onclick = "show1()">
  <label for="design_rev"> Reversible</label><br>
  <input type="radio" id="design_irr" name="designType1" value="Irreversible" onclick = "show2()">
  <label for="design_irr"> Irreversible</label><br>
  </fieldset>
</p>

<div id= "location" class = "hide"> 
  <fieldset>
  <legend><strong>Enter the index of your sequence where you want your signature</strong></legend>
  <p>
    <textarea name="location" rows="1" cols="60"></textarea><br>
</p>
</fieldset>
</div>
    

<fieldset>
<legend><strong>Sequence Description:</strong></legend>
<p>
    <textarea name="seqDescription" rows="5" cols="60" required="no"></textarea><br>
</fieldset>
</p>

<fieldset>
<legend><strong>Enter your sequence below (no spaces):</strong></legend>
<p>
    <textarea name="originalDNA" rows="15" cols="60" required="yes"></textarea><br>
</p>
</fieldset>

<p>
    <p>
    <button class="w3-button w3-black w3-padding-large w3-small w3-margin-top">Submit</button>
    </p>
</p>
</form>
</body>
