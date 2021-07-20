<?php 
session_start();
include 'connection.php';
$ScholarID = $_SESSION['scholarID'];
$sql = "SELECT * FROM academicdetails WHERE ScholarID = $ScholarID AND Status = 0";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$X = $row['X'];
$XII = $row['XII'];
$Semester1 = $row['Semester1'];
$Semester2 = $row['Semester2'];
$Semester3 = $row['Semester3'];
$Semester4 = $row['Semester4'];
$Semester5 = $row['Semester5'];
$Semester6 = $row['Semester6'];
$Semester7 = $row['Semester7'];
$Semester8 = $row['Semester8'];
$array = [$Semester1,$Semester2,$Semester3,$Semester4,$Semester5,$Semester6,$Semester7,$Semester8];
		$j=0;
		$CPI=0;
		for($i = 0;$i<8;$i++){
		if($array[$i]!=0){
		    $CPI = $CPI+$array[$i];
		    $j++;
		}
	}
		if($j!=0){
   			 $CPI = $CPI/$j;

		}
		else{
    		$CPI="Not Available";
		}
		$sql = "UPDATE academicdetails SET CPI = '$CPI' WHERE ScholarID = '$ScholarID'";
 		mysqli_query($con,$sql);
 		echo '<script>window.location.href="academicDetailsUpload.php"</script>';
 ?>