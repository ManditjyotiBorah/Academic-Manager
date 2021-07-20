<?php 
session_start();
	include '../connection.php';
if ($_POST['edit']) {
	# code...
$id =  $_POST['edit'];
$_SESSION['id'] = $id;
}else if($_SESSION['id']){
$id =  $_SESSION['id'];
}
else{
        echo "<script>alert('Access Denied');</script>";
        echo "<script>window.location.href = 'https://www.google.com/';</script>";

}
	$sql = "SELECT * FROM driveschedule WHERE ID = '".$id."'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$sql1 = "SELECT * FROM brancheligibility WHERE ID = '".$id."'";
	$result1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$sql2 = "SELECT * FROM minimummark WHERE ID = '".$id."'";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_assoc($result2);


	$id = $row['ID'];
$company_name = $row['CompanyName'];
$drive_date = $row['DriveDate'];
$package = $row['Package'];
$category = $row['Category'];
$description = $row['Description'];
$type = $row['Type'];
$btech = $row['BTechEligibility'];
$mtech = $row['MTechEligibility'];
$mba = $row['MBAEligibility'];
$CSE= $row1['CSE'];
$ECE= $row1['ECE'];
$EE= $row1['EE'];
$ME= $row1['ME'];
$CE= $row1['CE'];
$EIE= $row1['EIE'];
$Others= $row1['Others'];
$marksCriteria = $row1['MarksCriteria'];
$X= $row2['X'];
$XII= $row2['XII'];
$CPI= $row2['CPI'];
 
