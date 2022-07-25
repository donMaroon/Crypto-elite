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




$sql2= "SELECT * FROM users WHERE email= '$email'";
$result2 = mysqli_query($link,$sql2);
if(mysqli_num_rows($result2) > 0){
 $row = mysqli_fetch_assoc($result2);
 $pdate = $row['pdate'];
 $duration = $row['duration'];
 $increase = $row['increase'];
 $usd = $row['usd'];
}



if(isset($_POST['switch'])){
    
    $profit = $_POST['profit'];
    
            
    
	
	 $sql = "UPDATE users SET activate = '0',pdate = '0',walletbalance= walletbalance + $profit  WHERE email='$email'";
	 
	 
  if(mysqli_query($link, $sql)){
	
$msg = "Package Ended with profit of $profit you can now switch or enjoy a new package !";

  }else{
      
      $msg = "Package cannot be ended/switched!";
  }
}


if(isset($_POST['activate'])){
	
	
 
    $usd = $_POST['usd'];
    $cdate = date('Y-m-d H:i:s');
  
  
    $sql22= "SELECT * FROM users WHERE email= '$email'";
    $result22 = mysqli_query($link,$sql22);
    if(mysqli_num_rows($result22) > 0){
     $row22 = mysqli_fetch_assoc($result22);
     $row22['walletbalance'];
     $row22['activate'];
     $from = $row22['froms'];
     $bonus = $row22['bonus'];
     $pname1 = $row22['pname'];
   
  
      $sql1 = "UPDATE users SET activate = '1',pdate='$cdate',usd='$usd',walletbalance= walletbalance + $bonus  WHERE email='$email'";
      
      
          
      
    
   
  
    if(isset($row22['activate']) &&  $row22['activate'] == '1'){
  
      $msg = "Package is already active!";
  
    }else{
      
  if(isset($row22['walletbalance']) && isset($row22['froms']) && $row22['walletbalance'] >= $from && $row22['walletbalance'] >= $usd && $usd >= $from){
  
  
    mysqli_query($link, $sql1);
      
    $msg = "Your package is successfully activated!";
       
    include_once "../PHPMailer/PHPMailer.php";
      require_once '../PHPMailer/Exception.php';
    
      $mail= new PHPMailer();
       $mail->setFrom($emaila);
     $mail->FromName = $name;
      $mail->addAddress($email, $username);
      $mail->Subject = "Package Activated";
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
  
  Your package of '.$pname1.'  has been activated successfully. Thank you for investing in us! 
  
  </p>
  
  <div class="be_footer">
  <div style="border-bottom: 1px solid #ccc;"></div>
  
  
  <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">
  
  <p> Please do not reply to this email. Emails sent to this address will not be answered. 
  Copyright ©2010 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
      
      
      if($mail->send()){
    
        
      }
  
  }else{
          
  
      $msg = "Package cannot be activated, insufficient balance or amount less than package minimum value ! ";
  }
      }
    }
  
  }


if(isset($row['pdate']) &&  $row['pdate'] != '0' && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) ){
         
    $endpackage = new DateTime($pdate);
    $endpackage->modify( '+ '.$duration. 'day');
$Date2 = $endpackage->format('Y-m-d');
$current=date("Y/m/d");

$diff = abs(strtotime($Date2) - strtotime($current));
$one = 1;

    $date3 = new DateTime($Date2);
     $date3->modify( '+'. $one.'day');
     $date4 = $date3->format('Y-m-d');

$days=floor($diff / (60*60*24));


$daily = $duration - $days;
$percentage = ($increase/100) * $daily * $usd;











$one = 1;
$f = date('Y-m-d', strtotime($Date2 . ' + '. $one.'day'));

if(isset($days) && $days == 0 || $Date2 == (date("Y/m/d"))  ){

 $pp =   $percentage;     


$sql = "UPDATE users SET activate = '0',pdate = '0',walletbalance= walletbalance + $pp, profit = profit + $pp  WHERE email='$email'";


if(mysqli_query($link, $sql)){

$percentage = $pp = 0;

$Date2 = 0;
$current = 0;
$duration = 0;

$days = 'package completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
$days = 0;
$Date2 = 0;
$current = 0;
$duration = 0;

}
}else{
$_SESSION['pprofit'] = $percentage;
}






$add="days";
 
}else {
    $daily ="";
    $percentage ="";
    $Date = "0";
    $days ="No active days";
    $diff = "";
    $Date2 = 'No active date';
  }

  if(isset($_SESSION['pprofit'])){

    $profit = $_SESSION['pprofit'];
  }else{
    session_destroy($_SESSION['pprofit']);
    $profit = "";
  }
 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Upgrades Crypto Elite</title>

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
            <div class="sidebar" data-color="#999">

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
                            <a href="mypackages.php">
                                <i class="pe-7s-photo-gallery" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">My Package</p>
                            </a>
                        </li>
                        <li>
                                    <a href="withdrawal.php">
                                        <i class="pe-7s-cash" style="color: #fd961a;"></i>
                                        <p style="color: #fd961a;">Withdrawals</p>
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
                            <a class="navbar-brand" style="color: #fd961a;" href="#">My Package</a>
                        </div>
                        <div class="collapse navbar-collapse">
                        </div>
                    </div>
                </nav>

                <?php $sql= "SELECT * FROM users WHERE email='$email'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  $row = mysqli_fetch_assoc($result);  

$row['activate'];
$row['pdate'];
   
   
if(isset($row['activate']) &&  $row['activate']== '1'){
	
	
	$sec = 'Active &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-refresh" ></i>';

}else{
$sec ='Not Active &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
$usd = 'No investment';
}



   
if(isset($row['pdate']) &&  $row['pdate']== '0'){
	
	
	$date = 'Not Yet Started &nbsp;&nbsp;<i style="background-color:red;color:#fff; font-size:20px;" class="fa  fa-times" ></i>';
  $start= $row['duration'];
}else{
$date = $row['pdate'];
$start= $row['date'];
}




              }
				  ?>
                <div class="content">
                <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
  
                    <div class="container-fluid">
                                                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Investment Plan</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: purple; color: #fff;">
                                                <h4><?php echo $row['pname'];?></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Daily Profit</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: #2949a3; color: #fff;">
                                                <h4><?php echo $row['increase'];?>%</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Total Profit</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: purple; color: #fff;">
                                                <h4> $ <?php echo $percentage;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Activation Date</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: orange; color: #fff;">
                                                <h4><?php echo $date;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">End Date</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: #2949a3; color: #fff;">
                                                <h4><?php echo $Date2;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Days To End</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: orange; color: #fff;">
                                                <h4><?php echo $days;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Amount Invested</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: #008080; color: #fff;">
                                                <h4>$<?php echo $usd;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Status</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: #2949a3; color: #fff;">
                                                <h4><?php echo $sec ;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Amount To Invest</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: #008000; color: #fff; padding: 30px;">
                                            <input type="text"  name="usd" placeholder="Amount to invest" class="form-control" style="border-radius:5px;width:100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Action</h4>
                                            </div>
                                            <div class="content" style="text-align: center; background: #4b0082; color: #fff;">
                                            <button type="submit" name="activate" class="btn btn-info btn-fill ">Activate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Action</h4>
                                            </div>
                                            <input type="hidden" name="profit" value="<?php echo $percentage;?>">
                                            <div class="content" style="text-align: center; background: #2949a3; color: #fff;">
                                            <button type="submit" name="switch" class="btn btn-info btn-fill">Switch Package/End Package</button>
                                            </div>
                                        </div>
                                    </div>
            </form>
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

</html>
