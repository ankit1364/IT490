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
$_SESSION["username"] = "$username";

if ($username == '') 
{
	print "<script type='text/javascript'>
		alert('You are NOT Logged in!!');
		window.location='admin.php'</script>";
}
	if(isset($_POST['edit']))
	{
		$username= $_SESSION['username'];
		$flight=$_POST["flight"];
		$_SESSION["flight"] = "$flight";
		header('Location:http://web.njit.edu/~aps64/it490/edit_flight.php');
		
	}
	
		if(isset($_POST['delete']))
	{
		$username= $_SESSION['username'];
		$flight=$_POST["flight"];
		$_SESSION["flight"] = "$flight";
		header('Location:http://web.njit.edu/~aps64/it490/dlt_flight.php');
	}
	
include ("account.php");
		
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
                        <a href="aircrafts.php"> Aircrafts <span class="glyphicon glyphicon-plane"></span></a>
                    </li>
                    <li>
                        <a href="cargo.php"> Cargo <span class="glyphicon glyphicon-folder-close"></span></a>
                    </li>
					<li>
                        <a href="crew.php"> Crew <span class="glyphicon glyphicon-user"></span></a>
                    </li>
					<li class="active">
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
				
                    <div class="title" align="center">Wrong Way Airline </div>
					<br>
					<div class="subtitle" align="center"><u>Flights</u></div><br>
					
					<?php	
		if(isset($_GET['Message'])){
		$msg = $_GET['Message'];
		echo "<div align='center' class='msg'>".$msg."</div>";
		}?>
		
		<a class="btn btn-lg btn-success pull-right" 	title="Add Data" onclick="popup()">
				<span class="glyphicon glyphicon-plus"></span></a><br>
			<form action="flight.php" method="post">
  
			<table id="myTable" class="tblcss">
				<thead>
				<tr>
				<th>Select</th>
				<th>Flight No.</th>
				<th>Tail No.</th>
				<th>Air Crew</th>
				<th>From</th>
				<th>To</th>
				<th>Dept. Time</th>
				<th>Arrival Time</th>
				<th>Cargo</th>
				<th>Status</th>
				</tr>
				</thead>
				
				<tbody>
				<?php
					$s= "Select * from `Flight`";
					($t = mysql_query($s) ) or die (mysql_error() ); 	
					while ($x = (mysql_fetch_array ($t))  ) 
					{		
						$flight	 	=  $x["Flight Number"];
						$aircraft   =  $x["Operating Aircraft"] ;
						$crew    	=  $x["Air Crew"] ;
						$from	 	=  $x["Departure"];
						$to      	=  $x["Destination"] ;
						$dtime    	=  $x["Departure Time"] ;
						$atime	 	=  $x["Arrival Time"];
						$cargo   	=  $x["Cargo ID"] ;
						$status    	=  $x["status"] ;
					
						
						echo "<tr>";
						echo "<td><input type='radio' name='flight' value='$flight' required></td>";
						echo "<td> $flight </td>";
						echo "<td> $aircraft</td>";
						echo "<td> $crew</td>";
						echo "<td> $from </td>";
						echo "<td> $to</td>";
						echo "<td> $dtime</td>";
						echo "<td> $atime </td>";
						echo "<td> $cargo</td>";
						echo "<td> $status</td>";
						echo "</tr>";
					}
				
					?>
				</tbody>
				
				<thead>
				<tr>
				<th>Select</th>
				<th>Flight No.</th>
				<th>Tail No.</th>
				<th>Air Crew</th>
				<th>From</th>
				<th>To</th>
				<th>Dept. Time</th>
				<th>Arrival Time</th>
				<th>Cargo</th>
				<th>Status</th>
				</tr>
				</thead>
				
				
			</table> 
					
				
				<label for="mySubmit" class="btn btn-lg btn-primary" title="Edit">
				<span class="glyphicon glyphicon-pencil"></span></label>
					<input id="mySubmit" type="submit" name="edit" value="Update" class="hidden" />
					
			<label for="myDelete"  class="btn btn-lg btn-danger pull-right" 
				       title="Delete"><span class="glyphicon glyphicon-trash"></span></label>
				<input  id="myDelete" type="submit" name="delete" value="Delete"
						class="hidden" />
		</form>
					
					
					
					
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
   
   
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
	
	 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>

	
	
<script type="text/javascript" charset="utf8">
		$(document).ready(function(){
			$('#myTable').dataTable({ aLengthMenu: [[5, 10, 15, 20, -1, "All"], [5, 10, 15, 20, "All"]],
			language: {
            lengthMenu:"Showing _MENU_ Entries",
            info: "Showing Page _PAGE_ of _PAGES_",
            infoEmpty:"No records available",
                }		
			
			});
		});
		
		$('#myTable')
			.addClass('table table-hover');
			
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
    });

	function popup()
	{
		window.open ("http://web.njit.edu/~aps64/it490/add_flight.php",
	"mywindow","menubar=0,resizable=1,width=1000,height=500");
	}

	
	</script>		
			
   
   
</body>


 <!-- jQuery
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript 
    <script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"> </script>
	<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

	<!-- Script to Activate the Carousel -->
    
	


</html>