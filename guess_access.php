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

  <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="https://www.dsign.w3spaces.com/index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Profile</a>
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

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:42px 16px">
  <p class="w3-xxlarge">Guest Sequence Access</p>
  <hr>
  <p class="w3-large">View and export the encrypted sequence sent to you</p>
</header>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-onethird">
      <h3>Contact</h3>
      <fieldset>
      <h5 class="w3-padding-16">Name: </h5>
      <h5 class="w3-padding-16">Email:</h5>
      <h5 class="w3-padding-16">Institution:</h5><br>
      <p class="w3-text-grey"></p>

      <button class="w3-button w3-red w3-padding-large w3-small w3-margin-top">Export</button>
      </fieldset>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-onethird">
      <h3>Encrypted Sequence</h3>
      <fieldset>
      <h5 class="w3-padding-16">Name: </h5>
      <h5 class="w3-padding-16">Description:</h5>
      <h5 class="w3-padding-16">Sequence:</h5><br>
      <p class="w3-text-grey"></p>

      <button class="w3-button w3-red w3-padding-large w3-small w3-margin-top">Export</button>
      </fieldset>
    </div>
  </div>
</div>
