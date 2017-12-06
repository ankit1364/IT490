<?php
include ("account.php") ;

$sq= "select * from Airports";

($t=mysql_query($sq)) or  print mysql_error() ;

echo "<select name=airport required>";		//Start menu
echo "<option value='' disabled selected>Select Destination</option>"; 
while  (   $r  =   mysql_fetch_array ( $t )  )		//Loop over rows $r of results $t
{
//Define values using dot operator
    echo   "<option  value =" .  $r [ "Airport Code" ] . " >";	
    echo   $r [ "Airport Name" ] ;				//Define visible menu choices
    echo   "</option>"  ;				//End option tag
}
echo "</select>";
?>