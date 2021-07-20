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
 			padding-left: 40px;
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
		}
 	</style>
 </head>
 <body style="background-image:url(images/criscros.jpg); background-size: no-repeat">

 <div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover;" class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
		<p>
		<a href="student.php" style="background-color:grey;color: white;text-decoration:none;padding: 7px 20px;border: none;border-radius: 4px;cursor: pointer;">Back</a>
		</p>	
	</div>


 	<div >
 	<h1 style="font-family: Algerian;  background-image: linear-gradient(to right,#0077b0, #83b8f7, #99c4f7, #bed8f7, #dae6f5, #e4f1f7  ); border-radius: 15px; text-align: center; margin-bottom: 0;">NOTIFICATIONS</h1>
 		<h2 style="text-align: center; background: lightgray; padding: 10px; ">
 			You are eligible for the following Drives
 		</h2>
<?php
session_start();
$scholarId = $_SESSION['scholarID']; 
include 'connection.php';
$dept = (integer)(($scholarId%10000)/1000) ; 
if($dept == 1)
	$branch = 'CE';
if($dept == 2)
	$branch = 'ME';
if($dept == 3)
	$branch = 'EE';
if($dept == 4)
	$branch = 'ECE'; 
if($dept == 5)
	$branch = 'CSE';
if($dept == 6)
	$branch = 'EIE';
$sqli = "SELECT * from academicdetails where ScholarID = ".$scholarId." AND Status = 1";//Status to be kept at 1 at last
$result = mysqli_query($con,$sqli);
$row = mysqli_fetch_assoc($result);
$X = $row['X'];
$XII = $row['XII'];
$CPI = $row['CPI'];


$sql = "SELECT * FROM driveschedule";
	$result = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($result)) {
		# code...
	
	$sql1 = "SELECT * FROM brancheligibility WHERE ID = '".$row['ID']."'";
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
if ($row3['DriveID']) {
	$accepted = 1;
}else{
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

	if ($brancheligibility == 1 && $minimummark == 1 && $days <= 15 && $days >= 0) {
		
 ?>
 <div class="container" style="background-color: #f2f2f2;border-radius: 10px; width: 50%; padding-top:10px; padding-bottom:10px;" >
<p >
 			<p><span class="label">Drive ID : </span><span class="value"><?php echo $row['ID']; ?></span></p>
 			<p><span class="label">Drive Date : </span><span class="value"><?php echo $row['DriveDate']; ?></span></p>
 			<p><span class="label">Company Name : </span><span class="value"><?php echo $row['CompanyName']; ?></span></p>
 			<p><span class="label">Package : </span><span class="value"><?php echo $row['Package']; ?></span></p>
 	<?php 
 		if ($accepted) { 					
 				echo "<h3>Placement Drive Registered</h3><br>";
 			}
 		else{

 	 ?>
 			<form action="accept_drive.php" method="post">
 				<button style="background-color:grey;color: white;text-decoration:none;padding: 7px 20px;border: none;border-radius: 4px;cursor: pointer;" name="accept" value="<?php echo $row['ID'];?>">Accept</button>
 			</form>
 			<?php  } ?>

 			
 		</p>
		 </div>
		 <br>
 		 <?php 
 	}
 		}
  ?>  
 </div>
</body>
</html>