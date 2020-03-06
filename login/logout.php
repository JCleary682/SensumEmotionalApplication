<?php
session_start();

if(!isset($_SESSION["sensum_40159215"]))
{    
    header("Location: login.php");
  }else{ 
    unset($_SESSION["sensum_40159215"]);
    header("Location: login.php");
}

?>