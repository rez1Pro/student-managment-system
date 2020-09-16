<?php require_once("header.php"); ?> <br />
<center><h1>Shonakhuli Hazi Zaharatullah High School</h1></center>
<br />

<div class="container">
<div class= " animate__animated animate__pulse animate__repeat-2 ">
  
	<a href="add_students.php" class= "btn btn-primary btn-sm float-right">Registration</a> <br /> <br />
		<h1 class = "text-center">Welcome to Our Institution</h1><br /><br />
		<form action="" method= "POST" >
			<div class="row justify-content-center">
				<div class= "col-md-4" >
					<table class= "table table-bordered table-striped" >

						<tr>
							<td colspan = "2" class = "text-center"> <label> <b>Student informations</b> </label> 
							</td>
						</tr>
						<tr>
							<td>
							<label for= "choose" > <b> Choose Class </b></label></td>
							<td> 
							<select class= "custom-select" name="choose" id="choose">
							<option value="">Select</option>
							<option value="6th">Class 6</option>
							<option value="7th">Class 7</option>
							<option value="8th">Class 8</option>
							<option value="9th">Class 9</option>
							<option value="10th">Class 10</option>
							</select>
							</td>
						</tr>
						<tr>
							<td> <label for="roll"> <b> Roll </b></label></td>
							<td> <input type="text" id= "roll" name = "roll" pattern= "[0-9]{6}" placeholder = "6 Digit Roll"/></td>
						
						</tr>
						<tr>
							<td colspan= "2" class= "text-center" ><input class = "btn btn-default text-center" type="submit" name="show_info" value= "Show info" /></td>									
						</tr>
					</table>
				</div>
			</div>
		</form>
    </div><br /><br />
	 
	 <?php require_once("admin/connect.php");
	 if(isset($_REQUEST['show_info'])){ 
	  $class = $_REQUEST['choose'];
	  $roll = $_REQUEST['roll'];
       
	   $runquery = mysqli_query($connect,"SELECT* FROM student_data WHERE class = '$class' AND Roll='$roll' ");
	    if($result = mysqli_fetch_array($runquery)){ ?>
			
		
		 
		  <div class="row justify-content-md-center"> 
		  	
	 <div class="col-sm-12 col-md-9  ">
	  <table class="table table-bordered"> 
	    <tr> 
		<td rowspan= "7" ><img width="200px" src="admin/student_photo/<?php echo $result['photo']; ?>" /><h4><?php echo $result['name'];?></h4><br /> <h3> GPA : <?php echo $result['gpa'];?> </h3></td>
		 <td> Name </td>
		 <td> <?php echo $result['name'];?> </td>
         
		</tr>
		 <tr> 

		 <td> Father's Name </td>
		 <td> <?php echo $result['father_name'];?> </td>

		</tr>
		 <tr> 
		 
		 <td> Mother's Name </td>
		 <td> <?php echo $result['mother_name'];?> </td>

		</tr>
	    <tr> 

		 <td> Class </td>
		 <td><?php echo $result['class'];?> </td>
       </tr>
		<tr> 

		 <td> Roll </td>
		 <td> <?php echo $result['Roll'];?> </td>

		</tr>
	    <tr> 

		 <td> Group </td>
		 <td><?php echo $result['class_group'];?> </td>

		</tr>
	    <tr> 

		 <td> Contact </td>
		 <td> <?php echo $result['contact'];?> </td>
		</tr>

	  </table>
	 </div>
	</div>
		 <?php }else{echo "<h1>No Result Has Found ! Please Contact With Headteacher! </h1>";}?>
	<?php }?>
	 
	 

</div>
<?php require_once("footer.php"); ?>
	

	
	
