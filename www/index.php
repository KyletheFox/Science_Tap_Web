<?php 	
	function redirectTo($newLocation) {
		header("Location: " . $newLocation);
		exit;
	}
	// Start Session
	session_start();

	// Attempt to gain access to mysql server
	$username = "root";
	$password = "C7t32813";
	$dbhost = "127.0.0.1";		// Need to change for live server
	$dbname = "user_pass";
	$connection = mysqli_connect($dbhost, $username, $password, $dbname);

	if (mysqli_connect_errno()) {
		die("Database Connection Failed " . mysqli_connect_error() .
			mysqli_connect_error() . 
			" (" . mysqli_errno() . ")"
		);
	}
	
	if (isset($_POST['submit'])) {
		$submit = 1;
	} else {
		$submit = 0;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Kyle O'Neill</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	
	<!-- Angular JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>

	<!-- Bootstrap -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">

	<!-- Modules -->
	<script type="text/javascript" src="./js/app.js"></script>

	 <!-- Controllers -->
    <script src="./js/controllers/MainController.js"></script>

    <!-- Directives -->
    <script src="./js/directives/academics.js"></script>
    <script src="./js/directives/techProj.js"></script>
    <script src="./js/directives/volunteer.js"></script>
    <script src="./js/directives/login.js"></script>

	<script src="js/jquery-color-cycle-plugin-master/jquery.colorcycle.min.js"></script>
	<script type="text/javascript" src="js/webpage.js"></script> 
</head>
<body ng-app="SomeDemo">
	<div ng-controller="MainController" ng-init="display=0">

	 <!--Bootstrap Fixed Navbar -->
   <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      
      <div class="navbar-header">
        
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="icon-bar"></span>     
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>     
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>     
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                         
        </button>
        <a class="navbar-brand" href="index.php">Kyle O'Neill</a>


      </div>

      <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
	
		<ul class="nav navbar-nav navbar-text navbar-right">
          <li><a href="#" onclick="location.href='index.php?id=4'">Sign In</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-text navbar-left">
          <li><a href="resume.pdf">Resume</a></li>
          <li><a href="bank_app/bank.php">Currency Converter</a></li>
        </ul>

      </div>


    </div>
  </nav>

	<div class="container-fluid">
	
<!-- Top Row -->
		<div class="row" id="top-empty">	
			<!-- EMPTY -->
		</div>

		
<!-- Button Row -->
		<div class="row" id="buttons">
			<div class="col col-xs-1 col-md-3">
				<!-- EMPTY -->
			</div>

			<div class="col col-xs-10 col-md-6" id="button-box">
				<button type="button" class="btn btn-default" onclick="location.href='index.php?id=1'">Academics</button>
				<button type="button" class="btn btn-default" onclick="location.href='index.php?id=2'">Technical Projects</button>
				<button type="button" class="btn btn-default" onclick="location.href='index.php?id=3'">Volunteer Projects</button>
			</div>

			<div class="col">
				
			</div>
		</div>


<!-- Content Row -->
		<div class="row" id="content">
			<div class="col col-xs-1 col-md-3">
				<!-- EMPTY -->
			</div>

			<div class="col col-xs-10 col-md-6" id="content-box">

				<div id="content-box-text">

					<?php // Logic for switching between pages
						if (!isset($_GET['id'])) {
							$home = 0;
						} else if ($_GET['id'] == 1) {
							$home = 1;
						} else if ($_GET['id'] == 2) {
							$home = 2;
						} else if ($_GET['id'] == 3) {
							$home = 3;
						} else if ($_GET['id'] == 4) {
							$home = 4;
						} else {
							$home = 0;
						}
					 ?>

					<div ng-show="<?php echo $home; ?> == 0">
						<img src="img/profilepic.jpg" id="home-page-pic">
					</div>

					<academics ng-show="<?php echo $home; ?> == 1"></academics>

					<tech-proj ng-show="<?php echo $home; ?> == 2"></tech-proj>

					<volunteer ng-show="<?php echo $home; ?> == 3"></volunteer>

					<div ng-show="<?php echo $home; ?> == 4">
						<?php 
							if ($submit==1) {
								echo " I Clicked Submit ";
							}
						 ?>
						<form action="index.php?id=4" method="post">
								Username: <input type="text" name="username" value="" /><br />
								Password: <input type="password" name="password" value="" /><br />
								<br />
								<input type="submit" name="submit" value="Submit" />
								<?php // name attributed needed for it to be inclded with POST Request ?>
						</form>
					</div>

				</div>

			</div>

			<div class="col">
				<!-- EMPTY -->
			</div>
		</div>

<!-- Bottom Row -->
		<div class="row" id="bottom-empty">	
		
		</div>
	
	</div> <!-- End of Container Fluid -->

</body>
</html>