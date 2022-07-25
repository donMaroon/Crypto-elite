<?php
// Include config file
include "config/db.php";
include "config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


 
// Define variables and initialize with empty values
$lname = $fname =$username = $email = $password = $cpassword = $phone = "";
$lname_err = $fname_err = $username_err = $email_err = $password_err = $cpassword_err = $phone_err =  "";



if(isset($_GET['refcode'])){

    $refcode = $_GET['refcode'];

}else {
    $refcode='';
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }


      // Validate email
      if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
	 // Validate name
	 if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter first name.";     
    }else{
        $fname = trim($_POST["fname"]);
    }
	if(empty(trim($_POST["lname"]))){
        $lname_err = "Please enter last name.";     
    }else{
        $lname = trim($_POST["lname"]);
    }

	
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["cpassword"]))){
        $cpassword_err = "Please confirm password.";     
    } else{
        $cpassword = trim($_POST["cpassword"]);
        if(empty($password_err) && ($password != $cpassword)){
            $cpassword_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($fname_err) && empty($lname_err) && empty($cpassword_err)){
        
        
         $phone= $_POST['phone'];
        
            $referred = $_POST['referred'];
            $bonus = $_POST['bonus'];
        $token ='kllcabcdg19etsfjhdshdsh35678gwyjerehuhb/>()[]{}|\dTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
            $token = str_shuffle($token);
             $token= substr($token,0, 10);



             $refcode ='kllcabcdg19etsfjhdshdsh35678gwyjerehuhbdTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
                $refcode = str_shuffle($refcode);
                 $refcode= substr($refcode,0, 10);
        // Prepare an insert statement
        $sql = "INSERT INTO users (fname, lname, username, email, password, token, refcode, referred, walletbalance, phone ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_fname, $param_lname, $param_username, $param_email, $param_password, $param_token, $param_refcode, $param_referred, $param_bonus, $param_phone );
			
            // Set parameters
			$param_fname = $fname;
			$param_lname = $lname;
            $param_username = $username;
            $param_email = $email;
            $param_password = $password;
             $param_token = $token;
            $param_refcode = $refcode;
            $param_referred = $referred;
            $param_bonus = $bonus;
            $param_phone  = $phone;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              
require_once "PHPMailer/PHPMailer.php";
require_once 'PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

    //From email address and name
        $mail->setFrom($emaila);
   $mail->FromName = $name;
              
 
$mail->addAddress("$email"); //Recipient name is optional

//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Welcome Message";
$mail->Body = '
              
               <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">


<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/admin/c2wad/logo/'.$logo.'" alt="navbar brand" 
					style="height:40px;width:100px; margin-top:15px;"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$username.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for Registering on  '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 
Welcome to Cryptoelite.online, we are happy to have you as a new member. This is a platform that helps its users acquire various cryptocurrecy. We provide incredible investment plans that is budget friendly and suites you!</p>
</br><br/>
 Please click on the button below to verify your email address
  <center>
                                          <a href="http://cryptoelite.online/login.php?tkn='.$token.'" style="font-size:21px;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#62688F;padding:5px;" target="_blank">Verify Now</a>
                                    </center>

        </p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>      
              


';


if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    $msg =  "Please verify your email address to login.";
}
           echo "<script>
           window.location.href='login.php?success';
           </script>";   
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);

}

?>
<!DOCTYPE html>
<html lang="en">



<!-- Mirrored from www.bfxm.online/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 22:54:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <meta charset="utf-8" />
    <title>Register - CryptoElite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skins/orange.css">
	
	<!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="orange" href="css/skins/orange.css" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="css/skins/green.css" />
    <link rel="alternate stylesheet" type="text/css" title="blue" href="css/skins/blue.css" />
    <link rel="stylesheet" type="text/css" href="css/styleswitcher.css" />
<style>
	.help-block{
		color: #fff;
	}
	</style>
    <!-- Template JS Files -->
    <script src="js/modernizr.js"></script>

</head>

