<?php  
	include 'connection.php';
	$id = $_POST["ScholarID"];
	echo $id;
	
	$sql = "UPDATE academicdetails SET Status = 1 WHERE ScholarID = $id";  

	if(mysqli_query($con, $sql))  
	{  
 		echo 'Data Verified';
}else{
		echo "Could not access database";
	}
 ?>