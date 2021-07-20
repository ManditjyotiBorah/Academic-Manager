<?php 
session_start();
if(isset($_POST['create_excel'])){ 
session_start();
include 'connection.php';
 $status = $_POST['create_excel'];
 

 $result = mysqli_query($con,"SELECT * FROM driveschedule");
 ?>
 <!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="table-responsive" id='content'> 
		<table>
		<thead>
			<tr>
			<th>Serial No</th>	
			<th>Scholar ID:</th>
			<th>Name:</th>
			<th>Semester 1:</th>
			<th>Semester 2:</th>
			<th>Semester 3:</th>
			<th>Semester 4:</th>
			<th>Semester 5:</th>
			<th>Semester 6:</th>
			<th>Semester 7:</th>
			<th>Semester 8:</th>
			<th>CPI:</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$sql = "SELECT * FROM academicdetails";
			$result = mysqli_query($con,$sql);
			$i = 1;
			while ($row = mysqli_fetch_assoc($result)) {
				$sql1 = "SELECT * FROM students WHERE ScholarID = ".$row['ScholarID']."";
				$result1 = mysqli_query($con,$sql1);
				$row1 = mysqli_fetch_assoc($result1);
			$year = (int)($row['ScholarID']/100000);
			$branch = $row1['Department'];
			$year = 2000 + $year;
					if($_SESSION['CPI_s']<$row['CPI']&&$_SESSION['CPI_e']>$row['CPI']&&$_SESSION['year']==$year&&$branch==$_SESSION['branch']){
						
		 ?>
			<tr>
			<td style="text-align: center;"><?php echo $i;$i++; ?></td>	
			<td style="text-align: center;"><?php echo $row['ScholarID']; ?></td>
			<td style="text-align: center;"><?php echo $row1['Name']; ?></td>
			<td style="text-align: center;"><?php if ($row['Semester1']) {
				echo $row['Semester1'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php if ($row['Semester2']) {
				echo $row['Semester2'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php if ($row['Semester3']) {
				echo $row['Semester3'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php if ($row['Semester4']) {
				echo $row['Semester4'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php if ($row['Semester5']) {
				echo $row['Semester5'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php if ($row['Semester6']) {
				echo $row['Semester6'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php if ($row['Semester7']) {
				echo $row['Semester7'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php if ($row['Semester8']) {
				echo $row['Semester8'];
			}else{
				echo "-";
			}?></td>
			<td style="text-align: center;"><?php echo $row['CPI']; ?></td>
			
			</tr>
				
		<?php } 
				}
				 ?>
		</tbody>
	</table>				 	
</div>
<script>
           var excel_data = $('content').html();  
           var page = "excelAcademic.php?data=" + excel_data;  
           window.location = page;
        </script>                </body>


</html>

<?php
}
 header('Content-Type: application/vnd.ms-excel');  
 header('Content-disposition: attachment; filename='.rand().'.xls');  
 echo $_GET["data"];  
 ?> 