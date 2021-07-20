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
	<title>
		Internship Details
	</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		#stat{
 			background: white;
 			padding: 20px;
 			margin: 20px 20%;
 		}
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
			margin: 30px auto;
			background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #f0ede6, #ffffff  );
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
		
		.value{
			font-size: 1.2em;
			padding: 0 20px;
			font-family: Comic Sans MS;
		}
		.label{
			font-family: Garamond;
			font-weight: 700;
			font-size: 1.2em;
		}
		.btn:hover{
			opacity: 0.7;
		}
	</style>
	
</head>
<body>
<body style="background-image: url(images/light.jpg) ; background-size: cover;">
	<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="student.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>
	<h1 align="center" style="margin-top: 30px; font-family: Algerian;  padding:2px;">
	 		Internship Details
	 	</h1>

<?php  

$ScholarID = $_SESSION['scholarID'];
include 'connection.php';
$sql = "SELECT * FROM internshipdetails WHERE ScholarID = $ScholarID AND Status = 1";
$result = mysqli_query($con,$sql);
$i = 1;
$values = 100;
	while($row = mysqli_fetch_assoc($result)){
$values = 0;
if ($row['CompanyName']) {
	
	$x=1;# code...
	$CompanyName = $row['CompanyName'];
	$Duration = $row['Duration'];
	$Location = $row['Location'];
	$oncampus = $row['Placement'];
	if ($oncampus==1) {
		# code...
		$Placement = "On-Campus";
	}else{
		$Placement = "Off-Campus";

	}
	$Certificate = $row['Certificate'];

}else{
	$x = 0;
}
?>

	
	<?php
	if ($x == 1) {
	  	# code...  
	?>
	<div class = "container" style="background-color: #f2f2f2;border-radius: 10px; width: 40%; padding-top:10px; padding-bottom: 10px;">
		<h1 align="center">
			Internship  <?php echo $i; ?>
		</h1>
		<hr>
		<p>
			<span class="label"> Scholar Id : </span><span class="value"><?php echo $ScholarID; ?></span>
		</p>
		<p>
			<span class="label"> Company Name : </span><span class="value"><?php echo $CompanyName; ?></span>
		</p>
		<p>
			<span class="label"> Duration : </span><span class="value"><?php echo $Duration; ?> months</span>
		</p>
		<p>
			<span class="label"> Location : </span><span class="value"><?php echo $Location; ?></span>
		</p>
		<p>
			<span class="label"> Placement : </span><span class="value"><?php echo $Placement; ?> </span>
		</p>
		<p align="center">
			<a target="_blank" href="<?php echo $Certificate; ?>"  style="background-color:grey;color: white;text-decoration:none;padding: 10px 20px;border: none;border-radius: 4px;cursor: pointer;" href="../student_coo.php">View Certificate</a>
		</p>
		
		</div>
		
	<?php 
	}
	else{

	 ?>
	 <h1>
	 	Details not Uploaded or Verification is Pending . . .
	 </h1>
	 <?php 
	 }
	 $i++;
	}
	if ($values) {
		# code...
		$sql1 = "SELECT * FROM internshipdetails WHERE ScholarID = $ScholarID AND Status = 0";
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_assoc($result1);

	 				
	 			if ($row1['CompanyName']) {
	 				# code...
	 			?>

					<div class="contain" style="background: lightcyan;border-radius: 15px;width:70%; position:relative;left:15%; opacity: 0.9">
	<div class="row">
		<div class="col-md-12 text-styling">
	 	<div>
	 	
	 		 			<div id="stat">
	 				<span class="status" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
    font-size: 2rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;">STATUS</span><hr>
	 				<h2 align='center' style="color: red;font-family: inherit; ">Sent for Verification . . .</h2>
	 			</div>
	 		 	</div>
	</div>
</div>
</div>
	 	<?php 
	 	 	}else{
	 	 		?>
	 			<div class="contain" style="background: lightcyan;border-radius: 15px;width:70%; position:relative;left:15%; opacity: 0.9">
	<div class="row">
		<div class="col-md-12 text-styling">
	 	<div>
	 	
	 		 			<div id="stat">
	 				<span class="status" style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
    font-size: 2rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;">STATUS</span><hr>
	 				<h2 style="color: red;font-family: inherit;">Details not Uploaded or Rejected</h2>
	 			</div>
	 		 	</div>
	</div>
</div>
</div>
			<?php  
			}
}
	  ?>
	 
	  
	</div>
	<p style="text-align: center;">
 	 	<button style="background-color:#434744; color: white;text-decoration:none;padding: 7px 20px;border: none;border-radius: 4px;cursor: pointer; margin-top: 20px;">
	  	<a style="color: white;text-decoration: none;"href="internDetailsUpload.php" >Upload Details</a>
	  </button>
	</p>
	</div>
</body>
</html>