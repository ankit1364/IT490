<?php
		 $name = $_REQUEST['name'];
				
		  $email = $_REQUEST['email'];
		
		  $phone = $_REQUEST['phone'];
		
		 $msg = $_REQUEST['msg'];
	
		
	$mail_body  =	 	 'From: ' 		 . $name .  "\r\n" .
						 'Email:' 		 . $email . "\r\n" . 
						 'Phone:' 		 . $phone . "\r\n\n" .
 										   $msg  ;

$to = "aps64@njit.edu, ankit1364@gmail.com";

$headers = 'From: Wrong Way Airline'; 

mail( $to, $sbjct, $mail_body, $headers );

		print "<script type='text/javascript'>
		alert('Email has been sent to Developers!!!');
		window.history.go(-1);
		
		</script>";

?>




