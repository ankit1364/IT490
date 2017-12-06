
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
	$tail=$_POST["tail"];
	$type=$_POST["type"];
	$fuel=$_POST["fuel"];
	
	
	
			$s= "Select * from `Aircraft` where `Tail Numbers` = '$tail'";
			($t = mysql_query($s) ) or die (mysql_error() ); 	
				
				if(mysql_num_rows($t)>0)
				{  
     
				$Message = urlencode("Tail # ".$tail."has been alredy used. Please use another ID");
				header("Location:add_aircraft.php?Message=".$Message);
				die;	
				}
			else{  
				
		
			$a = "INSERT INTO `Aircraft` (`Tail Numbers`, `Aircraft Type`, `Fuel Amount` ) VALUES
						('$tail', '$type', '$fuel')";
			($y = mysql_query($a) ) or die (mysql_error() ); 
	
			
$Message = urlencode("Note: Data has been updated. 
						Plese click on Aircraft tab to clear this message.");
//header("Location:aircrafts.php?Message=".$Message);
//die;	


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
			<div class="subtitle" align="center"><u>Add Aircraft</u></div><br>
				
				<?php	
				if(isset($_GET['Message']))
				{
				$msg = $_GET['Message'];
				echo "<div align='center' class='msg'>".$msg."</div>";
				}
				?>
					<form action="add_aircraft.php" method="post">
					
								
                    <div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					
					<label class="reg"> Tail Number: </label> 
					<input type="text" id="tail" name="tail" placeholder="Enter Tail #" minlength="5"
						maxlength="5" pattern="\d*"  title= "Numbers only" required />
						<span id="result"></span>
					
					</div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Aircraft Type: </label>
					<input type="text" name="type" maxlength="4" minlength="4" autofocus 
						placeholder="eg. B999" pattern="[A-Z]{1}\d{3}" 
							title="Begin with 1 Uppercase letter followed by 3 digits Eg. B123"	required></div>
						
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Fuel Amount: </label>
					<input type="text" name="fuel" maxlength="5" placeholder="Fuel Tank Capacity"
						minlength="5" pattern="\d*"  title= "Numbers only" required></div>
					<br><br>
					
					<div class="col-xs-8 col-lg-9" ></div>
					<div class="col-xs-4 col-lg-3" >
					<label for="mySubmit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span></label>
					<input id="mySubmit" type="submit" name="submit" value="Go" class="hidden" />
					</div>
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