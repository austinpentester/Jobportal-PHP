
<?php
session_start();
error_reporting(0);
include('../common/conn.php');
/*if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{*/
        if(isset($_POST['submit']))
        {
          //print_r($_POST['answea']);
             $jobtitle=$_POST['Jobtittle']; 
             $companyname=$_POST['Companyname']; 
             $location=$_POST['location']; 
             $vacancy = $_POST['vacancy'];
             $jobnature = $_POST['jobnature'];
             $salary=$_POST['salary']; 
             $skills=$_POST['Skills']; 
             $information=$_POST['information'];
             $jobCategory = $_POST['course'];
             $date = date('Y-m-d');
             
             $sql = "INSERT INTO `addjob` (`id`, `jobtitle`, `companyname`, `jobdescription`, `date`, `location`, `vacancy`, `job_nature`, `salary`, `application_date`, `Skills`,`Category`) VALUES (NULL, '$jobtitle', '$companyname', '$information', '$date', '$location', '$vacancy', '$jobnature', '$salary', '$date', '$skills','$jobCategory');";
             if(mysqli_query($conn, $sql)){
                 header('Location: add-job.php');
             }
             
             

          //  $sql="INSERT INTO  addjob(jobtitle,companyname,jobdescription) VALUES(:jobtitle,:companyname,:jobdescription)";
          //   $query = $dbh->prepare($sql);
          //   $query->bindParam(':jobtitle',$jobtitle,PDO::PARAM_STR);
          //   $query->bindParam(':companyname',$companyname,PDO::PARAM_STR);
          //   $query->bindParam(':jobdescription',$jobdescription,PDO::PARAM_STR);
            
          // $query->execute();
          $lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Job info added successfully";
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
    Jobportal
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
                <?php //print_r($_SESSION);?>
                <h5 class="card-category">Add Jobs</h5>
                <!-- <h4 class="card-title">Tasks</h4> -->
              </div>
              <div class="card-body ">
                <?php if($msg){?>
                <div class="alert alert-success left-icon-alert" role="alert">
                 <strong>Well done! </strong><?php echo htmlentities($msg); ?>
                 </div><?php } 
                else if($error){?>
                    <div class="alert alert-danger left-icon-alert" role="alert">
                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                    </div>
                    <?php } ?>
                    <form method="Post" action="add-job.php">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" name="Jobtittle" />
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
    <input type="text" id="form6Example3" class="form-control" name="location"/>
    <label class="form-label" for="form6Example3">location</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example4" class="form-control" name="vacancy"/>
    <label class="form-label" for="form6Example4">vacancy</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example5" class="form-control" name="jobnature" />
    <label class="form-label" for="form6Example5">Job Nature</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="number" id="form6Example6" class="form-control" name="salary"/>
    <label class="form-label" for="form6Example6">Salary</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="form6Example6" class="form-control" name="Skills"/>
    <label class="form-label" for="form6Example6">Skills</label>
  </div>
  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="form6Example7" rows="4" name="information"></textarea>
    <label class="form-label" for="form6Example7">Additional information</label>
  </div>

  <div class="form-outline mb-4">
  <select data-placeholder="Please Select Language" name="course" id="language" class="chosen form-control form-control-lg">
                        <option value="---------------- -">---</option>
                        <?php
                        include "../../common/conn.php";
                        $sql = "SELECT * FROM `course_tbl`";
                        $result = mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_array($result)) {
                            $name = $row['cou_name'];
                            $val = $row['cou_id'];
?>
                            <option value="<?php echo $val ?>"><?php echo $name ?></option>

<?php
                        }

?>
                       
          
                   </select>
    <label class="form-label" for="form6Example7">Job Category</label>
  </div>


  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Post</button>
</form>
              </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Backend development</h5>
                <h4 class="card-title">Tasks</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Persons List</h5>
                <h4 class="card-title"> Employees Stats</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Country
                      </th>
                      <th>
                        City
                      </th>
                      <th class="text-right">
                        Salary
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Dakota Rice
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <td class="text-right">
                          $36,738
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Minerva Hooper
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Sage Rodriguez
                        </td>
                        <td>
                          Netherlands
                        </td>
                        <td>
                          Baileux
                        </td>
                        <td class="text-right">
                          $56,142
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Doris Greene
                        </td>
                        <td>
                          Malawi
                        </td>
                        <td>
                          Feldkirchen in Kärnten
                        </td>
                        <td class="text-right">
                          $63,542
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Mason Porter
                        </td>
                        <td>
                          Chile
                        </td>
                        <td>
                          Gloucester
                        </td>
                        <td class="text-right">
                          $78,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <!-- <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer> -->
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
/*}*/
?>