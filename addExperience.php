<?php 
include "connection.php";
session_start();
$Username = $_SESSION['scholarID'];
 if (isset($_POST['submit'])) {
        # code...
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tem_loc = $_FILES['file']['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "Experience/jobExp".$Username.".pdf";
        move_uploaded_file($file_tem_loc, $file_store);
$sql = "UPDATE resumes SET Experience = '".$file_store."'  WHERE ScholarID =".$Username." ";
mysqli_query($con,$sql);
    
    }
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Experience</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		.text-styling{
			font-family:sans-serif;
			font-size:1.1rem;
			line-height:7vh;
		}
		a{
			text-decoration:none;
			color:black;
		}
		a:hover{
			text-decoration: none;
		}
	
		.container{
			box-shadow: 5px 5px 5px 5px gray;
			border-radius: 2%;
			
			
		}
		.details{
			/*font-family: 'Roboto', sans-serif;*/
			/*font-family: 'Oswald', sans-serif;*/
			/*font-family: 'Lato', sans-serif;*/
			font-family: 'Times New Roman' ;
			font-weight:700;
			margin: 0;
			/*font-family: 'Open Sans', sans-serif;*/
		}
		span{
			background: white;
		}
		.value{
			font-size: 1.2em;
			background-image: linear-gradient(to right, #83b8f7, #99c4f7, #bed8f7, #dae6f5, #e4f1f7 , transparent );
			padding: 0 20px;
			border-radius: 8px;
		}
		input{
			color: #000; 
			border: 1px solid #000;
			padding: 12px 20px;
			border-radius: 10px;
			cursor: pointer;

		}
		input[type=submit]{
			color:white;
			background-color: #434744;
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
	</style>
</head>
<body style="background-image: url(images/light.jpg);">
	<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="<?php if ($_SESSION['Type']==1) {echo 'student_coo.php';}else if($_SESSION['Type']==2||$_SESSION['Type']==3){echo 'specialView.php';} else{ echo 'student.php';} ?>"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
	</div>
		<div style=" background-size: cover;text-align: center;" class="container-fluid">
	 	
		<div class= "contain" style="position: relative;border-radius: 10px;background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  ); margin-top: 30px; width:70%;padding-bottom:15px;padding-left:15px;padding-right:15px; left:15%; box-shadow: 10px 10px 10px gray; opacity: 0.9; text-align: center;">
		<h1 align="center" style="font-family: Algerian; padding: 10px;">
	 		Share Experience
	 	</h1><hr>
		<h2 style="font-family: Georgia; margin-top: 20px;">Scholar ID : <?php echo $Username; ?></h2><br>
			<form action="" method="post" enctype="multipart/form-data">
				<h5><i>Share your Placement Experience here in pdf format</i></h5>
				<?php 
					$sql1 = "SELECT * FROM resumes WHERE ScholarID = ".$Username."";
					$res = mysqli_query($con,$sql1);
					$row = mysqli_fetch_assoc($res);
					if ($row['Experience']) {
						echo "<h6><i>Check your uploaded Experience pdf <a target='_blank' href=".$row['Experience']." style='color: blue;'><u>here</u></a></i></h6>";
					}
				 ?>
				<p>
					<br>
					<input type="file" name="file" accept=".pdf">
					<input type="submit" name="submit" value="Share">
				</p>
			</form>
		</div>
		
		
		
	</div>

	
</body>
</html>