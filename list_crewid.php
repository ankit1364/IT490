<?php
include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $user, $pwd ) )
	        or    die ( "Unable to connect to MySQL database" );
//print "Connected to MySQL<br>";
mysql_select_db( $project ); 

$sq= "SELECT `Crew ID` FROM `Aircrew` WHERE not exists(select `Air Crew` from `Flight` where `Aircrew`.`Crew ID` = `Flight`.`Air Crew` )";

($t=mysql_query($sq)) or  print mysql_error() ;

echo "<select name=crewid>";		//Start menu
echo "<option selected></option>"; 
while  (   $r  =   mysql_fetch_array ( $t )  )		//Loop over rows $r of results $t
{
//Define values using dot operator
    echo   "<option  value =" .  $r [ "Crew ID" ] . " >";	
    echo   $r [ "Crew ID" ] ;				//Define visible menu choices
    echo   "</option>"  ;				//End option tag
}
echo "</select>";
?>