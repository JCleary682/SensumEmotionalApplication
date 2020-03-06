	<?php

	//Update calendar

	include("../../connection/conn.php");
	echo "Connection Successful!";
	// if(isset($_POST["id"]))
	// {
	// 	$query = "
	// 	UPDATE events
	// 	SET title=:title, start_event=:start_event, end_event=:end_event
	// 	WHERE id=:id
	// 	";

	// 	$statement = $connect->prepare($query);
	// 	$statement->execute(
	// 		array(
	// 			':title' => $_POST['title'],
	// 			':start_event' => $_POST['start'],
	// 			':end_event' => $_POST['end'],
	// 			':id' => $_POST['id']
	// 		)
	// 	);
	// }

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