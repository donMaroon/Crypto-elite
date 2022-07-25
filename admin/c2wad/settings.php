<?php
session_start();


include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_SESSION['uid'])){
	



}
else{


	header("location:../c2wadmin/signin.php");
}


if(isset($_POST['set'])){

  $ids = $_POST['id'];
 $sname = $_POST['sname'];
  $wl = $_POST['wl'];
    $rb = $_POST['rb'];
   $currency = $_POST['currency'];
   $branch = $_POST['branch'];
   $bname = $_POST['bname'];
   $baddress = $_POST['baddress'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $title = $_POST['title'];
   $logo = $_FILES['logo']['name'];
   $target = "logo/".basename($logo);
   $scy = $_POST['cy'];
   
   $sql = "SELECT email FROM settings WHERE id = '$ids'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    $msg = 'Settings already added.';

}else{

  if($logo!=""){
   $sql = "INSERT INTO settings (sname, wl, rb, currency, branch, bname, baddress, email, phone, title, logo, cy) VALUES ('$sname','$wl','$rb','$currency','$branch','$bname','$baddress','$email','$phone','$title','$logo','$scy')";
   }else{
   $sql = "INSERT INTO settings (sname, wl, rb, currency, branch, bname, baddress, email, phone, title, cy) VALUES ('$sname','$wl','$rb','$currency','$branch','$bname','$baddress','$email','$phone','$title','$scy')";
   }
   if(mysqli_query($link, $sql)){

  if($logo!=""){
    move_uploaded_file($_FILES['logo']['tmp_name'], $target);
			}
			
			$msg = "Settings Added!";
		}else{
			
			$msg = "Settings Not Added!";
		}
}

}




if(isset($_POST['uset'])){

  $ids = $_POST['id'];
  $sname = $_POST['sname'];
    $wl = $_POST['wl'];
    $rb = $_POST['rb'];
    $currency = $_POST['currency'];
    $branch = $_POST['branch'];
    $bname = $_POST['bname'];
    $baddress = $_POST['baddress'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $logo = $_FILES['logo']['name'];
    $target = "logo/".basename($logo);
    $scy = $_POST['cy'];
     
 if($logo!=""){
    $sql = "UPDATE settings SET  sname='$sname', wl='$wl', rb='$rb', currency='$currency', branch='$branch', bname='$bname', baddress='$baddress', email='$email', phone='$phone', title='$title', logo='$logo', cy='$scy' WHERE id = '$ids' ";
    }else{
    $sql = "UPDATE settings SET  sname='$sname', wl='$wl', rb='$rb', currency='$currency', branch='$branch', bname='$bname', baddress='$baddress', email='$email', phone='$phone', title='$title', cy='$scy' WHERE id = '$ids' ";
    }
    
    if(mysqli_query($link, $sql)){
 if($logo!=""){
     move_uploaded_file($_FILES['logo']['tmp_name'], $target);
       }
       $msg = "Settings Updated!";
     }else{
       
       $msg = "Settings Not Updated!";
     }
 }
 
 

include "header.php";






    ?>

    
 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">




<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center">CONFIGURATION</h2>
		  </br>

        
         

 
          <hr></hr>
          
        
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="settings.php?id=<?php echo $ids ;?>" method="POST" enctype="multipart/form-data" >

           <legend> <?php echo $name;?> Settings </legend>
		   
		  <div class="form-group">
        <input type="hidden" name="id"  value="<?php echo $ids;?>" class="form-control">
        </div>
 <div class="form-group">
        <input type="text" name="sname" placeholder="site url"  value="<?php echo $bankurl;?>" class="form-control">
        </div>

    

    
        
    

       

        <div class="form-group">
        <input type="text" name="bname" placeholder="Name" value="<?php echo $name;?>"  class="form-control">
        </div>
        
        
        
        
        <div class="form-group">
        <input type="text" name="wl" placeholder="Withdrawal limit" value="<?php echo $wl;?>"  class="form-control">
        </div>
        
        
        <div class="form-group">
        <input type="text" name="rb" placeholder="Registration bonus" value="<?php echo $rb;?>"  class="form-control">
        </div>
    

        <div class="form-group">
        <input type="text" name="email" placeholder="email" value="<?php echo $emaila;?>"  class="form-control">
        </div>
        
     <div class="form-group">
        <input type="text" name="phone" placeholder="phone" value="<?php echo $phone;?>"  class="form-control">
        </div>

      
        
     <div class="form-group">
        <input type="text" name="title" placeholder="title" value="<?php echo $title;?>"  class="form-control">
        </div>

       
     <div class="form-group">
        <input type="text" name="cy" placeholder="Copyright Year" value="<?php echo $cy;?>"  class="form-control">
        </div>

        <div class="form-group">
        <input type="file" name="logo" placeholder="logo" value="<?php echo $logo;?>"  class="form-control">
        </div>
        
     

      
      
	  
	  <button style="" type="submit" class="btn btn-primary" name="set" > <i class="fa fa-send"></i>&nbsp; Add Settings </button>

    <button style="" type="submit" class="btn btn-success" name="uset" > <i class="fa fa-send"></i>&nbsp; Update Settings </button>

    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>

