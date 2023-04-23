<?php
session_start();
error_reporting(0);
include('../common/config.php');
$yourname=$_SESSION['alogin'];
$sql1="SELECT * FROM adduser WHERE yourname=:yourname";
$query1= $dbh -> prepare($sql1);
$query1-> bindParam(':yourname', $yourname, PDO::PARAM_STR);

$query1-> execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$newtest=0;
              //echo $query1->rowCount();
if($query1->rowCount() >0){
  foreach($results1 as $result)
  {
     $newtest=$result->newtest;
  }
}

if(strlen($_SESSION['alogin'])=="" )
    {   
    header("Location: index.php"); 
    }
    else if($newtest==0){
      echo "<script>alert('The Page was not found');</script>";
    }
    else{

      if(isset($_POST['submit']))
      {
        //print_r($_POST);
        $yourname=$_SESSION['alogin'];
              //echo $yourname;
              $sql1="SELECT * FROM adduser WHERE yourname=:yourname";
              $query1= $dbh -> prepare($sql1);
              $query1-> bindParam(':yourname', $yourname, PDO::PARAM_STR);
              
              $query1-> execute();
              $results1=$query1->fetchAll(PDO::FETCH_OBJ);
              $lan="";
              //echo $query1->rowCount();
              if($query1->rowCount() >0){
                foreach($results1 as $result)
                {
                  $lan=$result->language;
                }
              }
              //echo $lan;
              $role=$_GET['companyname'];
              $sql3="SELECT * FROM questionanswer WHERE language=:lan AND role=:role";
              $query3= $dbh -> prepare($sql3);
              $query3-> bindParam(':lan', $lan, PDO::PARAM_STR);
              $query3-> bindParam(':role', $role, PDO::PARAM_STR);
              
              $query3-> execute();
              $results3=$query3->fetchAll(PDO::FETCH_OBJ);
              $id=[];
              $ans=[];
              $mark=0;
              if($query3->rowCount() >0){
                foreach($results3 as $result2)
                {
                 // print_r($result2);
                  //echo $result2->id;
                  $id[]=$result2->id;
                   $ans=$result2->answer;
                   $ansuser=$_POST['answer'.$result2->id];
                  if($ans==$ansuser){
                    $mark=$mark+1;
                  }
                  else{
                    $mark=$mark;
                  }
                }
              }
              //echo $mark;
              $co= count($id);
              $sqlu="update  adduser set companymark=:mark where yourname=:yourname ";
        $queryu = $dbh->prepare($sqlu);
        $queryu->bindParam(':mark',$mark,PDO::PARAM_STR);
        //$queryu->bindParam(':mark',$co,PDO::PARAM_STR);
        $queryu->bindParam(':yourname',$yourname,PDO::PARAM_STR);
              /*print_r($id);
              print_r($ans);
              print_r(array_combine($id, $ans));*/
              $queryu->execute();
        $msg= " Mark is ".$mark."/".$co."";
      }
?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Job Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="CreativeLayers">

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css" />
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/responsive.css" />
  <link rel="stylesheet" type="text/css" href="css/chosen.css" />
  <link rel="stylesheet" type="text/css" href="css/colors/colors.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>
<body class="">
<div class="theme-layout" id="scrollup">
  
  <div class="responsive-header three">
    <div class="responsive-menubar">
      <div class="res-logo"><a href="index.html" title=""><img src="images/logo4.png" alt="" /></a></div>
      <div class="menu-resaction">
        <div class="res-openmenu">
          <img src="images/icon5.png" alt="" /> Menu
        </div>
        <div class="res-closemenu">
          <img src="images/icon6.png" alt="" /> Close
        </div>
      </div>
    </div>
    <div class="responsive-opensec">
      <div class="btn-extars">
        <!-- <a href="#" title="" class="post-job-btn"><i class="fa fa-plus"></i>Post Jobs</a> -->
        <!-- <ul class="account-btns">
          <li class="signup-popup"><a title=""><i class="fa fa-key"></i> Sign Up</a></li>
          <li class="signin-popup"><a title=""><i class="fa fa-external-link-square"></i> Login</a></li>
        </ul> -->
      </div><!-- Btn Extras -->
      <!-- <form class="res-search">
        <input type="text" placeholder="Job title, keywords or company name" />
        <button type="submit"><i class="fa fa-search"></i></button>
      </form> -->
      <div class="responsivemenu">
        <ul>
            <!-- <li class="menu-item-has-children">
              <a href="#" title="">Home</a>
              
            </li> -->
            <!-- <li class="menu-item-has-children">
              <a href="#" title="">Employers</a>
              <ul>
                <li><a href="employer_list1.html" title=""> Employer List 1</a></li>
                <li><a href="employer_list2.html" title="">Employer List 2</a></li>
                <li><a href="employer_list3.html" title="">Employer List 3</a></li>
                <li><a href="employer_list4.html" title="">Employer List 4</a></li>
                <li><a href="employer_single1.html" title="">Employer Single 1</a></li>
                <li><a href="employer_single2.html" title="">Employer Single 2</a></li>
                <li class="menu-item-has-children">
                  <a href="#" title="">Employer Dashboard</a>
                  <ul>
                    <li><a href="employer_manage_jobs.html" title="">Employer Job Manager</a></li>
                    <li><a href="employer_packages.html" title="">Employer Packages</a></li>
                    <li><a href="employer_post_new.html" title="">Employer Post New</a></li>
                    <li><a href="employer_profile.html" title="">Employer Profile</a></li>
                    <li><a href="employer_resume.html" title="">Employer Resume</a></li>
                    <li><a href="employer_transactions.html" title="">Employer Transaction</a></li>
                    <li><a href="employer_job_alert.html" title="">Employer Job Alert</a></li>
                    <li><a href="employer_change_password.html" title="">Employer Change Password</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Candidates</a>
              <ul>
                <li><a href="candidates_list.html" title="">Candidates List 1</a></li>
                <li><a href="candidates_list2.html" title="">Candidates List 2</a></li>
                <li><a href="candidates_list3.html" title="">Candidates List 3</a></li>
                <li><a href="candidates_single.html" title="">Candidates Single 1</a></li>
                <li><a href="candidates_single2.html" title="">Candidates Single 2</a></li>
                <li class="menu-item-has-children">
                  <a href="#" title="">Candidates Dashboard</a>
                  <ul>
                    <li><a href="candidates_my_resume.html" title="">Candidates Resume</a></li>
                    <li><a href="candidates_my_resume_add_new.html" title="">Candidates Resume new</a></li>
                    <li><a href="candidates_profile.html" title="">Candidates Profile</a></li>
                    <li><a href="candidates_shortlist.html" title="">Candidates Shortlist</a></li>
                    <li><a href="candidates_job_alert.html" title="">Candidates Job Alert</a></li>
                    <li><a href="candidates_dashboard.html" title="">Candidates Dashboard</a></li>
                    <li><a href="candidates_cv_cover_letter.html" title="">CV Cover Letter</a></li>
                    <li><a href="candidates_change_password.html" title="">Change Password</a></li>
                    <li><a href="candidates_applied_jobs.html" title="">Candidates Applied Jobs</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Blog</a>
              <ul>
                <li><a href="blog_list.html"> Blog List 1</a></li>
                <li><a href="blog_list2.html">Blog List 2</a></li>
                <li><a href="blog_list3.html">Blog List 3</a></li>
                <li><a href="blog_single.html">Blog Single</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Job</a>
              <ul>
                <li><a href="job_list_classic.html">Job List Classic</a></li>
                <li><a href="job_list_grid.html">Job List Grid</a></li>
                <li><a href="job_list_modern.html">Job List Modern</a></li>
                <li><a href="job_single1.html">Job Single 1</a></li>
                <li><a href="job_single2.html">Job Single 2</a></li>
                <li><a href="job-single3.html">Job Single 3</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Pages</a>
              <ul>
                <li><a href="about.html" title="">About Us</a></li>
                <li><a href="404.html" title="">404 Error</a></li>
                <li><a href="contact.html" title="">Contact Us 1</a></li>
                <li><a href="contact2.html" title="">Contact Us 2</a></li>
                <li><a href="faq.html" title="">FAQ's</a></li>
                <li><a href="how_it_works.html" title="">How it works</a></li>
                <li><a href="login.html" title="">Login</a></li>
                <li><a href="pricing.html" title="">Pricing Plans</a></li>
                <li><a href="register.html" title="">Register</a></li>
                <li><a href="terms_and_condition.html" title="">Terms & Condition</a></li>
              </ul>
            </li> -->
          </ul>
      </div>
    </div>
  </div>
  
  <header class="stick-top style3">
    <div class="menu-sec">
      <div class="container">
        <div class="logo">
          <a href="#" title="" style="font-size: 25px;">JOBPORTAL</a>
        </div><!-- Logo -->
        <div class="btn-extars">
          <!-- <a href="#" title="" class="post-job-btn"><i class="fa fa-plus"></i>Post Jobs</a> -->
          <!-- <ul class="account-btns">
            <li class="signup-popup"><a title=""><i class="fa fa-key"></i> Sign Up</a></li>
            <li class="signin-popup"><a title=""><i class="fa fa-external-link-square"></i> Login</a></li>
          </ul> -->
        </div><!-- Btn Extras -->
        <nav>
          <ul>
            <!-- <li class="menu-item-has-children">
              <a href="#" title="">Home</a> -->
              <!-- <ul>
                <li><a href="index.html" title="">Home Layout 1</a></li>
                <li><a href="index2.html" title="">Home Layout 2</a></li>
                <li><a href="index3.html" title="">Home Layout 3</a></li>
                <li><a href="index4.html" title="">Home Layout 4</a></li>
                <li><a href="index5.html" title="">Home Layout 5</a></li>
                <li><a href="index6.html" title="">Home Layout 6</a></li>
                <li><a href="index7.html" title="">Home Layout 7</a></li>
                <li><a href="index8.html" title="">Home Layout 8</a></li>
              </ul> 
            </li>-->
            <!-- <li class="menu-item-has-children">
              <a href="#" title="">Employers</a>
              <ul>
                <li><a href="employer_list1.html" title=""> Employer List 1</a></li>
                <li><a href="employer_list2.html" title="">Employer List 2</a></li>
                <li><a href="employer_list3.html" title="">Employer List 3</a></li>
                <li><a href="employer_list4.html" title="">Employer List 4</a></li>
                <li><a href="employer_single1.html" title="">Employer Single 1</a></li>
                <li><a href="employer_single2.html" title="">Employer Single 2</a></li>
                <li class="menu-item-has-children">
                  <a href="#" title="">Employer Dashboard</a>
                  <ul>
                    <li><a href="employer_manage_jobs.html" title="">Employer Job Manager</a></li>
                    <li><a href="employer_packages.html" title="">Employer Packages</a></li>
                    <li><a href="employer_post_new.html" title="">Employer Post New</a></li>
                    <li><a href="employer_profile.html" title="">Employer Profile</a></li>
                    <li><a href="employer_resume.html" title="">Employer Resume</a></li>
                    <li><a href="employer_transactions.html" title="">Employer Transaction</a></li>
                    <li><a href="employer_job_alert.html" title="">Employer Job Alert</a></li>
                    <li><a href="employer_change_password.html" title="">Employer Change Password</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Candidates</a>
              <ul>
                <li><a href="candidates_list.html" title="">Candidates List 1</a></li>
                <li><a href="candidates_list2.html" title="">Candidates List 2</a></li>
                <li><a href="candidates_list3.html" title="">Candidates List 3</a></li>
                <li><a href="candidates_single.html" title="">Candidates Single 1</a></li>
                <li><a href="candidates_single2.html" title="">Candidates Single 2</a></li>
                <li class="menu-item-has-children">
                  <a href="#" title="">Candidates Dashboard</a>
                  <ul>
                    <li><a href="candidates_my_resume.html" title="">Candidates Resume</a></li>
                    <li><a href="candidates_my_resume_add_new.html" title="">Candidates Resume new</a></li>
                    <li><a href="candidates_profile.html" title="">Candidates Profile</a></li>
                    <li><a href="candidates_shortlist.html" title="">Candidates Shortlist</a></li>
                    <li><a href="candidates_job_alert.html" title="">Candidates Job Alert</a></li>
                    <li><a href="candidates_dashboard.html" title="">Candidates Dashboard</a></li>
                    <li><a href="candidates_cv_cover_letter.html" title="">CV Cover Letter</a></li>
                    <li><a href="candidates_change_password.html" title="">Change Password</a></li>
                    <li><a href="candidates_applied_jobs.html" title="">Candidates Applied Jobs</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Blog</a>
              <ul>
                <li><a href="blog_list.html"> Blog List 1</a></li>
                <li><a href="blog_list2.html">Blog List 2</a></li>
                <li><a href="blog_list3.html">Blog List 3</a></li>
                <li><a href="blog_single.html">Blog Single</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Job</a>
              <ul>
                <li><a href="job_list_classic.html">Job List Classic</a></li>
                <li><a href="job_list_grid.html">Job List Grid</a></li>
                <li><a href="job_list_modern.html">Job List Modern</a></li>
                <li><a href="job_single1.html">Job Single 1</a></li>
                <li><a href="job_single2.html">Job Single 2</a></li>
                <li><a href="job-single3.html">Job Single 3</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="#" title="">Pages</a>
              <ul>
                <li><a href="about.html" title="">About Us</a></li>
                <li><a href="404.html" title="">404 Error</a></li>
                <li><a href="contact.html" title="">Contact Us 1</a></li>
                <li><a href="contact2.html" title="">Contact Us 2</a></li>
                <li><a href="faq.html" title="">FAQ's</a></li>
                <li><a href="how_it_works.html" title="">How it works</a></li>
                <li><a href="login.html" title="">Login</a></li>
                <li><a href="pricing.html" title="">Pricing Plans</a></li>
                <li><a href="register.html" title="">Register</a></li>
                <li><a href="terms_and_condition.html" title="">Terms & Condition</a></li>
              </ul>
            </li> -->
          </ul>
        </nav><!-- Menus -->
      </div>
    </div>
  </header>

  <section>
    <div class="block no-padding">
      <div class="container fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="find-cand-sec">
              <div class="iconmove"><img class="animute" src="images/iconmove.jpg" alt="" /></div>
              <div class="mockup-top"><img class="animute" src="images/mockup.png" alt="" /></div>
              <div class="mockup-bottom"><img src="images/mockup2.png" alt="" /></div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="find-cand">
                      <div class="content-wrapper container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h4 class="m-0 text-dark">Answer These Questions</h4>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong></strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
          <form method="POST">
              <?php
              $yourname=$_SESSION['alogin'];
              //echo $yourname;
              $role=$_GET['companyname'];
              $sql1="SELECT * FROM adduser WHERE yourname=:yourname";
              $query1= $dbh -> prepare($sql1);
              $query1-> bindParam(':yourname', $yourname, PDO::PARAM_STR);
             
              
              $query1-> execute();
              $results1=$query1->fetchAll(PDO::FETCH_OBJ);
              $lan="";
              //echo $query1->rowCount();
              if($query1->rowCount() >0){
                foreach($results1 as $result)
                {
                  $lan=$result->language;
                }
              }
              //echo $lan;
              $sql2="SELECT * FROM questionanswer WHERE language=:lan AND role=:role";
              $query2= $dbh -> prepare($sql2);
              $query2-> bindParam(':lan', $lan, PDO::PARAM_STR);
              $query2-> bindParam(':role', $role, PDO::PARAM_STR);
              
              $query2-> execute();
              $results2=$query2->fetchAll(PDO::FETCH_OBJ);
              if($query2->rowCount() >0){
                foreach($results2 as $result1)
                {
                  ?>
                  <div class="container"> 
                  <?php  echo $result1->question;?>
                  <h5>Choose Answer</h5>
                  <input style="margin-left:15px;" type="radio" name="answer<?php echo $result1->id;?>" value="<?php echo $result1->ans1;?>" required="required" checked=""> <?php echo $result1->ans1;?>
                  <input style="margin-left:15px;" type="radio" name="answer<?php echo $result1->id;?>" value="<?php echo $result1->ans2;?>" required="required" checked=""> <?php echo $result1->ans2;?>
                  <input style="margin-left:15px;" type="radio" name="answer<?php echo $result1->id;?>" value="<?php echo $result1->ans3;?>" required="required" checked=""> <?php echo $result1->ans3;?>
                  <input style="margin-left:15px;" type="radio" name="answer<?php echo $result1->id;?>" value="<?php echo $result1->ans4;?>" required="required" checked=""> <?php echo $result1->ans4;?>
                  <br>
                  <br>
                </div>
                  <?php
                }
              }
            ?>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-primary">Submit Answer</button>
              </div>
          </div>
            </form>
          </div>
        <!-- /.row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
  <!-- /.control-sidebar -->
</div></div>
                      <!-- <h3>Find Candidate</h3>
                      <span>We have 2.567 resumes in our database</span> -->
                      <!-- <form>
                        <div class="job-field">
                          <input type="text" placeholder="Search freelancer services (e.g. logo design)" />
                        </div>
                        <div class="job-field">
                          <select data-placeholder="City, province or region" class="chosen-city">
                            <option>Mechanic</option>
                            <option>Web Development</option>
                            <option>Car Install</option>
                            <option>Shoes Slippers</option>
                          </select>
                        </div>
                        <button type="submit"><i class="fa fa-search"></i></button>
                      </form> -->
                    </div>    
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="scroll-to style2">
              <a href="#scroll-here" title=""><i class="fa fa-arrow-down"></i></a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>

 

 

  

  



  
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
<!-- <style type="text/css">
  .content-wrapper.container {
    position: absolute;
    top: 120%;
    z-index: 99;
   
    width: 50%;
    left: 50%;
    right: 50%;
    transform: translate(-50%,-50%);
    box-shadow: blanchedalmond;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=10, Direction=333, Color=#DBDBDB)";
    -moz-box-shadow: -2px -1px 10px 10px #DBDBDB;
    -webkit-box-shadow: -2px -1px 10px 10px #DBDBDB;
    box-shadow: -2px -1px 10px 10px #DBDBDB;
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=10, Direction=135, Color=#DBDBDB);
    padding: 20px;
    background: white;
}
</style> -->
</body>
</html>
<?php
}
?>