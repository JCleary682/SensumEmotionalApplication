<?php

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