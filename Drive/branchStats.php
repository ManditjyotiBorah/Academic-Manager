<?php 
session_start();
error_reporting(0);
include "../connection.php";
if (isset($_POST['submit'])) {
	$branch = $_POST['branch'];
	$_SESSION['branch']=$branch;
	$Year = $_POST['year'];
	$_SESSION['year'] = $Year;
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Branchwise Statistics</title>
</head>
<body>
	<div align="center">
		<form action="" method="post">
			<label>Branch :</label>
			<select name="branch">
				<option value="CE" <?php if($_SESSION['branch']=="CE"){echo "selected";} ?>>Civil</option>
				<option value="ME" <?php if($_SESSION['branch']=="ME"){echo "selected";}?>>Mechanical</option>
				<option value="EE" <?php if($_SESSION['branch']=="EE"){echo "selected";}?>>Electrical</option>
				<option value="ECE" <?php if($_SESSION['branch']=="ECE"){echo "selected";}?>>Electronics & Communication</option>
				<option value="CSE" <?php if($_SESSION['branch']=="CSE"){echo "selected";}?>>Computer Science</option>
				<option value="EIE" <?php if($_SESSION['branch']=="EIE"){echo "selected";}?>>Electronics & Instrumentation</option>
			</select>
			<br>
			<br>
			<label>Enrollment Year(Ex-20XX) :</label>
			<input type="number" name="year" required="" value="<?php echo $_SESSION['year']; ?>">
			<br>
			<br>
			<input type="submit" name="submit" value="Search">
		</form>
	</div>
	<?php 
	if ($_POST['submit']) {
		
		$sql = "SELECT * FROM students WHERE Department = '$branch'";
		$result = mysqli_query($con,$sql);
		$total = 0;
		$eligible = 0;
		$placed = 0;
		$totalHigher = 0;
		$jobsHigher=0;
		$placedHigher=0;
		while ($row = mysqli_fetch_assoc($result)) {
			$year = (int)($row['ScholarID']/100000);
			$year = 2000 + $year;
			if ($year==$Year) {
				++$total;
				if ($row['HigherStudies']==1) {
					++$totalHigher;	
					if ($row['Jobs']) {
									++$jobsHigher; 
								}			
				}
			}
			$sql1 = "SELECT * FROM academicdetails WHERE ScholarID = ".$row['ScholarID']." AND CPI > 7";
			$result1 = mysqli_query($con,$sql1);
			while ($row1 = mysqli_fetch_assoc($result1)) {
			if ($year==$Year) {
				++$eligible;

			}
		}
			$sql2 = "SELECT DISTINCT * FROM placementdetails WHERE ScholarID = ".$row['ScholarID']."";
			$result2 = mysqli_query($con,$sql2);
			while ($row2 = mysqli_fetch_assoc($result2)) {
			if ($year==$Year) {
				++$placed;
				if ($row['HigherStudies']==1) {
					++$placedHigher;
				}
			}
		}
		}
	 ?>
	<div align="center">
		<h1>Branch <?php echo $branch; ?></h1>
		<b>Total Students: <?php echo $total; ?></b><br><br>
		<b>Eligible for Jobs: <?php echo $eligible; ?></b><br><br>
		<b>Total Students Placed: <?php echo $placed; ?></b><br><br>	
	</div>
	<div align="center">
		<h1>Intrested In Higher Studies</h1>
		<table>
			<thead>
				<tr>
					<th>Total</th>
					<th>Interested in Jobs</th>
					<th>Not Interested in Jobs</th>
					<th>Placed</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td align="center"><?php echo $totalHigher; ?></td>
					<td align="center"><?php echo $jobsHigher; ?></td>
					<td align="center"><?php echo $totalHigher-$jobsHigher; ?></td>
					<td align="center"><?php echo $placedHigher; }?></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>