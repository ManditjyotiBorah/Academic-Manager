<?php 
session_start();
$_SESSION['check'] = 1;

if (!$_SESSION['username'] || $_SESSION['Type']!=1) {
        echo "<script>alert('Not Logged In');</script>";

        echo "<script>window.location.href = 'index.php';</script>";
	# code...
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student Coordinator</title>
	 <link rel="stylesheet" type="text/css" href="student_coo.css">
	 <style>
	 *{
		 font-family:candara;
	 }
	 	.button {
  background-color: black;
  border: none;
  
  border-radius : 10px;
  color: white;
  padding: 10px 32px;
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
	 </style>
 </head>
 <body style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover;font-family:Arvo;">

		<div class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin:auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				<div align="center" style="float:center;">
				
				<a href="verifyAcademic.php" style="text-decoration: none;color: white;font-size: 15px;"><button class="button">
					Verify Academic Details
					</button></a>
					
						
					<a href="verifyInternship.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Verify Internship Details</button></a>
					
					
						
					<a href="Drive/add_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Add Placement Drive</button></a>
					
					
						
					<a href="Drive/view_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">View/Edit Placement Drive</button></a>
					
					<a href="student_coo_statistics.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Placement Statistics</button></a>
					<a href="passwordChange.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Change Password</button></a>
					
					<br>
			</div>
		</div>

<hr>
 <div align= "center" class="searchbox">
 	<h2>STUDENT COORDINATOR HOME</h2>
 	<form method="post" action="guest_view.php">
 		<p>
 			<h3>Search Student Profile</h3>
 		</p>
 		<input type="text" name="scholarID" placeholder="Scholar ID">
 		<input type="submit" name="search" value="Search">
 	</form>
 	<form action="Drive/driveindex.php" method="post">
 		<p>
 			<h3>Search Placement Drives</h3>
 		</p>
 		<input type="text" name="drive_id" placeholder="Drive ID">
 		<input type="submit" name="searchDrive">
 	</form>
 	
 	<br>
 	<a href="driveByDate.php" style="background-color:transparent;color: white;text-decoration:none;"><button class="button" style="background-color: #808080;" >
						
		Search Drives By Dates
		</button></a>
	 <br>
	 <a href="logout.php" style="background-color:transparent;color: white;text-decoration:none;"><button class="button" >
						
		Log Out
		</button></a>
 	
 </div>
 </body>
 </html>