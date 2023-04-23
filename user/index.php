<?php
session_start();
error_reporting(0);
include('../common/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['yourname'];
$password=$_POST['yourpassword'];
$sql ="SELECT yourname,yourpassword FROM adduser WHERE yourname=:uname and yourpassword=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['yourname'];
echo "<script type='text/javascript'> document.location = 'question.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
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
<body>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<!-- <span>Skip Loader</span> -->
</div>

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
				<ul class="account-btns">
					<li class="signup-popup"><a title=""><i class="fa fa-key"></i> Sign Up</a></li>
					<li class="signin-popup"><a title=""><i class="fa fa-external-link-square"></i> Login</a></li>
				</ul>
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
					<a href="index.php" title="" style="font-size: 25px;">JOBPORTAL</a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<!-- <a href="#" title="" class="post-job-btn"><i class="fa fa-plus"></i>Post Jobs</a> -->
					<ul class="account-btns">
						<li class="signup-popup"><a title=""><i class="fa fa-key"></i> Sign Up</a></li>
						<li class="signin-popup"><a title=""><i class="fa fa-external-link-square"></i> Login</a></li>
					</ul>
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

	

	

</div>

<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="fa fa-close"></i></span>
		<h3>User Login</h3>
		<span>Click To Login With User</span>
		<!-- <div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div> -->
		<form method="POST">
			<div class="cfield">
				<input type="text" placeholder="Username" name="yourname"/>
				<i class="fa fa-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" name="yourpassword" />
				<i class="fa fa-key"></i>
			</div>
			<!-- <p class="remember-label">
				<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
			</p>
			<a href="#" title=""
			>Forgot Password?</a> -->
			<button type="submit" name="login">Login</button>
		</form>
		<!-- <div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div> -->
	</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="fa fa-close"></i></span>
		<h3>Sign Up</h3>
		<!-- <div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div> -->
		<form name="registration" action="#">
			<div class="cfield">
				<input type="text" placeholder="Username"  name="yourname" id="yourname" />
				<i class="fa fa-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" name="yourpassword" id="yourpassword" />
				<i class="fa fa-key"></i>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Email" name="youremail" id="youremail" />
				<i class="fa fa-envelope-o"></i>
			</div>
			<div class="dropdown-field">
				<select data-placeholder="Please Select Language" name="language" id="language" class="chosen">
					<option value="---">---</option>
					<option>PHP</option>
					<!-- <option>Web Designing</option>
					<option>Art & Culture</option>
					<option>Reading & Writing</option> -->
				</select>
				<div class="add"></div>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Phone Number" name="yournumber" id="yournumber"/>
				<i class="fa fa-phone"></i>
			</div>
			<button type="submit" name="submit">Signup</button>
		</form>
		<div class="bookre"></div>
		<!-- <div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div> -->
	</div>
</div><!-- SIGNUP POPUP -->

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/modernizr.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/wow.min.js" type="text/javascript"></script>
<script src="js/slick.min.js" type="text/javascript"></script>
<script src="js/parallax.js" type="text/javascript"></script>
<script src="js/select-chosen.js" type="text/javascript"></script>
<script src="js/counter.js" type="text/javascript"></script>
<script src="js/mouse.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
	<script>
   
	jQuery(function() {
	    /*if(jQuery("#service").val()=="others"){
	        alert();
	    }
	    else{
	        
	    }*/
	    // add the rule here
	 jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
	  return arg !== value;
	 }, "Value must not equal arg.");
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  jQuery("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      yourname: "required",
      youremail: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      yournumber : "required",
      yourpassword : "required",
      language :{valueNotEquals: "---"},
      
    },
    // Specify validation error messages
    messages: {
      yourname: "Please enter your firstname",
     
      youremail: "Please enter a valid email address",
      yournumber : "Please enter phone number",
      yourpassword : "Please enter password",
      language : "Please select language"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      //form.submit();
      //submitHandler: function(form) {
        jQuery.ajax({
            url: "ajaxsub.php",
            type: "POST",
            data: jQuery(form).serialize(),
            success: function(response) {
                //alert(response);
                //$('#answers').html(response);
                if(jQuery.trim(response) == "Success"){
                    //alert();
                    jQuery(".bookre").html("<p class='succ'>User add successfully !</p>");
                    location.href="index.php";
                }
                else {
                    jQuery(".bookre").html("<p class='fail'>User Not added</p>");
                }
                
            }            
        });
    //}
    }
  });
});
</script>
<style type="text/css">
	.find-cand-sec{
		padding-top: 433px !important;
	}
</style>
</body>
</html>

