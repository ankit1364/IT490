
<?php

$hostname	=	"sql1.njit.edu";			 
$user		=	"aps64";
$pwd		=	"myNjit1311";
$project	=	"aps64";

($dbh = mysql_connect($hostname, $user, $pwd) )
	or die("Unable to connect to MYSQL Database");
	
	mysql_select_db($project) or die("incorrect database name");
?>