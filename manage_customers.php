<?php

  include 'dbconnect.php';
  $sql = $conn->query("SELECT * FROM Customer");
  //while ($row = $sql->fetch_assoc()){print_r($row);}die;
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
			<a class="navbar-brand" href="home.php">Simple Beings</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="home.php">Home</a></li>
				<li><a href="list.php">List</a></li>
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
  <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone No</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
          <?php
            while ($row = $sql->fetch_assoc()){
              echo "<tr>";
              echo "<td>".$row['Customer_ID']."</td>";
              echo "<td>".$row['Customer_FName']."</td>";
              echo "<td>".$row['Customer_Lname']."</td>";
              echo "<td>".$row['Phone_Number']."</td>";
              echo "<td><a class='btn btn-primary glyphicon glyphicon-pencil' href=edit_customer.php?id=".$row['Customer_ID']. "></a>&nbsp;&nbsp;&nbsp;&nbsp;";
              echo "<a onclick=\"return confirm('Are you sure you wish to delete this Record?');\" class='btn btn-primary glyphicon glyphicon-trash' href=delete_customer.php?id=".$row['Customer_ID']."></a></td></tr>";
            }
            $conn->close();
          ?>
        </tbody>
    </table>
</div></html>
