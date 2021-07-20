<?php
	$currentDir = getcwd();
	$uploadDir= '/uploads/';

	$errors = []; // Store all foreseen and unforseen errors here
	
	// Get all the file extensions
	$file_extensions = ['jpeg', 'jpg', 'png', 'txt', 'pdf', 'csv', 'zip', 'rar', 'docx', 'ppt', 'pps', 'pptx', 'jar', 'htm', 'html'];

	$fileName = "";
	$fileSize = "";
	$fileTmpName = "";
	$fileType = "";


	if(isset($_POST['send'])){
		$fileName = $_FILES["drive"]["name"];
		// echo $fileName;
	}

	if(isset($_POST['send'])){
		$fileSize = $_FILES['drive']['size'];
		// echo $fileName;
	}

	if(isset($_POST['send'])){
		$fileTmpName  = $_FILES['drive']['tmp_name'];
		// echo $fileName;
	}

	if(isset($_POST['send'])){
		$fileType = $_FILES['drive']['type'];
		// echo $fileName;
	}
    
    $tmp = explode('.', $fileName);
    $file_extension = end($tmp);

    $uploadPath = $currentDir . $uploadDir . basename($fileName);
    if (isset($_POST['send'])) {

        if (! in_array($file_extension, $file_extensions)) {
            $errors[] = "This file extension is not allowed. Please upload a valid file format.";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                // echo "The file " . basename($fileName) . " has been uploaded";
                echo "Success!";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } 
        else {
        	foreach ($errors as $error) {
            	echo $error . "These are the errors" . "\n";
        	}
    	}

    }


?>