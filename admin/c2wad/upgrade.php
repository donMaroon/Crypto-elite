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

if(isset($_GET['mid']) && $_GET['mid'] !=''){
  $mid = $link->real_escape_string($_GET['mid']);
  $delete_status =  "delete from package1 where id = '$mid'";
  if(mysqli_query($link,$delete_status)){
    echo "<script>
    alert('Package Deleted Successfully!');
    window.location.href='upgrade.php';
    </script>
    ";
  }
}

include "header.php";


    ?>



<style>





</style>


 <div class="content-wrapper">
   <section class="content">


          <div class="box box-default">
            <div class="box-header with-border">

          <h4 align="center"><i class="fa fa-refresh"></i> CRYPTO INVESTMENT SCRIPT PLAN</h4>
          </br>
 
          <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
          <?php $sql= "SELECT * FROM package1";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
            $row['pname'];
				  ?>
          <div class="col-md-3 col-sm-12 col-sx-12" style="margin-bottom: 2px;">
          <div class="" style="background-color:#4691e7;color:#fff;padding:20%;border-radius:5%;">
  <div class="">
    <header>
      <h4 class="">

     

<form action="" method="POST">
       <?php echo $row['pname'];?>
       <?php
    $currentDateTime = date('Y-m-d H:i:s');
    
?> <input type="hidden" name="email" value="<?php  echo $_SESSION['email'];?>">
       <input type="hidden" name="pdate" value="0">
       <input type="hidden" name="pname" value=" <?php echo $row['pname'];?>">
       <input type="hidden" name="froms" value=" <?php echo $row['froms'];?>">
       <input type="hidden" name="bonus" value=" <?php echo $row['bonus'];?>">
       <input type="hidden" name="increase" value=" <?php echo $row['increase'];?>">
       <input type="hidden" name="duration" value=" <?php echo $row['duration'];?>">
      </h4>
      <div class="plan-cost"><span class="plan-price">
            <i class="fa fa-check"> </i> $<?php echo $row['froms'];?>- $<?php echo $row['tos'];?> </span> <span class="plan-type"><?php echo $row['duration'];?> Days</span></div>
    </header>
   
   <i class="fa fa-check"> </i> Plus $<?php echo $row['bonus'];?> Activation bonus</br>
      <i class="fa fa-check"> </i> Fast Activation</br>
      <i class="fa fa-check"> </i> <?php echo $row['increase'];?>% Profit Daily</br>
      
   </br>
    <div class="plan-select"><a href="addpackages.php?id=<?php echo $row['id'];?>"  class="btn btn-success" style="margin-bottom: 2px;">Update</a>
    <a href="upgrade.php?mid=<?php echo $row['id'];?>"  class="btn btn-danger" onclick="return confirm('Do you really want to delete this package');">Delete</a></div>
  </div>

</form>
  
			  </div>
			  </div>
  <?php
 }
			  }
			  ?>
 
  
   
          </div>
       
        </div>
</div>
       
        </div>
</div>
       
        </div>
</div>
       
        </div>

<script>
       
$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>