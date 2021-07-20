 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		View/Edit Drive
	 </title>
	 <style>
	 	.button {
					background-color: black;
					border: none;
					
					border-radius : 10px;
					color: white;
					padding: 7px 26px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 16px;
					margin: 4px 2px;
					-webkit-transition-duration: 0.4s; 
					transition-duration: 0.4s;
					cursor: pointer;
					}
					.button:hover {
					background-color: #ebe6e6; 
					text-decoration: none;
					font-weight:bold;
					color: black;
					border: 1px solid black;
					}
					.value{
						font-size: 1.2em;
						padding: 0 20px;
						border-radius: 8px;
						font-family: cursive;
					}
					.label{
						font-family: Times New Roman;
						font-weight: 700;
						font-size: 1.2em;
						
					}
	 </style>
	 
	 
 </head>
 <body style="padding-bottom: 10px; background-image: url(../images/newspaper.jpg); background-size: no-repeat;">

 <div class= "nav-bar" style="box-shadow: 5px 5px 5px gray; padding-bottom: 60px;">
		<div align= "center" ><img src="../images/NITS.png" alt="" style="width:100px;height:100px; margin:auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				<div align="center" style="float:center;">
				
				<a href="../verifyAcademic.php" style="text-decoration: none;color: white;font-size: 15px;"><button class="button">
					Verify Academic Details
					</button></a>
					
						
					<a href="../verifyInternship.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Verify Internship Details</button></a>
					
					
						
					<a href="add_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Add Placement Drive</button></a>
					
					
<!-- 						
					<a href="Drive/view_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">View/Edit Placement Drive</button></a>
					 -->
					<br>

			</div>
		</div>
		<a style="background-color: transparent;"style="text-decoration: none;"href="../student_coo.php"><button  class="button" style="position: relative; top:-40px; left:20px;">  Back</button></a>



 	<div style="text-align: center;">
 	<h1 style=" font-weight: normal; font-family: Algerian; font-size: 3em;" >PLACEMENT DRIVES</h1>
 	
<hr>	
<?php 
	include '../connection.php';
	$sql = "SELECT * FROM driveschedule ORDER BY DriveDate";
	$result = mysqli_query($con,$sql);
	
	$sql10="SELECT COUNT(ID) AS total FROM driveschedule";
	$result10 = mysqli_query($con,$sql10);
	$row10 = mysqli_fetch_assoc($result10);
	$results_per_page = 4;
	if(!isset($_GET['page']))
	{
		$page = 1;
	}
	else
	{
		$page=$_GET['page'];
	}
	$start_from = (($page-1) * $results_per_page);
	$total_pages = ceil($row10["total"]/ $results_per_page);
	$sql = "SELECT * FROM driveschedule LIMIT " .$start_from. ',' .$results_per_page;
	$result = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($result)) {
		# code...
	
	$sql1 = "SELECT * FROM brancheligibility WHERE ID = '".$row['ID']."'";
	$result1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$sql2 = "SELECT * FROM minimummark WHERE ID = '".$row['ID']."'";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_assoc($result2);
 ?>   
 <div  style=" background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #f0ede6, #ffffff  ); border-radius: 10px; width: 50%; margin: 0 auto; padding-top:10px; padding-bottom: 10px; box-shadow: 5px 5px 5px 5px gray;"  >
	 	
		<div>
 			<p><span class="label"> Drive ID : </span> <span class="value"><?php echo $row['ID']; ?></span> </p>
 			<p><span class="label"> Drive Date : </span> <span class="value"> <?php echo $row['DriveDate']; ?></span> </p>
 			<p><span class="label">Company Name : </span><span class="value"><?php echo $row['CompanyName']; ?></span></p>
 			<p><span class="label">Package : </span><span class="value"><?php echo $row['Package']; ?></span></p>
 			<p><span class="label">Eligibility :</span><span class="value"> <?php if($row['BTechEligibility']){echo "BTech";}if($row['MTechEligibility']){echo " MTech";}if($row['MBAEligibility']){echo "  MBA";}if($row['MScEligibility']){echo " and MSc";} ?></span></p>
			 <p><span class="label"> Eligible Branches : </span><span class="value"> <?php if($row['BTechEligibility'])
			 {
			 	echo "BTech :";
				 if($row1['B_CSE']){echo "  CSE";}
				 if($row1['B_ECE']){echo "  ECE";}
				 if($row1['B_EE']){echo "  EE";}
				 if($row1['B_ME']){echo "  ME";}
				 if($row1['B_CE']){echo "  CE";}
				 if($row1['B_EIE']){echo "  EIE";}
			 }	 
			 if($row['MTechEligibility'])
			 {
			 	echo " <br>MTech :";
				 if($row1['M_CSE']){echo "  CSE";}
				 if($row1['M_ECE']){echo "  ECE";}
				 if($row1['M_EE']){echo "  EE";}
				 if($row1['M_ME']){echo "  ME";}
				 if($row1['M_CE']){echo "  CE";}
				 if($row1['M_EIE']){echo "  EIE";}
			 }	
			 ?></span></p> 
 			<form id="edit" action="edit.php" method="post">
 				
 			<button class="button" href="../student_coo.php"class="edit" type="submit" name="edit" form="edit" value="<?php echo $row['ID'];?>">Edit</button>
			 </form>
			 <br>
 			<form id="delete" action="delete.php" method="post">
 			<button class="button" href="../student_coo.php"class="edit"  type="submit" name="delete" form="delete" value="<?php echo $row['ID'];?>">Delete</button>
 			</form>
			
			 
 			
		
		 </div>
		 </div>
		 <br>
		
		<br>
 <?php 
 		}
  ?>
  <a>
		<?php
		for($page=1; $page<=$total_pages; $page++)
		{
			echo "<a style='font-size: 20px;background-color:rgb(44, 43, 43);color: white;border-radius:20%;' href='view_drive.php?page=".$page."'";
			echo ">".$page."</a>&nbsp&nbsp";
		};
		?>
	</a>
  
 	</div>
 </body>
 </html>