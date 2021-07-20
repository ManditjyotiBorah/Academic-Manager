<?php
session_start();
$scholarID = $_SESSION['scholarID'];
if (!$scholarID) {
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
		.btn-primary{
			margin: 1em;
			
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
			background-image: linear-gradient(to left, #d5dbda, #dfe8e7, #ffffff  );
			padding: 0 20px;
			border-radius: 8px;
		}
	</style>
</head>
<body>
	<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
			
		</div>
				<div align="center">
					<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background-color: #0077b0;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
					<a href="updatePersonal.php" style="text-decoration: none;color: white;font-size: 15px;">Update Personal Details</a>
					</button>
					<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background-color: #0077b0;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
						<a href="AcademicDetails.php" style="text-decoration: none;color: white;font-size: 15px;">View Academic Details</a>
						</button>
						<?php
							if ($year > 2) {
							# code...

							?>
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background-color: #0077b0;border-radius :10px ;padding-right:15px; margin-top: 5px;">
											
									<a href="InternshipDetails.php" style="text-decoration: none;color: white;font-size: 15px;">Internship Details</a>
							</button>
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:40px;background-color: #0077b0;border-radius :10px ;padding-right:40px; margin-top: 5px;">
											
										<a href="notification.php" style="text-decoration: none;color: white;font-size: 15px;">Notifications</a>
							</button>
							<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:40px;background-color: #0077b0;border-radius :10px ;padding-right:40px; margin-top: 5px;">
											
										<a href="mystats.php" style="text-decoration: none;color: white;font-size: 15px;">Statistics</a>
							</button>
							
							
						<?php 
						}
						?>
						<button style=" float: right; background-color:#366bd6;color: white;text-decoration:none;padding: 7px 20px;border: none;border-radius: 4px;cursor: pointer; "><a style="color: white;text-decoration: none;  right: 20px;"href="logout.php" >Log Out</a>
		 				</button>
			</div>
		</div>

	
	<div style="background-image: url(images/criscros.jpg); background-size: cover; " class="container-fluid">
	<h1 align="center" style="font-family: Algerian;  background-image: linear-gradient(to right,#0077b0, #83b8f7, #99c4f7, #bed8f7, #dae6f5, #e4f1f7  ); border-radius: 15px;">
	 		Student Details
	 	</h1>
		<div class= "contain" style="position: relative;border-radius: 10px;background-color: #dae0e3;width:70%;padding-bottom:15px;padding-left:15px;padding-right:15px; left:15%; box-shadow: 10px 10px 10px gray; opacity: 0.9;">
			<div class="row" style="position:relative;top:5%;left:5%">
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