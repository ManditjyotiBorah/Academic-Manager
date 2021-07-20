<?php  
	$id = $_POST["ScholarID"];
	$CompanyName = $_POST['CompanyName'];
	
	$con = mysqli_connect("localhost", "root", "", "tnp");
	$sql = "DELETE FROM internshipdetails WHERE ScholarID = $id AND CompanyName = '$CompanyName'";
	// echo $sql;  
	if(mysqli_query($con, $sql))  
	{  
		// echo 'Data Deleted';  
	}  
 ?>