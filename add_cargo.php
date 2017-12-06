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
	$sid=$_POST["sid"];
	$weight=$_POST["weight"];
	$cont=$_POST["cont"];
	
	
	
			$s= "Select * from `Cargo` where `Skid ID Number` = '$sid'";
			($t = mysql_query($s) ) or die (mysql_error() ); 	
				
				if(mysql_num_rows($t)>0)
				{  
     
				$Message = urlencode("Skid ID # ".$sid."has been alredy used. Please use another ID");
				header("Location:add_cargo.php?Message=".$Message);
				die;	
				}
			else{  
				
		
			$a = "INSERT INTO `Cargo` (`Skid ID Number`, `Skid Weight`, `Skid Contents` ) VALUES
						('$sid', '$weight', '$cont')";
			($y = mysql_query($a) ) or die (mysql_error() ); 
	
			
$Message = urlencode("Note: Data has been updated. 
						Plese click on Cargo tab to clear this message.");
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
			<div class="subtitle" align="center"><u>Add Cargo</u></div><br>
				
				<?php	
				if(isset($_GET['Message']))
				{
				$msg = $_GET['Message'];
				echo "<div align='center' class='msg'>".$msg."</div>";
				}
				?>
					<form action="add_cargo.php" method="post">
					<table align="center">
					<tr>                    					
					<td><label class="reg"> Skid ID:</label> </td>
									
					<td><input type="text" id="tail" name="sid" placeholder="Enter Skid ID" minlength="4"
						maxlength="4" pattern="\d*"  title= "Numbers only" required autofocus />
						<span id="result"></span>
					</td>	
					</tr>
					
					<tr>
					<td><label class="reg"> Skid Weight: </label></td>
					<td><input type="text" name="weight" maxlength="4" minlength="4" pattern="\d*" 
							title="Numbers Only" required></td>
					
					<tr>
					<td><label class="reg"> Contents: </label></td>
					<td><input type="text" name="cont" required></td>
					</tr>
					
					<tr>
					<td></td>
					<td><label for="mySubmit" class="btn btn-primary btn-lg pull-left"><span class="glyphicon glyphicon-floppy-disk"></span></label>
					<input id="mySubmit" type="submit" name="submit" value="Go" class="hidden" />
					</td></tr>
					</table>
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