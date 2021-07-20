
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
		input{
			color: #000; 
			border: 1px solid #000;
			padding: 12px 20px;
			border-radius: 10px;
			cursor: pointer;

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
		.select-css {
			
			
			font-size: 16px;
			font-family: sans-serif;
			font-weight: 700;
			color: #444;
			line-height: 1.3;
			padding: .6em 1.4em .5em .8em;
			width: 40;
			max-width: 40%; 
			position : relative;
			
			box-sizing: border-box;
			margin: 0;
			border: 1px solid #aaa;
			box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
			border-radius: .5em;
			-moz-appearance: none;
			-webkit-appearance: none;
			appearance: none;
			background-color: #fff;
			
			
		}
		.select-css::-ms-expand {
			display: none;
		}
		.select-css:hover {
			border-color: #888;
		}
		.select-css:focus {
			border-color: #aaa;
			box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
			box-shadow: 0 0 0 3px -moz-mac-focusring;
			color: #222; 
			outline: none;
		}
		.select-css option {
			font-weight:normal;
			
		}
		.container{
			box-shadow: 5px 5px 5px 5px gray;
			padding: 20px;
			margin-top: 50px;
			width: 40%;
			border-radius: 5%;
			background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  );
		}
		.block{
			display: inline-block;
			width: 50%;
		}
       
	   .ul{
		   
		list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
	   }
		.li{
			float: left;
		}
		.shift{
	  left:87%;
	  position: relative;
	  width:130px;
  }

  @media screen and (max-width: 780px) {
	  .shift{
		left:10%;
		margin:8px;
	  }
  }
  
	</style>
 </head>
 <body style="background-image:url(images/criscros.jpg); background-size: no-repeat; margin: 0;" >
<div>
	<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
	</div>
	<h1 align="center" >
		Statistics
	</h1>
	<h3 align="center">
		Add Filters
	</h3>
	<div class="ul" >
	<form action="?" method="post">
		<div class="block">
		<label class="li" >Branch :</label>
 		<input type="checkbox" name="branchCheck" checked="" onclick="myFunction()" value="1">
 		

		<div  class="contain" id="myDIV">

		<select class="select-css"name="branch" >
			<option disabled="">B.Tech</option>
			<option value="0">All</option>
			<option value="1">CE</option>
			<option value="2">ME</option>
			<option value="3">EE</option>
			<option value="4">ECE</option>
			<option value="5">CSE</option>
			<option value="6">EIE</option>
			<option value="7">MTech</option>
			<option value="8">MBA</option>
		</select>
		</div>
		</div>
		<div class="block">
		
		<label class="li" >Date :</label>
 		<input type="checkbox" name="date" checked="" onclick="myFunction1()" value="1">
 		
		<div class="contain li" id="myDIV1">

			<label>Start Date :</label>
			<input type="date" name="s_date">
			<label>End Date :</label>
			<input type="date" name="e_date">

		</div>
		<input  class="li shift"  type="submit" name="submit" value="Search">
	</div>
	</form>
	</div>

	<div class="table-responsive">
	<table class="table">
		<thead style="background:#383736; color: white; ">
		<th>Drive ID</th>
		<th>Scholar ID</th>
		<th>Drive Date</th>
		<th>Company</th>
		<th>Package</th>
		</thead>		
				
<?php 
error_reporting(0);
include 'connection.php';
session_start();

if (isset($_POST['submit'])) {

	if ($_POST['branchCheck'] && $_POST['date']) {
		# code...
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
				if ($driveDate>=$start&&$driveDate<=$end) {
					# code...
					?>
						<tr>
				<td><?php echo $row2['DriveID']; ?></td>
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
		# code...
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
				<td><?php echo $row2['DriveID']; ?></td>
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
				<td><?php echo $row2['DriveID']; ?></td>
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
 </body>
 </html>