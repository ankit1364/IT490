<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="/favicon.png" type="image/png">
	<link rel="shortcut icon" type="image/png" href="http://web.njit.edu/~aps64/it490/flight-ico.png" />    

    <title>WRONG WAY AIRLINES</title>

    <!--Bootstrap CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
    <link href="css/img.css" rel="stylesheet">
	
</head>
<?php 
session_start();
$username= $_SESSION['username'];
echo $_SESSION["username"] = "$username";

if ($username == '') 
{
	print "<script type='text/javascript'>
		alert('You are NOT Logged in!!');
		window.location='admin.php'</script>";
}


include ("account.php");


if(isset($_POST['submit']))
{
			
	$tail= $_POST["tailnum"];
	$crew= $_POST["crewid"];
	$from_airport= $_POST["from_airport"];
	$to_airport= $_POST["to_airport"];
	$deptime= $_POST["deptime"];
	$artime= $_POST["artime"];
	$cargo= $_POST["skidid"];
	
	if ($cargo == '')
	{
		$cargo = null;
	}
function randomString($length = 2) {
	$str = "";
	$characters = array_merge(range('A','Z'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}


function randomString1($length1 = 4) {
	$str1 = "";
	$characters1 = array_merge(range('0','9'));
	$max1 = count($characters1) - 1;
	for ($j = 0; $j < $length1; $j++) {
		$rand1 = mt_rand(0, $max1);
		$str1 .= $characters1[$rand1];
	}
	return $str1;
}

$flight=randomString() . randomString1();
	
			$s= "Select * from `Flight` where `Flight Number` = '$flight'";
			($t = mysql_query($s) ) or die (mysql_error() ); 	
				
				if(mysql_num_rows($t)>0)
				{  
     
				$Message = urlencode("Flight # ".$flight."has been alredy used. Please use another ID");
				header("Location:add_flight.php?Message=".$Message);
				die;	
				}
			else{  
			
			
				
		
			$a = "INSERT INTO `Flight` (`Flight Number`, `Operating Aircraft`, `Air Crew`, `Departure`, `Destination`,`Departure Time`,`Arrival Time`,`Cargo ID` ) VALUES
						('$flight', '$tail', '$crew','$from_airport', '$to_airport', '$deptime','$artime', '$cargo')";
			($y = mysql_query($a) ) or die (mysql_error() ); 
	
			
$Message = urlencode("Note: Data has been updated. 
						Plese click on Flight tab to clear this message.");
					
//header("Location:flights.php?Message=".$Message);
	

?>
<script type="text/javascript">
window.close();
window.onunload = function(){
  window.opener.location.reload();}
</script>


<?php
exit();	
 }
}
?>

<body>

	
<div class="container" style="width:70%; margin-left:auto;margin-right:auto;">
    <div class="jumbotron">  
        <div class="row">
			<div class="subtitle" align="center"><u>Add Flight</u></div><br>
				
				<?php	
				if(isset($_GET['Message']))
				{
				$msg = $_GET['Message'];
				echo "<div align='center' class='msg'>".$msg."</div>";
				}
				?>
					<form action="add_flight.php" method="post">
					
					<table>			
                    
					<tr>
					<td><label class="reg"> Tail Number: </label> </td>
					<td><?php include("list_tailnum.php"); ?>
						<span id="result"></span></td>
					</tr>
					
					<tr>
					<td><label class="reg"> Air Crew: </label></td>
					<td><?php include("list_crewid.php"); ?></td>
					</tr>
						
					<tr>
					<td><label class="reg"> From: </label></td>
					<td><?php include("list_airport.php"); ?></td>
					</tr>
					
					<tr>
					<td><label class="reg"> Destination: </label></td>
					<td><?php include("list_toairport.php"); ?></td>
					
					<tr>	
					<td><label class="reg"> Dept. Time: </label></td>
					<td><input type="Time" name="deptime" required></td>
					</tr>
					
					<tr>
					<td><label class="reg"> Arrival Time: </label></td>
					<td><input type="time" name="artime" required></td>
					</tr>
					
					<tr>
					<td><label class="reg"> Cargo: </label></td>
					<td><?php include("list_cargo.php"); ?></td>
					</tr>
					
					<tr><td></td>
					<td><label for="mySubmit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span></label>
					<input id="mySubmit" type="submit" name="submit" value="Go" class="hidden" />
					</td>
					</form>
			</div>
		</div>
	</div>				
	
	 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
<!--	<script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#tail").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_id_ajax(user_name);
        }, 1000);
    }); 

function check_id_ajax(username){
    $("#result").html('<img src="ajax-loader.gif" />');
    $.post('check_tail.php', {'tail':tail}, function(data) {
      $("#result").html(data);
    });
}
});
</script>-->
	
	
		</body>			
					
		</html>		