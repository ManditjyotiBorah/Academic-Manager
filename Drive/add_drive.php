<?php 

	include '../connection.php';
	if (isset($_POST['submit'])) {
		# code...
$company_name = $_POST['company_name'];
$drive_date = $_POST['drive_date'];
$package = $_POST['package'];
$category = $_POST['category'];
$description = $_POST['description'];
$type = $_POST['type'];
$intern1 = $_POST['1_intern'];
$intern2 = $_POST['2_intern'];
$intern3 = $_POST['3_intern'];
$intern4 = $_POST['4_intern'];
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
if ($_POST['msc']) {
	# code...
$msc = $_POST['msc'];
}
else{
	$msc = 0;
}


if($_POST['B_CSE']){
$B_CSE= $_POST['B_CSE'];	
}else{
	$B_CSE = 0;
}
if($_POST['M_CSE']){
	$M_CSE= $_POST['M_CSE'];	
	}else{
		$M_CSE = 0;
	}

if($_POST['B_ECE']){
$B_ECE= $_POST['B_ECE'];	
}else{
	$B_ECE = 0;
}
if($_POST['M_ECE']){
	$M_ECE= $_POST['M_ECE'];	
	}else{
		$M_ECE = 0;
	}

if($_POST['B_EE']){
$B_EE= $_POST['B_EE'];	
}else{
	$B_EE = 0;
}
if($_POST['M_EE']){
	$M_EE= $_POST['M_EE'];	
	}else{
		$M_EE = 0;
	}

if($_POST['B_ME']){
$B_ME= $_POST['B_ME'];	
}else{
	$B_ME = 0;
}
if($_POST['M_ME']){
	$M_ME= $_POST['M_ME'];	
	}else{
		$M_ME = 0;
	}

if($_POST['B_CE']){
$B_CE= $_POST['B_CE'];	
}else{
	$B_CE = 0;
}
if($_POST['M_CE']){
	$M_CE= $_POST['M_CE'];	
	}else{
		$M_CE = 0;
	}

if($_POST['B_EIE']){
$B_EIE= $_POST['B_EIE'];	
}else{
	$B_EIE = 0;
}
if($_POST['M_EIE']){
	$M_EIE= $_POST['M_EIE'];	
	}else{
		$M_EIE = 0;
	}


if($_POST['marksCriteria']){
$marksCriteria = $_POST['marksCriteria'];	
}else{
	$marksCriteria = 0;
}


$X= $_POST['X'];
$XII= $_POST['XII'];
$CPI= $_POST['CPI'];

if($_POST['dobCriteria']){
$dobCriteria = $_POST['dobCriteria'];	
}else{
	$dobCriteria = 0;
}
$dob = $_POST['DOB'];
echo "dsfssdf";
if ($type==0) {
$sql = "INSERT into driveschedule (CompanyName,DriveDate,Package,Category,Description,Type,BTechEligibility,MTechEligibility,MBAEligibility,MScEligibility) VALUES ('$company_name','$drive_date','$package','$category','$description','$type','$btech','$mtech','$mba', '$msc')";
}else{

$sql = "INSERT into driveschedule (CompanyName,DriveDate,Package,Category,Description,Type,BTechEligibility,MTechEligibility,MBAEligibility,MScEligibility) VALUES ('$company_name','$drive_date','$package','$category','$description','$type','$btech',0,0,0)";
}
// echo $sql;

mysqli_query($con,$sql);
$sql4 = "SELECT * FROM driveschedule ORDER BY ID DESC";
$res = mysqli_query($con,$sql4);
$row11 = mysqli_fetch_assoc($res);
echo "string";
$sql1 = "INSERT into brancheligibility (ID,B_CSE,B_ECE,B_EE,B_ME,B_CE,B_EIE,M_CSE,M_ECE,M_EE,M_ME,M_CE,M_EIE,MarksCriteria) VALUES ('".$row11['ID']."','$B_CSE','$B_ECE','$B_EE','$B_ME','$B_CE','$B_EIE','$M_CSE','$M_ECE','$M_EE','$M_ME','$M_CE','$M_EIE','$marksCriteria')";
mysqli_query($con,$sql1);
if ($type==1) {
	$sql12 = "INSERT INTO internEligibility (ID,Year1,Year2,Year3,Year4) VALUES ('".$row11['ID']."','$intern1','$intern2','$intern3','$intern4')";
	mysqli_query($con,$sql12);
	echo $sql12;
}


$sql2 = "INSERT INTO minimummark (ID,X,XII,CPI) VALUES ('".$row11['ID']."','$X','$XII','$CPI')";
echo $sql2;
mysqli_query($con,$sql2);
$sql3 = "INSERT INTO DOBeligibility (ID,Status,DOB) VALUES ('".$row11['ID']."','$dobCriteria','$dob')";
echo $sql3;
mysqli_query($con,$sql3);
		// echo "<script>alert('Placement Drive Added');</script>";
			        echo "<script>window.location.href = 'drivenotify.php';</script>";  

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
function dobEnable() {
  var a = document.getElementById("addDOB");
  if (a.style.display === "none") {
    a.style.display = "block";
  } else {
    a.style.display = "none";
  }
}
function myFunction1() {
  var y = document.getElementById("myDIV1");

  if (y.style.display === "none") {
    y.style.display = "block";
  } else {
    y.style.display = "none";
  }
}
function myFunction2() {
  var z = document.getElementById("myDIV2");

  if (z.style.display === "none") {
    z.style.display = "block";
  } else {
    z.style.display = "none";
  }
}
function intern(){
	var abc = document.getElementById("type").value;
	var ele1 = document.getElementById("degEligibility");
	var ele2 = document.getElementById("myDIV2");
	if (abc==1) {

	var internData = document.getElementById("eligibleYear");
	internData.style.display = "block";
	ele1.style.display = "none";
	ele2.style.display = "none";
	}else{
	var internData = document.getElementById("eligibleYear");
	internData.style.display = "none";		
	ele1.style.display = "block";
	ele2.style.display = "block";
	}
}

</script>

<style>
	* {
			box-sizing: border-box;
			font-family: Arvo;
			}

			input[type=text], select, textarea {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
			}

			label {
			padding: 12px 12px 12px 0;
			display: inline-block;
			font-weight: bold;
			}

			input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
			}

			input[type=submit]:hover {
			background-color: #45a049;
			}

			.container {
			border-radius: 5px;
			background-color: #f2f2f2;
			background-opacity:0.5;
			padding: 20px;
			}

			.col-25 {
			float: left;
			width: 25%;
			margin-top: 6px;
			}

			.col-75 {
			float: left;
			width: 75%;
			margin-top: 6px;
			}

			/* Clear floats after the columns */
			.row:after {
			content: "";
			display: table;
			clear: both;
			}

			
			@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
			}

			.button {
					background-color: black;
					border: none;
					
					border-radius : 10px;
					color: white;
					padding: 7px 26px;
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
					text-decoration: none;
					font-weight:bold;
					color: black;
					border: 1px solid black;
					}
				* {box-sizing: border-box;}
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    height:200;
    width:50%;
    position: relative;
    left: 380px;
    font-weight: 560;
    
  }
  .container1 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    height:200;
    width:70%;
    position: relative;
    font-weight: 560;
    
  }






  .block input[type=text],select,textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }


  .block input[type=number], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  .block input[type=date], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }

  .block input[type=submit] {
    background-color: #362929;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .block input[type=submit]:hover {
    background-color: #362929;
  }
  a:link, a:visited {
    background-color:rgb(44, 43, 43);
    color: white;
    

    text-align: center;
    text-decoration: none;
    /* display: inline-block; */
  }
  
  a:hover, a:active {
    background-color: rgb(44, 43, 43);
  }


