<?php


session_start();




include "../config/db.php";
include "../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if(isset($_SESSION['email'])){

    $email = $_SESSION['email'];
		 $sql = "UPDATE users SET session='1' WHERE email='$email'";

	  mysqli_query($link, $sql) or die(mysqli_error($link));


	}
else{


	header("location:../login.php");
}




$pdbalance = 0;
$pdprofit = 0;
$percentage = 0;
$wbtc1 = 0;






$sql21= "SELECT * FROM users WHERE email= '$email'";
$result21 = mysqli_query($link,$sql21);
if(mysqli_num_rows($result21) > 0){
$row1 = mysqli_fetch_assoc($result21);
$pdbalance = $row1['walletbalance'];
$pdprofit = $row1['profit'];
$refcode = $row1['refcode'];
$referred = $row1['referred'];
$username = $row1['username'];
$password = $row1['password'];
}


if(isset($_POST['submit'])){

  
    
      
  
      $usd =$link->real_escape_string( $_POST['usd']);
      $mode =$link->real_escape_string($_POST['mode']);
      $wallet =$link->real_escape_string($_POST['wallet']);
      $upassword =$link->real_escape_string($_POST['password']);
    $j = $usd;
    $tnx = uniqid('tnx');
    
    
  
    
    $sql = "INSERT INTO wbtc (moni,mode,email,status,tnx,wal)
    VALUES ('$j','$mode','$email','pending','$tnx','$wallet')";

    if($password == $upassword){
    
    if($pdbalance >= $j){
     if($j < $wl){
       $msg = "Minimum withdrawal is $wl USD";
     }else {
  
       if(mysqli_query($link, $sql)){
               $balance =  $row['walletbalance'];
        $sq = "UPDATE users SET walletbalance = walletbalance - $j WHERE email='$email'";
  
        mysqli_query($link, $sq);
  $msg= " Your withdraw request of $j USD worth of $mode has been sent, your transaction ID is $tnx , your wallet will be credited once your request is approved ";
     
  include_once "../PHPMailer/PHPMailer.php";
      require_once '../PHPMailer/Exception.php';
    
      $mail= new PHPMailer();
       $mail->setFrom($emaila);
     $mail->FromName = $name;
      $mail->addAddress($email, $username);
      $mail->Subject = "Withdrawal Request";
      $mail->isHTML(true);
      $mail->Body = '
      
      
      <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 
  
  <div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">
  
  <div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/admin/c2wad/logo/'.$logo.'"> </div>
  
  <div class="be_user" style="float: right"> <p>Dear: '.$username.'</p> </div> 
  
  <div style="clear: both;"></div> 
  
  <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">
  
  <h1>Thank you for investing on '.$name.'</h1>
  
  </div> </div> 
  
  <div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 
  
  Your withdraw request of '.$j.' USD worth of '.$mode.' has been sent, your transaction ID is '.$tnx.' , your wallet will be credited once your request is approved
  
  </p>
  
  <div class="be_footer">
  <div style="border-bottom: 1px solid #ccc;"></div>
  
  
  <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">
  
  <p> Please do not reply to this email. Emails sent to this address will not be answered. 
  Copyright ©2010 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
      
      
      if($mail->send()){
    
        
      }
       }
    
    
     }
    
    } else {
      $msg = "Insufficient balance";
    }
} else {
    $msg = "Incorrect Password";
  }
  
     
    
  
  
  }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Withdrawals | Crypto Elite</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" style="color:#1d1d1d;">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="../" class="simple-text">
                            <img class="img-responsive" alt="logo" src="../images/logo-dark.png">
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="./">
                                <i class="pe-7s-graph" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="pe-7s-user" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">User Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="message.php">
                                <i class="pe-7s-mail" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Messages</p>
                            </a>
                        </li>
                        <li>
                            <a href="wallet.php">
                                <i class="pe-7s-wallet" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Wallet</p>
                            </a>
                        </li>
                        <li>
                            <a href="packages.php">
                                <i class="pe-7s-photo-gallery" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Upgrade</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="withdrawal.php">
                                <i class="pe-7s-cash" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Withdrawals</p>
                            </a>
                        </li>
                        <li>
                            <a href="mypackages.php">
                                <i class="pe-7s-photo-gallery" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">My Package</p>
                            </a>
                        </li>
                        <li class="active-pro">
                            <a href="logout.php">
                                <i class="pe-7s-user" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid" style="background: #000;">
                        <div class="navbar-header" style="background: #000;">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" style="color: #fd961a;" href="#">Withdraw funds</a>
                        </div>
                        <div class="collapse navbar-collapse" style="color:black;">

                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Make new withdrawal</h4>
                                    </div>
                                    <div class="content">
                                    <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
     
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Amount you want to withdraw (in American Dollars)</label>
                                                        <input required="" name="usd" type="numbers" class="form-control" placeholder="Amount (Integers only)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Preferred withdrawal mode</label>
                                                        <select name="mode" class="form-control" id="plan">
                                                            <option value="">select an account type</option>
                                                            <option value="BTC">Bitcoin</option>
                                                            <option value="ETH">Ethereum</option>
                                                            <option value="PM">Perfect Money</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <ul>
                                                    <li>If you selected bitcoin as your withdrawal mode, enter your correct bitcoin wallet.</li>
                                                    <li>If you selected ethereum as your withdrawal mode, enter your correct ethereum wallet.</li>
                                                    <li>If you selected perfect money as your withdrawal mode, enter your correct perfect money wallet.</li>
                                                    <li>If you entered wrong details and we send money to someone else's account, we won't be responsible for it.</li>
                                                    <li>If any issue is encountered while disbursing your money, and administrator will contact you via your email.</li>
                                                </ul>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Account details</label>
                                                        <textarea required="" name="wallet" class="form-control" placeholder="Enter correct details"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Enter your password to confirm your withdrawal</label>
                                                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Withdraw funds</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="header">
                                        <h4 class="title">Withdrawal history</h4>
                                        <p class="category">A list of all your withdrawals.</p>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                        <thead>
                                        <th>Email</th>
							<th>Amount(USD)</th>
              <th>Mode</th>
							<th>Status</th>
							<th>Tnx ID</th>
							<th>Date</th>
                                        </thead>
                                            <tbody>
                                            <?php $sql= "SELECT * FROM wbtc WHERE email='$email' ORDER BY id DESC ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
                  $is_yes = 1;
				  while($row = mysqli_fetch_assoc($result)){   
					  
					 
					 
$row['status'];
   
   
if(isset($row['status']) &&  $row['status']== 'completed'){
	
	
	$sec = '<span class="badge" style="padding: 10px 15px; background-color: #29c088;">Completed</span>';

}else{
$sec ='<span class="badge" style="padding: 10px 15px; background-color: #dd2525;">Pending</span>';
}
					 
					 ?>
                                            <tr class="primary">

                                            <td><?php echo $row['email'];?></td>
							<td>$<?php echo $row['moni'];?></td>
							<td><?php echo $row['mode'];?></td>
								<td><?php echo $sec;?></td>
							<td><?php echo $row['tnx'];?></td>
							<td><?php echo $row['date'];?></td>


						</tr>
                        <?php
 }
			  }else{
                  $is_yes = 0;
              }
			  ?>
                                            </tbody>
                                        </table>

                                    </div>
                                               <?php if($is_yes==0){ echo " <center><b>You have no withdrawal history</b></center><br>";} ?>                                </div>
                                                                   </div>
                            </div>
                        </div>

                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right">
                            &copy; 2010 <a>Crypto Elite</a>
                        </p>
                    </div>
                </footer>

            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
</html>
