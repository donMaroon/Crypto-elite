<?php
session_start();
include "../../config/db.php";
$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
$email=$_GET['email'];
$username=$_GET['username'];

if(isset($_SESSION['email'])){



}
else{


  header("location:../form/signin.php");
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
  $email =$link->real_escape_string($_POST['email']);
  $status =$link->real_escape_string($_POST['status']);
  $tnx = uniqid('tnx');
   $fileToUpload = $_FILES["fileToUpload"]["name"];
   
   $sql = "INSERT INTO btc (image,email,status,tnxid) VALUES ('$fileToUpload','$email','$status','$tnx')";

	

	  mysqli_query($link, $sql) or die(mysqli_error($link));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $msg= "Your proof of payment  ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded you will be credited once order is confirmed.";
    } else {
        $msg= "Sorry, there was an error uploading your file.";
    }
}

}


include "header.php";

?>

      
 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">


  <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">
   

  <h4 align="center"><i class="fa fa-refresh"></i> Coin2Wealth  Bank Transfer Payment Process</h4>
<h5 align="center" style="color:black">Pls Upload proof of payment to coin2wealth Bank account</h5>


</br>
          <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-flat">Select deposit mode to use</button>
                  <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Select deposit mode to use</a></li>
                    <li><a href="ethereum.php?username=<?php  echo $_SESSION['username']?>&email= <?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>">Ethereum Payment</a></li>
                    <li><a href="transfer.php?username=<?php  echo $_SESSION['username']?>&email= <?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>">Bank Transfer</a></li>
                   
                  </ul>
                </div>
         
                </br>
                </br>
</br>

<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

<form action="transfer.php?username=<?php  echo $_SESSION['username']?>&email= <?php  echo $_SESSION['email']?>&sessions= <?php  echo $_SESSION['session']?>" method="POST" enctype="multipart/form-data"  class="form-horizontal form-label-left" >




   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Upload Proof Of Payment <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12" required >
                        </div>
                      </div>

                      <input type="hidden"  name="email" value="<?php  echo $_SESSION['email']?>" class="form-control">

<input type="hidden"  name="status" value="pending" class="form-control">
   <div class="col-md-6 col-md-offset-3">

                          <button type="submit"  class="btn btn-primary" value="Upload Image" name="submit">Upload Proof</button>
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
