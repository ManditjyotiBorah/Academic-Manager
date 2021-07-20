<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnplogin";
$con = mysqli_connect($servername,$username,$password,$dbname);
if (isset($_POST['login'])) {
	# code...
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	$Type = $_POST['type'];
	$_SESSION['username'] = $Username;
	$sql = "SELECT * FROM logindetails WHERE Username = '$Username' AND Type = '$Type'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	if ($Type == 0) {
			# code...
		if ($row['ID']) {
				# code...
			if ($Password == $row['Password']||password_verify($Password, $row['Password'])) {
				# code...
				if ($Type == $row['Type'] ) {
					# code...
				// echo "<script>alert('Sucessfully Logged In');</script>";
				$_SESSION['Type']=$Type;
				$_SESSION['scholarID'] = $row['ID'];  
	        echo "<script>window.location.href = 'student.php';</script>";
					
				}
				else{
					echo "<script>alert('Incorrect Login Type');</script>";
	        echo "<script>window.location.href = 'index.php';</script>";
					
				}
			}
			else{
					echo "<script>alert('Incorrect Password');</script>";
	        echo "<script>window.location.href = 'index.php';</script>";

			}
		}
		else{
				echo "<script>alert('Incorrect Username');</script>";
	        echo "<script>window.location.href = 'index.php';</script>";

		}
	}elseif ($Type == 1) {
		if (($Password == $row['Password'])||(password_verify($Password, $row['Password']))) {
				# code...
				if ($Type == $row['Type'] ) {
				
					# code...
				// echo "<script>alert('Sucessfully Logged In');</script>";
				$_SESSION['ID'] = $row['ID'];  
				$_SESSION['Type'] = $Type;
	        echo "<script>window.location.href = 'student_coo.php';</script>";
					
				}
				else{
					echo "<script>alert('Incorrect Credentials');</script>";
	        echo "<script>window.location.href = 'index.php';</script>";
				}
			}
			else{
					echo "<script>alert('Incorrect Credentials');</script>";
	        echo "<script>window.location.href = 'index.php';</script>";

			}
	}elseif ($Type == 2 || $Type ==3 ) {
		if (($Password == $row['Password'])||password_verify($Password, $row['Password'])) {
				# code...
				if ($Type == $row['Type'] ) {

					# code...
				// echo "<script>alert('Sucessfully Logged In');</script>";
				$_SESSION['ID'] = $row['ID'];  
				$_SESSION['Type'] = $Type;
	        echo "<script>window.location.href = 'specialView.php';</script>";
					
				}
				else{
					echo "<script>alert('Incorrect Credentials');</script>";
	        echo "<script>window.location.href = 'index.php';</script>";
				}
			}
			else{
					echo "<script>alert('Incorrect Credentials');</script>";
	        echo "<script>window.location.href = 'index.php';</script>";

			}
	}
}
if (isset($_POST['guest'])) {
	# code....
	$_SESSION['Type'] = 4;
	$_SESSION['username'] = "guest";
	echo "<script>window.location.href = 'specialView.php';</script>";
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		input{
			color: #000; 
			border: 1px solid #000;
			padding: 12px 20px;
			border-radius: 10px;
			cursor: pointer;

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
		.select-css {
			
			
			font-size: 16px;
			font-family: sans-serif;
			font-weight: 700;
			color: #444;
			line-height: 1.3;
			padding: .6em 1.4em .5em .8em;
			width: 40;
			max-width: 40%; 
			position : relative;
			
			box-sizing: border-box;
			margin: 0;
			border: 1px solid #aaa;
			box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
			border-radius: .5em;
			-moz-appearance: none;
			-webkit-appearance: none;
			appearance: none;
			background-color: #fff;
			
			
		}
		.select-css::-ms-expand {
			display: none;
		}
		.select-css:hover {
			border-color: #888;
		}
		.select-css:focus {
			border-color: #aaa;
			box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
			box-shadow: 0 0 0 3px -moz-mac-focusring;
			color: #222; 
			outline: none;
		}
		.select-css option {
			font-weight:normal;
			
		}
		.container{
			box-shadow: 5px 5px 5px 5px gray;
			padding: 20px;
			margin-top: 50px;
			width: 40%;
			border-radius: 5%;
			background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  );
		}
		
  
	</style>
</head>
<body align="center" style="background-image:url(images/light.jpg); background-size: no-repeat; margin: 0;">
<div style=" background-image: url(images/newspaper.jpg); background-size: cover; padding-bottom: 20px; box-shadow: 5px 5px 5px gray" class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				
		</div>

<div class="container">
	<div style="text-align: center;">
		
	<form action="?" method="POST">
		<h1>
			LOGIN
		</h1><hr>
		<p>
			<label>Username :</label>
			<input type="text" name="username">
		</p>
		<p>
			<label>Password :</label>
			<input type="password" name="password">
		</p>
		<p>
			<label>Login as :</label>
			<select  class="select-css" name="type">
				<option value="0">Student</option>
				<option value="1">Student Coordinator</option>
				<option value="2">TPO</option>
				<option value="3">Director</option>
			</select>
		</p>
		<p>
			<input type="submit" name="login">
		</p>
	</form>
	<form action="?" method="POST">
		<input type="submit" name="guest" value="Guest Login">
	</form>
	</div>
</div>
</body>
</html>