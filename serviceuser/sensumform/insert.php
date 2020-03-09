<?php
include("../../connection/conn.php");
echo "connection successful";
$query = "INSERT INTO `Sensum_HealthRecord` (`Event_ID`, `User_ID`, `Feedback`) VALUES (?,?,?)";
for($count = 0; $count<count($_POST['hidden_event_name']); $count++)
{
	if($stmt = mysqli_prepare($conn, $query)){
        //bind variable to the prepared statement as parameters
	        mysqli_stmt_bind_param($stmt, "iii", $eventname, $userid, $feedback);
			$eventname = $_POST["hidden_event_name"][$count];
			$userid = $_POST['hidden_user_name'][$count];
			$feedback = $_POST['hidden_emotion'][$count];                     
	        mysqli_stmt_execute($stmt);
	        echo"<p>Entry successful</p>";
    } else{
        	echo "ERROR: Could not prepare query: $query . " . mysqli_error($conn);
    }      
}


?>