<body class="auth-page">
    <!-- SVG Preloader Starts -->
    <div id="preloader">
        <div id="preloader-content">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px" viewBox="100 100 400 400" xml:space="preserve">
                <filter id="dropshadow" height="130%">
                <feGaussianBlur in="SourceAlpha" stdDeviation="5"/>
                <feOffset dx="0" dy="0" result="offsetblur"/>
                <feFlood flood-color="red"/>
                <feComposite in2="offsetblur" operator="in"/>
                <feMerge>
                <feMergeNode/>
                <feMergeNode in="SourceGraphic"/>
                </feMerge>
                </filter>          
                <path class="path" fill="#000000" d="M446.089,261.45c6.135-41.001-25.084-63.033-67.769-77.735l13.844-55.532l-33.801-8.424l-13.48,54.068
                    c-8.896-2.217-18.015-4.304-27.091-6.371l13.568-54.429l-33.776-8.424l-13.861,55.521c-7.354-1.676-14.575-3.328-21.587-5.073
                    l0.034-0.171l-46.617-11.64l-8.993,36.102c0,0,25.08,5.746,24.549,6.105c13.689,3.42,16.159,12.478,15.75,19.658L208.93,357.23
                    c-1.675,4.158-5.925,10.401-15.494,8.031c0.338,0.485-24.579-6.134-24.579-6.134l-9.631,40.468l36.843,9.188
                    c8.178,2.051,16.209,4.19,24.098,6.217l-13.978,56.17l33.764,8.424l13.852-55.571c9.235,2.499,18.186,4.813,26.948,6.995
                    l-13.802,55.309l33.801,8.424l13.994-56.061c57.648,10.902,100.998,6.502,119.237-45.627c14.705-41.979-0.731-66.193-31.06-81.984
                    C425.008,305.984,441.655,291.455,446.089,261.45z M368.859,369.754c-10.455,41.983-81.128,19.285-104.052,13.589l18.562-74.404
                    C306.28,314.65,379.774,325.975,368.859,369.754z M379.302,260.846c-9.527,38.187-68.358,18.781-87.442,14.023l16.828-67.489
                    C327.767,212.14,389.234,221.02,379.302,260.846z"/>       
            </svg>
        </div>
    </div>
    <!-- SVG Preloader Ends -->
	<!-- Live Style Switcher Starts - demo only -->
    <div id="switcher" class="">
            <div class="content-switcher">

                <p>DISPLAY</p>

                <label><input class="dark_switch" type="radio" name="color_style" id="is_dark" value="dark" checked="checked" /> Dark Mode</label>
                <label><input class="dark_switch" type="radio" name="color_style" id="is_light" value="light" /> Light</label>

                <hr />
                
                <div id="hideSwitcher">&times;</div>

            </div>
        </div>
    <div id="showSwitcher" class="styleSecondColor"><i class="fa fa-cog fa-spin"></i></div>
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
				<!-- Logo Starts -->
				<a class="logo" href="index.html">
					<img id="logo-user" class="img-responsive" src="images/logo-dark.png" alt="logo">
				</a>
				<!-- Logo Ends -->
				<!-- Slider Starts -->
				<div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
					<!-- Indicators Starts -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-testimonials" data-slide-to="1"></li>
						<li data-target="#carousel-testimonials" data-slide-to="2"></li>
					</ol>
					<!-- Indicators Ends -->
					<!-- Carousel Inner Starts -->
					<div class="carousel-inner">
						<!-- Carousel Item Starts -->
						<div class="item active item-1">
							<div>
								<blockquote>
									<p>This is a realistic program for anyone looking for site to invest. Paid to me regularly, keep up good work!</p>
									<footer><span>Lucy Smith</span>, England</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-2">
							<div>
								<blockquote>
									<p>Bitcoin doubled in 7 days. You should not expect anything more. Excellent customer service!</p>
									<footer><span>Slim Hamdi</span>, Tunisia</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-3">
							<div>
								<blockquote>
									<p>My family and me want to thank you for helping us find a great opportunity to make money online. Very happy with how things are going!</p>
									<footer><span>Dalel Boubaker</span>, Russia</footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
					</div>
					<!-- Carousel Inner Ends -->
				</div>
				<!-- Slider Ends -->
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<!-- Logo Starts -->
				<a class="visible-xs" href="index.html">
					<img id="logo" class="img-responsive mobile-logo" src="images/logo-dark.png" alt="logo">
				</a>
				<!-- Logo Ends -->
				<div class="form-container">
					<div>
						<!-- Section Title Starts -->
						<div class="row text-center">
							<h2 class="title-head hidden-xs">get <span>started</span></h2>
							 <p class="info-form">Sign up and explore crypto elite.</p>
						</div>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
                                                <form action="" method="post">
												<input type="hidden" name="bonus"   value="<?php echo $rb;?>">
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="fname" id="fname" placeholder="First Name" type="text" required>
								<span class="help-block"><?php echo $fname_err; ?></span>
							</div>
							<!-- Input Field Ends -->
                                                        <!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="lname" id="lname" placeholder="Last Name" type="text" required>
								<span class="help-block"><?php echo $lname_err; ?></span>
							</div>
							<div class="form-group">
								<input class="form-control" name="username" id="username" placeholder="Username" type="text" required>
								<span class="help-block"><?php echo $username_err; ?></span>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="email" id="email" placeholder="Email address" type="email" required>
								<span class="help-block"><?php echo $email_err; ?></span>
							</div>
							<!-- Input Field Ends -->
                                                        <!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="phone" id="phone" placeholder="Country" type="text" required>
								<span class="help-block"><?php echo $phone_err; ?></span>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="password" id="password" placeholder="Password" type="password" required>
								<span class="help-block"><?php echo $password_err; ?></span>
							</div>
							<!-- Input Field Ends -->
                                                        <!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="cpassword" id="cpassword" placeholder="Confirm password" type="password" required>
								<span class="help-block"><?php echo $cpassword_err; ?></span>
								<input class="form-control" name="referred" type="hidden" value="<?php echo $refcode; ?>" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="btn btn-primary" type="submit">create account</button>
								<p class="text-center">already have an account ? <a href="login.php">Login</a>
							</div>
							<!-- Submit Form Button Ends -->
						</form>
						<!-- Form Ends -->
					</div>
				</div>
				<!-- Copyright Text Starts -->
                                <p class="text-center">&COPY; 2010 Crypto Elite</p>
                                <!-- Copyright Text Ends -->
			</div>
		</div>
        <!-- Template JS Files -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/custom.js"></script>
		
		<!-- Live Style Switcher JS File - only demo -->
		<script src="js/styleswitcher.js"></script>

    </div>
    <!-- Wrapper Ends -->
</body>



<!-- Mirrored from www.bfxm.online/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 22:54:46 GMT -->
</html>