<?php
session_start();
include 'connection.php';
if(isset($_POST['company']))
{
    $_SESSION['company'] = $_POST['company'];
    $company = $_POST['company'];
    $result1 =mysqli_query($con,"SELECT * FROM stats WHERE CompanyName='$company'");
}
if($_SESSION['company']){
 $company = $_SESSION['company'];
 $result1 =mysqli_query($con,"SELECT * FROM stats WHERE CompanyName='$company'");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">

<style>
    h1{
    text-align: center;
    text-transform: none;
    font-family: Algerian;
    font-size: 2.4em;
    margin: 0px auto;

}
hr.stylish-rule {
    margin: 0.2em auto 0.5em auto;
    border: 0;
    height: 2px;
    background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75),rgba(0,0,0,0));}
    .content{
        border-radius: 5px;
        padding: 30px;
        width: 50%;
        box-shadow: 5px 5px 5px 5px gray;
    }
</style>
</head>
<body style="background-image: url(images/light.jpg); background-size: cover;">
<div style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; box-shadow: 5px 5px 5px 5px gray;"class= "nav-bar">
		<div align= "center" >
			<img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;">
			<h1 style="font-family: garamond">National Institute of Technology</h1>
		</div>
		<div>
			<a style="background-color: transparent; text-align: left; "style="text-decoration: none;"href="stats.php"><button  class="button" style="height: 40px;width: 100px;border-radius: 5px;background-color: #434744;color: white;font-style: bold; position: relative;	left: 2%;">  Back</button></a>
		</div>
</div>
<h1 style="margin-top: 30px;">Placement Statistics </h1>
<h2 align="center" style="font-family: Georgia;"><?php echo $company?></h2>
<hr class="stylish-rule" style="height:2.5px; max-width:720px;">
<div class="container">
  
        <div class="col-md-12" style="text-align:center;">
<?php
$CurPageURL =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  

$_SESSION['present'] = "http://$CurPageURL";
 while($row1 = mysqli_fetch_array($result1)){
  $row2 = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM driveschedule WHERE ID='".$row1['ID']."'"));
?>
<div style="background-image: linear-gradient(to right, #c3c7c6, #d5dbda, #dfe8e7, #ffffff  ); font-family: cursive; position: relative" class="container content">
    <p>Drive ID:<?php echo $row1['ID']?></p>
    <p>Drive Year:<?php echo $row1['driveyear']?></p>
    <p>Salary:<?php echo $row2['Package'] ?></p>
    <p>Eligible:<?php echo $row1['eligible']?></p>
    <p>Placed:<?php echo $row1['placed']?></p>
    <form style="display: inline-block;color: white;" action="drivedescription.php" method="post" >
                                    <button class="accept_reject" name="description" value="<?php echo $row1['ID'];?>" style="background: #434744;color: white;">Description</button>
                                </form>
 </div>
 <?php  echo "<br/>"; } ?>
</body>
</html>
