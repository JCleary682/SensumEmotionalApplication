<?php
include("../../connection/conn.php");

//Gets EVENT COUNT!
$eventNewCount = $_POST['eventNewCount'];
//Get dates
$todaysdate = date('Y-m-d');
$nextdate = date('Y-m-d', strtotime("+1 day"));
// Gets Events with matching ID
// $geteventsquery = "SELECT * FROM `Sensum_Events` WHERE `Event_Start` > '$todaysdate' AND `Event_Start` < '$nextdate' LIMIT '$eventNewCount',1";
$geteventsquery = "SELECT * FROM `Sensum_Events` WHERE `Event_Start` > '$todaysdate' AND `Event_Start` < '$nextdate'\n"

    . "LIMIT $eventNewCount,1";
$getmessagequery = "SELECT * FROM `Sensum_CaregiverMessage`   WHERE `id` = (SELECT MAX(`id`) FROM `Sensum_CaregiverMessage`) ";
//Stores ALL Events in result (Most likely an array)!
$result = mysqli_query($conn, $geteventsquery) or die(mysqli_error($conn));
$messageresult = mysqli_query($conn, $getmessagequery) or die(mysqli_error($conn));
// $row = mysqli_fetch_assoc($result);

// mysqli_data_seek($result, $eventCount);
// $eventNewCount = 7;
// $row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)) {
		$eventid = $row['id'];
		$userid = $row['User_ID'];
		$description = $row['Description'];
		$eventstart = $row['Event_Start'];
		$eventend = $row['Event_End'];
		echo "<div class ='tab' id='eventtab'>
								<input type='hidden' id='User_ID' name='userid' value='$userid'>
								<input type='hidden' id='Event_ID' name='eventid' value='$eventid'>
								<input type='hidden' id='Event_Count' name='eventCount' value='$eventCount'>
								<div class='form-group'>
									<label>Event</label>
									<p>$description</p>
									<input type='hidden' name='eventdescription' id='eventdescription' class='form-control' value='$description' on.input='this.className = '' />
								</div>
								<div class='form-group'>
									<label>Event Start</label>
									<p>$eventstart<p>
									<input type='hidden' name='eventstart' id='eventstart' class='form-control' value='$eventstart' on.input='this.className = '' />
								</div>
								<div class='form-group'>
									<label>Event End</label>
									<p>$eventend<p>
									<input type='hidden' name='eventend' id='eventend' class='form-control' value='$eventend' on.input='this.className = '' />
								</div>
							</div>
					";
	}
} else {
	echo "Events Complet!";
}

?>

