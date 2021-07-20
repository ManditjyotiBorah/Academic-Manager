<?php 
session_start();
include 'connection.php';
$ScholarID = $_SESSION['scholarID'];
$sql = "SELECT * FROM academicdetails WHERE ScholarID = $ScholarID AND Status = 1";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$X = $row['X'];
$XII = $row['XII'];
$Semester1 = $row['Semester1'];
$Semester2 = $row['Semester2'];
$Semester3 = $row['Semester3'];
$Semester4 = $row['Semester4'];
$Semester5 = $row['Semester5'];
$Semester6 = $row['Semester6'];
$Semester7 = $row['Semester7'];
$Semester8 = $row['Semester8'];
$CPI = $row['CPI'];
$SemAppeared = 0;
if ($Semester1) {$SemAppeared++;}
if ($Semester2) {$SemAppeared++;}
if ($Semester3) {$SemAppeared++;}
if ($Semester4) {$SemAppeared++;}
if ($Semester5) {$SemAppeared++;}
if ($Semester6) {$SemAppeared++;}
if ($Semester7) {$SemAppeared++;}
if ($Semester8) {$SemAppeared++;}
 $reqCPI = $SemAppeared*(7-$CPI)/(8-$SemAppeared) + 7;
 if ($reqCPI>10) {
 	$reqCPI=10;
 }
 if ($reqCPI<7) {
 	$reqCPI=7;
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Academic Details</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<style>
 		.status{
 			
 			padding: 0 10px;
 			border-radius: 10%;
 			margin: 0 auto;
 			font-size: 2em;
 		}
 		#stat{
 			background: white;
 			padding: 20px;
 			margin: 20px 20%;
 		}
  		h2{
 			color: red;
 		}
 		.back{
 			position: fixed;
 			bottom: 10px;
 			left: 10px;
 			font-size: 30px;
 		}
 		.sem{
 			text-align: left;
 			margin: 5px;
 			font-size: 1.2em;
			background-image: linear-gradient(to right, #83b8f7, #99c4f7, #bed8f7, #dae6f5, #e4f1f7 , transparent );
			padding: 10px 30px;
			
			border-radius: 8px;

 		}
 		.sem:nth-child(odd){
 			background: #d7dbd8;
 		}
 		.contain{
 			box-shadow: 5px 5px 5px 5px gray;
 			border-radius: 2%;
 		}
 		.label{
 			font-family: Times New Roman;
 			font-weight: 700;
 		}
 		.value{
 			font-size: 1.2em;
			padding: 0 20px;
			border-radius: 8px;
 		}
 		.view{
 			float: right;
 			border-radius: 5px;
 			background: #434744;
 			transition: 0.5s ease opacity 0s;
 		}
 		.certificate{
 			color: white;
 			font-size: 0.7em;
 			font-weight: 500;
 			font-style: italic;
 			font-family: cursive ;
 		}
 		.view .certificate:hover{
 			color: white;
 			text-decoration: none;

 		}
 		.view:hover{
 			opacity: 0.5;
 		}
 	</style>
 </head>
 <body style="background-image: url(images/light.jpg) ; 
 			background-size: cover; ">
 	<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="student.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>
<div align="center">
	<br>
<h2 style="font-family: monospace;">Required SPI in next Semester to remain active for TNP activities is <?php echo $reqCPI; ?></h2>
</div>	
<div class= "contain" style="background: lightcyan;border-radius: 15px;width:70%; margin-top: 30px; position:relative;left:15%; opacity: 0.9">
	<div class="row">
		<div class= "col-md-12 text-styling">
	 	<div>
	 	<h1 align="center" style="font-family: Algerian;  padding:2px;">
	 		Academic Details
	 	</h1>
	 	<?php 
	 		$sql1 = "SELECT * FROM academicdetails WHERE ScholarID = $ScholarID AND Status = 0";
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_assoc($result1);
	 		if (!$X) {
	 			if ($row1['X']) {
	 				# code...
	 			?>
	 			<div id="stat">
	 				<span class="status">STATUS</span><hr>
	 				<h2>Verification is Pending . . .</h2>
	 			</div>
	 	<?php 
	 	 	}else{
	 	 		?>
	 			<span class="status">STATUS</span><hr>
	 			<h2>Details not Uploaded or Rejected</h2>
		<?php
			}
		}else{
	 	 ?>
		
	 	<p class="sem">
	 		<span class="label">Scholar Id :</span> <span class="value"><?php echo $ScholarID; ?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Class X Percentage :</span> <span class="value"><?php if(!$X==""){echo $X; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['XProof'].'">View Certificate</a></button>';}else{echo "Not Available";}?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Class XII Percentage :</span><span class="value"><?php if(!$XII==""){echo $XII; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['XIIProof'].'">View Certificate</a></button>';}else{echo "Not Available";}?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 1 :</span> <span class="value"><?php if(!$Semester1==""){echo $Semester1; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem1Proof'].'">View Certificate</a></button>';}else{echo "Not Available";}?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 2 :</span> <span class="value"><?php if(!$Semester2==""){echo $Semester2; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem2Proof'].'">View Certificate</a></button>';}else{echo "Not Available";};?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 3 :</span> <span class="value"><?php if(!$Semester3==""){echo $Semester3 ; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem3Proof'].'">View Certificate</a></button>';}else{echo "Not Available";};?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 4 :</span> <span class="value"><?php if(!$Semester4==""){echo $Semester4; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem4Proof'].'">View Certificate</a></button>';}else{echo "Not Available";};?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 5 :</span><span class="value"><?php if(!$Semester5==""){echo $Semester5; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem5Proof'].'">View Certificate</a></button>';}else{echo "Not Available";};?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 6 :</span><span class="value"><?php if(!$Semester6==""){echo $Semester6; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem6Proof'].'">View Certificate</a></button>';}else{echo "Not Available";};?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 7 :</span><span class="value"><?php if(!$Semester7==""){echo $Semester7; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem7Proof'].'">View Certificate</a></button>';}else{echo "Not Available";};?></span>
	 	</p>
	 	<p class="sem">
	 		<span class="label">Semester 8 :</span><span class="value"><?php if(!$Semester8==""){echo $Semester8; echo '<button class="view"><a target="_blank" class="certificate" href="'.$row['Sem8Proof'].'">View Certificate</a></button>';}else{echo "Not Available";};?></span>
	 	</p>
	 	 <p class="sem">
	 		<span class="label">CPI :</span><span class="value"><?php echo $CPI; ?></span>
	 	</p>
	 <?php } ?>
	 	</div>
	</div>
</div>
</div>
 	 <p style="text-align: center;">
 	 	<button style="background-color:#434744; color: white;text-decoration:none;padding: 7px 20px;border: none;border-radius: 4px;cursor: pointer; margin-top: 20px;">
	  	<a style="color: white;text-decoration: none;"href="academicDetailsUpload.php" >Upload Details</a>
	  </button>
	</p>
		
</div>
 </body>
 </html>
