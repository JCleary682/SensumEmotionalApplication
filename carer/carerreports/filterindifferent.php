<?php
//Prepared Query is from previous project in Year 2
include("../../connection/conn.php");

// HAPPY
$indifferentquery = "SELECT * FROM `Sensum_HealthRecord`
INNER JOIN `Sensum_FeedbackType`
ON `Sensum_HealthRecord`.`Feedback` = `Sensum_FeedbackType`.`Feedback_Type`
INNER JOIN `Sensum_Users`
ON `Sensum_HealthRecord`.`User_ID` = `Sensum_Users`.`ID`
INNER JOIN `Sensum_Events`
ON `Sensum_HealthRecord`.`Event_ID` = `Sensum_Events`.`id`
WHERE `Sensum_HealthRecord`.`Feedback` = 3
LIMIT 10";
$indifferentresult = mysqli_query($conn, $indifferentquery);
$indifferentcount = mysqli_num_rows($indifferentresult);
$rownumber = 1; 
if ($indifferentcount > 0) {
	while ($row = mysqli_fetch_assoc($indifferentresult)) {
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
} else {
	echo "<tr>
	No Results!
	</tr>";
}

?>