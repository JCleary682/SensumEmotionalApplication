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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
	<!-- Navbar --> 
	<?php
      usernav();
    ?>
	<!-- Navbar end -->
	<h1>User Home</h1>

	<!-- User Grid -->
	<section class="bg-light text-center">
		<div class="container">
			<div class="row mb-4">
				<div class="col-lg-4 my-3">
					<div class="card card-inverse card-primary mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid" src="../img/calendar.jpeg" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>View your users upcoming events!</h2>
								<footer><p>View your upcoming events in a calendar format!</p></footer>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/userevents/eventcalendar.php" class="btn btn-primary">View Calendar</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- Empty column for spacing -->
				</div>
				<div class="col-lg-4 my-3">
					<div class="card card-inverse card-danger mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid" src="../img/EmojiTriangle.png" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>Give feedback on your upcoming events!</h2>
								<footer><p>View your daily events and provide feedback on your feelings towards them!</p></footer>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/sensumform/sensumform.php" class="btn btn-primary">View Your Daily Walkthrough</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col-lg-4 my-3">
					<div class="card card-inverse card-success mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid" src="../img/reports.jpeg" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>View your users event reports!</h2>
								<footer><p>Get an overview to your users responses in a graphical format</p></footer>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/reports/reports.php" class="btn btn-primary">View Reports</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- Empty column for spacing -->
				</div>
				<div class="col-lg-4 my-3">
					<div class="card card-inverse card-warning mb-3 text-center h-100 w-100">
						<div class="card-block">
							<div class="image-container">
								<img class="card-img-top img-fluid settings-card" src="../img/settingsnew.png" alt="Card image cap">
							</div>
							<blockquote class="card-blockquote">
								<h2>Tailor your system to your needs!</h2>
								<footer><p>Customize the system to your personal preference</p></footer>
							</blockquote>
							<a href="/SensumEmotionalApplication/serviceuser/settings/settings.php" class="btn btn-primary">Settings</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>