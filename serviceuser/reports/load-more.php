<?php
include("../../connection/conn.php");

// HAPPY
$morequery = "SELECT * FROM `Sensum_HealthRecord`
INNER JOIN `Sensum_FeedbackType`
ON `Sensum_HealthRecord`.`Feedback` = `Sensum_FeedbackType`.`Feedback_Type`
INNER JOIN `Sensum_Users`
ON `Sensum_HealthRecord`.`User_ID` = `Sensum_Users`.`ID`
INNER JOIN `Sensum_Events`
ON `Sensum_HealthRecord`.`Event_ID` = `Sensum_Events`.`id`
LIMIT 10,20";
$morequeryresult = mysqli_query($conn, $morequery);
$morecount = mysqli_num_rows($morequeryresult);
$rownumber = 1; 
if ($morecount > 0) {
	while ($row = mysqli_fetch_assoc($morequeryresult)) {
		$eventname = $row['Description'];
		$eventresponse = $row['Emotion'];
		$eventstart = $row['Event_Start'];
		$eventend = $row['Event_End'];
		echo "<tr>
		<td>$rownumber</td>
		<td>$eventname</td>
		<td>$eventresponse</td>
		<td>$eventstart</td>
		<td>$eventend</td>
		</tr>";
		$rownumber++;
	}
								# code...
} else {
	echo "<tr>
	No Results!
	</tr>";
}

?>