<form action="" method="POST">
<input type="email" name= "email" />
<input type="submit" name="submit" />

</form>

<?php

 $email = $_REQUEST['email'];
 
 $selector = bin2hex(random_bytes(8));
 
if(isset($_REQUEST["submit"])){
	echo  $selector;
}



?>