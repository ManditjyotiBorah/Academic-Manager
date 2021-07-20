<?php
session_start();
$scholarID = $_SESSION['scholarID'];
if (!$scholarID || $_SESSION['Type']!=0) {
        echo "<script>alert('Not Logged In');</script>";

        echo "<script>window.location.href = 'index.php';</script>";
	# code...
}
$year1 = (integer)(2000 +($scholarID/100000));
$refDate = $year1."-06-30";
$refDate = date_create($refDate);
$presentdate = date_create(date("Y-m-d"));
$diff = date_diff($refDate,$presentdate);
$days = $diff->format('%R%a');
if ($days<365) {
	# code...
	$year = 1;
}elseif ($days <(365*2)) {
	$year = 2;
	# code...
}elseif ($days <(365*3)) {
	$year = 3;
	# code...
}elseif ($days <(365*4)) {
	$year = 4;
	# code...
}
include 'connection.php';
$sql = "SELECT * from students where ScholarID = ".$scholarID."";
$sql1 = "SELECT * from resumes where ScholarID = ".$scholarID."";
$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result);
$row1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		.text-styling{
			font-family:sans-serif;
			font-size:1.1rem;
			line-height:7vh;
		}
		a{
			text-decoration:none;
			color:black;
		}
		a:hover{
			text-decoration: none;
		}
	
		.container{
			box-shadow: 5px 5px 5px 5px gray;
			border-radius: 2%;
		}
		.details{
			/*font-family: 'Roboto', sans-serif;*/
			/*font-family: 'Oswald', sans-serif;*/
			/*font-family: 'Lato', sans-serif;*/
			font-family: 'Times New Roman' ;
			font-weight:700;
			margin: 0;
			/*font-family: 'Open Sans', sans-serif;*/
		}
		span{
			background: white;
		}
		.value{
			font-size: 1.2em;
			background-image: linear-gradient(to right, #83b8f7, #99c4f7, #bed8f7, #dae6f5, #e4f1f7 , transparent );
			padding: 0 20px;
			border-radius: 8px;
		}
	</style>
</head>
<body style="background-image:url(images/light.jpg); background-size: cover;">
	<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
			
		</div>
				<div align="center">
					<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
					<a href="updatePersonal.php" style="text-decoration: none;color: white;font-size: 15px;">Update Personal Details</a>
					</button>
					<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
						<a href="AcademicDetails.php" style="text-decoration: none;color: white;font-size: 15px;">View Academic Details</a>
						</button>
						<?php
							if ($year > 2) {
							# code...

							?>
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736; border-radius :10px ;padding-right:15px; margin-top: 5px;">
											
									<a href="InternshipDetails.php" style="text-decoration: none;color: white;font-size: 15px;">Internship Details</a>
							</button>
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736; border-radius :10px ;padding-right:15px; margin-top: 5px;">
											
										<a href="internnotify.php" style="text-decoration: none;color: white;font-size: 15px;">Internship Drives</a>
							</button>
							<?php
							if ($year == 4) {
							# code...

							?>
							<?php if ($row['Jobs']==1) {
					
							 ?>
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736; border-radius :10px ;padding-right:15px; margin-top: 5px;">
											
										<a href="notification.php" style="text-decoration: none;color: white;font-size: 15px;">Notifications</a>
							</button>
							
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736; border-radius :10px ;padding-right:15px; margin-top: 5px;">
											
										<a href="mystats.php" style="text-decoration: none;color: white;font-size: 15px;">Statistics</a>
							</button>
						<?php } ?>
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736; border-radius :10px ;padding-right:15px; margin-top: 5px;">
											
										<a href="passwordChange.php" style="text-decoration: none;color: white;font-size: 15px;">Change Password</a>
							</button>
						<?php 
							$query = "SELECT * FROM placementdetails WHERE ScholarID = ".$scholarID."";
							$res = mysqli_query($con,$query);
							$checker = mysqli_num_rows($res);
							if ($checker) {
								?>
								<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background:#383736; border-radius :10px ;padding-right:15px; margin-top: 5px;">
											
										<a href="addExperience.php" style="text-decoration: none;color: white;font-size: 15px;">Add Experience</a>
							</button>
						<?php 
							}
						 ?>	
							
						<?php 
						}
					}
						?>
						<div>
							<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="logout.php"><button  style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 45%;"> LOG OUT</button></a>
						</div>
			</div>
		</div>

	
	<div style="margin-top: 30px;"  class="container-fluid">
	<h1 align="center" style="font-family: Algerian;">
	 		Student Details
	 	</h1>
		<div class= "contain" style="position: relative;border-radius: 10px;background-color: #dae0e3;width:70%;padding-bottom:15px;padding-left:15px;padding-right:15px; left:15%; box-shadow: 10px 10px 10px gray; opacity: 0.9;">
			<div class="row" style="position:relative; top:5%; left:5%">
			<div class= "col-md-6 text-styling">
			<!-- <img id="photo" src="uploads/profilepic<?php echo $scholarID;?>.jpg" width="20%" height="150px"> -->
			
			<p class="details info ">
			Scholar ID : 
			<div class="value"><?php echo $scholarID;?></div>
			</p>
			<p class="details info">
				Name:
			<div class="value"><?php echo $row['Name'];?></div>
			</p>
			<p class="details info">
				Degree:
			<div class="value"><?php echo $row['Degree'];?></div>
			</p>
			<p class="details info">
				Department:
			<div class="value"><?php echo $row['Department'];?></div>
			</p>
			<p class="details">
				Phone Number:
			<div class="value"><?php echo $row['PhoneNumber'];?></div>
			</p>
			<p class="details">
				Email ID:
			<div class="value"><?php echo $row['EmailID'];?></div>
			</p>
			<p class="details">
				Date of Birth:
				<div class="value"><?php echo $row['DOB'];?></div> 
			
			</p>
			<p class="details">
				Father Name:
			<div class="value"><?php echo $row['FatherName'];?></div>
			</p>
			<p class="details">
				Mother Name:
			<div class="value"><?php echo $row['MotherName'];?></div>
			</p>
			<p class="details">
				Permanent Address:
			<div class="value"><?php echo $row['PermanentAddress'];?></div>
			</p>
			<p class="details">
				Current Address:
			<div class="value"><?php echo $row['CurrentAddress'];?></div>
			</p>
			<?php if ($row['HigherStudies']) { ?>
			<p class="details">
				<b>Interested in Higher Studies</b>
				<br>
				Appeared :<div class="value">
					<?php echo $row['ExamsAppeared']; ?>
				</div>
				<?php if ($row['Performance']) { ?>
				<b>Performance :</b><div class="value">
					<?php echo $row['Performance']; ?>
					
				</div>
			<?php } ?>
			</p>
		<?php } ?>
			<p>
				<?php 
				if(!$row1['DefaultResume']){
				}
				else{
				
			echo 'Resume:<a target="_blank" disabled="" href="'.$row1["DefaultResume"].'"><span style="font-weight: 600; font-family: arial; font-size: 1.2em; text-decoration: underline; color: blue;">Click Here</span></a>';
				
				}
				?>
			</p>
			</div>
			<div class="col-md-6" align="center">
		
			<div style=" margin-top:5vh;">
            	<h5 style="font-weight: 700; font-family: Times New Roman">
            		Profile Photo
            	</h5>
            	<img class="currentimage" src="uploads/profilepic<?php echo $scholarID;?>.jpg" width="30%" height="30%">
		
            </div>
            
        </div>
		</div>
		
	</div>

	
	<br>
	<br>
</div>
</body>
</html>