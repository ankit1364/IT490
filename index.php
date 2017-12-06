<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="/favicon.png" type="image/png">
	<link rel="shortcut icon" type="image/png" href="http://web.njit.edu/~aps64/it490/flight-ico.png" />    
    
	<title>WRONG WAY AIRLINES</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/img.css" rel="stylesheet">


</head>



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
					<li class="active">
                        <a href="index.php"> Home <span class="glyphicon glyphicon-home"></span></a>
                    </li>
                    <li>
                        <a href="admin.php"> Admin <span class="glyphicon glyphicon-user"></span></a>
                    </li>
                    <li>
                        <a href="#openModal"> Contact <span class="glyphicon glyphicon-envelope"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
     </div>
    </nav>

   <div class="container" style="width:70%; margin-left:auto;margin-right:auto;">
        <div class="jumbotron">  
                <div class="row">
				
                    <div class="title" align="center">Welcome to Wrong Way Airline </div>
					<br><br><br>
					
					
					<form action="track.php" method="post">
						
						<h4 align="right"><b> Track Your Cargo:<b>
						<input type="text" name="cargo" placeholder="Enter Cargo ID" minlength="4"
						maxlength="4" pattern="\d*"  title= "Numbers only" required />
					
						<input type="submit"  class="btn btn-primary"value="GO"> </h4>
					</form>
					
				</div>
				
				<br> <br><br><br><br><br>
				<div class="row">
					
						<form action="find.php" method="post">
												
							<label for="airport" ><h4 align="right"><b> Find Empty Flight : </b>
							<?php include 'dest.php'; ?> 
							<input type="submit" class="btn btn-primary"value="Find"> </h4>
						</form>
					
				</div>
          
			</div>
		</div>
		
		<div class="navbar navbar-default navbar-fixed-bottom navbar-md">
		
		<div class="container">
			
			<p class="navbar-text pull-right"><span class="glyphicon glyphicon-registration-mark"></span>
				<span class="glyphicon glyphicon-copyright-mark"> <b> 2017, Ankit Prajpati</b></p>
			
		</div>
	</div>
	
	<?php 
	
include ("modal.html");?>

   
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
