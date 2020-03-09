<?php
    if(isset($_POST['btn'])){
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

        if(!empty($newprofilepicname)){
          if (move_uploaded_file($newprofilepictemp, "/SensumEmotionalApplication/img/$newprofilepicname")) {
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