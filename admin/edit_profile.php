

<div class="content" > 
<h1 class = "text-primary" > <i class = "fas fa-edit" ></i>Update user Data <small>Statistics Overview </small> </h1>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-tachometer-alt" ></i>  <a href="index.php?page=Dashboard"> Dashboard </a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="index.php?page=profile" ><i class= "fas fa-address-card" ></i> Profile</a></li>
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-edit" ></i> Edit user </li>
</ol>
 
 <?php 
  $id = base64_decode($_REQUEST['edited_data']);
  $db_data = "SELECT* FROM std_user WHERE id= '$id' ";
  $runquery = mysqli_query($connect,$db_data);
  $finded_info = mysqli_fetch_array($runquery);
  
  
  if(isset($_REQUEST['update_info'])){
    
    $username = $_REQUEST["username"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $status = $_REQUEST["status"];

	
	
	if(!empty($id)){
      if( mysqli_num_rows($runquery)===1){
      //$photo_ext == "png" && $photo_ext == "jpg" use kora jabe
			 
	      $send_data = "UPDATE std_user SET name='$name',email='$email',status='$status'  WHERE id= '$id' ";
          $run_query = mysqli_query($connect,$send_data);
	     
	      echo "<font color='green' size='6px' >Your Data is successfully Updated!</font>";
		 

	 }  
	} else{echo "<font color='red' size='6px' >Please fill the all field </font>";} 
  }
 
 
 ?>

  <br /> 
<h2> Update Student's Data</h2><br />
<form action="" enctype="multipart/form-data" method="POST">
  <div class="col-sm-9 col-md-9">
	<div class="form-group">
	<label for="name">Name </label>
	<input type="text" name = "name" class="form-control" id="name" placeholder= "Name" value="<?php echo $finded_info['name'];?>" required = "required" />
	</div>
	<div class="form-group">
     <label for="username">Username</label>
	<input type="text" name = "username" class="form-control" id="username" placeholder= "Username" value="<?php echo $finded_info['username'];?>" required = "required" />
	</div>
	<div class="form-group">
	<label for="ename">E-mail </label>
	<input type="text" name = "email" class="form-control" id="ename" placeholder= "E-mail Address" value="<?php echo $finded_info['email'];?>" required = "required" />
	</div>
	<div class="form-group">
	<label for="sname"> Status </label>
	<select name="status" id="sname">
	 <option value="active"> Active </option>
	 <option value="inactive"> Inactive </option>
	</select>
	</div>
	<div><input class = "btn btn-primary float-right" type="submit" value= "Update info" name="update_info" /></div>

  </div>
</form>
