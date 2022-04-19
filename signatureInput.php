<?php 
#this script gets the necessary information to generate the DNA siganture
    session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $id = $user_data['id'];
    

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $institution = $_POST['institution'];
        $instType = $_POST['instType'];
        $country = $_POST['country'];
        $designType1 = $_POST['designType1'];
        $Sequence1 = $_POST['originalDNA'];

        $sql = "UPDATE users SET firstName = '$firstName', email = '$email', lastName = '$lastName', institution = '$institution', instType = '$instType', country = '$country', designType1 = '$designType1', Sequence1 = '$Sequence1'  WHERE id = '$id'";
        mysqli_query($con,$sql);

        header("Location: signToJson.php");

        
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
        p1 {
            margin-left: 40px
        }
        p2 {
            margin-left: 56px
        }
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
    .fa-anchor,.fa-coffee {font-size:200px}
    </style>
  </head>

  <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="http://localhost/dSign/" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="https://www.dsign.w3spaces.com/index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="http://localhost/dSign/user_profile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Profile</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Sequence</a>
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
<body>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:42px 16px">
  <p class="w3-xxlarge">User Signature Input</p>
  <hr>
  <p class="w3-large">Enter information for your profile signature.</p>
</header>

<p>
<br>
<form method="POST">
<fieldset>
  <legend><strong>Primary Information:   </strong></legend>
  <label for="firstName">First name:</label><br>
  <input type="text" id="firstName" name="firstName" required="yes"><br>
  <label for="lastName">Last name:</label><br>
  <input type="text" id="lastName" name="lastName" required="yes"><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required="yes"><br><br>
</p>
</fieldset>

<p1>
<fieldset>
  <legend><strong>Location Information: </strong></legend>
  <input type="radio" id="academia" name="instType" value="Academia">
  <label for="academia"> Academia/University</label>
  <p1><a href="https://finaid.org/fafsa/tiv/"> Click here to find your School Code </a> <br></p1>
  <input type="radio" id="industry" name="instType" value="Industry">
  <label for="industry"> Industry/Company</label>
  <p2><a href="https://stocks.tradingcharts.com/stocks/symbols/s">Click here to find Nasdaq Code </a><br></p2><br>
  
  <label for="institu">Code for Institute Name:</label><br>
  <input type="text" id="institu" name="institution" required="yes" maxlength="10"><br><br>
  
  <label for="country">Country:</label><br>
  <select id="country" name="country">
  <option value="USA">United States</option>
  <option value="CA">Canada</option>
  <option value="MEX">Mexico</option>
  <option value="OTHER">Other</option>
  </select>
  <br>
  <br>
</fieldset>
</p1>

<p>
    <p>
    <button class="w3-button w3-black w3-padding-large w3-small w3-margin-top">Submit</button>
    </p>
</p>
</form>

</body>
</html>
