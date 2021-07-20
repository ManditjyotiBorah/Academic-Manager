<?php
include "connection.php";

if(isset($_POST['higherstudies']))
{

     $scid = $_POST['higherstudies'];
     $exam = $_POST['exam'];
     $perfomance= $_POST['perfomance'];
     $sql1 = "INSERT INTO higherstudies(scholarID,exam,perfomance ) VALUES('$scid','$exam',$perfomance)";
     mysqli_query($con,$sql1)  ;
    
    
}




$scid = $_POST['plus'];
$sql = "SELECT * FROM higherstudies WHERE scholarID='$scid'";
$result = mysqli_query($con,$sql);
$i=1;?>
<table>
<tr>
<td>S. No </td>

<td>ScholarID </td>
<td>Exam </td>
<td>Perfomance</td>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){
   
      echo '<tr>' ;
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row['scholarID'].'</td>';
        echo '<td>'.$row['exam'].'</td>';
        echo '<td>'.$row['performance'].'</td>';
    
      echo '</tr>';
      $i++;
}
?>
</table>

<?php




    ?>
   <form action='higherstudies.php' method='post'>
   <input type='text' name='exam'>
   <input type='number' name='performance'>
   <button type='submit' value=<?php echo $scid; ?> name='higherstudies'>submit</button>
   </form>
    
    
<?php    

?>





   
?>