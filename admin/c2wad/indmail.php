
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

if(isset($_POST['package1'])){



$email =$link->real_escape_string( $_POST['email']);
$pname =$link->real_escape_string( $_POST['pname']);
$increase =$link->real_escape_string( $_POST['increase']);
$bonus =$link->real_escape_string($_POST['bonus']);
$duration =$link->real_escape_string($_POST['duration']);
$froms =$link->real_escape_string($_POST['froms']);
$tos =$link->real_escape_string($_POST['tos']);



    $sql = "INSERT INTO package1 (email,pname,increase,bonus,duration,froms,tos) VALUES ('$email','$pname','$increase','$bonus','$duration','$froms','$tos')";


$sql1= "SELECT * FROM package1 WHERE email = '$email'";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){
   $row = mysqli_fetch_assoc($result1);
   $row['email'];
 
  }
 
if(isset($row['email']) &&  $row['email']== $email){
	$msg= " Package1 already added";

}else{


                  if (mysqli_query($link, $sql)) {

  
               $msg= " Package1 has been successfully added";

                           } else {
                        $msg= " Package1 was not added ";
                         }
                        }   
}

if(isset($_POST['package2'])){



$email =$link->real_escape_string( $_POST['email']);
$pname =$link->real_escape_string( $_POST['pname']);
$increase =$link->real_escape_string( $_POST['increase']);
$bonus =$link->real_escape_string($_POST['bonus']);
$duration =$link->real_escape_string($_POST['duration']);
$froms =$link->real_escape_string($_POST['froms']);
$tos =$link->real_escape_string($_POST['tos']);



    $sql = "INSERT INTO package2 (email,pname,increase,bonus,duration,froms,tos) VALUES ('$email','$pname','$increase','$bonus','$duration','$froms','$tos')";

                  if (mysqli_query($link, $sql)) {

  
               $msg= " Package2 has been successfully added";

                           } else {
                        $msg= " Package2 was not added ";
                         }
                        }   



if(isset($_POST['package3'])){



$email =$link->real_escape_string( $_POST['email']);
$pname =$link->real_escape_string( $_POST['pname']);
$increase =$link->real_escape_string( $_POST['increase']);
$bonus =$link->real_escape_string($_POST['bonus']);
$duration =$link->real_escape_string($_POST['duration']);
$froms =$link->real_escape_string($_POST['froms']);
$tos =$link->real_escape_string($_POST['tos']);



    $sql = "INSERT INTO package3 (email,pname,increase,bonus,duration,froms,tos) VALUES ('$email','$pname','$increase','$bonus','$duration','$froms','$tos')";

                  if (mysqli_query($link, $sql)) {

  
               $msg= " Package3 has been successfully added";

                           } else {
                        $msg= " Package3 was not added ";
                         }
                        }   



if(isset($_POST['package4'])){



$email =$link->real_escape_string( $_POST['email']);
$pname =$link->real_escape_string( $_POST['pname']);
$increase =$link->real_escape_string( $_POST['increase']);
$bonus =$link->real_escape_string($_POST['bonus']);
$duration =$link->real_escape_string($_POST['duration']);
$froms =$link->real_escape_string($_POST['froms']);
$tos =$link->real_escape_string($_POST['tos']);



    $sql = "INSERT INTO package4 (email,pname,increase,bonus,duration,froms,tos) VALUES ('$email','$pname','$increase','$bonus','$duration','$froms','$tos')";

                  if (mysqli_query($link, $sql)) {

  
               $msg= " Package4 has been successfully added";

                           } else {
                        $msg= " Package4 was not added ";
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

          <h4 align="center"><i class="fa fa-envelope"></i> SEND SINGLE MAIL</h4>
</br>


        
         

 
          <hr></hr>
          
        
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="addpackages.php" method="POST" >

           <legend>Single Mail </legend>
		   
		   
		   <input type="hidden" name="email"  value="<?php echo $_SESSION['email'];?>" class="form-control">

 <div class="form-group">
        <input type="text" name="remail" placeholder="Recipient Email"  class="form-control">
        </div>
     <div class="form-group">
        <input type="text" name="subject" placeholder="subject"  class="form-control">
        </div>
		
       <div class="form-group">
        <textarea name="message"  placeholder="write message here" class="form-control"></textarea>
      </div>

      
      
	  
	  <button style="" type="submit" class="btn btn-success" name="mail" > <i class="fa fa-send"></i>&nbsp; Send Mail </button>


    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>

