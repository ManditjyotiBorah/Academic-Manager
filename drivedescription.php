<?php
session_start();
error_reporting(0);
include 'connection.php';
 if(isset($_POST['description'])){
$driveid =  $_POST['description'];
$result = mysqli_query($con, "SELECT * FROM driveschedule WHERE ID='$driveid'");
$result1 = mysqli_query($con, "SELECT * FROM brancheligibility WHERE ID='$driveid'");
$result2 = mysqli_query($con, "SELECT * FROM minimummark WHERE ID='$driveid'");
$row = mysqli_fetch_assoc($result);
$row1 = mysqli_fetch_assoc($result1);
$row2 = mysqli_fetch_assoc($result2);
 }

?>
<!DOCTYPE html>
<html>
<head>
 	
<style>
	* {
			box-sizing: border-box;
			font-family: Arvo;
			}

			input[type=text], select, textarea {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
			}

			label {
			padding: 12px 12px 12px 0;
			display: inline-block;
			font-weight: bold;
			}

			input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
			}

			input[type=submit]:hover {
			background-color: #45a049;
			}

			.container {
			border-radius: 5px;
			background-color: #f2f2f2;
			background-opacity:0.5;
			padding: 20px;
			}

			.col-25 {
			float: left;
			width: 25%;
			margin-top: 6px;
			}

			.col-75 {
			float: left;
			width: 75%;
			margin-top: 6px;
			}

			/* Clear floats after the columns */
			.row:after {
			content: "";
			display: table;
			clear: both;
			}

			
			@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
			}

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
					
				* {box-sizing: border-box;}
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    height:200;
    width:50%;
    position: relative;
    left: 380px;
    font-weight: 560;
    
  }






  .block input[type=text],select,textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }


  .block input[type=number], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  .block input[type=date], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }

  .block input[type=submit] {
    background-color: #362929;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .block input[type=submit]:hover {
    background-color: #362929;
  }
  a:link, a:visited {
    background-color:rgb(44, 43, 43);
    color: white;
    

    text-align: center;
    text-decoration: none;
    /* display: inline-block; */
  }
  
  a:hover, a:active {
    background-color: rgb(44, 43, 43);
  }


</style>

 	<title>Add Placement Drive</title>
 </head>
 
<body  style="padding-bottom: 10px; background-image: url(images/light.jpg); background-size: cover;">
 <div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin:auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				<div align="center" style="float:center;">
					
					<br>

			</div>
		</div>
        <button name="backdescription" class= "button" style="position: relative; top:-50px;left:20px;"><a style="text-decoration: none;" href="<?php echo $_SESSION['present']; ?>">Back</a></button>
        

<script>
function goBack() {
  window.history.back();
}
</script>
<hr>

<div class="block" style="text-align: center;">
 	<h1><span style="font-family: Algerian;">
		 Drive Description
	</span>

 	</h1>
	 <div class="contan" style="position: relative;text-align: center;width:50%;left:25%;top: 80px;" >

 		<div class="row">
 			<div class="col-25">
		 	<label for="cName">Drive ID : </label>
			 </div>
			 <div class="col-75">
		 	<?php echo $driveid; ?>
			 </div>
		</div>	<div class="row">
 			<div class="col-25">
		 	<label for="cName">Company Name : </label>
			 </div>
			 <div class="col-75">
		 	<?php echo $row['CompanyName']; ?>
			 </div>
		</div>
 		<div class="row">
			<div class="col-25">
		 	<label for="dDate">Drive Date : </label>
			 </div>
			 <div class="col-75">
		 	<?php echo $row['DriveDate']; ?>
			 </div>
		</div>
 		<div class="row">
		 	<div class="col-25">
		 	<label for="pack">Package : </label>
			 </div>
			 <div class="col-75">
		 	<?php echo $row['Package']; ?>
			 </div>
		</div>
 		<div class="row">
 			<div class="col-25">
		 		<label for="category">Category : </label>
			</div>
			<div class="col-75">
		 		<?php echo $row['Category']; ?>
			 </div>
		</div>
		<div class="row">
			<div class="col-25">
		 		<label for="type">Type : </label>
			 </div>
			 <div class="col-75">
		 		<?php if($row['Type']==1){echo "Internship";}else{echo "Jobs";} ?>
			 </div>
		</div>

 		<div class="row">
 			<div class="col-25">
		 		<label>Description :</label>
			 </div>
			 <div class="col-75">
		 		<?php echo $row['Description']; ?>
			 </div>
		</div>

		 </div>
		 <br>
		 <br>
