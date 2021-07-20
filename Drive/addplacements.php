<?php 
error_reporting(0);
	include '../connection.php';
if(isset($_POST['addplacement'])){
$driveid = $_POST['addplacement'];
$SCID = $_POST['scholarID'];
$sql = "INSERT INTO placementdetails(DriveID, ScholarID) VALUES('$driveid', '$SCID')";
mysqli_query($con,$sql);
header("Location: view_drive.php");

}

?>
<!DOCTYPE html>
<html>
<body>
	<div style="text-align: center;">
		
	<form action="addplacements.php" method="POST">
		<p>
			<label>ScholarId :</label>
			<input type="text" name="scholarID" required>
		</p>
		<p>
			<button style="background-color: silver;" type="submit" name="addplacement" value="<?php echo $_POST['add'];?>">add</button>
		</p>
	</form>
	</div>
</body>
</html>