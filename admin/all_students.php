	
<div class="content" > 
<h1 class = "text-primary" > <i class = "fas fa-users" ></i> All Students <small>Statistics Overview </small> </h1>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-tachometer-alt" ></i>  <a href="index.php?page=Dashboard"> Dashboard </a></li>
<li class="breadcrumb-item active" aria-current="page"><i class= "fas fa-users" ></i> All Students</li>
</ol>
	
	<h3>All Students</h3>
          <div class="responsive">
		   <table class = "table table-bordered table-hover" style= "width:auto" id= "datatable_add" >
		     <thead>
			    <tr> 
				 <th>ACTION</th>
				 <th>ROLL</th>
				 <th>NAME</th>
				 <th>FATHER'S NAME</th>
				 <th>MOTHER'S NAME</th>
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
			 $sl_no = 1;
			 $db_info = mysqli_query($connect,"SELECT* FROM student_data");
			 while ($show_info = mysqli_fetch_array($db_info)){ ?>

			 <tr> 
			  
			   <td> <a href="index.php?page=update_student_data&edited_data=<?php echo base64_encode($show_info['Roll']) ;?>" class = "btn btn-warning" ><i class = "fas fa-edit " ></i> EDIT </a> <hr /> <a onclick =" return confirm('Are You Sure To DELETE This Information? It is So Hermful for You!')" href="delete_student.php?deleted_data=<?php echo base64_encode($show_info['Roll']) ;?>" class = "btn btn-danger" ><i class = "fas fa-trash alt"></i> DELETE </a> </td>
			   <td><?php echo ucwords($show_info['Roll']);?></td>
			   <td><?php echo strtoupper($show_info['name']);?></td>
			   <td><?php echo strtoupper($show_info['father_name']);?></td>
			   <td><?php echo strtoupper($show_info['mother_name']);?></td>
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