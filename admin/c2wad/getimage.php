<?php
session_start();
include "db.php";
$msg = "";
use PHPMailer\PHPMailer\PHPMailer;

$email=$_GET['emails'];

if(isset($_SESSION['email'])){



}
else{


	header("location:https://killocoin.com/users/users_form");
}


if ($_SERVER['REQUEST_METHOD'] == "POST"){

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $msg=  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg=  "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $msg=  "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $msg=  "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msg=  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   $msg=  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	 $fileToUpload = $_FILES["fileToUpload"]["name"];

	 $sql = "UPDATE users SET image='$fileToUpload',regbonus='2' WHERE email='$email'";

	  mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $msg= "Your identity  ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded and you have been verified successfully. You can now enjoy all our services.";
    } else {
        $msg= "Sorry, there was an error uploading your file.";
    }
}

}


include "header.php";

?>

        <!-- page content -->

       <div class="right_col" role="main" style="margin-left:5%;">
          <!-- top tiles -->

<h2 align="center" style="color:black">USERS FINAL VERIFICATION </h2>
<h5 align="center" style="color:black">Dear  <?php echo $_SESSION['lname'];?> <?php echo $_SESSION['fname'];?>, NOTE:All information provided by you can not be accessed by anyone, the platform uses end to end encryption to secure all its members details kindly note your password and keep it save. 
</br>
Please verify you are not a robot by completing the below upload to get you sign up bonus </h5>

</br>
<?php if($msg != "") echo "<div style='background-color:green;color:white'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


<form action="getimage.php?emails=<?php echo $_SESSION['email'];?>" method="POST" enctype="multipart/form-data"  class="form-horizontal form-label-left" >




   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">A profile display picture <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12" required >
                        </div>
                      </div>


   <div class="col-md-6 col-md-offset-3">

                          <button type="submit"  class="btn btn-primary" value="Upload Image" name="submit">Upload ID</button>
                        </div>


</form>



          </div>
          <!-- /top tiles -->



                <div class="clearfix"></div>

          <br />



        </div>
          <div class="clearfix"></div>

        <!-- /footer content -->



  </body>
</html>
