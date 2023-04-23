<?php
session_start();
error_reporting(0);
include('../common/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['yourname'];
$password=$_POST['yourpassword'];
$sql ="SELECT yourname,yourpassword FROM adduser WHERE yourname=:uname and yourpassword=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['yourname'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
  <div class="container">
    <div class="anbookanapp">
      <h3 class="text-center">Login</h3>
      <form method="POST">
        <div>
          <label>Your Name</label><br>
          <input type="text" name="yourname" id="yourname">
        </div>
        
        <div>
          <label>Password</label><br>
          <input type="password" name="yourpassword" id="yourpassword">
        </div>
        
        
        <button type="submit" name="login">Submit</button>
        <a href="registration.php" class="btn register">Register</a>
      </form>
      <div class="bookre"></div>
    </div>
  </div>

<style>
label.error {
    color: red;
    padding: 10px;
}
button {
    padding: 10px;
    background: green;
    color: white !important;
    box-shadow: none;
    border: none;
}
select#language {
    width: 100%;
    padding: 5px;
}
  .anbookanapp {
      width: 40%;
      margin: 45px auto;
      padding: 20px;
      -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=10, Direction=333, Color=#DBDBDB)";
      -moz-box-shadow: -2px -1px 10px 10px #DBDBDB;
      -webkit-box-shadow: -2px -1px 10px 10px #DBDBDB;
      box-shadow: -2px -1px 10px 10px #DBDBDB;
      filter: progid:DXImageTransform.Microsoft.Shadow(Strength=10, Direction=135, Color=#DBDBDB);
  }
  input {
      width: 100%;
      padding: 5px;
  }
  form div {
      margin-bottom: 15px;
  }
</style>