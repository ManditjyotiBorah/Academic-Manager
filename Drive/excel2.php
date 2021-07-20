<?php 
if(isset($_POST['create_excel'])){ 
session_start();
include '../connection.php';
 $status = $_POST['create_excel'];
 

 $result = mysqli_query($con,"SELECT * FROM driveschedule");
 ?>
 <!DOCTYPE html>
<html>
<head>

</head>
<body>
						 	<div class="table-responsive" id='content'> 
						 	<table class="table">
						 		<thead>
						 			
						 		<tr>
					<th style="padding-left: 10%;text-align: center;">Sl No</th>
					<th style="padding-left: 10%;text-align: center;">Drive ID</th>
					<th style="padding-left: 10%;text-align: center;">Drive Date</th>
					<th style="padding-left: 10%;text-align: center;">Company</th>
					<th style="padding-left: 10%;text-align: center;">Package</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=1;
					while($row = mysqli_fetch_array($result))
					{ ?>
					<tr>
					    <td  style="padding-left: 10%;"><?php echo $i; ?></td >
			 			<td  style="padding-left: 10%;"><?php echo $row['ID']; ?></td >
			 			<td  style="padding-left: 10%;"><?php echo $row['DriveDate']; ?></td >
			 			<td  style="padding-left: 10%;"><?php echo $row['CompanyName']; ?></td >
			 			<td  style="padding-left: 10%;"><?php echo $row['Package']; ?></td >
		 			</tr>
		 			<?php $i++;} ?>
		 		</tbody> 
  
</table>
</div>
<script>
           var excel_data = $('content').html();  
           var page = "excel2.php?data=" + excel_data;  
           window.location = page;
        </script>                </body>


</html>

<?php
}
 header('Content-Type: application/vnd.ms-excel');  
 header('Content-disposition: attachment; filename='.rand().'.xls');  
 echo $_GET["data"];  
 ?> 