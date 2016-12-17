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
		/*.carousel{
		    background: #2f4357;
		    margin-top: 20px;
		}
		.carousel .item img{
		    margin: 0 auto;
		}
		.bs-example{
			margin: 20px;
		}*/
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
<!-- <div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/slide1.png" alt="First Slide">
            </div>
            <div class="item">
                <img src="images/slide2.png" alt="Second Slide">
            </div>
            <div class="item">
                <img src="images/slide3.png" alt="Third Slide">
            </div>
        </div>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div> -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1>Welcome to Admin Dashboard for Simple Beings Cellular Service</h1>
		<p>You can manage Customer and Plan related information from this section</p>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-4">
			<h2>New Customer</h2>
			<p>Add new customer</p>
			<p><a href="add_customer.php" target="_blank" class="btn btn-info btn-lg glyphicon glyphicon-plus"></a></p>
		</div>
		<div class="col-xs-4">
			<h2>Edit Customers</h2>
			<p>Edit the information of existing customer</p>
			<p><a href="manage_customers.php" target="_blank" class="btn btn-info btn-lg glyphicon glyphicon-pencil"></a></p>
		</div>
		<div class="col-xs-4">
			<h2>Manage Plans</h2>
			<p>You can manage different plans from this page</p>
			<p><a href="manage_plans.php" target="_blank" class="btn btn-info btn-lg glyphicon glyphicon-phone"></a></p>
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
</div></html>
