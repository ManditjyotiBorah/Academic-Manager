<?php 

include 'dbconnect.php';

$_SESSION['success'] = "";
$errors = array(); 

if (isset($_POST['send'])) {
	
	$branch = $_POST['branch'];

	$batch = $_POST['batch'];

	$cpi = $_POST['cpi'];


	if (empty($branch)) { array_push($errors, "Branch is required"); }
	if (empty($batch)) { array_push($errors, "Batch is required"); }
	if (empty($cpi)) { array_push($errors, "CPI is required"); }
	

	if (count($errors) == 0) {

		$query = "SELECT * FROM data WHERE `branch`='$branch' AND `batch`='$batch' AND `cpi`>='$cpi'";
		$results = mysqli_query($conn, $query);

		if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $Name = $row['name'];
                $Branch = $row['branch'];
                $Batch = $row['batch'];
                $Cpi = $row['cpi'];
                $schid = $row['schid'];

                include 'upload-file.php';

                $sql="INSERT INTO drive_table(name, branch, batch, cpi, doc_file, schid)
		        values ('$Name','$Branch','$Batch','$Cpi','$fileName','$schid')";

				$reslt = mysqli_query($conn, $sql);
            }
			echo "&nbsp;Drive has been Posted!";
			exit();
        }
        else {
			echo "Your current information in not found in the Database!";
		}
		
	}
	else{
		echo "Something went wrong!";
	}
	
	

}

?>