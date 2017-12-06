<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="/favicon.png" type="image/png">
	<link rel="shortcut icon" type="image/png" href="http://web.njit.edu/~aps64/it490/flight-ico.png" />    

    <title>WRONG WAY AIRLINES</title>

    <!--	Bootstrap CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
    <link href="css/img.css" rel="stylesheet">
</head>


<?php 

include ("account.php");

session_start();

	
		$username  = $_POST["username"]; 
		$password  = $_POST["password"];

		
if (($username != '') && ($password != ''))
{
	
			
	$s = "SELECT * FROM Admin WHERE ID = '$username' && Pass = '$password'";
	$t = mysql_query ($s);
	$cnt = mysql_num_rows ($t);
	
	if ($cnt == 0 )
	{
		print "<script type='text/javascript'>
		alert('Invalid Credentials!');
		window.location='admin.php'</script>";
	}


$_SESSION["username"] = "$username";


?>



<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
	 <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
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
                        <a href="aircrafts.php"> Aircraft <span class="glyphicon glyphicon-plane"></span></a>
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
                        <a href="logout.php"> Log Out <span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
	            </ul>
            </div>
            <!-- /.navbar-collapse -->
     </div>
    </nav>

   <div class="container" style="width:70%; margin-left:auto;margin-right:auto;">
        <div class="jumbotron">  
                <div class="row">
				
                    <div class="title" align="center">Wrong Way Airline </div>
					<br><br><br>
					
					
					
					
				</div>
          
			</div>
		</div>
		
		<div class="navbar navbar-default navbar-fixed-bottom navbar-md">
		
		<div class="container">
			
			<p class="navbar-text pull-right"><span class="glyphicon glyphicon-registration-mark"></span>
				<span class="glyphicon glyphicon-copyright-mark"> <b> 2015, Ankit Prajapati</b></p>
			
		</div>
	</div>
	
	<?php 
	
include ("modal.html");
?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    
$(document).ready(function(){
    $('#logout').mouseenter(function(){
        $('#ft').fadeOut('slow')
        });
	$('#logout').mouseleave(function(){
        $('#ft').fadeIn('slow')
        });
    }); </script>

</body>

</html>
<?php
	
}
	
	else 
	{
	print "<script type='text/javascript'>
		alert('You are NOT Logged in!!');
		window.location='admin.php'</script>";
	}	
	

	?>
	


