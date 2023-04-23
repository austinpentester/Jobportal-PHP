<?php

include "../../common/conn.php";
include "../../common/config.php";




if(isset($_POST['submit'])){


    $target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $store = basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	  } else {
		echo "Sorry, there was an error uploading your file.";
	  }
	}
          
           $name = $_POST['name'];
           $number=$_POST['number']; 
           $email=$_COOKIE['email'];
           $sql1 = "UPDATE `examinee_tbl` SET `exmne_fullname`='$name',`exmne_email`='$email',`resume`='$store',`number`='$number' WHERE exmne_email='$email'";
           if(mysqli_query($conn,$sql1)){
               header('Location: profie.php');
           }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Profile - Update</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
    body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"></span><span class="text-black-50"><?php echo $_COOKIE['email'] ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
        <form action="profie.php" method="POST" enctype="multipart/form-data">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <!-- <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                </div> -->


       
                                      <?php
      
                                      //print_r($_SESSION);
                                        $sql ="SELECT * FROM examinee_tbl WHERE exmne_email=:companyname";
                                        $query= $dbh -> prepare($sql);
                                        $query->bindParam(':companyname',$_COOKIE['email'],PDO::PARAM_STR);
                                        $query-> execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        if($query->rowCount() > 0){
                                          $cnt=1;
                                          foreach($results as $result)
                                          {
                                            $emailid =  $result->exmne_email
                                          ?>
        
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control" value="<?php echo $result->exmne_fullname;?>"></div>
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input name="number" type="number" class="form-control"  value="<?php echo $result->number;?>"></div>
                    <!-- <div class="col-md-12"><label class="labels">Email</label><input name="email" type="email" class="form-control"  value=""></div> -->
                    <a href="uploads/<?php echo $result->resume;?>" download>Download Your Resume</a>
         
                                       <div class="col-md-12">
                    <label for=""> Upload Your resume</label>
                      <input type="file" id="fileToUpload" class="" require  name="fileToUpload"/>
 
            

                  </div>
                   
                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="submit" type="submit">Update</button><a class="pr-3 btn btn-dark " href="index.php">   Back</a></div>

            </div>
            <?php
                                          }}
            ?>
</form>
        </div>
        <!-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
</div>
</div>
</div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>