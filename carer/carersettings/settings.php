<?php
include("/SensumEmotionalApplication/functions/functions.php");
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
  <link href="/SensumEmotionalApplication/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/SensumEmotionalApplication/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/SensumEmotionalApplication/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="/SensumEmotionalApplication/css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php
    carernav();
  ?>

  <!-- Card Grid -->

  <!-- Bootstrap core JavaScript -->
  <script src="/SensumEmotionalApplication/vendor/jquery/jquery.min.js"></script>
  <script src="/SensumEmotionalApplication/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>








