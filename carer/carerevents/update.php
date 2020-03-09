<?php
	//Update calendar
	// REFERENCE:
	// CODE TAKEN FROM:
	// https://www.webslesson.info/2017/12/jquery-fullcalandar-integration-with-php-and-mysql.html
	// Prepared Query is from previous project in Year 2
	include("../../connection/conn.php");
	echo "Connection Successful!";

	if(isset($_POST['id'])){

	    //Prepare values
		$userid = 1;
		$eventTitle = $_POST["title"];
		$eventStart = $_POST["start"];
		$eventEnd = $_POST["end"];  
		$eventid = $_POST["id"]; 

	    //Prepare Query
		$updateeventquery = "UPDATE Sensum_Events SET User_ID=?, Description=?, Event_Start=?, 
		Event_End=? WHERE id=?";

	    //Initialist statement
		$stmt = mysqli_stmt_init($conn);
	    //Run statement
		if(!mysqli_stmt_prepare($stmt, $updateeventquery)){
			echo "SQL ERROR!";
		} else{
	    //Bind params
			mysqli_stmt_bind_param($stmt, "isss", $userid, $eventTitle, $eventStart, $eventEnd);
			mysqli_stmt_execute($stmt);
			echo "Query Successful!";
		}
	}
?>