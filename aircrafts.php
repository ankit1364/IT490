
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
		$tail=$_POST["tail"];
		$_SESSION["tail"] = "$tail";
		header('Location:http://web.njit.edu/~aps64/it490/edit_aircraft.php');
		
	}
	
		if(isset($_POST['delete']))
	{
		$username= $_SESSION['username'];
		$tail=$_POST["tail"];
		$_SESSION["tail"] = "$tail";
		header('Location:http://web.njit.edu/~aps64/it490/dlt_aircraft.php');
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
				
                    <div class="title" align="center">Wrong Way Airline </div>
					<br>
					<div class="subtitle" align="center"><u>Aircrafts</u></div><br>
			
<?php			if(isset($_GET['Message'])){
				$msg = $_GET['Message'];
				echo "<div align='center' class='msg'>".$msg."</div>";
}?>
	<a class="btn btn-lg btn-success pull-right" 	title="Add Data" onclick="popup()">
				<span class="glyphicon glyphicon-plus"></span></a>
					
	
			<br>
			
			<form action="aircrafts.php" name="aircraft" method="post">
  
				<table id="myTable" class="tblcss">
				<thead>
				<tr>
				<th>Select</th>
				<th>Tail Number</th>
				<th>Aircraft Type</th>
				<th>Fuel</th>
				</tr>
				</thead>
				
				<tbody>
				<?php
					$s= "Select * from `Aircraft`";
					($t = mysql_query($s) ) or die (mysql_error() ); 	
					while ($x = (mysql_fetch_array ($t))  ) 
					{		
						$tail	 =  $x["Tail Numbers"];
						$type   =  $x["Aircraft Type"] ;
						$fuel    =  $x["Fuel Amount"] ;
					
						
						echo "<tr>";
						$q = "Select * from `Flight` where `Operating Aircraft` = '$tail'";
						$x = mysql_query ($q);
						$cnt = mysql_num_rows ($x);
	
						if ($cnt > 0 )
							echo "<td><input type='radio' name='tail' value=$tail 
										title='Allocated to Flight. Can not Edit/Delete' disabled></td>";
						else
							echo "<td><input type='radio' name='tail' value=$tail required></td>";
							echo "<td> $tail </td>";
							echo "<td> $type</td>";
							echo "<td> $fuel</td>";
							echo "</tr>";
					}
				
					?>
				</tbody>
				
				<tfoot class="foot">
				<tr>
				<th>Select</th>
				<th>Tail Number</th>
				<th>Aircraft Type</th>
				<th>Fuel</th>
				</tr>
				</tfoot>
				
				
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
	
	<!--<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js>"></script>-->

	
	
		<script type="text/javascript" charset="utf8">
		
		$(document).ready(function(){
			$('#myTable').dataTable({ aLengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20,25]],
			language: {
            lengthMenu:"Showing _MENU_ Entries",
            info: "Showing Page _PAGE_ of _PAGES_",
            infoEmpty:"No records available",
			        },
			dom: 'Bfrtip',
			buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
					
			
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
		window.open ("http://web.njit.edu/~aps64/it490/add_aircraft.php",
	"mywindow","menubar=0,resizable=1,width=700,height=500");
	}
	
	
	

	
	
	
		/*function popWindow(wName)
		{
			features = 'width=900, height=600, toolbar=no, location=no, directories=no, menubar=no, scrollbars=no, copyhistory=no, resizable=yes ';
			pop = window.open('', wName, features);
			if(pop.focus) {pop.focus();}
			return true;
			
		}
		
		 $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
				
		*/
		
	
       
    </script>	
   
   
</body>

</html>