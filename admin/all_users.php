	
<div class="content" > 
<h1 class = "text-primary" > <i class = "fas fa-users" ></i> All users <small>Statistics Overview </small> </h1>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-tachometer-alt" ></i>  <a href="index.php?page=Dashboard"> Dashboard </a></li>
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-users" ></i> All Users</li>
</ol>


	<h3>All Users</h3>
          <div class="responsive">
		   <table class = "table table-bordered table-hover" style= "width:auto" id= "datatable_add" >
		     <thead>
			    <tr> 
				 <th>ID</th>
				 <th>NAME</th>
				 <th>USERNAME</th>
				 <th>EMAIL</th>
				 <th>STATUS</th>
				 <th>PHOTO</th>
				</tr>
			 </thead>
			 <tbody>
			 <?php 
			 $sl_no = 1;
			 $db_info = mysqli_query($connect,"SELECT* FROM std_user");
			 while ($show_info = mysqli_fetch_array($db_info)){ ?>

			 <tr> 
			  
			   
			   <td><?php echo ucwords($show_info['id']);?></td>
			   <td><?php echo ucwords($show_info['name']);?></td>
			   <td><?php echo ucwords($show_info['username']);?></td>
			   <td><?php echo ucwords($show_info['email']);?></td>
			   <td><?php echo ucwords($show_info['status']);?></td>
			   <td><img width="100px" height = "100px" src="../images/<?php echo $show_info['photo'];?>" /></td>
			   
			   
			 </tr>
			  <?php } ?>
             </tbody>
           </table>
         </div>