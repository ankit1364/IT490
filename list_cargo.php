
<?php
include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $user, $pwd ) )
	        or    die ( "Unable to connect to MySQL database" );
//print "Connected to MySQL<br>";
mysql_select_db( $project ); 

$sq= "SELECT `Skid ID Number` FROM `Cargo` WHERE not exists(select `Cargo ID` from `Flight` where `Cargo`.`Skid ID Number` = `Flight`.`Cargo ID` )";

($t=mysql_query($sq)) or  print mysql_error() ;

echo "<select name='skidid'>";		//Start menu
echo "<option selected></option>"; 
while  (   $r  =   mysql_fetch_array ( $t )  )		//Loop over rows $r of results $t
{
//Define values using dot operator
    echo   "<option  value =" .  $r [ "Skid ID Number" ] . " >";	
    echo   $r [ "Skid ID Number" ] ;				//Define visible menu choices
    echo   "</option>"  ;				//End option tag
}
echo "</select>";
?>