
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
<div class="row">

  </div>
</div>
</body>
</html>
