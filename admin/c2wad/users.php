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
if(isset($_POST['delete'])){
	
	$email = $_POST['email'];
	
$sql = "DELETE FROM users WHERE email='$email'";

if (mysqli_query($link, $sql)) {
    $msg = "Investor deleted successfully!";
} else {
    $msg = "Investor not deleted! ";
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


		 <h2 class="text-center">INVESTORS MANAGEMENT</h2>
		  </br>
 <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
		    </br>




<div class="col-md-12 col-sm-12 col-sx-12">
               <div class="table-responsive">
                     <table class="display"  id="example">


					<thead>

						<tr class="info">
						<th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
							<th>Email</th>
							<th style="display:none;"></th>
							
							<th>Refcode</th>
              <th>Package</th>
              <th>Total Plan Profit</th>
              <th>Status</th>
							<th>Account Balance</th>
							<th>Date</th>
                                  <!--<th>Delete</th>-->
                                

						</tr>
					</thead>































					<tbody>
					<?php $sql= "SELECT * FROM users ORDER BY id DESC";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
				  if(isset($row['session'])  && $row['session']==1){
					  $msg = "online";
					  
				  }else{
					  $msg = "offline";
				  }
				  if(isset($row['verify'])  && $row['verify']==1){
					  $ver = "verified";
					  
				  }else{
					  $ver = "not verified";
				  }
				  
				  
$row['activate'];
$row['pdate'];
   
    $pdate = $row['pdate'];
 $duration = $row['duration'];
 $increase = $row['increase'];
 $usd = $row['usd'];


 $percentage=0;
        if(isset($row['activate']) &&  $row['activate'] == '1'  ){
         
          $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y-m-d');
 $current=date("Y/m/d");

 $diff = abs(strtotime($Date2) - strtotime($current));

 $days=floor($diff / (60*60*24));
$daily = $duration - $days;
$percentage = ($increase/100) * $daily * $usd;


 }else {
	 $duration='not started';
   $daily ="";
   $percentage = "";
   $Date = "0";
   $days ="No active days";
   $diff = "";
   $Date2 = 'No active date';
 }
if(isset($_SESSION['pprofit'])){

  $profit = $_SESSION['pprofit'];
}else{
 
  $profit = "";
}
 

if(isset($row['activate']) &&  $row['activate']== '1'){
	
	
	$sec = 'Active &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-refresh" ></i>';
$usd = $row['usd'];
}else{
$sec ='Not Active &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
$usd = 'No investment';
}



   
if(isset($row['pdate']) &&  $row['pdate']== '0'){
	
	
	$date = 'Not Yet Started &nbsp;&nbsp;<i style="background-color:red;color:#fff; font-size:20px;" class="fa  fa-times" ></i>';
 
}else{
$date = $row['pdate'];

}


				  
				  
				  
				  ?>
				
						<tr class="primary">
						<form action="users.php" method="post">

            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['username'];?></td>
							<td id="email"><?php echo $row['email'];?></td>
							<td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
							
							<td><?php echo $row['refcode'];?></td>
							<td><?php echo $row['pname'];?></td>
							 <td><?php echo $percentage;?> USD</td>
							<td><?php echo $msg;?></td>
							<td><?php echo ($row['walletbalance'] + $percentage);?></td>
              
              <td><?php echo $row['date'];?></td>
			  
                           
							
    <!--<td><button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</span></button></td>-->
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
