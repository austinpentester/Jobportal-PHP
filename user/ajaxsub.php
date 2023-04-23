<?php
	//print_r($_POST);
	include_once("../common/conn.php");
	print_r($_FILES);
	//die();

	$target_dir = "user/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$store = basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	  } else {
		echo "Sorry, there was an error uploading your file.";
	  }
	}
	

	$uname	= $_POST['yourname'];
	$email = $_POST['youremail'];
	$course = $_POST['course'];
	$pass = $_POST['yourpassword'];
	$number = $_POST['number'];
	$sql="INSERT INTO `examinee_tbl`(`exmne_fullname`, `exmne_course`, `exmne_email`, `exmne_password`,`resume`,`number`) VALUES ('$uname','$course','$email','$pass','$store','$number')";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		header("Location:user/login.php?sucess");
	}
	else 
	{
		echo "Fail";
	}
?>