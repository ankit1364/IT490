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
	$cid= $_SESSION['cid'];
	
	
	$u_pilot=$_POST["pilot"];
	$u_navi=$_POST["navi"];
	echo "<br>";
	
	$a = "update `Aircrew` SET `Pilot Name`= '$u_pilot', `Navigator Name`= '$u_navi' 
				where `Crew ID` = '$cid'";
	($y = mysql_query($a) ) or die (mysql_error() ); 
	
$Message = urlencode("Note: Data has been updated for ID: ".$cid.". 
						Plese click on Crew tab to clear this message.");
header("Location:crew.php?Message=".$Message);
die;	
//header("Location: aircrafts.php");
unset($_SESSION['tail']);	
exit();	

 }


$cid= $_SESSION['cid']; 

echo $_SESSION["cid"] = "$cid";

				$s= "Select * from `Aircrew` where `Crew ID` = '$cid'";
				($t = mysql_query($s) ) or die (mysql_error() ); 	
				
				while ($x = (mysql_fetch_array ($t))  ) 
					{		
						$cid	 =  $x["Crew ID"];
						$pilot    =  $x["Pilot Name"] ;
						$navi    =  $x["Navigator Name"] ;
				
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
                    
                    <li>
                        <a href="aircrafts.php"> Aircrafts<span class="glyphicon glyphicon-plane"></span></a>
                    </li>
					<li>
                        <a href="cargo.php"> Cargo <span class="glyphicon glyphicon-folder-close"></span></a>
                    </li>
					<li class="active">
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
			<div class="subtitle" align="center"><u>Update Crew Details</u></div><br>
					<form action="edit_crew.php" method="post">
					
					<input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
					
                    <div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					
					<label class="reg"> Crew ID: </label> <strong><?php echo $cid; ?></strong>
					
					</div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Pilot Name: </label>
					<input type="text" name="pilot"  autofocus			
							value="<?php echo htmlspecialchars($pilot); ?>" required></div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					
					<label class="reg"> Navigator Name: </label>
					<input type="text" name="navi" 
						value="<?php echo htmlspecialchars($navi); ?>"required></div>
					<br><br>
					
					<div class="col-xs-8 col-lg-9" ></div>
					<div class="col-xs-4 col-lg-3" >
					<label for="mySubmit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span></label>
					<input id="mySubmit" type="submit" name="submit" value="Go" class="hidden" />
					</div>
					</form>
				<a href="crew.php" class="btn btn-lg btn-primary pull-left" title="Back">
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