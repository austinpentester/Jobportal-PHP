<?php
session_start();
error_reporting(0);
include('../common/config.php');
/*print_r($_SESSION);*/
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
      if(isset($_POST['update'])){
        //print_r($_POST);
        $yourname=$_POST['yourname'];
        $youremail=$_POST['youremail']; 
        $yournumber=$_POST['yournumber'];
        $cid=$_POST['id'];
        $yourpassword=$_POST['yourpassword'];
        $language=$_POST['language'];
        $sql="update  adduser set yourname=:yourname,youremail=:youremail,yournumber=:yournumber,yourpassword=:yourpassword,language=:language where id=:cid ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':yourname',$yourname,PDO::PARAM_STR);
        $query->bindParam(':youremail',$youremail,PDO::PARAM_STR);
        $query->bindParam(':yournumber',$yournumber,PDO::PARAM_STR);
        $query->bindParam(':yourpassword',$yourpassword,PDO::PARAM_STR);
        $query->bindParam(':language',$language,PDO::PARAM_STR);
        $query->bindParam(':cid',$cid,PDO::PARAM_STR);
        $query->execute();
        $msg= "User has been updated successfully";
      }
      ?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JOBPORTAL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> -->

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
     <!--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light text-center" style="text-align: center">JOB PORTAL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <?php include_once('nav.php');?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <div class="col-lg-12" style="background-color: white;padding:20px">
            <!-- <h4>User Edit</h4> -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Edit</h3>
              </div>
              <?php echo "<p>".$msg."</p>";?>
            <form method="POST">
            <?php //print_r($_SESSION);
             $yourname=$_SESSION['alogin'];
              $sql1="SELECT * FROM adduser WHERE yourname=:yourname";
              $query1= $dbh -> prepare($sql1);
              $query1-> bindParam(':yourname', $yourname, PDO::PARAM_STR);
              
              $query1-> execute();
              $results1=$query1->fetchAll(PDO::FETCH_OBJ);
              //echo $query1->rowCount();
              if($query1->rowCount() >0){
                foreach($results1 as $result)
                { 
                  ?>
                  <div class="card-body">
                    <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Name</label> -->
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $result->id;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="yourname" id="yourname" value="<?php echo $result->yourname;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="youremail" id="youremail" value="<?php echo $result->youremail;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Phone Number</label>
                    <input type="number" class="form-control" name="yournumber" id="yournumber" value="<?php echo $result->yournumber;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Password</label>
                    <input type="text" class="form-control" name="yourpassword" id="yourpassword" value="<?php echo $result->yourpassword;?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputFile">Language</label>
                    <select class="custom-select" name="language" id="language">
                          <option value="---">---</option>

                          <option value="Bootstrap" <?php if($result->language=='Bootstrap'){echo 'selected';}?>>Bootstrap</option>
                          <option value="PHP" <?php if($result->language=='PHP'){echo "selected";}?>>PHP</option>
                          
                        </select>
                  </div>
                </div>
                  <?php
                 
                }
              }
            ?>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update">Update</button>
                </div>
            </form>
            
            
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php include_once('../common/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
<?php
}
?>