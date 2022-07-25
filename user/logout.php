<?php   
session_start(); //to ensure you are using same session
include "../config/db.php";
$email=$_SESSION['email'];

if(session_destroy()){ //destroy the session
$sql = "UPDATE users SET session='0' WHERE email='$email'";

	  mysqli_query($link, $sql) or die(mysqli_error($link));

	  header("location:../login.php");
}
exit();
?>