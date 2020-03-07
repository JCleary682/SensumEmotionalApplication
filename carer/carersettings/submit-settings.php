  <?php
  if(isset($_POST['submit'])){
    include("../../connection/conn.php");
    echo "connection successful";

    $userid = $_POST['userid'];
    $carerid = $_POST['carerid'];
    $message = $_POST['message'];
    echo $userid;
    echo $carerid;
    echo $message;

    //Prepare the insert statement
    $query = "INSERT INTO Sensum_CaregiverMessage(`User_ID`, `Carer_ID`, `Message`) VALUES (?,?,?)";
    if($stmt = mysqli_prepare($conn, $query)){
      //bind variable to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "iis", $userid, $carerid, $message);

      //Set Values
      echo $userid = $_POST['userid'];
      echo $carerid = $_POST['carerid'];
      echo $message = $_POST['message'];

      mysqli_stmt_execute($stmt);
    } else{
      echo "ERROR: Could not prepare query: $query . " . mysqli_error($conn);
    }

  }
  ?>