<?php 
session_start();
$CurPageURL =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  

$_SESSION['present'] = "http://$CurPageURL";
error_reporting(0); ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<script type="text/javascript">
 		function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 		function myFunction1() {
  var x = document.getElementById("myDIV1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
 	<title>Statistics</title>
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
		<button align="center" style=" background-color:#366bd6;color: white;text-decoration:none;padding: 7px 20px;border: none;border-radius: 4px;cursor: pointer; margin: 10px;"><a style="color: white;text-decoration: none; "href="specialView.php" >Back</a>
		 </button>
		</div>
	</div>

<div class="container" style="margin-top: 20px;box-shadow: 5px 5px 5px 5px gray; text-align: center;">
	<h1 style="font-family: Algerian; ">
		Statistics
	</h1><hr>
	<h3>
		Add Filters
	</h3>
	<form action="?" method="post">
		<label>Branch :</label>
 		<input type="checkbox" name="branchCheck" <?php if($_POST['branchCheck']){echo 'checked=""';} ?> onclick="myFunction()" value="1">
 		</p>

<div id="myDIV" <?php if(!$_POST['branchCheck']){echo 'style="display: none;"';} ?>>

		<select name="branch" <?php echo $_POST['branch'];?>>
			<option disabled="">B.Tech</option>
			<option <?php if($_POST['branch']==0){echo "selected";}?> value="0">All</option>
			<option <?php if($_POST['branch']==1){echo "selected";}?> value="1">CE</option>
			<option <?php if($_POST['branch']==2){echo "selected";}?> value="2">ME</option>
			<option <?php if($_POST['branch']==3){echo "selected";}?> value="3">EE</option>
			<option <?php if($_POST['branch']==4){echo "selected";}?> value="4">ECE</option>
			<option <?php if($_POST['branch']==5){echo "selected";}?> value="5">CSE</option>
			<option <?php if($_POST['branch']==6){echo "selected";}?> value="6">EIE</option>
			<option <?php if($_POST['branch']==7){echo "selected";}?> value="7">MTech</option>
			<option <?php if($_POST['branch']==8){echo "selected";}?> value="8">MBA</option>
		</select>
</div>

		<label>Date :</label>
 		<input type="checkbox" name="date" <?php if($_POST['date']){echo 'checked=""';} ?> onclick="myFunction1()" value="1">
 		</p>
<div  id="myDIV1" <?php if(!$_POST['date']){echo 'style="display: none;"';} ?>>

		<label>Start Date :</label>
		<input type="date" name="s_date" value= <?php echo $_POST['s_date'];?>><br>
		<label>End Date :</label>
		<input type="date" name="e_date"value= <?php echo $_POST['e_date'];?>>

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
							<th>Scholar ID</th>
							<th>Drive Date</th>
							<th>Company</th>
							<th>Package</th>
		</thead>					
				
<?php 
error_reporting(0);
include 'connection.php';
if (isset($_POST['submit'])) {

	if ($_POST['branchCheck'] && $_POST['date']) {
		
		
		$sql2 = "SELECT * FROM placementdetails ORDER BY DriveID";
		$result2 = mysqli_query($con,$sql2); 
		while ($row2 = mysqli_fetch_assoc($result2)){
			$ScholarID = $row2['ScholarID'];
			$DriveID = $row2['DriveID'];
			$dept = (integer)(($ScholarID%10000)/1000) ;
			if ($_POST['branch']==$dept || $_POST['branch']==0) {
				$start = $_POST['s_date'];
				$end = $_POST['e_date'];
				$sql = "SELECT * FROM driveschedule WHERE ID = ".$row2['DriveID']."";
				$result = mysqli_query($con,$sql); 
				$row = mysqli_fetch_assoc($result); 
				$driveDate = $row['DriveDate'];
				if ($driveDate>=$start&&$driveDate<=$end) {
					# code...
					?>
						<tr>
				<td><form style="display: inline-block;color: white;" action="drivedescription.php" method="post" >
									<button class="accept_reject" name="description" value="<?php echo $row['ID'];?>" style="background: #434744;color: white;">Description</button>
								</form></td>
					<td><?php echo $row2['ScholarID']; ?></td>
					<td><?php echo $row['DriveDate']; ?></td>
					<td><?php echo $row['CompanyName']; ?></td>
					<td><?php echo $row['Package']; ?></td>
				</tr>
				
				<?php
	}
}
}
}

	else if ($_POST['date']) {
		
		$start = $_POST['s_date'];
		$end = $_POST['e_date'];
		
		$sql2 = "SELECT * FROM placementdetails ORDER BY DriveID";
		$result2 = mysqli_query($con,$sql2); 
		while ($row2 = mysqli_fetch_assoc($result2)){
			$ScholarID = $row2['ScholarID'];
			$DriveID = $row2['DriveID'];

				$sql = "SELECT * FROM driveschedule WHERE ID = ".$row2['DriveID']."";
				$result = mysqli_query($con,$sql); 

				$row = mysqli_fetch_assoc($result); 
				$driveDate = $row['DriveDate'];
				if ($driveDate>=$start&&$driveDate<=$end) {
					# code...
					?>
						<tr>
				<td><form style="display: inline-block;color: white;" action="drivedescription.php" method="post" >
									<button class="accept_reject" name="description" value="<?php echo $row['ID'];?>" style="background: #434744;color: white;">Description</button>
								</form></td>
					<td><?php echo $row2['ScholarID']; ?></td>
					<td><?php echo $row['DriveDate']; ?></td>
					<td><?php echo $row['CompanyName']; ?></td>
					<td><?php echo $row['Package']; ?></td>
				</tr>
				
					<?php
				}
	}
}
	else if ($_POST['branch']||$_POST['branch']==0) {
		$sql2 = "SELECT * FROM placementdetails ORDER BY DriveID";
		$result2 = mysqli_query($con,$sql2); 
		while ($row2 = mysqli_fetch_assoc($result2)){
			$ScholarID = $row2['ScholarID'];
			$DriveID = $row2['DriveID'];

			$dept = (integer)(($ScholarID%10000)/1000) ; 
			
			if ($_POST['branch']==$dept||$_POST['branch']==0) {
				# code...ec
				$sql = "SELECT * FROM driveschedule WHERE ID = ".$row2['DriveID']."";
				$result = mysqli_query($con,$sql); 
				$row = mysqli_fetch_assoc($result); 
			?>
			<tr>
				<td><form style="display: inline-block;color: white;" action="drivedescription.php" method="post" >
									<button class="accept_reject" name="description" value="<?php echo $row['ID'];?>" style="background: #434744;color: white;">Description</button>
								</form></td>
					<td><?php echo $row2['ScholarID']; ?></td>
					<td><?php echo $row['DriveDate']; ?></td>
					<td><?php echo $row['CompanyName']; ?></td>
					<td><?php echo $row['Package']; ?></td>
				</tr>
				
			<?php
			}
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