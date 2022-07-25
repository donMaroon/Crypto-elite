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
$refcode = $row1['refcode'];
$referred = $row1['referred'];
$username = $row1['username'];
}

$sql211= "SELECT SUM(moni) as total_value FROM wbtc WHERE email= '$email' and status= 'completed'";
$result211 = mysqli_query($link,$sql211);
$row11 = mysqli_fetch_assoc($result211);
if($row11['total_value'] != ""){
$wbtc1 = $row11['total_value'];
}else{
$wbtc1 = 0;
}

if(isset($_POST['submit'])){




    $usd =$link->real_escape_string( $_POST['usd']);
    $btctnx =$link->real_escape_string($_POST['btctnx']);
    $urefcode =$link->real_escape_string($_POST['refcode']);
    $ureferred =$link->real_escape_string($_POST['referred']);
    
    $tnx = uniqid('tnx');
    
    
    if($usd == "" ||  $btctnx == "" ){
                $msg = "No Field should be left empty!";
    
        }else{
    
    
    $sql = "INSERT INTO btc (usd,btctnx,email,status,tnxid,refcode,referred)
    VALUES ('$usd','$btctnx','$email','pending','$tnx','$urefcode','$ureferred')";
    
    if (mysqli_query($link, $sql)) {
    
      include_once "../PHPMailer/PHPMailer.php";
      require_once '../PHPMailer/Exception.php';
    
      $mail= new PHPMailer();
      $mail->setFrom($emaila);
       $mail->FromName = $name;
      $mail->addAddress($email);
      $mail->Subject = "Deposit Alert!";
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
    
    Your deposit of '.$usd.' USD worth of '.$btc.'  BTC is currently under review, your transaction ID is '.$tnx.' , your balance will be credited once your deposit is confirmed.
    
    
    </p>
    
    <div class="be_footer">
    <div style="border-bottom: 1px solid #ccc;"></div>
    
    
    <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">
    
    <p> Please do not reply to this email. Emails sent to this address will not be answered. 
    Copyright ©2010 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>' ;
    
    
    
      if($mail->send()){
    
        $msg= " Your deposit of $usd USD worth of $btc  BTC is currently under reviews, your transaction ID is $tnx , your balance will be credited once your deposit is confirmed. ";
      }
    
    
    
    
    
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
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

        <title>Wallet Crypto Elite</title>

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
                        <li class="active">
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
                            <a class="navbar-brand" style="color: #fd961a;" href="#">Wallet</a>
                        </div>
                        <div class="collapse navbar-collapse">
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                                                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Wallet Balance</h4>
                                                <p class="category">current available balance</p>
                                            </div>
                                            <div class="content" style="text-align: center">
                                                <h1>$<?php echo round($pdbalance,2) + round($profit,2);?></h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Total Earnings</h4>
                                                <p class="category">total earnings so far</p>
                                            </div>
                                            <div class="content" style="text-align: center">
                                                <h1>$<?php echo round($pdprofit,2) + round($profit,2);?></h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">

                                            <div class="header">
                                                <h4 class="title">Total Withdrawn</h4>
                                                <p class="category">total earnings withdrawn so far</p>
                                            </div>
                                            <div class="content" style="text-align: center">
                                                <h1>$<?php echo $wbtc1; ?></h1>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                              <?php
function getPrice($url){
  $decode = file_get_contents($url);
return json_decode($decode, true);
}
$btcUsd  = getPrice('https://www.cryptonator.com/api/ticker/btc-usd/');
$btcPrice = $btcUsd["ticker"]["price"];
$btcDisplay = round($btcPrice, 2);

?>

<script>
function btcconverter(input){
var price = "<?php echo $btcDisplay; ?>";
var output = input.value / price;
var out= document.getElementById('btc');
out.value=output;
}

</script>                          
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="header">
                                        <h4 class="title">Add funds to wallet</h4>
                                        <p class="category">Choose one of the following payment modes to add funds to your wallet.</p>
                                        <a href="eth.php" class="btn btn-link" >Ethereum Payment</a>
                                        <a href="pm.php" class="btn btn-link">Bitcoin Payment</a>

                                    </div>
                                    <div class="content">
<?php   
        $sql1= "SELECT * FROM admin";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){
  $row23 = mysqli_fetch_assoc($result1);

    if(isset($row23['bwallet'])){
  $bw = $row23['bwallet'];
}else{
  $bw="cant find wallet";
}
}
?>
                                                                                        
                                                
                                                                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                <div class="content">

                                <p style="text-align: center;">
                                                    <b>Bitcoin Payment Process</b></p>
                                               
                                                <div class="row">
                                                <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <p>Make payment to the below BNB Wallet </p>
                                                                    <input type="text" class="form-control" value="bnb1fytrsqw8w8ncunhktvul2phh5ysm2lfxnh5cht" id="myInputs" readonly>
                                                                    <button onclick="myFunctions()" class="btn btn-info btn-fill"> Copy BNB Address </button>
                                                                    <script>
                                                                    function myFunctions() {
                                                                    var copyText = document.getElementById("myInputs");
                                                                    copyText.select();
                                                                    document.execCommand("copy");
                                                                    alert("Copied the wallet address: " + copyText.value);
                                                                    }
                                                                    </script>
                                                                </div>
                                                            </div>
                                               
                                                <form action="wallet.php" method="post">
                                               
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Amount in USD</label>
                                                                    <input type="double" id="usd" name="usd" placeholder="Amount in USD" class="form-control" required>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Paste the transferred btc transaction ID</label>
                                                                    <input type="text"  name="btctnx" placeholder="Paste the transferred btc transaction ID" class="form-control" required>
                                                                    <input type="hidden"  name="refcode" value="<?php  echo $refcode;?>" class="form-control">
        <input type="hidden"  name="referred" value="<?php  echo $referred;?>" class="form-control"><br/>
        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Deposit</button>
                                                                </div>
                                                            </div>
                                                            <hr/>

                                                            
        

        
                                                
                                            </form>
                                            </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            <center></center>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="header">
                                            <h4 class="title">Payment history</h4>
                                            <p class="category">A list of all your approved and pending payments.</p>
                                        </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                        <thead>
                                        <th>Email</th>
							<th>Amount(USD)</th>
              <th>Amount(BTC)</th>
              <th>Amount(ETH)</th>
							<th>Status</th>
							<th>Tnx ID</th>
							<th>Date</th>
                                        </thead>
                                            <tbody>
                                            <?php $sql= "SELECT * FROM btc WHERE email='$email' ORDER BY id DESC ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
                  $is_yes = 1;
				  while($row = mysqli_fetch_assoc($result)){   
					  
					 
					 
$row['status'];
   
   
if(isset($row['status']) &&  $row['status']== 'approved'){
	
	
	$sec = '<span class="badge" style="padding: 10px 15px; background-color: #29c088;">Completed</span>';

}else{
$sec ='<span class="badge" style="padding: 10px 15px; background-color: #dd2525;">Pending</span>';
}
					 
					 ?>
                                            <tr class="primary">

                                            <td><?php echo $row['email'];?></td>
							<td>$<?php echo $row['usd'];?></td>
							<td><?php echo $row['btc'];?></td>
							<td><?php echo $row['eth'];?></td>
								<td><?php echo $sec;?></td>
							<td><?php echo $row['tnxid'];?></td>
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
                                               <?php if($is_yes==0){ echo " <center><b>You have no payment history</b></center><br>";} ?>                                </div>
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

</html>
