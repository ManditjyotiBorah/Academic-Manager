<?php 
include 'connection.php';
if (isset($_POST['accept'])) {
session_start();
$scholarId = $_SESSION['scholarID']; 
 	$id = $_POST['accept'];
$sql = "SELECT * FROM students WHERE scholarID = '".$scholarId."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$sql1 = "SELECT * FROM driveschedule WHERE ID = $id";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$DriveDate = $row1['DriveDate'];


$query = "UPDATE driveresponses SET status =1 WHERE DriveID=$id AND ScholarID=$scholarId";
mysqli_query($con,$query);

$sql2 = "SELECT * FROM studentstats WHERE ScholarID='$scholarId'";
$result2 = mysqli_query($con,$sql2);
$num_rows = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
$id = $id.',';
if($num_rows==0)
{ 
  $sql3 = "INSERT INTO studentstats(ScholarID,applied,placed) VALUES('$scholarId','$id','')";
  mysqli_query($con,$sql3);
}
else{
  $id= $row2['applied'].$id;
  $sql3 = "UPDATE studentstats SET applied='$id',placed='' WHERE ScholarID='$scholarId'";
  mysqli_query($con,$sql3);
}
        echo "<script>alert('Successfully accepted the Drive');</script>";

        echo "<script>window.location.href = 'notification.php';</script>";

 } 
 if(isset($_POST['reject'])) {
session_start();
$scholarId = $_SESSION['scholarID']; 
 	$id = $_POST['reject'];
$sql = "SELECT * FROM students WHERE scholarID = '".$scholarId."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$sql1 = "SELECT * FROM driveschedule WHERE ID = $id";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$DriveDate = $row1['DriveDate'];


$query = "UPDATE driveresponses SET status =2 WHERE DriveID=$id AND ScholarID=$scholarId";
mysqli_query($con,$query);
        echo "<script>alert('Rejected the Drive');</script>";

        echo "<script>window.location.href = 'notification.php';</script>";

 } 
 ?>