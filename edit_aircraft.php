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
	$tail= $_SESSION['tail'];
	
	$u_tail=$_POST["utail"];
	$u_type=$_POST["type"];
	$u_fuel=$_POST["fuel"];
	echo "<br>";
	
	$a = "update `Aircraft` SET `Aircraft Type`= '$u_type', `Fuel Amount`= '$u_fuel' 
				where `Tail Numbers` = '$tail'";
	($y = mysql_query($a) ) or die (mysql_error() ); 
	
$Message = urlencode("Note: Data has been updated. 
						Plese click on Aircraft tab to clear this message.");
header("Location:aircrafts.php?Message=".$Message);
die;	
//header("Location: aircrafts.php");
unset($_SESSION['tail']);	
exit();	

 }


$tail= $_SESSION['tail']; 

echo $_SESSION["tail"] = "$tail";

				$s= "Select * from `Aircraft` where `Tail Numbers` = '$tail'";
				($t = mysql_query($s) ) or die (mysql_error() ); 	
				
				while ($x = (mysql_fetch_array ($t))  ) 
					{		
						$tail	 =  $x["Tail Numbers"];
						$type    =  $x["Aircraft Type"] ;
						$fuel    =  $x["Fuel Amount"] ;
				
					}
				
?>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
	 <div class="container">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-remove"></span>
													<span class="glyphicon glyphicon-road"></span>
													<span class="glyphicon glyphicon-plane"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="active">
                        <a href="aircrafts.php"> Aircrafts<span class="glyphicon glyphicon-plane"></span></a>
                    </li>
					<li>
                        <a href="cargo.php"> Cargo <span class="glyphicon glyphicon-folder-close"></span></a>
                    </li>
					<li>
                        <a href="crew.php"> Crew <span class="glyphicon glyphicon-user"></span></a>
                    </li>
					<li>
                        <a href="flight.php"> Flight <span class="glyphicon glyphicon-send"></span></a>
                    </li>
					<li>
                        <a href="logout.php"><span class="glyphicon glyphicon-off" title="Sign out"></span></a>
                    </li>
	            </ul>
            </div>
            <!-- /.navbar-collapse -->
     </div>
    </nav>
	
<div class="container" style="width:70%; margin-left:auto;margin-right:auto;">
    <div class="jumbotron">  
        <div class="row">
			<div class="subtitle" align="center"><u>Update Aircraft Details</u></div><br>
					<form action="edit_aircraft.php" method="post">
					
					<input type="hidden" name="utail" value="<?php echo $tail; ?>"/>
					
                    <div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					
					<label class="reg"> Tail Number: </label> <strong><?php echo $tail; ?></strong>
					
					</div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Aircraft Type: </label>
					<input type="text" name="type" maxlength="4" minlength="4" autofocus
						pattern="[A-Z]{1}\d{3}" title="Begin with 1 Uppercase letter followed by 3 digits Eg. B123"
							value="<?php echo htmlspecialchars($type); ?>" required></div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Fuel Amount: </label>
					<input type="text" name="fuel" maxlength="5" 
						minlength="5" pattern="\d*"  title= "Numbers only"
						value="<?php echo htmlspecialchars($fuel); ?>"required></div>
					<br><br>
					
					<div class="col-xs-8 col-lg-9" ></div>
					<div class="col-xs-4 col-lg-3" >
					<label for="mySubmit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span></label>
					<input id="mySubmit" type="submit" name="submit" value="Go" class="hidden" />
					</div>
					</form>
				<a href="aircrafts.php" class="btn btn-lg btn-primary pull-left" title="Back">
				<span class="glyphicon glyphicon-arrow-left"></span></a>	
			</div>
		</div>
	</div>				
	
	 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

		</body>			
					
		</html>		