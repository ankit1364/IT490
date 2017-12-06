
<?php
include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $user, $pwd ) )
	        or    die ( "Unable to connect to MySQL database" );
//print "Connected to MySQL<br>";
mysql_select_db( $project ); 

$sq= "SELECT `Tail Numbers` FROM `Aircraft` WHERE not exists(select `Operating Aircraft` from `Flight` where `Aircraft`.`Tail Numbers` = `Flight`.`Operating Aircraft` )";

($t=mysql_query($sq)) or  print mysql_error() ;

echo "<select name=tailnum>";		//Start menu
echo "<option selected></option>"; 
while  (   $r  =   mysql_fetch_array ( $t )  )		//Loop over rows $r of results $t

{
//Define values using dot operator
    echo   "<option  value =" .  $r [ "Tail Numbers" ] . " >";	
    echo   $r [ "Tail Numbers" ] ;				//Define visible menu choices
    echo   "</option>"  ;				//End option tag
}
echo "</select>";
?>