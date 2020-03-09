<?php
include("../../connection/conn.php");
// REFERENCE:
// CODE TAKEN FROM:
// https://www.webslesson.info/2017/12/jquery-fullcalandar-integration-with-php-and-mysql.html

echo "Connection Successful!";
if(isset($_POST["title"]))
{
	if(isset($_POST['title'])){
                            
        //Prepare the insert statement
        $query = "INSERT INTO `Sensum_Events`(`User_ID`, `Description`, `Event_Start`,`Event_End`) VALUES (?,?,?,?)";                   
        if($stmt = mysqli_prepare($conn, $query)){
        //bind variable to the prepared statement as parameters
	        mysqli_stmt_bind_param($stmt, "isss", $userid, $eventTitle, $eventStart, $eventEnd);             //Set Values
	        $userid = 1;
			$eventTitle = $_POST["title"];
			$eventStart = $_POST["start"];
			$eventEnd = $_POST["end"];                      
	        mysqli_stmt_execute($stmt);
	        echo"<p>Entry successful</p>";
        } else{
            	echo "ERROR: Could not prepare query: $query . " . mysqli_error($conn);
            }      
        }
}
?>