</style>

 	<title>Add Placement Drive</title>
 </head>
 <body  style="padding-bottom: 10px; background-size: cover;">

 <div class= "nav-bar" style=" background-image: url(../images/newspaper.jpg);">
		<div align= "center" ><img src="../images/NITS.png" alt="" style="width:100px;height:100px; margin:auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				<div align="center" style="float:center;">
				
				<a href="../verifyAcademic.php" style="text-decoration: none;color: white;font-size: 15px;"><button class="button">
					Verify Academic Details
					</button></a>
					
						
					<a href="../verifyInternship.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Verify Internship Details</button></a>
					
					
<!-- 						
					<a href="add_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Add Placement Drive</button></a>
					 -->
					
						
					<a href="view_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">View/Edit Placement Drive</button></a>
					
					<br>

			</div>
		</div>
		<div style="background-image: url(../images/newspaper.jpg);">
			
		<a  style="background-color:transparent;text-decoration:none;" href="../student_coo.php" ><button class="button" style="position: relative; top:0px;left:20px;">
		Back
		</button></a>
<hr>

 <div class="block" style="text-align: center;"> 
 	<h1><span  >
		 Add Placement Drive
	</span>
	
 	</h1>
	
 	<form action="?" method="post">
	 <div class="contan" style="position: relative;text-align: center;width:50%;left:25%;top: 80px;" >
 		
 		<div class="row">
 			<div class="col-25">
		 	<label for="cName">Company Name : </label>
			 </div>
			 <div class="col-75">
		 	<input type="text" name="company_name" required="">
			 </div>
		</div>
 		<div class="row">
			<div class="col-25">
		 	<label for="dDate">Drive Date : </label>
			 </div>
			 <div class="col-75">
		 	<input type="date" name="drive_date" required="">
			 </div>
		</div>
 		<div class="row">
		 	<div class="col-25">
		 	<label for="pack">Package : </label>
			 </div>
			 <div class="col-75">
		 	<input type="number" name="package" required="">
			 </div>
		</div>
 		<div class="row">
 			<div class="col-25">
		 		<label for="category">Category : </label>
			</div>
			<div class="col-75">
		 		<input type="number" name="category" value="0">
			 </div>
		</div>
		<div class="row">
			<div class="col-25">
		 		<label for="type">Type : </label>
			 </div>
			 <div class="col-75">
		 		<select id="type" name="type" onclick="intern()">
		 			<option value="0">Jobs</option>
		 			<option value="1">Internships</option>
		 		</select>
			 </div>
		</div>
		<div id="eligibleYear" style="display: none;right: 100%;" align="center">
						<h3><span  >
							BTech Year Eligibility
						</span>
						</h3>
						<div class="container1" >
						<p>
							<span>
							<input type="checkbox" name="1_intern" value="1">
							<label>1st</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="2_intern" value="1">
							<label>2nd</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="3_intern" value="1">
							<label>3rd</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="4_intern" value="1">
							<label>4th</label>
							</span>
						</p>
					</div>
			</div>

 		<div class="row">
 			<div class="col-25">
		 		<label>Description :</label>
			 </div>
			 <div class="col-75">
		 		<input type="text" style="height:150px ;width:80%" placeholder="Write something.." name="description" required="">
			 </div>
		</div>

		 </div>
		 <br>
		 <br>
