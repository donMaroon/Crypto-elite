<?php
session_start();


include "../../config/db.php";
include "header.php";
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


   
    if(isset($_POST['delete'])){
	
	
      $email =$link->real_escape_string( $_POST['email']);
          
        
      $sql1 = "DELETE FROM users  WHERE email ='$email'";
      
      if (mysqli_query($link, $sql1)) {
          $msg = "Record Deleted successfully  !";
            
          
      } else {
          $msg = "Cannot delete Account! ";
      }
      }

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
  
  
  <script type="text/javascript" charset="utf8" src=""></script>
  <script type="text/javascript" charset="utf8" src=""></script>

 
  



    
    
 
    
    
    
    
    
    

   
   



<style>
.table-responsive {
overflow-x: hidden;
}
@media (max-width: 8000px) {
.table-responsive {
overflow-x: auto;
}
}
</style>
  </head>
  <body>

  <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">


<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center">INVESTORS MANAGEMENT</h2>
		  </br>
<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
           
</br>
          <div class="col-md-12 col-sm-12 col-sx-12">
               <div class="table-responsive">
                     <table class="display"  id="example">
                                    <thead>
                                        <tr>
                                        <th>FIRST NAME</th>
                                        <th>LAST NAME</th>
                                            <th>USERNAME</th>
                                            <th>EMAIL</th>
                                            <th>REFCODE</th>
                                            
                                            <th>REG-DATE </th>
                                            <th style="display:none">EMAIL</th>
                                            <th>ACTION</th>
                                             <th>ACTION</th>
                                                <th>ACTION</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php 
                                    $sql= "SELECT * FROM users ORDER BY id DESC";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
				 
				  if(isset($row['active'])  && $row['active']==1){
					  $acst = 'Activated &nbsp;&nbsp;<i style="color:green;font-size:20px;" class="fa  fa-check" ></i>';
					  
				  }else{
					  $acst = 'Deactivated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
				  }
        
				  ?>
				

                            
                                        <tr class="odd gradeX">
                                                   
                                                     <form  action="edit.php" method="POST">
                                            
                                                     <td><?php echo $row['fname'];?></td>
                                                     <td><?php echo $row['lname'];?></td>                                 
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['refcode'];?></td>
                                             <td><?php echo $row['date'];?></td>
                                           <td style="display:none"><input type="hidden" name="email" value="<?php echo $row['email'];?>"</td>

                                            <td> <a href="user-edit.php?email=<?php echo $row['email']?>"> 
                                            <button type="button" name="edit" style="width:100%" class="btn btn-primary"><span class="fa fa-check">-Edit </span></button></a></td>
                                            
                                           <td><button type="submit" name="delete" style="width:100%" class="btn btn-danger"><span class="fas fa-trash">-Delete </span></button></td>
                                           
                                            <td> <a href="views.php?email=<?php echo $row['email']?>"> 
                                            <button type="button" name="view" style="width:100%" class="btn btn-primary"><span class="fa fa-eye">-View </span></button></a></td>
                                           
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
      </div>
      </div> 
      </div>
      </div>
      </div>
      </div>
      </section>
      </div>
      </div>       
     
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

  </body>
</html>