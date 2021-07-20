<html>
<head>
	<title>My Statistics</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		td{
			font-weight: 500;
			font-family: Verdana;
		}
		.btn:hover{
			opacity: 0.7;
		}
	</style>
</head>
	<body align="center" style=" margin: 0; background-image: url(images/criscros.jpg); background-size: cover;">
	<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; margin-bottom: 30px; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="student.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>
		

		<?php
		session_start();
		$ScholarID = $_SESSION['scholarID'];
		include 'connection.php';
		$sql = "SELECT * FROM studentstats WHERE ScholarID='$ScholarID'";
		$result = mysqli_query($con,$sql);
		$num = mysqli_num_rows($result);
		if($num==0){

		  echo '<div text-align ="centre" ><h3>No Statistics available</h3></div>';

		}
		else{
		$row = mysqli_fetch_assoc($result);
		$applied = explode(',',$row['applied']);

		$placed = explode(',',$row['placed']); ?>
		<div style="width: 80%; border-radius: 5px;
			background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #f0ede6, #ffffff  ); box-shadow: 5px 5px 5px 5px gray;"class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="text-align: center;">
					<h1 align="center" style="font-family: Algerian; border-radius: 15px; padding-top: 30px;">
	 				My Statistics
	 				</h1><hr>
					<div class="table-responsive">
					 	<table style="text-align: center;" class="table">
					 		<thead style="background:#383736; color: white; ">
					 			
					 		<tr>
					 		<th scope="col" style="text-align: center;">Sl No</th>
					 		<th scope="col" style="text-align: center;">Company Name</th>
					 		<th scope="col" style="text-align: center;">Date</th>
					 		<th scope="col" style="text-align: center;">Salary</th>
					 		<th scope="col" style="text-align: center;">Status</th>
					 		</tr>
					 		</thead>
					
					<?php
					 for($i=0; $i<sizeof($applied)-1; $i++)
					{ 
					    
					    $sql1 = "SELECT * FROM driveschedule WHERE ID='$applied[$i]'";
					    $row1 = mysqli_fetch_assoc(mysqli_query($con,$sql1));
					    
					    
					    ?>
					<tbody>
					 	
					 <tr>
					 	<td><?php echo $i+1; ?></td>
					 	<td ><?php echo $row1['CompanyName']; ?></td>
					 	<td ><?php echo $row1['DriveDate']; ?></td>
		                 <td ><?php echo $row1['Package']; ?></td>
					 	<!-- <td><form action="../guest_view.php" method="post"><button name="scholarID" value="">Visit</button></form></td> -->
					 	<?php 
					 	if (in_array($applied[$i],$placed)) {
					 		# code...
					 		echo "<td>Placed</td>";
					 	}else{
					 	    echo "<td>Applied</td>";
					 	}
					 	 ?>
					 </tr>

					 <?php 
					
					 	}
					echo " </tbody>
					 	</table>";


					}
					?>

					</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>