<?php 
session_start();
include 'connection.php';
mysqli_close($con);
session_destroy();
        // echo "<script>alert('Logged Out Successfully');</script>";

        echo "<script>window.location.href = 'index.php';</script>";

 ?>