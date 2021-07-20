<?php  
	$id = $_POST["ScholarID"];
	$con = mysqli_connect("localhost", "root", "", "tnp");
	$sql = "DELETE FROM academicdetails WHERE ScholarID = '".$id."'";  
	if(mysqli_query($con, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>s