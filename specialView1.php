<?php 
session_start();

if (!$_SESSION['username']) {
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
	  <link rel="stylesheet" href="Drive/viewdrive.css">
 </head>
 <body>

 <div class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				
		</div>

<hr>

 <div class="con" style="text-align: center;">
 	<h1><?php 
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
 			<h3>Search Student Profile</h3>
 		</p>
 		<input type="text" name="scholarID" placeholder="Scholar ID">
 		<input type="submit" name="search" value="Search">
 	</form>
 	<br>
 		<?php if ($_SESSION['Type'] < 4) {
 		echo '<p><h3><a href="DriveSchedule.php" style="padding-top:5px; padding-bottom:5px;padding-left:15px;padding-right:15px;text-decoration: none;border-radius:10px; color: black;background-color: silver;">Placement Drive Schedule</a></h3></p><br>';
 			# code...
 		} ?>
 		<p>
 			<h3><a href="" style="padding-top:5px; padding-bottom:5px;padding-left:15px;padding-right:15px;text-decoration: none;border-radius:10px; color: black;background-color: silver;">Statistics</a></h3>
 		</p>
 		<button style="border: 5px;padding-top:5px; padding-bottom:5px;padding-left:15px;padding-right:15px;">
		
	<a href="logout.php" style="text-decoration: none;color: black;font-size: 30px;">Log Out</a>
	</button>

 </div>
 </body>
 </html>