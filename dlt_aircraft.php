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


$tail= $_SESSION['tail']; 

$_SESSION["tail"] = "$tail";

$s= "Delete from `Aircraft` where `Tail Numbers`= '$tail'";
					($t = mysql_query($s) ) or die (mysql_error() );
				
unset($_SESSION['tail']);
	
$Message = urlencode("Note: Data has been Deleted. 
						Plese click on Aircraft tab to clear this message.");
			
header("Location:aircrafts.php?Message=".$Message);					


exit();
?>