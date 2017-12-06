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
	
		
<style>
.modal { 
    overflow: auto;
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #ffe6cc;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
	font-size:17px;
	color:green;
	font-weight: 800;
}
h4
{
	color:red;
	
}

.info
{
	color:black;
	font-size: 15px;
}
ul.mylist
{
	list-style-type: circle;
}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

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
				<th>From</th>
				<th>To</th>
				<th>Cargo</th>
				<th>Details</th>
				
				</tr>
				</thead>
				
				<tbody>
				<?php
					$s= "Select * from `Flight`";
					($t = mysql_query($s) ) or die (mysql_error() ); 
						$i = 0;
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
						
						
						$a= "Select * from `Airports` where `Airport code` = '$from'";
					($b = mysql_query($a) ) or die (mysql_error() ); 	
					while ($f = (mysql_fetch_array ($b))  ) 
					{
						$fr = $f["Airport Name"];
					}
					
					$z= "Select * from `Airports` where `Airport code` = '$to'";
					($y = mysql_query($z) ) or die (mysql_error() ); 	
					while ($de = (mysql_fetch_array ($y))  ) 
					{
						$dest = $de["Airport Name"];
					}
					
					$c= "Select * from `Aircrew` where `Crew ID` = '$crew'";
					($cr = mysql_query($c) ) or die (mysql_error() ); 	
					while ($m = (mysql_fetch_array ($cr))  ) 
					{
						$pi = $m["Pilot Name"];
						$navi = $m["Navigator Name"];
					}
					
					$d= "Select * from `Aircraft` where `Tail Numbers` = '$aircraft'";
					($ar = mysql_query($d) ) or die (mysql_error() ); 	
					while ($ac = (mysql_fetch_array ($ar))  ) 
					{
						$tp = $ac["Aircraft Type"];
						
					}
					
						
						echo "<tr>";
						echo "<td><input type='radio' name='flight' value='$flight' required></td>";
						echo "<td> $flight </td>";
						echo "<td> $from </td>";
						echo "<td> $to </td>";
						if ($cargo != "")
							echo "<td> $cargo </td>";
						else
							echo "<td> Empty </td>";
						
						echo "<td> <button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal$i'>...</a>";
						echo "</td>";
						echo "</tr>";
					echo "<div class='modal fade' id='myModal$i' role='dialog'>";
					echo "<div class='modal-dialog'>";
					echo "<div class='modal-content'>";
							
					echo "<div class='modal-header'>";
							 echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>
							 <h4 class='modal-title'><u>FLIGHT INFO</u></h4>
						</div>";
							 echo "<div class='modal-body'>";
								echo "<ul class='mylist'>";
								echo "<li><div class='info'>Aircraft info: </div>". $aircraft."<span class='info'><i> Type</i>:</span> ".$tp."</li><br>";
								echo "<li><div class='info'>Pilot & Navigator: </div>".$pi."<span class='info'> <i>&</i> </span>". $navi. "</li><br>";
								echo "<li><div class='info'>Route: </div><span class='info'><i>From- </i></span>". $fr."<br><span class='info'><i> To- </i></span>".$dest. "</li><br>";
								echo "<li><div class='info'>Schedule: </div>".$dtime. "<span class='info'> &#8680; </span>".$atime."</li> <br>";
								echo "<li><div class='info'>Cargo: </div>".$cargo."</li><br>";
								echo "</ul>";
							echo "</div>";	
							
						echo "<div class='modal-footer'>
							<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
						</div>";	
							
					echo "</div>";							
					echo "</div>";
					echo "</div>";
					$i++;
					}	
					?>
				</tbody>
				
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