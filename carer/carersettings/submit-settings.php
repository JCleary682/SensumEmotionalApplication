  <?php
  if(isset($_POST['settings'])){
    include("../../connection/conn.php");
    include("../../functions/functions.php");

    //Prepare the insert statement
    $query = "INSERT INTO Sensum_CaregiverMessage(`id`, `User_ID`, `Carer_ID`, `Message`) VALUES (?,?,?)";

    if($stmt = mysqli_prepare($conn, $query)){
      //bind variable to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "iiis", $userid, $carerid, $message);

      //Set Values
      $userid = $_POST['userid'];
      $carerid = $_POST['carerid'];
      $message = $_POST['message'];

      mysqli_stmt_execute($stmt);

      echo"<p>Registration successful</p>";
    } else{
      echo "ERROR: Could not prepare query: $query . " . mysqli_error($conn);
    }

  }
  ?>