<?php
include("../../connection/conn.php");
include("../../functions/functions.php");
session_start();

if(!isset($_SESSION["sensum_40159215"]))
{
    header("Location: /SensumEmotionalApplication/login/login.php");
}


$getuserid = "SELECT * FROM `Sensum_Users` WHERE `Username` = '{$_SESSION['sensum_40159215']}'";
$userresult = mysqli_query($conn, $getuserid) or die(mysqli_error($conn));



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

  <!-- Ajax Script -->
  <!-- REFERENCE: https://www.youtube.com/watch?v=MG9itGX1hD0&t=613s (Ajax post query) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("button").click(function(){
        $.post("submit-settings.php", $("#comment-form").serialize() {
          alert ("Submission successful");
          }
        );
      });
    });
  </script>

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
        <form name="settings" action="" method="post" id="comment-form">
          <div class="form-group">
            <input type="hidden" id="userid" name="userid" value="1">
            <input type="hidden" id="carerid" name="carerid" value="2">
            <label for="dailymessage">Your daily message for your user!</label>
            <textarea class="form-control" id="dailymessage" rows="3" name="message"></textarea>
          </div>
          <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['submit'])){

    $userid = $_POST['userid'];
    $carerid = $_POST['carerid'];
    $message = $_POST['message'];

    //Prepare the insert statement
    $query = "INSERT INTO Sensum_CaregiverMessage(`User_ID`, `Carer_ID`, `Message`) VALUES (?,?,?)";
    if($stmt = mysqli_prepare($conn, $query)){
      //bind variable to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "iis", $userid, $carerid, $message);

      //Set Values
      $userid = $_POST['userid'];
      $carerid = $_POST['carerid'];
      $message = $_POST['message'];

      echo "
      <div class='container'>
        <div class='row'>
          <div class='col-md-6 mx-auto'>
          <p> Message has been submitted!<p>
          </div>
        </div>
      </div>";
      mysqli_stmt_execute($stmt);
    } else{
      echo "ERROR: Could not prepare query: $query . " . mysqli_error($conn);
    }

  }
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="/SensumEmotionalApplication/vendor/jquery/jquery.min.js"></script>
  <script src="/SensumEmotionalApplication/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>








