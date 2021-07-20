<?php

session_start();
include '../connection.php';
    $sql20 = "SELECT * FROM driveschedule WHERE ID=(SELECT MAX(ID) FROM driveschedule)";
    $row20 = mysqli_fetch_assoc(mysqli_query($con,$sql20));
    $driveid = $row20['ID'];
    $drivedate = $row20['DriveDate'];
    $driveyear= explode('-',$drivedate)[0];
    $drivemonth = explode('-',$drivedate)[1];
    $driveday = explode('-',$drivedate)[2];
    $type = $row20['Type'];
    if($driveday>30 && $drivemonth>06)
    {  $driveyear = $driveyear."-".($driveyear+1);
    }
    else{
       $driveyear = ($driveyear-1)."-".$driveyear;
    }
    

    $studenteligible = 0;
    $companyname = $row20['CompanyName'];
    $sql15 = "SELECT * FROM stats WHERE driveyear='$driveyear' AND CompanyName='$companyname' AND ID='$driveid'";
    $result15=mysqli_query($con,$sql15);
    $num15 = mysqli_num_rows($sql15);
    if($num15==0){
      mysqli_query($con,"INSERT INTO stats(CompanyName,ID,driveyear) VALUES('$companyname','$driveid','$driveyear')");
    }
     $row15 = mysqli_fetch_assoc($result15);
     $sql  = "SELECT * FROM minimummark WHERE ID = $driveid";
      $row = mysqli_fetch_array(mysqli_query($con,$sql)); 
      $X = $row['X'];
      $XII = $row['XII'];
       $CPI = $row['CPI'];

      $sql21 = "SELECT * FROM brancheligibility WHERE ID= $driveid";
      $row21 = mysqli_fetch_array(mysqli_query($con, $sql21));
       
      $B_cse = $row21['B_CSE'];
      $B_ece = $row21['B_ECE'];
      $B_me = $row21['B_ME'];
      $B_eie = $row21['B_EIE'];
      $B_ce = $row21['B_CE'];
      $B_ee = $row21['B_EE'];

