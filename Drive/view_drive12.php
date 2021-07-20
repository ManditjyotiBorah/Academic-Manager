 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		View/Edit Drive
 	</title>
 </head>
 <body>


 <div class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				<div align="center">
					<button >
						
					<a href="verifyAcademic.php" style="text-decoration: none;color: black;font-size: 15px;">Verify Academic Details</a>
					</button>
					<button >
						
					<a href="verifyInternship.php" style="text-decoration: none;color: black;font-size: 15px;">Verify Internship Details</a>
					</button>
					<button >
						
					<a href="Drive/add_drive.php" style="text-decoration: none;color: black;font-size: 15px;">Add Placement Drive</a>
					</button>
					<button >
						
					<a href="Drive/view_drive.php" style="text-decoration: none;color: black;font-size: 15px;">View/Edit Placement Drive</a>
					</button>
					<br>
					
	
			</div>
		</div>

<hr>
 

 	<div style="text-align: center;">
 	<h1 style=" background-color:#f2f2f2; padding:2px;border: 10px solid #f2f2f2;" >PLACEMENT DRIVES</h1>
 		
<?php 
	include '../connection.php';
	$sql = "SELECT * FROM driveschedule ORDER BY DriveDate";
	$result = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($result)) {
		# code...
	
	$sql1 = "SELECT * FROM brancheligibility WHERE ID = '".$row['ID']."'";
	$result1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$sql2 = "SELECT * FROM minimummark WHERE ID = '".$row['ID']."'";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_assoc($result2);
 ?>   <div class="con" align="center" >
	 	
 		<!--<p style=" position: absolute;box-shadow: 2px black;border: 2px black;">-->
 			<p> <span class="left"> Drive ID : </span> <span class="right" ><?php echo $row['ID']; ?></span> </p>
 			<p> <span class="left"> Drive Date : </span> <span class="right" > <?php echo $row['DriveDate']; ?></span> </p>
 			<p>Company Name : <?php echo $row['CompanyName']; ?></p>
 			<p>Package : <?php echo $row['Package']; ?></p>
 			<p>Eligibility : <?php if($row['BTechEligibility']){echo "BTech";}if($row['MTechEligibility']){echo " MTech";}if($row['MBAEligibility']){echo " and MBA";} ?></p>
 			<p>Eligible Branches : <?php if($row1['CSE']){echo "  CSE";}if($row1['ECE']){echo "  ECE";}if($row1['EE']){echo "  EE";}if($row1['ME']){echo "  ME";}if($row1['CE']){echo "  CE";}if($row1['EIE']){echo "  EIE";}if($row1['Others']){echo " Others";} ?></p>
 			<form id="edit" action="edit.php" method="post">
 				
 			<button class="edi" type="submit" name="edit" form="edit" value="<?php echo $row['ID'];?>">Edit</button>
			 </form>
			 <br>
 			<form id="delete" action="delete.php" method="post">
 			<button class="edi"  type="submit" name="delete" form="delete" value="<?php echo $row['ID'];?>">Delete</button>
 			</form>
			
			 
 			
		 <!--</p>-->
		 
		 </div>
		 <br>
		
		<br>
 <?php 
 		}
  ?>
  <p>
		<br>
	<a href="../student_coo.php" >Back</a>
 	
	</p>
 	</div>
 </body>
 </html>