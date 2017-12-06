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
	$sid= $_SESSION['sid'];
	
	$u_weight=$_POST["weight"];
	$u_cont=$_POST["cont"];
	echo "<br>";
	
	$a = "update `Cargo` SET `Skid Weight`= '$u_weight', `Skid Contents`= '$u_cont' 
				where `Skid ID Number` = '$sid'";
	($y = mysql_query($a) ) or die (mysql_error() ); 
	
$Message = urlencode("Note: Data has been updated. 
						Plese click on Cargo tab to clear this message.");
header("Location:cargo.php?Message=".$Message);
die;	

unset($_SESSION['sid']);	
exit();	

 }


$sid= $_SESSION['sid']; 

echo $_SESSION["sid"] = "$sid";

				$s= "Select * from `Cargo` where `Skid ID Number` = '$sid'";
				($t = mysql_query($s) ) or die (mysql_error() ); 	
				
				while ($x = (mysql_fetch_array ($t))  ) 
					{		
						$sid 	 =  $x["Skid ID Number"];
						$weight  =  $x["Skid Weight"] ;
						$cont    =  $x["Skid Contents"] ;
				
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
					<li class="active">
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
			<div class="subtitle" align="center"><u>Update Cargo Details</u></div><br>
					<form action="edit_cargo.php" method="post">
					
					<input type="hidden" name="sid" value="<?php echo $sid; ?>"/>
					
                    <div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					
					<label class="reg"> Skid ID: </label> <strong><?php echo $sid; ?></strong>
					
					</div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Skid Weight: </label>
					<input type="text" name="weight" maxlength="4" minlength="4" autofocus
						pattern="\d*" title="Numbers Only"
							value="<?php echo htmlspecialchars($weight); ?>" required></div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Skid Contents: </label>
					<input type="text" name="cont" minlength="2" 
						value="<?php echo htmlspecialchars($cont); ?>"required></div>
					<br><br>
					
					<div class="col-xs-8 col-lg-9" ></div>
					<div class="col-xs-4 col-lg-3" >
					<label for="mySubmit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span></label>
					<input id="mySubmit" type="submit" name="submit" value="Go" class="hidden" />
					</div>
					</form>
				<a href="cargo.php" class="btn btn-lg btn-primary pull-left" title="Back">
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