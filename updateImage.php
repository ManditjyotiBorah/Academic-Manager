<?php  
session_start();
$ScholarID = $_SESSION['scholarID'];
    

    if (isset($_POST['upload'])) {
        # code...
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tem_loc = $_FILES['file']['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "uploads/profilepic".$ScholarID.".jpg";
        // echo "<script>alert('Update Picture');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
        echo "<script>window.location.href = 'http://localhost/TNP/updatePersonal.php';</script>";

       
    }
    if (isset($_POST['uploadAdhaar'])) {
        echo "adhaar";
        # code...
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tem_loc = $_FILES['file']['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "uploads/adhaar".$ScholarID.".jpg";
        // echo "<script>alert('Update Picture');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
        echo "<script>window.location.href = 'http://localhost/TNP/updatePersonal.php';</script>";

       
    }
    if (isset($_POST['uploadPan'])) {
        # code...
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tem_loc = $_FILES['file']['tmp_name'];
        $ext= explode('.',$file_name);
        $_SESSION['ext']= $fileext=strtolower(end($ext));
        $file_store = "uploads/pan".$ScholarID.".jpg";
        // echo "<script>alert('Update Picture');</script>";
        move_uploaded_file($file_tem_loc, $file_store);
        echo "<script>window.location.href = 'http://localhost/TNP/updatePersonal.php';</script>";

       
    }
?>