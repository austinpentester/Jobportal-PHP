<?php
session_start();
error_reporting(0);
include('../common/config.php');
/*if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{*/
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
             //$role=6;
           $sql="INSERT INTO  questionanswer(question,answer,language,ans1,ans2,ans3,ans4,role) VALUES(:question,:answer,:class,:ans1,:ans2,:ans3,:ans4,:role)";
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
  ?>      <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    JobPortal
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
          
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        <!-- <canvas id="bigDashboardChart"></canvas> -->
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
               <!--  <h5 class="card-category">Global Sales</h5> -->
                <h4 class="card-title">Company Details</h4>
                <!-- <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item text-danger" href="#">Remove Data</a>
                  </div>
                </div> -->
              </div>
              <div class="card-body">
                <div class="chart-area col-md-12">
                  <p>Company Name : <?php echo $_SESSION['alogin'];?>
                  <!-- <canvas id="lineChartExample"></canvas> -->
                </div>
              </div>
              <!-- <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div> -->
            </div>
          </div>
         
        </div>
        
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>
<?php
/*}*/
?>