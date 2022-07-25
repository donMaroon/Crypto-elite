<?php

session_start();


include "../../config/db.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;


if(isset($_POST['submit'])){



$email =$link->real_escape_string($_POST['email']);





$sql = "UPDATE users SET 2fa='0' WHERE email='$email'";

if (mysqli_query($link, $sql)) {

  

    $msg= " 2FA deactivated successfully";
  }

else {
    $msg= " Cannot deactivate 2FA";
    
}

}


include "header.php";


    ?>





 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">



   


       

<div class="col-md-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">

          <h4 align="center"><i class="fa fa-times"></i> GOOGLE AUTHENTICATOR DEACTIVATOR</h4>
          </br>
          	<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
<div class="col-md-12 col-sm-12 col-sx-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-white">
             

              <form class="form-horizontal" action="deactivate.php" method="POST" >
             

             
<div class="form-group">
<input type="text"  name="email"  placeholder="Enter investor email to deactivate google authenticator" class="form-control">
 
</div>

<div class="form-group">
<input type="submit"  name="submit" value="Deactivate 2FA" class="btn btn-danger">
 
</div>

            </div>
          </div>
          <!-- /.widget-user -->
        </div>