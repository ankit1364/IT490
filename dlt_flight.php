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


$flight= $_SESSION['flight']; 

$_SESSION["flight"] = "$flight";


$s= "Delete from `Flight` where `Flight Number`= '$flight'";
					($t = mysql_query($s) ) or die (mysql_error() );
				
unset($_SESSION['flight']);					
$Message = urlencode("Note: Data has been Deleted. 
						Plese click on Flight tab to clear this message.");
			
header("Location:flight.php?Message=".$Message);					


exit();
?>