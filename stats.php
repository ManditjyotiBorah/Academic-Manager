<?php
session_start();
error_reporting(0);
include 'connection.php';
$result = mysqli_query($con,"SELECT DISTINCT CompanyName FROM stats");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<style>
h1{
     text-align: center;
     text-transform: none;
    font-family:  sans-serif;
    font-size: 2.4em;
    margin: 0px auto;
    /*color: rgba(48, 50, 210, 0.83);*/
    font-family: Algerian;
}
hr.stylish-rule {
    margin: 0.2em auto 0.5em auto;
    border: 0;
    height: 2px;
    background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75),rgba(0,0,0,0));}
    .company{
        width:150px;
        height: 150px;
        box-shadow: 2px 2px 2px gray;
        color:darkslategray;
        background: transparent;
        margin:10px;
        font-size: 30px;
        font: bold;
        font-family: Georgia, 'Times New Roman', Times, serif;
        border-radius: 10px;
        transition: 0.8s ease all 0s;

    }
    .company:hover{
         background-color: lightgray;
         font-size: 2.5rem;
         height: 200px;
         color: #1e1245;
         width: 200px;
    }
    .btn:hover{
            background: #727572;
            color: white;
            transition: 0.5s ease;
        }
    
</style>
</head>
<body style="background-image: url(images/light.jpg) ; 
            background-size: no-repeat; ">
    <div style="background-image: url(images/newspaper.jpg); 
            background-size: cover; box-shadow: 5px 5px 5px gray; padding-bottom: 30px;" class= "nav-bar">
        <div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin : 0 auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
        <a style="text-decoration: none;"href="specialView.php"><button  class="button btn btn-secondary" style=" position: relative; left:20px; padding: 10px 20px; border-radius: 5px; ">  Back</button></a>
              
    </div>
    <br><br>
<h1>OUR RECRUITERS</h1>
<hr class="stylish-rule" style="height:2.5px; max-width:720px;">
<?php
$num = mysqli_num_rows($result);
$row = mysqli_fetch_all($result);?>

<form class='b' <?php if ($_SESSION['Type']<4) {echo "action='showstats.php' method='post'";} ?> >
<div class="container">
		<div class="col-md-12" style="text-align:center;">
<?php
for($k=0;$k<$num;$k++)
{
//    if($k%7==0){
//         echo "<p>"; }
        
        echo "<button class='company'  type='submit' name='company' value='".$row[$k][0]."'>".$row[$k][0]."</button>";
?>

<?php 
    // if(($k+1)%7==0){
    //      echo "</p>";
    // }
}
?>
</div>
</div>
</body>
</html>




