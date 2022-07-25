<?php

session_start();

include "db.php";

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
                  $wl = $row['wl'];
                  $rb = $row['rb'];
                  $ids=$row['id'];
  $init = $row['hea'];
		     $act = $row['act'];
		    
		    $cy = $row['cy'];
                  $pre  = $row['inert'];
                   $jso  = $row['jso'];

				  }
        
                  if(isset($row['bname'])  && isset($row['logo']) && isset($row['title']) && isset($row['wl']) && isset($row['baddress']) && isset($row['branch']) ){
                    $currency = $row['currency'];
                    $name = $row['bname'];
                  $logo = $row['logo'];
                  $emaila = $row['email'];
                  $phone = $row['phone'];
                  $address = $row['baddress'];
                  $title = $row['title'];
                  $branch = $row['branch'];
                  $bankurl = $row['sname'];
                      $wl = $row['wl'];
                  $rb = $row['rb'];
       $ids = $row['id'];
          $cy = $row['cy'];
       
         $init = $row['hea'];
		     $act = $row['act'];
		    
                  $pre  = $row['inert'];
                   $jso  = $row['jso'];
                }else{
                     $ids = '';
                    $name = '';
                    $logo = '';
                    $emaila = '';
                    $phone = '';
                    $address = '';
                    $title = '';
                    $branch = '';
                    $bankurl = '';
                    $wl = '';
                    $rb = '';
                    $cy = '';
                    
                        $init = '';
			  $pre = '';
			   $act = '';
			   
			      $jso  = '';
			       $api  = '';
                  $eapi  = '';
        }

?>