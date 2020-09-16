

<div class="content" > 
<h1 class = "text-primary" > <i class = "fas fa-edit" ></i>Update Student's Data <small>Statistics Overview </small> </h1>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-tachometer-alt" ></i>  <a href="index.php?page=Dashboard"> Dashboard </a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="index.php?page=all_students" ><i class= "fas fa-user-plus" ></i> All Students </a></li>
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-edit" ></i> Update data </li>
</ol>
 
 <?php 
  $getroll = base64_decode($_REQUEST['edited_data']);
  $db_data = "SELECT* FROM student_data WHERE Roll= '$getroll' ";
  $runquery = mysqli_query($connect,$db_data);
  $finded_info = mysqli_fetch_array($runquery);
  
  
  if(isset($_REQUEST['update_info'])){
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
	$path_of_moving_file = "student_photo/";
	  
	  	// file extension selector
	$photo_ext  = pathinfo($photo_info,PATHINFO_EXTENSION);
     if(!empty($photo_info )&& !empty($photo_tmp)){
	$checkimage = getimagesize($photo_tmp)['mime'];
	} else{$checkimage = "images/png";}
	
	if(empty($photo_info)){
	$photo_name= $finded_info['photo'];
	}else{$photo_name = $roll.".".$photo_ext;}
	
	
	
	if(!empty($roll)){
      if( mysqli_num_rows($runquery)===1){
		 if($checkimage){         //$photo_ext == "png" && $photo_ext == "jpg" use kora jabe
			 
	      $send_data = "UPDATE student_data SET name='$name', father_name='$fname', mother_name='$mname', class='$class', Roll='$roll', gpa='$gpa', address='$address', contact='$contact', class_group='$class_group', photo='$photo_name' WHERE Roll= '$getroll' ";
          $run_query = mysqli_query($connect,$send_data);
	      move_uploaded_file($photo_tmp,$path_of_moving_file.$photo_name);
	      echo "<font color='green' size='6px' >Your Data is successfully Updated!</font>";
		 
		 }else{echo "Your uploaded file isn't an image";}
	 }  else{ echo "Sorry You Can't Update Your Roll ! Please contact with us!";}
	} else{echo "<font color='red' size='6px' >Please fill the all field </font>";} 
  }
 
 
 ?>

  <br /> 
<h2> Update Student's Data</h2><br />
<form action="" enctype="multipart/form-data" method="POST">
  <div class="col-sm-9 col-md-9">
	<div class="form-group">
	<label for="name">Student Name </label>
	<input type="text" name = "name" class="form-control" id="name" placeholder= "Student Name" value="<?php echo $finded_info['name'];?>" required = "required" />
	</div>
	<div class="form-group">
	<label for="fname">Father's Name  </label>
	<input type="text" name = "father_name" class="form-control" id="fname" placeholder= "Father's Name"  value="<?php echo $finded_info['father_name'];?>"  required = "required"  />
	</div>
	<div class="form-group">
	<label for="mname"> Mother's Name </label>
	<input type="text" name = "mother_name" class="form-control" id="mname" placeholder= "Mother's Name"  value="<?php echo $finded_info['mother_name'];?>"  required = "required"  />
	</div>
	<div class="form-group">
	<label for="address">Address </label>
	<input type="text" name = "address" class="form-control" id="address" placeholder= "Student's Address" required = "required"  value="<?php echo $finded_info['address'];?>"  value="<?php if(isset($address)){echo $address;}?>" />
	</div>
	<div class="form-group">
	<label for="class"> Class</label>
	<select class="custom-select" name="class" id="class" required = "required"  > 
	  <option  value="">Select</option>
	  <option <?php if($finded_info['class']=="6th"){echo "selected";}?> value="6th">Class 6</option>
	  <option <?php if($finded_info['class']=="7th"){echo "selected";}?> value="7th">Class 7</option>
	  <option <?php if($finded_info['class']=="8th"){echo "selected";}?> value="8th">Class 8</option>
	  <option <?php if($finded_info['class']=="9th"){echo "selected";}?> value="9th">Class 9</option>
	  <option <?php if($finded_info['class']=="10th"){echo "selected";}?> value="10th">Class 10</option>
	</select>
	</div>
	
	<div class="form-group">

	<label for="group"> Group (For Class-9/10)</label>
	<select class="custom-select" name="group" id="group"  > 
	  <option value="">Select</option>
	  <option <?php echo $finded_info['class_group']== "science" ? "selected":"" ?> value="science">Science</option>
	  <option <?php echo $finded_info['class_group']== "arts" ? "selected":"" ?> value="arts">Arts</option>
	  <option <?php echo $finded_info['class_group']== "commerce" ? "selected":"" ?> value="commerce">Commerce</option>
	</select>
		

	</div>
	<div class="form-group">
	<label for="class"> Class Roll</label>
	<input type="text" name = "roll" class="form-control" id="roll" placeholder= "Class Roll" pattern="[0-9]{6}" required = "required"  value="<?php echo $finded_info['Roll'];?>"  />
	</div>
	<div class="form-group">
	<label for="gpa">Result </label>
	<input type="text" name = "gpa" class="form-control" id="gpa" placeholder= "GPA : Out of 5" required = "required"  value="<?php echo $finded_info['gpa'];?>"  />
	</div>
	<div class="form-group">
	<label for="cnumber">Phone Number </label>
	<input type="text" name = "cnumber" class="form-control" id="cnumber" placeholder= "01*********" pattern= "01[3|4|6|7|8|9][0-9]{8}" required = "required"  value="<?php echo $finded_info['contact'];?>" />
	</div>
	<label for="photo">Update Your Photo</label>
	<div> <input class="form-control" type="file" name="photo" id= "photo" /></div> <br />
	<div><input class = "btn btn-primary float-right" type="submit" value= "Update info" name="update_info" /></div>

  </div>
</form>
