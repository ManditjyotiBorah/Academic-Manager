	<?php 
session_start();

if (!$_SESSION['username'] ||($_SESSION['Type']!=2 && $_SESSION['Type']!=3&& $_SESSION['Type']!=4)) {
        echo "<script>alert('Not Logged In');</script>";

        echo "<script>window.location.href = 'index.php';</script>";
	# code...
}
$_SESSION['check'] = 1;
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php 
 		if ($_SESSION['Type'] == 2) {
 			# code...
 	echo "<title>TPO</title>";
 		}elseif ($_SESSION['Type'] == 3) {
 			# code...
 	echo "<title>Director</title>";
 		}else{
 			echo "<title>Guest</title>";
 		}
 	 ?>
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
 </head>
 <body style="background-image:url(images/light.jpg); background-size: no-repeat; margin: 0;" >

 <div  style=" background-image: url(images/newspaper.jpg); background-size: cover; padding-bottom: 20px; box-shadow: 5px 5px 5px gray"  class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
	<div class="shift" >	<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;padding-right:15px; box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.2);border-radius: 8px;">
		
	<a href="logout.php" style="text-decoration: none;color: black;font-size: 30px;black; "> Log Out</a>
	</button>	
	</div>	
	<?php if ($_SESSION['Type']<4) {
	?>
	<div class="buttons" align="center">
 			<h3><a   href="passwordChange.php" style="text-decoration: none; color: black;background-color: silver; ;border-radius: 8px; padding:8px; ">Change password</a></h3>
 	<?php } ?>
		</div>

<hr>

 <div class="example" style="text-align: center; height: auto;">

 	<h1 style="background-color:rgba(155, 141, 141, 0.466);padding: 8px; " ><?php 
 		if ($_SESSION['Type'] == 2) {
 			# code...
 	echo "TPO Home";
 		}elseif ($_SESSION['Type'] == 3) {
 			# code...
 	echo "Director Home";
 		}else{
 			echo "Guest View";
 		}
 	 ?></h1>
 	<form method="post" action="guest_view.php">
 		<p>
 			<h3 style=" padding:4px;width:50%;margin:auto;box-shadow: 0 10px 18px 0 rgba(0, 0, 0, 0.2);border-radius: 8px;" >Search Student Profile</h3>
 		</p>
		 
 		<input style="box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.2);border-radius:  8px; height:20px; " type="text" name="scholarID" placeholder="Scholar ID">
 		<input style="box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.2);border-radius: 8px ; height:30px; " type="submit" name="search" value="Search">
 	</form>
 	<br>
 		<?php if ($_SESSION['Type'] < 4) {
		 echo '<p class="buttons"><a  href="DriveSchedule.php" style="text-decoration: none; color: black;background-color: silver; border-radius: 8px; padding:8px; "><b>Placement Drive Schedule</b></a></h3></p>';
		echo "</br>";
		if ($_SESSION['Type']==2) {
			# code...
 		echo '<p class="buttons"><h3><a  href="add_acc.php" style="text-decoration: none; color: black;background-color: silver; border-radius: 8px; padding:8px;">Register Students</a></h3><br></p>';
		}
 			# code...
 		} ?>
 		<p class="buttons">
 			<h3><a   href="curr_statistics.php" style="text-decoration: none; color: black;background-color: silver;border-radius: 8px; padding:8px; ">Statistics</a></h3>
 		</p>
 		<br>
 		<p class="buttons">
 			<h3><a   href="stats.php" style="text-decoration: none; color: black;background-color: silver; ;border-radius: 8px; padding:8px; ">Visiting Companies</a></h3>
 		</p><br>
 			<div class="buttons" align="center">
 			<h3><a   href="academicView.php" style="text-decoration: none; color: black;background-color: silver; ;border-radius: 8px; padding:8px; ">Academic Statistics</a></h3>
 		</div><br>
 		<div class="buttons" align="center">
 			<h3><a   href="Drive/branchStats.php" style="text-decoration: none; color: black;background-color: silver; ;border-radius: 8px; padding:8px; ">Branchwise Statistics</a></h3>
 		</div>
		 <br>
 		</div>
		
 		
 
 </div>
 </body>
 </html>

 <style>

.example{
	box-shadow: 0 10px 18px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 5px 5px 5px 5px gray;
	border-radius: 5%;
	height: 470px;
    max-width: 420px;
    margin: auto;
    text-align: center;
    font-family: sans-serif;
    border-radius: 8px;
	background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  );
	margin-bottom: 40px;
}

.lol{
	width: 50%;
}

button:hover, button:active {
    background-color: silver;
  }

a:hover, a:active {
    background-color: silver;
  }

  .shift{
	  left:87%;
	  position: relative;
  }
  @media screen and (max-width: 780px) {
	  .shift{
		left:60%;
	  }
  }
 </style>