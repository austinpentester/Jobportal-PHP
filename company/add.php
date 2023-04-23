<?php
session_start();
error_reporting(0);
include('../common/config.php');
/*if(strlen($_SESSION['alogin'])=="")
{   
header("Location: index.php"); 
}
else{*/
if (isset($_POST['submit'])) {
  //print_r($_POST['answea']);
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  $ans1 = $_POST['answea'][0];
  $ans2 = $_POST['answea'][1];
  $ans3 = $_POST['answea'][2];
  $ans4 = $_POST['answea'][3];
  $class = $_POST['class'];
  $role = $_SESSION['alogin'];
  $sql = "INSERT INTO  questionanswer(question,answer,language,ans1,ans2,ans3,ans4,role) VALUES(:question,:answer,:class,:ans1,:ans2,:ans3,:ans4,:role)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':question', $question, PDO::PARAM_STR);
  $query->bindParam(':answer', $answer, PDO::PARAM_STR);
  $query->bindParam(':class', $class, PDO::PARAM_STR);
  $query->bindParam(':ans1', $ans1, PDO::PARAM_STR);
  $query->bindParam(':ans2', $ans2, PDO::PARAM_STR);
  $query->bindParam(':ans3', $ans3, PDO::PARAM_STR);
  $query->bindParam(':ans4', $ans4, PDO::PARAM_STR);
  $query->bindParam(':role', $role, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Questions info added successfully";
  } else {
    $error = "Something went wrong. Please try again";
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
    JobPortal
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
                <h5 class="card-category">Add Question & Answer</h5>
                <!-- <h4 class="card-title">Tasks</h4> -->
              </div>
              <div class="card-body ">
                <form class="form-horizontal" method="post">

                  <div class="form-group row">
                    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
                    <label for="default" class="col-sm-2 control-label">Question</label>
                    <div class="col-sm-10">
                      <textarea name="question" class="form-control" id="question"></textarea>
                      <script>
                        CKEDITOR.replace('question');
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
    <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>
    <script>
      $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

      });
    </script>
    <script type="text/javascript">
      $("#ansbutt").click(function () {
        //alert($("#ans").val());
        val = $("#ans").val();
        $("#answe").append("<input type='radio' name='answer' value='" + val + "' required='required'>" + val + "<br><input type='hidden' value='" + val + "' name='answea[]'>");
        //$("#ans").val("");
      })
    </script>
</body>

</html>
<?php
/*}*/
?>