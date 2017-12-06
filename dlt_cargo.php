<?php
session_start();

$username= $_SESSION['username'];
$_SESSION["username"] = "$username";

if ($username == '') 
{
	print "<script type='text/javascript'>
		alert('You are NOT Logged in!!');
		window.location='admin.php'</script>";
}

include ("account.php");


$sid= $_SESSION['sid']; 

$_SESSION["sid"] = "$sid";

$s= "Delete from `Cargo` where `Skid ID Number`= '$sid'";
					($t = mysql_query($s) ) or die (mysql_error() );
				

				
$Message = urlencode("Note: Data for ".$sid."has been Deleted. 
						Plese click on Cargo tab to clear this message.");
unset($_SESSION['sid ']);			
header("Location:cargo.php?Message=".$Message);					


exit();
?>