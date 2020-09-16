<?php require_once('admin/connect.php'); require_once('header.php');?>


<?php if(isset($_REQUEST["submit"])){
    $name = $_REQUEST["name"];
    $fname = $_REQUEST["father_name"];
    $mname = $_REQUEST["mother_name"];
    $address = $_REQUEST["address"];
    $class = $_REQUEST["class"];
    $roll = $_REQUEST["roll"];
    $gpa = $_REQUEST["gpa"];
    $contact = $_REQUEST["cnumber"];
	$class_group = $_REQUEST["group"];
	$photo_info = $_FILES["photo"]['name'];
	$photo_tmp = $_FILES["photo"]['tmp_name'];
	$path_of_moving_file = "admin/student_photo/";
	
	
	// file extension selector
	
     if(!empty($photo_info )&& !empty($photo_tmp)){
	$checkimage = getimagesize($photo_tmp)['mime'];
	} else{$checkimage = "images/png";}
     
	if(empty($photo_info)){
	$photo_name="avatar.png";
	}else{
		$photo_ext  = pathinfo($photo_info,PATHINFO_EXTENSION);
		$photo_name = $roll.".".$photo_ext;
		}
	 
	$roll_test = "SELECT Roll FROM student_data WHERE  Roll= '$roll' ";
	$search_roll = mysqli_query($connect,$roll_test);
	
	
	if(!empty($roll)){
      if( mysqli_num_rows($search_roll)===0){	
          if($checkimage){
	      $send_data = "INSERT INTO student_data (name, father_name, mother_name, class, Roll, gpa, address, contact, class_group, photo ) VALUES ('$name','$fname','$mname','$class','$roll','$gpa','$address','$contact','$class_group','$photo_name')";
          $run_query = mysqli_query($connect,$send_data);
	      move_uploaded_file($photo_tmp,$path_of_moving_file.$photo_name);
	      $success_mgs = "<div class='aler alert-success' >Your are Successfully Registered!!!</div>";
		  }else{$img_err="<div class='alert alert-danger'>You uploaded file isn't an image</div>";}
	 }  else{ $reg_err = "<font class='alert alert-danger' >Already registered By this Roll</font>";} 
	} else{ $field_err = "<div class='alert alert-warning' >Please fill the all field </div>";} 

}
 
 
?> <br /> <br />
<div class="container">
<h2 class= " alert alert-primary" >Register Now as A New Student</h2>
<?php if(isset($success_mgs)){echo $success_mgs ;}?>
<?php if(isset($img_err)){echo $img_err ;}?>
<?php if(isset($reg_err)){echo $reg_err ;}?>
<?php if(isset($field_err)){echo $field_err ;}?>
<a class="btn btn-primary float-right" href="index.php">Home</a>
<br />
<br />
<form action="" enctype="multipart/form-data" method="POST">
  <div class="col-sm-9 col-md-9">
	<div class="form-group">
	<label for="name">Student Name </label>
	<input type="text" name = "name" class="form-control" id="name" placeholder= "Student Name"  required = "required" />
	</div>
	<div class="form-group">
	<label for="fname">Father's Name  </label>
	<input type="text" name = "father_name" class="form-control" id="fname" placeholder= "Father's Name" required = "required"  />
	</div>
	<div class="form-group">
	<label for="mname"> Mother's Name </label>
	<input type="text" name = "mother_name" class="form-control" id="mname" placeholder= "Mother's Name"  required = "required"  />
	</div>
	<div class="form-group">
	<label for="address">Address </label>
	<input type="text" name = "address" class="form-control" id="address" placeholder= "Student's Address" required = "required" value="<?php if(isset($address)){echo $address;}?>" />
	</div>
	<div class="form-group">
	<label for="class"> Class</label>
	<select class="custom-select" name="class" id="class" required = "required" ?>"> 
	  
	  <option value="">Select</option>
	  <option value="6th">Class 6</option>
	  <option value="7th">Class 7</option>
	  <option value="8th">Class 8</option>
	  <option value="9th">Class 9</option>
	  <option value="10th">Class 10</option>
	</select>
	</div>

	<div class="form-group">
	<label for="group"> Group (For Class-9/10)</label>
	<select class="custom-select" name="group" id="group" required = "required" ?>">
      <option value="">Select</option>	
	  <option selected value="science">Science</option>
	  <option value="arts">Arts</option>
	  <option value="commerce">Commerce</option>
	</select>
	</div>

	<div class="form-group">
	<label for="class"> Class Roll</label>
	<input type="text" name = "roll" class="form-control" id="roll" placeholder= "Class Roll" pattern="[0-9]{6}" required = "required" />
	</div>
	<div class="form-group">
	<label for="gpa">Result </label>
	<input type="text" name = "gpa" class="form-control" id="gpa" placeholder= "GPA : Out of 5"  required = "required"  />
	</div>
	<div class="form-group">
	<label for="cnumber">Phone Number </label>
	<input type="text" name = "cnumber" class="form-control" id="cnumber" placeholder= "01*********" pattern= "01[3|4|6|7|8|9][0-9]{8}" required = "required" />
	</div>
	<label for="photo">Choose a photo</label>
	<div> <input class="form-control" type="file" name="photo" id= "photo" /></div> <br />
	<div><input class = "btn btn-primary float-right" type="submit" value= "Save info" name="submit" /></div>
	<div><input class = "btn btn-primary float-left" type="reset"  class="reset_button" src=“images/reset_button.jpg” value= "Reset info" name="reset" /></div>
  </div>
</form>
</div>
<br />
<br />
<?php require_once('footer.php');?>