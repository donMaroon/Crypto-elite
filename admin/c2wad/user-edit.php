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
        $fname =$link->real_escape_string( $_POST['fname']);
        $lname =$link->real_escape_string( $_POST['lname']);
      $walletbalance =$link->real_escape_string( $_POST['walletbalance']);
      $refbonus =$link->real_escape_string( $_POST['refbonus']);
      $refcode =$link->real_escape_string( $_POST['refcode']);
      $profit =$link->real_escape_string( $_POST['profit']);
      $pname =$link->real_escape_string( $_POST['pname']);
      
        $phone =$link->real_escape_string( $_POST['phone']);
          $address =$link->real_escape_string( $_POST['address']);
            $country =$link->real_escape_string( $_POST['country']);


      
          
        
      $sql1 = "UPDATE users SET fname='$fname',lname='$lname',username='$username', email='$emails',password='$password', walletbalance='$walletbalance', refbonus='$refbonus', refcode='$refcode', profit='$profit', pname='$pname', phone='$phone', country='$country', address='$address'       WHERE email='$email'";
      
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


		 <h2 class="text-center">INVESTORS MANAGEMENT</h2>
		  </br>

</br>
          
          </div>

          <div class="section-body">
              
                  <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
                  <div class="col-lg-12">
                    
       </br>

          </br>
              
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                    
                    
                
                        
                   
                    <form action="user-edit.php?email=<?php echo $email ;?>" method="POST">

                <div  style="margin-top:-300px;" class="">
                  <div class="col-md-12">
                   
                    <div class="table-responsive">
                      
                    <table class="table table-striped table-hover table-md">

                    <tr>
                         
                    <th>First Name</th>
            <th>Last Name</th>
                         <th class="text-center">UserName</th>
                         <th class="text-right">Email</th>
                         
                       </tr>


                       </div>
                       <div class="form-group row mb-4">
                          <td> <input type="text" name="fname" class="form-control" value="<?php echo  $row['fname'] ;?>"> </td>
</div>
<div class="form-group row mb-4">
                          <td> <input type="text" name="lname" class="form-control" value="<?php echo  $row['lname'] ;?>"> </td>
</div>
                       <div class="form-group row mb-4">
                          <td> <input type="text" name="username" class="form-control" value="<?php echo  $row['username'] ;?>"> </td>
</div>

 <div class="form-group row mb-4">
                          <td> <input type="text" name="email" class="form-control" value="<?php echo  $row['email'] ;?>"> </td>
</div>
                    

                        </tr>






                        <tr>
                        <th >Password</th>
                         <th >Walletbalance</th>
                          <th class="text-center">Refbonus</th>
                          <th class="text-right">Refcode</th>
    
                        </tr>
                        <tr>
                        
                      
                    </div>
                    <div class="form-group row mb-4">
                          <td> <input type="text" name="password" class="form-control" value="<?php echo $row['password'] ;?>"></td>
                          </div>


                          </div><div class="form-group row mb-4">
                          <td> <input type="text" name="walletbalance" class="form-control" value="<?php echo $row['walletbalance'] ;?>"></td>

</div>
                    <div class="form-group row mb-4">
                          <td> <input type="text" name="refbonus"  class="form-control" value="<?php echo $row['refbonus'] ;?>"> </td>
</div>
                    
<div class="form-group row mb-4">
                          <td> <input type="text" name="refcode" class="form-control" value="<?php echo $row['refcode'] ;?>"></td>
                          </div>

                          </div>
                        </tr>
                        
                        
                    <tr>
                    <th>Profit</th>
                          <th>Active Package</th>
                          <th class="text-center">Phone</th>
                          <th class="text-right">Address</th>
                        </tr>
                        <tr>
                        
                      
                    </div>
                    <div class="form-group row mb-4">
                          <td> <input type="text" name="profit" class="form-control" value="<?php echo $row['profit'] ;?>"></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <input type="text" name="pname" class="form-control" value="<?php echo $row['pname'] ;?>"></td>

</div>
<div class="form-group row mb-4">
                          <td> <input type="text" name="phone"  class="form-control" value="<?php echo $row['phone'] ;?>"> </td>
</div>
                    
<div class="form-group row mb-4">
                          <td> <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ;?>"></td>
                          </div>

                          </div>

                          </div>
                        </tr>
                        
                             <tr>
                               <th>Country</th>
</tr>


                               <tr>
                               <div class="form-group row mb-4">
                          <td> <input type="text" name="country" class="form-control" value="<?php echo $row['country'] ;?>"></td>
                          </div>
</tr>
                        
                        
                        
                        </br></br>






                       
                        </br></br>
                       
                      

                        <tr>
                          <td>
                        <button  type="submit" name="edit" class="btn btn-success btn-icon icon-left"><i class="fa fa-check"></i> Edit User Details</button></td>
                        </tr>

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

