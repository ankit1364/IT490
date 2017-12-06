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
	$flight= $_SESSION['flight'];

		
	$u_tail=$_POST["tailnum"];
	
	if ($u_tail == '')
	{
		$ut= "Select * from `Flight` where `Flight Number` = '$flight' ";
					($utl = mysql_query($ut) ) or die (mysql_error() ); 	
					while ($z = (mysql_fetch_array ($utl))  ) 
					{	$u_tail   =  $z["Operating Aircraft"] ;
					}
	}
	
	$u_crew =$_POST["crewid"];
	
	if ($u_crew == '')
	{
		$uc= "Select * from `Flight` where `Flight Number` = '$flight' ";
					($ucr = mysql_query($uc) ) or die (mysql_error() ); 	
					while ($w = (mysql_fetch_array ($ucr))  ) 
					{	$u_crew   =  $w["Air Crew"] ;
					}
		
	}
	
	
	$u_cargo = $_POST["skidid"];
	
	if ($u_cargo == '')
	{
		$uca= "Select * from `Flight` where `Flight Number` = '$flight' ";
					($ucg = mysql_query($uca) ) or die (mysql_error() ); 	
					while ($p = (mysql_fetch_array ($ucg))  ) 
						
					{	
					$u_cargo   =  $p["Cargo ID"] ;
					}
		
	}
	
	
	$a = "update `Flight` SET `Operating Aircraft`= '$u_tail', `Air Crew`= '$u_crew' , 
		`Cargo ID`= '$u_cargo' where `Flight Number` = '$flight'";
	
	($y = mysql_query($a) ) or die (mysql_error() ); 
	
$Message = urlencode("Note: Data has been updated. 
						Plese click on Flight tab to clear this message.");
header("Location:flight.php?Message=".$Message);
die;	
//header("Location: aircrafts.php");
unset($_SESSION['flight']);	
exit();	

 }
 
$flight = $_SESSION['flight']; 
$_SESSION["flight"] = "$flight";

					$s= "Select * from `Flight` where `Flight Number` = '$flight' ";
					($t = mysql_query($s) ) or die (mysql_error() ); 	
					while ($x = (mysql_fetch_array ($t))  ) 
					{	$aircraft   =  $x["Operating Aircraft"] ;
						$crew    	=  $x["Air Crew"] ;
						$from	 	=  $x["Departure"];
						$to      	=  $x["Destination"] ;
						$dtime    	=  $x["Departure Time"] ;
						$atime	 	=  $x["Arrival Time"];
						$cargo   	=  $x["Cargo ID"] ;
						$status    	=  $x["status"] ;
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
			<div class="subtitle" align="center"><u>Update Flight Details</u></div><br>
					<form action="edit_flight.php" method="post">
					
								
                    <div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					
					<label class="reg"> Flight Number: </label> <strong><?php echo $flight; ?></strong>
					
					</div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Aircraft: </label><strong><?php echo $aircraft; ?></strong>
					<?php
					
						include("list_tailnum.php"); 
					
					?>
					
					
					
					<!--<input type="text" name="type" maxlength="4" minlength="4" autofocus
						pattern="[d{4}" title="Begin with 1 Uppercase letter followed by 3 digits Eg. B123"
							value="<?php echo htmlspecialchars($aircraft); ?>" required> -->
					</div>
					<br><br>
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Crew: </label><strong><?php echo $crew; ?></strong>
												
					<?php include("list_crewid.php"); ?>
				
						
					</div>
									
					<br><br>	
					<div class="col-xs-4 col-lg-7" ></div>
					<div class="col-xs-8 col-lg-5" >
					<label class="reg"> Cargo: </label><strong><?php echo $cargo; ?></strong>
					
					<?php include("list_cargo.php");?>
					</div>
					<br><br>	
										
					<div class="col-xs-8 col-lg-9" ></div>
					<div class="col-xs-4 col-lg-3" >
					<label for="mySubmit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span></label>
					<input id="mySubmit" type="submit" name="submit" value="Go" class="hidden" />
					</div>
					
					</form>
				<a href="flight.php" class="btn btn-lg btn-primary pull-left" title="Back">
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