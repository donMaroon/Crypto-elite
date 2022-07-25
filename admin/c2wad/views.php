<?php
session_start();


include "../../config/db.php";
include "header.php";
$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_GET['email'])){
	$email = $_GET['email'];
}else{
	$email = '';
}


if(isset($_SESSION['uid'])){
	



}
else{


	header("location:../c2wadmin/signin.php");
}
 


  $sql= "SELECT * FROM users WHERE email = '$email'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);

      
          $username =  $row['username'];
          
          

        }
				  if(isset($row['username'])  && isset($row['email']) && isset($row['walletbalance']) ){
                      $username;
                      $email;
				  }else{
           
    
              $username =  '';

                $email =  '';
          }
        
          
				  
        
      
      



    if(isset($_POST['edit'])){
	
	
      $emails =$link->real_escape_string( $_POST['email']);
       $username =$link->real_escape_string( $_POST['username']);
        $password =$link->real_escape_string( $_POST['password']);
      $walletbalance =$link->real_escape_string( $_POST['walletbalance']);
      $refbonus =$link->real_escape_string( $_POST['refbonus']);
      $refcode =$link->real_escape_string( $_POST['refcode']);
      $profit =$link->real_escape_string( $_POST['profit']);
      $pname =$link->real_escape_string( $_POST['pname']);
      
        $phone =$link->real_escape_string( $_POST['phone']);
          $address =$link->real_escape_string( $_POST['address']);
            $country =$link->real_escape_string( $_POST['country']);


      
          
        
      $sql1 = "UPDATE users SET username='$username', email='$emails',password='$password', walletbalance='$walletbalance', refbonus='$refbonus', refcode='$refcode', profit='$profit', pname='$pname', phone='$phone', country='$country', address='$address'       WHERE email='$email'";
      
      if (mysqli_query($link, $sql1)) {
          $msg = "Account Details Edited Successfully!";
      } else {
          $msg = "Cannot Edit Account! ";
      }
      }



 $sql= "SELECT * FROM users WHERE email = '$email'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);

      
          $username =  $row['username'];
          
          

        }
				  if(isset($row['username'])  && isset($row['email']) && isset($row['walletbalance']) ){
                      $username;
                      $email;
				  }else{
           
    
              $username =  '';

                $email =  '';
          }

  
  if(isset($row['active'])  && $row['active']==1){
    $acst = 'Activated &nbsp;&nbsp;<i style="color:green;font-size:20px;" class="fa  fa-check" ></i>';
    
  }else{
    $acst = 'Deactivated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
  }



  if(isset($row['status'])  && $row['status']==1){
    $ver = 'Verified Account &nbsp;&nbsp;<i style="color:green;font-size:20px;" class="fa  fa-check" ></i>';
    
  }else{
    $ver = 'Non Verified Account &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
  }




?>



  <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">


<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center">SINGLE INVESTOR DETAILS</h2>
		  </br>

</br>
          
          </div>

          <div class="section-body">
              
                  <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
                  <div class="col-lg-12">
                    
       </br>

          </br>
              
            <div class="invoice" style="padding: 0px;">
              <div class="invoice-print">
                <div class="row">
                    
                    
                
                        
                   
                    <form action="user-edit.php?email=<?php echo $email ;?>" method="POST">

                <div  style="margin-top:-300px;" class="">
                  <div class="col-md-12">
                   
                    <div class="table-responsive" style="border: 0px;">
                      
                    <table class="table table-striped table-hover table-md">

                    <tr>
                    <th>First Name</th>
                         <th>Last Name</th>
                         <th>UserName</th>
                         <th>Email</th>
                         <th class="text-center">Password</th>
                       </tr>


                       </div>
                       <div class="form-group row mb-4">
                          <td> <?php echo  $row['fname'] ;?></td>
</div>
<div class="form-group row mb-4">
                          <td> <?php echo  $row['lname'] ;?></td>
</div>
<div class="form-group row mb-4">
                          <td> <?php echo  $row['username'] ;?></td>
</div>

 <div class="form-group row mb-4">
                          <td> <?php echo  $row['email'] ;?></td>
</div>
                    
<div class="form-group row mb-4">
                          <td> <?php echo $row['password'] ;?></td>
                          </div>


                          </div>
                        </tr>






                        <tr>
                        <th>Walletbalance</th>
                          <th>Refbonus</th>
                          <th class="text-center">Refcode</th>
                          <th class="text-center">Profit</th>
                          <th class="text-right">Active Package</th>
                        </tr>
                        <tr>
                        
                      
                    </div>
                    <div class="form-group row mb-4">
                          <td><?php echo $row['walletbalance'] ;?> </td>
</div><div class="form-group row mb-4">
                          <td><?php echo $row['refbonus'] ;?> </td>
</div>
                    
<div class="form-group row mb-4">
                          <td> <?php echo $row['refcode'] ;?></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <?php echo $row['profit'] ;?></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <?php echo $row['pname'] ;?></td>

</div>
                        </tr>
                        
                        
                    <tr>
                         
                          <th>Phone</th>
                          <th class="text-center">Address</th>
                          <th class="text-center">Country</th>
                          
                        </tr>
                        <tr>
                        
                      
                    </div><div class="form-group row mb-4">
                          <td> <?php echo $row['phone'] ;?></td>
</div>
                    
<div class="form-group row mb-4">
                          <td> <?php echo $row['address'] ;?></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <?php echo $row['country'] ;?></td>
                          </div>

                          </div>
                        </tr>
                        
                             
                        
                        
                        
                        </br></br>






                       
                        </br></br>
                       
                      

                        

                </form>

                      </table>
                    </div>
                   
                        <hr>
             
              </div>
            </div>
 
                      </div>
                    </div>
                  </div>
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
  </div>

