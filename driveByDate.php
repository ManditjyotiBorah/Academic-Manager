
<?php 
	error_reporting(0);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	
 	<title>Drive Search</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<style>
 		.button {
					background-color: black;
					border: none;
					
					border-radius : 10px;
					color: white;
					padding: 7px 26px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 16px;
					margin: 4px 2px;
					-webkit-transition-duration: 0.4s; 
					transition-duration: 0.4s;
					cursor: pointer;
					}
					.button:hover {
					background-color: #ebe6e6; 
					text-decoration: none;
					font-weight:bold;
					color: black;
					border: 1px solid black;
					}
 		.container{
 			background: white;
 			/*margin-top: 20px;*/
 			padding-top: 20px;
 		}
 		input[type="checkbox"]{
 			height: 20px;
 			width: 20px;
 		}
 		input[type="date"], select{
 			font-size:1.4em;
 			text-decoration: none;
 			border-radius: 10px;
 			margin-bottom: 20px;
 		}
 		input[type=submit]{
			color:white;
			background-color: grey;
			padding: 12px 20px;
			border: 1px solid black;
			border-radius: 10px;
			cursor: pointer;
			
		}
		input[type=submit]:hover{
			color: black;
			background-color: white;
			padding: 12px 20px;
			border: 1px solid black;
			border-radius: 10px;
			cursor: pointer;
		}
		label{
			font-family: Times New Roman;
			font-size: 1.2em;
			font-weight: 600;
		}
 	</style>
 </head>

 <body style="background-image: url(images/light.jpg) ; 
 			background-size: cover; ">
 	<div class= "nav-bar" style="background-image: url(images/newspaper.jpg); 
 			background-size: cover;box-shadow: 5px 5px 5px 5px gray; ">
		
		<div style="margin-bottom: 0;" align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond; margin: 0;">National Institute of Technology, Silchar</h1></div>
		</div>
		<div style="background-image: url(images/newspaper.jpg); background-size: cover; margin-top: 0;">
		 <a  style="background-color:transparent;text-decoration:none;" href="student_coo.php" ><button class="button" style="position: relative; top:0px;left:20px;">
		Back
		</button></a>

		</div>
	</div>

<div class="container" style="margin-top: 20px;box-shadow: 5px 5px 5px 5px gray; text-align: center;">
	<h1 style="font-family: Algerian; ">
		search drive by date
	</h1><hr>
	
	<form action="?" method="post">
		

<div  id="myDIV1">

		<label>Start Date :</label>
		<input type="date" name="s_date" required="" value= <?php echo $_POST['s_date'];?>><br>
		<label>End Date :</label>
		<input type="date" name="e_date" required="" value= <?php echo $_POST['e_date'];?>>

</div>
	<br>
		<input type="submit" name="submit" value="Search">
		<hr>
	</form>
<div class="container">
<div class="table-responsive">
	<table class="table">
		<thead style="background:#383736; color: white; ">
							<th>Drive Link</th>
							<th>Drive Date</th>
							<th>Company</th>
							<th>Package</th>
							<th>View</th>
		</thead>					
				
<?php 
session_start();
$CurPageURL =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  

$_SESSION['present'] = "http://$CurPageURL";
if (isset($_POST['submit'])) {		
// error_reporting(0);
$start = $_POST['s_date'];
$end = $_POST['e_date'];
include 'connection.php';

		
				$sql = "SELECT * FROM driveschedule";
				$result = mysqli_query($con,$sql); 
				while($row = mysqli_fetch_assoc($result)){

				$driveDate = $row['DriveDate'];
				if ($driveDate>=$start&&$driveDate<=$end) {
					# code...
					?>
				<tr>
					<td><form style="display: inline-block;color: white;" action="drivedescription.php" method="post" >
									<button class="accept_reject" name="description" value="<?php echo $row['ID'];?>" style="background: #434744;color: white;">Description</button>
								</form></td>
					<td><?php echo $row['DriveDate']; ?></td>
					<td><?php echo $row['CompanyName']; ?></td>
					<td><?php echo $row['Package']; ?></td>
					<td><form action="Drive/driveindex.php" method="post"><input type="text" name="drive_id" value ='<?php echo $row['ID'];?>' style="display: none;"><input type="text" name="check123" value ="1" style="display: none;"><input type="submit" name="searchDrive" value="View"></form></td>
				</tr>
				
				<?php
				} 
				}
}

 ?>

	</table>
</div>
</div>
</div>
	<br>
	

 </body>
 </html>