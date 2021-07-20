<?php 
include '../connection.php';
$id =  $_POST['delete'];
$sql = "DELETE FROM driveschedule WHERE ID = $id";
$sql1 = "DELETE FROM brancheligibility WHERE ID = $id";
$sql2 = "DELETE FROM minimummark WHERE ID = $id";
mysqli_query($con,$sql2);
mysqli_query($con,$sql1);
mysqli_query($con,$sql);
        echo "<script>alert('Placement Drive(".$id.") Deleted');</script>";
        echo "<script>window.location.href = 'view_drive.php';</script>";

 ?>