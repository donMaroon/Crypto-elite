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
	
	$msgid = $_POST['msgid'];
	
$sql = "DELETE FROM message WHERE msgid='$msgid'";

if (mysqli_query($link, $sql)) {
    $msg = "Message deleted successfully!";
} else {
    $msg = "Message not deleted! ";
}
}
// verify investor

if(isset($_POST['read'])){
	
	$msgid = $_POST['msgid'];
	
$sql = "UPDATE messageadmin SET status = '1'  WHERE msgid='$msgid'";

if (mysqli_query($link, $sql)) {
    $msg = "Message marked as read!";
} else {
    $msg = "Message not marked  ";
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


		 <h2 class="text-center">VIEW MESSAGES</h2>
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
							<th>Message</th>
							<th style="display:none;"></th>
							
							<th>Title</th>
              <th>Image</th>
              <th>Status</th>
								<th>Date</th>
                                <th>Action</th>
								<th>Action</th>
                                
                                

						</tr>
					</thead>


					<tbody>
					<?php $sql= "SELECT * FROM messageadmin ORDER BY id DESC";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
				  if(isset($row['status'])  && $row['status']==1){
					  $msg = 'Message Read &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';
					  
				  }else{
					  $msg = 'New Message! &nbsp;&nbsp;<i class="fa  fa-envelope" style=" font-size:20px;color:red"></i>';
				  }
				  ?>
				
						<tr class="primary">
						<form action="viewmail.php" method="post">
<td><?php echo $row['email'];?></td>
							<td id="email"><?php echo $row['message'];?></td>
							<td style="display:none;"><input type="hidden" name="msgid" value="<?php echo $row['msgid'];?>"> </td>
							<td><?php echo $row['title'];?></td>
							<td><img src="../../users/pages/verify/<?php echo $row['image'];?>" width="100px" height="100px"></td>
							
							<td><?php echo $msg;?></td>
						              
              <td><?php echo $row['date'];?></td>
			  
                            <td><button class="btn btn-success" type="read" name="read"><span class="glyphicon glyphicon-check"> Mark as read</span></button></td>
							
							
    <td><button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</span></button></td>
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

