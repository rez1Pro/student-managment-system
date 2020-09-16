<?php if(isset($_COOKIE['current_user'])){
	setcookie("current_user",$login_username,time()-(60*60*24*365));
	header("location:login.php");
	
	}
	
	
	?>