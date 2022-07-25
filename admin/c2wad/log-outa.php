<?php   
session_start(); //to ensure you are using same session
include "../../config/db.php";


session_destroy();//destroy the session


	  header("location:../c2wadmin/signin.php");

exit();
?>