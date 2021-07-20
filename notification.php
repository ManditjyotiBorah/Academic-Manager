 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		NOTIFICATIONS
 	</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<style>
 		.container{
 			box-shadow: 5px 5px 5px 5px gray;
 			margin: 30px auto;
 			padding-left: 20px;
 			background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #f0ede6, #ffffff  );
			width: 50%;
 		}
 		.value{
			font-size: 1.2em;
			padding: 0 20px;
			border-radius: 8px;
		}
		.label{
			font-family: Times New Roman;
			font-weight: 700;
			font-size: 1.2em;
			margin-left: 30%;
		}
		.btn:hover{
			opacity: 0.7;
		}
		.accept_reject{
			background-color: transparent; text-decoration: none;height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; 
			position: relative;
				
			}
		@media screen and (max-width: 800px){
			.container{
				width: 100%;
				font-size: 0.6em;
			}
		}
 	</style>

 </head>
 <body style="background-image: url(images/light.jpg); background-size: cover;">
 <div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="student.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>

<div style="margin-top: 30px; " class="container-fluid">
 	<div style="text-align: center;">
 	<h1 style="font-family: Algerian; text-align: center; ">NOTIFICATIONS</h1>
 		<h2 style="text-align: center; background: lightgray; padding: 10px; font-family: Lucida Console; font-size: 1.2em;" >
 			You are eligible for the following Drives
 		</h2>
<?php
session_start();
$scholarId = $_SESSION['scholarID']; 
include 'connection.php';
$dept = (integer)(($scholarId%10000)/1000) ; 
if((($scholarId/10000)%10) ==1)
{
	if($dept == 1)
		$branch = 'B_CE';
	if($dept == 2)
		$branch = 'B_ME';
	if($dept == 3)
		$branch = 'B_EE';
	if($dept == 4)
		$branch = 'B_ECE'; 
	if($dept == 5)
		$branch = 'B_CSE';
	if($dept == 6)
		$branch = 'B_EIE';
}
if((($scholarId/100000)%10) ==2)
{
	if($dept == 1)
		$branch = 'M_CE';
	if($dept == 2)
		$branch = 'M_ME';
	if($dept == 3)
		$branch = 'M_EE';
	if($dept == 4)
		$branch = 'M_ECE'; 
	if($dept == 5)
		$branch = 'M_CSE';
	if($dept == 6)
		$branch = 'M_EIE'; 
}
$sqli = "SELECT * from academicdetails where ScholarID = ".$scholarId." AND Status = 1";//Status to be kept at 1 at last
$result = mysqli_query($con,$sqli);
$row = mysqli_fetch_assoc($result);
$X = $row['X'];
$XII = $row['XII'];
$CPI = $row['CPI'];


$sql = "SELECT * FROM driveschedule ORDER BY ID DESC ";
$result = mysqli_query($con,$sql);


	
	while ($row = mysqli_fetch_array($result)) 
	{
		# code...
					if ($row["Type"]==0){
						
					$sql1 = "SELECT * FROM brancheligibility WHERE ID = '".$row['ID']."'" ;
					$result1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_assoc($result1);
					$sql2 = "SELECT * FROM minimummark WHERE ID = '".$row['ID']."'";
					$result2 = mysqli_query($con,$sql2);
					$row2 = mysqli_fetch_assoc($result2);
					$brancheligibility =  $row1[$branch] ;
					$driveID = $row['ID'];
					$sql5 = "SELECT * FROM driveresponses WHERE DriveID = $driveID AND ScholarID = $scholarId";
					$result3 = mysqli_query($con,$sql5);
					$row3 = mysqli_fetch_assoc($result3);
					$sql8 = "SELECT * FROM dobeligibility WHERE ID = $driveID";
					$result8 = mysqli_query($con,$sql8);
					$row8 = mysqli_fetch_assoc($result8);

					$sql_1 = "SELECT * FROM students WHERE ScholarID = $scholarId ";
					$result_1 = mysqli_query($con,$sql_1);
					$row_1 = mysqli_fetch_assoc($result_1);

					$dobStudent = date_create($row_1['DOB']);
					$dobReq = date_create($row8['DOB']);
					$dobdiff = date_diff($dobReq,$dobStudent);
					$dobDays = $dobdiff->format('%R%a');


					if ($row3['status']==1) {
						$accepted = 1;
					}
					else if($row3['status']==2)
					{
					
					$accepted = 2 ;
					}
					else{
						$accepted = 0;
					}
					
					$presentdate = date_create(date("Y-m-d"));
					$drivedate = date_create($row['DriveDate']);
					
					$diff = date_diff($presentdate,$drivedate);
					$days = $diff->format('%R%a'); 
					
					
						if ($row1['MarksCriteria']) {
							# code...
							if ($X >= $row2['X'] && $XII >= $row2['XII'] && $CPI >= $row2['CPI']) {
								$minimummark = 1;
							}else{
								$minimummark = 0;
							}
						}else{
							$minimummark = 1;
						}
					
						if ($brancheligibility == 1 && $minimummark == 1 && $days <= 15 && $days >= 0 && $dobDays >=0) {
							
					?>
					<div class="container" style="background-color: #f2f2f2;border-radius: 10px; padding-top:10px; padding-bottom:10px; text-align: left;" >
					<p>
								<p><span class="label">Drive ID :&nbsp&nbsp&nbsp&nbsp </span><span class="value"><?php echo $row['ID']; ?></span></p>
 								<p><span class="label">Drive Date : </span><span class="value"><?php echo $row['DriveDate']; ?></span></p>
 								<p><span class="label">Company : &nbsp&nbsp</span><span class="value"><?php echo $row['CompanyName']; ?></span></p>
 								<p><span class="label">Package : &nbsp&nbsp&nbsp&nbsp</span><span class="value"><?php echo $row['Package']; ?></span></p>
 								<p><div align="center">
 									
 								<form style="display: inline-block" action="drivedescription.php" method="post" >
									<button class="accept_reject" name="description" value="<?php echo $row['ID'];?>" style="background: #434744;">Description</button>
								</form></p>
 								</div>
						<?php 
							if ($accepted==1) { 					
									echo "<h3 align='center' style='font-family: cursive;'>Placement Drive Registered</h3><br>";
								}
					#new code
							else if($accepted==2){
								echo "<h3 align='center' style='font-family: cursive;'>Placement Drive Rejected</h3><br>";}
							else{
								
						?>
						<div align="center">
								<form style="display: inline-block" action="accept_drive.php" method="post">
									<button class="accept_reject" name="accept" value="<?php echo $row['ID'];?>" style="background: #299e33;">Accept</button>
								</form>
								<form style="display: inline-block" action="accept_drive.php" method="post">
									<button class="accept_reject" name="reject" value="<?php echo $row['ID'];?>" style="background: #b8372e;">Reject</button>
								</form>
								<?php  } ?>
						</div>
								
					</p>
					</div>
							<?php 
						}
					}
				}
				
			
						?>
		
	 </div>
	 </body>
	 </html>