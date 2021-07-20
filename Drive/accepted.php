<?php
session_start();
include '../connection.php'; 
if (isset($_POST['Placed'])){
	$DriveID = $_SESSION['drive_id'];
	$ScholarID = $_POST['Placed'];
	 $sql = "INSERT INTO placementdetails (DriveID,ScholarID) VALUES ('$DriveID','$ScholarID')";
	 mysqli_query($con,$sql);
	 $sql2 = "SELECT * FROM driveschedule WHERE ID = $DriveID";
    $result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($result2);
$companyname = $row2['CompanyName'];
$drivedate = $row2['DriveDate'];
  $driveyear= explode('-',$drivedate)[0];
    $drivemonth = explode('-',$drivedate)[1];
    $driveday = explode('-',$drivedate)[2];
    if($driveday>30 && $drivemonth>06)
    {  $driveyear = $driveyear."-".($driveyear+1);
    }
    else{
       $driveyear = ($driveyear-1)."-".$driveyear;
    }
$sql3 = "SELECT * FROM placementdetails WHERE DriveID = $DriveID";
$placed = mysqli_num_rows(mysqli_query($con,$sql3));
$sql4 ="UPDATE stats SET placed='$placed' WHERE CompanyName='$companyname' AND driveyear='$driveyear' AND ID ='$DriveID'";
 mysqli_query($con,$sql4);
$sql5 = "SELECT * FROM studentstats WHERE ScholarID='$ScholarID'";
$row5 = mysqli_fetch_assoc(mysqli_query($con,$sql5));
$DriveID=$row5['placed'].$DriveID.',';
$sql6 = "UPDATE studentstats SET placed='$DriveID' WHERE ScholarID='$ScholarID'";
mysqli_query($con,$sql6);
        echo "<script>alert('Placement Added');</script>";

        echo "<script>window.location.href = 'accepted_list.php';</script>";

}
else{
	$username = $_SESSION['username'];
	session_destroy();
	session_start();
	$_SESSION['username'] = $username;
        echo "<script>window.location.href = '../student_coo.php';</script>";

}
 ?>
