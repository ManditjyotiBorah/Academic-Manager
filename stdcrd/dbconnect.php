
<?php 
	$conn = mysqli_connect('localhost','root','','coord');


	if (!$conn) {
	    echo "connection failed: " . mysqli_connect_error()."<br>";
	    echo "connection error no: " . mysqli_connect_errno();

	} else {
	   // echo "connected successfuly";
	}

?>