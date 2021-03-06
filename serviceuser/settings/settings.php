<?php
include("../../functions/functions.php");
include('../../connection/conn.php');
session_start();

if(!isset($_SESSION["sensum_40159215"]))
{
  header("Location: /SensumEmotionalApplication/login/login.php");
}


$userquery = "SELECT * FROM `Sensum_Users` WHERE `Username` = '{$_SESSION['sensum_40159215']}'";
$userresult = mysqli_query($conn, $responsequery);
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

  <!-- Navbar --> 
  <?php
  usernav();
  ?>
  <!-- Navbar end -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto" >
        <h1>User Settings</h1>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <form enctype="multipart/form-data" action="" method="post" name="settings" id="picture-settings">
          <div class="form-group">
            <h2>Please upload your favourite image!</h2>
            <label for="file">Image Upload</label>
            <input name="propic" type="file" class="form-control-file">
            <small class="form-text text-muted">Max Size 3mb</small>
          </div>
          <button class="btn btn-primary" type="submit" name="submit" id="picture-settings">Submit form</button>
        </form>
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['submit'])){
      include('../../connection/conn.php');

      //Prepare the insert statement
      $query = "INSERT INTO `Sensum_Images` (`User_ID`, `img`) VALUES (?, ?);";

      if($stmt = mysqli_prepare($conn, $query)){
        //bind variable to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "is", $userid, $newprofilepicname);

        //Set Values
        $userid = 2;
        $newprofilepicname = $_FILES['propic']['name'];
        $newprofilepictemp = $_FILES['propic']['tmp_name'];
        $filepath = "../../img/";
        $filepath = $filepath . basename($_FILES['propic']['name']);
        $filepath;

        if(!empty($newprofilepicname)){
          if (move_uploaded_file($newprofilepictemp, $filepath)) {
            echo "file moved successfully";
          } else {
            echo "Upload not successful";
            echo $_FILES['propic']['error'];
          }
        } else{
          echo "<p>No file selected</p>";
          die();
        }

        mysqli_stmt_execute($stmt);

        echo"<p>Upload Successful</p>";
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
