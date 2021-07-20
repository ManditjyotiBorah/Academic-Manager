<?php 
error_reporting(0);
session_start();
$checked = 'checked';
	include '../connection.php';
if ($_POST['edit']) {
	# code...
$id =  $_POST['edit'];
$_SESSION['id'] = $id;
}
else if($_SESSION['id']){
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
	$sql3 = "SELECT * FROM DOBeligibility WHERE ID = '".$id."'";
	$result3 = mysqli_query($con,$sql3);
	$row3 = mysqli_fetch_assoc($result3);
	$sql4 = "SELECT * FROM interneligibility WHERE ID = '".$id."'";
	$result4 = mysqli_query($con,$sql4);
	$row4 = mysqli_fetch_assoc($result4);



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
$msc = $row['MScEligibility'];
$B_CSE= $row1['B_CSE'];
$B_ECE= $row1['B_ECE'];
$B_EE= $row1['B_EE'];
$B_ME= $row1['B_ME'];
$B_CE= $row1['B_CE'];
$B_EIE= $row1['B_EIE'];
$M_CSE= $row1['M_CSE'];
$M_ECE= $row1['M_ECE'];
$M_EE= $row1['M_EE'];
$M_ME= $row1['M_ME'];
$M_CE= $row1['M_CE'];
$M_EIE= $row1['M_EIE'];
$marksCriteria = $row1['MarksCriteria'];
$X= $row2['X'];
$XII= $row2['XII'];
$CPI= $row2['CPI'];
$DOBStatus = $row3['Status'];
$DOB = $row3['DOB'];
$intern1 = $row4['Year1'];
$intern2 = $row4['Year2'];
$intern3 = $row4['Year3'];
$intern4 = $row4['Year4'];
 
if (isset($_POST['update'])){
// echo "string";
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
$interns1 = $_POST['1_intern'];
$interns2 = $_POST['2_intern'];
$interns3 = $_POST['3_intern'];
$interns4 = $_POST['4_intern'];

$dobCriteria = $_POST['dobCriteria'];
$dob = $_POST['DOB'];

	// $sql = "INSERT into driveschedule (ID,CompanyName,DriveDate,Package,Category,Description,Type,BTechEligibility,MTechEligibility,MBAEligibility) VALUES ('$id','$company_name','$drive_date','$package','$category','$description','$type','$btech','$mtech','$mba')";

	$sql = "UPDATE driveschedule SET CompanyName = '$company_name',DriveDate='$drive_date',Package='$package',Category='$category',Description='$description',Type='$type',BTechEligibility='$btech',MTechEligibility='$mtech',MBAEligibility='$mba',MScEligibility='$msc' WHERE ID = '$id'";
	mysqli_query($con,$sql);

// $sql1 = "INSERT into brancheligibility (ID,B_CSE,B_ECE,B_EE,B_ME,B_CE,B_EIE,M_CSE,M_ECE,M_EE,M_ME,M_CE,M_EIE,MarksCriteria) VALUES ('$id','$B_CSE','$B_ECE','$B_EE','$B_ME','$B_CE','$B_EIE','$M_CSE','$M_ECE','$M_EE','$M_ME','$M_CE','$M_EIE','$marksCriteria')";

$sql1 = "UPDATE brancheligibility SET B_CSE='$B_CSE',B_ECE='$B_ECE',B_EE='$B_EE',B_ME='$B_ME',B_CE='$B_CE',B_EIE='$B_EIE',M_CSE='$M_CSE',M_ECE='$M_ECE',M_EE='$M_EE',M_ME='$M_ME',M_CE='$M_CE',M_EIE='$M_EIE',MarksCriteria='$marksCriteria' WHERE ID = '$id'";
	
mysqli_query($con,$sql1);

// $sql2 = "INSERT INTO minimummark (ID,X,XII,CPI) VALUES ('$id','$X','$XII','$CPI')";
if ($marksCriteria) {
	# code...
$sql2 = "UPDATE minimummark SET X = '$X',XII = '$XII',CPI ='$CPI' WHERE ID = '$id'";
}else{
$sql2 = "UPDATE minimummark SET X = '0',XII = '0',CPI ='0' WHERE ID = '$id'";
}
$sql3 = "UPDATE interneligibility SET Year1='$interns1',Year2='$interns2',Year3='$interns3',Year4='$interns4' WHERE ID = '$id'";
mysqli_query($con,$sql3);
$sql5 = "UPDATE dobeligibility SET Status = '$dobCriteria', DOB = '$dob' WHERE ID='$id'";
mysqli_query($con,$sql5);
mysqli_query($con,$sql2);

if ($type==0) {
	$sql3 = "UPDATE interneligibility SET Year1='0',Year2='0',Year3='0',Year4='0' WHERE ID = '$id'";
	mysqli_query($con,$sql3);
}

$sql = "DELETE FROM driveresponses WHERE DriveID = '$id'";
mysqli_query($con,$sql);
        echo "<script>window.location.href = 'drivenotify.php';</script>";

        // echo "<script>alert('Drive Updated');</script>";


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
	if (abc==1) {

	var internData = document.getElementById("eligibleYear");
	internData.style.display = "block";
	ele1.style.display = "none";
	}else{
	var internData = document.getElementById("eligibleYear");
	internData.style.display = "none";		
	ele1.style.display = "block";
	}
}
</script>

	 <title>Edit Placement Drive</title>
	 <link rel="stylesheet" href="edit.css">
	 <style>
	* {
			box-sizing: border-box;
			font-family:candara;
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

			.contain {
		
			border-radius: 5px;
			background-color: #f2f2f2;
			width: 60%;
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
			.container1 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    height:200;
    width:70%;
    position: relative;
    font-weight: 560;
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
				


</style>
 </head>
 <body style="background-image: url(../images/newspaper.jpg" onload="intern()">

 <div style="background-image: url(../images/newspaper.jpg)" class= "nav-bar">
		<div align= "center" ><img src="../images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
		</div>
		<div>
		<a  style="background-color:transparent;text-decoration:none;" href="../student_coo.php" ><button class="button" style="top:-30px;left:2%;">
		Back
		</button></a>
		</div>
</div>
<hr>


 <div style="text-align: center;"> 
 <h1 style=" background-color:rgb(255, 255, 255, 0.5); padding:2px;border: 10px solid rgb(255, 255, 255, 0.5);" >
 		Edit Placement Drive(Drive Id : <?php echo $id; ?>)
 	</h1>
 	<form action="?" method="post">
	 <div align="center" class="contan" style="position: relative;text-align: center;width:50%;left:25%;top: 80px;" >
 		
 		<div class="row">
			<div class="col-25">
		 	<label>Drive ID : </label>
			 </div>
			 <div class="col-75">
		 	<input type="number" name="id" required="" disabled="" value="<?php echo $id; ?>">
			 </div>
		</div>
 	
 		<div class="row">
 			<div class="col-25">
		 	<label for="cName">Company Name : </label>
			 </div>
			 <div class="col-75">
		 	<input type="text" name="company_name" required="" value="<?php echo $company_name; ?>">
			 </div>
		</div>
 		<div class="row">
			<div class="col-25">
		 	<label for="dDate">Drive Date : </label>
			 </div>
			 <div class="col-75">
		 	<input type="date" name="drive_date" required="" value="<?php echo $drive_date; ?>">
			 </div>
		</div>
 		<div class="row">
		 	<div class="col-25">
		 	<label for="pack">Package : </label>
			 </div>
			 <div class="col-75">
		 	<input type="number" name="package" required="" value="<?php echo $package; ?>">
			 </div>
		</div>
 		<div class="row">
 			<div class="col-25">
		 		<label for="category">Category : </label>
			</div>
			<div class="col-75">
		 		<input type="number" name="category" value="<?php echo $category; ?>">
			 </div>
		</div>

		<div class="row">
			<div class="col-25">
		 		<label for="type">Type : </label>
			 </div>
			 <div class="col-75">
		 		<select id="type" name="type" onclick="intern()">
		 			<option value="0" <?php if($type==0){echo "selected";} ?> >Jobs</option>
		 			<option value="1" <?php if($type==1){echo "selected";}?> > Internships</option>
		 		</select>
			 </div>
		</div>
		<div id="eligibleYear" style="display:none ;right: 100%;" align="center">
						<h3><span  >
							BTech Year Eligibility
						</span>
						</h3>
						<div class="container1" >
						<p>
							<span>
							<input type="checkbox" name="1_intern" value="1" <?php if($intern1){echo "checked";} ?>>
							<label>1st</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="2_intern" value="1" <?php if($intern2){echo "checked";} ?>>
							<label>2nd</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="3_intern" value="1" <?php if($intern3){echo "checked";} ?>>
							<label>3rd</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="4_intern" value="1" <?php if($intern4){echo "checked";} ?>>
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
		 		<input type="text" style="height:150px ;width:80%" placeholder="Write something.." name="description" required="" value="<?php echo $description; ?>">
			 </div>
		</div>

		 </div>
		 <br>
		 <br>
<br>
<div align="center">
 		<div id="degEligibility" class="contain" style="position: relative; top:20px;" >
 		<div class="row">
		 	<label class="con" > BTech Eligibility :</label> <span style="padding-left: 2em;">
			 <input type="checkbox" name="btech" onclick="myFunction1()"  value="1" <?php if($btech){echo $checked;}?>></span>
		</div>
 		<div class="row">
 			
		 	<label class="con" >	 MTech Eligibility :</label><span style="padding-left: 1.92em;">
		 	<input type="checkbox" name="mtech" onclick="myFunction2()"  value="1"  <?php if($mtech){echo $checked;}?>></span>
		</div>
		<div class="row">
 			
		 	<label class="con" >	 MBA Eligibility :</label><span style="padding-left: 1.92em;">
		 	<input type="checkbox" name="mba" value="1"  <?php if($mba){echo $checked;}?>></span>
		</div>
		<div class="row">
 			
		 	<label class="con" >	 MSc Eligibility :</label><span style="padding-left: 1.92em;">
		 	<input type="checkbox" name="msc" value="1" <?php if($msc){echo $checked;}?>></span>
		</div>

		 </div>
		 </div>
		 <br>
		 <div align="center" id="myDIV1" style="<?php if(!$btech){echo "display:none";} ?>">
						<h3><span  >
							BTech Branch Eligibility
						</span>
						</h3>
						<div class="contain" >
						<p>
							<span>
							<input type="checkbox" name="B_CSE" value="1" <?php if($B_CSE){echo $checked;}?>>
							<label>CSE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_ECE" value="1" <?php if($B_ECE){echo $checked;}?>>
							<label>ECE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_EE" value="1" <?php if($B_EE){echo $checked;}?>>
							<label>EE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_ME" value="1" <?php if($B_ME){echo $checked;}?>>
							<label>ME</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_CE" value="1" <?php if($B_CE){echo $checked;}?>>
							<label>CE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="B_EIE" value="1" <?php if($B_EIE){echo $checked;}?>>
							<label>EIE</label>
							</span>
						</p>
					</div>
			</div>
						
				<div align="center" id="myDIV2" style="<?php if (!$mtech){echo "display:none";}else{echo "display:none";} ?>">
						<h3><span  >
							MTech Branch Eligibility
						</span>
						</h3>
						<div class="contain" >
						<p>
							<span>
							<input type="checkbox" name="M_CSE" value="1" <?php if($M_CSE){echo $checked;}?>>
							<label>CSE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_ECE" value="1" <?php if($M_ECE){echo $checked;}?>>
							<label>ECE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_EE" value="1" <?php if($M_EE){echo $checked;}?>>
							<label>EE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_ME" value="1" <?php if($M_ME){echo $checked;}?>>
							<label>ME</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_CE" value="1" <?php if($M_CE){echo $checked;}?>>
							<label>CE</label>
							</span>
							<span style="padding-left: 2em;">
							<input type="checkbox" name="M_EIE" value="1" <?php if($M_EIE){echo $checked;}?>>
							<label>EIE</label>
							</span>
						</p>
						</div>
				</div>
				<p>
 			
			 <label>Set Marks Criteria</label>
			 <input type="checkbox" name="marksCriteria" <?php if($marksCriteria){echo $checked;} ?> onclick="myFunction()" value="1">
			 </p>
	
	<div id="myDIV" style="position: relative;text-align: center;width:50%;left:25%;<?php if(!$marksCriteria){echo "display:none";} ?>">
		<div class="row">
				<div class="col-25">
			 <label>Class X :</label>
			 </div>
			 <div class="col-75">
			 <input type="text" name="X" value="<?php if($row2['X']){echo $row2['X'];} ?>">
			 </div>	
		</div>
		<div class="row">
			<div class="col-25">
				 <label>Class XII :</label>
			 </div>
			 <div class="col-75">
			 <input type="text" name="XII" value="<?php if($row2['XII']){echo $row2['XII'];} ?>">
			 </div>
		</div>
		<div class="row">
			<div class="col-25">
				 <label for="cpi">CPI :</label>
			 </div>
			 <div class="col-75">
			 <input type="text" name="CPI" value="<?php if($row2['CPI']){echo $row2['CPI'];} ?>">
			 </div>
		</div>
	</div>
	
	<p>
 			
 		<label>Set DOB Criteria</label>
 		<input type="checkbox" name="dobCriteria" onclick="dobEnable()" value="1" <?php if($DOBStatus==1){echo "checked";} ?>>
 		</p>
<div id="addDOB" style="position: relative;display:<?php if($DOBStatus==0){echo "none";} ?>;text-align: center;width:50%;left:25%;">
	<div class="row">
			<div class="col-25">
		 <label>Date of Birth :</label>
		 </div>
		 <div class="col-75">
		 <input type="date" name="DOB" value="<?php echo $DOB; ?>">
		 </div>	
	</div>
</div>

	<button class="button">
		<input  type="submit" value="Submit" name="update" style="background: transparent;border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;padding-right:15px;">
		</button>
	
		 </form>
</div>
 	
	
 	
 </div>
 </body>
 </html>