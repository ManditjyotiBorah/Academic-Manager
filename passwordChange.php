<?php 
	# code...

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnplogin";
$con = mysqli_connect($servername,$username,$password,$dbname);
	$Username = $_SESSION['username'];
	# code...
if (isset($_POST['submit'])) {
	$oldPassword = $_POST['o_pass'];
	$newPassword = $_POST['n_pass'];
	$sql = "SELECT * FROM logindetails WHERE Username = '$Username'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
echo $oldPassword;
	if(password_verify($oldPassword, $row['Password'])){

			$pass = password_hash($newPassword, PASSWORD_DEFAULT);
			$sql = "UPDATE logindetails SET Password = '$pass' WHERE Username = '$Username'";
			mysqli_query($con,$sql);
					echo "<script>alert('Change Password');</script>";
	        
			if ($_SESSION['Type']==2||$_SESSION['Type']==3) {
				# code...
	        echo "<script>window.location.href = 'specialView.php';</script>";

			}else{

	        echo "<script>window.location.href = 'student.php';</script>";
			}

	}
	else{
					echo "<script>alert('Incorrect Password');</script>";
				
	        echo "<script>window.location.href = 'passwordChange.php';</script>";


	}
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
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
	 		Change Password
	 	</h1><hr>
		<h2 style="font-family: Georgia; margin-top: 20px;">Scholar ID : <?php echo $Username; ?></h2><br>
			<form action="" method="post">
				<label>Old Password :</label>
				<br>
				<input type="password" name="o_pass" required="">
				<br><br>
				<label>New Password :</label>
				<br>
				<input type="password" name="n_pass" required="">
				<br>
				<br>
				
				<input type="submit" name="submit">
			</form>
		</div>
		
		
		
	</div>

	
</body>
</html>