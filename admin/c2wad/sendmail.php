<?php

session_start();


include "../../config/db.php";
include "header.php";
$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_SESSION['uid'])){
	



}
else{


	header("location:../c2wadmin/signin.php");
}



  





  

if(isset($_POST['submit'])){



$bname = $link->real_escape_string($_POST['bname']);
 
$subject = $link->real_escape_string($_POST['subject']);

$message = $link->real_escape_string($_POST['message']);


$emails = $link->real_escape_string($_POST['emails']);



require_once "PHPMailer/PHPMailer.php";
require_once 'PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "support@scriptsdemo.website";
$mail->FromName = $bname;

//To address and name
$mail->addAddress($emails);
$mail->addAddress("$emails"); //Recipient name is optional

//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $subject;

$mail->Body = '<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">



<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: red; padding: 20px; color: #fff;margin-top: 10px;">

<h1>'.$subject.' </h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;">

'.$message.'
</p>  </div> </div>';

if($mail->send()) {
  
    $msg =  "Mail has been sent successfully!";
}
               
           else{
                $msg = "Something went wrong. Please try again later!";
            }
        
    }







    ?>




  <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">


<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center">MAIL MANAGEMENT</h2>
		  </br>

</br>


        
         

 
          <hr></hr>
          
        
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="sendmail.php" method="POST" >

           <legend>Send Mail  </legend>
		   
		  
 <div class="form-group">
        <input type="text" name="bname" placeholder="bank name"  class="form-control">
        </div>
        
         <div class="form-group">
        <input type="text" name="subject" placeholder="Email Subject"  class="form-control">
        </div>
        
         <div class="form-group">
        <input type="text" name="emails" placeholder="Recipient Email"  class="form-control">
        </div>
        
        <div class="form-group">
        <textarea  name="message" placeholder="Write your mail here"  class="form-control">
            
            </textarea>
        </div>
      
     
	

      
      
	  
	  <button style="" type="submit" class="btn btn-primary" name="submit" > <i class="fa fa-send"></i>&nbsp; Send Mail </button>


    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>

