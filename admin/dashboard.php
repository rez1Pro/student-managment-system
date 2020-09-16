		<div class="content" > 
	     <h1 class = "text-primary" > <i class = "fas fa-tachometer-alt" ></i> Dashboard <small>Statistics Overview </small> </h1>
	     <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-tachometer-alt" ></i> Dashboard</li>
			</ol>
			
         			
         <?php 
          $student_query = mysqli_query($connect,"SELECT* FROM student_data");
          $total_student = mysqli_num_rows($student_query);
         
		  $user_query = mysqli_query($connect,"SELECT* FROM std_user");
          $total_user = mysqli_num_rows($user_query);
         ?>
         </nav>
		 <div class="row">
		  <div class = "col-sm-6 col-md-4" >
		    <div style="border:1px solid none ; border-radius:10px;" class="card" >
              <div style="border:1px solid white ; border-radius:10px;" class="card-header bg-primary"> 
			    <i style="color:white;" class = "fas fa-users fa-7x " ></i> 
				<div style="color:white; font-size:45px;" class="float-right"><?php echo $total_student ;?></div> <div class="clearfix"></div>
				<div style="color:white; font-size:25px;" class="float-right">All Students</div>
			  </div>
			  <div class= "card-footer" >
			    <a href="index.php?page=all_students">
			      <span class="float-left"> <label for="allss">All Students</label> </span>
			      <span class="float-right"> <i class= "fas fa-arrow-circle-right" ></i> </span>
				 </a>
			  </div>
			</div>
		  </div>
		  <div class = "col-sm-6 col-md-4" >
		    <div style="border:1px solid none ; border-radius:10px;" class="card" >
              <div style="border:1px solid white ; border-radius:10px;" class="card-header bg-primary"> 
			    <i style="color:white;" class = "fas fa-users fa-7x " ></i> 
				<div style="color:white; font-size:45px;" class="float-right"> <?php echo $total_user ;?> </div> <div class="clearfix"></div>
				<div style="color:white; font-size:25px;" class="float-right">All Users</div>
			  </div>
			  <div class= "card-footer" >
			    <a href="index.php?page=all_users">
			      <span class="float-left"> <label for="allss">All Users</label> </span>
			      <span class="float-right"> <i class= "fas fa-arrow-circle-right" ></i> </span>
				 </a>
			  </div>
			</div>
		  </div>
		 </div>
		 <hr />
		  <h3>New Students</h3>
          <div class="responsive">
		   <table class = "table table-striped table-bordered table-hover" style= "width:100%" id= "datatable_add" >
		     <thead>
			    <tr> 
				 <th>ROLL</th>
				 <th>NAME</th>
				 <th>ADDRESS</th>
				 <th>CLASS</th>
				 <th>GROUP</th>
				 <th>RESULT</th>
				 <th>CONTACT</th>
				 <th>PHOTO</th>
				</tr>
			 </thead>
			 <tbody>
			 <?php 
			 $db_info = mysqli_query($connect,"SELECT* FROM student_data");
			 while ($show_info = mysqli_fetch_array($db_info)){ ?>

			 <tr> 
			   <td><?php echo ucwords($show_info['Roll']);?></td>
			   <td><?php echo strtoupper($show_info['name']);?></td>
			   <td><?php echo ucwords($show_info['address']);?></td>
			   <td><?php echo ucwords($show_info['class']);?></td>
			   <td><?php echo ucwords($show_info['class_group']);?></td>
			   <td><?php echo ucwords($show_info['gpa']);?></td>
			   <td><?php echo ucwords($show_info['contact']);?></td>
			   <td><img width="100px" height = "100px" src="student_photo/<?php echo $show_info['photo'];?>" /></td>
			   
			   
			 </tr>
			  <?php } ?>
             </tbody>
           </table>
         </div>
	   </div>