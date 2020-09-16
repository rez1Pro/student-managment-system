<?php 
 require_once("connect.php");
 $getroll = base64_decode($_REQUEST['deleted_data']);
 
 $db_info = "DELETE FROM student_data WHERE Roll= '$getroll' " ;
 $run_query = mysqli_query($connect,$db_info);
     if($run_query==true){
	 header("location:index.php?page=all_students");
 
    }
?>