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
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="/SensumEmotionalApplication/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/SensumEmotionalApplication/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/SensumEmotionalApplication/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="/SensumEmotionalApplication/css/landing-page.min.css" rel="stylesheet">
</head>
<body>
	<!-- Navbar --> 
	<nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='navbar-brand' href='#'>Sensum Magic Mirror</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
        <ul class='navbar-nav ml-auto'>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-info' href='/SensumEmotionalApplication/serviceuser/serviceuserhome.php'>Home</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-primary' href='/SensumEmotionalApplication/serviceuser/userevents/eventcalendar.php'>View Events</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-danger' href='/SensumEmotionalApplication/serviceuser/sensumform/sensumform.php'>Daily Walkthrough</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-success' href='/SensumEmotionalApplication/serviceuser/reports/userreports.php'>View Reports</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-warning' href='/SensumEmotionalApplication/serviceuser/settings/settings.php'>Your Settings</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-primary' href='/SensumEmotionalApplication/login/logout.php'>Logout</a>
          </li>
        </ul>
      </div>
    </nav>

	<!-- User Grid -->
	<section class="bg-light text-center">
		<div class="container">
			<div class="row mb-4">
				<div class="col-lg-4 my-2">
					<div class="card card-inverse card-primary mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid" src="../img/calendar.jpeg" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>View your users upcoming events!</h2>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/userevents/eventcalendar.php" class="btn btn-primary">View Calendar</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- Empty column for spacing -->
				</div>
				<div class="col-lg-4 my-2">
					<div class="card card-inverse card-danger mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid" src="../img/EmojiTriangle.png" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>Give feedback on your upcoming events!</h2>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/sensumform/sensumform.php" class="btn btn-danger">View Your Daily Walkthrough</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col-lg-4 my-2">
					<div class="card card-inverse card-success mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid" src="../img/reports.jpeg" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>View your users event reports!</h2>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/reports/userreports.php" class="btn btn-success">View Reports</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- Empty column for spacing -->
				</div>
				<div class="col-lg-4 my-2">
					<div class="card card-inverse card-warning mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid settings-card" src="../img/settingsnew.png" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>Tailor your system to your needs!</h2>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/settings/settings.php" class="btn btn-warning">Settings</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	        <!-- Bootstrap core JavaScript -->
  <script src="/SensumEmotionalApplication/vendor/jquery/jquery.min.js"></script>
  <script src="/SensumEmotionalApplication/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>