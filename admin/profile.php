
 <h1 class = "text-primary" > <i class = "fas fa-users" ></i> User Profile <small>Statistics Overview </small> </h1>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-tachometer-alt" ></i>  <a href="index.php?page=Dashboard"> Dashboard </a></li>
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-address-card" ></i> Profile</li>
</ol>
  
  <?php 
	if(isset($_COOKIE['current_user'])){ 
	  $user_token = $_COOKIE['current_user'];
	 $db_access = mysqli_query($connect,"SELECT* FROM std_user WHERE authentication= '$user_token' " );
	 $db_info = mysqli_fetch_array($db_access);
	 
	 $username= $db_info['username'];
	  
	 
	  
	}
	if(isset($_REQUEST['submit'])){
	  $user_photo = $_FILES['photo']['name'];
      $user_photo_tmp = $_FILES['photo']['tmp_name'];
	   // $photo_ext = pathinfo($user_photo,PATHINFO_EXTENSION ); evabeo lekha jabe
	    $photo_out = explode(".",$user_photo);
		$photo_ext = end($photo_out);
	    $photo_name = $db_info['username'].".".$photo_ext;
		move_uploaded_file($user_photo_tmp,"images/$photo_name" );
		
		$send_db = mysqli_query($connect, "UPDATE std_user SET photo= '$photo_name' WHERE username = '$username' " );
	}
  ?>
  
  
  
   <h2> Your Profile</h2>
     <div class="row"> 
	  <div class="col-sm-6">
	   <table class = "table table-bordered" >  
		   <thead> 
		     <th> ID </th>
		     <td> <?php echo $db_info['id'];?> </td>
		   </thead>
		 </tr>	
	     <tr> 
		   <thead> 
		     <th> Name </th>
		     <td> <?php echo ucwords($db_info['name']);?></td>
		   </thead>
		 </tr>	   
		 <tr> 
		   <thead> 
	   	  <tr> 
		     <th> UserName </th>
		     <td> <?php echo $db_info['username'];?></td>
		   </thead>
		 </tr>	  
		 <tr> 
		   <thead> 
		     <th> Email </th>
		     <td><?php echo $db_info['email'];?></td>
		   </thead>
		 </tr>	     
		 <tr> 
		   <thead> 
		     <th> Status </th>
		     <td><?php echo ucwords($db_info['status']);?>  </td>
		   </thead>
		 </tr>	   
		 <tr> 
		   <thead> 
		     <th> Registration Time </th>
		     <td> <?php echo $db_info['Registration_Time'];?>  </td>
		   </thead>
		 </tr>
	   </table>
	   <a class = "btn btn-info float-right" href="index.php?page=edit_profile&edited_data=<?php echo base64_encode($db_info['id']);?>">Edit Profile</a>
	 </div>
	<div class="col-sm-6 col-md-6"> 
	<div class="row">
     <form action="" method="POST" enctype="multipart/form-data" >
	    <img class = "img-thumbnail" width="150px" src="../images/<?php echo $db_info['photo'];?>"/> <h3>Profile Picture</h3>
        <input type="file" name="photo" required /> <br /><br />
        <input class = "btn btn-info" type="submit" name="submit" value="Update Photo"  required />
	 </form>
	</div>
   </div>
 </div>


