<?php 
if(isset($_POST['create_excel'])){ 
session_start();
include '../connection.php';
 $status = $_POST['create_excel'];
 $drive_id = $_SESSION['drive_id'];
 if($_POST['create_excel']==1 || $_POST['create_excel']==2 || $_POST['create_excel']==0)
 {
 $sql = "SELECT * FROM driveresponses WHERE DriveID='$drive_id' AND status='$status'";
 $result = mysqli_query($con,$sql);
  if($status==1){
 $sql2 = "SELECT * FROM placementdetails WHERE DriveID = $drive_id";
							$result2 = mysqli_query($con,$sql2);
                            $row2 = mysqli_fetch_array($result2);} }
else if($_POST['create_excel']==3){
$result = mysqli_query($con,"SELECT * FROM placementdetails WHERE DriveID='$drive_id'");

}
else if($_POST['create_excel']==4){
  $result = mysqli_query($con,"SELECT * FROM driveschedule WHERE ID='$drive_id'");

}
echo $_POST['create_excel'];
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
                                 <?php 
                                          if($_POST['create_excel']==4){

                                         ?>   
                                           <th style="padding-left: 10%;text-align: center;">Sl No</th>
					<th style="padding-left: 10%;text-align: center;">Drive ID</th>
					<th style="padding-left: 10%;text-align: center;">Drive Date</th>
					<th style="padding-left: 10%;text-align: center;">Company</th>
					<th style="padding-left: 10%;text-align: center;">Package</th>

                                          <?php  }

                                        else{

                                 ?>


						 		<th scope="col" style="text-align: center;">Sl No</th>
                                 <th scope="col" style="text-align: center;">Name</th> 
                                 <th scope="col" style="text-align: center;">Scholar ID</th>
                                 <?php if($status==1){?>
                                 <th scope="col" style="text-align: center;">Placed</th><?php } } ?>
						 		</tr>
						 		</thead>
						 </div>
						 	</div> 

<?php
$i=1;
while($row = mysqli_fetch_array($result))
{ 
    if($status==3){
        $result3 = mysqli_query($con,"SELECT * FROM students WHERE ScholarID='".$row['ScholarID']."'");
        $row3 = mysqli_fetch_assoc($result3);

    }
    
    
    
    ?>
  
 <tbody>
						 	
						 <tr><?php
						     if($_POST['create_excel']==4)
                              { ?>

                            <td  style="padding-left: 10%;"><?php echo $i; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['ID']; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['DriveDate']; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['CompanyName']; ?></td >
		 			<td  style="padding-left: 10%;"><?php echo $row['Package']; ?></td >
                            



                       <?php
                              }
                            else {?>


						 	<td><?php echo $i; ?></td>
                             <td ><?php 
                             if($status==3){
                                 echo $row3['Name'];
                             }
                             else{
                             echo $row['Name'];} ?></td>
						 	<td ><?php echo $row['ScholarID']; ?></td>
						 	
                             <?php 
                              if($status==1){
						 	if ($row2['ScholarID']==$row['ScholarID']) {
						 		# code...
						 		echo "<td>Placed</td>";
						 	}else{
						
						 	echo '<td>Applied</td>';
						 	} } }
						 	 ?>
						 </tr>

						 <?php 
						 	$i++;
						 	}
						echo " </tbody>
                             </table>"; ?>
</tbody> 
  
</table>
<script>
           var excel_data = $('content').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;
        </script>                </body>


</html>

<?php
}
 header('Content-Type: application/vnd.ms-excel');  
 header('Content-disposition: attachment; filename='.rand().'.xls');  
 echo $_GET["data"];  
 ?> 