<?php


session_start();




include "../config/db.php";
include "../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;



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

$sql2= "SELECT * FROM users WHERE email= '$email'";
$result2 = mysqli_query($link,$sql2);
if(mysqli_num_rows($result2) > 0){
 $row = mysqli_fetch_assoc($result2);
 $pdate = $row['pdate'];
 $duration = $row['duration'];
 $increase = $row['increase'];
 $usd = $row['usd'];
}


        if(isset($row['pdate']) &&  $row['pdate'] != '0' && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) ){
         
          $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y-m-d');
 $current=date("Y/m/d");

 $diff = abs(strtotime($Date2) - strtotime($current));

 $days=floor($diff / (60*60*24));
$daily = $duration - $days;
$percentage = ($increase/100) * $daily * $usd;
$_SESSION['pprofit'] = $percentage;


     
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
  $profit = "0";
  $_SESSION['pprofit'] = "0";
}
 



 



$sql21= "SELECT * FROM users WHERE email= '$email'";
$result21 = mysqli_query($link,$sql21);
if(mysqli_num_rows($result21) > 0){
$row1 = mysqli_fetch_assoc($result21);
$pdbalance = $row1['walletbalance'];
$pdprofit = $row1['profit'];
$fname = $row1['fname'];
$lname = $row1['lname'];
$reg_date = $row1['date'];
$phoneu = $row1['phone'];
}

$sql211= "SELECT SUM(moni) as total_value FROM wbtc WHERE email= '$email' and status= 'completed'";
$result211 = mysqli_query($link,$sql211);
$row11 = mysqli_fetch_assoc($result211);
if($row11['total_value'] != ""){
$wbtc1 = $row11['total_value'];
}else{
$wbtc1 = 0;
}

$fname_err = $lname_err = $phone_err = $password_err = "";

if(isset($_POST['submit'])){





  
  // Validate name
  if(empty(trim($_POST["fname"]))){
    $fname_err = "Please enter first name.";     
}else{
    $ufname =$link->real_escape_string( $_POST['fname']);
}
if(empty(trim($_POST["lname"]))){
    $lname_err = "Please enter last name.";     
}else{
    $ulname =$link->real_escape_string( $_POST['lname']);
}
if(empty(trim($_POST["phone"]))){
    $phone_err = "Please enter phone number.";     
}else{
    $uphone =$link->real_escape_string( $_POST['phone']);
}
if(empty(trim($_POST["password"]))){
    $password_err = "Please enter password.";     
}else{
    $upassword =$link->real_escape_string( $_POST['password']);
}
  
if(empty($fname_err) && empty($lname_err) && empty($password_err) && empty($phone_err)){

    $sqlpas= "SELECT * FROM users WHERE email= '$email'";
$resultpas = mysqli_query($link,$sqlpas);
if(mysqli_num_rows($resultpas) > 0){
 $rowpas = mysqli_fetch_assoc($resultpas);
 $rowpass = $rowpas['password'];
}

    if($rowpass == $upassword){
$sql = "UPDATE users SET fname ='$ufname', lname='$ulname', phone='$uphone' WHERE email='$email' AND password = '$upassword'";
  echo "UPDATE users SET fname ='$ufname', lname='$ulname', phone='$uphone' WHERE email='$email' AND password = '$upassword'";
                    if (mysqli_query($link, $sql)) {
  
    
                 $msg= " Your details has been successfully updated ";
  
                             }
    }else {
        $password_err = "Please enter a correct password.";
                           }
                          }
                        }   
  






?>
<!doctype html>
            <html lang="en">
                <head>
                    <meta charset="utf-8" />
                    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

                    <title>User Profile Crypto Elite</title>

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

                            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


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
                                    <li class="active">
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
                                    <li>
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
                                        <a class="navbar-brand" style="color: #fd961a;" href="#">Welcome <?php echo $fname;?>,</a>
                                    </div>
                                    <div class="collapse navbar-collapse">
                                    </div>
                                </div>
                            </nav>


                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="header">
                                                    <h4 class="title">Edit Profile</h4>
                                                </div>
                                                <div class="content">
                                                    <form action="" method="post">
                                                    <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br>";  ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input name="fname" type="text" class="form-control" placeholder="First name" value="<?php echo $fname;?>">
                                                                    <span style="color: red;"> <?php echo $fname_err; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input name="lname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $lname;?>">
                                                                    <span style="color: red;"> <?php echo $lname_err; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Email address</label>
                                                                    <input type="email" class="form-control" placeholder="Email address" value="<?php echo $email;?>" disabled="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <input name="phone" type="text" class="form-control" placeholder="Phone number" value="<?php echo $phoneu;?>" >
                                                                    <span style="color: red;"> <?php echo $phone_err; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Date joined</label>
                                                                    <input type="text" class="form-control" placeholder="Date Joined" value="<?php echo $reg_date;?>" disabled="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Enter password to confirm profile update</label>
                                                                    <input name="password" type="password" class="form-control" placeholder="Enter password">
                                                                    <span style="color: red;"> <?php echo $password_err; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                                        <div class="clearfix"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Wallet</h4>
                                            <div class="card card-user" style="padding: 10px;">
                                                                                                        <h6>Current balance</h6>
                                                        <b style="font-size: 25px;">$<?php echo round($pdbalance,2) + round($profit,2);?></b>
                                                        <hr>
                                                        <h6>Total earnings</h6>
                                                        <b style="font-size: 25px;">$<?php echo round($pdprofit,2) + round($profit,2);?></b>
                                                        <hr>
                                                        <h6>Total withdrawn</h6>
                                                        <b style="font-size: 25px;">$<?php echo $wbtc1; ?></b>
                                                                                                    </div>
                                            <h4>Investment plans</h4>
                                            <center><b>You have no active investment account.</b></center>                                        </div>

                                    </div>
                                </div>
                            </div>


                            <footer class="footer">
                                <div class="container-fluid">
                                    <p class="copyright pull-right">
                                        &copy; 2010</script> <a>Crypto Elite</a>
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
            