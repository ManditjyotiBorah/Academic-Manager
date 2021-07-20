<?php 
session_start();
$ScholarID = $_SESSION['scholarID'];
include 'connection.php';
$sql1 = "SELECT * FROM academicdetails WHERE ScholarID = $ScholarID AND Status = 0";
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result1);
echo $row['ScholarID'];

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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "INSERT INTO academicdetails (ScholarID,X,XII,Semester1,Semester2,Semester3,Semester4,Semester5,Semester6,Semester7,Semester8,XProof,XIIProof,Sem1Proof,Sem2Proof,Sem3Proof,Sem4Proof,Sem5Proof,Sem6Proof,Sem7Proof,Sem8Proof,Status) VALUES ('$ScholarID','$X','','','','','','','','','','$file_store','','','','','','','','','',0)";
		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}
	if (isset($_POST['UploadXII'])) {
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "INSERT INTO academicdetails (ScholarID,X,XII,Semester1,Semester2,Semester3,Semester4,Semester5,Semester6,Semester7,Semester8,XProof,XIIProof,Sem1Proof,Sem2Proof,Sem3Proof,Sem4Proof,Sem5Proof,Sem6Proof,Sem7Proof,Sem8Proof,Status) VALUES ('$ScholarID','','$XII','','','','','','','','','','$file_store','','','','','','','','',0)";
		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}
}
else{
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
        $file_store = "AcademicDetails/ClassX_".$ScholarID.".pdf";
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET X = '$X',XProof = '$file_store' WHERE ScholarID = '$ScholarID'";
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET XII = '$XII',XIIProof = '$file_store' WHERE ScholarID = '$ScholarID'";
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester1 = '$Semester1',Sem1Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester2 = '$Semester2',Sem2Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester3 = '$Semester3',Sem3Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester4 = '$Semester4',Sem4Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester5 = '$Semester5',Sem5Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester6 = '$Semester6',Sem6Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester7 = '$Semester7',Sem7Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
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
        echo "<script>alert('Update Document');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
		$sql = "UPDATE academicdetails SET Semester8 = '$Semester8',Sem8Proof = '$file_store' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
	echo '<script>window.location.href="academicDetailsUpload.php"</script>';
	}

}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Upload Academic Details</title>
 </head>
 <body>
 	<div style="text-align: center;">
 <?php
if (!$row['ScholarID']) {
 ?> 
<h1>
	INSERT ACADEMIC DETAILS
</h1>
  <?php 
}
else{

 ?>
<h1>
	UPDATE ACADEMIC DETAILS
</h1>
<?php 
}
 ?>
 
 	
<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Class X :</label>
	<input type="text" name="X" value="<?php echo($row['X'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf">
	</p>
	<input type="submit" name="UploadX" value="Upload">
	</form>
<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Class XII :</label>
	<input type="text" name="XII" value="<?php echo($row['XII'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf">
	</p>
	<input type="submit" name="UploadXII" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 1 :</label>
	<input type="text" name="Semester1" value="<?php echo($row['Semester1'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf" value="<?php echo($row['Semester2'])?>">
	</p>
	<input type="submit" name="UploadSem1" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 2 :</label>
	<input type="text" name="Semester2" value="<?php echo($row['Semester2'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf" >
	</p>
	<input type="submit" name="UploadSem2" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 3 :</label>
	<input type="text" name="Semester3" value="<?php echo($row['Semester3'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf" >
	</p>
	<input type="submit" name="UploadSem3" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 4 :</label>
	<input type="text" name="Semester4" value="<?php echo($row['Semester4'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf">
	</p>
	<input type="submit" name="UploadSem4" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 5 :</label>
	<input type="text" name="Semester5" value="<?php echo($row['Semester5'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf" >
	</p>
	<input type="submit" name="UploadSem5" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 6 :</label>
	<input type="text" name="Semester6" value="<?php echo($row['Semester6'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf">
	</p>
	<input type="submit" name="UploadSem6" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 7:</label>
	<input type="text" name="Semester7" value="<?php echo($row['Semester7'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf" >
	</p>
	<input type="submit" name="UploadSem7" value="Upload">
	</form>
	<form action="?" method="POST" enctype="multipart/form-data">
	<p>
	<label>Semester 8:</label>
	<input type="text" name="Semestee8" value="<?php echo($row['Semester8'])?>">
	</p>
	<p>
		
	<input type="file" name="file" accept=".pdf" >
	</p>
	<input type="submit" name="UploadSem8" value="Upload">
	</form>
<p>
		<script type="text/javascript">
			function goback() {
				window.history.back();
			}
		</script>
		<button onclick="goback()">Back</button>
	</p>
</div>

 </body>
 </html>