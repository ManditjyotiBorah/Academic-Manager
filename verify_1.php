<?php  
	include 'connection.php';
	$id = $_POST["ScholarID"];
	$CompanyName = $_POST['CompanyName'];
	echo $id;
	
	$sql = "UPDATE internshipdetails SET Status = 1 WHERE ScholarID = $id AND CompanyName = '$CompanyName'";  
// echo "$sql";
	if(mysqli_query($con, $sql))  
	{  
 		// echo 'Data Verified';
}else{
		echo "Could not access database";
	}
 ?>