if (isset($_POST['update'])) {
$company_name = $_POST['company_name'];
$drive_date = $_POST['drive_date'];
$package = $_POST['package'];
$category = $_POST['category'];
$description = $_POST['description'];
$type = $_POST['type'];
if ($_POST['btech']) {
$btech = $_POST['btech'];
}else{
	$btech = 0;
}
if ($_POST['mtech']) {
	# code...
$mtech = $_POST['mtech'];
}
else{
	$mtech = 0;
}
if ($_POST['mba']) {
	# code...
$mba = $_POST['mba'];
}
else{
	$mba = 0;

}

if($_POST['CSE']){
$CSE= $_POST['CSE'];	
}else{
	$CSE = 0;
}
if($_POST['ECE']){
$ECE= $_POST['ECE'];	
}else{
	$ECE = 0;
}
if($_POST['EE']){
$EE= $_POST['EE'];	
}else{
	$EE = 0;
}
if($_POST['ME']){
$ME= $_POST['ME'];	
}else{
	$ME = 0;
}
if($_POST['CE']){
$CE= $_POST['CE'];	
}else{
	$CE = 0;
}
if($_POST['EIE']){
$EIE= $_POST['EIE'];	
}else{
	$EIE = 0;
}
if($_POST['Others']){
$Others= $_POST['Others'];	
}else{
	$Others = 0;
}
if($_POST['marksCriteria']){
$marksCriteria = $_POST['marksCriteria'];	
}else{
	$marksCriteria = 0;
}


$X= $_POST['X'];
$XII= $_POST['XII'];
$CPI= $_POST['CPI'];
$sql0 = "DELETE FROM driveschedule WHERE ID = $id";
$sql10 = "DELETE FROM brancheligibility WHERE ID = $id";
$sql20 = "DELETE FROM minimummark WHERE ID = $id";
mysqli_query($con,$sql20);
mysqli_query($con,$sql10);
mysqli_query($con,$sql0);

	$sql = "INSERT into driveschedule (ID,CompanyName,DriveDate,Package,Category,Description,Type,BTechEligibility,MTechEligibility,MBAEligibility) VALUES ('$id','$company_name','$drive_date','$package','$category','$description','$type','$btech','$mtech','$mba')";
mysqli_query($con,$sql);
$sql1 = "INSERT into brancheligibility (ID,CSE,ECE,EE,ME,CE,EIE,Others,MarksCriteria) VALUES ('$id','$CSE','$ECE','$EE','$ME','$CE','$EIE','$Others','$marksCriteria')";
mysqli_query($con,$sql1);
$sql2 = "INSERT INTO minimummark (ID,X,XII,CPI) VALUES ('$id','$X','$XII','$CPI')";
mysqli_query($con,$sql2);
echo $sql;
echo $sql1;
echo $sql2;
        echo "<script>alert('Drive Updated');</script>";

        echo "<script>window.location.href = 'view_drive.php';</script>";

}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<script type="text/javascript">
 		function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
	</script>

 	<title>Edit Placement Drive</title>
 </head>
 <body>
 <div style="text-align: center;"> 
 	<h1>
 		Edit Placement Drive(Drive Id : <?php echo $id; ?>)
 	</h1>
 	<form action="?" method="post">
 		<p>
 			
		 	<label>Drive ID :</label>
		 	<input type="number" name="id" required="" disabled="" value="<?php echo $id; ?>">
 		</p>
 		<p>
 			
		 	<label>Company Name :</label>
		 	<input type="text" name="company_name" required="" value="<?php echo $company_name; ?>">
 		</p>
 		<p>
 			
		 	<label>Drive Date :</label>
		 	<input type="date" name="drive_date" required=""  value="<?php echo $drive_date; ?>">
 		</p>
 		<p>
 			
		 	<label>Package :</label>
		 	<input type="number" name="package" required=""  value="<?php echo $package; ?>">
 		</p>
 		<p>
 			
		 	<label>Category :</label>
		 	<input type="number" name="category"  value="<?php echo $category; ?>">
 		</p>
 		<p>
 			
		 	<label>Description :</label>
		 	<input type="text" name="description" required=""  value="<?php echo $description; ?>">
 		</p>
 		<p>
 			
		 	<label>Type :</label>
		 	<input type="number" name="type"  value="<?php echo $type; ?>">
 		</p>
 		<p>
 			
		 	<label>BTech Eligibility :</label>
		 	<input type="checkbox" name="btech" value="1" <?php if($row['BTechEligibility']){echo 'checked=""';} ?> >
 		</p>
 		<p>
 			
		 	<label>MTech Eligibility :</label>
		 	<input type="checkbox" name="mtech" value="1" <?php if($row['MTechEligibility']){echo 'checked=""';} ?>>
 		</p>
 		<p>
 			
		 	<label>MBA Eligibility :</label>
		 	<input type="checkbox" name="mba" value="1" <?php if($row['MBAEligibility']){echo 'checked=""';} ?>>
 		</p>
 		<h2>
 			Branch Eligibility
 		</h2>
 		<p>
 			<span>
 			<input type="checkbox" name="CSE" value="1" <?php if($row1['CSE']){echo 'checked=""';} ?>>
 			<label>CSE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="ECE" value="1" <?php if($row1['ECE']){echo 'checked=""';} ?> >
 			<label>ECE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="EE" value="1" <?php if($row1['EE']){echo 'checked=""';} ?> >
 			<label>EE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="ME" value="1" <?php if($row1['ME']){echo 'checked=""';} ?> >
 			<label>ME</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="CE" value="1" <?php if($row1['CE']){echo 'checked=""';} ?> >
 			<label>CE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="EIE" value="1" <?php if($row1['EIE']){echo 'checked=""';} ?> >
 			<label>EIE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="Others" value="1" <?php if($row1['Others']){echo 'checked=""';} ?> >
 			<label>Others</label>
 			</span>
 				
 		</p>
 		<p>
 			
 		<label>Set Marks Criteria</label>
 		<input type="checkbox" name="marksCriteria" checked="" onclick="myFunction()" value="1">
 		</p>

<div id="myDIV">
	<p>
		
		 <label>Class X :</label>
		 <input type="text" name="X" value="<?php if($row2['X']){echo $row2['X'];} ?>">
	</p>
	<p>
		
		 <label>Class XII :</label>
		 <input type="text" name="XII" value="<?php if($row2['XII']){echo $row2['XII'];} ?>">
	</p>
	<p>
		
		 <label>CPI :</label>
		 <input type="text" name="CPI" value="<?php if($row2['CPI']){echo $row2['CPI'];} ?>">
	</p>
</div>

<input type="submit" name="update" value="UPDATE">
 	</form>
 	<br>
	<a href="view_drive.php" style="text-decoration: none;color: black;font-size: 30px;">Back</a>
 	
 </div>
 </body>
 </html>