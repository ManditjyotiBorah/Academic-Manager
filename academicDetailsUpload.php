<?php 
session_start();
$ScholarID = $_SESSION['scholarID'];
include 'connection.php';
$sql1 = "SELECT * FROM academicdetails WHERE ScholarID = $ScholarID";
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result1);

if (!$row['ScholarID']) {
	# code...
	if (isset($_POST['UploadX'])) {
		# code...
		$x =  "file";
		$X = $_POST['X'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/ClassX".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "INSERT INTO academicdetails (ScholarID,X,XII,Semester1,Semester2,Semester3,Semester4,Semester5,Semester6,Semester7,Semester8,XProof,XIIProof,Sem1Proof,Sem2Proof,Sem3Proof,Sem4Proof,Sem5Proof,Sem6Proof,Sem7Proof,Sem8Proof,CPI,Status) VALUES ('$ScholarID','$X','','','','','','','','','','$file_store','','','','','','','','','',0,0)";
		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}
	else if (isset($_POST['UploadXII'])) {
		# code...
		$x =  "file";
		$X = $_POST['XII'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/ClassXII".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "INSERT INTO academicdetails (ScholarID,X,XII,Semester1,Semester2,Semester3,Semester4,Semester5,Semester6,Semester7,Semester8,XProof,XIIProof,Sem1Proof,Sem2Proof,Sem3Proof,Sem4Proof,Sem5Proof,Sem6Proof,Sem7Proof,Sem8Proof,Status) VALUES ('$ScholarID','','$XII','','','','','','','','','','$file_store','','','','','','','','',0,0)";
		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}
}
else{

	if (isset($_POST['UploadX'])) {
		# code...
		$x =  "file";
		$X = $_POST['X'];
		$CPI = $_POST['cpi'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/ClassX_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET X = '$X',XProof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql); 
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}

	if (isset($_POST['UploadXII'])) {
		# code...
		$x =  "file";
		$XII = $_POST['XII'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/ClassXII_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET XII = '$XII',XIIProof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}
	if (isset($_POST['UploadSem1'])) {
		# code...
		$x =  "file";
		$Semester1 = $_POST['Semester1'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem1_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester1 = '$Semester1',Sem1Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['UploadSem2'])) {
		# code...
		$x =  "file";
		$Semester2 = $_POST['Semester2'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem2_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester2 = '$Semester2',Sem2Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['UploadSem3'])) {
		# code...
		$x =  "file";
		$Semester3 = $_POST['Semester3'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem3_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester3 = '$Semester3',Sem3Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['UploadSem4'])) {
		# code...
		$x =  "file";
		$Semester4 = $_POST['Semester4'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem4_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester4 = '$Semester4',Sem4Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['UploadSem5'])) {
		# code...
		$x =  "file";
		$Semester5 = $_POST['Semester5'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem5_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester5 = '$Semester5',Sem5Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['UploadSem6'])) {
		# code...
		$x =  "file";
		$Semester6 = $_POST['Semester6'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem6_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester6 = '$Semester6',Sem6Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['UploadSem7'])){

		# code...
		$x =  "file";
		$Semester7 = $_POST['Semester7'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem7_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester7 = '$Semester7',Sem7Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['UploadSem8'])) {
		# code...
		$x =  "file";
		$Semester8 = $_POST['Semester8'];
		$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "AcademicDetails/Sem8_".$ScholarID.".pdf";
        
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester8 = '$Semester8',Sem8Proof = '$file_store' ,Status = '0' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="cpi.php"</script>';
	}
	if (isset($_POST['Uploadcpi'])) {
		$CPI = $_POST['cpi'];
		$sql = "UPDATE academicdetails SET CPI = '$CPI' WHERE ScholarID = '$ScholarID'";
		echo $sql;
 		mysqli_query($con,$sql);
        

	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Upload Academic Details</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<style>
 		.heading{
 			 font-family: Algerian;  
			  text-align: center;
 		}
 		h4{
 			margin-top: 0;
 		}
 		
 		.container{
 			box-shadow: 5px 5px 5px 5px gray;
 			background: lightgray;
 			margin-bottom: 40px;
 		}
 		form{
 			padding: 20px;
 			text-align: left;
 			
 		}
 		form:nth-child(even){
 			background: #ebf0f0;
 		}
 		.btn-secondary{
 			position: absolute;
 			right: 20px;
 			text-align: center;
 			margin-right: 10px;
			background-color: #434744;
 		}
 		label{
 			font-weight: bold;

 		}
 		input{
 			border-radius: 5%;
 		}
 	</style>
 </head>
 <body style="background: url(images/light.jpg); background-size: cover;">
 <div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="AcademicDetails.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>



 	<div class="container" style="text-align: center; margin-top: 30px;">
		<div class="row">
			<div class= "col-md-12 text-styling">
			<?php
	if (!$row['ScholarID']) {
	 ?> 
	<h1 class="heading">
		INSERT ACADEMIC DETAILS
	</h1>
	  <?php 
	}
	else{

	 ?>
	<div>	
		<h1 class="heading">
			UPDATE ACADEMIC DETAILS
		</h1>

	</div>
	<?php 
	}
	 ?>
	 <h4 align="center">
 	Scholar ID : <?php echo $ScholarID; ?>
 </h4>
 	<form action="?" method="POST" enctype="multipart/form-data">
		<label>Class X :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		<input type="text" name="X" value="<?php echo($row['X'])?>">			
				<input type="file" name="file" accept=".pdf" required="">
				<input class="btn btn-secondary" type="submit" name="UploadX" value="Upload" required="">
		</form>
	

	<form action="?" method="POST" enctype="multipart/form-data">

		<label>Class XII :&nbsp&nbsp&nbsp&nbsp</label>
		<input class="inp" type="text" name="XII" value="<?php echo($row['XII'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="">
		
		<input class="btn btn-secondary" type="submit" name="UploadXII" value="Upload" required="">
		</form>
	<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 1 :</label>
		<input class="inp" type="text" name="Semester1" value="<?php echo($row['Semester1'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="" value="<?php echo($row['Semester2'])?>">
		
		<input class="btn btn-secondary" type="submit" name="UploadSem1" value="Upload" required="">
		</form>
		<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 2 :</label>
		<input class="inp" type="text" name="Semester2" value="<?php echo($row['Semester2'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="" >
		
		<input class="btn btn-secondary" type="submit" name="UploadSem2" value="Upload" required="">
		</form>
		<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 3 :</label>
		<input class="inp" type="text" name="Semester3" value="<?php echo($row['Semester3'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="" >
		
		<input class="btn btn-secondary" type="submit" name="UploadSem3" value="Upload" required="">
		</form>
		<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 4 :</label>
		<input class="inp" type="text" name="Semester4" value="<?php echo($row['Semester4'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="">
		
		<input class="btn btn-secondary" type="submit" name="UploadSem4" value="Upload" required="">
		</form>
		<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 5 :</label>
		<input class="inp" type="text" name="Semester5" value="<?php echo($row['Semester5'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="" >
		
		<input class="btn btn-secondary" type="submit" name="UploadSem5" value="Upload" required="">
		</form>
		<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 6 :</label>
		<input class="inp" type="text" name="Semester6" value="<?php echo($row['Semester6'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="">
		
		<input class="btn btn-secondary" type="submit" name="UploadSem6" value="Upload" required="">
		</form>
		<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 7:</label>
		<input class="inp" type="text" name="Semester7" value="<?php echo($row['Semester7'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="" >
		
		<input class="btn btn-secondary" type="submit" name="UploadSem7" value="Upload" required="">
		</form>
		<form action="?" method="POST" enctype="multipart/form-data">

		<label>Semester 8:</label>
		<input class="inp" type="text" name="Semester8" value="<?php echo($row['Semester8'])?>">
		

			
		<input type="file" name="file" accept=".pdf" required="" >
		
		<input class="btn btn-secondary" type="submit" name="UploadSem8" value="Upload" required="">
		</form>
		<form action="?" method="post">
		<label>CPI:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		<input class="inp" type="text" name="cpi" value="<?php echo($row['CPI'])?>" disabled="">
		
		
		</form>
	</div>
</div>

 </body>
 </html>