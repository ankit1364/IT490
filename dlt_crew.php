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


$cid= $_SESSION['cid']; 

$_SESSION["cid"] = "$cid";

$s= "Delete from `Aircrew` where `Crew ID`= '$cid'";
				($t = mysql_query($s) ) or die (mysql_error() );
				
					
$Message = urlencode("Note: Data for ID: ".$cid." has been Deleted. 
						Please click on Crew tab to clear this message.");
unset($_SESSION['cid']);			
header("Location:crew.php?Message=".$Message);					


exit();
?>