<br>
 		<div id="degEligibility" class="container" style="position: relative; top:20px;" >
 		<div class="row">
		 	<label class="con" > BTech Eligibility :</label> <span style="padding-left: 2em;">
			 <input type="checkbox" name="btech"  checked onclick="myFunction1()"  value="1"></span>
		</div>
 		<div class="row">
 			
		 	<label class="con" >	 MTech Eligibility :</label><span style="padding-left: 1.92em;">
		 	<input type="checkbox" name="mtech" checked onclick="myFunction2()"  value="1"></span>
		</div>
		<div class="row">
 			
		 	<label class="con" >	 MBA Eligibility :</label><span style="padding-left: 1.92em;">
		 	<input type="checkbox" name="mba" checked value="1"></span>
		</div>
		<div class="row">
 			
		 	<label class="con" >	 MSc Eligibility :</label><span style="padding-left: 1.92em;">
		 	<input type="checkbox" name="msc"  checked value="1"></span>
		</div>

		 </div>
		 <br>
		 <div id="myDIV1">
						<h3><span  >
							BTech Branch Eligibility
						</span>
						</h3>
						<div class="container" >
						<p>
							<span>
							<input type="checkbox" name="B_CSE" value="1">
							<label>CSE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_ECE" value="1">
							<label>ECE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_EE" value="1">
							<label>EE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_ME" value="1">
							<label>ME</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_CE" value="1">
							<label>CE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_EIE" value="1">
							<label>EIE</label>
							</span>
						</p>
					</div>
			</div>
						
				<div id="myDIV2">
						<h3><span  >
							MTech Branch Eligibility
						</span>
						</h3>
						<div class="container" >
						<p>
							<span>
							<input type="checkbox" name="M_CSE" value="1">
							<label>CSE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_ECE" value="1">
							<label>ECE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_EE" value="1">
							<label>EE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_ME" value="1">
							<label>ME</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_CE" value="1">
							<label>CE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_EIE" value="1">
							<label>EIE</label>
							</span>
						</p>
						</div>
				</div>

			
 		<p>
 			
 		<label>Set Marks Criteria</label>
 		<input type="checkbox" name="marksCriteria" checked="" onclick="myFunction()" value="1">
 		</p>

<div id="myDIV" style="position: relative;text-align: center;width:50%;left:25%;">
	<div class="row">
			<div class="col-25">
		 <label>Class X :</label>
		 </div>
		 <div class="col-75">
		 <input type="text" name="X">
		 </div>	
	</div>
	<div class="row">
		<div class="col-25">
		 	<label>Class XII :</label>
		 </div>
		 <div class="col-75">
		 <input type="text" name="XII">
		 </div>
	</div>
	<div class="row">
		<div class="col-25">
		 	<label for="cpi">CPI :</label>
		 </div>
		 <div class="col-75">
		 <input type="text" name="CPI">
		 </div>
	</div>
</div>
 		<p>
 			
 		<label>Set DOB Criteria</label>
 		<input type="checkbox" name="dobCriteria" onclick="dobEnable()" value="1">
 		</p>
<div id="addDOB" style="position: relative;display:none ;text-align: center;width:50%;left:25%;">
	<div class="row">
			<div class="col-25">
		 <label>Date of Birth :</label>
		 </div>
		 <div class="col-75">
		 <input type="date" name="DOB">
		 </div>	
	</div>
</div>

<button class="button">
	<input  type="submit" value="Submit" name="submit" style="background: transparent;border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;padding-right:15px;">
	</button>

 	</form>
	</div>
 	
	
 </div>
		</div>
 </body>
 </html>