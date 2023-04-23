<?php
session_start();
error_reporting();
print_r($_SESSION);
include('../common/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(isset($_POST['submit']))
        {
            //print_r($_POST['answea']);
             $question=$_POST['question']; 
             $answer=$_POST['answer']; 
             $ans1=$_POST['answea'][0]; 
             $ans2=$_POST['answea'][1]; 
             $ans3=$_POST['answea'][2]; 
             $ans4=$_POST['answea'][3]; 
             $class=$_POST['class']; 
             $role=$_SESSION['alogin'];
           $sql="INSERT INTO  questionanswer(question,answer,language,ans1,ans2,ans3,ans4,role) VALUES(:question,:answer,:class,:ans1,:ans2,:ans3,:ans4,:role)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':question',$question,PDO::PARAM_STR);
            $query->bindParam(':answer',$answer,PDO::PARAM_STR);
            $query->bindParam(':class',$class,PDO::PARAM_STR);
            $query->bindParam(':ans1',$ans1,PDO::PARAM_STR);
            $query->bindParam(':ans2',$ans2,PDO::PARAM_STR);
            $query->bindParam(':ans3',$ans3,PDO::PARAM_STR);
            $query->bindParam(':ans4',$ans4,PDO::PARAM_STR);
            $query->bindParam(':role',$role,PDO::PARAM_STR);
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
  ?>      
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <!--  -->
      <?php include_once("nav.php");?>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
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
