
<?php

session_start();


include "../../config/db.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_SESSION['uid'])){
	



}
else{


	header("location:../c2wadmin/signin.php");
}

if(isset($_POST['mssg'])){


 $email = $_POST['email'];
   $title = $_POST['title'];
   $message = $_POST['message'];
   
    $msgid ='cabcdg19etsfjhdshdsh35678gwyjerehuhb/>()[]{}|\dTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
            $msgid = str_shuffle($msgid);
             $msgid= substr($msgid,0, 10);


	 $sql = "INSERT INTO adminmessage (email, message, title, msgid) VALUES ('$email','$message','$title','$msgid')";
        if(mysqli_query($link, $sql)){
			
			$msg = "Message sent!";
		}else{
			
			$msg = "Message not sent!";
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

          <h4 align="center"><i class="fa fa-comment"></i> SEND PRIVATE MESSAGE</h4>
</br>


        
         

 
          <hr></hr>
          
        
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="inmessage.php" method="POST" >

           <legend>Private Message </legend>
		   
		  
 <div class="form-group">
        <input type="text" name="email" placeholder="Recipient Email"  class="form-control">
        </div>
     <div class="form-group">
        <input type="text" name="title" placeholder="Title"  class="form-control">
        </div>
		
       <div class="form-group">
        <textarea placeholder="write message here" name="message" class="form-control"></textarea>
      </div>

      
      
	  
	  <button style="" type="submit" class="btn btn-primary" name="mssg" > <i class="fa fa-send"></i>&nbsp; Send Meassage </button>


    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>

