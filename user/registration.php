<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
	<div class="container">
		<div class="anbookanapp">
			<h3 class="text-center">Registration</h3>
			<form action="#" name="registration">
				<div>
					<label>Your Name</label><br>
					<input type="text" name="yourname" id="yourname">
				</div>
				<div>
					<label>Your Email</label><br>
					<input type="email" name="youremail" id="youremail">
				</div>
				<div>
					<label>Your Number</label><br>
					<input type="number" name="yournumber" id="yournumber">
				</div>
				<div>
					<label>Password</label><br>
					<input type="password" name="yourpassword" id="yourpassword">
				</div>
				
				<div>
					<label>Language</label><br>
					<select name="language" id="language">
						<option value="---">---</option>
						<option value="Bootstrap">Bootstrap</option>
						<option value="PHP">PHP</option>
						
						
					</select>
					<div class="add"></div>
				</div>
				<button type="submit">Submit</button>
			</form>
			<div class="bookre"></div>
		</div>
	</div>
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
                alert(response);
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
<style>
label.error {
    color: red;
    padding: 10px;
}
button {
    padding: 10px;
    background: green;
    color: white !important;
    box-shadow: none;
    border: none;
}
select#language {
    width: 100%;
    padding: 5px;
}
	.anbookanapp {
	    width: 40%;
	    margin: 45px auto;
	    padding: 20px;
	    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=10, Direction=333, Color=#DBDBDB)";
	    -moz-box-shadow: -2px -1px 10px 10px #DBDBDB;
	    -webkit-box-shadow: -2px -1px 10px 10px #DBDBDB;
	    box-shadow: -2px -1px 10px 10px #DBDBDB;
	    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=10, Direction=135, Color=#DBDBDB);
	}
	input {
	    width: 100%;
	    padding: 5px;
	}
	form div {
	    margin-bottom: 15px;
	}
</style>