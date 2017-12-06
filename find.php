
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="shortcut icon" href="/favicon.png" type="image/png">
	<link rel="shortcut icon" type="image/png" href="http://web.njit.edu/~aps64/it490/flight-ico.png" />    
	

    <title>WRONG WAY AIRLINES</title>

    <!--
	Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!--<link href="css/it490.css" rel="stylesheet">-->
    <!-- Custom CSS -->
    <link href="css/img.css" rel="stylesheet">
    <!-- Fonts -->
    

   
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
                    <li>
                        <a href="index.php"> Home <span class="glyphicon glyphicon-home"></span></a>
                    </li>
                    <li>
                        <a href="#openModal"> Contact <span class="glyphicon glyphicon-envelope"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
     </div>
    </nav>

   <div class="container" style="margin-left:auto;margin-right:auto;">
          
        <div class ="jumbotron">
					<div class="title" align="center">Wrong Way Airline </div><br>
                    <h2 align="center">Flight Details </h2>
					<br>
					<?php

				include ("account.php") ;

				$code =$_POST["airport"];
				$c ="SELECT * from Airports where '$code'= `Airport Code`";
				($a=mysql_query($c)) or  print mysql_error() ;
				
				$fetch= mysql_fetch_array($a);
				$name = $fetch['Airport Name'];
				
				$sql="SELECT * from Flight where '$code'= `Destination`  and (`Cargo ID` = NULL or `Cargo ID`=0)";
				($t=mysql_query($sql)) or  print mysql_error() ;
			
			if (mysql_num_rows($t)<1)
			{
				echo "<h4 align='center' style='color:red;'>Sorry, No Flight found for your Destination:</h4>
						<h4 align='center' style='color:blue;'>".$name."</h4>";
				?>
				<br><h4 align="center"><a class="btn btn-primary"
					href="http://web.njit.edu/~aps64/it490/index.php" value="Back"> Back</a> </h4> 
				<?php
				exit();
			}
			else
				echo "<h4 align='center' style='color:green;'>Information for available Flight for:</h4>
							<h4 align='center' style='color:blue;'>".$name."</h4><br>";
			{
				?>
			<table class='table'><thead><tr>
				<th>Flight #</th>
				<th>Aircraft</th>
				<th>From</th>
				<th>To</th>
				<th>Dept Time</th>
				<th>Arrival Time</th></tr></thead>
			
			<tbody><tr>
			<?php
				$r= mysql_fetch_array($t);
				
				print "<td>".$r["Flight Number"]."</td>";
				print "<td>".$r["Operating Aircraft"]."</td>";
				print "<td>".$r["Departure"]."</td>";
				print "<td>".$r["Destination"]."</td>";
				print "<td>".$r["Departure Time"]."</td>";
				print "<td>".$r["Arrival Time"]."</td>";
								
			}	
			echo "</tr></tbody></table>";
			


?>					                    
		<br><h4 align="center"><a class="btn btn-primary" 
			href="http://web.njit.edu/~aps64/it490/index.php" value="Back"> Back</a> </h4> 
		
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
include ("modal.html");?>

    <!-- <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright 2015</p>
                </div>
            </div>
       
    </footer> -->

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
