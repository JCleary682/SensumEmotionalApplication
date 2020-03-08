<?php
include("../functions/functions.php");
session_start();

if(!isset($_SESSION["sensum_40159215"]))
{
    header("Location: /SensumEmotionalApplication/login/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sensum Magic Mirror - Mental Health Monitoring For Adults With Autism</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php
    carernav();
  ?>

  <!-- Card Grid -->
  <section class="bg-light text-center">
  	<div class="container">
  		<div class="row mb-4">
  			<div class="col-lg-4 my-2">
  				<div class="card card-inverse card-primary mb-2 text-center h-100 w-100">
  					<div class="card-block">
  						<div class="image-container">
  							<img class="card-img-top img-fluid" src="../img/calendar.jpeg" alt="Card image cap">
  						</div>
  						<blockquote class="card-blockquote">
  							<h2>View your users upcoming events!</h2>
  						</blockquote>
  						<a href="carerevents/eventcalendar.php" class="btn btn-primary">View Calendar</a>
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-4">
  				<!-- Empty column for spacing -->
  			</div>
  			<div class="col-lg-4 my-2">
  				<div class="card card-inverse card-danger mb-2 text-center h-100 w-100">
  					<div class="card-block">
  						<div class="image-container">
  							<img class="card-img-top img-fluid" src="../img/EmojiTriangle.png" alt="Card image cap">
  						</div>
  						<blockquote class="card-blockquote">
  							<h2>View your users responses to events!</h2>
  						</blockquote>
  						<a href="#" class="btn btn-danger">View Event Responses</a>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="row mb-4">
  			<div class="col-lg-4 my-2">
  				<div class="card card-inverse card-success mb-2 text-center h-100 w-100">
  					<div class="card-block">
  						<div class="image-container">
  							<img class="card-img-top img-fluid" src="../img/reports.jpeg" alt="Card image cap">
  						</div>
  						<blockquote class="card-blockquote">
  							<h2>View your users event reports!</h2>
  						</blockquote>
  						<a href="#" class="btn btn-success">View Reports</a>
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-4">
  				<!-- Empty column for spacing -->
  			</div>
  			<div class="col-lg-4 my-2">
  				<div class="card card-inverse card-warning mb-2 text-center h-100 w-100">
  					<div class="card-block">
  						<div class="image-container">
  							<img class="card-img-top img-fluid settings-card" src="../img/settingsnew.png" alt="Card image cap">
  						</div>
  						<blockquote class="card-blockquote">
  							<h2>Tailor your system to your user!</h2>
  						</blockquote>
  						<a href="#" class="btn btn-warning">Settings</a>
  					</div>
  				</div>
  			</div>
  		</div>

  	</div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>




