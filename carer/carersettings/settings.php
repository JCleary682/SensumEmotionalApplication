<?php
include("../../connection/conn.php");
include("../../functions/functions.php");
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

  <div class="container-fluid my-2">
    <div class="row">
      <div class="col-md-6 align-self- mx-auto">
        <form>
          <div class="form-group">
            <label for="dailymessage">Your daily message for your user!</label>
            <textarea class="form-control" id="dailymessage" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="/SensumEmotionalApplication/vendor/jquery/jquery.min.js"></script>
  <script src="/SensumEmotionalApplication/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>








