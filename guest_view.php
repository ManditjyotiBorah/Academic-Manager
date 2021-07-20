<?php
error_reporting(0);
session_start();
$Type = $_SESSION['Type'];
$check = $_SESSION['check'];
if ($_POST['scholarID']) {
	# code...
$scholarID = $_POST['scholarID'];
}
else if ($_SESSION['scholarID']) {
	# code...
$scholarID = $_SESSION['scholarID'];
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
$_SESSION['scholarID'] = $scholarID;
include 'connection.php';
$sql = "SELECT * from students where ScholarID = ".$scholarID."";
$sql1 = "SELECT * from resumes where ScholarID = ".$scholarID."";
$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result);
if (!$row['ScholarID']) {
	# code...
        echo "<script>alert('Incorect ScholarID');</script>";

        echo "<script>window.location.href = 'student_coo.php';</script>";
	
}
$row1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<link rel="stylesheet" type="text/css" href="guest_view.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.text-styling{
			font-family:candara;
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
		.button {
					background-color: black;
					border: none;
					
					border-radius : 10px;
					color: white;
					padding: 10px 32px;
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
					color: black;
					font-weight:bold;
					border: 1px solid black;
					}

		.container{
			background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  );
			padding: 40px;
		}
	</style>
</head>
<body style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover;">
<div class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				
		</div>
		<?php 
		if ($_SESSION['academic']==1) {
			echo '<a  href="academicView.php" style="text-decoration: none;background-color: transparent;color: black;font-size: 20px;"><button class="button">Back</button></a>';
		}else{

					if ($Type == 1) {
						# code...
			echo '<a  href="student_coo.php" style="text-decoration: none;position: relative;background-color: transparent;color: white;font-size: 20px;"><button class="button">Back</button></a>';
					}
					else{	
			echo '<a  href="specialView.php" style="text-decoration: none;background-color: transparent;color: black;font-size: 20px;"><button class="button">Back</button></a>';
					} 
		}
		 ?>
		 <div align="center">
	
		
	<a  href="GuestAcademicDetails.php" style="text-decoration: none;background-color: transparent;color: black;font-size: 20px;"><button class="button">Academic Details</button></a>
	
	<?php  
if ($year > 2) {
	# code...

	?>
	<a href="GuestInternshipDetails.php" style="text-decoration: none;background-color: transparent;color: black;font-size: 20px;"><button class="button">Internship Details</button></a>
	
<?php 
	}
	 ?>

	
		<br>
		

</div>
 	

<hr>
<h1 style="text-align:center;">Student Details</h1>
	<div class= "container">
		<div class="row">
			<div class= "col-md-6 text-styling">
	<p>
	<b>	Scholar ID : </b>
	<?php echo $row['ScholarID'];?>
	</p>
	<p>
	<b>	Name:</b>
	<?php echo $row['Name'];?>
	</p>
	<p>
	<b>	Degree:</b>
	<?php echo $row['Degree'];?>
	</p>
	<p>
	<b>	Phone Number:</b>
	<?php echo $row['PhoneNumber'];?>
	</p>
	<p>
	<b>	Email ID:</b>
	<?php echo $row['EmailID'];?>
	</p>
	<p>
	<b>	Date of Birth:</b>
		<?php echo $row['DOB'];?> 
	
	</p>
	<p>
	<b>	Father Name:</b>
	<?php echo $row['FatherName'];?>
	</p>
	<p>
	<b>	Mother Name:</b>
	<?php echo $row['MotherName'];?>
	</p>
	<p>
	<b>	Permanent Address:</b>
	<?php echo $row['PermanentAddress'];?>
	</p>
	<p>
	<b>	Current Address:</b>
	<?php echo $row['CurrentAddress'];?>
	</p>
	<p>
	<b>	Department:</b>
	<?php echo $row['Department'];?>
	</p><p>
	<b>	Resume:</b>
	<a target="_blank" style="text-decoration: none;background-color: transparent;color: black;font-size: 20px;padding:0px;" href="<?php echo $row1['DefaultResume'];?>"><button class="button" style="padding-top:0px;padding-bottom: 0px;">Click Here</button></a>
	</p>
		
	</div>
	<div class="col-md-6" align="center">
		<div class="photo" >
			<img src="uploads/profilepic<?php echo $scholarID;?>.jpg" width="30%" height="30%">
		</div> 
		<div style="margin-top:10vh;">
            	<h3>
            		Adhaar Card
            	</h3>
            	<img class="currentimage" src="uploads/adhaar<?php echo $scholarID;?>.jpg" width="30%" height="30%">
		
            </div>
            <div style="margin-top:10vh;">
            	<h3>
            		PAN Card
            	</h3>
            	<img class="currentimage" src="uploads/pan<?php echo $scholarID;?>.jpg" width="30%" height="30%">
 		
            </div>
        </div>
</div>
</div>
<br>

	

</body>
</html>