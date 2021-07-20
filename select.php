<?php  
session_start();
 include 'connection.php'; 

 $output = '';  
 $sql = "SELECT * FROM internshipdetails WHERE Status = 0";  
 $result = mysqli_query($con, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <thead style="background:#383736; color: white; ">
                <tr>  
                     <th width="7.5%">Scholar Id</th>
                     <th width="20%">Name</th>  
                     <th width="20%">Company Name</th>
                     <th width="7.5%">Duration</th>  
                     <th width="10%">Location</th>  
                     <th width="5%">On-campus</th>  
                     <th width="25%">Certificate</th>

                     <th width="7%">Delete</th>  
                     <th width="8%">Accept</th>  
                </tr></thead>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  // 

  $x  = 1;
  $i = 0;
      while($row = mysqli_fetch_array($result))  
      {  
$sql1 = "SELECT * FROM students WHERE ScholarID = ".$row['ScholarID']."";
 $result1 = mysqli_query($con, $sql1); 
$row2 = mysqli_fetch_assoc($result1);
if($row["Placement"]){$print="&#10004";}else{$print="X";}
           $output .= '  
                <tr style="background-color: white;">  
                     <td>'.$row["ScholarID"].'</td>  
                     <td id="Name'.$row2["ScholarID"].$i.'" class="last_name" data-idName="'.$row2["Name"].'">'.$row2["Name"].'</td>
                     <td id="CompanyName'.$row["ScholarID"].$i.'" class="last_name" data-idCompanyName="'.$row["CompanyName"].'">'.$row["CompanyName"].'</td>
                     <td id="Duration'.$row["ScholarID"].'" class="first_name" data-idDuration="'.$row["Duration"].'" >'.$row["Duration"].'</td>  
                     <td id="Location'.$row["ScholarID"].'" class="first_name" data-idLocation="'.$row["Location"].'" >'.$row["Location"].'</td>  
                     <td id="Oncampus'.$row["ScholarID"].'" class="first_name" data-idOncampus="'.$row["Placement"].'" >'.$print.'</td>  
                     <td id="Certificate'.$row["ScholarID"].'" class="last_name" data-idCertificate="'.$row["Certificate"].'"><a href="'.$row["Certificate"].'" target = "_blank">'.'proof'.'</a></td>
                     <td><button type="button" name="delete_btn" data-id3="'.$row["ScholarID"].$i.'" class="btn btn-xs btn-danger btn_delete">x</button></td>

                     <td><button type="button" name="delete_btn" data-id4="'.$row["ScholarID"].$i.'" class="btn btn_accept " >&#x2705;</button></td>  
                </tr>  
           ';  
           $i++;
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