<!-- This is the front of the website, the home page -->
<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = setData($con); 

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
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 85%;
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
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Welcome to dSign</h1>
  <p class="w3-xlarge">Designed by Aurelia Leona, Laura Raiff, Sally Shin, and Zenia Valdiviezo</p>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick = "window.location.href='login.php'">Login</button>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick = "window.location.href='signup.php'">Sign up</button>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick = "window.location.href='guestLogin.php'">Guest</button>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>What does dSign provide?</h1>
      <h5 class="w3-padding-32">We provide unique user-input DNA signature services that can be used to send signed DNA sequences to collaborators.</h5>

      <p class="w3-text-grey">Using a user-signature and password driven encryption, we provide both reversible and nonreversible modes of DNA encryption. 
        The original signator of the sequence can freely send their signed DNA to collaborators or colleagues quickly and securely using private-access tokens that are generated from user profile page. 
        The recipient, using their access tokens, can use our services to gain access to either detailed description of the sequence or the unencrypted DNA that can be directly used for manufacturing.  </p>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <h1>A demo video of how dSign works!</h1>
      <br>
      <img src="https://i.imgur.com/pAIjocX.png" width:"300" height="auto" class="center">
      <br>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: be biosecure</h1>
</div>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
