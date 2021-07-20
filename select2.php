<?php  
session_start();
 include 'connection.php'; 

 $output = '';  
 $sql = "SELECT * FROM academicdetails WHERE Status = 0";  
 $result = mysqli_query($con, $sql);  
 $output .= '  
      <div class="table-responsive" style="height:270px;">  
           <table class="table table-bordered">  
              <thead style="background:#383736; color: white; ">
                <tr>  
                     <th width="10%">Scholar Id</th>
                     <th width="15%">Name</th>  
                     <th width="32%">Respective Score</th>
                     <th width="33%">Respective Proof</th>  
                    

                     <th width="10%">Delete</th>  
                     <th width="10%">Accept</th>  
                </tr></thead>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  // 

  $x  = 1;
      while($row = mysqli_fetch_array($result))  
      {  
$sql1 = "SELECT * FROM students WHERE ScholarID = ".$row['ScholarID']."";
 $result1 = mysqli_query($con, $sql1); 
$row2 = mysqli_fetch_assoc($result1);
                      $temp = '<option selected hidden>Score</option>'; 
                      if ($row['X']) {
                        # code...
                        $X = '<option style="color: black;font-weight:bold;" disabled>Class X - '.$row['X'].'</option>';
                         $Xproof = '<a target="_blank" class="dropdown-item" href="'.$row['XProof'].'">ClassX</a>';
                      }else{
                        $X = '';
                        $Xproof = '';
                      }
                      if ($row['XII']) {
                        # code...
                         $XII = '<option style="color: black;font-weight:bold;" disabled>Class XII - '.$row['XII'].'</option>';
                         $XIIproof = '<a target="_blank" class="dropdown-item" href="'.$row['XIIProof'].'">ClassXII</a>';
                      }else{
                        $XII = '';
                        $XIIproof = '';
                      }
                      if ($row['Semester1']) {
                        # code...
                         $Semester1 = '<option style="color: black;font-weight:bold;" disabled>Semester1 - '.$row['Semester1'].'</option>';
                         $Semester1proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem1Proof'].'">Semester1</a>';
                      }else{
                        $Semester1 = '';
                        $Semester1proof ='';
                      }
                      if ($row['Semester2']) {
                        # code...
                         $Semester2proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem2Proof'].'">Semester2</a>';
                         $Semester2 = '<option style="color: black;font-weight:bold;" disabled>Semester2 - '.$row['Semester2'].'</option>';
                      }else{
                        $Semester2proof ='';
                        $Semester2 = '';
                      }
                      if ($row['Semester3']) {
                        # code...
                         $Semester3proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem3Proof'].'">Semester3</a>';
                         $Semester3 = '<option style="color: black;font-weight:bold;" disabled>Semester3 - '.$row['Semester3'].'</option>';
                      }else{
                        $Semester3proof ='';
                        $Semester3 = '';
                      }
                      if ($row['Semester4']) {
                        # code...
                         $Semester4proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem4Proof'].'">Semester4</a>';
                         $Semester4 ='<option style="color: black;font-weight:bold;" disabled>Semester4 - '.$row['Semester4'].'</option>';
                      }else{
                        $Semester4proof ='';
                        $Semester4 = '';
                      }
                      if ($row['Semester5']) {
                        # code...
                         $Semester5proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem5Proof'].'">Semester5</a>';
                         $Semester5 = '<option style="color: black;font-weight:bold;" disabled>Semester5 - '.$row['Semester5'].'</option>';
                      }else{
                        $Semester5proof ='';
                        $Semester5 = '';
                      }
                      if ($row['Semester6']) {
                        # code...
                         $Semester6proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem6Proof'].'">Semester6</a>';
                         $Semester6 = '<option style="color: black;font-weight:bold;" disabled>Semester6 - '.$row['Semester6'].'</option>';
                      }else{
                        $Semester6proof ='';
                        $Semester6 = '';
                      }
                      if ($row['Semester7']) {
                        # code...
                         $Semester7proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem7Proof'].'">Semester7</a>';
                         $Semester7 = '<option style="color: black;font-weight:bold;" disabled>Semester7 - '.$row['Semester7'].'</option>';
                      }else{
                        $Semester7proof ='';
                        $Semester7 = '';
                      }
                      if ($row['Semester8']) {
                        # code...
                         $Semester8proof = '<a target="_blank" class="dropdown-item" href="'.$row['Sem8Proof'].'">Semester8</a>';
                         $Semester8 ='<option style="color: black;font-weight:bold;" disabled>Semester8 - '.$row['Semester8'].'</option>';
                      }else{
                        $Semester8proof ='';
                        $Semester8 = '';
                      }
           $output .= '  
                <tr style="background-color: white;">  
                     <td>'.$row["ScholarID"].'</td>  
                     <td id="Name'.$row2["ScholarID"].'" class="last_name" data-idName="'.$row2["Name"].'">'.$row2["Name"].'</td>
                     

                     <td id="CompanyName'.$row["ScholarID"].'" class="last_name" data-idCompanyName="'.$row["ScholarID"].'"><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Scores
  </button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton">



                     '.
                     $X.''.$XII.''.$Semester1.''.$Semester2.''.$Semester3.''.$Semester4.''.$Semester5.''.$Semester6.''.$Semester7.''.$Semester8.''.$temp.'</td>
<td id="Duration'.$row["ScholarID"].'" class="first_name" data-idDuration="'.$row["ScholarID"].'" ><div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Marksheets
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  '.$Xproof.''.$XIIproof.''.$Semester1proof.''.$Semester2proof.''.$Semester3proof.''.$Semester4proof.''.$Semester5proof.''.$Semester6proof.''.$Semester7proof.''.$Semester8proof.'
  </div>
</div></td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["ScholarID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>

                     <td><button type="button" name="delete_btn" data-id4="'.$row["ScholarID"].'" class="btn btn_accept " >&#x2705;</button></td>  
                </tr>  
           ';  
      }  
      // $output .= '  
      //      <tr>  
      //           <td></td>  
      //           <td id="first_name" contenteditable></td>  
      //           <td id="last_name" contenteditable></td>  
      //           <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
      //      </tr>  
      // ';   
 }
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>