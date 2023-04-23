<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include('../../common/conn.php');
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
// $password=md5($password); 
$result = mysqli_query($conn,"SELECT yourname FROM adduser WHERE youremail = '$email' and yourpassword = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
while($row = mysqli_fetch_array($result)) {
	$name = $row['yourname'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
// header("location:account.php?q=1");
header("location:index.php");
}
else
header("location:$ref?w=Wrong Username or Password");


?>