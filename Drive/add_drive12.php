<?php 
error_reporting(0);
	include '../connection.php';
	if (isset($_POST['submit'])) {
		# code...
$id = $_POST['id'];
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


$sql = "INSERT into driveschedule (ID,CompanyName,DriveDate,Package,Category,Description,Type,BTechEligibility,MTechEligibility,MBAEligibility) VALUES ('$id','$company_name','$drive_date','$package','$category','$description','$type','$btech','$mtech','$mba')";
mysqli_query($con,$sql);
$sql1 = "INSERT into brancheligibility (ID,CSE,ECE,EE,ME,CE,EIE,Others,MarksCriteria) VALUES ('$id','$CSE','$ECE','$EE','$ME','$CE','$EIE','$Others','$marksCriteria')";
mysqli_query($con,$sql1);
$sql2 = "INSERT INTO minimummark (ID,X,XII,CPI) VALUES ('$id','$X','$XII','$CPI')";
mysqli_query($con,$sql2);
        echo "<script>alert('Placement Drive Added');</script>";

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

	 <title>Add Placement Drive</title>
	 <link rel="stylesheet" type="text/css" href="add_drive.css">
 </head>
 <body>

 <div class= "nav-bar">
		<div align= "center" ><img src="../images\NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				<div align="center">
					<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background-color:grey;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
					<a href="../verifyAcademic.php" style="text-decoration: none;color: white;font-size: 15px;">Verify Academic Details</a>
					</button>
					<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background-color:grey;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
					<a href="../verifyInternship.php" style="text-decoration: none;color: white;font-size: 15px;">Verify Internship Details</a>
					</button>
					<!-- <button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background-color:grey;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
					<a href="Drive/add_drive.php" style="text-decoration: none;color: white;font-size: 15px;">Add Placement Drive</a>
					</button> -->
					<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;background-color:grey;border-radius :10px ;padding-right:15px; margin-top: 5px;">
						
					<a href="view_drive.php" style="text-decoration: none;color: white;font-size: 15px;">View/Edit Placement Drive</a>
					</button>
					<br>
					
	
			</div>
		</div>

<hr>

 <div style="text-align: center;"> 
 	<h1>
 		Add Placement Drive
 	</h1>
 	<form action="?" method="post">
		 
 		<p>
 			
		 	<label class="floatLabel">Drive ID :</label>
		 	<input type="number" name="id" required="">
 		</p>
 		<p>
 			
		 	<label class="floatLabel">Company Name :</label>
		 	<input type="text" name="company_name" required="">
 		</p>
 		<p>
 			
		 	<label>Drive Date :</label>
		 	<input type="date" name="drive_date" required="">
 		</p>
 		<p>
 			
		 	<label>Package :</label>
		 	<input type="number" name="package" required="">
 		</p>
 		<p>
 			
		 	<label>Category :</label>
		 	<input type="number" name="category" value="0">
 		</p>
 		<p>
 			
		 	<label>Description :</label>
		 	<input type="text" name="description" required="">
 		</p>
 		<p>
 			
		 	<label>Type :</label>
		 	<input type="number" name="type" value="0">
 		</p>
 		<p>
 			
		 	<label>BTech Eligibility :</label>
		 	<input type="checkbox" name="btech" value="1">
 		</p>
 		<p>
 			
		 	<label>MTech Eligibility :</label>
		 	<input type="checkbox" name="mtech" value="1">
 		</p>
 		<p>
 			
		 	<label>MBA Eligibility :</label>
		 	<input type="checkbox" name="mba" value="1">
 		</p>
 		<h2>
 			Branch Eligibility
 		</h2>
 		<p>
 			<span>
 			<input type="checkbox" name="CSE" value="1">
 			<label>CSE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="ECE" value="1">
 			<label>ECE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="EE" value="1">
 			<label>EE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="ME" value="1">
 			<label>ME</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="CE" value="1">
 			<label>CE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="EIE" value="1">
 			<label>EIE</label>
 			</span>
 			<span style="padding-left: 2em;">
 			<input type="checkbox" name="Others" value="1">
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
		 <input type="text" name="X">
	</p>
	<p>
		
		 <label>Class XII :</label>
		 <input type="text" name="XII">
	</p>
	<p>
		
		 <label>CPI :</label>
		 <input type="text" name="CPI">
	</p>
</div>

<input type="submit" name="submit">
 	</form>
 	<p>
		<a href="../student_coo.php" style="text-decoration: none;color: black;font-size: 30px;">Back</a>
	</p>
 </div>
 </body>
 </html>