if ($type==0) {

 if($row20['BTechEligibility']==1 && $B_cse==1){
     $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'B.Tech' AND students.Department = 'CSE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
     $result10 = mysqli_query($con,$sql10);
     $row10 = mysqli_fetch_all($result10);
     $num = mysqli_num_rows($result10);
     for($i = 0 ; $i<$num ; $i++)
     { 
       $scid = $row10[$i][0];
       $year1 = (integer)(2000 +($scid/100000));
      $refDate = $year1."-06-30";
      $refDate = date_create($refDate);
      $presentdate = date_create(date("Y-m-d"));
      $diff = date_diff($refDate,$presentdate);
      $days = $diff->format('%R%a');
      if ($days<365) {
        # code...
        $year = 1;
      }elseif ($days <(365*2)) {
        $year = 2;
        # code...
      }elseif ($days <(365*3)) {
        $year = 3;
        # code...
      }elseif ($days <(365*4)) {
        $year = 4;
        # code...
      }
      if($year==4){
       $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
       $result12 = mysqli_query($con,$sql12);
       $row12 = mysqli_fetch_array($result12);
       $name = $row12['Name'];
       $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
       mysqli_query($con,$sql11);
       $B_cseEligible = mysqli_num_rows($result12);
       $studenteligible = $studenteligible+mysqli_num_rows($result12);
      }
     }}

     if($row20['BTechEligibility']==1 && $B_ece==1){
     $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'B.Tech' AND students.Department = 'ECE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
     $result10 = mysqli_query($con,$sql10);
     $row10 = mysqli_fetch_all($result10);
     $num = mysqli_num_rows($result10);
     for($i = 0 ; $i<$num ; $i++)
     { 
       $scid = $row10[$i][0];
       $year1 = (integer)(2000 +($scid/100000));
      $refDate = $year1."-06-30";
      $refDate = date_create($refDate);
      $presentdate = date_create(date("Y-m-d"));
      $diff = date_diff($refDate,$presentdate);
      $days = $diff->format('%R%a');
      if ($days<365) {
        # code...
        $year = 1;
      }elseif ($days <(365*2)) {
        $year = 2;
        # code...
      }elseif ($days <(365*3)) {
        $year = 3;
        # code...
      }elseif ($days <(365*4)) {
        $year = 4;
        # code...
      }
      if($year==4){
       $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
       $result12 = mysqli_query($con,$sql12);
       $row12 = mysqli_fetch_array($result12);
       $name = $row12['Name'];
       $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
       mysqli_query($con,$sql11);
       $studenteligible = $studenteligible+mysqli_num_rows($result12);
      }
     }}
     
     if($row20['BTechEligibility']==1 && $B_ee==1){
     $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'B.Tech' AND students.Department = 'EE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
     $result10 = mysqli_query($con,$sql10);
     $row10 = mysqli_fetch_all($result10);
     $num = mysqli_num_rows($result10);
     for($i = 0 ; $i<$num ; $i++)
     { 
       $scid = $row10[$i][0];
       $year1 = (integer)(2000 +($scid/100000));
      $refDate = $year1."-06-30";
      $refDate = date_create($refDate);
      $presentdate = date_create(date("Y-m-d"));
      $diff = date_diff($refDate,$presentdate);
      $days = $diff->format('%R%a');
      if ($days<365) {
        # code...
        $year = 1;
      }elseif ($days <(365*2)) {
        $year = 2;
        # code...
      }elseif ($days <(365*3)) {
        $year = 3;
        # code...
      }elseif ($days <(365*4)) {
        $year = 4;
        # code...
      }
      if($year==4){
       $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
       $result12 = mysqli_query($con,$sql12);
       $row12 = mysqli_fetch_array($result12);
       $name = $row12['Name'];
       $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
       mysqli_query($con,$sql11);
       $studenteligible = $studenteligible+mysqli_num_rows($result12);
      }
     }}


     if($row20['BTechEligibility']==1 && $B_me==1){
     $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'B.Tech' AND students.Department = 'ME' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
     $result10 = mysqli_query($con,$sql10);
     $row10 = mysqli_fetch_all($result10);
     $num = mysqli_num_rows($result10);
     for($i = 0 ; $i<$num ; $i++)
     { 
       $scid = $row10[$i][0];
       $year1 = (integer)(2000 +($scid/100000));
      $refDate = $year1."-06-30";
      $refDate = date_create($refDate);
      $presentdate = date_create(date("Y-m-d"));
      $diff = date_diff($refDate,$presentdate);
      $days = $diff->format('%R%a');
      if ($days<365) {
        # code...
        $year = 1;
      }elseif ($days <(365*2)) {
        $year = 2;
        # code...
      }elseif ($days <(365*3)) {
        $year = 3;
        # code...
      }elseif ($days <(365*4)) {
        $year = 4;
        # code...
      }
      if($year==4){
       $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
       $result12 = mysqli_query($con,$sql12);
       $row12 = mysqli_fetch_array($result12);
       $name = $row12['Name'];
       $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
       mysqli_query($con,$sql11);
       $studenteligible = $studenteligible+mysqli_num_rows($result12);
       }}

 }
 
 if($row20['BTechEligibility']==1 && $B_ce==1){
     $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'B.Tech' AND students.Department = 'CE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
     $result10 = mysqli_query($con,$sql10);
     $row10 = mysqli_fetch_all($result10);
     $num = mysqli_num_rows($result10);
     for($i = 0 ; $i<$num ; $i++)
     { 
      $scid = $row10[$i][0];
       $year1 = (integer)(2000 +($scid/100000));
      $refDate = $year1."-06-30";
      $refDate = date_create($refDate);
      $presentdate = date_create(date("Y-m-d"));
      $diff = date_diff($refDate,$presentdate);
      $days = $diff->format('%R%a');
      if ($days<365) {
        # code...
        $year = 1;
      }elseif ($days <(365*2)) {
        $year = 2;
        # code...
      }elseif ($days <(365*3)) {
        $year = 3;
        # code...
      }elseif ($days <(365*4)) {
        $year = 4;
        # code...
      }
      if($year==4){
       $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
       $result12 = mysqli_query($con,$sql12);
       $row12 = mysqli_fetch_array($result12);
       $name = $row12['Name'];
       $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
       mysqli_query($con,$sql11);
       $studenteligible = $studenteligible+mysqli_num_rows($result12);
      }}
     }

    //  if($row20['BTechEligibility']==1 && $others==1){
    //  $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'B.Tech' AND students.Department = 'OTHERS' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
    //  $result10 = mysqli_query($con,$sql10);
    //  $row10 = mysqli_fetch_all($result10);
    //  $num = mysqli_num_rows($result10);
    //  for($i = 0 ; $i<$num ; $i++)
    //  { 
    //   $scid = $row10[$i][0];
    //    $year1 = (integer)(2000 +($scid/100000));
    //   $refDate = $year1."-06-30";
    //   $refDate = date_create($refDate);
    //   $presentdate = date_create(date("Y-m-d"));
    //   $diff = date_diff($refDate,$presentdate);
    //   $days = $diff->format('%R%a');
    //   if ($days<365) {
    //     # code...
    //     $year = 1;
    //   }elseif ($days <(365*2)) {
    //     $year = 2;
    //     # code...
    //   }elseif ($days <(365*3)) {
    //     $year = 3;
    //     # code...
    //   }elseif ($days <(365*4)) {
    //     $year = 4;
    //     # code...
    //   }
    //   if($year==4){
    //    $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
    //    $result12 = mysqli_query($con,$sql12);
    //    $row12 = mysqli_fetch_array($result12);
    //    $name = $row12['Name'];
    //    $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
    //    mysqli_query($con,$sql11);
    //    $studenteligible = $studenteligible+mysqli_num_rows($result12);
    //    }}
    //  }
if($row20['BTechEligibility']==1 && $B_eie==1){
     $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'B.Tech' AND students.Department = 'EIE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
     $result10 = mysqli_query($con,$sql10);
     $row10 = mysqli_fetch_all($result10);
     $num = mysqli_num_rows($result10);
     for($i = 0 ; $i<$num ; $i++)
     { 
      $scid = $row10[$i][0];
       $year1 = (integer)(2000 +($scid/100000));
      $refDate = $year1."-06-30";
      $refDate = date_create($refDate);
      $presentdate = date_create(date("Y-m-d"));
      $diff = date_diff($refDate,$presentdate);
      $days = $diff->format('%R%a');
      if ($days<365) {
        # code...
        $year = 1;
      }elseif ($days <(365*2)) {
        $year = 2;
        # code...
      }elseif ($days <(365*3)) {
        $year = 3;
        # code...
      }elseif ($days <(365*4)) {
        $year = 4;
        # code...
      }
      if($year==4){
       $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
       $result12 = mysqli_query($con,$sql12);
       $row12 = mysqli_fetch_array($result12);
       $name = $row12['Name'];
       $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
       mysqli_query($con,$sql11);
       $studenteligible = $studenteligible+mysqli_num_rows($result12);
       }}
     }

      $M_cse = $row21['M_CSE'];
      $M_B_ece = $row21['M_ece'];
      $M_me = $row21['M_ME'];
      $M_eie = $row21['M_EIE'];
      $M_ce = $row21['M_CE'];
      $M_ee = $row21['M_EE'];


     if($row20['MTechEligibility']==1 && $M_cse==1){
     $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'M.Tech' AND students.Department = 'CSE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
     $result10 = mysqli_query($con,$sql10);
     $row10 = mysqli_fetch_all($result10);
     $num = mysqli_num_rows($result10);
     for($i = 0 ; $i<$num ; $i++)
     { 
      $scid = $row10[$i][0];
       $year1 = (integer)(2000 +($scid/100000));
      $refDate = $year1."-06-30";
      $refDate = date_create($refDate);
      $presentdate = date_create(date("Y-m-d"));
      $diff = date_diff($refDate,$presentdate);
      $days = $diff->format('%R%a');
      if ($days<365) {
        # code...
        $year = 1;
      }elseif ($days <(365*2)) {
        $year = 2;
        # code...
                              }
     
      if($year==2)
      {
        $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
        $result12 = mysqli_query($con,$sql12);
        $row12 = mysqli_fetch_array($result12);
        $name = $row12['Name'];
        $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
        mysqli_query($con,$sql11);
        $studenteligible = $studenteligible+mysqli_num_rows($result12);
       }
      }
    }
      
     if($row20['MTechEligibility']==1 && $M_ece==1)
     {
      $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'M.Tech' AND students.Department = 'ECE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
      $result10 = mysqli_query($con,$sql10);
      $row10 = mysqli_fetch_all($result10);
      $num = mysqli_num_rows($result10);
      for($i = 0 ; $i<$num ; $i++)
      { 
       $scid = $row10[$i][0];
        $year1 = (integer)(2000 +($scid/100000));
       $refDate = $year1."-06-30";
       $refDate = date_create($refDate);
       $presentdate = date_create(date("Y-m-d"));
       $diff = date_diff($refDate,$presentdate);
       $days = $diff->format('%R%a');
       if ($days<365) {
         # code...
         $year = 1;
       }elseif ($days <(365*2)) {
         $year = 2;
         # code...
      }
      if($year==2)
      {
        $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
        $result12 = mysqli_query($con,$sql12);
        $row12 = mysqli_fetch_array($result12);
        $name = $row12['Name'];
        $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
        mysqli_query($con,$sql11);
        $studenteligible = $studenteligible+mysqli_num_rows($result12);
       }
      }
    }
      
      if($row20['MTechEligibility']==1 && $M_ee==1){
        $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'M.Tech' AND students.Department = 'EE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
        $result10 = mysqli_query($con,$sql10);
        $row10 = mysqli_fetch_all($result10);
        $num = mysqli_num_rows($result10);
        for($i = 0 ; $i<$num ; $i++)
        { 
         $scid = $row10[$i][0];
          $year1 = (integer)(2000 +($scid/100000));
         $refDate = $year1."-06-30";
         $refDate = date_create($refDate);
         $presentdate = date_create(date("Y-m-d"));
         $diff = date_diff($refDate,$presentdate);
         $days = $diff->format('%R%a');
         if ($days<365) {
           # code...
           $year = 1;
         }elseif ($days <(365*2)) {
           $year = 2;
           # code...
          }
          if($year==2)
          {
          $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
            $result12 = mysqli_query($con,$sql12);
            $row12 = mysqli_fetch_array($result12);
            $name = $row12['Name'];
            $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
            mysqli_query($con,$sql11);
            $studenteligible = $studenteligible+mysqli_num_rows($result12);
          }
          }
        }
        
        if($row20['MTechEligibility']==1 && $M_eie==1){
          $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'M.Tech' AND students.Department = 'EIE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
          $result10 = mysqli_query($con,$sql10);
          $row10 = mysqli_fetch_all($result10);
          $num = mysqli_num_rows($result10);
          for($i = 0 ; $i<$num ; $i++)
          { 
           $scid = $row10[$i][0];
            $year1 = (integer)(2000 +($scid/100000));
           $refDate = $year1."-06-30";
           $refDate = date_create($refDate);
           $presentdate = date_create(date("Y-m-d"));
           $diff = date_diff($refDate,$presentdate);
           $days = $diff->format('%R%a');
           if ($days<365) {
             # code...
             $year = 1;
           }elseif ($days <(365*2)) {
             $year = 2;
             # code...
            }
            if($year==2)
            {
              $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
              $result12 = mysqli_query($con,$sql12);
              $row12 = mysqli_fetch_array($result12);
              $name = $row12['Name'];
              $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
              mysqli_query($con,$sql11);
              $studenteligible = $studenteligible+mysqli_num_rows($result12);
            }
            }
          }
          
          if($row20['MTechEligibility']==1 && $M_me==1){
            $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'M.Tech' AND students.Department = 'ME' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
            $result10 = mysqli_query($con,$sql10);
            $row10 = mysqli_fetch_all($result10);
            $num = mysqli_num_rows($result10);
            for($i = 0 ; $i<$num ; $i++)
            { 
             $scid = $row10[$i][0];
              $year1 = (integer)(2000 +($scid/100000));
             $refDate = $year1."-06-30";
             $refDate = date_create($refDate);
             $presentdate = date_create(date("Y-m-d"));
             $diff = date_diff($refDate,$presentdate);
             $days = $diff->format('%R%a');
             if ($days<365) {
               # code...
               $year = 1;
             }elseif ($days <(365*2)) {
               $year = 2;
               # code...
              }
              if($year==2)
              {
                $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
                $result12 = mysqli_query($con,$sql12);
                $row12 = mysqli_fetch_array($result12);
                $name = $row12['Name'];
                $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
                mysqli_query($con,$sql11);
                $studenteligible = $studenteligible+mysqli_num_rows($result12);
              }
              }
            }
            
            if($row20['MTechEligibility']==1 && $M_ce==1){
              $sql10 = "SELECT students.ScholarID FROM students INNER JOIN academicdetails ON students.ScholarID = academicdetails.ScholarID WHERE students.Degree = 'M.Tech' AND students.Department = 'CE' AND  academicdetails.X >= $X AND academicdetails.XII >= $XII AND academicdetails.CPI >= $CPI";
              $result10 = mysqli_query($con,$sql10);
              $row10 = mysqli_fetch_all($result10);
              $num = mysqli_num_rows($result10);
              for($i = 0 ; $i<$num ; $i++)
              { 
               $scid = $row10[$i][0];
                $year1 = (integer)(2000 +($scid/100000));
               $refDate = $year1."-06-30";
               $refDate = date_create($refDate);
               $presentdate = date_create(date("Y-m-d"));
               $diff = date_diff($refDate,$presentdate);
               $days = $diff->format('%R%a');
               if ($days<365) {
                 # code...
                 $year = 1;
               }elseif ($days <(365*2)) {
                 $year = 2;
                 # code...
              }
              if($year==2)
              {
                $sql12 = "SELECT * FROM students WHERE ScholarID = $scid";
                $result12 = mysqli_query($con,$sql12);
                $row12 = mysqli_fetch_array($result12);
                $name = $row12['Name'];
                $sql11 = "INSERT INTO driveresponses(DriveID,ScholarID,Name,DriveDate) VALUES('$driveid','$scid','$name','$drivedate')";
                mysqli_query($con,$sql11);
                $studenteligible = $studenteligible+mysqli_num_rows($result12);
              }
              }
            }
    }


    if ($type==1) {
                  
              }          

$sql50 = "UPDATE stats SET eligible=$studenteligible WHERE driveyear='$driveyear' AND CompanyName='$companyname' AND ID='$driveid'";
mysqli_query($con,$sql50);

header('Location:../student_coo.php');





?>