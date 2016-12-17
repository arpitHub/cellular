<?php

  include 'dbconnect.php';
  $sql = $conn->query("SELECT * FROM Customer");
  $usages = $conn->query("SELECT * FROM Usuage");
  $isSuccess = 0;
  $isDeleted = 0;
  if (!empty($_REQUEST['success'])) {
    $isSuccess = $_REQUEST['success'];
  }

  if (!empty($_REQUEST['deleted'])) {
    $isDeleted = $_REQUEST['deleted'];
  }

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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<style type="text/css">
    body{
    	padding-top: 70px;
    }
    .results tr[visible='false'],
    .no-result{
      display:none;
    }
    .results tr[visible='true']{
      display:table-row;
    }
    .counter{
      padding:8px;
      color:#ccc;
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
				<li><a href="./home.php">Home</a></li>
				<li class="active"><a href="./list.php">List</a></li>
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
<?php
if (!empty($isSuccess) && 1 == $isSuccess) {
  echo '<div class="alert alert-success" role="alert"><a href="#" class="alert-link">Customer Succefully Created</a></div>';
}
if (!empty($isDeleted) && 1 == $isDeleted) {
  echo '<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">Customer Deleted</a></div>';
}
?>
<div class="container-fluid">
	<h2 class="sub-header"><small>Customer List</small></h2>
</div>
<div class="container">
<div class="row">
  <div class="form-group pull-right">
      <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>
  <span class="counter pull-right"></span>
  </div>
  <table class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th>Id</th>
                <th class="col-md-5 col-xs-5">First Name</th>
                <th class="col-md-4 col-xs-4">Last Name</th>
                <th class="col-md-3 col-xs-3">Phone No</th>
            </tr>
            <tr class="warning no-result">
              <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
        </thead>
        <tbody>
          <?php
            while ($row = $sql->fetch_assoc()){
              echo "<tr>";
              echo "<th scope='row'><a href='customer_detail.php?id={$row['Customer_ID']}'>".$row['Customer_ID']."</a></td>";
              echo "<td>".$row['Customer_FName']."</td>";
              echo "<td>".$row['Customer_Lname']."</td>";
              echo "<td>".$row['Phone_Number']."</td>";
              echo "</tr>";
            }
          ?>
        </tbody>
    </table>
  </div>
</div>
<div class="container-fluid">
	<h2 class="sub-header"><small>Customer's Monthly Data</small></h2>
</div>
<div class="container">
  <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Text Recieved</th>
                <th>Text Sent</th>
                <th>Data Usage</th>
                <th>Incomming Calls</th>
                <th>Outgoing Calls</th>
            </tr>
        </thead>

        <tbody>
          <?php
            while ($row = $usages->fetch_assoc()){
              echo "<tr>";
              echo "<td>".$row['Customer_ID']."</td>";
              echo "<td>".$row['Start_Date']."</td>";
              echo "<td>".$row['End_Date']."</td>";
              echo "<td>".$row['Num_Text_Received']."</td>";
              echo "<td>".$row['Num_Text_Sent']."</td>";
              echo "<td>".$row['Data_Usage']."</td>";
              echo "<td>".$row['Incomming_Calls']."</td>";
              echo "<td>".$row['Outgoing_Calls']."</td>";
              echo "</tr>";
            }
            $conn->close();
          ?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });

  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});
</script>
</body>
</html>
