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


if(isset($_POST['p1'])){



  
    $pname =$link->real_escape_string( $_POST['pname']);
    $increase =$link->real_escape_string( $_POST['increase']);
    $bonus =$link->real_escape_string($_POST['bonus']);
    $duration =$link->real_escape_string($_POST['duration']);
    $froms =$link->real_escape_string($_POST['froms']);
  
    
    $sql1= "SELECT * FROM users WHERE email = '$email'";
      $result1 = mysqli_query($link,$sql1);
      if(mysqli_num_rows($result1) > 0){
       $row = mysqli_fetch_assoc($result1);
       $row['activate'];
       $row['bonus'];
    }
    
        $sql = "UPDATE users SET email='$email',pname='$pname',increase='$increase',bonus='$bonus',duration='$duration',pdate='0',froms='$froms',activate='0'  WHERE email='$email'";
    
    
     
    if(isset($row['email']) &&  $row['pname']== $pname){
      $msg= " Package already selected you can only upgrade package!";
    
    }else{
        
        
        
        if(isset($row['activate']) &&  $row['activate']=='1'){
      $msg= "A Package is already running!";
    
    }else{
        
    
    
                      if (mysqli_query($link, $sql)) {
    
      
                   $msg= " Package has been successfully selected! Click <b><a href='mypackages.php'>HERE</a></b> to activate package.";
    
                               } else {
                            $msg= " Package was not selected !";
                             }
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
                        <li class="active">
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
                            <a class="navbar-brand" style="color: #fd961a;" href="#">  Upgrade</a>
                        </div>
                        <div class="collapse navbar-collapse">
                        </div>
                    </div>
                </nav>


                <div class="content">
                <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          
                    <div class="container-fluid">
                                                            <div class="row">
                                                            <?php $sql= "SELECT * FROM package1";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
            $row['pname'];
				  ?>
                                    <div class="col-md-4">
                                        <div class="card" style="background-color: #976ed8; color: #fff">

                                        <form action="" method="POST">
                                            <div class="content" style="text-align: center">
                                            <h4> <?php echo $row['pname'];?></h4>
                                            
       
       <input type="hidden" name="pname" value=" <?php echo $row['pname'];?>">
       <input type="hidden" name="froms" value=" <?php echo $row['froms'];?>">
       <input type="hidden" name="bonus" value=" <?php echo $row['bonus'];?>">
       <input type="hidden" name="increase" value=" <?php echo $row['increase'];?>">
       <input type="hidden" name="duration" value=" <?php echo $row['duration'];?>">
                                            <p><i class="pe-7s-play"></i> $<?php echo $row['froms'];?>- $<?php echo $row['tos'];?></p>
                                            <p><i class="pe-7s-play"></i> <?php echo $row['duration'];?> Days Investment</p>
                                            <p><i class="pe-7s-play"></i> Plus $<?php echo $row['bonus'];?> Activation bonus</p>
                                            <p><i class="pe-7s-play"></i> Fast Activation</p>
                                            <p><i class="pe-7s-play"></i> <?php echo $row['increase'];?>% Profit Daily</p>
                                            <button type="submit" name="p1" class="btn btn-info btn-fill">Select Plan</button>
                                            </div>
    </form>
                                        </div>
                                    </div>
                                    <?php
 }
			  }
			  ?>

                                 

                                    
                            

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
