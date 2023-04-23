<?php
session_start();
error_reporting(0);
include('common/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(isset($_POST['submit']))
        {
            //print_r($_POST);
             $question=$_POST['question']; 
             $answer=$_POST['answer']; 
             $ans1=$_POST['answea'][0]; 
             $ans2=$_POST['answea'][1]; 
             $ans3=$_POST['answea'][2]; 
             $ans4=$_POST['answea'][3]; 
             $class=$_POST['class']; 
           $sql="INSERT INTO  questionanswer(question,answer,language,ans1,ans2,ans3,ans4) VALUES(:question,:answer,:class,:ans1,:ans2,:ans3,:ans4)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':question',$question,PDO::PARAM_STR);
            $query->bindParam(':answer',$answer,PDO::PARAM_STR);
            $query->bindParam(':class',$class,PDO::PARAM_STR);
            $query->bindParam(':ans1',$ans1,PDO::PARAM_STR);
            $query->bindParam(':ans2',$ans2,PDO::PARAM_STR);
            $query->bindParam(':ans3',$ans3,PDO::PARAM_STR);
            $query->bindParam(':ans4',$ans4,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
            $msg="Questions info added successfully";
            }
            else 
            {
            $error="Something went wrong. Please try again";
        }

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
      <?php include_once('common/nav.php');?>
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
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Question</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
                    <!-- /.left-sidebar -->

                    <div class="main-page col-md-12 card">

                     <div class="container-fluid ">
                            <div class="row page-title-div">
                                <div class="col-md-12 card-header">
                                    <h2 class="title">Questions & Answers</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <!-- <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home / </a></li>
                                
                                        <li class="active"> Questions & Answers</li>
                                    </ul>
                                </div>
                             
                            </div> -->
                            <!-- /.row -->
                        </div>
                        <div class=" card-body">
                           
                        <div class="">
                                    <div class="">
                                        <div class="panel">
                                            <!-- <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div> -->
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">

<div class="form-group row">
     <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<label for="default" class="col-sm-2 control-label">Question</label>
<div class="col-sm-10">
     <textarea name="question" class="form-control" id="question"></textarea>
                <script>
                        CKEDITOR.replace( 'question' );
                </script>
<!-- <input type="text" name="question" class="form-control" id="question" required="required" autocomplete="off"> -->
</div>
</div>




<div class="form-group row">
<label for="default" class="col-sm-2 control-label">Answer</label>
<div class="col-sm-10">
    <input type="text" name="an" id="ans">
    <button type="button" id="ansbutt">Add</button>
<div id="answe"></div>
<!-- <input type="radio" name="answer" value="Both (i) and (ii)" required="required" checked=""> Both (i) and (ii) 
<input type="radio" name="answer" value="Both (ii) and (iv)" required="required"> Both (ii) and (iv) 
<input type="radio" name="answer" value="Only (ii)" required="required"> Only (ii) -->
</div>
</div>

<div class="form-group row">
    <label for="default" class="col-sm-2 control-label">Language</label>
    <div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Language</option>
<option value="Bootstrap">Bootstrap</option>
<option value="PHP">PHP</option>
 </select>
                                                        </div>
                                                    </div>

                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    <!-- /.content-wrapper -->
  <?php require('common/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
        $("#ansbutt").click(function(){
            //alert($("#ans").val());
            val=$("#ans").val();
            $("#answe").append("<input type='radio' name='answer' value='"+val+"' required='required'>"+val+"<br><input type='hidden' value='"+val+"' name='answea[]'>");
            //$("#ans").val("");
        })
    </script>
</body>
</html>
<?php
}
?>
