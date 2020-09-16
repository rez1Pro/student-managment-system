<?php require_once("header.php"); require_once("connect.php"); if(isset($_COOKIE['current_user'])){header("location:index.php");}?>
<?php
if(isset($_REQUEST["login"])){ 
	 $login_username = htmlspecialchars($_REQUEST["username"]);
	 $login_password = htmlspecialchars($_REQUEST["password"]);
     $en_log_pass = md5(sha1($login_password));
	 
	$run_query1 = mysqli_query($connect,"SELECT username,password FROM std_user WHERE username = '$login_username'");
	$db_info = mysqli_fetch_array($run_query1);
	
	if($db_info['username']==$login_username){

		if($db_info['password']==$en_log_pass){
		  
		  $login_token = md5(sha1($login_username.$login_password));
		  
				$authen = mysqli_query($connect,"SELECT authentication,status FROM std_user WHERE authentication = '$login_token'");
			    $status = mysqli_fetch_array($authen);
			if (mysqli_num_rows($authen)===1 && $status['status']=='active'  ){
				
			    setcookie("current_user",$login_token,time()+(60*60*24*365));
			    header("location:index.php");
				
			}else{ $status_err = "Your Status is Inactive! Please Active and Try later!";}
		}else{  $pass_err = "Your Password is Wrong!!";}
	}else{ $usr_err = "The Username is Not Found!!";}
	
}
?>

<style type="text/css">
div.myclass{
	padding:20px;
}
.btnclass{
	width:348px;
}
.alertclass{
	text-align: center;
	margin: auto;
}
</style>
<br />
<br />
<div class="container">
 <div class= "btn btn-link" ><a href="../index.php">Back</a></div>
<a href="register.php" class= "btn btn-primary btn-sm-4 float-right ">REGISTER</a>
	<h1 class = "text-center">Student Management System Site</h1><br />
	 <?php if(isset($_REQUEST['success'])){echo "<div class = 'alert alert-success' >".$_REQUEST['success']."</div>";}  ?>
	  <h2 class = "text-center">Admin Login Form</h2>
		<div class="row justify-content-center">
			<div class="col-sm-4 table table-bordered animate__animated animate__lightSpeedInRight  myclass ">
				<form action="" method= "POST">
					<div>
						<input type="text" placeholder="Username" name="username" required="" class= " col-sm-12 col-md-12 form-control" />
					</div>
					<br />
					<div>
						<input type="password"  placeholder="Password" name = "password" required="" class= " col-sm-12 col-md-12 form-control" />
					</div>
					<br />
					<div><input type="submit" class= "btn btn-default col-sm-12 col-md-12 float-right btnclass" value= "Login" name= "login" /></div>
				</form>
			</div>
		</div>
		<?php if(isset($pass_err)){echo  '<div class="alert alert-warning col-sm-4 alertclass">'. $pass_err.'</div>';}?> 
		<?php if(isset($usr_err)){echo  '<div class="alert alert-warning col-sm-4 alertclass">'. $usr_err.'</div>';}?> 
		<?php if(isset($status_err)){echo  '<div class="alert alert-warning col-sm-4 alertclass">'. $status_err.'</div>';}?> 
</div>
<?php require_once("footer.php");?>