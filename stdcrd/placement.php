
<?php
 include('header.php')
?>


<?php include 'drive_handler.php'; ?>

<!-- placement form -->
<form action="" method="POST" enctype="multipart/form-data" name="drive-form">
	Select file to upload:
	<input type="file" name="drive">
	<!-- <input type="submit" value="Upload File" name="submit"> -->

	<!-- <?php// include 'upload-file.php' ?> -->

	<br>

	<h2>Send To -</h2>
	<br>

	<?php include('errors.php'); ?>
	
	<table>
		<tr>						
			<td>
				<h3>Branch</h3>
				<select name="branch" multiple>
					<option>Civil</option>
					<option>Mechanical</option>
					<option>Electrical</option>
					<option>ECE</option>
					<option>CSE</option>
					<option>EIE</option>
				</select>
			</td>
			<td>
				<h3>Batch</h3>
				<select name="batch" multiple>
					<option>2019</option>
					<option>2020</option>
					<option>2021</option>
					<option>2022</option>
					<option>2023</option>
					<option>2024</option>
				</select>
			</td>

			<td>
				<h3>Enter CPI</h3>
				<input type="number" step="0.01" name="cpi">
			</td>
									
		</tr>
	</table>

	<br>

    <input type="submit" name="send" value="SEND">

</form>

<?php
    // include('dbconnect.php');

    // if (isset($_POST['show'])) {

    //     $branch = $_POST['branch'];
    //     $batch = $_POST['batch'];
    //     $cpi = $_POST['cpi'];


    //     $sql = "SELECT * FROM `data` WHERE `branch`='$branch' AND `batch`='$batch' AND `cpi`>='$cpi'";

    //     $result = mysqli_query($conn, $sql);

    //     if (mysqli_num_rows($result) > 0) {
    //         while ($DataRows = mysqli_fetch_assoc($result)) {
    //             $Name = $DataRows['name'];
    //             $Branch = $DataRows['branch'];
    //             $Batch = $DataRows['batch'];
    //             $Cpi = $DataRows['cpi'];
    //         ?>
                 <!-- <tr>
                     <td><?php// echo $Name; ?></td>
                     <td><?php// echo $Branch; ?></td>
                     <td><?php// echo $Batch; ?></td>
                     <td><?php// echo $Cpi; ?></td>
                 </tr> -->
                 <?php
                
    //         }
            
    //     } else {
    //         echo "<tr><td>No Record Found</td></tr>";
    //     }
    // }

?>



<!--include header part of html-->
<?php include('footer.php') ?>

