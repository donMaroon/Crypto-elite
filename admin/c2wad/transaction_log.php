<?php
session_start();


include "../../config/db.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

$username=$_GET['username'];
$email=$_GET['email'];





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


		  <h2 align="center" style="color:teal;"><b>TRANSACTION LOGS</b></h2>
		  </br>




<h2 align="center"> My Deposit History </h2>

<div class="col-md-12 col-sx-13 col-sm-13 col-lg-12" >
<div class="box box-default">
            <div class="box-header with-border">
        
<table id="table" class="table table-striped table-hover table-responsive" cellspacing="0" width="100%" >



					<thead>

						<tr class="info">
						<th>Email</th>
							<th>Amount(USD)</th>
              <th>Amount(BTC)</th>
              <th>Amount(ETH)</th>
							<th>Status</th>
							<th>Tnx ID</th>
							<th>Date</th>
                                


						</tr>
					</thead>



					<tbody>
					<?php $sql= "SELECT * FROM btc WHERE email='$email' ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){    ?>

						<tr class="primary">

							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['usd'];?></td>
							<td><?php echo $row['btc'];?></td>
							<td><?php echo $row['eth'];?></td>
								<td><?php echo $row['status'];?></td>
							<td><?php echo $row['tnxid'];?></td>
							<td><?php echo $row['date'];?></td>


						</tr>
					  <?php
 }
			  }
			  ?>
					</tbody>



				</table>

</div>

</br></br></br>

<h2 align="center">My  Withdrawal History </h2>
</br>
<div class="col-md-12 col-sm-12 col-sx-12">

<table id="tables" class="table table-responsive table-striped table-bordered table-hover" >



					<thead>

						<tr class="info">
						<th>Email</th>
							<th>Amount(USD)</th>
              <th>Amount(BTC)</th>
              <th>Amount(ETH)</th>
							<th>Status</th>
							<th>Tnx ID</th>
							<th>Date</th>
                                

						</tr>
					</thead>



					<tbody>
					<?php $sql= "SELECT * FROM btc WHERE email='$email' ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){    ?>

						<tr class="primary">

						<td><?php echo $row['email'];?></td>
							<td><?php echo $row['usd'];?></td>
							<td><?php echo $row['btc'];?></td>
							<td><?php echo $row['eth'];?></td>
								<td><?php echo $row['status'];?></td>
							<td><?php echo $row['tnxid'];?></td>
							<td><?php echo $row['date'];?></td>



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

				$('#tables')
                .dataTable({
                    "responsive": true,
                    
                });
    });



				</script>
