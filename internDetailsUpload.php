<?php 
session_start();
include 'connection.php';
$currentdir ="localhost/TNP";
$ScholarID = $_SESSION['scholarID'];
if (isset($_POST['upload'])) {
	$sql = "SELECT * FROM internshipdetails WHERE ScholarID = $ScholarID AND Status = 1";
$result = mysqli_query($con,$sql);
$i = 1;
	while($row = mysqli_fetch_assoc($result)){
	# code...
		$i++;
	}
	$x =  "file";
	$file_name = $_FILES[$x]['name'];
        $file_type = $_FILES[$x]['type'];
        $file_size = $_FILES[$x]['size'];
        $file_tem_loc = $_FILES[$x]['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "InternCertificates/intern".$ScholarID."_".$i.".pdf";

        move_uploaded_file($file_tem_loc, $file_store);
	$CompanyName = $_POST['CompanyName'];
	$Duration = $_POST['Duration'];
	$Location = $_POST['Location'];
	$Placement = $_POST['Placement'];
	$sql = "INSERT INTO internshipdetails (ScholarID,CompanyName,Duration,Location,Placement,Certificate,Status) VALUES ('$ScholarID','$CompanyName','$Duration','$Location','$Placement','$file_store','0')";
	mysqli_query($con,$sql);
	echo '<script>alert("Sent for verification");</script>';
	echo '<script>window.location.href="student.php"</script>';
}
 ?>
 <!DOCTYPE html>
 <html >
 <head>
 	<title>
 		Internship Details	
 	</title>
	 <link rel="stylesheet" href="Drive/viewdrive.css">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <style>
	 	input{
			color: #000; 
			border: 1px solid #000;
			padding: 12px 20px;
			border-radius: 10px;
			cursor: pointer;
			width: 50%;
		}
		input[type=submit]{
			color:white;
			background-color: grey;
			padding: 12px 20px;
			border: 1px solid black;
			border-radius: 10px;
			cursor: pointer;
		}
		input[type=submit]:hover{
			color: black;
			background-color: white;
			padding: 12px 20px;
			border: 1px solid black;
			border-radius: 10px;
			cursor: pointer;
		}
		.container{
			box-shadow: 5px 5px 5px 5px gray;
			margin-bottom: 50px;
		}
	 </style>
 </head>
 <body style="background-image:url(images/criscros.jpg); background-size: no-repeat">
 <div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="InternshipDetails.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>

 <div class= "container" style="background-color: #f2f2f2;border-radius: 10px; width: 40%; padding-top:10px; padding-bottom: 10px; margin-top: 30px;" align="center">
		<h1>
			Internship Details
		</h1>
		<hr>
 <form action="?" method="POST" enctype="multipart/form-data">
 		<p style="font-size: 1.4em; font-weight: 600;">
			Scholar Id : <?php echo $ScholarID; ?>
		</p>
		<p>
			Company Name:<br>
			<input type="text" name="CompanyName" required="">
		</p>
		<p>
			Duration:<br>
			<input type="number" name="Duration" required="">
		</p>
		<p>
			Location:<br>
			<input type="text" name="Location" required="">
		</p>
		<p>
			On-Campus:<br>
			<input style="height: 20px; width: 20px;" type="checkbox" name="Placement" value="1">
		</p>
		<p>
			Attach file:<br>
 			<input style="padding:0;" type="file" name="file" accept=".pdf" required="">
		</p>

 	<input style="background-color:grey;color: white;text-decoration:none;padding: 10px 20px;border: none;border-radius: 4px; cursor: pointer; margin-top: 40px;"type="submit" name="upload" value="Submit"> 

 </form>
 <p>
		<script type="text/javascript">
			function goback() {
				window.history.back();
			}
		</script>
		
	</p>  
 </div>                                                                                                                                                                                                
 </body>
 </html>