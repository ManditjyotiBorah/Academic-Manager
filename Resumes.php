<?php 
session_start();
$ScholarID = $_SESSION['scholarID'];
include 'connection.php';
$sql = "SELECT * FROM Resumes WHERE ScholarID = $ScholarID";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
if ($row['ScholarID']) {
	# code...
	$x = 1;
	echo "<br>";
}
else{
	$x = 0;
}
$ScholarID = $_SESSION['scholarID'];
if (isset($_POST['defaultupload'])) {
	# code...
	$default = $_POST['default'];
	$sql2 = "UPDATE Resumes SET DefaultResume = '$default' WHERE ScholarID = '$ScholarID'";
	mysqli_query($con,$sql2);
	// echo '<script>alert("Default Created");</script>';
	echo '<script>window.location.href="updatePersonal.php"</script>';
}
if (isset($_POST['upload1'])) {
	# code...
	$x =  "file";
	$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "Resumes/resume1_".$ScholarID.".pdf";
        // echo "<script>alert('Upload Resume');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
	if ($x==0) {
		# code...
		$sql1 = "INSERT INTO Resumes (ScholarID,Resume1,Resume2,Resume3,Resume4,Resume5,DefaultResume) VALUES ('$ScholarID','$file_store','','','','','$file_store')";
		mysqli_query($con,$sql1);
	}
	else{
		$sql1 = "UPDATE Resumes SET Resume1 = '$file_store' WHERE ScholarID = '$ScholarID'";
		mysqli_query($con,$sql1);
	}
	// echo '<script>alert("Resume 1 Uploaded");</script>';
	echo '<script>window.location.href="Resumes.php"</script>';
}
if (isset($_POST['upload2'])) {
	# code...

	$x =  "file";
	$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        // $file_store = "Resumes/resume2_".$ScholarID.".pdf";
        echo "<script>alert('Upload Resume');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql1 = "UPDATE Resumes SET Resume2 = '$file_store' WHERE ScholarID = '$ScholarID'";
		if(mysqli_query($con,$sql1))
	// echo '<script>alert("Resume 2 Uploaded");</script>';
	echo '<script>window.location.href="Resumes.php"</script>';
		
}
if (isset($_POST['upload3'])) {
	# code...
	$x =  "file";
	$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "Resumes/resume3_".$ScholarID.".pdf";
        // echo "<script>alert('Upload Resume');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql1 = "UPDATE Resumes SET Resume3 = '$file_store' WHERE ScholarID = '$ScholarID'";
		mysqli_query($con,$sql1);
	
	// echo '<script>alert("Resume 3 Uploaded");</script>';
	echo '<script>window.location.href="Resumes.php"</script>';
}
if (isset($_POST['upload4'])) {
	# code...
	$x =  "file";
	$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "Resumes/resume4_".$ScholarID.".pdf";
        // echo "<script>alert('Upload Resume');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
	
		$sql1 = "UPDATE Resumes SET Resume4 = '$file_store' WHERE ScholarID = '$ScholarID'";
		mysqli_query($con,$sql1);
	
	echo '<script>alert("Resume 4 Uploaded");</script>';
	echo '<script>window.location.href="Resumes.php"</script>';
}
if (isset($_POST['upload5'])) {
	# code...
	$x =  "file";
	$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "Resumes/resume5_".$ScholarID.".pdf";
        // echo "<script>alert('Upload Resume');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql1 = "UPDATE Resumes SET Resume5 = '$file_store' WHERE ScholarID = '$ScholarID'";
		mysqli_query($con,$sql1);
	// echo '<script>alert("Resume 5 Uploaded");</script>';
	echo '<script>window.location.href="Resumes.php"</script>';
}
 ?>
 <!DOCTYPE html>
 <html >
 <head>
 	<title>
 		Upload Resume	
 	</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<style>
 		.resumeLink{
 			text-decoration: none;
 			margin: 30px 20px;
 		}
 		.frame{
 			box-shadow: 5px 5px 5px 5px gray;
 			padding: 20px;
 		}
 		.upload{
 			margin-top: 30px;
 		}
 		.form{
 			position: relative;
 			left: 32%;
 		}
 		@media screen and (max-width: 800px) {
			.form{
				left: 10%;
			}
		}
 		</style>
 		
 </head>
 <body style="margin: 0; padding: 0; background-image: url(images/light.jpg); background-size: cover;">
 <div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="updatePersonal.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>

	<div style="background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  ); margin-top: 30px;"class="frame container">
		<div class="row">
			<div class="col-lg-12">
		
		<h1 align="center" style="font-family: Algerian;">
			Upload Resume
		</h1><hr>
		
 		<p align="center" style="font-size: 1.5em; font-family: Georgia;">
			<b>Scholar ID :</b> <?php echo $ScholarID; ?>
		</p>
		<p style="text-align: center;">
			<form class="form" action="?" method="POST">
				<!-- <label>Select Default Resume :</label>-->
			<div class="input-group mb-3">
  				<div  class="input-group-prepend">
    				<span class="input-group-text">Select Default Resume</span>
  				</div>
 				<select name="default">
					
					<?php if ($row['Resume1']) { ?>
					<option class="dropdown-item" value="<?php echo $row['Resume1']; ?>">Resume1</option>
					<?php } ?>
					<?php if ($row['Resume2']) { ?>
					<option value="<?php echo $row['Resume2']; ?>">Resume2</option>
					<?php } ?>
					<?php if ($row['Resume3']) { ?>
					<option value="<?php echo $row['Resume3']; ?>">Resume3</option>
					<?php } ?>
					<?php if ($row['Resume4']) { ?>
					<option value="<?php echo $row['Resume4']; ?>">Resume4</option>
					<?php } ?>
					<?php if ($row['Resume5']) { ?>
					<option value="<?php echo $row['Resume5']; ?>">Resume5</option>
					<?php } ?>
				</select>	
			
				<input style="margin-left: 10px;" class="btn btn-secondary" type="submit" name="defaultupload" value="SET DEFAULT">	
			</div>	
			</form>
		</p>
		<?php 
	if ($row['ScholarID']) {
		# code...
 	?>
		<!-- <iframe width="80%" height="100%;" src="<?php echo $row['DefaultResume']; ?>"></iframe> -->
	<?php
}
	?>
	<br>
	<div align="center" class="container">
		<div class="row">
			<!-- <div style="text-align: center;"> -->
		<a class="col-lg-2 col-md-2 col-sm-12" class="resumeLink" target="_blank" href="<?php echo $row['Resume1']; ?>">Resume1</a>
		<a class="col-lg-2 col-md-2 col-sm-12" class="resumeLink" target="_blank" href="<?php echo $row['Resume2']; ?>">Resume2</a>
		<a class="col-lg-2 col-md-2 col-sm-12" class="resumeLink" target="_blank" href="<?php echo $row['Resume3']; ?>">Resume3</a>
		<a class="col-lg-2 col-md-2 col-sm-12" class="resumeLink" target="_blank" href="<?php echo $row['Resume4']; ?>">Resume4</a>
		<a class="col-lg-2 col-md-2 col-sm-12" class="resumeLink" target="_blank" href="<?php echo $row['Resume5']; ?>">Resume5</a>
			<!-- </div> -->
		</div>
	</div>

 <form align="center" action="?" method="POST" enctype="multipart/form-data">
	<p class="upload">
		<label>Resume 1 :</label>
 		<input type="file" name="file" accept=".pdf">
			<input class="btn btn-secondary" type="submit" name="upload1" value="Upload">
