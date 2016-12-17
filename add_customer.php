<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cellular";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  $employees = $conn->query("SELECT Employee_ID,Employee_FName,Employee_Lname FROM Employee");
  $familyHeads = $conn->query("SELECT Customer_ID, Customer_FName, Customer_Lname, Family_PlanID FROM Customer
                               Where Customer_Type='P'");
  $plans = $conn->query("SELECT Plan_ID,Plan_Name FROM Plans");
  // while ($row = $employees->fetch_assoc()){
  //   print_r($row);
  // }
  $conn->close();
  //die;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic Bootstrap Template</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<style type="text/css">
    body{
    	padding-top: 70px;
    }
</style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Simple Beings</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="./home.php">Home</a></li>
				<li><a href="./list.php">List</a></li>
        <li>
          <form class="navbar-form navbar-left" action='./search_customer.php' method='get'>
          <div class="form-group">
            <input type="text" class="form-control" name="searchtext" placeholder="Search" />
          </div>
          <button type="submit" class="btn btn-danger">Search</button>
         </form>
        </li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
  <div><h3><p>Add New Customer:</p></h3></div><br />
  <form action="add_customer_info_success.php" method="post">
      <div class="form-group col-xs-4">
          <label for="inputFName">First Name</label>
          <input type="text" required name="Customer_FName" class="form-control" id="inputFName" placeholder="Please write the First Name">
      </div>
      <div class="form-group col-xs-4">
          <label for="inputLName">Last Name</label>
          <input type="text" required name="Customer_Lname" class="form-control" id="inputLName" placeholder="Please write the Last Name">
      </div>
      <div class="form-group col-xs-4">
          <label for="inputPhone">Phone No.</label>
          <input type="text" pattern="^\d{10}$" required name="Phone_Number" class="form-control" id="inputPhone" placeholder="Phone no.">
      </div>
      <div class="form-group col-xs-4">
        <label for="plans">Plan Type:</label>
        <select class="form-control" name="plan_type">
          <option value="0">Single Line</option>
          <option value="1">Family Plan</option>
        </select>
      </div>
      <div class="form-group col-xs-4">
        <label for="plans">Customer Type:</label>
        <select class="form-control" name="customer_type" id="customer_type">
          <option value="S">Secondary</option>
          <option value="I">Single</option>
          <option value="P">Head</option>
        </select>
      </div>
      <div class="form-group col-xs-4">
        <label for="plans">Employee:</label>
        <select class="form-control" id="employee" name="employee">
          <?php
            while ($row = $employees->fetch_assoc()){
              echo "<option value=" . $row['Employee_ID']. ">" . $row['Employee_FName'] . ' ' . $row['Employee_LName'] . "</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
      <label for="plans">Plan:</label>
      <select class="form-control" id="plan" name="plan">
        <?php
          while ($row = $plans->fetch_assoc()){
            echo "<option value=" . $row['Plan_ID']. ">" . $row['Plan_Name'] . "</option>";
          }
        ?>
      </select><br />
      <div class="form-group">
        <label for="plans">Family Heads:</label>
        <select class="form-control" id="heads" name="family heads">
          <option selected disabled>Choose here</option>
          <?php
            while ($row = $familyHeads->fetch_assoc()){
              echo "<option value=" . $row['Family_PlanID']. ">" . $row['Customer_FName'] . ' '. $row['Customer_LName']. "</option>";
            }
          ?>
        </select>
      </div>
      <br />
      <div id="payment_fields">
        <div class="row">
            <b>For Primary and Single Line Customers</b>
        </div><br />
        <div class="form-group col-xs-4">
            <label for="inputCardType">Card Type</label>
            <select class="form-control" id="card_type" name="Card_Type">
              <option value="debit">Debit</option>
              <option value="credit">Credit</option>
            </select>
        </div><div class="form-group col-xs-4">
            <label for="inputCardNum">Card Number</label>
            <input type="text" class="form-control" name="Card_Number" id="inputCardNum" placeholder="Card Number">
        </div>
        <div class="form-group col-xs-4">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="Address" id="inputAddress" placeholder="Address">
        </div>
        <div class="form-group col-xs-4">
            <label for="inputState">City</label>
            <input type="text" class="form-control" name="City" id="inputState" placeholder="ex. Boston">
        </div>      <div class="form-group col-xs-4">
            <label for="inputState">State</label>
            <input type="text" class="form-control" name="State" id="inputState" placeholder="ex. Massachussets">
        </div>
        <div class="form-group col-xs-4">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" name="Zip" id="inputZip" placeholder="ex. 01229">
        </div>
        <div class="form-group col-xs-6">
            <label for="inputVD">Verification Document</label>
            <input type="text" class="form-control" name="Verification_Document" id="inputVD" placeholder="ex. SSN, Driver License">
        </div>
        <br />
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
  <br /><br />
  <br /><br />
  <br /><br />
  <hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
				<p>&copy; Copyright 2016 Simple Beings</p>
			</footer>
		</div>
	</div>
</div></body>
<script>
  $(function() {
    $("#payment_fields").hide();
    $('#customer_type').change(function(){
      if($('#customer_type').val() == 'P' || $('#customer_type').val() == 'I' ) {
          $('#payment_fields').show();
        } else {
          $('#payment_fields').hide();
      }
    });
  });
</script>
</html>
