<?php
// REFERENCE:
// // CODE TAKEN FROM:
// https://www.webslesson.info/2017/12/jquery-fullcalandar-integration-with-php-and-mysql.html
// Prepared Query is from previous project in Year 2

//Delete events
include("../../connection/conn.php");
if(isset($_POST["id"]))
{
	$eventid = $_POST["id"];
	$query = "DELETE from `Sensum_Events` WHERE id= '$eventid'";
	$statement = $conn->prepare($query);
	$statement->execute();
}

?>