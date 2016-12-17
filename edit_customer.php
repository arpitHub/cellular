<?php

include 'dbconnect.php';

$customerId = $_REQUEST['id'];

if ($customerId == '' or $customerId == null) {
  die("Invalid Customer Id");
}

$query = "SELECT * FROM Customer where Customer_ID='$customerId'";
$sql = $conn->query($query);
$row  = $sql->fetch_assoc();
if($row != NULL)
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
    				<li class="active"><a href="home.php" target="_blank">Home</a></li>
    				<li><a href="#" target="_blank">List</a></li>
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
      <div><h3><p>Edit Info for: <?php echo $row['Customer_FName']. ' '. $row['Customer_Lname']; ?></p></h3></div><br />
      <form action="edit_customer_success.php" method="post">
          <input type="hidden" name="Customer_ID" value="<?php echo $row['Customer_ID']; ?>" >
          <div class="form-group col-xs-4">
              <label for="inputFName">First Name</label>
              <input type="text" name="Customer_FName" value=<?php echo $row['Customer_FName']; ?> class="form-control" >
          </div>
          <div class="form-group col-xs-4">
              <label for="inputLName">Last Name</label>
              <input type="text" name="Customer_Lname" class="form-control" value=<?php echo $row['Customer_Lname']; ?>>
          </div>
          <div class="form-group col-xs-4">
              <label for="inputPhone">Phone No.</label>
              <input type="tel" name="Phone_Number" class="form-control" readonly value=<?php echo $row['Phone_Number']; ?>>
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
    </div>
  </body>
</html>
<?php
}
$conn->close();
?>
