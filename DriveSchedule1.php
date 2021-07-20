<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<title>Drive Scheduled</title>
	<style>
		table{
			background: #f0f5f1;
		}
		thead{
			background: #727572;
			color: white;
		}
		.btn:hover{
			background: #727572;
			color: white;
			font-size: 20px;
			transition: 0.5s ease;
		}
	</style>
</head>
<body>
	<div class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
			</div>
		</div>
	<hr>
	<div style="text-align: center;">
	<h1>Drive Schedule</h1>	
	<hr>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th style="padding-left: 10%;text-align: center;">Sl No</th>
					<th style="padding-left: 10%;text-align: center;">Drive ID</th>
					<th style="padding-left: 10%;text-align: center;">Drive Date</th>
					<th style="padding-left: 10%;text-align: center;">Company</th>
					<th style="padding-left: 10%;text-align: center;">Package</th>
				</tr>
			</thead>
		<?php 
			include 'connection.php';
			$sql = "SELECT * FROM driveschedule ORDER BY DriveDate";
			$result = mysqli_query($con,$sql);
			$i=1;
			while ($row = mysqli_fetch_array($result)) {
		 ?>
		 	<tbody>
		 		<tr>
		 			<td  style="padding-left: 10%;"><?php echo $i; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['ID']; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['DriveDate']; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['CompanyName']; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['Package']; ?></td >
		 		</tr>
		 	</tbody>
		 <?php 
		 $i++;
		}
		  ?>
		</table>
	</div>
 <p>
		<script type="text/javascript">
			function goback() {
				window.history.back();
			}
		</script>
		<button class="btn btn-secondary" onclick="goback()">Back</button>
	</p>
	</div>
</body>
</html>


