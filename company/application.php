<?php
session_start();
error_reporting(0);
//print_r($_SESSION);
include('../common/config.php');
include('../common/conn.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
      if(isset($_POST['buttsubmit'])){
        //print_r($_POST);
        $id=$_POST['id'];
        //$_SESSION['newtest']=1;
        $newtest=1;
       /* $mlaannouncement=$_POST['mlaannouncement'];*/
        $sql="update adduser set newtest=:newtest where id=:id ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':newtest',$newtest,PDO::PARAM_STR);
        /*$query->bindParam(':mlaannouncement',$mlaannouncement,PDO::PARAM_STR);
        $query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
        $query->bindParam(':gender',$gender,PDO::PARAM_STR);
        $query->bindParam(':dob',$dob,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);*/
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->execute();
        /*$msg="localhost/jobportal/user/test.php?companyname=".$_SESSION['alogin'];
        mail("someone@example.com","",$msg);*/
        $to = $_POST['mail'];
        $subject = "Company Interview Link";

        $message = "
        <html>
        <head>
        <title>Company Interview</title>
        </head>
        <body>
        <p>User Login</p>
        <p>localhost/jobportal/user</p>
        <p>Company Interview Link is</p>
        <p>localhost/jobportal/user/test.php?companyname=".$_SESSION['alogin']."</p>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        /*$headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";*/

        mail($to,$subject,$message,$headers);
      }?>
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
          <div class="col-md-12">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Our Job List</h5>
                <!-- <h4 class="card-title">Tasks</h4> -->
              </div>
              <div class="card-body ">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Company name</th>
                    <th>Job Tittle</th>
                    <th>Email</th>
            
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $company =$_SESSION['alogin'];
                      $sql22 = "SELECT * FROM `apply` WHERE company='$company';";
                      $res = mysqli_query($conn,$sql22);
                      if (mysqli_num_rows($res) > 0) {
                       
                        while($row = mysqli_fetch_assoc($res)) {
   
                        
                      ?>
                      <tr>
                        
                        <td><?php echo $row['company']?></td>
                        <td><?php echo $row['tittle']?></td>
                        <td><?php echo $row['email']?></td>
          
                        
                                  </tr>
                  <?php 
                    
                      }   
                    }
                  ?>
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div> </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
  $(function () {
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
<?php
}
?>