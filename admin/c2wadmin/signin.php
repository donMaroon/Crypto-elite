<?php
session_start();

require_once "../../config/db.php";
$msg = "";
use PHPMailer\PHPMailer\PHPMailer;


$email_err = $password_err= "";
$email = $password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["email"])) {
    $email_err = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format"; 
    }
  }
  
  
   if (empty($_POST["password"])) {
    $password_err = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
   
  }
    
		
	$email = $link->real_escape_string($_POST['email']);
	$password = $link->real_escape_string($_POST['password']);
	
	
	if($email == "" || $password == ""){
		$msg = "Email or Password fields cannot be empty!";
		
	}else {
		
					
	if($sql = "SELECT * FROM admin WHERE email='$email'  AND password='$password'"){

                 $result = $link->query($sql);
                 if(mysqli_num_rows($result) > 0){
                     $row = mysqli_fetch_array($result);

	             $_SESSION['email']=$_POST['email'];
	               $_SESSION['password']=$row['password'];
				    $_SESSION['uid']=$row['id'];
				  

					header("location:../c2wad/index.php");
				
				
			}else{
				
				$msg = "Email or Password incorrect!";
			}
			
		
			 
		}else{
			$msg = "Email or Password incorrect!";
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


<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Crypto investment script</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

<style>
#inp{
   border-radius:5px; 
    background-color:#fff;
}    
 #den{
        border-radius:5px; 
     background-color:#091236;
     color:green;
     margin-top:100px;
 } 

</style>
</head>
<body>
			

						<div class="">
							<!-- /login -->
							   <div class="">
								    <div class="registration">
								
												<div id="den" class="signin-form profile">
													<h2 style="color:#fff;font-family:Comic Sans MS;">CRYPTO INVESTMENT SCRIPT ADMIN</h2>

													<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

													<div class="login-form">
														<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

														
															
															
																<input id="inp" type="email" name="email"  >
                                                                <span class="help-block"><?php echo $email_err; ?></span>
                                                               
															   
																<input id="inp" type="password" name="password" >
                                                                <span class="help-block"><?php echo $password_err; ?></span>

																
																
							</br>
															<div class="tp">
																<input type="submit" name="submit" value="SIGN IN">
															</div>
														</form>
													</div>
													
																							
												</div>
										</div>
										<!--copy rights start here-->
											<div class="copyrights_agile">
											<p>© 2019 Crypto Investment Script. All Rights Reserved </a> </p>
											</div>	
										
						    </div>
						</div>


<!-- js -->

          <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		  <script src="js/modernizr.custom.js"></script>
		
		   <script src="js/classie.js"></script>
		 <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>
</html>