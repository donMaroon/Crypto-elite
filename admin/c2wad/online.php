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

// delete investor
if(isset($_POST['delete'])){
	
	$email = $_POST['email'];
	
$sql = "DELETE FROM users WHERE email='$email'";

if (mysqli_query($link, $sql)) {
    $msg = "Investor deleted successfully!";
} else {
    $msg = "Investor not deleted! ";
}
}
// verify investor

if(isset($_POST['verify'])){
	
	$email = $_POST['email'];
	
$sql = "UPDATE users SET verify = '1'  WHERE email='$email'";

if (mysqli_query($link, $sql)) {
    $msg = "Investor verified successfully!";
} else {
    $msg = "Investor not was not verified! ";
}
}



if(isset($_POST['vemail'])){
	
	$email = $_POST['email'];
	
$sql = "UPDATE users SET confirm = '1'  WHERE email='$email'";

if (mysqli_query($link, $sql)) {
    $msg = "Investor verified successfully!";
} else {
    $msg = "Investor not was not verified! ";
}
}



// unverify investors

if(isset($_POST['unverify'])){
	
	$email = $_POST['email'];
	
$sql = "UPDATE users SET verify = '0'  WHERE email='$email'";

if (mysqli_query($link, $sql)) {
    $msg = "Investor Un-verified successfully!";
} else {
    $msg = "Investor not was not Un-verified! ";
}
}


include 'header.php';





?>


    <link rel="stylesheet" href="http://cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

     
 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">



   <style>
 
	
   </style>


<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center">ONLINE INVESTORS</h2>
		  </br>
 <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
		    </br>


<div class="col-md-12 col-sm-12 col-sx-12">
<div class="col-md-12 col-sm-12 col-sx-12">
<div class="box-body table-responsive padding">

<table class="table table-striped table-hover table-responsive" >



					<thead>

						<tr class="info">
						<th>Username</th>
							<th>Email</th>
								<th>Email Status</th>
							<th style="display:none;"></th>
							
						
                                

						</tr>
					</thead>


					<tbody>
					<?php $sql= "SELECT * FROM users WHERE session = 1";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
				  if(isset($row['verify'])  && $row['verify']==1){
					  $msg = 'Verified &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';
					  
				  }else{
					  $msg = 'Not verified &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
				  }
				  
				   if(isset($row['confirm'])  && $row['confirm']==1){
					  $msg1 = 'Email Verified &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';
					  
				  }else{
					  $msg1 = 'Email Not verified &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
				  }
				  ?>
				
						<tr class="primary">
						<form action="verify.php" method="post">
<td><?php echo $row['username'];?></td>
							<td id="email"><?php echo $row['email'];?></td>
								<td ><?php echo $msg1;?></td>
							<td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
				
</form>
						</tr>
						
					  <?php
 }
			  }
			  ?>
					</tbody>



				</table>
				
</div>
          </div>

		  </div>
          <!-- /top tiles -->

          </div>

        


    </body>
              </div>
            </div>


              </div>


          <br />







    </body>
              </div>
            </div>

<script>
$(document).ready(function () {
       $(document).on('click', '#delete',fucntion(){
		   
		   var email = $("#email").val();
		   
		   $.ajax({
			   url: "delete.php",
			   method: "post",
			   data:{email:email},
			   success:function(data){
				   alert("successful");
				   location.reload();
			   }
			   
		   });
	   }
				
    });



				</script>



          </section>

   </div>
  </div>
</div>


  </body>
</html>
<script>
$(document).ready(function () {
        $('#table')
                .dataTable({
                    "responsive": true,
                    
                });

				
    });



				</script>
