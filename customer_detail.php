<?php

include 'dbconnect.php';

$customerId = $_REQUEST['id'];
$paymentInfo = null;
$payment = array('Card_Type' => '','Card_Number' => '', 'Address' => '',
'City' => '', 'State' => '', 'Zip' => '', 'Total_Cost' => '');

if ($customerId == '' or $customerId == null) {
  die("Invalid Customer Id");
}

$query = "SELECT * FROM Customer JOIN Plans ON Plans.Plan_ID = Customer.Plan_ID WHERE Customer_ID='$customerId'";
$sql = $conn->query($query);
$row  = $sql->fetch_assoc();

if (!empty($row) && 'P' == $row['Customer_Type']) {
  $query = "SELECT * FROM Payment where Customer_ID='$customerId'";
  $sql = $conn->query($query);
  $payment = $sql->fetch_assoc();
}
//print_r($payment);die;

if($row!= NULL)
{
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
    				<li class="active"><a href="home.php">Home</a></li>
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
      <div><h3><span class="glyphicon glyphicon-user"></span><p><?php echo $row['Customer_FName']. ' '. $row['Customer_Lname']; ?></p></h3></div><br />
      <div class="container">
        <div class="row">
          <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Plan</h3>
  </div>
  <div class="panel-body">
    <p class="alert alert-warning" role="alert"><b>Cost : $<?php echo $row['Plan_Cost'] ?></b></p>
    <p class="alert alert-warning" role="alert"><b>Name : <?php echo $row['Plan_Name'] ?></b></p>
    <p class="alert alert-warning" role="alert"><b>Minutes : <?php echo $row['Minutes'] ?></b></p>
    <p class="alert alert-warning" role="alert"><b>Messages : <?php echo $row['Messages'] ?></b></p>
    <p class="alert alert-warning" role="alert"><b>Data : <?php echo $row['Data'] ?></b></p>
    <p class="alert alert-warning" role="alert"><b>Lines : <?php echo $row['Lines'] ?></b></p>
  </div>
</div>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">More Details</h3>
</div>
<div class="panel-body">
  <p class="alert alert-warning" role="alert"><b>Card_Type : <?php echo $payment['Card_Type'] ?></b></p>
  <p class="alert alert-warning" role="alert"><b>Card_Number : <?php echo $payment['Card_Number'] ?></b></p>
  <p class="alert alert-warning" role="alert"><b>Address : <?php echo $payment['Address'].', '.$payment['City'].', '.$payment['State'].', '.$payment['Zip'] ?></b></p>
  <p class="alert alert-warning" role="alert"><b>Total Cost (including tax.) : <?php echo $payment['Total_Cost'] ?></b></p>
</div>
</div>
        </div>
      </div>
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
    </div>
  </body>
</html>
<?php
}
$conn->close();
?>
