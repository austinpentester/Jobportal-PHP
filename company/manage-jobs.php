<?php
session_start();
error_reporting(0);

include('../common/config.php');
include('../common/conn.php');

if(isset($_GET['delete'])){
  $edit_id = $_GET['delete'];
  $sql = "DELETE FROM `addjob` WHERE id='$edit_id'";
  if(mysqli_query($conn,$sql)){
    //header('Location: manage-jobs.php');
}
}
if(isset($_POST['submit']))
      {
           $edit_id = $_GET['edit'];
        
           $jobtitle=$_POST['Jobtittle']; 
           $companyname=$_POST['Companyname']; 
           $location=$_POST['location']; 
           $vacancy = $_POST['vacancy'];
           $jobnature = $_POST['jobnature'];
           $salary=$_POST['salary']; 
           $skills=$_POST['Skills'];
           $information=$_POST['information'];
           $date = date('Y-m-d');
           $sql1 = "UPDATE `addjob` SET `jobtitle`='$jobtitle',`companyname`='$companyname',`jobdescription`='$information',`date`='$date',`location`='$location',`vacancy`='$vacancy',`job_nature`='$jobnature',`salary`='$salary',`application_date`='$date',`Skills`='$skills' WHERE `id`='$edit_id'";
           if(mysqli_query($conn,$sql1)){
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
      <?php include_once("nav.php");?>
    </div>
<?php
 if(!isset($_GET['edit'])){

 ?>
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
                    <th style="width:10%;">#</th>
                    <th>Job title</th>
                    <th>Job Salary</th>
                    <th>Location</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php
      
                  //print_r($_SESSION);
                    $sql ="SELECT * FROM addjob WHERE companyname=:companyname";
                    $query= $dbh -> prepare($sql);
                    $query->bindParam(':companyname',$_SESSION['alogin'],PDO::PARAM_STR);
                    $query-> execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0){
                      $cnt=1;
                      foreach($results as $result)
                      {
                        
                      ?>
                      <tr>
                        
                        <td><?php echo $cnt;//$result->id;?></td>
                        <td><?php echo $result->jobtitle;?></td>
                        <td><?php echo $result->salary;?></td>
                        <td><?php echo $result->location;?></td>
                        <td><a href="?edit=<?php echo $result->id; ?>" class="btn btn-info m-1">Edit</a></td>
                        <td><a href="?delete=<?php echo $result->id; ?>" class="btn btn-danger m-1">Delete</a></td>
                        
                                  </tr>
                      <?php 
                      $cnt++;
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
<?php
 }elseif(isset($_GET['edit'])){

        $edit_id = $_GET['edit'];
        


          $sql = "SELECT * FROM `addjob` WHERE id='$edit_id';";

          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $result = $stmt->fetchAll();
          foreach ($result as $row) 
          {
?>



   

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
                    <h5 class="card-category">Add Jobs</h5>
                    <!-- <h4 class="card-title">Tasks</h4> -->
                  </div>
                  <div class="card-body ">
                    <?php if ($msg) { ?>
                      <div class="alert alert-success left-icon-alert" role="alert">
                        <strong>Well done! </strong><?php echo htmlentities($msg); ?>
                      </div><?php } else if ($error) { ?>
                      <div class="alert alert-danger left-icon-alert" role="alert">
                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                      </div>
                    <?php } ?>
                    <form method="Post" action="manage-jobs.php?edit=<?php echo $row["id"]; ?>">
                      <!-- 2 column grid layout with text inputs for the first and last names -->
                      <div class="row mb-4">
                        <div class="col">
                          <div class="form-outline">
                            <input type="text" id="form6Example1" class="form-control" value="<?php echo  $row["jobtitle"] ?>" name="Jobtittle" />
                            <label class="form-label" for="form6Example1">Job Tittle</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-outline">
                            <input type="text" id="form6Example2" class="form-control" readonly value="<?php echo $_SESSION['alogin']; ?>" name="Companyname" />
                            <label class="form-label" for="form6Example2">Companyname</label>
                          </div>
                        </div>
                      </div>


                      <!-- Text input -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example3"  value="<?php echo  $row["location"] ?>" class="form-control" name="location" />
                        <label class="form-label" for="form6Example3">location</label>
                      </div>

                      <!-- Text input -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example4"  value="<?php echo  $row["vacancy"] ?>" class="form-control" name="vacancy" />
                        <label class="form-label" for="form6Example4">vacancy</label>
                      </div>

                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example5" class="form-control"  value="<?php echo  $row["job_nature"] ?>" name="jobnature" />
                        <label class="form-label" for="form6Example5">Job Nature</label>
                      </div>

                      <!-- Number input -->
                      <div class="form-outline mb-4">
                        <input type="number" id="form6Example6" class="form-control" name="salary"  value="<?php echo  $row["salary"] ?>" />
                        <label class="form-label" for="form6Example6">Salary</label>
                      </div>
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example6" class="form-control" name="Skills" value="<?php echo  $row["Skills"] ?>" />
                        <label class="form-label" for="form6Example6">Skills</label>
                      </div>
                      <!-- Message input -->
                      <div class="form-outline mb-4">
                        <textarea class="form-control" id="form6Example7" rows="4" name="information"> <?php echo  $row["jobdescription"] ?></textarea>
                        <label class="form-label" for="form6Example7">Additional information</label>
                      </div>




                      <!-- Submit button -->
                      <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">update</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
 
          </div>
        </div>

<?php
 }}
?>
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
