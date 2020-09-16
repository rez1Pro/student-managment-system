<?php require_once("header.php");require_once("connect.php"); ?><br /><br />


<?php 
if(isset($_REQUEST["registration"])){
	$name = htmlspecialchars( $_REQUEST['name']);
	$email =htmlspecialchars( $_REQUEST['email']);
	$username =htmlspecialchars( $_REQUEST['username']);
	$password = htmlspecialchars($_REQUEST['password']);
	$conpassword = htmlspecialchars($_REQUEST['cpassword']);
	$photo = $_FILES['photo']['name'];
	if(!empty($photo)){
		$photoname = htmlspecialchars($username.".jpg");
	}else{$photoname = "avatar.png";}
	
    $phototmp = $_FILES['photo']['tmp_name'];
	$depass = md5(sha1($password));
	$authentication = md5(sha1($username.$password));
	
	// Now field validation
	$input_error = array();
	
if(empty($name )){
	$input_error['name']= "Name Field is Required!" ;
}
	if(empty($email)){
		$input_error['email']= "Email Field is Required!" ;
	}
		if(empty($username )){
			$input_error['username']= "Username Field is Required!" ;
		}

			if(empty($password )){
				$input_error['password']= "Password Field is Required!" ;
			}
					if(empty($conpassword )){
						$input_error['conpassword']= "Confirm Password Field is Required!" ;
					}
   // field specification 
    
	if (strlen($username)>5){
		
		if(strlen($password)>7){
				if ($password==$conpassword){
					
				if(count($input_error)===0){
					$check_email = mysqli_query($connect,"SELECT* FROM std_user WHERE email= '$email' ");
					if( mysqli_num_rows($check_email)===0){
						
						
						if(count($input_error)===0){
							$check_username = mysqli_query($connect,"SELECT* FROM std_user WHERE username= '$username' ");
							
							if( mysqli_num_rows($check_username)===0){
																	
								// Insert Data Into Database 
								
								move_uploaded_file($phototmp,"../images/".$photoname);
								$runquery = mysqli_query($connect , "INSERT INTO std_user (name , email , username, password , photo , status,authentication ) VALUE ('$name','$email','$username','$depass','$photoname','inactive','$authentication')" );
							
								if($runquery==true){
									
									header("location:login.php?success=You are Successfully Registered! Login Now.");
								}else {$_SESSION['reg_warning_msg'] = "Registration Failed!";}
														
							}else { $username_error="The Username Already Exists!";}
					
                               }
						
				      }else{ $email_error="The Email Address Already Exists!";}
				   } 	
					
			}else {$not_match = "Confirm Password Not Match!";}
			
		}else{ $password_len = "Password should be more than 8 chars.";}
		
	}else{$username_len = "Username should be more than 6 Chars.";}
 
 	
 
   	} 
	
	
?>

<div class="container">
 <h2>User Registration Form</h2> <hr />
	<div class="row justify-content-md-center">
	  <div class= "col-md-12" >
	    <form action="" method="POST" enctype="multipart/form-data" class ="form-horizontal animate__animated animate__pulse " >
          <div class="form-group">
	        <label class="control-label col-sm-1 " for="in1">Name:  </label>
	  	    <div class= "col-md-4">
	  	       <input type="text" class="form-control" id="in1" placeholder="Your Full Name" name="name" value="<?php if(isset($name)){ echo $name ;}?>" /> <font size="2cm" color= "red" ><?php if(isset($input_error['name'])){echo $input_error['name'] ;}?></font>
	  	    </div>
	  	  </div>
		  <div class="form-group">
	        <label class="control-label col-sm-1 " for="in2">Email:</label>
	  	    <div class= "col-md-4">
	  	       <input type="text" class="form-control" id="in2" placeholder="Your Email Address" name="email" value="<?php if(isset($email)){ echo $email ;}?>" /><div class="error"><font size="2cm" color= "red" ><?php if(isset($input_error['email'])){echo $input_error['email'] ; }elseif(isset($email_error)){echo $email_error;}?></font></div>
	  	    </div>
	  	  </div>
		  <div class="form-group">
	        <label class="control-label col-sm-1 " for="in3">Username:</label>
	  	    <div class= "col-md-4">
	  	       <input type="text" class="form-control" id="in3" placeholder="Username" name="username" value="<?php if(isset($username)){ echo $username ;}?>" /><div class="error"><font size="2cm" color= "red" ><?php if(isset($input_error['username'])){echo $input_error['username'] ; }elseif(isset($username_error)){echo $username_error;}elseif(isset($username_len)){echo $username_len;}?></font></div>
	  	    </div>
	  	  </div>
		  <div class="form-group">
	        <label class="control-label col-sm-1 " for="in4">Password:</label>
	  	    <div class= "col-md-4">
	  	       <input type="text" class="form-control" id="in4" placeholder="Password" name="password" value="<?php if(isset($password)){ echo $password ;}?>" /><font size="2cm" color= "red" ><?php if(isset($input_error['password'])){echo $input_error['password'] ;}elseif(isset($password_len)){echo $password_len;}?></font>
	  	    </div>
	  	  </div>
		   <div class="form-group">
	        <label class="control-label col-sm-2 " for="in5">Confirm Password:</label>
	  	    <div class= "col-md-4">
	  	       <input type="password" class="form-control" id="in5" placeholder="Confirm Password" name="cpassword"  /><font size="2cm" color= "red" ><?php if(isset($confirmpassword_err)){echo $confirmpassword_err ;}elseif (isset($not_match)){echo $not_match;}?></font>
	  	    </div>
	  	  </div>
		  <div class="form-group">
	        <label class="control-label col-sm-1 " for="in6">Photo:</label>
	  	    <div class= "col-md-4">
	  	       <input type="file" class="form-control" id="in6" name="photo"  />
	  	    </div>
	  	  </div>
		  <div class="form-group">
	  	    <div class= "col-md-4">
	  	       <input type="submit" class="btn btn-primary col-sm-6 mystyle" name="registration" value= "Registration"/>
	  	    </div>
	  	  </div>
	    </form>
		<p> Already Have an Account ? <a href="login.php">Login Now</a>  </p>
	  </div>
	</div>
</div>

<?php require_once("footer.php");?>