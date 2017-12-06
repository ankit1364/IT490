
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
	$cid = $_POST["cid"];
	$pilot = $_POST["pilot"];
	$navi =$_POST["navi"];
	
	
	
			$s= "Select * from `Aircrew` where `Crew ID` = '$cid'";
			($t = mysql_query($s) ) or die (mysql_error() ); 	
				
				if(mysql_num_rows($t)>0)
				{  
     
				$Message = urlencode("Crew ID # ".$cid."has been alredy used. Please use another ID");
				header("Location:add_crew.php?Message=".$Message);
				die;	
				}
			else{  
				
		
			$a = "INSERT INTO `Aircrew` (`Crew ID`, `Pilot Name`, `Navigator Name` ) VALUES
						('$cid', '$pilot', '$navi')";
			($y = mysql_query($a) ) or die (mysql_error() ); 
	
			
$Message = urlencode("Note: Data has been updated. 
						Plese click on Crew tab to clear this message.");
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
			<div class="subtitle" align="center"><u>Add Crew Members</u></div><br>
				
				<?php	
				if(isset($_GET['Message']))
				{
				$msg = $_GET['Message'];
				echo "<div align='center' class='msg'>".$msg."</div>";
				}
				?>
					<form action="add_crew.php" method="post">
					<table align="center">
					<tr>                    					
					<td><label class="reg"> Crew ID:</label> </td>
									
					<td><input type="text" id="cid" name="cid" placeholder="Enter Crew ID" minlength="3"
						maxlength="3" pattern="\d*"  title= "Numbers only" required autofocus />
						<span id="result"></span>
					</td>	
					</tr>
					
					<tr>
					<td><label class="reg"> Pilot Name: </label></td>
					<td><input type="text" name="pilot" required></td>
					
					<tr>
					<td><label class="reg"> Navigator Name: </label></td>
					<td><input type="text" name="navi" required></td>
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
	
		</body>			
					
		</html>		