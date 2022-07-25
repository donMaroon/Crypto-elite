<?php

use PHPMailer\PHPMailer\PHPMailer;
$email=$_GET['email'];
$username=$_GET['username'];
if(isset($_GET['refcode'])){
  $refcode = $_GET['refcode'];
}else{
	$refcode = '';
}

?>