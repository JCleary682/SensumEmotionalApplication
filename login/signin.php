<?php
session_start();

include("../connection/conn.php");

// So far it is recieving the username and password ok
$uname = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$checkuser = "SELECT `UserType_ID`, `Username`, `Password` FROM `Sensum_Users` WHERE `Username` = '$uname' AND `Password` = '$pass'";
$userresult = mysqli_query($conn, $checkuser) or die(mysqli_error($conn));

if(mysqli_num_rows($userresult)>0) {
    while($row = mysqli_fetch_assoc($userresult)){
        if($row['UserType_ID'] == 1){
            $_SESSION["sensum_40159215"] = $uname;
            header("location:../carer/carerhome.php");
        } else if($row['UserType_ID'] == 2){
            $_SESSION["sensum_40159215"] = $uname;
            header("location:../serviceuser/serviceuserhome.php");
        } else{
            header("Location: login.php");
            echo "unsuccessful login";
        }
    }
} else {
    echo "User does not exist";
}

mysqli_close($conn);