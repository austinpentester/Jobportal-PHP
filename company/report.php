<?php
session_start();
error_reporting(0);

include('../common/config.php');
include('../common/conn.php');

if (isset($_GET['delete'])) {
    $edit_id = $_GET['delete'];
    $sql = "DELETE FROM `addjob` WHERE id='$edit_id'";
    if (mysqli_query($conn, $sql)) {
        //header('Location: manage-jobs.php');
    }
}
if (isset($_POST['submit'])) {
    $edit_id = $_GET['edit'];

    $jobtitle = $_POST['Jobtittle'];
    $companyname = $_POST['Companyname'];
    $location = $_POST['location'];
    $vacancy = $_POST['vacancy'];
    $jobnature = $_POST['jobnature'];
    $salary = $_POST['salary'];
    $skills = $_POST['Skills'];
    $information = $_POST['information'];
    $date = date('Y-m-d');
    $sql1 = "UPDATE `addjob` SET `jobtitle`='$jobtitle',`companyname`='$companyname',`jobdescription`='$information',`date`='$date',`location`='$location',`vacancy`='$vacancy',`job_nature`='$jobnature',`salary`='$salary',`application_date`='$date',`Skills`='$skills' WHERE `id`='$edit_id'";
    if (mysqli_query($conn, $sql1)) {
        header('Location: manage-jobs.php');
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
        JOB PORTAL
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
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <!--  -->
            <?php include_once("nav.php"); ?>
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

                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header ">
                <!-- <canvas id="bigDashboardChart"></canvas> -->
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card  card-tasks">
                            <div class="card-header ">
                                <?php //print_r($_SESSION);
                                ?>
                                <h5 class="card-category">Report</h5>
                                <!-- <h4 class="card-title">Tasks</h4> -->
                            </div>
                            <div class="card-body ">
        <h4>Total Users</h4>


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Total Users</th>
                                            <th scope="col">Total Companies</th>
               
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php


$sql = "SELECT * FROM `examinee_tbl`";

if ($result = mysqli_query($conn, $sql)) {

    
    $rowcount = mysqli_num_rows( $result );
    

 }

 $sq1l = "SELECT * FROM `company`";

if ($result1 = mysqli_query($conn, $sq1l)) {

    
    $rowcount1 = mysqli_num_rows( $result1 );
    

 }

?>
                                        <tr>
                                            <th scope="row"><?php echo $rowcount ?> Users</th>
                                            <td><?php echo $rowcount1 ?></td>
                              
                                        </tr>
                      
                          
                                    </tbody>
                                </table>



                                <h4>Total Jobs Posted</h4>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Total Jobs</th>
            <th scope="col">Total Application</th>

        </tr>
    </thead>
    <tbody>

    <?php
$cpm = $_SESSION['alogin'];

$sql3 = "SELECT * FROM `apply` WHERE company='$cpm'";

if ($result = mysqli_query($conn, $sql3)) {

    $rowcount2 = mysqli_num_rows( $result );


}


$sql31 = "SELECT * FROM `addjob` WHERE companyname='$cpm'";

if ($result5 = mysqli_query($conn, $sql31)) {

    $rowcount3 = mysqli_num_rows( $result5 );


}

?>
        <tr>
            <th scope="row"><?php echo $rowcount3 ?> </th>
            <td><?php echo $rowcount2 ?> </td>

        </tr>


    </tbody>
</table>

<center> <button type="button" onclick="window.print()" class="btn btn-primary">Print</button></center>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <!-- /.content-wrapper -->
        <?php require('common/footer.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>