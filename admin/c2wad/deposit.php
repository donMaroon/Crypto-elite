<?php
session_start();

include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET['referred'])){
	$referreds = $_GET['referred'];
}else{
	$referreds = '';
}


if(isset($_SESSION['uid'])){
	



}
else{


	header("location:../c2wadmin/signin.php");
}
if(isset($_POST['approve'])){
	
	$tnx = $_POST['tnx'];
	$usd = $_POST['usd'];
	$email = $_POST['email'];
	

		$sql1 = "UPDATE users SET walletbalance = walletbalance + $usd  WHERE email='$email'";
		
		$sql2= "SELECT * FROM btc WHERE tnxid = '$tnx'";
  $result2 = mysqli_query($link,$sql2);
  if(mysqli_num_rows($result2) > 0){
   $row = mysqli_fetch_assoc($result2);
   $row['status'];
 
  }

  $sqlus= "SELECT * FROM users WHERE email = '$email'";
  $resultus = mysqli_query($link,$sqlus);
  if(mysqli_num_rows($resultus) > 0){
   $rowus = mysqli_fetch_assoc($resultus);
   $usernamewtc = $rowus['username'];
 
  }
 
if(isset($row['status']) &&  $row['status']== "approved"){
	
	$msg = "Transaction already approved!";

}else{
		
		if(mysqli_query($link, $sql1)){
		    
		    
		    
		    
		    
require_once "../../PHPMailer/PHPMailer.php";
require_once '../../PHPMailer/Exception.php';


$mail= new PHPMailer();
$mail->setFrom($emaila);
 $mail->FromName = $name;
$mail->addAddress($email);
$mail->Subject = "Deposit Approval!";
$mail->isHTML(true);
$mail->Body = '
<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/admin/c2wad/logo/'.$logo.'"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$usernamewtc.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for investing on '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 

Congraulation! Your deposit of '.$usd.' USD worth has been approved.  


</p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>' ;



if($mail->send()) {
     
	
		$msg = "transaction approved successfully and investor is credited!";
		
		
				    
	
if($msg = "transaction approved successfully and investor is credited!"){
		
		$sql1 = "UPDATE btc SET status = 'approved'  WHERE tnxid = '$tnx'";
		mysqli_query($link, $sql1);
		
}
  
} else {
    $msg = "transaction was not approved! ";
}
		}
}
}

if(isset($_POST['referrer'])){
	
	    $referred = $_POST['referred'];
		$email = $_POST['email'];
		$tnx = $_POST['tnx'];
		$usd = $_POST['usd'];
		

  
  $refb = (double)$usd * 0.05;
 echo $refb;

		$sql6 = "UPDATE users SET refbonus = refbonus + $refb,walletbalance = walletbalance + $refb  WHERE refcode ='$referred'";
		
		
		if(mysqli_query($link, $sql6)){
	
		$msg = "Referrer paid successfully!";
		}else{
			$msg = "Cannot pay the referer!";
		}
 }


if(isset($_POST['delete'])){
	
	$tnx = $_POST['tnx'];
	
$sql = "DELETE FROM btc WHERE tnxid='$tnx'";

if (mysqli_query($link, $sql)) {
    $msg = "Order deleted successfully!";
} else {
    $msg = "Order not deleted! ";
}
}



include 'header.php';





?>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  

  <link rel="stylesheet" href=" https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css">



  

  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="">
 
  
    
    



  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
 

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.min.js"></script>
   
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
  

     
 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">



   <style>
 
	
   </style>


<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center">INVESTORS DEPOSIT MANAGEMENT</h2>
		  </br>

</br>
 <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
		    </br>

<div class="col-md-12 col-sm-12 col-sx-12">
               <div class="table-responsive">
                     <table class="display"  id="example">

					<thead>

						<tr class="info">
						<th>Email</th>
						<th style="display:none;"></th>
						<th style="display:none;"></th>
						<th style="display:none;"></th>
							<th>Amount(USD/BTC/ETH)</th>
                               <th>Status</th>
							 
							 <th>Transaction ID</th>
							 <th style="display:none;"></th>
							  <th>Referrer Pay </th>
							<th>Date</th>
                                <th>Action</th>
                                 <th>Action</th>
                                  <th>Action</th>
								
                                

						</tr>
					</thead>


					<tbody>
					<?php $sql= "SELECT * FROM btc ORDER BY id DESC";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){   



$row['status'];
$row['referred'];
   
   
if(isset($row['status']) &&  $row['status']== 'approved'){
	
	
	$sec = 'Approved &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';

}else{
$sec ='Pending &nbsp;&nbsp;<i class="fa  fa-refresh" style=" font-size:20px;color:red"></i>';

}


				  ?>

						<tr class="primary">
						<form action="deposit.php?referred=<?php echo $row['referred'];?>" method="post">
                            <td><?php echo $row['email'];?></td>
							
							<td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
							<td style="display:none;"><input type="hidden" name="usd" value="<?php echo $row['usd'];?>"> </td>
							
							<td style="display:none;"><input type="hidden" name="tnx" value="<?php echo $row['tnxid'];?>"> </td>
							<td><?php echo $row['usd'];?> USD / <?php echo $row['btc'];?> BTC / <?php echo $row['eth'];?> ETH</td>
							<td><?php echo $sec ;?></td>
							
							<td><?php echo $row['tnxid'];?></td>
              
           <td style="display:none;"><input type="hidden" name="referred" value="<?php echo $row['referred'];?>"> </td>
		    <td><?php echo $row['referred'];?></td>
			   <td><?php echo $row['date'];?></td>
			  
                            <td><button class="btn btn-success" type="submit" name="approve"><span class="glyphicon glyphicon-check"> Approve</span></button></td>
                            
							<td><button class="btn btn-info" type="submit" name="referrer"><span class="glyphicon glyphicon-check"> Pay Referrer</span></button></td>
							
							<td><button class="btn btn-danger" type="submit" name="delete"><span class="glyphicon glyphicon-check"> Delete</span></button></td>
							
   
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





          </section>

   </div>
  </div>
</div>


  </body>
</html>
    
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
       
    } );
    

    table.buttons().container()
        .insertBefore( '#example_filter' );

        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-12:eq(0)' );
} );
</script>






<script>
$(document).ready(function () {
        $('#table')
                .dataTable({
                    "responsive": true,
                    
                });

				
    });



				</script>


