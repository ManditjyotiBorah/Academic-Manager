 <?php
session_start();
$scholarID = $_SESSION['scholarID'];
include 'connection.php';
$sql = "SELECT * from students where ScholarID = ".$scholarID."";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
	$Name = $_POST['Name'];
	$Degree = $_POST['Degree'];
	$PhoneNumber = $_POST['PhoneNumber'];
	$EmailID = $_POST['EmailID'];
	$DOB = $_POST['DOB'];
	$FatherName = $_POST['FatherName'];
	$MotherName = $_POST['MotherName'];
	$PermanentAddress = $_POST['PermanentAddress'];
	$CurrentAddress = $_POST['CurrentAddress'];
	$Department = $_POST['Department'];
	$Jobs = $_POST['Jobs'];
	$HigherStudies= $_POST['HigherStudies'];
	if ($HigherStudies) {
	$ExamsAppeared= $_POST['ExamsAppeared'];
	$Performance= $_POST['Performance'];
	}else{
		$ExamsAppeared = '';
		$Performance = '';
	}
if ($row['ScholarID']) {
	# code...
	echo "string";
	 $sql2 = "UPDATE students SET Name = '$Name' ,Degree='$Degree',PhoneNumber='$PhoneNumber',EmailID='$EmailID',DOB='$DOB',FatherName='$FatherName',MotherName='$MotherName',PermanentAddress='$PermanentAddress',CurrentAddress='$CurrentAddress',Department='$Department',Jobs='$Jobs',HigherStudies='$HigherStudies',ExamsAppeared='$ExamsAppeared',Performance='$Performance' WHERE ScholarID ='$scholarID'";
	 mysqli_query($con,$sql2);
	 echo $sql2;
 		header("Refresh:0");
}else{
	$sql2 = "INSERT INTO students (ScholarID,Name,Degree,PhoneNumber,EmailID,DOB,FatherName,MotherName,PermanentAddress,CurrentAddress,Department,Jobs,HigherStudies,ExamsAppeared,Performance) VALUES ('$scholarID','$Name','$Degree','$PhoneNumber','$EmailID','$DOB','$FatherName','$MotherName','$PermanentAddress','$CurrentAddress','$Department','$Jobs','$HigherStudies','$ExamsAppeared','$Performance')";
	echo $sql2;
	 mysqli_query($con,$sql2);
 		header("Refresh:0");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>

	<link rel="stylesheet" href="personal.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript">
 		function higher() {
  var x = document.getElementById("examDetails");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
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

			/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
			@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
			}



			.cards-list {
				position : relative;
				left: 15%;
					z-index: 0;
					width: 70%;
					display: flex;
					justify-content: space-around;
					flex-wrap: wrap;
					
					}

					.card {
					margin: 40px auto;
					width: 200px;
					height: 200px;
					border-radius: 40px;
					box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
					cursor: pointer;
					transition: 0.4s;
					}

					.card .card_image {
					width: inherit;
					height: inherit;
					border-radius: 40px;
					}

					.card .card_image img {
					width: inherit;
					height: inherit;
					border-radius: 40px;
					object-fit: cover;
					}

					.card .card_title {
					text-align: center;
					border-radius: 0px 0px 10px  10px;
					font-family: sans-serif;
					font-weight: bold;
					font-size: 15px;
					margin-top: -10px; 
					height: 40px;
					}

					.card:hover {
					
					box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25), 
						-5px -5px 30px 15px rgba(0,0,0,0.22);
					}
					.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}

					@media all and (max-width: 500px) {
					.card-list {
						/* On small screens, we are no longer using row direction but column */
						flex-direction: column;
					}
					}

					.button {
					background-color: black;
					border: none;
					
					border-radius : 10px;
					color: white;
					padding: 5px 10px;
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


					.custom-file-input::-webkit-file-upload-button {
					visibility: hidden;
					}
					.custom-file-input::before {
						position : relative;
						top: 3px;
					content: 'Select file';
					display: inline-block;
					background: linear-gradient(top, #f9f9f9, #e3e3e3);
					border: 1px solid #999;
					border-radius: 3px;
					background-color: black;
					color: white;
					padding: 5px 8px;
					outline: none;
					white-space: nowrap;
					-webkit-user-select: none;
					cursor: pointer;
					
					font-weight: 700;
					font-size: 10pt;
					}
					.custom-file-input:hover::before {
					background-color:#ebe6e6;
					
					color : black;
					font-weight: bold;
					}
					.custom-file-input:active::before {
					background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
					}
					input[type="file"]{
						border-radius: 15px;
						font-size: 0.8em;
						border: 1px solid gray;
						width: 200px;
						background: lightgray;
						font-family: Arial;
						color: blue;
						
					}
					
					
					
</style>
</head>
<body style="margin:0; padding: 0; background-image: url(images/light.jpg); background-size: cover;">
<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); box-shadow: 5px 5px 5px 5px gray; background-size: cover;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="student.php"><button style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>



<div  class="container-fluid" style="margin-top: 30px;">
<h1 align="center" style="font-family: Algerian;">
	 		Update Personal Details
	 	</h1><hr>



	<div align="center" class="cards-list">
  
	<div class="card 1">
	<div class="card_image">
	  <img src="uploads/profilepic<?php echo $scholarID;?>.jpg" />
	  
	</div>
	
	<form action="updateimage.php" method="POST" enctype="multipart/form-data">
                
					<input type="file" name="file" accept=".jpg,.jpeg,.png">
				
                <button   class="button"type="submit" name="upload">Upload</button>
            </form>

			<div class="card_title">
	  <p>Photo</p>
	</div>
  </div>


  <div class="card 2">
	<div class="card_image"> <img src="uploads/adhaar<?php echo $scholarID;?>.jpg" /> 
	
	</div>
	
	<form action="updateimage.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" accept=".jpg,.jpeg,.png">
                <button  class="button" type="submit" name="uploadAdhaar">Upload</button>
            </form>

			<div class="card_title">
	  <p>Adhaar Card</p>
	</div>
  </div>
  
	<div class="card 3">
	<div class="card_image">
	  <img src="uploads/pan<?php echo $scholarID;?>.jpg" />
	  
	</div>
	
	<form action="updateimage.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" accept=".jpg,.jpeg,.png">
                <button  class="button" type="submit" name="uploadPan">Upload</button>
            </form>

			<div class="card_title">
	  <p>PAN Card</p>
	</div>
  </div>
  </div>
	<div class="contan" style="position: relative; text-align: center;width:50%;left:25%;top: 80px;">

	<form method="post" action="updatePersonal.php">
	<div class="row">
		<div class="col-25">
			<label for="ScId">Scholar ID : </lebel>
		</div>
		<div class="col-75">
			<input type="text" name="scholarID" disabled="" value=<?php echo $scholarID;?>>	
		</div>
	</div>
	<div  class="row">
		<div class="col-25">
			<label for="name"> Name : </label>
		</div>
		<div class="col-75">
		<input type="text" name="Name" value="<?php echo $row['Name'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="degree">Degree : </label>
		</div>
		<div class="col-75">
		<select name="Degree">
			<option value="B.Tech">B.Tech</option>
			<option value="M.Tech">M.Tech</option>
			<option value="MBA">MBA</option>
		</select>
		</div>
	</div>
	
	<div class="row">
		<div class="col-25">
			<label for="ph-num">Phone Number : </label>
		</div>
		<div class="col-75">
			<input type="text" name="PhoneNumber" value="<?php echo $row['PhoneNumber'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="mail">Email ID : </label>
		</div>
		<div class="col-75">
			<input type="text" name="EmailID" value="<?php echo $row['EmailID'];?>">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="DOB">Date of Birth : </label>
		</div>
		<div class="col-75">
			<input type="date" name="DOB" value="<?php echo $row['DOB'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="fname">Father Name : </label>
		</div>
		<div class="col-75">
			<input type="text" name="FatherName" value="<?php echo $row['FatherName'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="mname">Mother Name : </label>
		</div>
		<div class="col-75">
			<input type="text" name="MotherName" value="<?php echo $row['MotherName'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="pAddress">Permanent Address : </label>
 		</div>	
		 <div class="col-75">
			<input type="text" name="PermanentAddress" value="<?php echo $row['PermanentAddress'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="cAddress">Current Address : </label>
		</div>
		<div class="col-75">
			<input type="text" name="CurrentAddress" value="<?php echo $row['CurrentAddress'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="dept">Department : </label>
		</div>
		<div class="col-75">
		<!-- <input type="text" name="Department" value="<?php echo $row['Department'];?>"> -->
		<select name="Department" size="1">
			<option value="CSE" selected="selected">Computer Science and Engineering</option>
			<option value="ECE">Electronics and Communication</option>
			<option value="EE">Electrical Enginering</option>
			<option value="EIE">Electronics and Instrumentation Engineering</option>
			<option value="ME">Mechanical Engineering</option>
			<option value="CE">Civil Engineering</option>
		</select>
		</div>
	</div>
	<div class="row">
		<div class="col-55">
			<label for="higherStudies">Interested for Jobs :</label>
		</div>
		<div class="col-45">
			<input type="checkbox" name="Jobs" <?php if ($row['Jobs']) {echo "checked=''";} ?> value="1" style="position: relative;top: 15px;width: 20px;height: 20px;float: left;">
		</div>
	</div>
	<div class="row">
		
		<div class="col-55">
			<label for="higherStudies">Interested for Higher Studies :</label>
		</div>
		<div class="col-45">
			<input type="checkbox" value="1" name="HigherStudies" style="position: relative;top: 15px;width: 20px;height: 20px;float: left;" onclick="higher()" <?php if ($row['HigherStudies']) {echo "checked=''";} ?> >
		</div>
		<div id="examDetails" <?php if ($row['HigherStudies']==0){echo "style='display:none;'";}?> >
			<div class="col-25">
			<label for="examName">Exams Appeared for :</label>
			</div>
			<div class="col-75">
			<input type="text" name="ExamsAppeared" value="<?php echo $row['ExamsAppeared']; ?>">
			</div>
			<div class="col-25">
			<label for="examRanks">Performance in Exams :</label>
			</div>
			<div class="col-75">
			<input type="text" name="Performance" value="<?php echo $row['Performance']; ?>">
			</div>
		</div>
	</div>

	

	<button class="button">
	<input class="button" type="submit" name="submit" style="background: transparent;border: 5px;padding: 0 20px;">
	</button>
	</form><br>
	<p>
	<button style=" border-radius: 10px; padding: 0;"><a style="color: white; text-decoration: none;" href="Resumes.php">Upload Resume</a></button>
	</p>
	</div>


	
           
			
	
</div>

</body>
</html>