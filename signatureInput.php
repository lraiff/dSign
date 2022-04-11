<?php 
    session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $id = $user_data['id'];
    

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $institution = $_POST['institution'];
        $instType = $_POST['instType'];
        $country = $_POST['country'];
        $designType1 = $_POST['designType1'];
        $Sequence1 = $_POST['originalDNA'];

        $sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', institution = '$institution', instType = '$instType', country = '$country', designType1 = '$designType1', Sequence1 = '$Sequence1'  WHERE id = '$id'";
        mysqli_query($con,$sql);

        header("Location: index.php");

        
    }

?>

<!DOCTYPE html>
<html>
<body>

<h3>Signature Information </h3>
<p>
<form method="POST">
<fieldset>
    <legend>Primary Information:</legend>
  <label for="firstName">First name:</label><br>
  <input type="text" id="firstName" name="firstName" required="yes"><br>
  <label for="lastName">Last name:</label><br>
  <input type="text" id="lastName" name="lastName" required="yes"><br>
  </p>
  </fieldset>
</p>
<p>
<fieldset>
  <legend>Location Information:</legend>
  <input type="radio" id="academia" name="instType" value="Academia">
  <label for="academia"> Academia/University</label>
  <a href="https://finaid.org/fafsa/tiv/">      Click here to find your School Code </a> <br>
  <input type="radio" id="industry" name="instType" value="Industry">
  <label for="industry"> Industry/Company</label>
  <a href="https://stocks.tradingcharts.com/stocks/symbols/s">       Click here to find Nasdaq Code </a><br>
  
  <label for="institu">Code for Institute Name:</label><br>
  <input type="text" id="institu" name="institution" required="yes" maxlength="10"><br>
  
  <label for="country">Country:</label><br>
  <select id="country" name="country">
  <option value="USA">United States</option>
  <option value="CA">Canada</option>
  <option value="MEX">Mexico</option>
  <option value="OTHER">Other</option>
  </select>
</fieldset>
</p>

<fieldset>
<legend>Encryption Information:</legend>
<p>
  <input type="radio" id="design_rev" name="designType1" value="reversible">
  <label for="design_rev"> Reversible</label><br>
  <input type="radio" id="design_irr" name="designType1" value="irreversible">
  <label for="design_irr"> Irreversible</label><br>
  </fieldset>
</p>

<p>
<fieldset>
    <legend>:</legend>


</fieldset>
</p>

<p>
    Enter your sequence below (no spaces):<br>
    <textarea name="originalDNA" rows="15" cols="60" required="yes"></textarea><br>
</p>

<p>
    <p>
    <input type="submit" value="Submit">
    </p>
</p>
</form>

</body>
</html>