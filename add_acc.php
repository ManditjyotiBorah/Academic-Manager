<?php 
			function password_generate($chars) 
			{
			  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
			  return substr(str_shuffle($data), 0, $chars);
			}
	if (isset($_POST['submit'])) {
		# code...
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnplogin";
$dbname1 = "password";
$con = mysqli_connect($servername,$username,$password,$dbname);
$con1 = mysqli_connect($servername,$username,$password,$dbname1);
		$year = $_POST['year']%100;
		$degree = $_POST['degree'];
		$branch = $_POST['dept'];
		$part = ($year*100000)+($degree*10000)+($branch*1000);
		$i = $_POST['start'];
		for ($i=$_POST['start']; $i <= $_POST['end']; $i++) { 
			# code...
			$scholarID = $part + $i;
  $password = password_generate(10);
			$sql1 = "INSERT INTO passwords (Username,Password) VALUES ('$scholarID','$password')";
			mysqli_query($con1,$sql1);
  $pass = password_hash($password, PASSWORD_DEFAULT);
  
			$sql = "INSERT INTO logindetails (Email,Username,Password,Type,ID,Name) VALUES ('','$scholarID','$pass',0,'$scholarID','')";
			mysqli_query($con,$sql);
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Add Accounts</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		input{
			color: #000; 
			border: 1px solid #000;
			padding: 12px 20px;
			border-radius: 10px;
			cursor: pointer;
			width: 80%;

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
			margin-bottom: 50px;
			border-radius: 5%;
			background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  );
		}
		.custom-select{
			width: 80%;
		}
	</style>
 </head>
 <body style="background-image: url(images/light.jpg); background-size: cover;">
<div style="box-shadow: 5px 5px 5px 5px gray; margin-bottom: 30px; padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover;" class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
		 <button align="center" style=" background-color:#366bd6;color: white;text-decoration:none;padding: 7px 20px;border: none;border-radius: 4px;cursor: pointer; margin: 10px;"><a style="color: white;text-decoration: none;"href="specialView.php" >Back</a>
		 </button>
			
	</div>
		

 <div style="text-align: center;">

<div class="container">
	<h1>
	Add Accounts
</h1><hr>
 <form action="?" method="post">

 	<p>
 		<label>Year</label><br>
 	
 	<input type="number" name="year" required>
 	</p>
 	<p>
 		<label class="my-1 mr-2">Degree</label><br>
 	
 	<select class="custom-select my-1 mr-sm-2"id="inlineFormCustomSelectPref" name="degree" required="">
 		<option value="1">B.Tech</option>
 		<option value="2">M.Tech</option>
 		<option value="3">MBA</option>
 	</select>
 	</p>
 	<p>
 		<label>Branch</label><br>
 	
 	<select class="custom-select my-1 mr-sm-2"id="inlineFormCustomSelectPref" name="dept" required="">
 		<option value="1">Civil</option>
 		<option value="2">Mechanical</option>
 		<option value="3">Electrical</option>
 		<option value="4">Electronics Communication</option>
 		<option value="5">Computer Science</option>
 		<option value="6">Electronics Instrumentation</option>
 	</select>
	 </p>
 	<p>
 		<label>Starting id number</label><br>
 		<input type="number" name="start" required>
 	</p>
 	<p>
 		<label>Ending id number</label><br>
 		<input type="number" name="end" required>
 	</p>
	<input type="submit" name="submit" value="Generate" required>
 </form>

 
</div>
 </body>
 </html>