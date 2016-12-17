<?php

  include 'dbconnect.php';
  $sql = $conn->query("SELECT * FROM Plans");
  //while ($row = $sql->fetch_assoc()){print_r($row);}die;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Beings</title>
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
				<li class="active"><a href="home.php" target="_blank">Home</a></li>
				<li><a href="list.php" target="_blank">List</a></li>
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
  <div id='row'><h3>Plans</h3></div>
  <table class="table table-bordered">
        <thead>
            <tr>
                <th>Plan Id</th>
                <th>Plan Name</th>
                <th>Plan Cost</th>
                <th>Minutes</th>
                <th>Messages</th>
                <th>Data</th>
                <th>Lines</th>
            </tr>
        </thead>

        <tbody>
          <?php
            while ($row = $sql->fetch_assoc()){
              echo "<tr>";
              echo "<td>".$row['Plan_ID']."</td>";
              echo "<td>".$row['Plan_Name']."</td>";
              echo "<td>$".$row['Plan_Cost']."</td>";
              echo "<td>".$row['Minutes']."</td>";
              echo "<td>".$row['Messages']."</td>";
              echo "<td>".$row['Data']."</td>";
              echo "<td>".$row['Lines']."</td>";
              echo "</tr>";
            }
          ?>
        </tbody>
    </table>
</div>
</body>
</html>
