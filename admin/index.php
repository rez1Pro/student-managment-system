<?php require_once("header.php"); require_once("connect.php"); if(!isset($_COOKIE['current_user'])){header("location:login.php");}?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">SMS of Shonakhuli H.Z. High School</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="nav navbar-nav ml-auto ">
	<li> <a class="btn btn-default " href="../index.php" > <i class=" fas fa-user"></i> Welcome: <?php if(isset($_COOKIE['current_user'])){ $authen=$_COOKIE['current_user'] ; $runquery = mysqli_query($connect,"SELECT name FROM std_user WHERE authentication='$authen'; "); echo mysqli_fetch_array($runquery)['name']; }?> </a></li>
	<li> <a class="btn btn-default " href="index.php?page=add_users" > <i class=" fas fa-user-plus"></i> Add user</a></li>
	<li> <a class="btn btn-default " href="index.php?page=profile" > <i class="fas fa-address-card"></i> Profile</a></li>
	<li> <a class="btn btn-default " href="logout.php" > <i class=" fas fa-power-off"></i> Logout</a></li>
    </ul>
  </div>
</nav> 

<br /> 
<div class = "container-fluid" >
	<div class="row">
	  <div class = "col-sm-6 col-md-3" >
		<div class="list-group">
			<a class="btn btn-primary" href="index.php?page=Dashboard"> <button type="button" class=" list-group-item list-group-item-action active"><i class= "fas fa-tachometer-alt" ></i>
			 Dashboard 
			</button></a>
			  <ul class="list-group">
				<li class="list-group-item d-flex justify-content-between align-items-center">
					  <a href="index.php?page=add_students" class = "btn btn-default" > <i class = "fas fa-user-plus" ></i> Add Students</a>
					<span class="badge badge-primary badge-pill">14</span>
				</li>			
				<li class="list-group-item d-flex justify-content-between align-items-center">
					  <a  class = "btn btn-default" href="index.php?page=all_students"> <i class = "fas fa-users" ></i> All Students</a>
					<span class="badge badge-primary badge-pill">14</span>
				</li>		
				<li class="list-group-item d-flex justify-content-between align-items-center">
					  <a  class = "btn btn-default" href="index.php?page=all_users"> <i class = "fas fa-users" ></i> All Users</a>
					<span class="badge badge-primary badge-pill">14</span>
				</li>				
				<li class="list-group-item d-flex justify-content-between align-items-center">
					  <a  class = "btn btn-default" href="index.php?page=add_users"> <i class = "fas fa-user-plus" ></i> Add Users</a>
					<span class="badge badge-primary badge-pill">14</span>
				</li>
				
			</ul>
		</div>
	  </div>
	  <div class = "col-sm-12 col-md-9" > 
            <?php 
			if(isset($_REQUEST['page'])){
			$page_name = $_REQUEST["page"].".php" ;
			}else{$page_name="dashboard.php";}
			
			
			if(file_exists($page_name)){
			  require_once($page_name);
			}else{require_once("404.php");}
			?>

	  </div>
   </div>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
	$("#datatable_add").DataTable();
	
});
</script>
<?php require_once("footer.php");?>