<br>
 		<div class="container" style="position: relative; top:20px;" >
 		<div class="row">
		 	<label class="con" ><h1 style="font-family:courier,arial,helvetica;">ELIGIBILITY</h1> </label> <span style="padding-left: 2em;">
			
		</div>
 		

		 </div>
		 <br>
         <?php if ($row['BTechEligibility'] == 1) {?>
		 <div id="myDIV1">
						<h3><span  >
							BTech Branch Eligibility
						</span>
						</h3>
						<div class="container" >
						<p><?php if ($row1['B_CSE'] == 1) {?>
							<span>
							<label>CSE</label>
							</span>
                          <?php }
    if ($row1['B_ECE'] == 1) {?>
							<span style="padding-topleft: 2em;">
							<label>ECE</label>
							</span>
                            <?php }
    if ($row1['B_EE'] == 1) {?>
							<span style="padding-left: 2em;">
							<label>EE</label>
							</span>
                            <?php }
    if ($row1['B_ME'] == 1) {?>
							<span style="padding-left: 2em;">

							<label>ME</label>
							</span>
                            <?php }
    if ($row1['B_CE'] == 1) {?>
							<span style="padding-left: 2em;">

							<label>CE</label>
							</span>
                            <?php }
    if ($row1['B_EIE'] == 1) {?>
							<span style="padding-left: 2em;">
							<label>EIE</label>
							</span>
                            <?php }?>
						</p>
					</div>
			</div>
            <?php }
if ($row['MTechEligibility'] == 1) {?>

				<div id="myDIV2">
						<h3><span  >
							MTech Branch Eligibility
						</span>
						</h3>
						<div class="container" >
						<p><?php if ($row1['M_CSE'] == 1) {?>
							<span>
							<label>CSE</label>
							</span>
                          <?php }
    if ($row1['M_ECE'] == 1) {?>
							<span style="padding-left: 2em;">
							<label>ECE</label>
							</span>
                            <?php }
    if ($row1['M_EE'] == 1) {?>
							<span style="padding-left: 2em;">
							<label>EE</label>
							</span>
                            <?php }
    if ($row1['M_ME'] == 1) {?>
							<span style="padding-left: 2em;">

							<label>ME</label>
							</span>
                            <?php }
    if ($row1['M_CE'] == 1) {?>
							<span style="padding-left: 2em;">

							<label>CE</label>
							</span>
                            <?php }
    if ($row1['M_EIE'] == 1) {?>
							<span style="padding-left: 2em;">
							<label>EIE</label>
							</span>
                            <?php }?>
						</p>
						</div>
				</div>
                    <?php }
                    if ($row['MBAEligibility'] == 1) {?>
            <span style="padding-left: 2em;">
							<label>MBA</label>
							</span>
            <?php }if ($row['MScEligibility'] == 1) {?>
            <span style="padding-left: 2em;">
							<label>MSc</label>
							</span>
            <?php }?>


 		<p>
        <?php if($row1['MarksCriteria']==1){?>
 		<label>Marks Criteria :</label>
 		</p>

<div id="myDIV" style="position: relative;text-align: center;width:50%;left:25%;">
<?php if($row2['X']){ ?>
	<div class="row">
			<div class="col-25">
		 <label>Class X :</label>
		 </div>
		 <div class="col-75">
		 <?php echo $row2['X']; ?>
		 </div>
	</div>
<?php } if($row2['X']){ ?>
	<div class="row">
		<div class="col-25">
		 	<label>Class XII :</label>
		 </div>
		 <div class="col-75">
		 <?php echo $row2['XII']; ?>
		 </div>
	</div>
  <?php } if($row2['X']){ ?> 
	<div class="row">
		<div class="col-25">
		 	<label for="cpi">CPI :</label>
		 </div>
		 <div class="col-75">
		 <?php echo $row2['CPI']; ?>
		 </div>
	</div>
  <?php } ?>  
</div>
        <?php  } ?>


	</div>

</body>
</html>

