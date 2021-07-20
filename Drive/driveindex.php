
<!DOCTYPE html>
<html>
<head>
	<title>Drive Index</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript">
	
	</script>
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
			box-shadow: 5px 5px 5px 5px gray;
			text-align: center;
			max-width: 50%;
		}
		.btn-block{
			max-width: 50%;
			align-items: center;
			margin: 1em auto;
		}
	</style>
</head>
<body style=" background-image: url(../images/newspaper.jpg);">
	<div class= "nav-bar" style=" background-image: url(../images/newspaper.jpg);">
		<div align= "center" ><img src="../images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
		<?php 
			session_start();
			error_reporting(0);
			if ($_POST['check123']) {
				?>
				
		<a  style="background-color:transparent;text-decoration:none;" href="../driveByDate.php" ><button class="button" style="position: relative; top:0px;left:20px;">
		Back
		</button></a>	
				<?php  
				}else{

				?>			
				<a  style="background-color:transparent;text-decoration:none;" href="../student_coo.php" ><button class="button" style="position: relative; top:0px;left:20px;">
		Back
		</button></a>
		<?php 
			}
		 ?>		 
	</div>
	<div>
		
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<hr>
				<?php
					include '../connection.php';
					if (isset($_POST['searchDrive']) || $_SESSION['drive_id']){
						$_SESSION['index'] = 123;
						if ($_POST['drive_id']) {
							# code...
			            $_SESSION['drive_id'] = $_POST['drive_id'];
						}
						$CurPageURL =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
						$_SESSION['present'] = "http://$CurPageURL";
			            $DriveID = $_SESSION['drive_id'];
			            $sql1 = "SELECT * FROM driveschedule WHERE ID = $DriveID";
						$result1 = mysqli_query($con,$sql1);
			            $row1 = mysqli_fetch_array($result1);
			            if (!$row1['DriveDate']){
							echo "<script>alert('Invalid DriveID');</script>";

			        	echo "<script>window.location.href = '../student_coo.php';</script>";				
								# code...
						}
							echo "<h2>Drive Date :".$row1['DriveDate']."</h2>";
							echo "<h2>Drive ID :".$DriveID."</h2>";
			        }
				?>
				<hr>
	
				<form action='accepted_list.php' method='post'>
				<button type='submit' class="btn btn-secondary btn-block" name='accepted_list'> Accepted List</button>
				</form>
				<form action='rejected_list.php' method='post'>
				<button type='submit' class="btn btn-secondary btn-block" name='rejected_list'> Rejected List</button>
				</form>
				<form action='noresponse_list.php' method='post'>
				<button type='submit' class="btn btn-secondary btn-block" name='noresponse_list'>No Response List</button>
				</form>
				<form action='view_placements.php' method='post'>
				<button type='submit' class="btn btn-secondary btn-block"  name='view_placements'>View Placements List</button>
				</form>
				<form action='../drivedescription.php' method='post'>
				<button type='submit' class="btn btn-secondary btn-block"  name='description' value="<?php echo $DriveID; ?>">Description</button>
				</form>

			</div>
		</div>
	</div>
	</div>
</body>
</html>