<?php 
	if ($row['ScholarID']) {
		# c	</p>ode...
 ?>
 	</p>
 </form>  
 <form align="center" action="?" method="POST" enctype="multipart/form-data">
	<p class="upload">
		<label>Resume 2 :</label>
 	<input type="file" name="file" accept=".pdf">
		

 	<input class="btn btn-secondary" type="submit" name="upload2" value="Upload">
	</p>
 </form>  
 <form align="center" action="?" method="POST" enctype="multipart/form-data">
	<p class="upload">
		<label>Resume 3 :</label>
 	<input type="file" name="file" accept=".pdf">
		

 	<input class="btn btn-secondary" type="submit" name="upload3" value="Upload">
	</p>
 </form>  
 <form align="center" action="?" method="POST" enctype="multipart/form-data">
	<p class="upload">
		<label>Resume 4 :</label>
 	<input type="file" name="file" accept=".pdf">
		

 	<input class="btn btn-secondary" type="submit" name="upload4" value="Upload">
	</p>
 </form>  
 <form align="center" action="?" method="POST" enctype="multipart/form-data">
	<p class="upload">
		<label>Resume 5 :</label>
 	<input type="file" name="file" accept=".pdf">
		

 	<input class="btn btn-secondary" type="submit" name="upload5" value="Upload">
	</p>
 </form>  
<?php 
}
 ?>
 </div>                                                                                                   
	</div>
</div>
</div>

	
</div>                                                                                            
 </body>
 </html>