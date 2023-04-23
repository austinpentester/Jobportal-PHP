<?php
session_start();
error_reporting(0);
include('common/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>    <body class="">
        <div class="main-wrapper">

            <div class="">
                <div class="row">
 <h1 align="center" class="text-center" style="text-align: center !important;width: 100%">Job Portal</h1>
                    
                    <div class="col-lg-12">
                        <section class="section">
                            <div class=" mt-40">
                                <div class="col-md-12 col-md-offset-1 pt-50">

                                    <div class="row mt-30 ">
                                        <div class="col-md-12">
                                            <div class="panel" style="width: 30%;margin-left: auto;margin-right: auto;border-top:2px solid blue;background: whitesmoke;padding: 20px;">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>User Login</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">

                                                    <div class="section-title">
                                                        <p class="sub-title">Job Portal</p>
                                                    </div>

                                                    <form class="form-horizontal" method="post">
                                                      <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName">
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                        <div class="col-sm-10">
                                                          <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                      </div>
                                                    
                                                        <div class="form-group mt-20">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                           
                                                          <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                        </div>
                                                      </div>
                                                    </form>

                                            

                                                 
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <p class="text-muted text-center"><small>Copyright © <?php echo date(Y);?> Job Portal</small></p>
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
              
<style type="text/css">
    .row{
        margin:0px !important;
    }
</style>
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
