<?php

include("../../connection/conn.php");

$eventsquery = "SELECT * FROM `Sensum_Events`";

$eventsresult = mysqli_query($conn, $eventsquery) or die(mysqli_error($conn));

foreach ($eventsresult as $row) {
	$eventsarray[] = array(
		'id' => $row["id"],
		'title' => $row["Description"],
		'start' => $row["Event_Start"],
		'end' => $row["Event_End"]
	);
}


$eventsJSON = json_encode($eventsarray);
echo $eventsJSON;

?>