<?php
include("/SensumEmotionalApplication/connection/conn.php");

// HAPPY
$sadquery = "SELECT * FROM `Sensum_HealthRecord`
INNER JOIN `Sensum_FeedbackType`
ON `Sensum_HealthRecord`.`Feedback` = `Sensum_FeedbackType`.`Feedback_Type`
INNER JOIN `Sensum_Users`
ON `Sensum_HealthRecord`.`User_ID` = `Sensum_Users`.`ID`
INNER JOIN `Sensum_Events`
ON `Sensum_HealthRecord`.`Event_ID` = `Sensum_Events`.`id`
WHERE `Sensum_HealthRecord`.`Feedback` = 2
LIMIT 10";
$sadqueryresult = mysqli_query($conn, $sadquery);
$sadcount = mysqli_num_rows($sadqueryresult);
$rownumber = 1; 
if ($sadcount > 0) {
	while ($row = mysqli_fetch_assoc($sadqueryresult)) {
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