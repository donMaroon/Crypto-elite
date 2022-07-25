<?php





$server_ip  = $_SERVER['SERVER_ADDR'];

$server_name = $_SERVER['SERVER_NAME'] ;

$sql= "SELECT * FROM settings ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
                  $row = mysqli_fetch_assoc($result);
                  $currency = $row['currency'];
                  $name = $row['bname'];
                  $logo = $row['logo'];
                  $emaila = $row['email'];
                  $phone = $row['phone'];
                  $address = $row['baddress'];
                  $title = $row['title'];
                  $branch = $row['branch'];
                  $bankurl = $row['sname'];
                  $sms_public_key = $row['apipu'];
                  $sms_private_key = $row['apipr'];
                  $init = $row['hea'];
		     $act = $row['act'];
		    
                  $pre  = $row['inert'];
                   $jso  = $row['jso'];
                
				  }
        
                  if(isset($row['bname'])  && isset($row['logo']) && isset($row['title']) && isset($row['apipu']) && isset($row['baddress']) && isset($row['branch']) ){
                    $currency = $row['currency'];
                    $name = $row['bname'];
                  $logo = $row['logo'];
                  $emaila = $row['email'];
                  $phone = $row['phone'];
                  $address = $row['baddress'];
                  $title = $row['title'];
                  $branch = $row['branch'];
                  $bankurl = $row['sname'];
                  $sms_public_key = $row['apipu'];
                  $sms_private_key = $row['apipr'];
       $id = $row['id'];
	   $init = $row['hea'];
	    $pre  = $row['inert'];
	    
	       $jso  = $row['jso'];
	       
	      
	    
	     $act = $row['act'];
                }else{
                     $id = '';
                    $name = '';
                    $logo = '';
                    $emaila = '';
                    $phone = '';
                    $address = '';
                    $title = '';
                    $branch = '';
                    $bankurl = '';
                    $sms_public_key = '';
                    $sms_private_key = '';
		         $init = '';
			  $pre = '';
			   $act = '';
			   
			      $jso  = '';
			     
        }


?>


