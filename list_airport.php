<?php
include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $user, $pwd ) )
	        or    die ( "Unable to connect to MySQL database" );
//print "Connected to MySQL<br>";
mysql_select_db( $project ); 

$sq= "select * from Airports";

($t=mysql_query($sq)) or  print mysql_error() ;

echo "<select name='from_airport' required>";		//Start menu
echo "<option selected></option>"; 
while  (   $r  =   mysql_fetch_array ( $t )  )		//Loop over rows $r of results $t
{
//Define values using dot operator
    echo   "<option  value =" .  $r [ "Airport Code" ] . " >";	
    echo   $r [ "Airport Name" ] ;				//Define visible menu choices
    echo   "</option>"  ;				//End option tag
}
echo "</select>";
?>